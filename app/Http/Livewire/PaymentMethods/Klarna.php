<?php

namespace App\Http\Livewire\PaymentMethods;

use Livewire\Component;
use App\Models\PaymentMethodSetting;

class Klarna extends Component
{
    public $price = 0;
    public $service;
    public $loading = false;

    protected $listeners = ['price'];

    public function mount($price = null, $service = null)
    {
        $this->price = $price;
        $this->service = $service;
    }

    public function price($price)
    {
        $this->price = $price;
    }

    public function sendEmailBeforePay()
    {
        // DO NOT book here
        // DO NOT send email here

        $this->loading = true;
        $this->payWithKlarna();
    }

    public function payWithKlarna()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
        $secret = json_decode($pm->settings)->secret;

        \Stripe\Stripe::setApiKey($secret);

        try {

            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['klarna'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => $this->service . ' Payment',
                        ],
                        'unit_amount' => $this->price * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',

                'success_url' => route('klarna.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => url('/'),
            ]);

            return redirect($session->url);

        } catch (\Exception $e) {
            $this->loading = false;
            $this->addError('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.payment-methods.klarna');
    }
}