<?php

namespace App\Http\Livewire\Guest;

use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\RepairType;
use Livewire\Component;
use App\Helpers\SeoUrl;
use Illuminate\Http\Request;

class RepairTypes extends Component
{

    public $device;
    public $modal;
    public $repair_types = [];
    public function mount(DeviceType $device, Modal $modal)
    {
        // $this->device = DeviceType::where('name', SeoUrl::decodeUrl($device))->first();
        // $this->modal = Modal::where('name', SeoUrl::decodeUrl($modal))->first();
        $this->device = $device;
        $this->modal = $modal;
        $this->repair_types = $this->device ?  $this->device->repair_types : [];
    }
     public function storeRepairPrice(Request $request, $device, $modal, $repair, $price)
    {
        // Store the price in the session
        session(['repair_price' => $price]);

        // Redirect to the repair details page
        return redirect()->route('repair-detail', ['device' => $device, 'modal' => $modal, 'repair' => $repair]);
    }

    public function render()
    {
        return view('livewire.guest.repair-types')->layout('frontend.layouts.app');
    }
}
