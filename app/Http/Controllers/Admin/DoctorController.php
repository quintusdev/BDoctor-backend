<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialization;
use App\Models\Sponsor;
use Illuminate\Support\Str;
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
        $doctors = Doctor::where('user_id', $user_id);

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
        // Valida il file dell'immagine
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Carica l'immagine
        $imageName = time().'.'.$request->picture->extension();  
        $request->picture->storeAs('doctor_picture', $imageName, 'public');
    
        // Crea un nuovo oggetto Doctor
        $doctor = new Doctor;
    
        // Imposta le proprietà dell'oggetto Doctor
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->picture = 'doctor_picture/'.$imageName;
    
        // Salva l'oggetto Doctor nel database
        $doctor->save();
    
        // Reindirizza l'utente a una pagina di successo o effettua altre azioni necessarie
        return back()
            ->with('success','Hai caricato con successo l\'immagine.')
            ->with('image',$imageName);
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

        // Trova un medico nel database utilizzando l'ID specifico del medico
        $doctor = Doctor::find($doctor->id);

        // Aggiungi l'URL dell'immagine del profilo alla risposta
        $doctor->image_url = Storage::url($doctor->picture);

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

        if ($user->id == $doctor->user_id) {
            return view('admin.doctors.edit', compact('specializations', 'doctor', 'doctors', 'user', 'user_id'));
        } else {
            // Reindirizza l'utente a una pagina di errore o effettua altre azioni necessarie
            abort(403);
        }
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
        // Inizializzazione $form_data con i dati validati dal request
        $form_data = $request->validated();
        
        // Se è stata inviata una nuova immagine tramite il modulo
        if ($request->hasFile('picture')) {
            // Se il dottore ha già una foto associata, elimina la vecchia foto dallo storage
            if ($doctor->picture) {
                Storage::delete($doctor->picture);
            }

            // Salva la nuova immagine nello storage e ottieni il percorso
            $path = $request->picture->store('doctor_picture', 'public');

            // Aggiorna il campo 'picture' nei dati del modulo con il nuovo percorso dell'immagine
            $form_data['picture'] = $path;
        }

        if ($request->hasFile('cv')) {
            // Se il dottore ha già un file associato, elimina il vecchio file dallo storage
            if ($doctor->cv) {
                Storage::delete($doctor->cv);
            }

            // Salvo il nuovo file nello storage e ottieni il percorso
            $path = $request->cv->store('doctor_cv', 'public');

            // Aggiorna il campo 'cv' nei dati del modulo con il nuovo percorso del file
            $form_data['cv'] = $path;
        }
    
        // Altri aggiornamenti del modello Doctor se necessario
        $doctor->update($form_data);
    
        if ($request->has('specializations')) {
            $doctor->specializations()->sync($request->specializations);
        }
    
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
