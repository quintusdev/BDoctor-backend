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

                @foreach ($reviews as $review)
                    <h4>Nome: {{ $review->name }}</h4>
                    <h4>Cognome: {{ $review->surname }}</h4>
                    <h5>E-Mail: {{ $review->email }}</h5>
                    @if ($review->pivot)
                        <h5>Voto: {{ $review->pivot->vote }}</h5>
                    @else
                        <h5>Nessun voto disponibile</h5>
                    @endif
                    <h5>Recensione: {{ $review->text }}</h5>
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-sm btn-primary">Visualizza
                            Recensioni</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
