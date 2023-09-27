<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Doctor;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'doctor_id' => 'required|integer|exists:doctors,id',
                'name' => 'required|string',
                'surname' => 'required|string',
                'email' => 'required|string|email',
                'text' => 'required|string',
            ]);

            $form_data = $request->all();
            $doctor = Doctor::findOrFail($request->doctor_id);

            $review = new Review();
            $review->fill($form_data);
            $doctor->reviews()->save($review);

            return response()->json([
                'message' => 'Recensione inviata con successo',
                'success' => true,
            ], 201); // 201 indica la creazione riuscita
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Errore di validazione dei dati',
                'errors' => $e->validator->getMessageBag(),
            ], 422); // 422 indica errore di validazione
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Errore durante l\'invio della recensione',
            ], 500); // 500 indica un errore interno del server
        }
    }
}
