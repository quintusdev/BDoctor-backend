<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;


class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ottieni l'ID dell'utente attualmente autenticato
        $user_id = Auth::id();

        // Ottieni l'oggetto dell'utente attualmente autenticato
        $user = Auth::user();

        // Esegui una query per ottenere il conteggio dei messaggi per mese/anno dell'utente autenticato
        $messageCounts = Message::select(
            DB::raw('YEAR(created_at) as year'),    // Estrai l'anno dalla data di creazione
            DB::raw('MONTH(created_at) as month'),  // Estrai il mese dalla data di creazione
            DB::raw('COUNT(*) as count')           // Conta i messaggi
        )
        ->where('user_id', $user_id) // Filtra i messaggi dell'utente autenticato
        ->groupBy('year', 'month')    // Raggruppa per anno e mese
        ->orderBy('year', 'asc')      // Ordina per anno in ordine ascendente
        ->orderBy('month', 'asc')     // Ordina per mese in ordine ascendente
        ->get();

        // Inizializza due array vuoti per le etichette e i dati del grafico
        $labels = []; // Conterrà le etichette per il grafico (formato: "mese/anno")
        $data = [];   // Conterrà il conteggio dei messaggi per ogni mese/anno

        // Itera sui risultati della query per costruire gli array
        foreach ($messageCounts as $messageCount) {
            // Crea un'etichetta nel formato "mese/anno" (ad esempio "01/2023")
            $labels[] = $messageCount->month . '/' . $messageCount->year;
            // Aggiungi il conteggio dei messaggi ai dati
            $data[] = $messageCount->count;
        }

        // Passa i dati alla vista nel formato richiesto (convertono in formato JSON per il grafico)
        $chartData = [
            'labels' => json_encode($labels),
            'data' => json_encode($data),
        ];
        
        return view('admin.statistics.index', compact('user', 'user_id'), [
            'labels' => json_encode($labels),
            'data' => json_encode($data),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
