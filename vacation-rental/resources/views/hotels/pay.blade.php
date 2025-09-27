@extends('layouts.app')

@section('content')
    <div class="hero-wrap js-fullheight"
        style="margin-top: -25px; background-image: url('{{ asset('assets/images/room-1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-12 ftco-animate">
                    <h1 style="margin-left: 200px" class="subheading">Pay with PayPal</h1>

                    <div class="col-md-6 text-center">
                        <h3 class="mb-4 text-white">Amount: ${{ Session::get('price', 0.00) }}</h3>
                    </div>
                    {{-- <p><a href="{{ route('home') }}" class="btn btn-primary">Go Home</a></p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script
            src="https://www.paypal.com/sdk/js?client-id=ARbKJ2qFgHQaIDl-ZntKVkuo_VFuFlGgy5jXg_kfopFUxdRJ_SWVGe4G6nd9U4CZNcKu_VuzX_WhC9_q&currency=USD">
        </script>
        <!-- Set up a container element for the button -->
        <div style="margin-top: -220px; margin-left: 100px" id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                createOrder: (data, actions) => {
                    // Get the price from session
                    const price = '{{ Session::get('price') }}';

                    // Check if price is valid
                    if (!price || price === '' || isNaN(parseFloat(price))) {
                        alert('Payment amount is not set. Please try booking again.');
                        return false;
                    }

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: price,
                                currency_code: 'USD'
                            }
                        }]
                    });
                },
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {
                        window.location.href = 'http://127.0.0.1:8000/hotels/success';
                    });
                },
                onError: (err) => {
                    console.error('PayPal Error:', err);
                    alert('Payment failed: ' + err.message);
                }
            }).render('#paypal-button-container');
        </script>

    </div>
@endsection
