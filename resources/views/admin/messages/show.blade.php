@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-4 d-flex justify-content-between">
                    {{-- NOME UTENTE --}}
                    <div class="d-flex col-10 align-items-center mt-1">
                        <h1>Messaggio di {{ $message->name }} {{ $message->surname }}</h1>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD --}}
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>
                <div class="row me-5">
                    <div class="col-12 col-md-4">
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="card-content text-center">
                                    <h5 class="mb-4">{{ $message->text }}</h5>
                                    <hr>
                                    <small><em>Messaggio inviato il {{ $message->created_at }}</em></small>
                                    <hr>
                                    <a href="{{ route('admin.messages.index', $message->id) }}"
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
