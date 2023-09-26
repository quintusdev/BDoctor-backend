<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(Request $request)
{
    // Valida i dati inviati dalla richiesta
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'text' => 'required|string',
        'name' => 'required|string', // Aggiungi la validazione per il nome
        'surname' => 'required|string', // Aggiungi la validazione per il cognome
        'email' => 'required|email', // Aggiungi la validazione per l'email
    ]);

    // Crea una nuova recensione
    $review = new Review();
    $review->doctor_id = $request->input('doctor_id');
    $review->text = $request->input('text');
    $review->name = $request->input('name'); // Aggiungi il nome
    $review->surname = $request->input('surname'); // Aggiungi il cognome
    $review->email = $request->input('email'); // Aggiungi l'email
    $review->save();

    dd($request);

    // Puoi anche gestire il voto associato al dottore qui, utilizzando la tabella pivot 'vote_doctor'

    // Restituisci una risposta di successo
    return response()->json(['message' => 'Recensione inviata con successo'], 201);
}

}
