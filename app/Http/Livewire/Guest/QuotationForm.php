<?php
namespace App\Http\Livewire\Guest;
use Livewire\Component;
use App\Models\QuotationRequest;
use App\Models\SiteSetting;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class QuotationForm extends Component
{
    public $device;
    public $modal;
    public $repair;
    public $name;
    public $email;
    public $phone;
    public $message;

    public function mount($device, $modal, $repair)
    {
        $this->device = $device;
        $this->modal  = $modal;
        $this->repair = urldecode($repair);
    }

    protected $rules = [
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'phone'   => 'required|string|max:20',
        'message' => 'nullable|string',
    ];

    public function submit()
    {
        $this->validate();

        $siteSettings = SiteSetting::first();
        $businessName = $siteSettings->business_name ?? 'QuickFix Mobiles';

        QuotationRequest::create([
            'device'  => $this->device,
            'modal'   => $this->modal,
            'repair'  => $this->repair,
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'message' => $this->message,
        ]);

        // ✅ Newsletter subscriber add karo
        NewsletterSubscriber::firstOrCreate(
            ['email' => $this->email],
            ['source' => 'quotation_request']
        );

        $adminEmails = DB::table('email_addresses')->pluck('email')->toArray();

        $emailBody = "
New Quotation Request
Device: {$this->device}
Model: {$this->modal}
Repair: {$this->repair}
Name: {$this->name}
Email: {$this->email}
Phone: {$this->phone}
Message: {$this->message}
— {$businessName}
        ";

        foreach ($adminEmails as $adminEmail) {
            Mail::raw($emailBody, function ($mail) use ($adminEmail, $businessName) {
                $mail->to($adminEmail)->subject("New Quotation Request {$businessName}");
            });
        }

        Mail::raw($emailBody, function ($mail) use ($businessName) {
            $mail->to($this->email)->subject("Your Quotation Request {$businessName}");
        });

        session()->flash('success', 'Quotation submitted successfully!');
        $this->reset(['name', 'email', 'phone', 'message']);
    }

    public function render()
    {
        return view('livewire.guest.quotation-form')
            ->layout('frontend.layouts.app');
    }
}