<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\ProductSpec;
use App\Models\Modal;
use App\Helpers\ServiceType;

class Checkout extends Component
{
    public $product;
    public $model;

    // images
    public $product_spec_image;

    // spec page vars
    public $detail;
    public $specification;
    public $warranty;

    public $available_memory_sizes = [];
    public $available_grades       = [];
    public $available_colors       = [];

    public $available_quantity = 1;

    public $selectedMemorySize;
    public $selectedGrade;
    public $selectedColor;
    public $quantity = 1;

    public $price = 0;

    // array jo form-toggle + book-repair ko pass hoga
    public $data = [];

    public function mount($productSpec)
    {
        // current accessory
        $this->product = ProductSpec::with('model')->findOrFail($productSpec);
        $this->model   = $this->product->model;

        // image (single ya json array)
        $this->product_spec_image = $this->product->image;

        // optional fields (agar columns na hon to error se bachne ke liye ?? '')
        $this->detail        = $this->product->detail        ?? '';
        $this->specification = $this->product->specification ?? '';
        $this->warranty      = $this->product->warranty      ?? '';

        // choices (sirf isi model ke accessories)
        $baseQuery = ProductSpec::where('model_id', $this->product->model_id)
            ->where('service', ServiceType::ACCESSORIES);

        $this->available_memory_sizes = $baseQuery->clone()
            ->whereNotNull('memory_size')
            ->where('memory_size', '!=', '')
            ->distinct()
            ->pluck('memory_size')
            ->values()
            ->toArray();

        $this->available_grades = $baseQuery->clone()
            ->whereNotNull('grade')
            ->where('grade', '!=', '')
            ->distinct()
            ->pluck('grade')
            ->values()
            ->toArray();

        $this->available_colors = $baseQuery->clone()
            ->whereNotNull('color')
            ->where('color', '!=', '')
            ->distinct()
            ->pluck('color')
            ->values()
            ->toArray();

        $this->available_quantity = (int) ($this->product->quantity ?? 1);

        // default selected values = jo productSpec pe already set hain
        $this->selectedMemorySize = $this->product->memory_size ?? null;
        $this->selectedGrade      = $this->product->grade       ?? null;
        $this->selectedColor      = $this->product->color       ?? null;

        $this->quantity = 1;
        $this->recalculatePrice();

        $this->buildDataArray();
    }

    public function increaseQuantity()
    {
        if ($this->quantity < $this->available_quantity) {
            $this->quantity++;
            $this->recalculatePrice();
            $this->buildDataArray();
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->recalculatePrice();
            $this->buildDataArray();
        }
    }

    public function quantityChanged()
    {
        if ($this->quantity < 1) {
            $this->quantity = 1;
        }
        if ($this->quantity > $this->available_quantity) {
            $this->quantity = $this->available_quantity;
        }
        $this->recalculatePrice();
        $this->buildDataArray();
    }

    protected function recalculatePrice()
    {
        $unit = (float) ($this->product->price ?? 0);
        $this->price = $unit * (int) $this->quantity;
    }

    protected function buildDataArray()
    {
        // ye structure tumhare buy / repair flows jaisa rakha hai
        $this->data = [
            'service'  => ServiceType::ACCESSORIES,
            'modal'    => [
                'id'   => $this->model->id ?? null,
                'name' => $this->model->name ?? '',
            ],
            'price'       => $this->price,
            'product_id'  => $this->product->id,
            'quantity'    => $this->quantity,
            'attributes'  => [
                'memory_size' => $this->selectedMemorySize,
                'grade'       => $this->selectedGrade,
                'color'       => $this->selectedColor,
            ],
        ];
    }

    public function render()
    {
        return view('livewire.guest.checkout')
            ->layout('frontend.layouts.app');
    }
}
