<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;

class Models extends Component
{
    public $category;
    public $device;
    public $models = [];

    // ✅ UPDATED: Using category slug from URL
    public function mount($category)
    {
        // If $category is a Category instance (model binding), use it directly
        if ($category instanceof Category) {
            $this->category = $category;
        } else {
            // Otherwise try to find by slug
            $this->category = Category::where('slug', $category)->firstOrFail();
        }

        // Get the first device type for this category (or you could accept it as a parameter too)
        // This is a default behavior - adjust as needed
        $this->device = $this->category->devices()
            ->where('status', Status::PUBLISH)
            ->first();

        if (!$this->device) {
            $this->device = new DeviceType(['name' => 'Devices', 'slug' => 'devices']);
        }

        $this->models = Modal::whereHas('device_type', function ($query) {
            $query->where('category_id', $this->category->id);
        })
        ->where('status', Status::PUBLISH)
        ->orderBy('order_by', 'asc')
        ->get();
    }

    public function render()
    {
        return view('livewire.guest.sell.models')->layout('frontend.layouts.app');
    }
}