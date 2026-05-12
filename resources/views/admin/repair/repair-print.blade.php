<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair Price List - Phone & PC Fix Beverley</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            font-size: 7.5pt;
            color: #1a1a1a;
            background: #fff;
        }

        @page {
            size: A4 landscape !important;
            margin: 8mm 6mm 8mm 6mm;
        }

        .page-header {
            text-align: center;
            margin-bottom: 6px;
            padding: 6px 0 4px;
            border-bottom: 2px solid #1F4E79;
        }
        .page-header h1 { font-size: 13pt; color: #1F4E79; font-weight: bold; }
        .page-header p  { font-size: 8pt; color: #666; margin-top: 1px; }

        .device-group { margin-bottom: 8px; }

        .device-title {
            background: #2E75B6;
            color: #fff;
            font-weight: bold;
            font-size: 8pt;
            padding: 3px 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead tr th {
            background: #1F4E79;
            color: #fff;
            font-size: 6.5pt;
            font-weight: bold;
            text-align: center;
            padding: 3px 2px;
            border: 1px solid #4A90C4;
            word-wrap: break-word;
            line-height: 1.2;
        }
        thead tr th:first-child {
            text-align: left;
            padding-left: 4px;
            width: 85px;
        }

        tbody tr td {
            font-size: 6.5pt;
            padding: 1px 2px;
            border: 1px solid #BDD7EE;
            text-align: center;
            height: 11pt;
        }
        tbody tr td:first-child {
            text-align: left;
            padding-left: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        tbody tr:nth-child(even) td { background: #EBF3FB; }
        tbody tr:nth-child(odd)  td { background: #FFFFFF; }

        .price-val { color: #1F4E79; font-weight: 600; }
        .no-price  { color: #ccc; }

        @media print {
            html, body {
                width: 297mm;
                height: 210mm;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .no-print { display: none !important; }
            .action-bar { display: none !important; }
            .content-wrap { padding-top: 0 !important; }
            .device-group { break-inside: avoid; }
            thead { display: table-header-group; }
        }

        .action-bar {
            position: fixed; top: 0; left: 0; right: 0;
            background: #1F4E79; color: #fff;
            padding: 8px 16px;
            display: flex; align-items: center; gap: 12px;
            z-index: 999;
            box-shadow: 0 2px 8px rgba(0,0,0,.3);
        }
        .action-bar h2 { font-size: 11pt; flex: 1; }

        .btn-print {
            background: #27AE60; color: #fff; border: none;
            padding: 7px 20px; border-radius: 4px;
            font-size: 10pt; font-weight: bold; cursor: pointer;
        }
        .btn-print:hover { background: #219150; }

        .btn-back {
            background: transparent; color: #fff;
            border: 1px solid rgba(255,255,255,.5);
            padding: 7px 16px; border-radius: 4px;
            font-size: 10pt; text-decoration: none; cursor: pointer;
        }

        .content-wrap { padding-top: 50px; }
    </style>
</head>
<body>

<div class="action-bar no-print">
    <a href="javascript:history.back()" class="btn-back">← Back</a>
    <h2>Repair Price List — Preview</h2>
    <button class="btn-print" onclick="window.print()">🖨 Print</button>
</div>

<div class="content-wrap">

    @forelse($devices as $device)
        @if($device->modals->isEmpty()) @continue @endif

        @php
            // Is device ke liye sirf relevant repair types
            $repairTypes = $deviceRepairTypes[$device->id] ?? collect();
        @endphp

        @if($repairTypes->isEmpty()) @continue @endif

        <div class="device-group">
            <div class="device-title">
                {{ strtoupper(optional($device->category)->name ?? '') }}
                &mdash; {{ strtoupper($device->name) }}
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Model</th>
                        @foreach($repairTypes as $rt)
                            <th>{{ $rt->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($device->modals as $modal)
                        @php
                            // Check karo ke is modal ka koi bhi price > 0 hai
                            $hasAnyPrice = false;
                            foreach ($repairTypes as $rt) {
                                $p = $priceMap->get($modal->id . '-' . $rt->id);
                                if ($p && $p->price > 0) { $hasAnyPrice = true; break; }
                            }
                        @endphp

                        @if(!$hasAnyPrice) @continue @endif

                        <tr>
                            <td>{{ $modal->name }}</td>
                            @foreach($repairTypes as $rt)
                                @php $price = $priceMap->get($modal->id . '-' . $rt->id); @endphp
                                <td>
                                    @if($price && $price->price > 0)
                                        <span class="price-val">&pound;{{ number_format($price->price, 2) }}</span>
                                    @else
                                        <span class="no-price">-</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @empty
        <p style="text-align:center; padding:40px; color:#666;">
            No repair devices found.
        </p>
    @endforelse

</div>

<script>
    window.addEventListener('load', function () {
        setTimeout(function () { window.print(); }, 500);
    });
</script>

</body>
</html>