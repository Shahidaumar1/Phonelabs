<?php

namespace App\Http\Livewire\Guest\Buy;

use App\Helpers\ServiceType;
use App\Models\CategoryText;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductSpecs extends Component
{
    public $detail;
    public $specification;
    public $warranty;
    public $model;
    public $selectedMemorySize;
    public $selectedGrade;
    public $selectedColor;
    public $price;
    public $basic_price = 0;
    public $quantity = 1;
    public $product_id;
    public $imei;
    public $available_quantity;

    public $available_memory_sizes = [];
    public $available_grades = [];
    public $available_colors = [];
    public $selectedOtherSpecId;
    public $data = [];
    public $grades;
    public $category;
    public $grade_text;
    public $activeGrade;
    public $product_spec_image;

    public $currentStep = 0;
    public $formCompleted = [false, false, false, false];

    protected $listeners = [
        'formValidated' => 'handleFormValidated',
        'formInvalid'   => 'handleFormInvalid',
    ];

    public function handleFormValidated($formSection)
    {
        $formSectionMap = [
            'product-info-section'   => 0,
            'form-toggle-section'    => 1,
            'patient-detail-section' => 2,
            'booking-section'        => 3,
        ];

        if (isset($formSectionMap[$formSection])) {
            $this->currentStep = $formSectionMap[$formSection];
        }

        $this->emit('formSubmitted');
    }

    public function handleFormInvalid()
    {
        $this->emit('formInvalid');
    }

    /**
     * Route: /buy/{category_slug}/{device_slug}/{model_slug}
     * Accepts both numeric ID (old) and slug (new SEO URLs).
     */
    public function mount($category_slug, $device_slug, $model_slug)
    {
        if (is_numeric($model_slug)) {
            // Backward compatibility — old ID-based URLs redirected here
            $this->model = Modal::findOrFail($model_slug);
        } else {
            // New SEO slug — strip any trailing '-id' suffix if present
            // e.g. 'iphone-16-buy-792' → try slug first, then extract id
            $this->model = Modal::where('slug', $model_slug)
                ->where('status', 'publish')
                ->first();

            // Fallback: if slug not found, try extracting numeric id from end
            if (! $this->model) {
                if (preg_match('/-(\d+)$/', $model_slug, $matches)) {
                    $this->model = Modal::find($matches[1]);
                }
            }

            if (! $this->model) {
                abort(404);
            }
        }

        $this->loadAvailableSpecs();
        $this->category = $this->model->device_type->category;
        $this->loadGrades();
        $this->loadData();
    }

    public function loadData()
    {
        $this->data = [
            'service'          => ServiceType::BUY,
            'device'           => $this->model->device_type,
            'modal'            => $this->model,
            'memory_size'      => $this->selectedMemorySize ?? null,
            'color'            => $this->selectedColor ?? null,
            'grade'            => $this->selectedGrade ?? null,
            'price'            => $this->price,
            'quantity'         => $this->quantity,
            'product_id'       => $this->product_id ?? null,
            'network_unlocked' => $this->network_unlocked ?? null,
            'detail'           => $this->detail ?? null,
            'warranty'         => $this->warranty ?? null,
            'specification'    => $this->specification ?? null,
        ];
    }

    private function baseQuery()
    {
        return ProductSpec::where('model_id', $this->model->id)
                          ->where('service', 'Buy')
                          ->where('quantity', '>=', 1);
    }

    public function updated($property)
    {
        if (
            $property === 'selectedMemorySize' ||
            $property === 'selectedGrade'      ||
            $property === 'selectedColor'
        ) {
            if ($property === 'selectedMemorySize') {
                $this->selectedGrade      = null;
                $this->selectedColor      = null;
                $this->available_grades   = [];
                $this->available_colors   = [];
                $this->price              = 0;
                $this->basic_price        = 0;
                $this->product_id         = null;
                $this->imei               = null;
                $this->detail             = null;
                $this->specification      = null;
                $this->warranty           = null;
                $this->product_spec_image = null;

                $this->available_grades = $this->baseQuery()
                    ->where('memory_size', $this->selectedMemorySize)
                    ->distinct()->pluck('grade')
                    ->filter()->values()->toArray();
            }

            if ($property === 'selectedGrade') {
                $this->selectedColor      = null;
                $this->available_colors   = [];
                $this->price              = 0;
                $this->basic_price        = 0;
                $this->product_id         = null;
                $this->imei               = null;
                $this->detail             = null;
                $this->specification      = null;
                $this->warranty           = null;
                $this->product_spec_image = null;

                $this->available_colors = $this->baseQuery()
                    ->where('memory_size', $this->selectedMemorySize)
                    ->where('grade', $this->selectedGrade)
                    ->distinct()->pluck('color')
                    ->filter()->values()->toArray();

                $this->updatedSelectedGrade();
            }

            $product_spec = null;

            if ($this->selectedMemorySize && $this->selectedGrade && $this->selectedColor) {
                $product_spec = $this->baseQuery()
                    ->where('memory_size', $this->selectedMemorySize)
                    ->where('grade', $this->selectedGrade)
                    ->where('color', $this->selectedColor)
                    ->first();
            } elseif ($this->selectedMemorySize && $this->selectedGrade) {
                $product_spec = $this->baseQuery()
                    ->where('memory_size', $this->selectedMemorySize)
                    ->where('grade', $this->selectedGrade)
                    ->first();
            }

            if ($product_spec) {
                $this->quantity           = 1;
                $this->basic_price        = $product_spec->price ?? 0;
                $this->price              = ($product_spec->price * $this->quantity) ?? 0;
                $this->available_quantity = $product_spec->quantity;
                $this->product_id         = $product_spec->id;
                $this->imei               = $product_spec->imei;
                $this->product_spec_image = $product_spec->image;
                $this->detail             = $product_spec->detail;
                $this->specification      = $product_spec->specification;
                $this->warranty           = $product_spec->warranty;

                $this->emit('priceEmitter', $this->price);
                $this->loadData();
                $this->emit('buySpecs', $this->data);
            }
        }
    }

    public function loadAvailableSpecs()
    {
        $base = $this->baseQuery();

        $this->available_memory_sizes = (clone $base)
            ->whereNotNull('memory_size')
            ->distinct()->pluck('memory_size')
            ->filter()->values()->toArray();

        $this->available_grades = (clone $base)
            ->whereNotNull('grade')
            ->distinct()->pluck('grade')
            ->filter()->values()->toArray();

        $this->available_colors = (clone $base)
            ->whereNotNull('color')
            ->distinct()->pluck('color')
            ->filter()->values()->toArray();
    }

    public function loadGrades()
    {
        $this->grades = ['A', 'B', 'C'];
    }

    public function updatedSelectedGrade()
    {
        if ($this->category) {
            $category_text = CategoryText::where('category_id', $this->category->id)->first();
            if ($category_text) {
                $gradeData = json_decode($category_text->grade_text);
                $this->grade_text = $gradeData->{$this->selectedGrade} ?? null;
            }
        }
    }

    public function initFirstSpec()
    {
        $this->loadAvailableSpecs();

        if (! empty($this->available_memory_sizes)) {
            $this->selectedMemorySize = $this->available_memory_sizes[0];

            $this->available_grades = $this->baseQuery()
                ->where('memory_size', $this->selectedMemorySize)
                ->distinct()->pluck('grade')
                ->filter()->values()->toArray();
        }

        if (! empty($this->available_grades)) {
            $this->selectedGrade = $this->available_grades[0];

            $this->available_colors = $this->baseQuery()
                ->where('memory_size', $this->selectedMemorySize)
                ->where('grade', $this->selectedGrade)
                ->distinct()->pluck('color')
                ->filter()->values()->toArray();
        }

        if (! empty($this->available_colors)) {
            $this->selectedColor = $this->available_colors[0];
        }

        if ($this->selectedMemorySize && $this->selectedGrade) {
            $query = $this->baseQuery()
                ->where('memory_size', $this->selectedMemorySize)
                ->where('grade', $this->selectedGrade);

            if ($this->selectedColor) {
                $query->where('color', $this->selectedColor);
            }

            $product_spec = $query->first();

            if ($product_spec) {
                $this->price              = $product_spec->price ?? 0;
                $this->basic_price        = $product_spec->price ?? 0;
                $this->available_quantity = $product_spec->quantity ?? 0;
                $this->product_id         = $product_spec->id;
                $this->imei               = $product_spec->imei;
                $this->updatedSelectedGrade();
            }
        }
    }

    public function decreaseQuantity()
    {
        $this->quantity = max(1, $this->quantity - 1);
        $this->price    = $this->basic_price * $this->quantity;
        $this->emit('priceEmitter', $this->price);
        $this->loadData();
        $this->emit('buySpecs', $this->data);
    }

    public function increaseQuantity()
    {
        if ($this->quantity < $this->available_quantity) {
            $this->quantity++;
        }
        $this->price = $this->basic_price * $this->quantity;
        $this->emit('priceEmitter', $this->price);
        $this->loadData();
        $this->emit('buySpecs', $this->data);
    }

    public function quantityChanged()
    {
        $this->quantity = max(1, min($this->quantity, $this->available_quantity ?? 1));
        $this->price    = $this->basic_price * $this->quantity;
        $this->emit('priceEmitter', $this->price);
        $this->loadData();
        $this->emit('buySpecs', $this->data);
    }

    public function render()
    {
        return view('livewire.guest.buy.product-specs')->layout('frontend.layouts.app');
    }
}
