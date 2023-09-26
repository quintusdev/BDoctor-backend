<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;


class VoteController extends Controller
{
    public function create(Request $request)
{
    // Valida i dati inviati dalla richiesta
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'rating' => 'required|integer|between:1,5',
    ]);

    // Trova il dottore in base all'ID
    $doctor = Doctor::find($request->input('doctor_id'));

    if (!$doctor) {
        return response()->json(['message' => 'Dottore non trovato'], 404);
    }

    // Aggiungi il voto alla relazione tra Doctor e Vote
    $doctor->votes()->attach($request->input('rating'));

    // Restituisci una risposta di successo
    return response()->json(['message' => 'Voto inserito con successo'], 201);
}

}
