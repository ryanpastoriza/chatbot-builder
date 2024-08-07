<?php
// app/Services/ChatbotService.php
namespace App\Services;

use GuzzleHttp\Client;

class ChatbotService
{
    protected $knowledgeBaseService;
    protected $httpClient;

    public function __construct(KnowledgeBaseService $knowledgeBaseService)
    {
        $this->knowledgeBaseService = $knowledgeBaseService;
        $this->httpClient = new Client();
    }

    public function generateResponse($query)
    {
        $retrievedDocs = $this->knowledgeBaseService->retrieveInfo($query);
        $context = implode(" ", array_column($retrievedDocs, 'description'));
        $prompt = "Based on the following information: $context. Answer the question: $query";

        $response = $this->httpClient->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful assistant knowledgeable about the company\'s products and services.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ],
                'max_tokens' => 150,
                'temperature' => 0.7,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['choices'][0]['message']['content'];
    }
}
