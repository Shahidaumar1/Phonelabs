<?php

namespace App\Http\Livewire\Admin\Accessories\Addon;

use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;

class MoreSpec extends Component
{
    public $detail;
    public $specification;
    public $warranty;
    public $model;
    public $product_spec;
    public $editor = 'Detail';
    public $content;

    public function mount(Modal $model)
    {
        $this->model = $model;
    }

    // 👉 ab teenon fields optional kar diye
    protected $rules = [
        'detail'        => 'nullable|string',
        'specification' => 'nullable|string',
        'warranty'      => 'nullable|string',
    ];

    protected $listeners = ['productId'];

    // yeh hook Livewire ka hai: jab `content` property change hogi
    public function updatedContent($value)
    {
        if ($this->editor === 'Detail') {
            $this->detail = $value;
        }

        if ($this->editor === 'Specification') {
            $this->specification = $value;
        }

        if ($this->editor === 'Warranty') {
            $this->warranty = $value;
        }
    }

    public function toggleEditor($editor)
    {
        $this->editor = $editor;

        if ($this->editor === 'Warranty') {
            $this->content = $this->warranty;
        }

        if ($this->editor === 'Specification') {
            $this->content = $this->specification;
        }

        if ($this->editor === 'Detail') {
            $this->content = $this->detail;
        }

        // JS side ko bolo editor ko dobara init kare
        $this->emit('editorTypeChanged', $this->content);
    }

    public function productId($productId)
    {
        $this->product_spec = ProductSpec::find($productId);

        if ($this->product_spec) {
            $this->detail        = $this->product_spec->detail ?? '';
            $this->specification = $this->product_spec->specification ?? '';
            $this->warranty      = $this->product_spec->warranty ?? '';

            // default tab "Detail" ka content load
            $this->content = $this->detail;

            // model name show karne ke liye
            $this->model = Modal::where('id', $this->product_spec->model_id)->first();
        } else {
            $this->detail = $this->specification = $this->warranty = $this->content = '';
        }

        $this->emit('editorTypeChanged', $this->content);
    }

    public function save()
    {
        // ab yeh sirf string check karega, required nahi
        $this->validate();

        if (!$this->product_spec) {
            return;
        }

        $product_spec = ProductSpec::where('id', $this->product_spec->id)->first();

        if (!$product_spec) {
            return;
        }

        $product_spec->detail        = $this->detail;
        $product_spec->specification = $this->specification;
        $product_spec->warranty      = $this->warranty;
        $product_spec->save();

        // modal band karo
        $this->emit('closeM', 'add-model-more-spec');
    }

    public function render()
    {
        return view('livewire.admin.accessories.addon.more-spec');
    }
}
