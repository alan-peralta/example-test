<?php

namespace App\Services;

class PrimeNumberService
{
    public function sumOfPrimesInRange(int $start, int $end): int
    {
        // Verificar se os limites são válidos
        if ($start >= $end || $start < 2) {
            return 0; // Não há números primos no intervalo
        }

        // Inicializar um array para marcar os números compostos
        $isComposite = array_fill(2, $end, false);

        // Implementar o Crivo de Eratóstenes
        for ($i = 2; $i * $i <= $end; $i++) {
            if (!$isComposite[$i]) {
                for ($j = $i * $i; $j <= $end; $j += $i) {
                    $isComposite[$j] = true;
                }
            }
        }

        // Calcular a soma dos números primos
        $sum = 0;
        for ($i = $start; $i <= $end; $i++) {
            if (!$isComposite[$i]) {
                $sum += $i;
            }
        }

        return $sum;
    }
}
