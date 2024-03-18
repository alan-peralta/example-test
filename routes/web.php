<?php

use Illuminate\Support\Facades\Route;

#1. Desempenho e Otimização
Route::post('/sum-prime-number', [\App\Http\Controllers\PrimeNumberController::class, 'sumOfPrimesInRange']);

#3. Arquitetura e Design Patterns
Route::post('/execute', [\App\Http\Controllers\CommandController::class, 'execute']);
Route::post('/undo', [\App\Http\Controllers\CommandController::class, 'undo']);

#4. Segurança Avançada
Route::post('/test-password', [\App\Http\Controllers\SecurityPasswordController::class, 'testPassword']);

//5. Integração e Microsserviços
Route::get('/send-message', [\App\Http\Controllers\RabbitMQController::class, 'sendMessage']);
