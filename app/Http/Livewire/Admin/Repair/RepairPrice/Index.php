<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price; // ← make sure this import matches your actual Price model
use Livewire\Component;

class Index extends Component
{
    public $models = [];
    public $selectedModel;
    public $selectedModelId;
    public $devices;
    public $selectedDeviceId;
    public $selectedDevice = 3;
    public $page;
    public $categories;
    public $selectedCat;
    public $selectedCatId;
    public $data;

    protected $listeners = ['PriceDeleted', 'UpdateDeviceType', 'RepairCreated'];

    public function mount($page = null)
    {
        $this->page = $page;
        $this->categories = Category::where('service', ServiceType::REPAIR)->get();

        $appleCategory = $this->categories->firstWhere('name', 'Apple');
        if ($appleCategory) {
            $this->selectedCat = $appleCategory;
            $this->selectedCatId = $appleCategory->id;
        } else {
            $this->selectedCat = $this->categories->first();
            $this->selectedCatId = $this->selectedCat->id ?? null;
        }

        if ($this->selectedCatId) {
            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();

            $firstDevice = $this->devices->first();
            $this->selectedDeviceId = $firstDevice->id ?? null;

            if ($this->selectedDeviceId) {
                $this->selectedDevice = DeviceType::with(['repair_types', 'modals'])
                    ->find($this->selectedDeviceId);

                $this->models = $this->selectedDevice
                    ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
                    : collect([]);

                $this->selectedModel = $this->models->first();
                $this->selectedModelId = $this->selectedModel->id ?? null;
            }
        }

        $this->loadNextComponentData();
    }

    public function PriceDeleted()
    {
        //
    }

    public function RepairCreated(DeviceType $deviceType)
    {
        $this->selectedDeviceId = $deviceType->id;

        $this->selectedDevice = DeviceType::with(['repair_types', 'modals'])
            ->find($this->selectedDeviceId);

        $this->models = $this->selectedDevice
            ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
            : collect([]);
    }

    public function UpdateDeviceType(DeviceType $deviceType)
    {
        $this->selectedDeviceId = $deviceType->id;

        $this->selectedDevice = DeviceType::with(['repair_types', 'modals'])
            ->find($this->selectedDeviceId);

        $this->models = $this->selectedDevice
            ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
            : collect([]);
    }

    public function updated($property)
    {
        if ($property == 'selectedCatId') {
            $this->devices = [];
            $this->models = [];

            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();

            $firstDevice = $this->devices->first();
            $this->selectedDeviceId = $firstDevice->id ?? null;

            if ($this->selectedDeviceId) {
                $this->selectedDevice = DeviceType::with(['repair_types', 'modals'])
                    ->find($this->selectedDeviceId);

                $this->models = $this->selectedDevice
                    ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
                    : collect([]);
            }
        }

        if ($property == 'selectedDeviceId') {
            $this->selectedDevice = DeviceType::with(['repair_types', 'modals'])
                ->find($this->selectedDeviceId);

            $this->models = $this->selectedDevice
                ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
                : collect([]);
        }
    }

    /**
     * ✅ Detach repair type from selected device
     */
    public function removeRepairType($repairTypeId)
    {
        if (!$this->selectedDeviceId) return;

        $device = DeviceType::find($this->selectedDeviceId);
        if (!$device) return;

        $device->repair_types()->detach((int)$repairTypeId);

        $this->selectedDevice = DeviceType::with(['repair_types', 'modals'])
            ->find($this->selectedDeviceId);

        $this->models = $this->selectedDevice
            ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
            : collect([]);

        session()->flash('message', 'Repair removed from this device!');
    }

    /**
     * Update repair type column order
     */
    public function updateTaskOrder($orders)
    {
        foreach ($orders as $order) {
            $this->selectedDevice->repair_types()->updateExistingPivot(
                (int)$order['value'],
                ['order_number' => $order['order']]
            );
        }
    }

    /**
     * Update model row order
     */
    public function updateModelOrder($orders)
    {
        foreach ($orders as $order) {
            Modal::where('id', (int)$order['value'])
                ->update(['order_by' => $order['order']]);
        }

        $this->models = $this->selectedDevice
            ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
            : collect([]);

        session()->flash('message', 'Model order updated successfully!');
    }

    // ─────────────────────────────────────────────
    //  Quick-price helpers (new)
    // ─────────────────────────────────────────────

    /**
     * Hide  → price = 0.00
     */
    public function setHide($priceId)
    {
        $this->setQuickPrice($priceId, 0.00);
    }

    /**
     * Ask a Quote → price = 0.01
     */
    public function setAskQuote($priceId)
    {
        $this->setQuickPrice($priceId, 0.01);
    }

    /**
     * Free Repair → price = 0.02
     */
    public function setFreeRepair($priceId)
    {
        $this->setQuickPrice($priceId, 0.02);
    }

    /**
     * Shared helper – update price and refresh models
     */
    private function setQuickPrice($priceId, float $value)
    {
        // Adjust the model/field names to match YOUR actual Price model
        \App\Models\Price::where('id', (int)$priceId)->update(['price' => $value]);

        // Reload models so the table reflects the change
        $this->models = $this->selectedDevice
            ? $this->selectedDevice->modals()->orderBy('order_by', 'asc')->get()
            : collect([]);
    }

    public function loadNextComponentData()
    {
        $this->data = [
            'title' => 'Devices',
            'route' => 'repair-devices',
            'button_text' => 'Back'
        ];
    }

    public function render()
    {
        return view('livewire.admin.repair.repair-price.index')->layout('layouts.admin');
    }
}