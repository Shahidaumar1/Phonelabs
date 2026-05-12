<?php

namespace App\Http\Livewire\PaymentMethods;

use Livewire\Component;
use App\Models\PaymentMethodSetting;
use Stripe\Checkout\Session as StripeSession;

class KlarnaSuccess extends Component
{
    public function mount()
    {
        $sessionId = request()->get('session_id');

        if (!$sessionId) {
            return redirect('/');
        }

        $pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
        $secret = json_decode($pm->settings)->secret;

        \Stripe\Stripe::setApiKey($secret);

        try {

            $session = StripeSession::retrieve($sessionId);

            if ($session->payment_status === 'paid') {

                // Trigger booking email now
                $this->emit('emailSent');

                session()->flash('klarna_paid', true);
            }

        } catch (\Exception $e) {
            return redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.payment-methods.klarna-success');
    }
}