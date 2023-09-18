@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-4 d-flex justify-content-between">
                    {{-- <div>
                        @if (!empty($doctor->picture))
                            <img src="{{ asset('storage/public/images' . $doctor->picture) }}" alt="Immagine Profilo"
                                class="image_show card product_card" style="width: 300px">
                        @else
                            <img src="{{ asset('storage/public/images' . $doctor->immagine_predefinita) }}"
                                alt="Immagine Predefinita">
                        @endif
                    </div> --}}
                    {{-- NOME UTENTE --}}
                    <div class="d-flex col-10 align-items-center mt-1">
                        <h1>Benvenuto {{ $user->name }} {{ $user->surname }}</h1>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD --}}
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>

                @foreach ($messages as $message)
                    <h4>{{ $message->name }}</h4>
                    <h4>{{ $message->surname }}</h4>
                    <h5>{{ $message->email }}</h5>
                    <h5>{{ $message->text }}</h5>
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary">Visualizza
                            Messaggio</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
