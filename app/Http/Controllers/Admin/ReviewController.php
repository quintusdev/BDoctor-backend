<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Doctor;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Ottieni l'oggetto dell'utente attualmente autenticato
    $user = Auth::user();

    // Ottieni l'oggetto del medico associato all'utente autenticato
    $doctor = $user->doctor;

    // Assicurati che il medico esista prima di cercare le recensioni
    if ($doctor) {
        // Ottieni solo le recensioni associate al medico
        $reviews = $doctor->reviews()->with(['votes' => function ($query) use ($doctor) {
            $query->where('doctor_id', $doctor->id);
        }])->get();
    }

    return view('admin.reviews.index', compact('user', 'reviews', 'doctor')); 
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review  $review)
    {
        // Ottieni l'oggetto dell'utente attualmente autenticato
        $user = Auth::user();

        return view('admin.reviews.show', compact('user', 'review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
