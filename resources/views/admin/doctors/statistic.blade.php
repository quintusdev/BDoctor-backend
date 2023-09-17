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
                <div >
                    <img src="{{ asset('storage/' . $doctor->picture) }}" width="300px">
                </div>

                <div>
                    <h4>Indirizzo: {{ $doctor->address }}</h4>
                </div>

                <div>
                    <h4>CV: {{ $doctor->cv }}</h4>
                    <iframe src="{{ asset('folder/file_name.pdf') }}" width="50%" height="600">
                    </iframe>
                </div>

                <div>
                    <h4>N. telefono: {{ $doctor->phone }}</h4>
                </div>

                <div>
                    <h4>Prestazioni: {{ $doctor->medical_service }}</h4>
                </div>
                {{-- <div>
                    <strong>Tecnologie:</strong>
                    @if ($project->technologies)
                        @foreach ($project->technologies as $technology)
                            <a href="">{{ $technology->name }}</a>
                        @endforeach
                    @endif
                </div> --}}

                {{-- <p>
                    {{ $project->content }}
                </p> --}}
            </div>
        </div>
    </div>
@endsection
