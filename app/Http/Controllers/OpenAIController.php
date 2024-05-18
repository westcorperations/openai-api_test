<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateResponseRequest;
use App\Services\OpenAIService;
use App\Http\Traits\HttpResponseTrait;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        // Inject the OpenAIService into the controller
        $this->openAIService = $openAIService;
    }

    public function generateResponse(GenerateResponseRequest $request)
    {
        try {
            // Call the generateResponseAndQuestions method from the OpenAIService
            $result = $this->openAIService->generateResponseAndQuestions($request->input('message'));

            // Return a success response with the generated result
            return HttpResponseTrait::success($result);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return HttpResponseTrait::error('Internal server error' . $e->getMessage());
        }
    }
}
