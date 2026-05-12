<?php

namespace App\Http\Livewire\Guest\Components;

use Livewire\Component;
use App\Models\Branch;
use Illuminate\Support\Facades\Http;

class Postal
{
    public $name;
    public $code;
    public $address_line_1;
    public $address_line_2;
    public $repair_note;
    public $city;
}

class PostalRepairForm extends Component
{
    public $branches;
    public $selectedBranch;
    public $nearestBranches = [];
    public $latitude;
    public $longitude;
    public $clinic_name;
    public $selectedBranchId = null;  // null so Alpine "!selectedBranchId" works correctly
    public $mainBranch = false;
    public $postal = [];              // initialized as array
    public $writeYourSelf = false;
    public $serviceType;
    public $post_code;
    public $responseData;
    public $selectedOption;
    public $addressLine1;
    public $addressLine2;
    public $townCity;
    public $addressName = '';
    public $knownAddresses;
    public $showInputFields = false;
    public $errorMessage = '';
    public $mapLink = null;
    public $siteBranch = null;        // used in blade for map display

    protected $rules = [
        'postal.name'           => 'required|string|max:255',
        'postal.code'           => 'required|string|max:10',
        'postal.address_line_1' => 'required|string|max:255',
        'postal.address_line_2' => 'required|string|max:255',
        'postal.repair_note'    => 'nullable|string',
        'postal.city'           => 'nullable|string|max:100',
    ];

    protected function rules()
    {
        if (session()->get('serviceType') == 'Sell') {
            return [
                'postal.name'           => 'nullable|string|max:255',
                'postal.code'           => 'nullable|string|max:10',
                'postal.address_line_1' => 'nullable|string|max:255',
                'postal.address_line_2' => 'nullable|string|max:255',
                'postal.repair_note'    => 'nullable|string',
                'postal.city'           => 'nullable|string|max:100',
            ];
        }

        return $this->rules;
    }

    public function mount($initialBranchId = null)
    {
        $this->serviceType = session()->get('serviceType', 'Unknown Service');
        $this->getBranches($initialBranchId);
    }

    protected $listeners = [
        'updateLocation'   => 'handleUpdateLocation',
        'writeYourSelfLis',
        'addAddressDataLis',
        'addressSelected',
        'goBack',
    ];

    public function goBack()
    {
        $this->emit('childGoBack');
    }

    public function toggleShowInputs()
    {
        $this->showInputFields = !$this->showInputFields;
    }

    public function getLatLong()
    {
        $post_code = trim($this->post_code);

        $url = "https://nominatim.openstreetmap.org/search?q={$post_code}&format=json";

        $response = Http::withHeaders([
            'User-Agent' => 'MobileBitz/1.0 (admin@mobilebitz.co.uk)'
        ])->get($url);

        if ($response->successful()) {
            $data = $response->json();
            if (!empty($data) && isset($data[0]['lat'], $data[0]['lon'])) {
                $latitude  = $data[0]['lat'];
                $longitude = $data[0]['lon'];
            } else {
                session()->flash('error', 'You entered an incorrect postal code.');
                return false;
            }
        } else {
            session()->flash('error', 'Failed to fetch geolocation data. Please try again later.');
            return false;
        }

        $this->nearestBranches = $this->findNearestBranches($latitude, $longitude);

        if (!empty($this->nearestBranches)) {
            $nearestBranch          = $this->nearestBranches[0];
            $this->selectedBranch   = $nearestBranch;
            $this->selectedBranchId = $nearestBranch['id'];
            $this->postal['name']   = $nearestBranch['name'];
            $this->mapLink          = $nearestBranch['map_link'];

            $this->sortNearestBranches();
            session()->put('clinic_name', $this->postal['name']);
            session()->put('map_link', $this->mapLink);

            return true;
        }

        return false;
    }

    public function handleUpdateLocation($location)
    {
        $latitude  = $location['latitude'];
        $longitude = $location['longitude'];

        $this->nearestBranches = $this->findNearestBranches($latitude, $longitude);

        if (!empty($this->nearestBranches)) {
            $this->selectedBranchId = null;
            $this->updateMapLink();
            $this->sortNearestBranches();
        }
    }

    public function changeApiData()
    {
        $response = Http::get('https://www.doogal.co.uk/GetPostcode/' . $this->post_code . '?output=json');

        if ($response->successful()) {
            $this->responseData   = $response->json();
            $this->postal['code'] = $this->post_code;
        } else {
            $this->responseData = ['error' => 'API call failed'];
        }
    }

    public function toggleInputFields()
    {
        $this->showInputFields = true;
    }

    public function updateAddressFields()
    {
        if ($this->selectedOption !== null && $this->selectedOption !== '') {
            // selectedOption is now the array key (index)
            $addresses    = $this->responseData['knownAddresses'] ?? [];
            $selectedAddr = $addresses[$this->selectedOption] ?? '';

            $addressParts                   = explode(',', $selectedAddr);
            $this->postal['address_line_1'] = trim($addressParts[0] ?? '');
            $this->postal['address_line_2'] = trim($addressParts[1] ?? '');
            $this->postal['city']           = trim($addressParts[2] ?? '');
            $this->emit('addressFieldsUpdated', [
                'address1' => $this->postal['address_line_1'],
                'address2' => $this->postal['address_line_2'],
                'city'     => $this->postal['city'],
            ]);
        }
    }

    public function toggleAddressFields()
    {
        $this->writeYourSelf = !$this->writeYourSelf;
        $this->emitUp('writeYourSelfLis', !$this->writeYourSelf);
    }

    public function updatedSelectedOption($value)
    {
        $this->updateAddressFields();
    }

    public function writeYourSelfLis($value)
    {
        $this->writeYourSelf = $value;
        info('this value from listener', [$value]);
    }

    public function addAddressDataLis($address)
    {
        $this->postal['address_line_1'] = $address['address'];
        $this->postal['address_line_2'] = $address['address'];
        $this->postal['city']           = $address['postTown'];
    }

    public function calculateDistance($userLat, $userLng, $branchLat, $branchLng)
    {
        $earthRadius = 6371;

        $latDiff = deg2rad($branchLat - $userLat);
        $lngDiff = deg2rad($branchLng - $userLng);

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos(deg2rad($userLat)) * cos(deg2rad($branchLat)) *
            sin($lngDiff / 2) * sin($lngDiff / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    public function findNearestBranches($latitude, $longitude)
    {
        $branches = Branch::all();

        $branches->transform(function ($branch) use ($latitude, $longitude) {
            $branch->distance = $this->calculateDistance(
                $latitude, $longitude,
                $branch->latitude, $branch->longitude
            );
            return $branch;
        });

        return $branches->sortBy('distance')->values()->toArray();
    }

    public function resetBranchSelection()
    {
        $this->nearestBranches  = [];
        $this->selectedBranchId = null;
        $this->mapLink          = null;
    }

    public function getBranches($initialBranchId = null)
    {
        if ($initialBranchId) {
            $this->branches = Branch::where('id', $initialBranchId)->get();
        } else {
            $this->branches = Branch::limit(1)->get();
        }

        // Set siteBranch for map display in blade
        $this->siteBranch = $this->branches->first();

        // Auto-select the only/first branch so user doesn't have to click radio
        if ($this->siteBranch) {
            $this->selectedBranchId = $this->siteBranch->id;
        }

        $this->emit('branchesLoaded', $this->branches);
    }

    public function updated($property)
    {
        if (array_key_exists($property, $this->rules())) {
            $this->validateOnly($property);
            session()->put('postal_form', $this->postal);
        }

        if ($property === 'post_code') {
            $this->getLatLong();
        }

        if ($property === 'selectedBranchId') {
            $this->selectedBranch = Branch::find($this->selectedBranchId);
            $this->siteBranch     = $this->selectedBranch;
            $this->updateMapLink();
        }

        if ($property === 'nearestBranches') {
            $this->sortNearestBranches();
        }

        $this->updateMapLink();
    }

    public function submitForm()
    {
        $this->validate();
        session()->put('postal_form', $this->postal);
        $this->emit('formSubmitted');
    }

    public function selectBranch($branchId)
    {
        $this->selectedBranch   = Branch::find($branchId);
        $this->selectedBranchId = $branchId;
        $this->siteBranch       = $this->selectedBranch;
        $this->updateMapLink();

        if ($this->selectedBranch) {
            session()->put('Postal_name', $this->selectedBranch->name);
            session()->put('map_link', $this->mapLink);
            $this->emit('BranchSelected');
        }
    }

    public function updateMapLink()
    {
        if ($this->selectedBranch && is_object($this->selectedBranch) && isset($this->selectedBranch->map_link)) {
            $this->mapLink = $this->selectedBranch->map_link;
        } else {
            $this->mapLink = null;
        }
    }

    protected function sortNearestBranches()
    {
        $this->nearestBranches = collect($this->nearestBranches)
            ->sortBy('distance')
            ->values()
            ->toArray();
    }

    public function render()
    {
        // Safety net
        if (!$this->branches || $this->branches->isEmpty()) {
            $this->branches   = Branch::limit(1)->get();
            $this->siteBranch = $this->branches->first();
            if ($this->siteBranch && !$this->selectedBranchId) {
                $this->selectedBranchId = $this->siteBranch->id;
            }
        }

        return view('livewire.guest.components.postal-repair-form', [
            'serviceType'     => $this->serviceType,
            'nearestBranches' => $this->nearestBranches,
            'branches'        => $this->branches,
            'siteBranch'      => $this->siteBranch,
        ]);
    }
}