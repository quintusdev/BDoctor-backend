@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="my-4 text-secondary">Il mio profilo</h2>
            <div class="col-12 d-flex justify-content-center">
                <div class="bg-white rounded-5 text-center">
                    <img class="rounded-top-5" src="{{ asset('storage/doctor-profile2.png') }}" alt="immagine profilo dottore"
                        style="width: 300px">
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
                    <div class="row mt-4">
                        <div class="col">
                            <h5>Visualizza</h5>
                            <a class="btn btn-info btn-sm" title="Visualizza profilo"
                                href="{{ route('admin.doctors.show', $doctor->id) }}"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="col">
                            <h5>Modifica</h5>
                            <a class="btn btn-warning btn-sm" title="Modifica profilo"
                                href="{{ route('admin.doctors.edit', $doctor->id) }}"><i class="fas fa-pen"></i></a>
                        </div>
                    </div>
                    <div class="row mt-2 mb-3">
                        <div class="col">
                            <a class="btn btn-success btn-md mt-4" href={{-- "{{ route('admin.sponsor.show', $doctor->id) }}" --}}>
                                <i class="fa-solid fa-receipt fa-lg"></i>
                                Metti in evidenza il tuo profilo!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
