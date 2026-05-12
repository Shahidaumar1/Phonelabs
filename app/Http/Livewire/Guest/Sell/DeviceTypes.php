<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use Livewire\Component;

class DeviceTypes extends Component
{
    public $category;
    public $models   = [];
    public $selectedDevice;
    public $devices;

    // ✅ UPDATED: ID ki jagah category_slug use hoga
    public function mount($category_slug)
    {
        // Slug se category find karo
        $this->category = Category::where('slug', $category_slug)->firstOrFail();

        $this->devices = $this->category->devices->where('status', Status::PUBLISH);

        if ($this->devices->count() > 0) {
            $this->selectedDevice = $this->devices->first()->id;
            $device = DeviceType::where('id', $this->selectedDevice)->first();
            $this->models = $device->modals;
        }
    }

    public function updated($property)
    {
        if ($property == 'selectedDevice') {
            $device = DeviceType::where('id', $this->selectedDevice)->first();
            $this->models = $device->modals;
        }
    }

    public function render()
    {
        return view('livewire.guest.sell.device-types')->layout('frontend.layouts.app');
    }
}