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
                {{-- TABELLA VISUALIZZAZIONE REVIEWS --}}
                <div class="table-responsive">
                    <table class="table table-striped rounded-table mt-5">
                        <thead>
                            <tr>
                                <th>Utente</th>
                                <th>E-mail</th>
                                <th>Recensione</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review->name }} {{ $review->surname }}</td>
                                    <td>{{ $review->email }}</td>
                                    <td>{{ $review->text }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
