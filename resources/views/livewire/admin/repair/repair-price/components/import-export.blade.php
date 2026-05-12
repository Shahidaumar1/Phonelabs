<div class="mb-3 row">
    <div class="col-12">
        <div class="mb-2">
            <x-alert />
        </div>

        <div class="d-flex justify-content-start gap-4 align-items-center flex-wrap">

            {{-- ── Import ── --}}
            <div>
                <button type="button"
                        onclick="document.getElementById('input-file').click()"
                        class="btn btn-success">
                    <i class="bi bi-upload me-1"></i> Import Products
                </button>
                <input type="file" id="input-file" wire:model="excel_file" hidden />
                <br>
                <span wire:loading wire:target="excel_file" class="text-muted small ms-1">
                    <i class="bi bi-hourglass-split"></i> Importing…
                </span>
                @error('excel_file')
                    <span class="text-danger text-xs ms-1">{{ $message }}</span>
                @enderror
            </div>
 
            {{-- ── Export ── --}}
            <div>
                <button type="button" wire:click="export" class="btn btn-primary">
                    <i class="bi bi-download me-1"></i> Export Products
                </button>
                <br>
                <span wire:loading wire:target="export" class="text-muted small ms-1">
                    <i class="bi bi-hourglass-split"></i> Exporting…
                </span>
                @error('export_excel_file')
                    <span class="text-danger text-xs ms-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- ── Print Prices ── --}}
            <div>
                <button type="button" wire:click="printPrices" class="btn btn-warning text-dark">
                    <i class="bi bi-printer me-1"></i> Print Prices
                </button>
            </div>

            {{-- ── Upload / Download Template ── --}}
            <div>
                @if($template)
                    <div class="d-flex gap-2 align-items-center">
                        <button type="button"
                                wire:click="downloadTemplate"
                                class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-file-earmark-arrow-down me-1"></i> Download Template
                        </button>
                        <a href="javascript:void(0)"
                           wire:click="deleteTemplate"
                           class="text-danger"
                           title="Delete template">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </div>
                    <span wire:loading wire:target="downloadTemplate" class="text-muted small ms-1">
                        Downloading…
                    </span>
                @else
                    <span class="text-primary"
                          style="cursor:pointer"
                          onclick="document.getElementById('template-input').click()">
                        <i class="bi bi-upload me-1"></i> Upload Template
                    </span>
                    <input type="file" wire:model="template_file" id="template-input" hidden />
                    <br>
                    <span wire:loading wire:target="template_file" class="text-muted small ms-1">
                        Uploading…
                    </span>
                    @error('template_file')
                        <span class="text-danger text-xs ms-1">{{ $message }}</span>
                    @enderror
                @endif
            </div>

        </div>
    </div>
</div>

{{-- Livewire browser event listener — opens print page in new tab --}}
<script>
    window.addEventListener('open-print-page', function (event) {
        window.open(event.detail.url, '_blank');
    });
</script>