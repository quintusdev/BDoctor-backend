<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // Valida i dati della richiesta
        $validatedData = $request->validate([
            'user_id' => 'required',
            'mname' => 'required',
            'msurname' => 'required',
            'memail' => 'required|email',
            'mtext' => 'required',
        ]);

        // Crea una nuova recensione utilizzando il modello
        $message = new Message([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('mname'),
            'surname' => $request->input('msurname'),
            'email' => $request->input('memail'),
            'text' => $request->input('mtext'),
        ]);

        // Salva la recensione nel database
        $message->save();

        // Puoi gestire la risposta qui, ad esempio, restituendo una conferma
        return response()->json(['message' => 'Recensione salvata con successo', 'message' => $message]);
    }
}
