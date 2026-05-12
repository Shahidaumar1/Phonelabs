<?php

namespace App\Http\Livewire\Guest;

use App\Models\DeviceType;
use Livewire\Component;
use App\Helpers\SeoUrl;
use App\Helpers\Status;
use App\Mail\CustomerInfoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\EmailAddress;

class Modals extends Component
{
    public $modals;
    public $device;

    // Properties for customer information
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $productName;
    public $productDescription;

    public $checkboxes = [];
    public $otherText = ''; // Text for the "Other" checkbox


    public $existingCustomer = ''; // Radio for existing customer
    public $isBusiness = ''; // Radio for business
    public $brand = ''; // New input box for brand
    public $model = ''; // New input box for model
    public $additionalDescription = ''; // Textbox for additional description
    public $isVisible;
    protected $rules = [
        'firstName' => 'required|string|max:255', // Correct use of max
        'lastName' => 'required|string|max:255',  // Corrected typo
        'email' => 'required|email|max:255',      // Corrected email format
        'phone' => 'required|string|max:15',
        'productName' => 'required|string|max:255',

        'checkboxes' => 'array',                  // Validate as an array
        'otherText' => 'nullable|string|max:255', // Optional with max limit
        'existingCustomer' => 'required|in:yes,no', // Correct syntax for in rule
        'isBusiness' => 'required|in:yes,no',
        'brand' => 'nullable|string|max:255',
        'model' => 'nullable|string|max:255',
        'additionalDescription' => 'nullable|string|max:1000',
    ];

    public function toggleVisibility()
    {
        $this->isVisible = !$this->isVisible;
    }
    public function sendCustomerEmail()
    {
        Log::info('sendCustomerEmail method called'); // Log the method call

        // Validate input data
        try {
            $validatedData = $this->validate();
            Log::info('Input data validated', ['validatedData' => $validatedData]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->errors()]);
            return; // Exit on validation error
        }

        // Prepare data for sending email
        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'productName' => $this->productName,

            'checkboxes' => $this->checkboxes,
            'otherText' => $this->otherText,
            'existingCustomer' => $this->existingCustomer,
            'isBusiness' => $this->isBusiness,
            'brand' => $this->brand,
            'model' => $this->model,
            'additionalDescription' => $this->additionalDescription,
        ];

        // Send the email to the primary recipient and custom email addresses
        try {
              $ccEmails = EmailAddress::pluck('email')->toArray();
              Mail::to($this->email) // Primary recipient
              ->cc($ccEmails)    // Dynamic CC recipients
              ->send(new CustomerInfoMail($data));
            Log::info('Email sent successfully to ' . $this->email);

            session()->flash('emailSent', true); // Flash success message
            $this->emit('emailSent'); // Emit success event
        } catch (\Exception $e) {
            Log::error('Email sending failed', ['error' => $e->getMessage()]);
            $this->emit('emailSendFailed', $e->getMessage()); // Emit failure event
        }
    }




    // public function mount(DeviceType $device)
    // {

    //     // $device = DeviceType::where('name',SeoUrl::decodeUrl($device))->first();
    //     $this->device = $device;
    //     // $this->modals = $device->modals->where('status', Status::PUBLISH);

    //     $this->modals = $device->modals()
    //         ->where('status', Status::PUBLISH)
    //         ->orderBy('order_by')
    //         ->get();
    //     $this->device = $device;
    // }


    public function mount(DeviceType $device)
    {
        $this->device = $device;
        $this->modals = $device->modals()
            ->where('status', Status::PUBLISH)
            ->orderBy('order_by', 'asc') // You can change 'asc' to 'desc' if you need descending order
            ->get();
    }



    public function render()
    {
        return view('livewire.guest.modals')->layout('frontend.layouts.app');
    }
}
