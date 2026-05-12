<?php

namespace App\Http\Livewire\Guest\Buy;

use App\Mail\BookDeviceBuyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\ProductSpec;
use App\Models\Branch;
use App\Models\ServiceCharge;
use App\Models\EmailAddress;
use App\Models\PaymentMethodSetting;
use App\Models\Order;
use App\Models\NewsletterSubscriber;

class BookRepair extends Component
{
    public $form_type = 'clinic_form';
    public $data;
    public $form;
    public $clinic_name;
    public $name, $address_line_1, $address_line_2, $town_city, $post_code;
    public $mobile_number, $landline_number, $email = "";
    public $pm = null;
    public $price;
    public $branch_id      = null; // ✅ FIX
    public $branch_selected = false;
    public $serviceChargeId;
    public $price_service;
    public $condition1Price, $condition2Price, $condition3Price;
    public $condition4Price, $condition5Price, $condition6Price;
    public $paypalEnabled  = false;
    public $stripeEnabled  = false;
    public $klarnaEnabled  = false;
    public $offlineEnabled = true;
    public $success        = false;
    public $stripeToken    = null;

    public function mount($data = [], $serviceChargeId = null)
    {
        $this->data = $data;
        $this->loadPaymentSettings();

        if ($serviceChargeId) {
            $this->serviceChargeId = $serviceChargeId;
            $this->fetchPrice($serviceChargeId);
        }

        $this->applyConditions();

        if (isset($data['price'])) {
            session()->put('base_price', $data['price']);
            $this->price = $data['price'];
        }

        // ✅ FIX: ID se branch load karo
        $this->loadBranchFromSession();

        session()->put('buy_data', $data);
        session()->put('payment_price', $this->price);
    }

    // ✅ FIX: Helper - ID se branch dhundho, naam se fallback, pehli branch last fallback
    private function loadBranchFromSession(): void
    {
        $this->clinic_name  = session()->get('clinic_name', null);
        $clinicBranchId     = session()->get('clinic_branch_id', null);

        $branch = null;

        if ($clinicBranchId) {
            $branch = Branch::find($clinicBranchId);
        }

        if (!$branch && $this->clinic_name) {
            $branch = Branch::where('name', trim($this->clinic_name))->first();
        }

        if (!$branch) {
            $branch = Branch::first();
        }

        if ($branch) {
            $this->fillBranchData($branch);
        }
    }

    private function loadPaymentSettings(): void
    {
        $stripeSettings = Cache::remember('payment_settings_Stripe', 60, function () {
            $row = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
            return $row ? json_decode($row->settings, true) : null;
        });

        $paypalSettings = Cache::remember('payment_settings_Paypal', 60, function () {
            $row = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
            return $row ? json_decode($row->settings, true) : null;
        });

        $klarnaSettings = Cache::remember('payment_settings_Klarna', 60, function () {
            $row = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();
            return $row ? json_decode($row->settings, true) : null;
        });

        $this->stripeEnabled  = (bool) ($stripeSettings['enabled'] ?? false);
        $this->paypalEnabled  = (bool) ($paypalSettings['enabled'] ?? false);
        $this->klarnaEnabled  = (bool) ($klarnaSettings['enabled'] ?? false);
        $this->offlineEnabled = (bool) ($stripeSettings['enable_offline_pay'] ?? true);
    }

    public function hydrate() { $this->loadPaymentSettings(); }

    protected $listeners = [
        'formToggle', 'BuyDevice', 'clearSession', 'buySpecs',
        'tokenCreated' => 'handleStripeToken',
    ];

    public function handleStripeToken($tokenId)
    {
        $stripeSettings = Cache::remember('payment_settings_Stripe', 60, function () {
            $row = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
            return $row ? json_decode($row->settings, true) : null;
        });

        $secret = $stripeSettings['secret'] ?? null;

        if (!$secret) {
            $this->addError('payment_error', 'Stripe secret key missing.');
            return;
        }

        \Stripe\Stripe::setApiKey($secret);

        try {
            $charge = \Stripe\Charge::create([
                'source'      => $tokenId,
                'amount'      => (int) round(($this->price ?? 0) * 100),
                'currency'    => 'gbp',
                'description' => 'Buy Device Payment',
            ]);

            if ($charge->status === 'succeeded') {
                $this->BuyDevice();
            } else {
                $this->addError('payment_error', 'Payment was not successful.');
            }
        } catch (\Exception $e) {
            $this->addError('payment_error', $e->getMessage());
        }
    }

    public function formToggle($formType)
    {
        $this->form_type = $formType;
        $this->loadPaymentSettings();
        $this->adjustPriceBasedOnForm();
    }

    public function fetchPrice($id)
    {
        $sc = ServiceCharge::find($id);
        $this->price_service = $sc ? $sc->price : null;
    }

    public function applyConditions()
    {
        foreach ([1,2,3,4,5,6] as $id) {
            $sc = ServiceCharge::find($id);
            if ($sc && $sc->charges) $this->{'condition' . $id . 'Price'} = $sc->price;
        }
    }

    public function adjustPriceBasedOnForm()
    {
        $base_price  = session()->get('base_price', 0);
        $this->price = ($this->form_type == 'postal_form')
            ? $base_price + ($this->condition6Price ?? 0)
            : $base_price;
        $this->emit('price', $this->price);
    }

    public function buySpecs($specs)
    {
        $this->adjustPriceBasedOnForm();
        $specs['price'] = $this->price;
        $this->emit('price', $this->price);
        $this->data = $specs;
        session()->put('buy_data', $this->data);
        session()->put('payment_price', $this->price);
    }

    public function changePm($pm)
    {
        $this->pm = $pm;
        $this->loadPaymentSettings();
        $this->loadBranchFromSession(); // ✅ FIX
    }

    public function BuyDevice()
    {
        // ✅ FIX: Order save karte waqt fresh branch load karo
        $this->loadBranchFromSession();

        $this->setFormData();

        $patient    = session()->get('patient');
        $buy_detail = $this->data;

        if (!$this->form || !$patient) {
            $this->emit('loading', false);
            return $this->addError('error', 'Please complete the necessary forms before proceeding.');
        }

        session()->put('buy_data', $buy_detail);
        session()->put('payment_price', $this->price);
        session()->put('buy_form_type', $this->form_type);
        session()->put('buy_branch', [
            'name'            => $this->name,
            'address_line_1'  => $this->address_line_1,
            'address_line_2'  => $this->address_line_2,
            'town_city'       => $this->town_city,
            'post_code'       => $this->post_code,
            'email'           => $this->email,
            'landline_number' => $this->landline_number,
        ]);

        if (in_array($this->pm, ['klarna', 'paypal'])) {
            return;
        }

        $emails   = EmailAddress::pluck('email')->toArray();
        $emails[] = $patient['email'];
        foreach ($emails as $email) {
            Mail::to($email)->send(new BookDeviceBuyMail($patient, $this->form, $buy_detail, $this->form_type));
        }

        $this->updateProductSpec($buy_detail);

        $trackingNumber = 'BUY' . now('Europe/London')->format('Ymd') . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));

        $this->storeOrderDetails($patient, $buy_detail, $trackingNumber);

        // if (!empty($patient['email'])) {
        //     NewsletterSubscriber::firstOrCreate(['email' => $patient['email']], ['source' => 'order']);
        // }

        $this->emit('emailSent');
        $this->success = true;

        $siteSetting = \App\Models\SiteSetting::first();
        session()->put('booking_confirmation', [
            'model'       => $buy_detail['model_name'] ?? ($buy_detail['name'] ?? 'Device'),
            'repair_type' => $buy_detail['storage'] ?? ($buy_detail['condition'] ?? 'Purchase'),
            'form_name'   => 'Buy Device',
            'price'       => $this->price,
            'repair_time' => 'Same Day',
            'warranty'    => optional($siteSetting)->warranty ?? 'Not Available',
            'email'       => $patient['email'] ?? '',
            'store_name'  => $this->name,
            'address'     => trim(implode(', ', array_filter([$this->address_line_1, $this->address_line_2, $this->town_city, $this->post_code]))),
            'store_email' => $this->email,
            'phone'       => $this->landline_number,
            'tracking'    => $trackingNumber,
        ]);

        return redirect()->to('/booking-confirmation');
    }

    public function clearSession()
    {
        foreach (['patient', 'clinic_form', 'postal_form', 'collection_form', 'fix_form', 'pre_code_price', 'fix_form_price', 'collection_form_price'] as $f) {
            session()->forget($f);
        }
    }

    public function render()
    {
        return view('livewire.guest.buy.book-repair');
    }

    private function fillBranchData($branch)
    {
        $this->branch_id       = $branch->id; // ✅ FIX
        $this->name            = $branch->name;
        $this->address_line_1  = $branch->address_line_1;
        $this->address_line_2  = $branch->address_line_2;
        $this->town_city       = $branch->town_city;
        $this->post_code       = $branch->post_code;
        $this->mobile_number   = $branch->mobile_number;
        $this->landline_number = $branch->landline_number;
        $this->email           = $branch->email;
    }

    protected function setBranchDetails()
    {
        $this->loadBranchFromSession(); // ✅ FIX
    }

    protected function setFormData()
    {
        $map = [
            'clinic_form'     => 'clinic_form',
            'postal_form'     => 'postal_form',
            'collection_form' => 'collection_form',
            'fix_form'        => 'fixed_form',
        ];
        $this->form = session()->get($map[$this->form_type] ?? $this->form_type);
    }

    protected function updateProductSpec($buy_detail)
    {
        $productSpec = ProductSpec::where('id', $buy_detail['product_id'])->first();
        if ($productSpec) {
            $productSpec->quantity -= $buy_detail['quantity'];
            if ($productSpec->imei) {
                $imeiStatus = json_decode($productSpec->imei, true);
                for ($i = 0; $i < $buy_detail['quantity']; $i++) {
                    if (isset($imeiStatus[$i]) && $imeiStatus[$i]['status'] === 'Available') {
                        $imeiStatus[$i]['status'] = 'Sold';
                    }
                }
                $productSpec->imei = json_encode($imeiStatus);
            }
            $productSpec->save();
        }
    }

    protected function storeOrderDetails($patient, $buy_detail, $trackingNumber)
    {
        Order::create([
            'service'         => 'Buy',
            'customer_name'   => $patient['name'] ?? null,
            'customer_email'  => $patient['email'] ?? null,
            'branch_id'       => $this->branch_id, // ✅ FIX
            'date_time'       => now(),
            'amount'          => $this->price ?? 0,
            'total_price'     => $this->price ?? 0,
            'tax'             => 0, 'shipping' => 0,
            'order_type'      => 'buy',
            'tracking_number' => $trackingNumber,
            'payment_method'  => $this->pm,
            'status'          => 'pending',
            'form'            => json_encode($this->form),
            'patient'         => json_encode($patient),
            'repair_detail'   => json_encode($buy_detail),
        ]);
        session()->put('payment-method', $this->pm);
    }
}