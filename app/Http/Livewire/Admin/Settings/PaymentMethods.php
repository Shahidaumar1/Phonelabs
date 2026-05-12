<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\PaymentMethodSetting;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class PaymentMethods extends Component
{
    public $data = [];
    public $pm = 'Paypal';

    public $paypal_client_id;
    public $paypal_secret;
    public $paypal_mode    = 'Live';
    public $paypal_enabled = false;

    public $stripe_secret;
    public $stripe_public_key;
    public $stripe_enabled = false;

    public $klarna_secret;
    public $klarna_enabled = false;

    public $dirty = false;

    public function mount()
    {
        $this->loadNextComponentData();
        $this->loadSettings();
    }

    protected function loadSettings(): void
    {
        // ----- Paypal -----
        if ($pm = PaymentMethodSetting::where('payment_method_', 'Paypal')->first()) {
            $settings = json_decode($pm->settings ?? '{}', true);

            $this->paypal_client_id = $settings['client_id'] ?? null;
            $this->paypal_secret    = $settings['secret'] ?? null;
            $this->paypal_mode      = $settings['mode'] ?? 'Live';
            $this->paypal_enabled   = (bool) ($settings['enabled'] ?? false);
        }

        // ----- Stripe -----
        if ($pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first()) {
            $settings = json_decode($pm->settings ?? '{}', true);

            $this->stripe_secret     = $settings['secret'] ?? null;
            $this->stripe_public_key = $settings['public_key'] ?? null;
            $this->stripe_enabled    = (bool) ($settings['enabled'] ?? false);
        }

        // ----- Klarna -----
        if ($pm = PaymentMethodSetting::where('payment_method_', 'Klarna')->first()) {
            $settings = json_decode($pm->settings ?? '{}', true);

            $this->klarna_secret  = $settings['secret'] ?? null;
            $this->klarna_enabled = (bool) ($settings['enabled'] ?? false);
        } else {
            if ($this->stripe_secret) {
                $this->klarna_secret = $this->stripe_secret;
            }
        }
    }

    public function updated($name, $value)
    {
        $this->dirty = true;
    }

    public function connect()
    {
        if ($this->pm === 'Stripe') {
            $this->validate([
                'stripe_secret'     => 'required|string',
                'stripe_public_key' => 'required|string',
            ]);

            PaymentMethodSetting::updateOrCreate(
                ['payment_method_' => 'Stripe'],
                [
                    'settings' => json_encode([
                        'secret'     => $this->stripe_secret,
                        'public_key' => $this->stripe_public_key,
                        'enabled'    => (bool) $this->stripe_enabled,
                    ]),
                ]
            );

        } elseif ($this->pm === 'Paypal') {
            $this->validate([
                'paypal_client_id' => 'required|string',
                'paypal_secret'    => 'required|string',
                'paypal_mode'      => 'required|string',
            ]);

            PaymentMethodSetting::updateOrCreate(
                ['payment_method_' => 'Paypal'],
                [
                    'settings' => json_encode([
                        'client_id' => $this->paypal_client_id,
                        'secret'    => $this->paypal_secret,
                        'mode'      => $this->paypal_mode,
                        'enabled'   => (bool) $this->paypal_enabled,
                    ]),
                ]
            );

        } elseif ($this->pm === 'Klarna') {
            $this->validate([
                'klarna_secret' => 'required|string',
            ]);

            PaymentMethodSetting::updateOrCreate(
                ['payment_method_' => 'Klarna'],
                [
                    'settings' => json_encode([
                        'secret'  => $this->klarna_secret,
                        'enabled' => (bool) $this->klarna_enabled,
                    ]),
                ]
            );
        }

        // ✅ Clear cache so booking pages always get fresh keys
        Cache::forget('payment_settings_Stripe');
        Cache::forget('payment_settings_Paypal');
        Cache::forget('payment_settings_Klarna');

        $this->dirty = false;
        session()->flash('message', 'Connected successfully!');
    }

    public function loadNextComponentData()
    {
        $this->data = [
            'title'       => 'Branches',
            'route'       => 'branches-settings',
            'button_text' => 'Next',
        ];
    }

    public function render()
    {
        return view('livewire.admin.settings.payment-methods')
            ->layout('layouts.admin');
    }
}