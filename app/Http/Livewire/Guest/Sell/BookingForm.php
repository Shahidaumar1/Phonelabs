<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\ServiceType;
use Carbon\Carbon;
use App\Mail\BookDeviceSellMail;
use App\Models\Modal;
use App\Models\Order;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Branch;
use App\Models\ServiceCharge;
use App\Models\EmailAddress;

class BookingForm extends Component
{
    public $form_type = 'clinic_form';
    public $data;
    public $pm = 'drop_at';
    public $price;
    public $model;
    public $form = 'paypal';
    public $bankDetail;
    public $paypalDetail;
    public $success = false;
    public $modelName;
    public $bank_checkbox;
    public $bank;
    public $condition1Price;
    public $condition2Price;
    public $condition3Price;
    public $condition4Price;
    public $condition5Price;
    public $condition6Price;
    public $serviceChargeId;
    public $orignalprice;
    public $branchtesting1 = '';

    // Branch details
    public $clinic_name;
    public $name, $address_line_1, $address_line_2, $town_city, $post_code;
    public $mobile_number, $landline_number, $email = "";
    public $branch_selected = false;
    public $formType;

    public function mount(Modal $model, $serviceChargeId = null)
    {
        if ($serviceChargeId) {
            $this->serviceChargeId = $serviceChargeId;
            $this->fetchPrice($serviceChargeId);
        }

        $this->applyConditions();

        $this->model     = $model;
        $this->modelName = session()->get('modelName');

        $this->clinic_name = session()->has('clinic_name') ? session()->get('clinic_name') : null;
        $branch = $this->clinic_name ? Branch::where('name', $this->clinic_name)->first() : Branch::first();

        if ($branch) {
            $this->branch_selected = true;
            $this->name            = $branch->name;
            $this->address_line_1  = $branch->address_line_1;
            $this->address_line_2  = $branch->address_line_2;
            $this->town_city       = $branch->town_city;
            $this->post_code       = $branch->post_code;
            $this->mobile_number   = $branch->mobile_number;
            $this->landline_number = $branch->landline_number;
            $this->email           = $branch->email;
        } else {
            $this->branch_selected = false;
        }

        $this->formType = session()->get('form_type');

        if ($this->formType === 'postal_form') {
            $this->price += $this->condition4Price;
        }

        if ($this->formType === 'collection_form') {
            $this->price += $this->condition5Price;
        }
    }

    public function fetchPrice($id)
    {
        $serviceCharge = ServiceCharge::find($id);
        $this->price   = $serviceCharge ? $serviceCharge->price : null;
    }

    public function applyConditions()
    {
        $conditionIds = [1, 2, 3, 4, 5, 6];

        foreach ($conditionIds as $id) {
            $serviceCharge = ServiceCharge::find($id);

            if ($serviceCharge && $serviceCharge->charges) {
                switch ($id) {
                    case 1: $this->condition1Price = $serviceCharge->price; break;
                    case 2: $this->condition2Price = $serviceCharge->price; break;
                    case 3: $this->condition3Price = $serviceCharge->price; break;
                    case 4: $this->condition4Price = $serviceCharge->price; break;
                    case 5: $this->condition5Price = $serviceCharge->price; break;
                    case 6: $this->condition6Price = $serviceCharge->price; break;
                }
            }
        }
    }

    public function loadData()
    {
        $this->data = [
            'service'          => ServiceType::SELL,
            'device'           => $this->model->device_type,
            'modal'            => $this->model,
            'memory_size'      => $this->selectedMemorySize ?? '',
            'color'            => $this->selectedColor ?? '',
            'condition'        => $this->selectedCondition ?? '',
            'price'            => $this->price,
            'network_unlocked' => $this->network_unlocked ?? '',
        ];
    }

    public function changeForm($form)
    {
        $this->form = $form;
    }

    protected $listeners = [
        'formToggle', 'BuyDevice', 'clearSession', 'sellSpecs',
        'bankDetail', 'paypalDetail', 'changePostal', 'modelNameUpdated',
        'formTypeChanged' => 'updateFormType'
    ];

    public function formToggle($formType)
    {
        $this->form_type = $formType;
    }

    public function changePostal($data)
    {
        $this->branchtesting1 = $data['id'];
        session()->put('branch_settings', $data['id']);
    }

    public function sellSpecs($specs)
    {
        $this->data         = $specs;
        $this->price        = $specs['price'];
        $this->orignalprice = $specs['price'];

        $this->formType = session()->get('form_type');

        if ($this->formType === 'postal_form') {
            $this->price += $this->condition4Price;
        } elseif ($this->formType === 'collection_form') {
            $this->price += $this->condition5Price;
        }
    }

    public function bankDetail($bank)
    {
        $this->bankDetail = $bank;
        $this->SellDevice();
    }

    public function paypalDetail($paypal)
    {
        $this->paypalDetail = $paypal;
        $this->SellDevice();
    }

    public function buySpecs($specs)
    {
        $this->data  = $specs;
        $this->price = $specs['price'];
        $this->emit('price', $this->price);
    }

    public function SellDevice()
    {
        switch ($this->form_type) {
            case 'clinic_form':
                $this->form = session()->get('clinic_form');
                break;
            case 'postal_form':
                $this->form = session()->get('postal_form');
                break;
            case 'collection_form':
                $this->form = session()->get('collection_form');
                break;
            case 'fix_form':
                $this->form = session()->get('fixed_form');
                break;
            default:
                break;
        }

        $patient = session()->get('patient');

        $sell_detail = [
            'specs'  => $this->data ?? null,
            'bank'   => $this->bankDetail,
            'paypal' => $this->paypalDetail,
        ];

        if ($this->form && $patient && $this->price) {

            // Email bhejo
            $emails   = EmailAddress::pluck('email')->toArray();
            $emails[] = $patient['email'];

            foreach ($emails as $email) {
                Mail::to($email)->send(new BookDeviceSellMail($patient, $this->form, $sell_detail, $this->form_type));
            }

            // Tracking number
            $trackingNumber = 'SELL' . now('Europe/London')->format('Ymd') . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));

            // Database mein save
            Order::create([
                'service'         => 'Sell',
                'customer_name'   => $patient['name'] ?? null,
                'customer_email'  => $patient['email'] ?? null,
                'date_time'       => now(),
                'amount'          => $this->price ?? 0,
                'total_price'     => $this->price ?? 0,
                'tax'             => 0,
                'shipping'        => 0,
                'order_type'      => 'sell',
                'tracking_number' => $trackingNumber,
                'payment_method'  => $this->pm,
                'status'          => 'pending',
                'form'            => json_encode($this->form),
                'patient'         => json_encode($patient),
                'repair_detail'   => json_encode($sell_detail),
            ]);

            // Newsletter
            // if (!empty($patient['email'])) {
            //     NewsletterSubscriber::firstOrCreate(
            //         ['email' => $patient['email']],
            //         ['source' => 'order']
            //     );
            // }

            session()->put('payment-method', $this->pm);

            $this->emit('emailSent');
            $this->success = true;

            // =====================================================
            // ✅ BOOKING CONFIRMATION REDIRECT
            // =====================================================
            $siteSetting = \App\Models\SiteSetting::first();

            // Get model name from sell data
            $modelName = '';
            if (!empty($sell_detail['specs']['modal']['name'])) {
                $modelName = $sell_detail['specs']['modal']['name'];
            } elseif (!empty($sell_detail['specs']['name'])) {
                $modelName = $sell_detail['specs']['name'];
            } elseif ($this->model) {
                $modelName = $this->model->name ?? '';
            }

            session()->put('booking_confirmation', [
                'model'       => $modelName,
                'repair_type' => $sell_detail['specs']['condition'] ?? 'Sell',
                'form_name'   => 'Sell Your Device',
                'price'       => $this->price,
                'repair_time' => 'Same Day',
                'warranty'    => 'N/A',
                'email'       => $patient['email'] ?? '',
                'store_name'  => $this->name,
                'address'     => trim(implode(', ', array_filter([
                    $this->address_line_1,
                    $this->address_line_2,
                    $this->town_city,
                    $this->post_code,
                ]))),
                'store_email' => $this->email,
                'phone'       => $this->landline_number,
                'tracking'    => $trackingNumber,
            ]);

            return redirect()->to('/booking-confirmation');

        } else {
            $this->form = 'paypal';
            return $this->addError('error', 'Please complete above forms and Specification, like condition before Sell device');
        }
    }

    public function clearSession()
    {
        $forms_array = ['patient', 'clinic_form', 'postal_form', 'collection_form', 'fix_form', 'pre_code_price', 'fix_form_price', 'collection_form_price'];
        foreach ($forms_array as $f) {
            session()->forget($f);
        }
    }

    public function changePm($pm)
    {
        $this->pm = $pm;
    }

    public function submit()
    {
        $this->emit('bankDetail', $this->bank);
    }

    public function getBranchValues()
    {
        if (isset($this->branchtesting1) && $this->branchtesting1) {
            $loadedBranch = \App\Models\Branch::where('id', $this->branchtesting1)->first();
        } else {
            $loadedBranch = \App\Models\Branch::query()->first();
        }
        return $loadedBranch;
    }

    public function updateFormType($formType)
    {
        $this->form_type = $formType;
    }

    public function render()
    {
        return view('livewire.guest.sell.booking-form')->layout('frontend.layouts.app');
    }
}