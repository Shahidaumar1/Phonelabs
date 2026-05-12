<?php

namespace App\Http\Livewire\Admin\Buy\Addon;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Index extends Component
{
    // ── Dropdowns ──────────────────────────────────────────────
    public $categories       = [];
    public $selectedCat;
    public $selectedCatId;
    public $devices          = [];
    public $selectedDevice;
    public $selectedDeviceId;
    public $models           = [];
    public $selectedModel;
    public $selectedModelId;

    // ── Table data ─────────────────────────────────────────────
    public $product_specs;

    // ── Inline row editing ─────────────────────────────────────
    public $editableProductSpecId;
    public $price;
    public $quantity         = 1;
    public $imei             = [];
    public $memory_size_edit;
    public $color_edit;
    public $grade_edit;
    public $condition_edit;

    // ── Image editing ──────────────────────────────────────────
    public $imageEditProductId;
    public $existing_images  = [];
    public $new_image_previews = [];
    public $pendingImageData = [];

    // ── Misc ───────────────────────────────────────────────────
    public $data;
    public $activeView       = 'list';
    public $target           = 'Publish';
    public $editMemorySizes  = false;
    public $memory_sizes;
    public $editColors       = false;
    public $colors;

    protected $rules = [
        'selectedDeviceId' => 'nullable',
    ];

    // ── Lifecycle ──────────────────────────────────────────────

    public function mount(Modal $model)
    {
        $this->categories = Category::where('service', ServiceType::BUY)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCat   = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;
            $this->loadDevices($this->selectedCatId);
        }

        $this->loadProductSpecs($this->selectedModelId);
        $this->loadNextComponentData();
    }

    public function updated($property)
    {
        if ($property === 'selectedCatId') {
            $this->selectedDeviceId = null;
            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();
        }

        if ($property === 'selectedDeviceId') {
            $this->selectedModelId = null;
            $this->loadProductSpecs($this->selectedModelId);
            $this->models = Modal::where('device_type_id', $this->selectedDeviceId)->get();
        }

        if ($property === 'selectedModelId') {
            $this->loadProductSpecs($this->selectedModelId);
            $this->emit('modelId', $this->selectedModelId);
            $this->selectedModel = Modal::where('id', $this->selectedModelId)->first();
        }
    }

    protected $listeners = [
        'conditionPriceUpdated' => 'fetchData',
        'memorySizesUpdated'    => 'fetchData',
        'colorsUpdated'         => 'fetchData',
        'productAdded',
        'ProductUpdate',
    ];

    // ── Listeners / helpers ────────────────────────────────────

    public function fetchData()
    {
        $this->loadModels($this->selectedDevice);
    }

    public function ProductUpdate($productId)
    {
        $this->price = ProductSpec::where('id', $productId)->first()->price;
    }

    public function productAdded()
    {
        $this->loadProductSpecs($this->selectedModelId);
    }

    public function editModelConditionPrice(Modal $model)
    {
        $this->emit('selectedModel', $model->id);
        $this->emit('showM', 'edit-model-condition-price');
    }

    public function loadNextComponentData()
    {
        $this->data = [
            'title'       => 'Devices',
            'route'       => 'sell-devices',
            'button_text' => 'Back',
        ];
    }

    public function loadDevices($categoryId)
    {
        $this->devices = $categoryId ? DeviceType::where('category_id', $categoryId)->get() : [];
        if ($this->devices->count() > 0) {
            $this->selectedDevice   = $this->devices[0];
            $this->selectedDeviceId = $this->selectedDevice->id;
            $this->loadModels($this->selectedDeviceId);
        }
    }

    public function loadModels($deviceId)
    {
        $this->models = $deviceId ? Modal::where('device_type_id', $deviceId)->get() : [];
        if ($this->models->count() > 0) {
            $this->selectedModel   = $this->models[0];
            $this->selectedModelId = $this->selectedModel->id;
            $this->loadProductSpecs($this->selectedModelId);
        }
    }

    public function loadProductSpecs($modelId)
    {
        $this->product_specs = $modelId
            ? ProductSpec::where('model_id', $modelId)->get()
            : collect([]);
    }

    // ── CRUD ───────────────────────────────────────────────────

    public function delete(ProductSpec $product)
    {
        $product->delete();
        $this->emit('productsEmited');
        $this->loadProductSpecs($this->selectedModelId);
    }

    public function editOrUpdateSpec($product)
    {
        $this->emit('showM', 'add-model-more-spec');
        $this->emit('productId', $product);
    }

    // ── Inline edit ────────────────────────────────────────────

    public function toggleEditable($productId)
    {
        if ($this->editableProductSpecId == $productId) {
            $this->editableProductSpecId = null;
            return;
        }

        $this->editableProductSpecId = $productId;
        $spec = ProductSpec::find($productId);

        $this->price            = $spec->price;
        $this->memory_size_edit = $spec->memory_size;
        $this->color_edit       = $spec->color;
        $this->grade_edit       = $spec->grade;
        $this->condition_edit   = $spec->condition;
    }

    public function updateProductPrice($productId)
    {
        $spec            = ProductSpec::find($productId);
        $spec->price       = $this->price;
        $spec->memory_size = $this->memory_size_edit;
        $spec->color       = $this->color_edit;
        $spec->grade       = $this->grade_edit;
        $spec->condition   = $this->condition_edit;
        $spec->save();

        $this->editableProductSpecId = null;
        $this->loadProductSpecs($this->selectedModelId);
        $this->emit('ProductUpdate', $spec->id);
    }

    public function updateProductQuantity($productId)
    {
        $spec            = ProductSpec::find($productId);
        $spec->quantity    = $spec->quantity + $this->quantity;
        $spec->memory_size = $this->memory_size_edit;
        $spec->color       = $this->color_edit;
        $spec->grade       = $this->grade_edit;
        $spec->condition   = $this->condition_edit;

        $imeiStatus = [];
        foreach ($this->imei as $imei) {
            $imeiStatus[] = ['imei' => $imei, 'status' => 'Available'];
        }
        $existing     = json_decode($spec->imei, true) ?? [];
        $merged       = array_merge($existing, $imeiStatus);
        usort($merged, fn($a, $b) => strcmp($a['status'], $b['status']));
        $spec->imei   = json_encode($merged);

        $spec->save();
        $this->editableProductSpecId = null;
        $this->loadProductSpecs($this->selectedModelId);
        $this->emit('ProductUpdate', $spec->id);
    }

    // ── Image editing ──────────────────────────────────────────

    public function toggleImageEdit($productId)
    {
        if ($this->imageEditProductId == $productId) {
            $this->cancelImageEdit();
            return;
        }

        $this->imageEditProductId  = $productId;
        $this->pendingImageData    = [];
        $this->new_image_previews  = [];

        $spec = ProductSpec::find($productId);
        $decoded = json_decode($spec->image, true);

        if (is_array($decoded)) {
            $this->existing_images = $decoded;
        } elseif ($spec->image) {
            $this->existing_images = [$spec->image];
        } else {
            $this->existing_images = [];
        }
    }

    public function cancelImageEdit()
    {
        $this->imageEditProductId  = null;
        $this->existing_images     = [];
        $this->pendingImageData    = [];
        $this->new_image_previews  = [];
    }

    public function receiveNewImages(array $filesData)
    {
        $this->pendingImageData   = $filesData;
        $this->new_image_previews = $filesData;
    }

    public function removeExistingImage(int $index)
    {
        array_splice($this->existing_images, $index, 1);
        $this->existing_images = array_values($this->existing_images);
    }

    public function saveImages($productId)
    {
        $spec    = ProductSpec::find($productId);
        $newUrls = [];

        // Folder path - direct public folder mein save
        $uploadPath = public_path('uploads/product-specs');

        // Folder create karo agar nahi hai
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        foreach ($this->pendingImageData as $fileData) {
            $extension = $this->extensionFromMime($fileData['type'] ?? 'image/jpeg');
            $filename  = Str::uuid() . '.' . $extension;
            $filepath  = $uploadPath . '/' . $filename;

            // Clean base64
            $base64Data = preg_replace('/\s+/', '', $fileData['data']);
            $imageData  = base64_decode($base64Data);

            if ($imageData === false) {
                Log::error('Base64 decode failed');
                continue;
            }

            // File save karo
            file_put_contents($filepath, $imageData);

            // URL banao - direct public URL
            $newUrls[] = url('uploads/product-specs/' . $filename);
        }

        $allImages   = array_values(array_merge($this->existing_images, $newUrls));
        $spec->image = count($allImages) === 1 ? $allImages[0] : json_encode($allImages);
        $spec->save();

        $this->cancelImageEdit();
        $this->loadProductSpecs($this->selectedModelId);

        session()->flash('image_saved', count($newUrls) . ' image(s) saved.');
    }

    private function extensionFromMime(string $mime): string
    {
        return match ($mime) {
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp',
            default      => 'jpg',
        };
    }

    // ── Render ─────────────────────────────────────────────────

    public function render()
    {
        return view('livewire.admin.buy.addon.index')->layout('layouts.admin');
    }
}