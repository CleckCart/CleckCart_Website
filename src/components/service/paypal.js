paypal.Buttons({
    style : {
        color: 'gold',
        shape: 'rect'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: amount.toString()
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.href = './success.php';
        })
    }
}).render('#paypal-payment-button');