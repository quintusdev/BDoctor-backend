@extends('layouts.admin')

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="my-4 text-dark">Sponsorizza la tua pagina</h2>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary">Torna alla Dashboard</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 text-dark text-center">
                    <h6 class="my-4"><em>Sponsorizzando il tuo profilo apparirai per primo nelle ricerche e ti permette di
                            avere un bacino di utenza molto più ampio con conseguenti importanti vantaggi!</em></h6>
                    <img class="mt-3 justify-content-center" style="width: 400px"
                        src="{{ asset('storage/credit-card.png') }}" alt="Immagine Sponsor Page">
                </div>
                <div class="col-md-7 align-items-center mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Scegli un Abbonamento</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sponsors.simulate-payment') }}" method="POST">
                                @csrf
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    @foreach ($sponsors as $sponsor)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse{{ $sponsor->id }}"
                                                    aria-expanded="false" aria-controls="flush-collapse{{ $sponsor->id }}">
                                                    <input type="radio" name="selected_sponsor" class="sponsor-option" value="{{ $sponsor->id }}" > Abbonamento {{ $sponsor->name }} - €
                                                    {{ $sponsor->price }}
                                                </button>
                                            </h2>
                                            <div id="flush-collapse{{ $sponsor->id }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading{{ $sponsor->id }}"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">Con l'abbonamento
                                                    <strong><em>{{ $sponsor->name }}</em></strong>,
                                                    usufruirai
                                                    della posizione <em>"In evidenza"</em> nelle pagine di ricerca per
                                                    <strong>{{ $sponsor->duration }} ore</strong>. Una volta che il
                                                    pagamento è andato a buon fine potrai godere di questi vantaggi,
                                                    incrementando la possibilità di essere contattato da nuovi pazienti.
                                                    <small><em><strong>N.B. Pagamento
                                                                NON rimborsabile.</strong></em></small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- input nascosti per il nome e il prezzo del prodotto --}}
                                <input type="hidden" name="product_name" id="product_name" value="">
                                <input type="hidden" name="product_price" id="product_price" value="">
                                <div class="mt-1 mb-3 text-center">
                                    <button type="submit" class="btn btn-success mx-auto w-50">
                                        <i class="fa-regular fa-credit-card fa-lg"></i> Sottoscrivi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ascolta il cambio nell'input radio
        const radioButtons = document.querySelectorAll('.sponsor-option');
        const productNameInput = document.querySelector('#product_name');
        const productPriceInput = document.querySelector('#product_price');
        const subscribeButton = document.querySelector('button[type="submit"]');

        // Funzione per abilitare/disabilitare il pulsante "Sottoscrivi"
        function updateSubscribeButton() {
            const selectedRadio = document.querySelector('input[name="selected_sponsor"]:checked');
            if (selectedRadio) {
                subscribeButton.disabled = false;
            } else {
                subscribeButton.disabled = true;
            }
        }
    
        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', function() {
                if (this.checked) {
                    // Estrai il nome e il prezzo dalla stringa dell'opzione selezionata
                    const optionText = this.parentElement.textContent.trim();
                    const matches = optionText.match(/Abbonamento (.+) - €(.+)/);
                    if (matches) {
                        productNameInput.value = matches[1];
                        productPriceInput.value = matches[2];
                    }
                }
                // Aggiorna lo stato del pulsante "Sottoscrivi"
                updateSubscribeButton();
            });
        });
        // Inizialmente disabilita il pulsante "Sottoscrivi"
        updateSubscribeButton();
    </script>
@endsection
