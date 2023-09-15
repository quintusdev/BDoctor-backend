<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $user = Auth::user();
        $doctors = Doctor::where('user_id', $user_id)->first();
        $doctor = $user->doctor;
        /* $doctorDetails = DB::table('users')
            ->join('doctors', 'users.id', '=', 'doctors.user_id')
            ->select('doctors.address', 'doctors.phone')
            ->get(); */

        return view('admin.doctors.index', compact('doctors', 'doctor', 'user_id', 'user'));
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
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        // Valida i dati del form
        $validatedData = $request->validate([
            'address' => 'required|string|max:255', // Assicurati che la regola di validazione sia presente
            // Altre regole di validazione per gli altri campi del medico
        ]);

        // Crea una nuova istanza di Doctor
        $doctor = new Doctor();

        // Assegna i valori dai dati del form all'istanza del medico
        $doctor->address = $validatedData['address'];
        // Assegna altri campi del medico in base ai dati del form

        // Salva il medico nel database
        $doctor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
