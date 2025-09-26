@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=ARbKJ2qFgHQaIDl-ZntKVkuo_VFuFlGgy5jXg_kfopFUxdRJ_SWVGe4G6nd9U4CZNcKu_VuzX_WhC9_q&currency=USD"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '100' // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {

                        window.location.href = 'http://127.0.0.1:8000/hotels/success';
                    });
                }
            }).render('#paypal-button-container');
        </script>

    </div>
    </div>
    </div>
@endsection
