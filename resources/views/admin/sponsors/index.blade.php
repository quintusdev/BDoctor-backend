@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="my-4 text-secondary">Sponsorizza la tua pagina</h2>
            <h6 class="my-4 text-dark"><em>Sponsorizzando il tuo profilo apparirai per primo nelle ricerche e ti
                    permette di avere un bacino di utenza molto più ampio con conseguenti importanti vantaggi!</em></h6>
            <div class="container mt-5">
                <div class="row justify-content-end">
                    <a href="#" class="btn btn-primary mr-3">Dashboard</a>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Scegli un Abbonamento</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="card-body">
                                        @foreach ($sponsors as $sponsor)
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="abbonamento"
                                                    id="abbonamento{{ $sponsor->id }}" value="{{ $sponsor->id }}">
                                                <label class="form-check-label" for="abbonamento{{ $sponsor->id }}">
                                                    Abbonamento {{ $sponsor->name }} - {{ $sponsor->price }}
                                                </label>
                                                <a href="#" class="btn btn-info" data-toggle="collapse"
                                                    data-target="#dettagliAbbonamento{{ $sponsor->id }}">Vedi dettagli</a>
                                                <div class="collapse" id="dettagliAbbonamento{{ $sponsor->id }}">
                                                    <div class="card card-body">
                                                        <!-- Inserisci qui la descrizione e le informazioni sull'abbonamento -->
                                                        Questo è l'abbonamento {{ $sponsor->name }} con un costo mensile di
                                                        {{ $sponsor->price }}. Avrai la visibilità in evidenza per
                                                        {{ $sponsor->duration }} ore. Pagamento non rimobrsabile.
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-success">Vai al Pagamento</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
