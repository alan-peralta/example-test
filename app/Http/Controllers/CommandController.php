<?php

namespace App\Http\Controllers;


use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function execute(Request $request)
    {
        $command = new Command();
        $command->name = $request->input('name');
        $command->save();

        Artisan::call($request->input('name'));

        return response()->json(['message' => 'Comando executado com sucesso']);
    }

    public function undo()
    {
        // Obtenha o último comando executado
        $lastCommand = Command::latest()->first();

        if ($lastCommand) {
            Artisan::call($lastCommand->name);

            $lastCommand->delete();

            return response()->json(['message' => 'Comando desfeito com sucesso']);
        } else {
            return response()->json(['message' => 'Nenhum comando para desfazer']);
        }
    }
}
