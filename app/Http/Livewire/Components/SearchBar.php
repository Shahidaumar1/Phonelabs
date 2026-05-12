<?php




namespace App\Http\Livewire\Components;

use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\RepairType;
use App\Helpers\SeoUrl;

class SearchBar extends Component
{
    public $search = '';
    public $results = [];


    // public function updatedSearch()
    // {
    //     if (strlen($this->search) > 2) {
    //         // Search for device types
    //         $deviceTypes = DeviceType::where('name', 'like', '%' . $this->search . '%')->get();

    //         // Search for modals
    //         $modals = Modal::where('name', 'like', '%' . $this->search . '%')->get();

    //         // Search for repair types with related prices and their modals and device types
    //         $repairTypes = RepairType::where('name', 'like', '%' . $this->search . '%')
    //             ->with(['prices.modal.deviceType'])
    //             ->get()
    //             ->map(function ($repairType) {
    //                 // Sort prices by device type name
    //                 $repairType->prices = $repairType->prices->sortBy(function ($price) {
    //                     return $price->modal->deviceType->name ?? '';
    //                 });
    //                 return $repairType;
    //             });

    //         // Prepare results where device types appear first, followed by modals, and then repair types
    //         $this->results = $deviceTypes->merge($modals)->merge($repairTypes)->all();
    //     } else {
    //         $this->results = [];
    //     }
    // }
  
//   public function updatedSearch()
// {
//     if (strlen($this->search) > 2) {
//         // Search for device types with modals having prices > 0
//         $deviceTypes = DeviceType::where('name', 'like', '%' . $this->search . '%')
//             ->whereHas('modals.prices', function ($query) {
//                 $query->where('price', '>', 0);
//             })
//             ->with(['modals.prices' => function ($query) {
//                 $query->where('price', '>', 0);
//             }])
//             ->get();

//         // Search for modals with prices > 0
//         $modals = Modal::where('name', 'like', '%' . $this->search . '%')
//             ->whereHas('prices', function ($query) {
//                 $query->where('price', '>', 0);
//             })
//             ->with(['prices' => function ($query) {
//                 $query->where('price', '>', 0);
//             }])
//             ->get();

//         // Search for repair types with prices > 0
//         $repairTypes = RepairType::where('name', 'like', '%' . $this->search . '%')
//             ->whereHas('prices', function ($query) {
//                 $query->where('price', '>', 0);
//             })
//             ->with(['prices' => function ($query) {
//                 $query->where('price', '>', 0);
//             }, 'prices.modal.deviceType'])
//             ->get()
//             ->map(function ($repairType) {
//                 // Sort prices by device type name
//                 $repairType->prices = $repairType->prices->sortBy(function ($price) {
//                     return $price->modal->deviceType->name ?? '';
//                 });
//                 return $repairType;
//             });

//         // Prepare results where device types appear first, followed by modals, and then repair types
//         $this->results = $deviceTypes->merge($modals)->merge($repairTypes)->all();
//     } else {
//         $this->results = [];
//     }
// }
 
 public function updatedSearch()
{
    if (strlen($this->search) > 2) {
        // Prioritize exact matches for modals
        $exactModals = Modal::where('name', $this->search)
            ->whereHas('prices', function ($query) {
                $query->where('price', '>', 0);
            })
            ->with(['prices' => function ($query) {
                $query->where('price', '>', 0);
            }, 'deviceType' => function ($query) {
                $query->where('service', 'repair');
            }])
            ->get();

        // Search for device types and modals that contain the search term but not necessarily exact matches
        $deviceTypes = DeviceType::where('name', 'like', '%' . $this->search . '%')
            ->where('service', 'repair')
            ->whereHas('modals.prices', function ($query) {
                $query->where('price', '>', 0);
            })
            ->with(['modals.prices' => function ($query) {
                $query->where('price', '>', 0);
            }])
            ->get();

        $modals = Modal::where('name', 'like', '%' . $this->search . '%')
            ->where('name', '!=', $this->search) // Exclude exact matches to avoid duplication
            ->whereHas('prices', function ($query) {
                $query->where('price', '>', 0);
            })
            ->whereHas('deviceType', function ($query) {
                $query->where('service', 'repair');
            })
            ->with(['prices' => function ($query) {
                $query->where('price', '>', 0);
            }, 'deviceType' => function ($query) {
                $query->where('service', 'repair');
            }])
            ->get();

        // Search for repair types
        $repairTypes = RepairType::where('name', 'like', '%' . $this->search . '%')
            ->whereHas('prices', function ($query) {
                $query->where('price', '>', 0)
                      ->whereHas('modal.deviceType', function ($query) {
                          $query->where('service', 'repair');
                      });
            })
            ->with(['prices' => function ($query) {
                $query->where('price', '>', 0)
                      ->whereHas('modal.deviceType', function ($query) {
                          $query->where('service', 'repair');
                      });
            }, 'prices.modal.deviceType'])
            ->get();

        // Merge exact matches first, then other results
        $this->results = $exactModals->merge($deviceTypes)->merge($modals)->merge($repairTypes)->all();
    } else {
        $this->results = [];
    }
}

 
 public function navigate($type, $id)
{
    if ($type === 'deviceType') {
        $deviceType = DeviceType::find($id);

        if ($deviceType) {
            Log::info('Device type found. Device ID: ' . $deviceType->id);
            return redirect()->route('modals', ['device' => $deviceType->id]);
        } else {
            Log::warning('Device type not found for ID ' . $id);
            abort(404);
        }
    } elseif ($type === 'modal') {
        $modal = Modal::with('deviceType')->find($id);
        if ($modal) {
            $deviceTypeId = $modal->deviceType ? $modal->deviceType->id : null;

            if (!is_null($deviceTypeId)) {
                Log::info('Redirecting to repair-types. Device ID: ' . $deviceTypeId . ', Modal ID: ' . $modal->id);
                return redirect()->route('repair-types', ['device' => $deviceTypeId, 'modal' => $modal->id]);
            } else {
                Log::warning('Empty device type ID for Modal ID ' . $id);
                abort(404);
            }
        } else {
            Log::warning('Modal not found for ID ' . $id);
            abort(404);
        }
    } elseif ($type === 'price') {
        $price = Price::with('modal.deviceType', 'repairType')->find($id);
        if ($price) {
            // Store the price in the session
            session(['repair_price' => $price->price]);

            $modalId = SeoUrl::encodeUrl($price->modal->name);
            $deviceTypeId = SeoUrl::encodeUrl($price->modal->deviceType->name);
            $repairTypeId = SeoUrl::encodeUrl($price->repairType->name);

            if (!is_null($deviceTypeId) && !is_null($modalId) && !is_null($repairTypeId)) {
                Log::info('Redirecting to repair detail. Device ID: ' . $deviceTypeId . ', Modal ID: ' . $modalId . ', Repair Type ID: ' . $repairTypeId);
                return redirect()->route('repair-detail', ['device' => $deviceTypeId, 'modal' => $modalId, 'repair' => $repairTypeId]);
            } else {
                Log::warning('Empty device, modal, or repair type ID for Price ID ' . $id);
                abort(404);
            }
        } else {
            Log::warning('Price not found for ID ' . $id);
            abort(404);
        }
    } elseif ($type === 'repairType') {
        $repairType = RepairType::with('prices.modal.deviceType')->find($id);
        if ($repairType) {
            $prices = $repairType->prices;
            if ($prices->isNotEmpty()) {
                $modalId = $prices->first()->modal->name;
                $deviceTypeId = $prices->first()->modal->deviceType->name;

                // Optionally store the first price in session
                session(['repair_price' => $prices->first()->price]);

                Log::info('Redirecting to repair detail. Device ID: ' . $deviceTypeId . ', Modal ID: ' . $modalId . ', Repair Type ID: ' . $repairType->name);
                return redirect()->route('repair-detail', ['device' => $deviceTypeId, 'modal' => $modalId, 'repair' => $repairType->name]);
            } else {
                Log::warning('No prices found for Repair Type ID ' . $id);
                abort(404);
            }
        } else {
            Log::warning('Repair Type not found for ID ' . $id);
            abort(404);
        }
    }

    Log::warning('Invalid type or ID: ' . $type . ', ' . $id);
    abort(404);
}




    public function render()
    {
        return view('livewire.components.search-bar');
    }
}
