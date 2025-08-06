@extends('admin-layout')
@section('title', 'Payment Processing')
@section('content')
    <h1>Processing.....</h1>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
            "amount": "{{ $amount }}", // Amount is in currency subunits. 
            "currency": "INR",
            "name": "Acme Corp", //your business name
            "description": "Test Transaction",
            'handler': function(response) {
                var paymentId = response.razorpay_payment_id
                alert('Payment Success: ' + paymentId);
            },
            "order_id": "{{ $orderId }}", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                "name": "Gaurav Kumar", //your customer's name
                "email": "gaurav.kumar@example.com",
                "contact": "+919876543210" //Provide the customer's phone number for better conversion rates 
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>
@endsection
