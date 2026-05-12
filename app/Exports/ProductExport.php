<?php

namespace App\Exports;

use App\Models\DeviceType;
use App\Models\Price;
use App\Models\RepairType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class ProductExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new ProductDataSheet(),
            new ProductPrintSheet(),
        ];
    }
}

// ─── Sheet 1: Data (import/export format) ─────────────────────────────────────
class ProductDataSheet implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithTitle
{
    public function title(): string
    {
        return 'Repair Prices Data';
    }

    public function headings(): array
    {
        return ['device_type', 'models', 'repairs', 'prices'];
    }

    public function collection()
    {
        return Price::with(['modal.deviceType.category', 'repairType'])
            ->get()
            ->map(function ($price) {
                return [
                    'device_type' => optional(optional(optional($price->modal)->deviceType)->category)->name ?? '',
                    'models'      => optional($price->modal)->name ?? '',
                    'repairs'     => optional($price->repairType)->name ?? '',
                    'prices'      => $price->price,
                ];
            });
    }

    public function columnWidths(): array
    {
        return ['A' => 22, 'B' => 28, 'C' => 32, 'D' => 14];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $thin    = ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'BDD7EE']];

        $sheet->getStyle('A1:D1')->applyFromArray([
            'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'name' => 'Arial', 'size' => 11],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F4E79']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
            'borders'   => ['allBorders' => $thin],
        ]);
        $sheet->getRowDimension(1)->setRowHeight(28);

        for ($row = 2; $row <= $lastRow; $row++) {
            $color = ($row % 2 === 0) ? 'EBF3FB' : 'FFFFFF';
            $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                'font'      => ['name' => 'Arial', 'size' => 10],
                'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $color]],
                'borders'   => ['allBorders' => $thin],
                'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
            ]);
            $sheet->getRowDimension($row)->setRowHeight(18);
        }

        if ($lastRow >= 2) {
            $sheet->getStyle("D2:D{$lastRow}")->getNumberFormat()->setFormatCode('£#,##0.00');
            $sheet->getStyle("D2:D{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        }

        return [];
    }
}

// ─── Sheet 2: Print Layout ─────────────────────────────────────────────────────
class ProductPrintSheet implements WithStyles, WithColumnWidths, WithTitle
{
    public function title(): string
    {
        return 'Print Layout';
    }

    public function columnWidths(): array
    {
        return []; // set inside styles()
    }

    public function styles(Worksheet $sheet)
    {
        $repairTypes = RepairType::all();
        $devices     = DeviceType::with(['modals', 'category'])->get();

        $thin       = ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'BDD7EE']];
        $currentRow = 1;
        $headerRow  = 4; // fallback

        // Total columns = Model col + one per repair type
        $totalCols = $repairTypes->count() + 1;
        $lastCol   = Coordinate::stringFromColumnIndex($totalCols);

        // ── Title ──
        $sheet->mergeCells("A{$currentRow}:{$lastCol}{$currentRow}");
        $sheet->setCellValue("A{$currentRow}", 'Phone & PC Fix Beverley - Repair Price List');
        $sheet->getStyle("A{$currentRow}")->applyFromArray([
            'font'      => ['bold' => true, 'name' => 'Arial', 'size' => 13, 'color' => ['rgb' => '1F4E79']],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'D6E4F0']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
        ]);
        $sheet->getRowDimension($currentRow)->setRowHeight(24);
        $currentRow++;

        // ── Website ──
        $sheet->mergeCells("A{$currentRow}:{$lastCol}{$currentRow}");
        $sheet->setCellValue("A{$currentRow}", 'phoneandpcfixbeverley.co.uk');
        $sheet->getStyle("A{$currentRow}")->applyFromArray([
            'font'      => ['italic' => true, 'name' => 'Arial', 'size' => 8, 'color' => ['rgb' => '808080']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ]);
        $sheet->getRowDimension($currentRow)->setRowHeight(14);
        $currentRow++;
        $currentRow++; // blank gap

        foreach ($devices as $device) {
            if ($device->modals->isEmpty()) continue;

            // Null-safe category name
            $categoryName = optional($device->category)->name ?? 'Uncategorised';

            // ── Device group heading ──
            $sheet->mergeCells("A{$currentRow}:{$lastCol}{$currentRow}");
            $sheet->setCellValue("A{$currentRow}", strtoupper($categoryName . ' — ' . $device->name));
            $sheet->getStyle("A{$currentRow}")->applyFromArray([
                'font'      => ['bold' => true, 'name' => 'Arial', 'size' => 9, 'color' => ['rgb' => 'FFFFFF']],
                'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '2E75B6']],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT, 'vertical' => Alignment::VERTICAL_CENTER, 'indent' => 1],
            ]);
            $sheet->getRowDimension($currentRow)->setRowHeight(14);
            $currentRow++;

            // ── Column headers ──
            $headerRow = $currentRow;
            $sheet->setCellValue("A{$headerRow}", 'Model');
            $sheet->getStyle("A{$headerRow}")->applyFromArray([
                'font'      => ['bold' => true, 'name' => 'Arial', 'size' => 8, 'color' => ['rgb' => 'FFFFFF']],
                'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F4E79']],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
                'borders'   => ['allBorders' => $thin],
            ]);
            $sheet->getRowDimension($headerRow)->setRowHeight(24);

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
            $currentRow++;

            // ── Model rows ──
            foreach ($device->modals as $mIdx => $modal) {
                $bg = ($mIdx % 2 === 0) ? 'FFFFFF' : 'EBF3FB';

                $sheet->setCellValue("A{$currentRow}", $modal->name);
                $sheet->getStyle("A{$currentRow}")->applyFromArray([
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
                    $sheet->setCellValue("{$col}{$currentRow}", $val);
                    $sheet->getStyle("{$col}{$currentRow}")->applyFromArray([
                        'font'      => ['name' => 'Arial', 'size' => 7],
                        'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $bg]],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                        'borders'   => ['allBorders' => $thin],
                    ]);
                }

                $sheet->getRowDimension($currentRow)->setRowHeight(11);
                $currentRow++;
            }

            $currentRow++; // gap between groups
        }

        // ── Column widths ──
        $sheet->getColumnDimension('A')->setWidth(18);
        foreach ($repairTypes as $rtIdx => $rt) {
            $col = Coordinate::stringFromColumnIndex($rtIdx + 2);
            $sheet->getColumnDimension($col)->setWidth(12);
        }

        // ── Page setup ──
        $ps = $sheet->getPageSetup();
        $ps->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $ps->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $ps->setFitToPage(true);
        $ps->setFitToWidth(1);
        $ps->setFitToHeight(0);
        $sheet->getPageMargins()->setTop(0.4)->setBottom(0.4)->setLeft(0.3)->setRight(0.3);
        $ps->setRowsToRepeatAtTopByStartAndEnd(1, $headerRow);

        return [];
    }

    public function collection() { return collect(); }
}