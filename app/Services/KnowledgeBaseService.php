<?php
// app/Services/KnowledgeBaseService.php

namespace App\Services;

use Illuminate\Support\Facades\File;

class KnowledgeBaseService
{
    protected $knowledgeBase;

    public function __construct()
    {
        $this->loadKnowledgeBase();
    }

    protected function loadKnowledgeBase()
    {
        $json = File::get(storage_path('knowledge_base.json'));
        $this->knowledgeBase = json_decode($json, true);
    }

    public function retrieveInfo($query)
    {
        $results = [];

        // Search through products
        foreach ($this->knowledgeBase['products'] as $product) {
            if (stripos($product['name'], $query) !== false) {
                $results[] = [
                    'type' => 'product',
                    'description' => json_encode($product),
                ];
            } else {
                foreach ($product['features'] as $feature) {
                    if (stripos($feature, $query) !== false) {
                        $results[] = [
                            'type' => 'product',
                            'description' => json_encode($product),
                        ];
                        break;
                    }
                }
            }
        }

        // Search through services
        foreach ($this->knowledgeBase['services'] as $service) {
            if (stripos($service['name'], $query) !== false || stripos($service['description'], $query) !== false) {
                $results[] = [
                    'type' => 'service',
                    'description' => json_encode($service),
                ];
            }
        }

        // Search through company policies
        foreach ($this->knowledgeBase['company_policies'] as $policy) {
            if (stripos($policy['name'], $query) !== false || stripos($policy['description'], $query) !== false) {
                $results[] = [
                    'type' => 'policy',
                    'description' => json_encode($policy),
                ];
            }
        }

        // Search through FAQs
        foreach ($this->knowledgeBase['faqs'] as $faq) {
            if (stripos($faq['question'], $query) !== false || stripos($faq['answer'], $query) !== false) {
                $results[] = [
                    'type' => 'faq',
                    'description' => json_encode($faq),
                ];
            }
        }

        return $results;
    }
}
