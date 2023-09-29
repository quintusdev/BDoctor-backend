<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Doctor;
use Illuminate\Validation\ValidationException;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        // Valida i dati inviati dalla richiesta
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'rname' => 'required',
            'rsurname' => 'required',
            'remail' => 'required|email',
            'vote_id' => 'required|integer|between:1,5',
        ]);

        $doctor = Doctor::find($request->doctor_id);

        if (!$doctor) {
            return response()->json(['message' => 'Dottore non trovato'], 404);
        }

        // Ottieni l'ID del voto dalla richiesta
        $vote_id = $request->input('vote_id');

        // Aggiungi il voto associato al dottore nella tabella pivot `vote_doctor` con i dettagli
        $doctor->votes()->attach($vote_id, [
            'name' => $request->input('rname'),
            'surname' => $request->input('rsurname'),
            'email' => $request->input('remail'),
        ]);

        // Restituisci una risposta di successo
        return response()->json(['message' => 'Voto inserito con successo'], 201);
    }

    
}
