<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateResponseRequest;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Log;

class OpenAIController extends Controller
{
    public function __construct(public OpenAIService $openAIService)
    {
        //
    }

    public function generateResponse(GenerateResponseRequest $request)
    {
        try {
            $result = $this->openAIService->generateResponseAndQuestions($request->input('message'));
            return $this->success($result);
        } catch (\Exception $e) {
            return $this->error('Internal server error');
            Log::error("Internal server error", $e->getMessage());
        }
    }
}
