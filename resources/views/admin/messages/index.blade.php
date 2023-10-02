@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-4 d-flex justify-content-between">
                    {{-- NOME UTENTE --}}
                    <div class="d-flex col-10 align-items-center mt-1 text-secondary">
                        <h2>Sezione Messaggi Ricevuti</h2>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD --}}
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>
                {{-- TABELLA VISUALIZZAZIONE MESSAGGI --}}
                <div class="table-responsive">
                    <table class="table table-striped rounded-table mt-5">
                        <thead>
                            <tr class="table-primary">
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Messaggio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->name }} {{ $message->surname }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->text }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
