@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center pt-5">CHECKOUT</h1>
            </div>
            <form id="payment_form" action="{{ route('admin.sponsors.handle-payment') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <h4>Informazioni Destinatario</h4>
                        <hr>  
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="control-label">Nome &ast;</label>
                                <input class="form-control mb-3" type="text" id="name" name="name" required>
                                
                                <label class="control-label">Indirizzo Email &ast;</label>
                                <input class="form-control" type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label">Cognome &ast;</label>
                                <input class="form-control mb-3" type="text" id="surname" name="surname" required>
    
                                <label class="control-label">Telefono</label>
                                <input class="form-control" type="tel" id="phone_number" name="phone_number">
                            </div>
                        </div>
                        <h4 class="mt-4">Indirizzo di fatturazione</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="control-label">Indirizzo &ast;</label>
                                <input class="form-control mb-3" type="text" id="delivery_address" name="delivery_address" required>
                                
                                <label class="control-label">Citt&agrave; &ast;</label>
                                <input class="form-control" type="text" id="city" name="city" required>
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label">Scala, piano, interno, azienda</label>
                                <input class="form-control mb-3" type="text" id="additional_info" name="additional_info">
                                
                                <label class="control-label">CAP &ast;</label>
                                <input class="form-control" type="text" id="zip_code" name="zip_code" required>
                            </div>
                            <div class="col-12">
                                <label class="mt-3">Stato &ast;</label>
                                <select class="form-control" name="state" id="state" required>
                                    <option value="">Seleziona il tuo stato</option>
                                    @php
                                        $jsonPath = base_path('resources/views/admin/sponsors/json/countries.json');
                                        $jsonData = json_decode(file_get_contents($jsonPath), true);
                                        $countries = $jsonData['countries'][0]; // Accedi all'oggetto all'interno dell'array
                                    @endphp
                                    @foreach ($countries as $englishName => $italianName)
                                        <option value="{{ $englishName }}">{{ $italianName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <h4>Riepilogo ordine</h4>
                        <hr>
                        <div class="recap-section">
                            <h5>Recap del tuo ordine:</h5>
                            <p>Prodotto: Abbonamento {{ $product_name }}</p>
                            <p>Prezzo: €{{ $product_price }}</p>
                        </div>
                        <h4 class="mt-5">Modalit&agrave; di pagamento</h4>
                        <hr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div style="margin-top: -10px" id="payment-container"></div>
                        <input type="hidden" name="payment_method_nonce" id="payment_method_nonce">
                        <input type="hidden" name="selected_sponsor" id="selected_sponsor" value="{{ $selectedSponsorId }}">
                        <button class="btn btn-sm btn-primary ps-5 pe-5" type="submit" id="submit_button">Paga</button>
                    </div>
                </div>
                <input type="hidden" name="product_name" value="{{ $product_name }}">
                <input type="hidden" name="product_price" value="{{ $product_price }}">
            </form>
        </div>
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.30.0/js/dropin.min.js"></script>
    <script>
        var button = document.querySelector('#submit_button');
        var form = document.querySelector('#payment_form');
        var paymentMethodNonceInput = document.querySelector('#payment_method_nonce');

        braintree.dropin.create({
            authorization: '{{ $clientToken }}',
            container: '#payment-container'
        }, function (createErr, instance) {
            if (createErr) {
                console.error(createErr);
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }
                    
                    // Inserisci il token di pagamento nel campo nascosto
                    paymentMethodNonceInput.value = payload.nonce;

                    
                    // Invia la form per la simulazione del pagamento
                    form.submit();
                });
            });
        });
    </script>
@endsection
