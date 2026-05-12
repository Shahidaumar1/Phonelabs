<?php
namespace App\Http\Livewire\Guest;
use Livewire\Component;
use App\Models\QuotationRequest;
use App\Models\SiteSetting;
use App\Models\NewsletterSubscriber;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\RepairType;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class QuotationForm extends Component
{
    public $device;
    public $modal;
    public $repair;
    public $deviceName;
    public $modalName;
    public $repairName;
    public $name;
    public $email;
    public $phone;
    public $message;

    // ✅ UPDATED: mount method now accepts slugs instead of IDs
    public function mount($category, $device, $modal, $repair)
    {
        // Resolve category slug to find the category
        $categoryModel = Category::where('slug', $category)->firstOrFail();
        
        // Resolve device slug to find the device type
        $deviceModel = DeviceType::where('slug', $device)
            ->where('category_id', $categoryModel->id)
            ->firstOrFail();
        
        // Resolve modal slug to find the modal
        $modalModel = Modal::where('slug', $modal)
            ->where('device_type_id', $deviceModel->id)
            ->firstOrFail();
        
        // Resolve repair slug to find the repair type
        $repairModel = RepairType::where('slug', $repair)->firstOrFail();

        // Store IDs for database
        $this->device = $deviceModel->id;
        $this->modal = $modalModel->id;
        $this->repair = $repairModel->id;

        // Store names for display
        $this->deviceName = $deviceModel->name;
        $this->modalName = $modalModel->name;
        $this->repairName = $repairModel->name;
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
            'device'  => $this->deviceName,
            'modal'   => $this->modalName,
            'repair'  => $this->repairName,
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
Device: {$this->deviceName}
Model: {$this->modalName}
Repair: {$this->repairName}
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