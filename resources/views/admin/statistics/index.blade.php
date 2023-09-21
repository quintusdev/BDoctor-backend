@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12 mt-4 d-flex justify-content-between">
                    {{-- NOME UTENTE --}}
                    <div class="d-flex col-10 align-items-center mt-1">
                        <h1>Benvenuto {{ $user->name }} {{ $user->surname }}</h1>
                    </div>
                    {{-- BUTTON CHE RIPORTA ALLA DASHBOARD --}}
                    <div class="d-flex col-2 align-items-center mt-1">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-8">
                <div class="card">
                    <canvas id="myChart" width="200" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const chartData = {!! json_encode($chartData) !!};

        const config = {
            type: 'bar',
            data: {
                labels: JSON.parse(chartData.labels),
                datasets: [
                    {
                        label: 'Recensioni',
                        data: JSON.parse(chartData.reviewData), // Dati delle recensioni
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Messaggi',
                        data: JSON.parse(chartData.messageData), // Dati dei messaggi
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Imposta l'incremento dell'asse Y a 1 (solo numeri interi)
                            precision: 0 // Imposta la precisione a 0 per avere solo numeri interi
                        }
                    }
                }
            },
        };

        const myChart = new Chart(ctx, config);


    </script>
@endsection
