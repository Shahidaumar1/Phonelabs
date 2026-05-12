<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price;
use App\Models\RepairType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $categories = [];
    public $selectedCatId;
    public $selectedCat;

    public $devices = [];
    public $selectedDevice;
    public $selectedDeviceId;

    public $models = [];
    public $selectedModel;
    public $selectedModelId;


    public $repair_types = [];
    public $selectedRepairType;

    public $editable = false;
    public $price;
    public $data;


    protected $rules = [
        'selectedCatId' => 'required',
        'selectedDeviceId' => 'required',
        'selectedModelId' => 'required',
        'selectedRepairType' => 'required',
        'price' => 'required'
    ];

    public function mount()
    {
        $this->categories = Category::where('service',ServiceType::REPAIR)->get();
        if ($this->categories->count() > 0) {
            $this->selectedCat = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;
            $this->devices = $this->selectedCat->devices;
            $this->selectedDevice = $this->devices[0];
            $this->selectedDeviceId = $this->selectedDevice->id;
            $this->models = $this->getModals($this->selectedDevice);
            $this->repair_types = RepairType::all();
        }
        $this->loadNextComponentData();


    }

    public function updated($property)
    {
        if($property == 'selectedCatId')
        {
            $this->devices = [];
            $this->models = [];
            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();
            $this->emit('categoryId', $this->selectedCatId);
        }
        if ($property == 'selectedDeviceId') {

            $device = DeviceType::where('id', $this->selectedDeviceId)->first();
            $this->models = $this->getModals($device);
            $this->emit('deviceId', $this->selectedDeviceId);
        }
    }

    public function create()
    {
        $this->validate();
        $device = DeviceType::where('id', $this->selectedDeviceId)->first();
        $price = Price::where('repair_type_id', $this->selectedRepairType)->where('modal_id', $this->selectedModelId)->first();
        if ($device->repair_types->contains($this->selectedRepairType) && $device->modals->contains($this->selectedModelId) && $price) {
            return $this->addError('error', 'Price already exists for (devicetype->modal->repair_type)');
        }

        if (!$device->repair_types->contains($this->selectedRepairType)) {
            $device = DeviceType::where('id', $this->selectedDeviceId)->first();
            $device->repair_types()->attach($this->selectedRepairType);
            $device->save();
        }

        $price = new Price();
        $price->repair_type_id = $this->selectedRepairType;
        $price->modal_id = $this->selectedModelId;
        $price->price = $this->price;
        $price->save();
        $this->price = '';
        $this->emit('RepairCreated', $this->selectedDeviceId);
        $this->emit('closeM', 'add-new-repair');
    }

    public function toggle()
    {
        $this->editable = !$this->editable;
    }

    protected $listeners = ['RepairTypeCreated'];


    public function RepairTypeCreated(RepairType $new_repair_type)
    {
        $this->selectedRepairType = $new_repair_type->id;
        $this->repair_types = RepairType::all();
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
        return view('livewire.admin.repair.repair-price.create')->layout('layouts.admin');
    }

    public function getModals(DeviceType $deviceType)
    {
        return $deviceType ? $deviceType->modals : [];
    }
}
