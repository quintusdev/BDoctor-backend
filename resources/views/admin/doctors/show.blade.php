@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <div>
                        <h1>{{ $user->name }} {{ $user->surname }}</h1>
                    </div>
                    
                    <div>
                        <img src="{{ asset('storage/'.$doctor->picture) }}" width="500px">
                    </div>

                    <div>
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Dashboard</a>
                    </div>
                </div>

                <div>
                    <h4>Indirizzo: {{ $doctor->address }}</h4>
                </div>

                <div>
                    <h4>CV: {{ $doctor->cv }}</h4>
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
