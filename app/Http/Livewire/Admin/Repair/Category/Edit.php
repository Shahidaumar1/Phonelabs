<?php
namespace App\Http\Livewire\Admin\Repair\Category;
use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
class Edit extends Component
{
    use WithFileUploads;
    public $rand;
    public $category;
    public $file;
    protected $rules = [
        'category.name' => 'required',
    ];
    protected $listeners = ['catSelected'];
    public function catSelected(Category $category)
    {
        $this->category = $category;
    }
    public function update()
    {
        $this->validate([
            'category.name' => [
                'required',
                Rule::unique('categories', 'name')
                    ->ignore($this->category->id)
                    ->where(function ($query) {
                        return $query->where('service', ServiceType::REPAIR)
                            ->whereNull('deleted_at');
                    }),
            ],
        ]);
        if ($this->file) {
            $this->category->file = ImageService::upload($this->file)->url;
        }
        $this->category->save();
        $this->clearForm();
        $this->emit('categoryUpdated', $this->category->id);
        $this->emit('closeM', 'edit-repair-cat');
    }
    public function clearForm()
    {
        $this->rand++;
    }
    public function render()
    {
        return view('livewire.admin.repair.category.edit')->layout('layouts.admin');
    }
}