@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard BDoctor') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard di ') }}{{ $user->name }} {{ $user->surname }}</div>
                    <div class="card-body">
                        {{-- CONTENUTO DASHBOARD --}}
                        <div class="row">
                            <div class="col-12">
                                {{-- SEZIONE SCHEDE --}}
                                <div class="section_our_solution">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="our_solution_category">
                                                <div class="solution_cards_box">
                                                    {{-- SCHEDA PROFILO PROFESSIONISTA --}}
                                                    <div class="solution_card">
                                                        <div class="hover_color_bubble"></div>
                                                        <div class="so_top_icon">
                                                            <svg id="Layer_1" enable-background="new 0 0 512 512"
                                                                height="300" viewBox="0 0 512 512" width="300">
                                                                <image x="0" y="0" width="100%"
                                                                    height="100%"
                                                                    xlink:href="{{ asset('storage/doctor-profile2.png') }}" />
                                                            </svg>
                                                        </div>
                                                        <div class="solu_title">
                                                            <h3>Profilo</h3>
                                                        </div>
                                                        <div class="solu_description">
                                                            <p>
                                                                Da questa sezione puoi vedere e modificare e gestire il
                                                                tuo profilo in maniera completa.
                                                            </p>
                                                            <div>
                                                                <a href="{{ route('admin.doctors.index') }}"
                                                                    class="btn btn-md btn-success">Gestisci</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- SCHEDA MESSAGGI RICEVUTI --}}
                                                    <div class="solution_card">
                                                        <div class="hover_color_bubble"></div>
                                                        <div class="so_top_icon">
                                                            <svg id="Layer_1" enable-background="new 0 0 512 512"
                                                                height="300" viewBox="0 0 512 512" width="300">
                                                                <image x="0" y="0" width="100%"
                                                                    height="100%"
                                                                    xlink:href="{{ asset('storage/message.png') }}" />
                                                            </svg>
                                                        </div>
                                                        <div class="solu_title">
                                                            <h3>Messaggi ricevuti</h3>
                                                        </div>
                                                        <div class="solu_description">
                                                            <p>
                                                                Da questa sezione puoi visualizzare i messaggi che
                                                                ricevi dai pazienti per fissare un appuntamento.
                                                            </p>
                                                            <div>
                                                                <a href="{{ route('admin.messages.index') }}"
                                                                    class="btn btn-md btn-success">Visualizza</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- SCHEDA REVIEWS PAZIENTI --}}
                                                    <div class="solution_card">
                                                        <div class="hover_color_bubble"></div>
                                                        <div class="so_top_icon">
                                                            <svg id="Layer_1" enable-background="new 0 0 512 512"
                                                                height="300" viewBox="0 0 512 512" width="300">
                                                                <image x="0" y="0" width="100%"
                                                                    height="100%"
                                                                    xlink:href="{{ asset('storage/rating.png') }}" />
                                                            </svg>
                                                        </div>
                                                        <div class="solu_title">
                                                            <h3>Recensioni</h3>
                                                        </div>
                                                        <div class="solu_description">
                                                            <p>
                                                                Da questa sezione puoi vedere le recensioni che ti sono
                                                                state lasciate dai tuoi pazienti.
                                                            </p>
                                                            <div>
                                                                <a href="{{ route('admin.reviews.index') }}"
                                                                    class="btn btn-md btn-success">Visualizza</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- SCHEDA STATISTICHE --}}
                                                    <div class="solution_card">
                                                        <div class="hover_color_bubble"></div>
                                                        <div class="so_top_icon">
                                                            <svg id="Layer_1" enable-background="new 0 0 512 512"
                                                                height="300" viewBox="0 0 512 512" width="300">
                                                                <image x="0" y="0" width="100%"
                                                                    height="100%"
                                                                    xlink:href="{{ asset('storage/analitycs.png') }}" />
                                                            </svg>
                                                        </div>
                                                        <div class="solu_title">
                                                            <h3>Statistiche Profilo</h3>
                                                        </div>
                                                        <div class="solu_description">
                                                            <p>
                                                                Da questa sezione puoi vedere le statistiche del tuo
                                                                profilo, inclusi i grafici in base alle tue esigenze.
                                                            </p>
                                                            <div>
                                                                <a href="{{ route('admin.statistics.index') }}"
                                                                    class="btn btn-md btn-success">Visualizza</a>
                                                            </div>
                                                        </div>
                                                    </div>
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
