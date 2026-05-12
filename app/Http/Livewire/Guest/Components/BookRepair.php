<?php

namespace App\Http\Livewire\Guest\Components;

use Session;
use App\Mail\BookRepairMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Branch;
use App\Models\ServiceCharge;
use App\Models\EmailAddress;
use App\Models\Order;
use App\Models\PaymentMethodSetting;
use App\Models\NewsletterSubscriber;

class BookRepair extends Component
{
    public $form_type = 'clinic_form';
    public $formType  = 'clinic_form';
    public $clinic_name = null;
    public $name, $address_line_1, $address_line_2, $town_city, $post_code, $mobile_number, $landline_number, $email = "";
    public $branch_selected = false;
    public $branch_id = null;
    public $data;
    public $form;
    public $pm = 'stripe';
    public $buySpecs;
    public $price;
    public $serviceCharge;
    public $success = false;
    public $serviceChargeId;
    public $condition1Price, $condition2Price, $condition3Price;
    public $condition4Price, $condition5Price, $condition6Price;
    public $stripeSettings;
    public $offlineEnabled = true;

    public function mount($data = [], $serviceChargeId = null)
    {
        $this->loadPaymentSettings();

        if ($serviceChargeId) {
            $this->serviceChargeId = $serviceChargeId;
            $this->fetchPrice($serviceChargeId);
        }

        $this->applyConditions();

        $this->loadBranchFromSession();

        $this->data  = $data;
        $this->price = ($data['service'] == \App\Helpers\ServiceType::REPAIR)
            ? $data['repair_price']
            : $data['price'];

        $this->formType = session()->get('form_type', 'clinic_form');
        $this->applyFormPrice();
        $this->updateOfflineEnabled();

        session()->put('repair_data', $data);
        session()->put('payment_price', $this->price);
    }

    private function loadBranchFromSession(): void
    {
        $this->clinic_name = session()->get('clinic_name', null);
        $clinicBranchId    = session()->get('clinic_branch_id', null);

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
        $this->stripeSettings = Cache::remember('payment_settings_Stripe', 60, function () {
            $row = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
            return $row ? json_decode($row->settings, true) : null;
        });
    }

    protected $listeners = [
        'formToggle', 'BookRepair', 'clearSession', 'buySepcs',
        'addPostalPrice', 'removePostalPrice', 'addCollectionPrice', 'removeCollectionPrice',
        'addfixPrice', 'removefixPrice', 'paymentOptionsUpdated', 'formTypeChanged'
    ];

    public function formTypeChanged($newFormType, $previousFormType)
    {
        session()->forget($previousFormType);
        session()->forget($previousFormType . '_price');
        $this->formType = $newFormType;
        session()->put('form_type', $newFormType);
        $this->loadPaymentSettings();
        $this->updateOfflineEnabled();
        if ($newFormType === 'postal_form' && $this->pm === 'pay_at_store') $this->pm = 'stripe';
        $this->emit('paymentOptionsUpdated');
    }

    public function formToggle($formType)
    {
        $this->form_type = $formType;
        session()->put('form_type', $formType);
        $this->formType  = $formType;
        $this->loadPaymentSettings();
        $this->updateOfflineEnabled();
        if ($formType === 'postal_form' && $this->pm === 'pay_at_store') $this->pm = 'stripe';
        $this->emit('paymentOptionsUpdated');
    }

    public function hydrate()
    {
        $this->formType = session()->get('form_type', 'clinic_form');
        $this->loadPaymentSettings();
        $this->updateOfflineEnabled();
    }

    private function updateOfflineEnabled()
    {
        $this->offlineEnabled = ($this->formType === 'postal_form')
            ? false
            : (bool) ($this->stripeSettings['enable_offline_pay'] ?? true);
    }

    private function fillBranchData($branch)
    {
        $this->branch_id       = $branch->id;
        $this->name            = $branch->name;
        $this->address_line_1  = $branch->address_line_1;
        $this->address_line_2  = $branch->address_line_2;
        $this->town_city       = $branch->town_city;
        $this->post_code       = $branch->post_code;
        $this->mobile_number   = $branch->mobile_number;
        $this->landline_number = $branch->landline_number;
        $this->email           = $branch->email;
    }

    public function applyConditions()
    {
        foreach (range(1, 6) as $id) {
            $sc = ServiceCharge::find($id);
            if ($sc && $sc->charges) {
                $this->{'condition' . $id . 'Price'} = $sc->price;
            }
        }
    }

    private function applyFormPrice()
    {
        switch ($this->formType) {
            case 'postal_form':     $this->price += $this->condition1Price ?? 0; break;
            case 'collection_form': $this->price += $this->condition2Price ?? 0; break;
            case 'fix_form':        $this->price += $this->condition3Price ?? 0; break;
        }
    }

    public function addPostalPrice($price)        { $this->adjustPrice('postal', $price); }
    public function removePostalPrice($price)      { $this->price -= (int) $price; $this->emit('price', $this->price); }
    public function addCollectionPrice($price)     { $this->adjustPrice('collection', $price); }
    public function removeCollectionPrice($price)  { $this->price -= (int) $price; $this->emit('price', $this->price); }
    public function addfixPrice($price)            { $this->adjustPrice('fix', $price); }
    public function removefixPrice($price)         { $this->price -= (int) $price; $this->emit('price', $this->price); }

    private function adjustPrice($type, $price)
    {
        $sessionKey    = $type . '_form_price';
        $existingPrice = session()->get($sessionKey, 0);
        if ($existingPrice) $this->price -= (int) $existingPrice;
        $this->price += (int) $price;
        session()->forget($sessionKey);
        $this->emit('price', $this->price);
    }

    public function fetchPrice($id)
    {
        $sc          = ServiceCharge::find($id);
        $this->price = $sc ? $sc->price : null;
    }

    public function buySepcs($specs) { $this->buySpecs = $specs; }

    public function BookRepair()
    {
        $this->loadBranchFromSession();

        $formType        = Cache::get('form_type') ?? $this->formType;
        $this->form_type = $formType;

        $this->form = session()->get($formType, [
            'address_line_1' => '',
            'city'           => '',
            'post_code'      => '',
            'repair_note'    => '',
            'repair_date'    => now()->format('Y-m-d'),
            'repair_time'    => '8:00 AM - 11:00 AM',
            'address_line_2' => '',
        ]);

        $patient = session()->get('patient');

        if (!$patient) {
            $this->emit('loading', false);
            return $this->addError('error', 'Please complete the forms before booking repair.');
        }

        session()->put('repair_data', $this->data);
        session()->put('payment_price', $this->price);
        session()->put('form_type', $formType);
        session()->put('repair_branch', [
            'name'            => $this->name,
            'address_line_1'  => $this->address_line_1,
            'address_line_2'  => $this->address_line_2,
            'town_city'       => $this->town_city,
            'post_code'       => $this->post_code,
            'email'           => $this->email,
            'landline_number' => $this->landline_number,
        ]);

        // Klarna/PayPal: sirf session save, payment ke baad email/order hoga
        if (in_array($this->pm, ['klarna', 'paypal'])) {
            return;
        }

        // Stripe / Pay at Store: abhi process karo
        $trackingNumber = 'REP' . now('Europe/London')->format('Ymd') . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));

        // ===== PRICE CALCULATION =====
        $addons      = session('addons', []);
        $basePrice   = (float) ($this->data['repair_price'] ?? 0);

        // Total price: addon session se lo, fallback $this->price
        $totalPrice  = (float) data_get($addons, 'total_price', 0);
        if ($totalPrice <= 0) {
            $totalPrice = (float) ($this->price ?? $basePrice);
        }

        // Form surcharge add karo total mein
        $surcharge = match ($formType) {
            'postal_form'     => (float) ($this->condition1Price ?? 0),
            'collection_form' => (float) ($this->condition2Price ?? 0),
            'fix_form'        => (float) ($this->condition3Price ?? 0),
            default           => 0,
        };
        $finalTotal = $totalPrice + $surcharge;

        // ===== ADDON DETAIL =====
        $protectorSelected = (bool) data_get($addons, 'protector_selected', false);
        $coverSelected     = (bool) data_get($addons, 'cover_selected', false);
        $protectorPrice    = (float) data_get($addons, 'protector_price', 0);
        $coverPrice        = (float) data_get($addons, 'cover_price', 0);

        $repair_detail = [
            'tracking_number'       => $trackingNumber,
            'device'                => $this->data['device']['name'] ?? 'Unknown Device',
            'model'                 => $this->data['modal']['name'] ?? '',
            'fault'                 => $this->data['repair_type']['name'] ?? '',
            'quotePrice'            => number_format($basePrice, 2),
            'totalPrice'            => number_format($finalTotal, 2),
            'repair_type_name'      => $this->getRepairTypeName($formType),
            'pm'                    => $this->pm,
            'screen_protector'      => $protectorSelected && $protectorPrice > 0
                                        ? '£' . number_format($protectorPrice, 2) . ': Tempered Glass Screen Protector (Half-Price)'
                                        : null,
            'protective_case'       => $coverSelected && $coverPrice > 0
                                        ? '£' . number_format($coverPrice, 2) . ': Anti-Shock Protective Case (Half-Price)'
                                        : null,
            'warranty'              => $this->data['repair_type']['warranty'] ?? '',
            'part_used'             => $this->data['repair_type']['part_used'] ?? '',
            'How_long'              => $this->data['repair_type']['duration'] ?? '',
            'postal_price'          => $formType == 'postal_form'     ? '£9.99: Postal Repair Surcharge' : null,
            'fix_form_price'        => $formType == 'fix_form'        ? '£' . session()->get('fix_form_price') : null,
            'collection_form_price' => $formType == 'collection_form' ? '£' . session()->get('collection_form_price') : null,
        ];

        $emails   = EmailAddress::pluck('email')->toArray();
        $emails[] = $patient['email'];
        foreach ($emails as $email) {
            Mail::to($email)->send(new BookRepairMail($patient, $this->form, $formType, $repair_detail, $this->pm));
        }

        session()->put('payment-method', $this->pm);

        Order::create([
            'service'         => 'Repairing',
            'customer_name'   => $patient['name'] ?? null,
            'customer_email'  => $patient['email'] ?? null,
            'branch_id'       => $this->branch_id,
            'date_time'       => now(),
            'amount'          => $this->price,
            'total_price'     => $finalTotal,
            'tax'             => 0,
            'shipping'        => 0,
            'order_type'      => 'Repairing',
            'tracking_number' => $trackingNumber,
            'payment_method'  => $this->pm,
            'status'          => 'pending',
            'form'            => json_encode($this->form),
            'patient'         => json_encode($patient),
            'repair_detail'   => json_encode($repair_detail),
        ]);

        $this->emit('emailSent');
        Cache::forget('form_type');
        $this->success = true;

        $siteSetting = \App\Models\SiteSetting::first();
        session()->put('booking_confirmation', [
            'model'       => $this->data['modal']['name'] ?? '',
            'repair_type' => $this->data['repair_type']['name'] ?? '',
            'form_name'   => $this->getRepairTypeName($formType),
            'price'       => $finalTotal,
            'repair_time' => optional($siteSetting)->repair_time ?? 'Not Available',
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

    private function getRepairTypeName($formType)
    {
        return match ($formType) {
            'clinic_form'     => 'Store Repair',
            'postal_form'     => 'Postal Repair',
            'fix_form'        => 'Fix at My Address',
            'collection_form' => 'Collect My Device',
            default           => 'Unknown Repair Type',
        };
    }

    public function getOrders()
    {
        $json = file_get_contents(storage_path('app/orders.json'));
        return json_decode($json, true) ?? [];
    }

    public function clearSession()
    {
        foreach (['patient', 'clinic_form', 'postal_form', 'collection_form', 'fix_form', 'pre_code_price', 'fix_form_price', 'collection_form_price'] as $f) {
            session()->forget($f);
        }
    }

    public function changePm($pm)
    {
        $this->pm = $pm;
        $this->loadPaymentSettings();
        $this->loadBranchFromSession();
        $this->branch_selected = (bool) $this->clinic_name;
    }

    public function render()
    {
        $addons        = session('addons', []);
        $basePrice     = (float) data_get($addons, 'base_price', $this->price ?? 0);
        $serviceCharge = match ($this->formType) {
            'postal_form'     => (float) ($this->condition1Price ?? 0),
            'collection_form' => (float) ($this->condition2Price ?? 0),
            'fix_form'        => (float) ($this->condition3Price ?? 0),
            default           => 0,
        };

        return view('livewire.guest.components.book-repair', [
            'addons'        => $addons,
            'basePrice'     => $basePrice,
            'serviceCharge' => $serviceCharge,
        ]);
    }
}