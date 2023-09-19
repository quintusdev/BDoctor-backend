@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="my-4 text-secondary">Il mio profilo</h2>
            <div class="col-12 d-flex justify-content-center">
                <div class="bg-white rounded-5 text-center">
                    <img class="rounded-top-5" src="{{ asset('storage/doctor-profile2.png') }}" alt="immagine profilo dottore" style="width: 400px">
                    <h3 class="mt-2">{{ $user->name }} {{ $user->surname }}</h3>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="text-center n_telefono">N. Telefono</p>
                        </div>
                        <div class="col">
                            <p class="text-center n_telefono">{{ $doctor->phone }}</p>
                        </div>
                        <hr class="text-center" style="width: 80%; margin: auto; margin-top: -13px ">
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="text-center n_telefono">Indirizzo</p>
                        </div>
                        <div class="col">
                            <p class="text-center n_telefono">{{ $doctor->address }}</p>
                        </div>
                        <hr class="text-center" style="width: 80%; margin: auto; margin-top: -13px ">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h1>Il tuo Profilo</h1>
                 @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">N. Telefono</th>
                            <th scope="col">Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $doctor->address }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>
                                <a class="btn btn-info btn-sm me-2" title="Visualizza profilo"
                                    href="{{ route('admin.doctors.show', $doctor->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-warning btn-sm" title="Modifica profilo"
                                    href="{{ route('admin.doctors.edit', $doctor->id) }}"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-success btn-md mt-4" href="{{ route('admin.sponsor.show', $doctor->id) }}">
                    <i class="fa-solid fa-receipt fa-lg"></i>
                    Metti in evidenza il tuo profilo!</a>
            </div>
        </div>
    </div> --}}
@endsection
