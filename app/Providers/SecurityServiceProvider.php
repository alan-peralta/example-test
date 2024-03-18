<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class SecurityServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot(): void
    {
        Validator::extend('secure_password', function ($attribute, $value, $parameters, $validator) {
            // Validar se a senha tem pelo menos 8 caracteres
            if (strlen($value) < 8) {
                return false;
            }

            // Validar se a senha contém pelo menos uma letra maiúscula, uma letra minúscula e um número
            if (!preg_match('/[A-Z]/', $value) || !preg_match('/[a-z]/', $value) || !preg_match('/[0-9]/', $value)) {
                return false;
            }

            return true;
        });

        Validator::extend('bcrypt_password', function ($attribute, $value, $parameters, $validator) {
            // Verificar se a senha já está criptografada com bcrypt
            return preg_match('/^\$2[ayb]\$.{56}$/', $value);
        });
    }
}
