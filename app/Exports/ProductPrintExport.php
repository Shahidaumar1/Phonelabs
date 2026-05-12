<?php

namespace App\Exports;

use App\Models\DeviceType;
use App\Models\Price;
use App\Models\RepairType;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

/**
 * Standalone print-optimised export.
 * One sheet per device, small 7pt font, fits many models per A4 landscape page.
 */
class ProductPrintExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $devices = DeviceType::with(['modals', 'category'])->whereHas('modals')->get();
        $sheets  = [];

        foreach ($devices as $device) {
            $sheets[] = new SingleDevicePrintSheet($device);
        }

        return $sheets ?: [new EmptyPrintSheet()];
    }
}

class SingleDevicePrintSheet implements WithStyles, WithTitle
{
    public function __construct(protected $device) {}

    public function title(): string
    {
        return substr(preg_replace('/[\/\\\?\*\[\]:]/', '-', $this->device->name), 0, 31);
    }

    public function styles(Worksheet $sheet)
    {
        $repairTypes = RepairType::all();
        $thin        = ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'BDD7EE']];
        $totalCols   = $repairTypes->count() + 1;
        $lastColLtr  = Coordinate::stringFromColumnIndex($totalCols);

        $row = 1;

        // Title
        $sheet->mergeCells("A{$row}:{$lastColLtr}{$row}");
        $categoryName = optional($this->device->category)->name ?? 'Uncategorised';
        $sheet->setCellValue("A{$row}", 'Phone & PC Fix Beverley — Repair Prices: ' . $categoryName . ' / ' . $this->device->name);
        $sheet->getStyle("A{$row}")->applyFromArray([
            'font'      => ['bold' => true, 'name' => 'Arial', 'size' => 11, 'color' => ['rgb' => '1F4E79']],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'D6E4F0']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
        ]);
        $sheet->getRowDimension($row)->setRowHeight(20);
        $row++;

        // Website
        $sheet->mergeCells("A{$row}:{$lastColLtr}{$row}");
        $sheet->setCellValue("A{$row}", 'phoneandpcfixbeverley.co.uk');
        $sheet->getStyle("A{$row}")->applyFromArray([
            'font'      => ['italic' => true, 'name' => 'Arial', 'size' => 8, 'color' => ['rgb' => '888888']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ]);
        $sheet->getRowDimension($row)->setRowHeight(12);
        $row++;

        // Column headers
        $headerRow = $row;
        $sheet->setCellValue("A{$headerRow}", 'Model');
        $sheet->getStyle("A{$headerRow}")->applyFromArray([
            'font'      => ['bold' => true, 'name' => 'Arial', 'size' => 8, 'color' => ['rgb' => 'FFFFFF']],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F4E79']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
            'borders'   => ['allBorders' => $thin],
        ]);

        foreach ($repairTypes as $rtIdx => $rt) {
            $col = Coordinate::stringFromColumnIndex($rtIdx + 2);
            $sheet->setCellValue("{$col}{$headerRow}", $rt->name);
            $sheet->getStyle("{$col}{$headerRow}")->applyFromArray([
                'font'      => ['bold' => true, 'name' => 'Arial', 'size' => 7, 'color' => ['rgb' => 'FFFFFF']],
                'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F4E79']],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
                'borders'   => ['allBorders' => $thin],
            ]);
        }
        $sheet->getRowDimension($headerRow)->setRowHeight(28);
        $row++;

        // Model rows
        foreach ($this->device->modals as $mIdx => $modal) {
            $bg = ($mIdx % 2 === 0) ? 'FFFFFF' : 'EBF3FB';

            $sheet->setCellValue("A{$row}", $modal->name);
            $sheet->getStyle("A{$row}")->applyFromArray([
                'font'      => ['name' => 'Arial', 'size' => 7],
                'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $bg]],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER],
                'borders'   => ['allBorders' => $thin],
            ]);

            foreach ($repairTypes as $rtIdx => $rt) {
                $col   = Coordinate::stringFromColumnIndex($rtIdx + 2);
                $price = Price::where('modal_id', $modal->id)
                               ->where('repair_type_id', $rt->id)
                               ->first();

                $val = $price ? '£' . number_format($price->price, 2) : '-';
                $sheet->setCellValue("{$col}{$row}", $val);
                $sheet->getStyle("{$col}{$row}")->applyFromArray([
                    'font'      => ['name' => 'Arial', 'size' => 7],
                    'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $bg]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                    'borders'   => ['allBorders' => $thin],
                ]);
            }

            $sheet->getRowDimension($row)->setRowHeight(11);
            $row++;
        }

        // Column widths
        $sheet->getColumnDimension('A')->setWidth(18);
        foreach ($repairTypes as $rtIdx => $rt) {
            $col = Coordinate::stringFromColumnIndex($rtIdx + 2);
            $sheet->getColumnDimension($col)->setWidth(13);
        }

        // Page setup for A4 landscape
        $ps = $sheet->getPageSetup();
        $ps->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $ps->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $ps->setFitToPage(true);
        $ps->setFitToWidth(1);
        $ps->setFitToHeight(0);
        $ps->setRowsToRepeatAtTopByStartAndEnd(1, $headerRow);

        $m = $sheet->getPageMargins();
        $m->setTop(0.35)->setBottom(0.35)->setLeft(0.25)->setRight(0.25);

        $sheet->getHeaderFooter()
              ->setOddHeader('&C&"Arial,Bold"&9Phone & PC Fix Beverley — Repair Price List');
        $sheet->getHeaderFooter()
              ->setOddFooter('&Lphoneandpcfixbeverley.co.uk&RPage &P of &N');

        return [];
    }

    public function collection() { return collect(); }
}

class EmptyPrintSheet implements WithStyles, WithTitle
{
    public function title(): string { return 'No Data'; }

    public function styles(Worksheet $sheet)
    {
        $sheet->setCellValue('A1', 'No repair price data found. Please add models and prices first.');
        return [];
    }

    public function collection() { return collect(); }
}