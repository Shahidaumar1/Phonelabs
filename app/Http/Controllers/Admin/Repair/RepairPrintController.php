<?php
namespace App\Http\Controllers\Admin\Repair;

use App\Helpers\ServiceType;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Price;
use App\Models\RepairType;

class RepairPrintController extends Controller
{
    public function __invoke()
    {
        // 1. Only REPAIR categories ke devices
        $repairCategoryIds = Category::where('service', ServiceType::REPAIR)
            ->pluck('id');

        $devices = DeviceType::with(['modals', 'category'])
            ->whereIn('category_id', $repairCategoryIds)
            ->whereHas('modals')
            ->get();

        // 2. All prices in ONE query — instant map lookup, no N+1
        $priceMap = Price::all()
            ->keyBy(fn($p) => $p->modal_id . '-' . $p->repair_type_id);

        // 3. Har device group ke liye SIRF woh repair types filter karo
        //    jin ka us group mein koi price > 0 ho
        $allRepairTypes = RepairType::all();

        $deviceRepairTypes = [];

        foreach ($devices as $device) {
            // Is device ke saare modal IDs nikalo
            $modalIds = $device->modals->pluck('id');

            // Un modals ke liye jin repair_type_ids ka price > 0 hai
            $relevantRepairTypeIds = Price::whereIn('modal_id', $modalIds)
                ->where('price', '>', 0)
                ->pluck('repair_type_id')
                ->unique();

            // Sirf woh repair types rakho jo is device ke liye relevant hain
            $deviceRepairTypes[$device->id] = $allRepairTypes
                ->whereIn('id', $relevantRepairTypeIds)
                ->values();
        }

        return view('admin.repair.repair-print', compact('devices', 'priceMap', 'deviceRepairTypes'));
    }
}