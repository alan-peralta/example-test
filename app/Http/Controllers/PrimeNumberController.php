<?php

namespace App\Http\Controllers;

use App\Services\PrimeNumberService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PrimeNumberController extends Controller
{
    public function sumOfPrimesInRange(Request $request, PrimeNumberService $primeNumberService): JsonResponse
    {
        $start = $request->input('start');
        $end = $request->input('end');

        // Validar o intervalo
        if ($start < 0 || $end < 0) {
            return response()->json(['error' => 'Os limites devem ser números positivos'], 400);
        }

        // Calcular a soma dos números primos no intervalo
        $sum = $primeNumberService->sumOfPrimesInRange($start, $end);

        return response()->json(['sum' => $sum]);
    }
}
