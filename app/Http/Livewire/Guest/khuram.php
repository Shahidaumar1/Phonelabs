<?php

namespace App\Http\Livewire\Guest;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Livewire\WithPagination;

class khuram extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // filters
    public $selectedCategoryId = 'all';   // accessories category (Cases etc.)
    public $selectedDeviceId   = 'all';   // device type (Apple Case, Samsung Cases...)
    public $selectedColor      = 'all';
    public $minPrice;
    public $maxPrice;
    public $search = '';

    // data for dropdowns / sidebar
    public $categories = [];
    public $devices    = [];
    public $colors     = [];

    protected $queryString = [
        'selectedCategoryId' => ['except' => 'all'],
        'selectedDeviceId'   => ['except' => 'all'],
        'selectedColor'      => ['except' => 'all'],
        'minPrice'           => ['except' => null],
        'maxPrice'           => ['except' => null],
        'search'             => ['except' => ''],
        'page'               => ['except' => 1],
    ];

    public function mount()
    {
        // Accessories categories
        $this->categories = Category::where('service', ServiceType::ACCESSORIES)
            ->orderBy('name')
            ->get();

        // price range (only accessories)
        $min = ProductSpec::where('service', ServiceType::ACCESSORIES)->min('price');
        $max = ProductSpec::where('service', ServiceType::ACCESSORIES)->max('price');

        $this->minPrice = (int) ($min ?? 0);
        $this->maxPrice = (int) ($max ?? 0);

        // available colors
        $this->colors = ProductSpec::where('service', ServiceType::ACCESSORIES)
            ->whereNotNull('color')
            ->where('color', '!=', '')
            ->distinct()
            ->pluck('color')
            ->values()
            ->toArray();

        // devices for initial load
        $this->loadDevices();
    }

    public function updatedSelectedCategoryId()
    {
        $this->resetPage();
        $this->selectedDeviceId = 'all';
        $this->loadDevices();
    }

    public function updatedSelectedDeviceId()
    {
        $this->resetPage();
    }

    public function updatedSelectedColor()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearFilter()
    {
        $this->reset([
            'selectedCategoryId',
            'selectedDeviceId',
            'selectedColor',
            'search',
        ]);

        $this->selectedCategoryId = 'all';
        $this->selectedDeviceId   = 'all';
        $this->selectedColor      = 'all';

        $this->resetPage();
        $this->loadDevices();
    }

    protected function loadDevices()
    {
        $deviceQuery = DeviceType::where('service', ServiceType::ACCESSORIES);

        if ($this->selectedCategoryId !== 'all') {
            $deviceQuery->where('category_id', $this->selectedCategoryId);
        }

        $this->devices = $deviceQuery->orderBy('name')->get();
    }

    public function render()
    {
        // base query: accessories specs with stock > 0
        $query = ProductSpec::query()
            ->where('service', ServiceType::ACCESSORIES)
            ->where('quantity', '>', 0)
            ->with([
                'model.deviceType.category',
            ]);

        // filter by category (Cases, Screen Protectors, etc.)
        if ($this->selectedCategoryId !== 'all') {
            $query->whereHas('model.deviceType', function ($q) {
                $q->where('category_id', $this->selectedCategoryId);
            });
        }

        // filter by device type (Apple Case, Samsung Cases, etc.)
        if ($this->selectedDeviceId !== 'all') {
            $query->whereHas('model', function ($q) {
                $q->where('device_type_id', $this->selectedDeviceId);
            });
        }

        // color filter
        if ($this->selectedColor !== 'all') {
            $query->where('color', $this->selectedColor);
        }

        // price filter
        if ($this->minPrice !== null && $this->maxPrice !== null && $this->maxPrice > 0) {
            $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);
        }

        // search by model name
        if ($this->search !== '') {
            $search = $this->search;
            $query->whereHas('model', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $products = $query
            ->orderBy('price')
            ->paginate(18);

        return view('livewire.guest.khuram', [
            'products' => $products,
        ])->layout('frontend.layouts.app');
    }
}
