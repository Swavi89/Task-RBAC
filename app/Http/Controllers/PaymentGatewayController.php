<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class PaymentGatewayController extends Controller
{
    public function razorPay()
    {
        return view('payments.razorpay');
    }

    public function payViaRazorPay(Request $request)
    {
        $amount = $request->input('amount');
        $api = new Api(
        env('RAZORPAY_KEY'),
        env('RAZORPAY_SECRET'));

        $orderData = [
            'receipt' => 'order_'.rand(100,999),
            'amount' => $amount * 100,
            'currency' => 'INR',
            'payment_capture' => 1  
        ];
        
        $order = $api->order->create($orderData);
        // echo $order['id'];
        return view ('payments.payment', ['orderId' => $order["id"], 'amount' => $amount * 100]);
    }
}