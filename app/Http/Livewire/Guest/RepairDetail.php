<?php

namespace App\Http\Livewire\Guest;

use App\Helpers\ServiceType;
use App\Helpers\SeoUrl;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price;
use App\Models\RepairType;
use Livewire\Component;

class RepairDetail extends Component
{
    public $data;
    public $paywithcardtext = '';
    public $formType = '';
    public $showForm = false;
    public $currentStep = 0;
    public $isFormValid = false;

    public $showProtector    = false;
    public $showCover        = false;
    public $protectorSelected = false;
    public $coverSelected    = false;
    public $protectorPrice   = 0;
    public $coverPrice       = 0;
    public $baseRepairPrice  = 0;
    public $totalPrice       = 0;

    protected $listeners = [
        'formValidated' => 'handleFormValidated',
        'storeFormData'  => 'handleStoreFormData',
    ];

    public function mount($device, $modal, $repair)
    {
        $deviceName = SeoUrl::decodeUrl($device);
        $modalName  = SeoUrl::decodeUrl($modal);
        $repairName = SeoUrl::decodeUrl($repair);

        // ===== DEVICE LOOKUP =====
        $deviceModel = DeviceType::where('slug', $device)->first();
        if (!$deviceModel) $deviceModel = DeviceType::where('name', $deviceName)->first();
        if (!$deviceModel && preg_match('/-(\d+)$/', $device, $m)) $deviceModel = DeviceType::find((int) $m[1]);
        if (!$deviceModel && is_numeric($device)) $deviceModel = DeviceType::find((int) $device);
        if (!$deviceModel) abort(404, 'Device not found');

        // ===== MODAL LOOKUP =====
        $modalModel = Modal::where('slug', $modal)->where('device_type_id', $deviceModel->id)->first();
        if (!$modalModel) $modalModel = Modal::where('slug', $modal)->first();
        if (!$modalModel) $modalModel = Modal::where('name', $modalName)->where('device_type_id', $deviceModel->id)->first();
        if (!$modalModel) $modalModel = Modal::where('name', $modalName)->first();
        if (!$modalModel && preg_match('/-(\d+)$/', $modal, $m)) $modalModel = Modal::find((int) $m[1]);
        if (!$modalModel && is_numeric($modal)) $modalModel = Modal::find((int) $modal);
        if (!$modalModel) abort(404, 'Model not found');

        // ===== REPAIR TYPE LOOKUP =====
        $repairType = RepairType::where('slug', $repair)->first();
        if (!$repairType) $repairType = RepairType::where('name', $repairName)->first();
        if (!$repairType) $repairType = RepairType::where('name', str_replace('-', ' ', $repair))->first();
        if (!$repairType) $repairType = RepairType::whereRaw('LOWER(name) = ?', [strtolower($repairName)])->first();
        if (!$repairType) $repairType = RepairType::whereRaw('LOWER(slug) = ?', [strtolower($repair)])->first();
        if (!$repairType && preg_match('/-(\d+)$/', $repair, $m)) $repairType = RepairType::find((int) $m[1]);
        if (!$repairType && is_numeric($repair)) $repairType = RepairType::find((int) $repair);
        if (!$repairType) abort(404, 'Repair Type not found');

        // ===== PRICE LOOKUP — 3 layer fallback =====
        // Layer 1: Model's findPrice static method
        $repairPrice = Price::findPrice($repairType->id, $modalModel->id);

        // Layer 2: Direct DB query (in case findPrice has any caching issue)
        if (!$repairPrice || (float)$repairPrice == 0) {
            $priceRecord = Price::where('repair_type_id', $repairType->id)
                ->where('modal_id', $modalModel->id)
                ->first();
            $repairPrice = $priceRecord ? (float) $priceRecord->price : 0;
        }

        // Layer 3: URL query param ?price= (passed from repair-types blade)
        if (!$repairPrice || (float)$repairPrice == 0) {
            $repairPrice = (float) (request()->get('price') ?? 0);
        }

        $this->baseRepairPrice   = (float) ($repairPrice ?? 0);
        $this->showProtector     = (bool)  ($modalModel->protector_selected ?? false);
        $this->showCover         = (bool)  ($modalModel->cover_selected ?? false);
        $this->protectorPrice    = (float) ($modalModel->protector_price ?? 0);
        $this->coverPrice        = (float) ($modalModel->cover_price ?? 0);
        $this->protectorSelected = false;
        $this->coverSelected     = false;

        $this->calculateTotal();

        session(['repair_price' => $this->baseRepairPrice]);
        session()->forget('pre_code_price');

        $this->data = [
            'service'      => ServiceType::REPAIR,
            'device'       => $deviceModel,
            'modal'        => $modalModel,
            'repair_type'  => $repairType,
            'repair_price' => $this->baseRepairPrice,
        ];

        $this->syncAddonSession();
    }

    public function toggleProtector()
    {
        $this->protectorSelected = !$this->protectorSelected;
        $this->calculateTotal();
        $this->syncAddonSession();
    }

    public function toggleCover()
    {
        $this->coverSelected = !$this->coverSelected;
        $this->calculateTotal();
        $this->syncAddonSession();
    }

    public function calculateTotal()
    {
        $total = $this->baseRepairPrice;
        if ($this->showProtector && $this->protectorSelected) {
            $total += $this->protectorPrice;
        }
        if ($this->showCover && $this->coverSelected) {
            $total += $this->coverPrice;
        }
        $this->totalPrice = $total;
    }

    private function syncAddonSession()
    {
        session([
            'repair_price' => $this->totalPrice,
            'addons'       => [
                'protector_enabled'  => $this->showProtector,
                'cover_enabled'      => $this->showCover,
                'protector_selected' => $this->protectorSelected,
                'cover_selected'     => $this->coverSelected,
                'protector_price'    => $this->protectorPrice,
                'cover_price'        => $this->coverPrice,
                'base_price'         => $this->baseRepairPrice,
                'total_price'        => $this->totalPrice,
            ],
        ]);

        $this->handleStoreFormData([
            'addons'      => session('addons'),
            'total_price' => $this->totalPrice,
        ]);
    }

    public function hideForm()
    {
        $this->formType    = '';
        $this->showForm    = false;
        $this->currentStep = 0;
        $this->isFormValid = false;
        $this->emit('formHidden');
    }

    public function showForm($formType)
    {
        $this->formType = $formType;
        $this->showForm = true;
        $this->emit('formShown');
    }

    public function handleFormValidated($formSection)
    {
        $map = [
            'repair-info-section' => 0,
            'form-section-1'      => 1,
            'form-section-2'      => 2,
            'book-repair-section' => 3,
        ];
        if (isset($map[$formSection])) {
            $this->currentStep = $map[$formSection];
        }
        $this->isFormValid = true;
    }

    public function handleStoreFormData($formData)
    {
        session()->put('form_data', array_merge(session('form_data', []), $formData));
    }

    public function render()
    {
        return view('livewire.guest.repair-detail', [
            'device'            => $this->data['device'],
            'modal'             => $this->data['modal'],
            'formType'          => $this->formType,
            'isFormValid'       => $this->isFormValid,
            'paywithcardtext'   => $this->paywithcardtext,
            'totalPrice'        => $this->totalPrice,
            'showProtector'     => $this->showProtector,
            'showCover'         => $this->showCover,
            'protectorSelected' => $this->protectorSelected,
            'coverSelected'     => $this->coverSelected,
            'protectorPrice'    => $this->protectorPrice,
            'coverPrice'        => $this->coverPrice,
        ])->layout('frontend.layouts.app');
    }
}