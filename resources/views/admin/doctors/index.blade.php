@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="my-4 text-secondary">Il mio profilo</h2>
            <div class="col-12 d-flex justify-content-start">
                {{-- SCHEDA PROFILO PROFESSIONISTA --}}
                <div class="container rounded-5 text-left align-items-center bg-white d-flex">
                    <div class="row d-flex flex-row">
                    {{-- IMMAGINE PROFILO PROFESSIONISTA --}}
                        
                        <div class="col-12 col-sm-4 mt-4 mb-4">
                            <img class="rounded-5 img-fluid mt-2" src="{{ asset('storage/'.$doctor->picture ?? 'storage/doctor-profile2.png') }}" alt="immagine profilo dottore">
                        </div>   

                        <div class="col-12 col-sm-4 mt-4 mb-4">
                            
                            {{-- NOME E COGNOME PROFESSIONISTA --}}
                            <h3>{{ $user->name }} {{ $user->surname }}</h3>
                            {{-- SEZIONE NUMERO TELEFONO --}}
                            <div class="row mt-4">
                                <div class="col">
                                    <p class="n_telefono">N. Telefono:</p>
                                </div>
                                <div class="col">
                                    <p class="n_telefono">{{ $doctor->phone }}</p>
                                </div>
                            </div>
                            <hr class="mt-2">
                            {{-- SEZIONE INDIRIZZO --}}
                            <div class="row mt-2">
                                <div class="col">
                                    <p class="n_telefono">Indirizzo:</p>
                                </div>
                                <div class="col">
                                    <p class="n_telefono">{{ $doctor->address }}</p>
                                </div>
                            </div>
                            <hr class="mt-2">
                        </div>

                            <div class="col-12 col-sm-4 mt-4 mb-4">
                                {{-- SEZIONE DETTAGLIO PROFILO --}}
                                <div class="row mt-2">
                                    {{-- PULSANTE VISUALIZZA PROFILO --}}
                                    <div class="col">
                                        <h5>Visualizza</h5>
                                        <a class="d-flex btn btn-info btn-md justify-content-center mt-4" title="Visualizza profilo"
                                            href="{{ route('admin.doctors.show', $doctor->id) }}"><i class="fas fa-eye"></i></a>
                                    </div>
                                    {{-- PULSANTE EDIT PROFILO --}}
                                    <div class="col">
                                        <h5>Modifica</h5>
                                        <a class="d-flex btn btn-warning btn-md justify-content-center mt-4"
                                            title="Modifica profilo" href="{{ route('admin.doctors.edit', $doctor->id) }}"><i
                                                class="fas fa-pen"></i></a>
                                    </div>
                                </div>
                                {{-- PULSANTE SPONSORIZZAZIONE --}}
                                <div class="row mt-5">
                                    <div class="col">
                                        <a class="btn btn-success btn-md" href=" {{ route('admin.sponsors.index', $doctor->id) }}">
                                            <i class="fa-solid fa-receipt fa-lg"></i>
                                            Metti in evidenza!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
