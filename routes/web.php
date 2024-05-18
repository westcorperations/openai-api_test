<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAIController;

Route::get('/', function () {
    return view('welcome');
});
// Route::post('api/generate', [OpenAIController::class, 'generateResponse']);
