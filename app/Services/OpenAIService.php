<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function generateResponseAndQuestions($userInput)
    {
        try {
            // Generate the primary response based on user input
            $response = $this->callOpenAI($userInput, 'gpt-4', 150);

            // Check if the response is valid
            if (!isset($response['choices']) || empty($response['choices'])) {
                throw new \Exception('Invalid response from OpenAI API');
            }

            // Extract and clean up the generated response
            $generatedResponse = trim($response['choices'][0]['message']['content']);

            // Create a prompt for follow-up questions based on the generated response
            $followUpPrompt = "Based on the response: \"{$generatedResponse}\", suggest four follow-up questions.";
            $followUpResponse = $this->callOpenAI($followUpPrompt, 'gpt-4', 100, 1);

            // Check if the follow-up response is valid
            if (!isset($followUpResponse['choices']) || empty($followUpResponse['choices'])) {
                throw new \Exception('Invalid follow-up response from OpenAI API');
            }

            // Extract and clean up the follow-up questions
            $followUpQuestions = array_map(function ($question) {
                return ['question' => preg_replace('/^\d+\.\s*/', '', $question)];
            }, array_filter(explode("\n", trim($followUpResponse['choices'][0]['message']['content']))));

            return [
                'response' => $generatedResponse,
                'follow_up_questions' => $followUpQuestions,
            ];
        } catch (\Exception $e) {
            Log::error('Error generating response from OpenAI: ' . $e->getMessage());
            throw $e;
        }
    }

    private function callOpenAI($prompt, $model, $maxTokens, $n = 1)
    {
        try {
            // Make the HTTP request to the OpenAI API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => $model,
                'messages' => [
                    ['role' => 'user', 'content' => $prompt]
                ],
                'max_tokens' => $maxTokens,
                'temperature' => 0.7,
                'n' => $n,
            ]);

            // Parse the response body
            $responseBody = $response->json();

            // Log the response for debugging
            Log::info('OpenAI API response: ', $responseBody);

            // Check if the request failed
            if ($response->failed()) {
                Log::error('OpenAI API request failed: ' . $response->body());
                throw new \Exception('OpenAI API request failed: ' . $response->body());
            }

            return $responseBody;
        } catch (\Exception $e) {
            Log::error('Error calling OpenAI API: ' . $e->getMessage());
            throw new \Exception('Error calling OpenAI API: ' . $e->getMessage());
        }
    }
}
