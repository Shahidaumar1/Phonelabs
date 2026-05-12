<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\SiteSetting;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FreeRepairBooking extends Component
{
    public $category_slug;
    public $device_slug;
    public $model_slug;
    public $repair_slug;

    public $category;
    public $device;
    public $modal;
    public $repairType;

    public $name;
    public $email;
    public $phone;
    public $message;

    public function mount($category_slug, $device_slug, $model_slug, $repair_slug)
    {
        $this->category_slug = $category_slug;
        $this->device_slug   = $device_slug;
        $this->model_slug    = $model_slug;
        $this->repair_slug   = $repair_slug;

        $this->category = Category::where('slug', $category_slug)->firstOrFail();

        $this->device = DeviceType::where('slug', $device_slug)
            ->where('category_id', $this->category->id)
            ->firstOrFail();

        $this->modal = Modal::where('slug', $model_slug)
            ->where('device_type_id', $this->device->id)
            ->firstOrFail();

        $this->repairType = $this->device->repair_types()
            ->get()
            ->first(function ($rt) use ($repair_slug) {
                if (!empty($rt->slug) && $rt->slug === $repair_slug) return true;
                if (Str::slug($rt->name) === $repair_slug) return true;
                if (ctype_digit($repair_slug) && (int)$rt->id === (int)$repair_slug) return true;
                return false;
            });

        if (!$this->repairType) {
            abort(404);
        }
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

        try {
            DB::table('free_repair_booking_requests')->insert([
                'device'     => $this->device_slug,
                'modal'      => $this->model_slug,
                'repair'     => $this->repair_slug,
                'name'       => $this->name,
                'email'      => $this->email,
                'phone'      => $this->phone,
                'message'    => $this->message,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Throwable $e) {
            // Table exist na kare toh ignore karo
        }

        // ✅ Newsletter subscriber add karo
        NewsletterSubscriber::firstOrCreate(
            ['email' => $this->email],
            ['source' => 'free_repair_booking']
        );

        $adminEmails = DB::table('email_addresses')->pluck('email')->toArray();

        $emailBody = "
New Free Repair Booking

Category: {$this->category_slug}
Device: {$this->device_slug}
Model: {$this->model_slug}
Repair: {$this->repair_slug}

Name: {$this->name}
Email: {$this->email}
Phone: {$this->phone}
Message: {$this->message}

— {$businessName}
        ";

        foreach ($adminEmails as $adminEmail) {
            Mail::raw($emailBody, function ($mail) use ($adminEmail, $businessName) {
                $mail->to($adminEmail)->subject("New Free Repair Booking {$businessName}");
            });
        }

        Mail::raw($emailBody, function ($mail) use ($businessName) {
            $mail->to($this->email)->subject("Your Free Repair Booking {$businessName}");
        });

        session()->flash('success', 'Free repair booking submitted successfully!');
        $this->reset(['name', 'email', 'phone', 'message']);
    }

    public function render()
    {
        return view('livewire.guest.free-repair-booking')
            ->layout('frontend.layouts.app');
    }
}