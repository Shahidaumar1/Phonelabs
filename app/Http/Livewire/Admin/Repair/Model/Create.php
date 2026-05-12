<?php
namespace App\Http\Livewire\Admin\Repair\Model;
use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component
{
    use WithFileUploads;
    public $rand;
    public $name;
    public $device;
    public $file;
    protected $listeners = ['deviceId'];
    public function mount(DeviceType $device)
    {
        $this->device = $device;
    }
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'file' => 'required|image'
        ];
    }
    public function save()
    {
        $this->validate();
        // Check including soft deleted
        $existing = Modal::withTrashed()
            ->where('name', $this->name)
            ->where('service', ServiceType::REPAIR)
            ->where('device_type_id', $this->device->id)
            ->first();
        if ($existing) {
            // If soft deleted → restore it
            if ($existing->trashed()) {
                if ($this->file) {
                    $existing->file = ImageService::upload($this->file)->url;
                }
                $existing->restore();
                $existing->update([
                    'status' => Status::PUBLISH
                ]);
                $this->emit('closeM', 'add-repair-model');
                $this->emit('modelCreated');
                $this->clearForm();
                return;
            }
            // If already active → show error
            $this->addError('name', 'This model already exists.');
            return;
        }
        // Create new model
        $model = new Modal();
        $model->file = ImageService::upload($this->file)->url;
        $model->service = ServiceType::REPAIR;
        $model->device_type()->associate($this->device);
        $model->name = $this->name;
        $model->status = Status::PUBLISH;
        $model->order_by = Modal::where('device_type_id', $this->device->id)->count() + 1;
        $model->save();
        $this->emit('closeM', 'add-repair-model');
        $this->emit('modelCreated');
        $this->clearForm();
    }
    public function clearForm()
    {
        $this->rand++;
        $this->name = '';
        $this->file = null;
    }
    public function deviceId(DeviceType $device)
    {
        $this->device = $device;
    }
    public function render()
    {
        return view('livewire.admin.repair.model.create')
            ->layout('layouts.admin');
    }
}