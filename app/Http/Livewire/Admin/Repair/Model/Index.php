<?php

namespace App\Http\Livewire\Admin\Repair\Model;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];
    public $selectedCat;
    public $selectedCatId;

    public $devices = [];
    public $selectedDevice;
    public $selectedDeviceId;

    public $models = [];
    public $selectedModel;

    public $data;
    public $activeView = 'card';
    public $target = 'Publish';
    public $items = [];

    // ✅ Per-model arrays
    public $protectorPrice = [];      // [model_id => value]
    public $coverPrice = [];          // [model_id => value]
    public $protectorSelected = [];   // [model_id => bool]
    public $coverSelected = [];       // [model_id => bool]

    protected $listeners = [
        'modelCreated' => 'loadUpdatedModels',
        'modelUpdated' => 'loadUpdatedModels',
        'loadArgsData' => 'fetchData',
    ];

    public function mount(DeviceType $device)
    {
        $this->categories = Category::where('service', ServiceType::REPAIR)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCat = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;

            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();

            if ($this->devices->count() > 0) {
                $this->selectedDevice = $this->devices[0];
                $this->selectedDeviceId = $this->selectedDevice->id;
            }
        }

        $this->loadModels();
        $this->loadNextComponentData();
        $this->loadItems();
    }

    public function loadUpdatedModels()
    {
        $this->loadModels();
    }

    public function updatedSelectedCatId()
    {
        $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();

        if ($this->devices->count() > 0) {
            $this->selectedDevice = $this->devices[0];
            $this->selectedDeviceId = $this->selectedDevice->id;
        } else {
            $this->selectedDevice = null;
            $this->selectedDeviceId = null;
        }

        $this->emit('deviceId', $this->selectedDeviceId);
        $this->loadModels();
    }

    public function updatedSelectedDeviceId()
    {
        $this->selectedDevice = $this->selectedDeviceId
            ? DeviceType::find($this->selectedDeviceId)
            : null;

        $this->emit('deviceId', $this->selectedDeviceId);
        $this->loadModels();
    }

    public function fetchData($args)
    {
        $this->target = $args;

        if (!$this->selectedDeviceId) {
            $this->models = collect();
            return;
        }

        if ($args === 'Junk') {
            $this->models = Modal::onlyTrashed()
                ->where('service', ServiceType::REPAIR)
                ->where('device_type_id', $this->selectedDeviceId)
                ->orderBy('order_by')
                ->get();
            return;
        }

        if ($args === 'Top Rated') {
            $this->models = Modal::where('service', ServiceType::REPAIR)
                ->where('device_type_id', $this->selectedDeviceId)
                ->where('top_rated', true)
                ->orderBy('order_by')
                ->get();
            return;
        }

        if ($args === 'New Arrival') {
            $this->models = Modal::where('service', ServiceType::REPAIR)
                ->where('device_type_id', $this->selectedDeviceId)
                ->where('new_arrival', true)
                ->orderBy('order_by')
                ->get();
            return;
        }

        $this->models = Modal::where('device_type_id', $this->selectedDeviceId)
            ->where('status', $args)
            ->orderBy('order_by')
            ->get();
    }

    public function loadModels()
    {
        $this->fetchData($this->target);
        $this->syncExtrasFromModels();
    }

    private function syncExtrasFromModels()
    {
        $this->protectorPrice = [];
        $this->coverPrice = [];
        $this->protectorSelected = [];
        $this->coverSelected = [];

        foreach ($this->models as $m) {
            $this->protectorPrice[$m->id] = (float) ($m->protector_price ?? 0);
            $this->coverPrice[$m->id] = (float) ($m->cover_price ?? 0);
            $this->protectorSelected[$m->id] = (bool) ($m->protector_selected ?? false);
            $this->coverSelected[$m->id] = (bool) ($m->cover_selected ?? false);
        }
    }

    // ✅ Save per model (prices + checkboxes)
    public function saveModelExtras($modelId)
    {
        $m = Modal::find($modelId);
        if (!$m) return;

        $m->update([
            'protector_price'    => (float) ($this->protectorPrice[$modelId] ?? 0),
            'cover_price'        => (float) ($this->coverPrice[$modelId] ?? 0),
            'protector_selected' => !empty($this->protectorSelected[$modelId]) ? 1 : 0,
            'cover_selected'     => !empty($this->coverSelected[$modelId]) ? 1 : 0,
        ]);

        // keep arrays synced
        $fresh = $m->fresh();
        $this->protectorPrice[$modelId] = (float) ($fresh->protector_price ?? 0);
        $this->coverPrice[$modelId] = (float) ($fresh->cover_price ?? 0);
        $this->protectorSelected[$modelId] = (bool) ($fresh->protector_selected ?? false);
        $this->coverSelected[$modelId] = (bool) ($fresh->cover_selected ?? false);
    }

    public function getTotalFor($modelId)
    {
        $m = $this->models->firstWhere('id', $modelId);
        if (!$m) return 0;

        $total = (float) ($m->custom_price ?? $m->price ?? 0);

        if (!empty($this->protectorSelected[$modelId])) {
            $total += (float) ($this->protectorPrice[$modelId] ?? 0);
        }

        if (!empty($this->coverSelected[$modelId])) {
            $total += (float) ($this->coverPrice[$modelId] ?? 0);
        }

        return $total;
    }

    public function selectModel(Modal $modal)
    {
        $this->emit('modelSelected', $modal->id);
        $this->selectedModel = $modal;
        $this->emit('showM', 'edit-repair-model');
    }

    public function loadNextComponentData()
    {
        $this->data = [
            'title' => 'Devices',
            'route' => 'buy-devices',
            'button_text' => 'Back'
        ];
    }

    public function toggleStatus(Modal $modal)
    {
        if ($modal) {
            $modal->update([
                'status' => $modal->status == Status::PUBLISH ? Status::PAUSE : Status::PUBLISH
            ]);
            $this->loadModels();
        }
    }

    public function activateView($args)
    {
        $this->activeView = $args;
    }

    public function softDelete(Modal $model)
    {
        $model->update(['status' => Status::PAUSE]);
        $model->delete();
        $this->loadModels();
    }

    public function restore($item)
    {
        $model = Modal::onlyTrashed()->find($item);
        if ($model) {
            $model->restore();
            $model->update(['status' => Status::PUBLISH]);
        }
        $this->loadModels();
    }

    public function setTopRated(Modal $model)
    {
        $model->update(['top_rated' => !$model->top_rated]);
        $this->loadModels();
    }

    public function setNewArrival(Modal $model)
    {
        $model->update(['new_arrival' => !$model->new_arrival]);
        $this->loadModels();
    }

    public function loadItems()
    {
        $this->items = [
            ['name' => 'Publish'],
            ['name' => 'Pause'],
            ['name' => 'Top Rated'],
            ['name' => 'New Arrival'],
            ['name' => 'Junk']
        ];
    }

    public function updateOrder($order)
    {
        foreach ($order as $index => $id) {
            Modal::where('id', $id)->update(['order_by' => $index + 1]);
        }
        $this->loadModels();
    }

    public function render()
    {
        return view('livewire.admin.repair.model.index')->layout('layouts.admin');
    }
}
