<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SecurityService
{
    /**
     * Valida e filtra uma senha.
     *
     * @param  string  $password
     * @return string|null
     */
    public function validateAndFilterPassword($password)
    {
        // Defina as regras de validação para a senha
        $rules = ['required', 'string', 'min:8'];

        // Valide a senha
        $validator = Validator::make(['password' => $password], ['password' => $rules]);

        // Verifique se a validação falhou
        if ($validator->fails()) {
            return null; // Senha inválida
        }

        // Filtre a senha para remover qualquer espaço em branco adicional
        $filteredPassword = trim($password);

        return $filteredPassword;
    }

    /**
     * Criptografa uma senha de forma segura.
     *
     * @param  string  $password
     * @return string|null
     */
    public function hashPassword($password)
    {
        // Verifique se a senha não está vazia
        if (empty($password)) {
            return null; // Senha vazia
        }

        // Use a função bcrypt() do Laravel para criptografar a senha
        $hashedPassword = Hash::make($password);

        return $hashedPassword;
    }
}
