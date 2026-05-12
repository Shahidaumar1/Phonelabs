<?php

namespace App\Http\Livewire\PaymentMethods;

use Livewire\Component;
use App\Models\PaymentMethodSetting;
use Illuminate\Support\Facades\Http;

class PaypalSuccess extends Component
{
    public function mount()
    {
        $token = request()->get('token');

        if (!$token) {
            return redirect('/');
        }

        try {

            $pm = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
            $client_id = json_decode($pm->settings)->client_id;
            $secret = json_decode($pm->settings)->secret;

            $accessToken = Http::asForm()
                ->withBasicAuth($client_id, $secret)
                ->post('https://api-m.paypal.com/v1/oauth2/token', [
                    'grant_type' => 'client_credentials'
                ])['access_token'];

            $capture = Http::withToken($accessToken)
                ->post("https://api-m.paypal.com/v2/checkout/orders/$token/capture");

            // if ($capture->successful()) {

            //     session()->flash('paypal_paid', true);

            //     return redirect()->route('repair.success');
            // }
            if ($capture->successful()) {

    if (session()->get('payment_type') === 'buy') {
        session()->flash('buy_paid', true);
    } else {
        session()->flash('paypal_paid', true);
    }

    session()->forget('payment_type');

    return redirect()->route('home');
}

        } catch (\Throwable $e) {
            return redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.payment-methods.paypal-success');
    }
}