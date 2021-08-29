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
            axios.post('({{route("paypal.success")}})', {
                    //variable qué pusiste en el console.log
                    details
                })
                .then(function(response) {
                    // Código que quieres que se ejecute en dado caso todo fue correcto
                    alert("SE pago y se creo el ticket con exito");
                })
                .catch(function(error) {
                    alert("Se cancelo la vaina nojoda");
                });
        })
    }
}).render('#paypal-payment-button');