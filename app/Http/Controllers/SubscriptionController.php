<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Exceptions\PaymentActionRequired;
use Laravel\Cashier\Cashier;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = [
            [
                'id' => 'price_1RWwZxSDlB0TIlHTit9TieGS', // From Stripe
                'name' => 'Basic Plan',
                'price' => '$9.99/month',
                'features' => ['480p Video', '1 Device'],
            ],
            [
                'id' => 'price_1RWwZxSDlB0TIlHTkxXk6Y9x',
                'name' => 'Premium Plan',
                'price' => '$19.99/month',
                'features' => ['1080p Video', '4 Devices', 'No Ads'],
            ]
        ];

        return view('plans.index', compact('plans'));
    }

    public function subscribe(Request $request)
    {
        $user = $request->user();
        $priceId = $request->input('price_id');

        return $user->newSubscription('default', $priceId)->checkout([
            'success_url' => route('home'),
            'cancel_url' => route('plans'),
        ]);
    }
}
