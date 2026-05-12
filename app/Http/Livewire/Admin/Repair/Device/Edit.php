<?php
namespace App\Http\Livewire\Admin\Repair\Device;
use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\DeviceType;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
class Edit extends Component
{
    use WithFileUploads;
    public $rand;
    public $device;
    public $file;
    protected $rules = [
        'device.name' => 'required',
        'device.status' => 'required'
    ];
    protected $listeners = ['deviceSelected'];
    public function deviceSelected(DeviceType $device)
    {
        $this->device = $device;
    }
    public function update()
    {
        $this->validate([
            'device.name' => [
                'required',
                Rule::unique('device_types', 'name')
                    ->ignore($this->device->id)
                    ->where(function ($query) {
                        return $query->where('service', ServiceType::REPAIR)
                            ->where('category_id', $this->device->category_id)
                            ->whereNull('deleted_at');
                    }),
            ],
            'device.status' => 'required',
        ]);
        if ($this->file) {
            $this->device->file = ImageService::upload($this->file)->url;
        }
        $this->device->save();
        $this->clearForm();
        $this->emit('deviceUpdated', $this->device->id);
        $this->emit('closeM', 'edit-repair-device');
    }
    public function clearForm()
    {
        $this->rand++;
    }
    public function render()
    {
        return view('livewire.admin.repair.device.edit')->layout('layouts.admin');
    }
}