<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use Livewire\Component;

class Models extends Component
{
    public $device;
    public $category;
    public $models = [];

    // ✅ UPDATED: device_id ki jagah category_slug + device_slug use hoga
    public function mount($category_slug, $device_slug)
    {
        // Category slug se category find karo
        $this->category = Category::where('slug', $category_slug)->firstOrFail();

        // Device slug se device find karo
        $this->device = DeviceType::where('slug', $device_slug)
            ->where('category_id', $this->category->id)
            ->firstOrFail();

        $this->models = $this->device->modals()
            ->where('status', Status::PUBLISH)
            ->orderBy('order_by', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.guest.sell.models')->layout('frontend.layouts.app');
    }
}