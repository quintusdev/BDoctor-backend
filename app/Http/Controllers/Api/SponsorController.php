<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function index()
    {
        // Esegui una query per ottenere tutti i dati dalla tabella ponte "sponsor_doctor"
        $sponsorDoctorData = DB::table('sponsor_doctor')->get();

        // Restituisci i dati come risposta JSON
        return response()->json($sponsorDoctorData);
    }
}
