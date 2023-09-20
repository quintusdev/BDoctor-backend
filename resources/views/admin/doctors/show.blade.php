@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-4 d-flex justify-content-between">
                    {{-- NOME UTENTE --}}
                    <div class="d-flex col-10 align-items-center mt-1">
                        <h1>Benvenuto {{ $user->name }} {{ $user->surname }}</h1>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD --}}
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>

                {{-- IMMAGINE PROFILO UTENTE --}}
                <div>
                    @if(isset($doctor->picture))
                        <img src="{{ asset('storage/' . $doctor->picture) }}" width="200px">
                    @else
                        <img src="" alt="">
                    @endif
                </div>

                <div>
                    <h4>Indirizzo: {{ $doctor->address }}</h4>
                </div>

                <div>
                    <iframe src="{{ asset('storage/' . $doctor->cv) }}" width="50%" height="600"></iframe>
                </div>

                <div>
                    <h4>N. telefono: {{ $doctor->phone }}</h4>
                </div>

                <div>
                    <h4>Prestazioni: {{ $doctor->medical_service }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
