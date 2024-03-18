<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class SecurityPasswordController extends Controller
{
    public function testPassword(RegisterRequest $request): ?JsonResponse
    {
        // Verifique se a senha não está vazia
        if (empty($request->input('password'))) {
            return null; // Senha vazia
        }

        $hashedPassword = Hash::make($request->input('password'));

        return response()->json($hashedPassword);
    }
}
