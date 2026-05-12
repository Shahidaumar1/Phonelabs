<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\ServiceType;
use App\Models\CategoryText;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ModelDetail extends Component
{
    public $mobileMode  = true;
    public $tabletMode;
    public $consoleMode;
    public $laptopMode;
    public $watchMode;
    public $branchtesting1 = '';
    public $form            = 'paypal';
    public $network_unlocked = false;
    public $account_cleared;
    public $model;
    public $selectedMemorySize;
    public $selectedCondition;
    public $selectedColor;
    public $price           = 0;
    public $available_memory_sizes = [];
    public $available_conditions   = [];
    public $available_colors       = [];
    public $data;
    public $selectedOtherSpecId;
    public $conditions;
    public $category;
    public $condition_text;
    public $product_spec_image;
    public $rand;
    public $product_spec;
    public $currentStep     = 1;
    public $network_providers = [];
    public $selectedNetwork;

    public function moveToPreviousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    // ✅ UPDATED: model_id ki jagah category_slug + device_slug + model_slug use hoga
    public function mount($category_slug, $device_slug, $model_slug)
    {
        // Slug se model find karo
        $this->model = Modal::where('slug', $model_slug)
            ->where('status', 'publish')
            ->firstOrFail();

        session()->put('modelName', $this->model->name);

        $this->category = $this->model->device_type->category;

        $this->loadAvailableSpecs();
        $this->loadData();
        $this->loadConditions();
        $this->changeSpecForm();
    }

    protected $listeners = [
        'changePostal',
        'formValidated' => 'moveToNextStep',
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

    public function loadData()
    {
        $this->data = [
            'service'          => ServiceType::SELL,
            'device'           => $this->model->device_type,
            'modal'            => $this->model,
            'memory_size'      => $this->selectedMemorySize ?? '',
            'color'            => $this->selectedColor ?? '',
            'condition'        => $this->selectedCondition ?? '',
            'price'            => $this->price,
            'network_unlocked' => $this->selectedNetwork ?? '',
        ];
    }

    public function toggleNetworkUnlocked()
    {
        $this->network_unlocked = !$this->network_unlocked;
    }

    public function selectNetwork($network)
    {
        $this->selectedNetwork = $network;
        $this->updated('selectedNetwork');
    }

    public function toggleAccountCleared()
    {
        $this->account_cleared = !$this->account_cleared;
    }

    public function changeForm($form)
    {
        $this->form = $form;
    }

    public function updated($property)
    {
        $query = ProductSpec::where('model_id', $this->model->id);

        if ($property == 'selectedMemorySize') {
            $this->selectedCondition    = null;
            $this->selectedNetwork      = null;
            $this->available_conditions = [];
            $this->price                = 0;

            $this->available_conditions = $query
                ->where('memory_size', $this->selectedMemorySize)
                ->distinct('condition')->pluck('condition')->toArray();
        }

        if ($property == 'selectedCondition' && $this->selectedMemorySize) {
            $this->selectedNetwork = null;
            $this->price           = 0;

            $product_spec = $query
                ->where('memory_size', $this->selectedMemorySize)
                ->where('condition', $this->selectedCondition)
                ->first();

            if ($product_spec) {
                $this->price              = $product_spec->price ?? 0;
                $this->product_spec_image = $product_spec->image;
                $this->loadData();
                $this->emit('sellSpecs', $this->data);
            }

            $this->network_providers = $query
                ->where('memory_size', $this->selectedMemorySize)
                ->where('condition', $this->selectedCondition)
                ->distinct('network_unlocked')
                ->pluck('network_unlocked')
                ->filter(fn($n) => $n && $n !== '0' && $n !== '1')
                ->values()->toArray();

            if (count($this->network_providers) == 1) {
                $this->selectedNetwork = $this->network_providers[0];
            }
        }

        if ($property == 'selectedNetwork' && $this->selectedMemorySize && $this->selectedCondition && $this->selectedNetwork) {
            $product_spec = $query
                ->where('memory_size', $this->selectedMemorySize)
                ->where('condition', $this->selectedCondition)
                ->where('network_unlocked', $this->selectedNetwork)
                ->first();

            if ($product_spec) {
                $this->price              = $product_spec->price ?? $this->price;
                $this->product_spec_image = $product_spec->image;
                $this->loadData();
                $this->emit('sellSpecs', $this->data);
            }
        }
    }

    public function loadAvailableSpecs()
    {
        $this->available_memory_sizes = $this->model->memory_sizes;
        $this->available_conditions   = $this->model->conditions;
        $this->available_colors       = $this->model->colors;
    }

    public function loadConditions()
    {
        $this->conditions = ['Excellent', 'Good', 'Fair', 'Poor', 'Faulty'];
    }

    public function updatedSelectedCondition()
    {
        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        if ($category_text) {
            $condTexts = json_decode($category_text->condition_text);
            $this->condition_text = $condTexts->{$this->selectedCondition} ?? null;
        }
    }

    public function changeSpecForm()
    {
        $this->mobileMode  = Str::contains($this->model->device_type->category->name, 'Phone');
        $this->tabletMode  = Str::contains($this->model->device_type->category->name, 'Tablet&Ipad');
        $this->consoleMode = Str::contains($this->model->device_type->category->name, 'Console');
        $this->watchMode   = Str::contains($this->model->device_type->category->name, 'Watch');
        $this->laptopMode  = Str::contains($this->model->device_type->category->name, 'Laptop');
    }

    public function initFirstSpec()
    {
        $query = ProductSpec::where('model_id', $this->model->id);
        if (in_array(!null, $this->available_memory_sizes)) {
            $this->selectedMemorySize   = $this->available_memory_sizes[0];
            $this->available_conditions = $query->where('memory_size', $this->selectedMemorySize)->distinct('condition')->pluck('condition')->toArray();
        }
        if (in_array(!null, $this->available_conditions)) {
            $this->selectedCondition = $this->available_conditions[0];
        }
        if ($this->selectedMemorySize && $this->selectedCondition) {
            $product_spec = $query->where('memory_size', $this->selectedMemorySize)->where('condition', $this->selectedCondition)->first();
            $this->price  = $product_spec->price ?? 0;
            $this->updatedSelectedCondition();
        }
    }

    public function getBranchValues()
    {
        if (isset($this->branchtesting1) && $this->branchtesting1) {
            $loadedBranch = \App\Models\Branch::where('id', $this->branchtesting1)->first();
        } else {
            $loadedBranch = \App\Models\Branch::query()->first();
        }
        return $loadedBranch;
    }

    public function render()
    {
        Session::put($this->price, 'modelprice');
        return view('livewire.guest.sell.model-detail', ['currentStep' => $this->currentStep])->layout('frontend.layouts.app');
    }
}