<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Doctor;
use App\Models\Review;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user', 'specializations', 'votes', 'reviews')->get();

        return response()->json([
            'success' => true,
            'results' => $doctors
        ]);
    }
    public function getSpecializations($doctor_id)
    {
        // Utilizza $doctor_id per recuperare le specializzazioni del dottore
        $doctor = Doctor::find($doctor_id);

        if (!$doctor) {
            // Gestisci il caso in cui il dottore non sia stato trovato (ad esempio, restituisci un errore 404)
            return response()->json(['error' => 'Dottore non trovato'], 404);
        }

        // Ora puoi ottenere le specializzazioni associate a questo dottore
        $specializations = $doctor->specializations;

        return response()->json([
            'success' => true,
            'results' => $specializations,
        ]);
    }

    public function search(Request $request)
    {
        // Ottieni i parametri di ricerca dal modulo
        $name = $request->input('name');
        $specialization = $request->input('specialization');
        $avrVote = $request->input('average_vote');
        $review = $request->input('reviews');

        // Esegui la ricerca utilizzando i parametri
        $doctors = Doctor::with('user', 'specializations', 'votes', 'reviews')
            ->when($name, function ($query) use ($name) {
                $query->whereHas('user', function ($subquery) use ($name) {
                    $subquery->where('name', 'like', '%' . $name . '%');
                });
            })
            ->when($specialization, function ($query) use ($specialization) {
                $query->whereHas('specializations', function ($subquery) use ($specialization) {
                    $subquery->where('name', $specialization);
                });
            })
            ->when($avrVote, function ($query) use ($avrVote) {
                $query->where('average_vote', '>=', $avrVote);
            })

            ->when($review, function ($query) use ($review) {
                $query->whereHas('reviews', function ($subquery) use ($review) {
                    $subquery->where('name', $review);
                });
            })


            ->get();


        // Restituisci i risultati della ricerca come JSON
        return response()->json([
            'success' => true,
            'results' => $doctors,
        ]);
    }

    public function show($doctor_id)
    {
        // Utilizza $doctor_id per recuperare il dottore con i dati dell'utente associato
        $doctor = Doctor::with('user')->find($doctor_id);

        if (!$doctor) {
            // Gestisci il caso in cui il dottore non sia stato trovato (ad esempio, restituisci un errore 404)
            return response()->json(['error' => 'Dottore non trovato'], 404);
        }

        return response()->json([
            'success' => true,
            'results' => $doctor,
        ]);
    }

    public function getAverageVote($doctor_id)
    {
        // Trova il dottore
        $doctor = Doctor::find($doctor_id);

        if (!$doctor) {
            return response()->json(['error' => 'Dottore non trovato'], 404);
        }

        // Calcola la media dei voti utilizzando il metodo nel modello Doctor
        $averageVote = $doctor->averageVote();

        // Arrotonda la media dei voti per difetto
        $averageVote = floor($averageVote);

        return response()->json([
            'success' => true,
            'average_vote' => $averageVote,
        ]);
    }

    public function filterByVote(Request $request)
    {
        // Ottieni il valore del filtro average_vote dalla richiesta
        $averageVoteFilter = $request->input('average_vote');

        // Esegui una query per ottenere i medici con una media dei voti maggiore o uguale a $averageVoteFilter
        $doctors = Doctor::with('user', 'specializations', 'votes', 'reviews')
            ->where('average_vote', '>=', $averageVoteFilter)
            ->get();

        // Restituisci i risultati della query come JSON
        return response()->json([
            'success' => true,
            'results' => $doctors,
        ]);
    }
}
