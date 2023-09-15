@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h1>Portale dei Professionisti</h1>
                {{-- @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif --}}
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
                                <a class="btn btn-info btn-sm" href="{{ route('admin.doctors.show', $doctor->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.doctors.edit', $doctor->id) }}"><i
                                        class="fas fa-pen"></i></a>
                                <form class="d-inline-block delete-doctor-form"
                                    action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
