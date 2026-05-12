<?php
namespace App\Http\Livewire\Guest\Components;

use Livewire\Component;

class PatientDetailForm extends Component
{
    public $patient = [
        'name'             => '',
        'email'            => '',
        'phone'            => '',
        'RepairNote'       => '',
        'business_repair'  => '',
        'company_name'     => '',
    ];

    protected $rules = [
        'patient.name'            => 'required',
        'patient.email'           => 'required|email',
        'patient.phone'           => 'required',
        'patient.RepairNote'      => 'nullable',
        'patient.business_repair' => 'nullable',
        'patient.company_name'    => 'nullable',
    ];

    protected $messages = [
        'patient.name.required'   => 'The Customer Name field is required.',
        'patient.email.required'  => 'The Customer Email field is required.',
        'patient.email.email'     => 'Please enter a valid Customer Email address.',
        'patient.phone.required'  => 'The Customer Phone Number field is required.',
    ];

    public function mount()
    {
        if (session()->has('patient')) {
            $this->patient = session()->get('patient');
        }
    }

    public function updated($propertyName)
    {
        // Sirf validate karo, errors clear mat karo
        $this->validateOnly($propertyName);

        session()->put('patient', $this->patient);

        if ($propertyName == 'patient.business_repair' && $this->patient['business_repair'] == '0') {
            $this->patient['company_name'] = null;
            session()->put('patient', $this->patient);
        }

        if ($propertyName == 'patient.phone') {
            $this->emit('otherDevicesData');
        }
    }

    public function validateForm()
    {
        $this->validate();
        $this->emit('formSubmitted', true);
    }

    public function submitForm()
    {
        $this->validate();

        session()->put('patient', $this->patient);
        session()->put('patient_email', $this->patient['email']);

        $this->emit('formSubmitted');
    }

    public function render()
    {
        return view('livewire.guest.components.patient-detail-form');
    }
}