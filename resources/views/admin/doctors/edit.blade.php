@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1>Modifica il tuo profilo</h1>
                    </div>

                    <div>
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Dashboard</a>
                    </div>
                </div>

                <div>
                    <form action="{{ route('admin.doctors.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-3 mt-4">
                            <h5><strong>Nome:</strong></h5>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" name="name"
                                id="name" placeholder="Nome" value="{{ old('name') ?? $user->name }}">
                            {{-- @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="form-group col-3 mt-4">
                            <h5><strong>Cognome:</strong></h5>
                            <input class="form-control @error('surname')is-invalid @enderror" type="text" name="surname"
                                id="surname" placeholder="Cognome" value="{{ old('surname') ?? $user->surname }}">
                            {{-- @error('surname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="form-group col-3 mt-4">
                            <div>
                                <h5><strong>Inserisci la tua immagine profilo:</strong></h5>
                                <img src="{{ asset('storage/' . $doctor->picture) }}" width="500px">
                            </div>
                            <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture"
                                id="picture">
                            {{-- @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <div class="form-group mt-4">
                            <div class="mt-2">
                                <h4><strong>Seleziona le tue Specializzazioni:</strong></h4>
                                @foreach ($specializations as $specialization)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="specializations[]" value="{{ $specialization->id }}">
                                        <label class="form-check-label me-2"
                                            for="flexSwitchCheckDefault">{{ $specialization->name }}</label>
                                    </div>
                                @endforeach
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

                        {{--  <div class="form-group mt-4">
                            <div>Seleziona la tecnologia</div>
                            @foreach ($technologies as $technology)
                                <div class="form-check @error('technology') is-invalid @enderror">
                                    @if ($errors->any())
                                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                            class="form-check-input"
                                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                    @else
                                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                            class="form-check-input"
                                            {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                                    @endif
                                    <label class="form-check-label">
                                        {{ $technology->name }}
                                    </label>
                                </div>
                            @endforeach --}}
                        {{-- @error('technologies')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror --}}

                        <div class="form-group mt-4">
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
