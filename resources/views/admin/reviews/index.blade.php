@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-4 d-flex justify-content-between">
                    {{-- NOME UTENTE --}}
                    <div class="d-flex col-10 align-items-center mt-1">
                        <h1>Sezione Recensioni Ricevute</h1>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD --}}
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>
                {{-- VISUALIZZAZIONE REVIEWS ASSOCIATE AL PROFESSIONISTA --}}
                <div class="row me-5">
                    @foreach ($reviews as $review)
                        <div class="col-12 col-md-4">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="card-content text-center">
                                        <h4>Utente: {{ $review->name }} {{ $review->surname }}</h4>
                                        <h5 class="mb-4">E-mail: {{ $review->email }}</h5>
                                        <hr>
                                        <div class="text-center m-1">
                                            @php
                                                $hasValidVotes = false;
                                                foreach ($review->votes as $vote) {
                                                    if ($vote->value !== null && $vote->value > 0) {
                                                        $hasValidVotes = true;
                                                        break;
                                                    }
                                                }
                                            @endphp

                                            @if ($hasValidVotes)
                                                @foreach ($review->votes as $vote)
                                                    <div class="mt-3">
                                                        @for ($i = 0; $i < $vote->value; $i++)
                                                            <i class="fas fa-star" style="color: rgb(248, 233, 98);"></i>
                                                        @endfor
                                                        @for ($i = $vote->value; $i < 5; $i++)
                                                            <i class="far fa-star"></i>
                                                        @endfor
                                                    </div>
                                                    @if (!empty($review->text))
                                                        <hr>
                                                        <a href="{{ route('admin.reviews.show', $review->id) }}"
                                                            class="btn btn-sm btn-primary">Visualizza Recensione</a>
                                                    @endif
                                                @endforeach
                                            @elseif (!empty($review->text))
                                                <div class="mt-3">
                                                    <h6>Nessun voto inserito</h6>
                                                </div>
                                                <hr>
                                                <a href="{{ route('admin.reviews.show', $review->id) }}"
                                                    class="btn btn-sm btn-primary">Visualizza Recensione</a>
                                            @else
                                                <div class="mt-3">
                                                    <h6>Nessun voto inserito</h6>
                                                </div>
                                                <hr>
                                                <button class="btn btn-sm btn-primary" disabled>Visualizza
                                                    Recensione</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
