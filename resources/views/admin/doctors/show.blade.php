@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    {{-- NOME UTENTE --}}
                    <div class=" col-12 col-md-6 d-flex align-items-center mt-1 mb-4 mt-4">
                        <h2>Benvenuto {{ $user->name }} {{ $user->surname }}</h2>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD 
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div> --}}
                </div>

                {{-- IMMAGINE PROFILO UTENTE --}}

                <div class="form-group col-12 col-md-6 mt-4 mb-4">
                    <div>
                        @if(isset($doctor->picture))
                            <img src="{{ asset('storage/' . $doctor->picture) }}" class="img_profile img-fluid" >
                        @else
                            <img src="{{ asset('storage/profile_default.jpg') }}" alt="immagine di default" class="img_profile img-fluid">
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <h4>Indirizzo: {{ $doctor->address }}</h4>
                </div>

                <div class="col-12 col-md-6">
                    <h4>Specializzazioni:</h4>
                    <ul>
                        {{-- PRENDO LE SPECIALIZZAZIONI LEGATE AL DOCTOR E CICLO LE INFORMAZIONI --}}
                        @foreach ($doctor->specializations as $specialization)
                            {{-- Visualizzo in una lista tutti i valori selezionati dal medico --}}
                            <li>{{ $specialization->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-12 col-md-6">
                    <h4>Curriculum Vitae:</h4>
                    {{-- Verifico che ci sia un file dentro la colonna cv associata al dottore autenticato --}}
                    @if (isset($doctor->cv))
                        <iframe src="{{ asset('storage/' . $doctor->cv) }}" width="100%" height="600"></iframe>
                    @else
                        {{-- <img src="{{ asset('storage/') }}" alt="immagine di default"> --}}
                    @endif
                </div>

                <div class="col-12 col-md-6">
                    <h4>N. telefono: {{ $doctor->phone }}</h4>
                </div>

                {{--<div class="col-12 col-md-6">
                    <h4>Prestazioni: {{ $doctor->medical_service }}</h4>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

