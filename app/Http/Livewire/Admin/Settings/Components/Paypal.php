<?php

namespace App\Http\Livewire\Admin\Settings\Components;

use App\Models\PaymentMethodSetting;
use Livewire\Component;

class Paypal extends Component
{

    public $client_id;
    public $secret;
    public $dirty = false;

    public function mount()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
        if ($pm) {
            $this->client_id = json_decode($pm->settings)->client_id;
            $this->secret = json_decode($pm->settings)->secret;
        }
    }
    public function updated()
    {
        $this->dirty = true;
    }

    public function connect()
    {
        $this->validate([
            'client_id' => 'required',
            'secret' => 'required',
        ]);
        $pm = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
        if ($pm) {
            $pm->settings = json_encode([
                'client_id' => $this->client_id,
                'secret' => $this->secret,
            ]);
            $pm->save();
        } else {
            PaymentMethodSetting::create([
                'payment_method_' => 'Paypal',
                'settings' => json_encode([
                    'client_id' => $this->client_id,
                    'secret' => $this->secret,
                ]),
            ]);
        }
        $this->dirty = false;

        session()->flash('message', 'Connected successfully!');
    }
    public function render()
    {
        return view('livewire.admin.settings.components.paypal');
    }
}
