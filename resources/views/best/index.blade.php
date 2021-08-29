<x-app-layout>
<div class="container p-5">
        <div class=" col-lg-12">
                <h4 class="m-3">Formulario de pago de Paypal <i class="fab fa-paypal "></i></h4>
                <div class="card">
                <form class="content-center p-5 needs-validation" action="https://www.sandbox.paypal.com/cgi-bin/webcr" method="POST">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="sb-plisq7239184@business.example.com">
                    <input type="text" name="item_name" readonly value="{{$best->name}}">
                    <input type="hidden" name="item_number" value="cod001">
                    <input type="hidden" name="amount" value="35.00">
                    <input type="hidden" name="tax" value="3">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="currency_code" value="USD">

                    <input type="hidden" name="country" value="ve">
                    <input type="hidden" name="return" value="{{ route('paymen.paypal.success')}}">
                    <input type="submit" value="Pagar con PayPal">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
