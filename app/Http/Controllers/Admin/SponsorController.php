<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use Braintree\Gateway;
use Braintree\Transaction;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getProductDetails($selectedSponsorId)
    {
        $selectedSponsor = Sponsor::find($selectedSponsorId);

        if (!$selectedSponsor) {
            // Gestisci l'ID non trovato
        }

        $product_name = $selectedSponsor->name;
        $product_price = $selectedSponsor->price;

        return [
            'product_name' => $product_name,
            'product_price' => $product_price,
        ];
    }

    public function simulatePayment(StoreSponsorRequest $request)
    {
        // Inizializza la tua configurazione di Braintree
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);


        // Genera un token di pagamento di test
        $clientToken = $gateway->clientToken()->generate();

        $selectedSponsorId = $request->input('selected_sponsor');

        $productDetails = $this->getProductDetails($selectedSponsorId);

        $product_name = $productDetails['product_name'];
        $product_price = $productDetails['product_price'];

        return view('admin.sponsors.simulate-payment', compact('clientToken', 'selectedSponsorId', 'productDetails', 'product_name', 'product_price'));
    }

    public function handleSimulatedPayment(StoreSponsorRequest $request)
    {
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);

        // Ottieni i dati inviati dal modulo di pagamento
        $paymentData = $request->only(['payment_method_nonce']);
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');

        $selectedSponsorId = $request->input('selected_sponsor');

        $selectedSponsor = Sponsor::find($selectedSponsorId);

        if (!$selectedSponsor) {
            // Gestisci l'ID non trovato
        }

        // Effettua la simulazione della transazione
        $result = $gateway->transaction()->sale([
            'amount' => $selectedSponsor->price,
            'paymentMethodNonce' => $paymentData['payment_method_nonce'],
            'options' => [
                'submitForSettlement' => true, // Completa la simulazione come una transazione reale
            ],
        ]);


        if ($result->success) {
            // La simulazione di pagamento è andata a buon fine
            // Acquista l'abbonamento
            $doctor = Auth::user()->doctor; // Assume che l'utente autenticato sia un dottore
            $doctorId = $doctor->id;
            $sponsorId = $selectedSponsorId;
            $durationInHours = $selectedSponsor->duration;
            $expireDate = now()->addHours($durationInHours);

            // Eseguo una query diretta per inserire i dati nella tabella ponte
            DB::table('sponsor_doctor')->insert([
                'sponsor_id' => $sponsorId,
                'doctor_id' => $doctorId,
                'expire_date' => $expireDate,
            ]);

            // Salva i dati nella sessione
            session(['product_name' => $product_name, 'product_price' => $product_price]);
            return view('admin.sponsors.payment-success', compact('product_name', 'product_price'));
        } else {
            // La simulazione di pagamento ha fallito
            // Gestisci l'errore e mostra un messaggio all'utente
            //codice per genereare clientToken
            $clientToken = $gateway->clientToken()->generate();
            $errors = ["pagamento rifiutato"];
            return view('admin.sponsors.simulate-payment', compact('clientToken', 'selectedSponsorId', 'product_name', 'product_price'))->withErrors(['payment' => 'pagamento rifiutato']);
        }
    }

    public function index()
    {
        // Ottieni l'ID dell'utente attualmente autenticato
        $user_id = Auth::id();

        // Ottieni l'oggetto dell'utente attualmente autenticato
        $user = Auth::user();

        // Cerca il dottore associato all'utente corrente utilizzando l'ID utente
        $doctors = Doctor::where('user_id', $user_id)->first();

        // Ottieni il dottore associato all'utente utilizzando la relazione definita nel modello User
        $doctor = $user->doctor;

        //Recupero tutti i dati all'interno di sponsor
        $sponsors = Sponsor::all();

        // Restituisci la vista 'admin.sponsors.index' passando i dati alla vista
        return view('admin.sponsors.index', compact('sponsors', 'user', 'user_id', 'doctor', 'doctors'));
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
     * @param  \App\Http\Requests\StoreSponsorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSponsorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        // Ottieni l'ID dell'utente attualmente autenticato
        $user_id = Auth::id();

        // Ottieni l'oggetto dell'utente attualmente autenticato
        $user = Auth::user();

        // Cerca il dottore associato all'utente corrente utilizzando l'ID utente
        $doctors = Doctor::where('user_id', $user_id)->first();

        // Ottieni il dottore associato all'utente utilizzando la relazione definita nel modello User
        $doctor = $user->doctor;

        // Recupera tutti i record dalla tabella "sponsors"
        $sponsors = Sponsor::all();

        // Restituisci la vista 'admin.sponsors.index' passando i dati alla vista
        return view('admin.sponsors.index', compact('sponsors', 'user', 'user_id', 'doctor', 'doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorRequest  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
