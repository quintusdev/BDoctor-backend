@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-4 d-flex justify-content-between">
                    {{-- NOME UTENTE --}}
                    <div class="d-flex col-10 align-items-center mt-1">
                        <h1>Reviews dei pazienti</h1>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD --}}
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>
                {{-- SCHEDE VISUALIZZAZIONE MESSAGGIO --}}
                <div class="row me-5">
                    <div class="col-12 col-md-4">
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="card-content text-center">
                                    <h4 class="mb-4"><strong>{{ $review->name }} {{ $review->surname }}</strong></h4>
                                    <hr>
                                    <h5 class="mb-4">{{ $review->text }}</h5>
                                    <hr>
                                    <small><em>Recensione del {{ $review->created_at }}</em></small>
                                    <hr>
                                    <a href="{{ route('admin.reviews.index', $review->id) }}"
                                        class="btn btn-sm btn-primary">Torna alla lista</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
