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

        // Estrai i dati dai tuoi oggetti chartData
        const labels = JSON.parse({!! json_encode($chartData['labels']) !!});
        const messageData = JSON.parse({!! json_encode($chartData['messageData']) !!});
        const reviewData = JSON.parse({!! json_encode($chartData['reviewData']) !!});

        const config = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Messaggi',
                        data: messageData,
                        fill: false,
                        backgroundColor: 'rgba(255, 205, 86, 0.2)',
                        borderColor: 'rgb(255, 205, 86)',
                        borderWidth: 1,
                        yAxisID: 'y', // Inverti l'asse, ora è l'asse y
                    },
                    {
                        label: 'Recensioni',
                        data: reviewData,
                        fill: false,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        borderWidth: 1,
                        yAxisID: 'y', // Inverti l'asse, ora è l'asse y
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        position: 'bottom',
                        ticks: {
                            stepSize: 1,
                            precision: 0,
                        },
                    },
                    y: {
                        reverse: true, // Inverti l'asse y, ora mostra i mesi
                    },
                },
            },
        };

        const myChart = new Chart(ctx, config);
    </script>
@endsection
