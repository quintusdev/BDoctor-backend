@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard di ') }}{{ $user->name }} {{ $user->surname }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <span><em>Qui nella tua dashboard puoi vedere in modo rapido tutto quello che ti serve.</em></span>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    <div class="col w-auto">
                                        <div class="card">
                                            <img src="{{ asset('storage/doctor-profile2.png') }}" style="width:250px;"
                                                class="card-img-top mx-auto" alt="Immagine profilo dottore">
                                            <div class="card-body text-center">
                                                <span class="card-title"><strong>Profilo</strong></span>
                                                <p class="card-text">Vedi e gestisci il tuo profilo</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a href="{{ route('admin.doctors.index') }}"
                                                    class="btn btn-sm btn-primary">Gestisci</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a longer card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a longer card with supporting text below as a
                                                    natural lead-in to additional content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a longer card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="container">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('profile') }} ">Profilo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('messages') }} ">Messaggi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('reviews') }} ">Recensioni</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" {{ route('statistics') }} ">Statistiche</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
