@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="col-12 col-md-6 mt-4 mx-2 text-secondary">
                        <h2>Modifica il tuo profilo</h2>
                    </div>
                    <div class="col-12 col-md-6 mt-5 mx-2">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>

                {{-- FORM DI EDIT DEL PROFILO --}}
                <div>
                    <form action="{{ route('admin.doctors.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{-- TOKEN --}}
                        @csrf
                        @method('PUT')
                        {{-- MODIFICA CAMPO NOME --}}
                        <div class="form-group col-12 col-md-6 mt-4">
                            <h5><strong>Nome:</strong></h5>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" name="name"
                                id="name" placeholder="Nome" value="{{ old('name') ?? $user->name }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- MODIFICA CAMPO COGNOME --}}
                        <div class="form-group col-12 col-md-6 mt-4">
                            <h5><strong>Cognome:</strong></h5>
                            <input class="form-control @error('surname')is-invalid @enderror" type="text" name="surname"
                                id="surname" placeholder="Cognome" value="{{ old('surname') ?? $user->surname }}" required>
                            @error('surname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6 mt-4">
                            <label for="phone"><strong>Modifica Numero di Telefono:</strong></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" id="phone" placeholder="Numero di Telefono" value="{{ old('phone') ?? $doctor->phone }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- MODIFICA IMMAGINE DI PROFILO --}}
                        <div class="form-group col-12 col-md-6 mt-4">
                            <div>
                                <h5><strong>Inserisci o aggiorna la tua immagine profilo:</strong></h5>
                                @if(isset($doctor->picture))
                                    <img src="{{ asset('storage/' . $doctor->picture) }}" class="img_profile img-fluid" >
                                @else
                                    <img src="{{ asset('storage/profile_default.jpg') }}" alt="immagine di default" class="img_profile img-fluid">
                                @endif
                            </div>
                            <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture"
                                id="picture">
                        </div>

                        {{-- MODIFICA SPECIALIZZAZIONI --}}
                        <div class="form-group col-12 col-md-6 mt-4">
                            <div class="mt-2 mb-4">
                                <h4><strong>Seleziona le tue Specializzazioni:</strong></h4>
                                @foreach ($specializations as $specialization)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="specializations[]"
                                            value="{{ $specialization->id }}"
                                            {{ in_array($specialization->id, old('specializations', $doctor->specializations->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <label class="form-check-label me-2" for="flexSwitchCheckDefault">
                                            {{ $specialization->name }}</label>
                                    </div>
                                @endforeach
                                @error('specializations')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- CARICAMENTO FILE CV --}}
                            <div>
                                <h4><strong>Inserisci il tuo curriculum:</strong></h4>
                            </div>
                            @if(isset($doctor->cv))
                                <div class="container-fluid">
                                    <iframe src="{{ asset('storage/' . $doctor->cv) }}" width="100%" height="400px"></iframe>
                                </div>
                            @else
                                {{-- <img src="{{ asset('storage/') }}" alt="immagine di default"> --}}
                            @endif
                            <div class="form-group col-12 col-md-6 mt-4">
                                <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv"
                                    id="cv">
                            </div>


                            {{-- <label class="contol-lable">Descrizione Specializzazione</label>
                                <input class="form-control @error('description')is-invalid @enderror" type="text"
                                    description="description" id="description" placeholder="Descrizione"
                                    value="{{ old('description') ?? $specializations->description }}"> --}}
                            {{-- @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror --}}
                            {{-- @error('cv')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        {{-- @error('technologies')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror --}}
                        {{-- PULSANTE DI SALVATAGGIO DELLE MODIFICHE --}}
                        <div class="form-group mt-4 mb-5">
                            <button class="btn btn-sm btn-success" type="submit">Salva</button>
                        </div>
                    </form>
                </div>

                {{--  <div class="form-group mt-4">
                            <label class="contol-lable">Contenuto</label>
                            <textarea class="form-control" name="content" id="content" placeholder="Contenuto">{{ old('content') ?? $project->content }}</textarea>
                        </div> --}}

            </div>
        </div>
    </div>
    </div>
@endsection
