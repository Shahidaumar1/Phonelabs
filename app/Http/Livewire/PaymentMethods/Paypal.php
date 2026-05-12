<?php

namespace App\Http\Livewire\PaymentMethods;

use Livewire\Component;
use App\Models\PaymentMethodSetting;
use Illuminate\Support\Facades\Http;

class Paypal extends Component
{
    public $price = 0;
    public $service;
    public $color;
    public $loading = false;

    protected $listeners = ['price'];

    public function mount($price = 0, $color = null, $service = null)
    {
        $this->price = $price;
        $this->color = $color;
        $this->service = $service;
    }

    public function price($price)
    {
        $this->price = $price;
    }

    public function createPayment()
    {
        $this->loading = true;

        try {

            $accessToken = $this->getAccessToken();

            $response = Http::withToken($accessToken)
                ->post('https://api-m.paypal.com/v2/checkout/orders', [
                    "intent" => "CAPTURE",
                    "purchase_units" => [
                        [
                            "amount" => [
                                "currency_code" => "GBP",
                                "value" => number_format($this->price, 2, '.', '')
                            ]
                        ]
                    ],
                    "application_context" => [
                        "return_url" => route('paypal.success'),
                        "cancel_url" => route('home')
                    ]
                ]);

            if ($response->successful()) {

                $approvalLink = collect($response->json()['links'])
                    ->firstWhere('rel', 'approve')['href'];

                return redirect($approvalLink);

            } else {
                $this->loading = false;
                $this->addError('error', 'Failed to create PayPal order.');
            }

        } catch (\Throwable $e) {
            $this->loading = false;
            $this->addError('error', $e->getMessage());
        }
    }

    private function getAccessToken()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
        $client_id = json_decode($pm->settings)->client_id;
        $secret = json_decode($pm->settings)->secret;

        $response = Http::asForm()
            ->withBasicAuth($client_id, $secret)
            ->post('https://api-m.paypal.com/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        return $response['access_token'];
    }

    public function render()
    {
        return view('livewire.payment-methods.paypal');
    }
}