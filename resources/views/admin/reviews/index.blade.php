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
                                        <h5><em>Recensione:</em></h5>
                                        <h6><strong>{{ $review->text }}</strong></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
