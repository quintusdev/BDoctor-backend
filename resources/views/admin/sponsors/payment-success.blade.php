@extends('layouts.admin')

@section('content')
<div class="wrapper">
    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
    </svg>
</div>
<div class="text-center">
    <h1>Pagamento avvenuto con successo! <br> Grazie per il tuo acquisto</h1>
    <a class="btn btn-sm btn-primary p-3 mt-5" href="{{ route('admin.dashboard') }}">Torna alla Dashboard</a>
    {{-- <p>Prodotto: {{ session('product_name') }}</p>
    <p>Prezzo: €{{ session('product_price') }}</p> --}}
</div>
@endsection