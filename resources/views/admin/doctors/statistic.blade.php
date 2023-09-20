@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="my-4 text-secondary">Statistiche</h2>
        <div class="col-12 d-flex justify-content-start">
            <div class="bg-white rounded-5 text-left d-flex align-items-center p-1">
                <img class="rounded-5 m-4" src="{{ asset('storage/doctor-profile2.png') }}" alt="immagine profilo dottore"
                    style="width: 300px">
                <div class="m-3 justify-content-center p-4">
                    <h3>{{ $user->name }} {{ $user->surname }}</h3>
                    <div class="row mt-4">
                        <div class="col">
                            <p class="n_telefono">N. Telefono</p>
                        </div>
                        <div class="col">
                            <p class="n_telefono">{{ $doctor->phone }}</p>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="row mt-2">
                        <div class="col">
                            <p class="n_telefono">Indirizzo</p>
                        </div>
                        <div class="col">
                            <p class="n_telefono">{{ $doctor->address }}</p>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="row mt-2">
                        <div class="col">
                            <h5>Visualizza</h5>
                            <a class="d-flex btn btn-info btn-md justify-content-center mt-4" title="Visualizza profilo"
                                href="{{ route('admin.doctors.show', $doctor->id) }}"><i class="fas fa-eye"></i></a>
                        </div>
                        <div class="col">
                            <h5>Modifica</h5>
                            <a class="d-flex btn btn-warning btn-md justify-content-center mt-4"
                                title="Modifica profilo" href="{{ route('admin.doctors.edit', $doctor->id) }}"><i
                                    class="fas fa-pen"></i></a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <a class="btn btn-success btn-md" href="{{-- {{ route('admin.sponsor.show', $doctor->id) }} --}}">
                                <i class="fa-solid fa-receipt fa-lg"></i>
                                Metti in evidenza!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
