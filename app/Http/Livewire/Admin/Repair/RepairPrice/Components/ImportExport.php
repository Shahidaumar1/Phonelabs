<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice\Components;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Template;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportExport extends Component
{
    use WithFileUploads;

    public $excel_file;
    public $template_file;
    public $template;

    public function mount()
    {
        $templates = Template::all();
        if ($templates->count() > 0) {
            $this->template = Template::first();
        }
    }

    public function updated($property)
    {
        if ($property == 'excel_file') {
            $this->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            $rows     = Excel::toArray(new ProductImport, $this->excel_file);
            $firstRow = ($rows[0] ?? []) != [] ? ($rows[0][0] ?? []) : [];
            $keys     = array_keys($firstRow);

            if (
                count($keys) == 4
                && $keys[0] == 'device_type'
                && $keys[1] == 'models'
                && $keys[2] == 'repairs'
                && $keys[3] == 'prices'
            ) {
                Excel::import(new ProductImport, $this->excel_file);
                return back()->with('success', 'Products imported successfully');
            } else {
                return $this->addError(
                    'excel_file',
                    'Invalid format! Column headers must be: device_type, models, repairs, prices'
                );
            }
        }

        if ($property == 'template_file') {
            $this->validate([
                'template_file' => 'required|mimes:xlsx,xls',
            ]);

            $template      = new Template();
            $template->url = $this->template_file->store('template/sheet', 'custom');
            $template->save();

            $this->emit('TemplateUploaded', $template->id);
        }
    }

    protected $listeners = ['TemplateUploaded', 'TemplateDeleted'];

    public function TemplateUploaded(Template $template)
    {
        $this->template = $template;
    }

    public function TemplateDeleted()
    {
        $this->template = null;
    }

    public function downloadTemplate()
    {
        return response()->download(public_path($this->template->url), 'sheet-template.xlsx');
    }

    public function deleteTemplate()
    {
        $this->template->delete();
        $this->emit('TemplateDeleted');
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'repair-prices.xlsx');
    }

    /**
     * Print: open the dedicated print page in a new browser tab
     */
    public function printPrices()
    {
        $this->dispatchBrowserEvent('open-print-page', [
            'url' => route('admin.repair.prices.print'),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.repair.repair-price.components.import-export');
    }
}