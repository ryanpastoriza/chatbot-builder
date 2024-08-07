<?php

namespace App\Http\Controllers;

use App\Services\ChatbotService;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
 	
 	protected $chatbotService;

 	public function __construct(ChatbotService $chatbotService) {
        $this->chatbotService = $chatbotService;
    }

    public function query(Request $request) {
        $query = $request->input('query');
        $response = $this->chatbotService->generateResponse($query);
        return response()->json(['response' => $response]);
    }

}
