<?php

namespace App\Http\Livewire\Admin\Settings\Components;

use App\Models\PaymentMethodSetting;
use Livewire\Component;

class Stripe extends Component
{

    public $client_id;
    public $secret;
    public $dirty = false;
    public $public_key;

    public function mount()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
        if ($pm) {
            $this->secret = json_decode($pm->settings)->secret;
            $this->public_key = json_decode($pm->settings)->public_key ?? '';
        }
    }
    public function updated()
    {
        $this->dirty = true;
    }

    public function connect()
    {
        $this->validate([
            'secret' => 'required',
            'public_key' => 'required',
        ]);
        $pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
        if ($pm) {
            $pm->settings = json_encode([
                'secret' => $this->secret,
                'public_key' => $this->public_key,
            ]);
            $pm->save();
        } else {
            PaymentMethodSetting::create([
                'payment_method_' => 'Stripe',
                'settings' => json_encode([
                    'secret' => $this->secret,
                    'public_key' => $this->public_key,
                ]),
            ]);
        }
        $this->dirty = false;
        session()->flash('message', 'Connected successfully!');
    }
    public function render()
    {
        return view('livewire.admin.settings.components.stripe');
    }
}
