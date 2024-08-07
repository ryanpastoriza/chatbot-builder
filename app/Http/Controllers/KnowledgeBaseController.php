<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KnowledgeBaseController extends Controller
{
   	public function create() 
   	{
		return view('knowledge_base');
    }

    public function store(Request $request)
    {
        $knowledgeBasePath = storage_path('knowledge_base.json');
        $knowledgeBase = json_decode(File::get($knowledgeBasePath), true);

        if ($request->has('product_name')) {
            $knowledgeBase['products'][] = [
                'name' => $request->input('product_name'),
                'features' => explode(',', $request->input('product_features')),
                'materials' => explode(',', $request->input('product_materials')),
                'customization_options' => explode(',', $request->input('product_customization'))
            ];
        }

        if ($request->has('service_name')) {
            $knowledgeBase['services'][] = [
                'name' => $request->input('service_name'),
                'description' => $request->input('service_description'),
                'process' => explode(',', $request->input('service_process')),
                'benefits' => explode(',', $request->input('service_benefits'))
            ];
        }

        if ($request->has('policy_name')) {
            $knowledgeBase['company_policies'][] = [
                'name' => $request->input('policy_name'),
                'description' => $request->input('policy_description'),
                'timeframe' => $request->input('policy_timeframe'),
                'process' => explode(',', $request->input('policy_process')),
                'refund' => $request->input('policy_refund')
            ];
        }

        if ($request->has('faq_question')) {
            $knowledgeBase['faqs'][] = [
                'question' => $request->input('faq_question'),
                'answer' => $request->input('faq_answer')
            ];
        }

        if ($request->has('mc_question')) {
            $knowledgeBase['multiple_choice'][] = [
                'question' => $request->input('mc_question'),
                'options' => explode(',', $request->input('mc_options'))
            ];
        }

        
        File::put($knowledgeBasePath, json_encode($knowledgeBase, JSON_PRETTY_PRINT));

        return redirect()->route('knowledge_base.create')->with('success', 'Knowledge base updated successfully');
    }
}
