<?php

namespace App\Http\Livewire\Admin\Accessories\Addon;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use App\Models\DeviceType;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSpec extends Component
{
    use WithFileUploads;

    public $rand;
    public $model;
    public $product_specs;

    public $colors;

    public $spec_category;
    public $selectedColor;

    public $price;
    public $quantity = 1;
    public $imei = [];
    public $image;

    public $selectedCatId;

    // 🔥 for edit mode
    public $editingSpecId = null;

    protected $listeners = ['modelId', 'productsEmited'];

    public function mount(Modal $model)
    {
        $this->model = $model;
        $this->loadProductSpecs($model);
        $this->getSelectedCatId($model);

        $this->colors = ['Black', 'White', 'Red', 'Green', 'Yellow'];
    }

    public function getSelectedCatId($model)
    {
        $this->selectedCatId = DeviceType::select('category_id')
            ->where('id', $model->device_type_id)
            ->first()
            ->category_id;
    }

    public function modelId(Modal $model)
    {
        $this->model = $model;
        $this->loadProductSpecs($model);
        $this->getSelectedCatId($model);
    }

    public function productsEmited()
    {
        $this->loadProductSpecs($this->model);
    }

    public function selectColor($color)
    {
        $this->selectedColor = $color;
    }

    // 🔥 EDIT FUNCTION
    public function edit($id)
    {
        $spec = ProductSpec::find($id);

        if (!$spec) return;

        $this->editingSpecId = $spec->id;
        $this->spec_category = $spec->memory_size;
        $this->selectedColor = $spec->color;
        $this->price = $spec->price;
        $this->quantity = $spec->quantity;
    }

    public function save()
    {
        $this->validate([
            'price' => 'required',
        ]);

        // 🔥 If editing → update
        if ($this->editingSpecId) {

            $spec = ProductSpec::find($this->editingSpecId);

            $spec->memory_size = $this->spec_category ?? null;
            $spec->color = $this->selectedColor ?? null;
            $spec->price = $this->price;
            $spec->quantity = $this->quantity;

            $spec->save();

        } else {

            // 🔥 create new
            $spec = new ProductSpec();

            $spec->memory_size = $this->spec_category ?? null;
            $spec->color = $this->selectedColor ?? null;
            $spec->price = $this->price;
            $spec->quantity = $this->quantity;
            $spec->model_id = $this->model->id;
            $spec->service  = ServiceType::ACCESSORIES;

            $spec->save();
        }

        $this->clear();
        $this->loadProductSpecs($this->model);
        $this->emit('productAdded');
    }

    public function clear()
    {
        $this->editingSpecId = null;
        $this->spec_category = null;
        $this->selectedColor = null;
        $this->price = null;
        $this->quantity = 1;
        $this->imei = [];
        $this->rand++;
    }

    public function loadProductSpecs($model)
    {
        $this->product_specs = ProductSpec::where('model_id', $model->id)->get();
    }

    public function render()
    {
        return view('livewire.admin.accessories.addon.add-spec');
    }
}