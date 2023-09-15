<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        // Ottieni l'ID dell'utente attualmente autenticato
        $user_id = Auth::id();

        // Ottieni l'oggetto dell'utente attualmente autenticato
        $user = Auth::user();

        // Cerca il dottore associato all'utente corrente utilizzando l'ID utente
        $doctors = Doctor::where('user_id', $user_id)->first();

        // Ottieni il dottore associato all'utente utilizzando la relazione definita nel modello User
        $doctor = $user->doctor;

        // Restituisci la vista 'admin.doctors.index' passando i dati alla vista
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

        if ($request->hasFile('picture')) {

            $img_path = Doctor::find($doctor->id);
            $img_path->immagine_predefinita = 'images/icon_img-png';

            $form_data['picture'] = $img_path;
        }
        $img_path->save();
        // Salva il medico nel database
        $doctor->save();

        return view('admin.doctors.show', compact('doctor', 'doctors', 'user', 'user_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        // Ottieni l'ID dell'utente attualmente autenticato
        $user_id = Auth::id();
        // Ottieni l'oggetto dell'utente attualmente autenticato
        $user = Auth::user();
        // Cerca il dottore associato all'utente corrente utilizzando l'ID utente
        $doctors = Doctor::where('user_id', $user_id)->first();

        // Ottieni il dottore associato all'utente utilizzando la relazione definita nel modello User
        $doctor = $user->doctor;

        return view('admin.doctors.show', compact('doctor', 'doctors', 'user', 'user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $specializations = Specialization::all();
        // Ottieni l'ID dell'utente attualmente autenticato
        $user_id = Auth::id();
        // Ottieni l'oggetto dell'utente attualmente autenticato
        $user = Auth::user();
        // Cerca il dottore associato all'utente corrente utilizzando l'ID utente
        $doctors = Doctor::where('user_id', $user_id)->first();

        // Ottieni il dottore associato all'utente utilizzando la relazione definita nel modello User
        $doctor = $user->doctor;

        return view('admin.doctors.edit', compact('specializations', 'doctor', 'doctors', 'user', 'user_id'));
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
        $user_id = Auth::id();
        $userDetail = User::findOrFail($user_id);

        // Otteniamo il dottore associato all'utente corrente
        $doctor = $userDetail->doctor;

        if ($request->hasFile('picture')) {
            // Elimina l'immagine esistente se presente
            if ($doctor->picture) {
                Storage::delete($doctor->picture);
            }

            // Salva la nuova immagine nello storage e ottieni il percorso
            $imgPath = $request->file('picture')->store('doctors', 'public');

            // Aggiorna il campo 'picture' nel modello Doctor con il nuovo percorso
            $doctor->picture = $imgPath;

            // Salva il modello Doctor per aggiornare il percorso dell'immagine
            $doctor->save();
        }

        // Altri aggiornamenti del modello Doctor se necessario
        $doctor->update([
            // Altri campi da aggiornare
        ]);

        return redirect()->route('admin.doctors.show', ['doctor' => $doctor]);
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
