<x-app-layout>

    <!--Contenido principal-->
<div class="container p-4">

    <div class="mb-3 row">
        <div class="col-md-8 themed-grid-col">
            <div class="container">
                <div class="card">
                        <div class="p-4 bg-gray-200">
                                <h1 class="titulo">{{$best->name}}</h1>
                                    <div class="mb-2">
                                        {{$best->extract}}
                                    </div>
                                <figure>
                                    <img class="object-cover object-center w-full p-10 h-80" src="{{Storage::url($best->image->url)}}" alt="imagen de la apuesta">
                                </figure>
                                <div class="mt-4 text-base text-gray-700">
                                        {{$best->body}}
                                </div>
                            <div>
                                <hr>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPayPal">
                                Apostar con paypal
                                </button>

                            </div>
                        </div>
                </div>
            </div>
        </div>


    <!-- Modal -->

    <div class="modal fade" id="modalPayPal" tabindex="-1" aria-labelledby="PayPalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center modal-title" id="PayPalModalLabel">Formulario de pago de Paypal <i class="fab fa-cc-paypal"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                    <label for="item_name" class="form-label">Juego al que apuesta </label>
                    <input type="text" name="item_name" id="item_name" class="form-control" readonly value="{{$best->name}}">
                    <input type="hidden" name="item_number" value="{{$best->id}}">

                    <label for="amount" class="form-label">Cantidad a apostar</label>
                    <input type="number" class="form-control" name="amount" id="amount" min="1" max="50">

                    <div class="form-group">
                        <label for="types">Seleccione tipo de apuesta :  </label>
                        <select id="types" class="form-control" name="types">
                            @foreach ($types as $type )
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div id="paypal-payment-button">
                        <button type="submit"></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Modal -->
        <div class="col-6 col-md-4 themed-grid-col" _msthash="791648" _msttexthash="212316">
            <aside>
                    <h1 class="mb-4 font-bold text-gray-700 tex-2xl">Apuestas similares </h1>
                    <ul>
                        @foreach ($similares as $similar )
                            <li class="mb-4">
                                <a href="{{route('home.show', $similar)}}" class="flex">
                                    <img class="object-cover object-center h-20 w-36" src="{{Storage::url($similar->image->url)}}" alt="">
                                        <span class="ml-2 text-gray-700">{{$similar->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
        </div>
    </div>

</div>

<script src="https://www.paypal.com/sdk/js?client-id=AUPrXRu_FzmfgcDq7qsJWPOkXsn30CYIMikcWO2_9Lt4k6-YLVRnYo8c0VAOHWy-Ckw2TcbwqfGPkNTQ&disable-funding=credit,card"></script>
    <script>

        function value() {
            var amount = document.getElementById("amount").value;

        }
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "34"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(details);
                    axios.post('{{route("paypal.success")}}', {
                        //variable qué pusiste en el console.log
                        details
                    })
                        .then(function(response) {
                            // Código que quieres que se ejecute en dado caso todo fue correcto
                          console.log(response);
                        })
                        .catch(function(error) {
                            alert("Se cancelo la vaina nojoda");
                        });
                })
            }
        }).render('#paypal-payment-button');

    </script>


{{--<script src="{{ asset('./js/index.js')}}"></script>--}}
</x-app-layout>
