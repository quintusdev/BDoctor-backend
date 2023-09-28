<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Doctor;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    // ReviewController.php

    public function store(Request $request)
    {
        // Valida i dati della richiesta
        $validatedData = $request->validate([
            'doctor_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ]);

        // Crea una nuova recensione utilizzando il modello
        $review = new Review([
            'doctor_id' => $request->input('doctor_id'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'text' => $request->input('text'),
        ]);

        // Salva la recensione nel database
        $review->save();

        // Puoi gestire la risposta qui, ad esempio, restituendo una conferma
        return response()->json(['message' => 'Recensione salvata con successo', 'review' => $review]);
    }
}
