<div>
    <div>
        <div class="d-flex">
            <livewire:admin.components.side-nave active="repair" />
            <x-content>
                <livewire:admin.repair.components.top-nav active="price" />

                <div class="container">
                    <div class="text-center my-3">
                        <h3>Select category, device, and model to see product specifications with prices.</h3>
                    </div>

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                            <a href="{{ route('repair-master-type') }}">
                                <button class="btn p-3" style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                                    Master Repairs
                                </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" aria-label="Default select example" wire:model="selectedCatId">
                                <option disabled selected>Select Category</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option>No Categories Available</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" aria-label="Default select example" wire:model="selectedDeviceId">
                                <option disabled selected>Select device</option>
                                @forelse($devices as $device)
                                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                                @empty
                                    <option>No Devices Available</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                            <button class="btn p-3" onclick="showM('add-new-repair')" style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                                Add New Repair
                            </button>
                        </div>
                    </div>

                    <div style="overflow-x: auto; max-height: 600px; overflow-y: auto;">
                        <div id="wrap">
                            <div class="container">
                                <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

                                <table class="table table-striped table-bordered" id="table_id">
                                    <thead>
                                        @if ($selectedDevice)
                                            <tr wire:sortable="updateTaskOrder">
                                                <th style="position: sticky; top: 0; left: 0; background-color: white; z-index: 20;">
                                                    {{ $selectedDevice->name }}
                                                </th>

                                                @foreach ($selectedDevice->repair_types as $repair_type)
                                                    <td
                                                        style="position: sticky; top: 0; background-color: white; z-index: 10;"
                                                        wire:sortable.item="{{ $repair_type->id }}"
                                                        wire:key="repair-{{ $repair_type->id }}"
                                                    >
                                                        <div class="d-flex justify-content-between align-items-center gap-2">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <span class="fas fa-arrows-alt"
                                                                      style="cursor: grab;"
                                                                      wire:sortable.handle></span>
                                                                <span>{{ $repair_type->name }}</span>
                                                            </div>

                                                            <button
                                                                type="button"
                                                                class="btn btn-sm btn-outline-danger"
                                                                title="Remove from this device"
                                                                onclick="if(!confirm('Remove this repair from this device?')){ event.preventDefault(); event.stopImmediatePropagation(); }"
                                                                wire:click.stop="removeRepairType({{ $repair_type->id }})"
                                                            >
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                @endforeach

                                                <th style="position: sticky; top: 0; background-color: white; z-index: 10;">Status</th>
                                            </tr>
                                        @endif
                                    </thead>

                                    <tbody wire:sortable="updateModelOrder">
                                        @foreach ($models as $model)
                                            <tr wire:sortable.item="{{ $model->id }}" wire:key="model-{{ $model->id }}" style="cursor: move;">
                                                <td wire:sortable.handle style="position: sticky; left: 0; background-color: white; z-index: 5;">
                                                    <div class="d-flex align-items-center">
                                                        <span class="fas fa-grip-vertical me-2" style="cursor: grab;"></span>
                                                        {{ $model->name }}
                                                    </div>
                                                </td>

                                                @foreach ($selectedDevice->repair_types as $repairType)
                                                    @if ($price = $model->prices->where('repair_type_id', $repairType->id)->first())
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1">

                                                                {{-- Original working price-edit component --}}
                                                                <div id="price-wrap-{{ $price->id }}">
                                                                    <livewire:repair.components.price-edit :key="uniqid()" :price="$price" />
                                                                </div>

                                                                {{-- ✏️ Pencil icon --}}
                                                                <span
                                                                    class="pencil-icon"
                                                                    onclick="focusPriceInput({{ $price->id }})"
                                                                    title="Edit price"
                                                                >✎</span>

                                                                {{-- ▾ Quick-set dropdown --}}
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-arrow"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false"
                                                                        title="Quick set"
                                                                    >▾</span>
                                                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="min-width: 155px; font-size: 0.85rem;">
                                                                        <li>
                                                                            <button class="dropdown-item d-flex align-items-center gap-2" type="button" wire:click="setHide({{ $price->id }})">
                                                                                <i class="fas fa-eye-slash text-muted" style="width:14px;"></i>
                                                                                <span>Hide</span>
                                                                                <small class="ms-auto text-muted">£0.00</small>
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <button class="dropdown-item d-flex align-items-center gap-2" type="button" wire:click="setAskQuote({{ $price->id }})">
                                                                                <i class="fas fa-comment-dots text-info" style="width:14px;"></i>
                                                                                <span>Ask a Quote</span>
                                                                                <small class="ms-auto text-muted">£0.01</small>
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <button class="dropdown-item d-flex align-items-center gap-2" type="button" wire:click="setFreeRepair({{ $price->id }})">
                                                                                <i class="fas fa-gift text-success" style="width:14px;"></i>
                                                                                <span>Free Repair</span>
                                                                                <small class="ms-auto text-muted">£0.02</small>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    @else
                                                        <td>....</td>
                                                    @endif
                                                @endforeach

                                                <td>{{ $model->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </x-content>

            <div class="button-sticky container bg-blue d-lg-none d-md-none">
                <div class="row justify-content-center">
                    <div class="col-2 mt-4">
                        <a href="{{ route('repair-categories') }}" class="text-white item">Devices</a>
                    </div>
                    <div class="col-2 mt-4">
                        <a href="{{ route('repair-devices') }}" class="text-white item">Brands</a>
                    </div>
                    <div class="col-2 mt-4">
                        <a href="{{ route('repair-models') }}" class="text-white item">Models</a>
                    </div>
                    <div class="col-2 mt-4">
                        <a href="{{ route('repair-price') }}" class="text-white item">Repair</a>
                    </div>
                </div>
            </div>

        </div>

        @if ($selectedDevice)
            <x-modal title="Add Model" id="add-new-repair" size="xl">
                <livewire:admin.repair.repair-price.create :device="$selectedDevice" />
            </x-modal>
        @endif

        <x-modal title="Edit Model" id="edit-repair-model">
            <livewire:admin.repair.model.edit />
        </x-modal>
    </div>

    <style>
        [wire\:sortable\.item] { transition: transform 0.2s ease; }
        [wire\:sortable\.item].sortable-ghost { opacity: 0.5; background-color: #f8f9fa; }
        [wire\:sortable\.item].sortable-drag { opacity: 0.9; background-color: #e3f2fd; box-shadow: 0 5px 15px rgba(0,0,0,0.3); }
        tbody tr:hover { background-color: #f8f9fa; }
        .fa-grip-vertical { color: #6c757d; }
        .fa-grip-vertical:hover { color: #20375E; }

        .pencil-icon {
            cursor: pointer;
            font-size: 1rem;
            color: #20375E;
            line-height: 1;
            user-select: none;
            padding: 0 2px;
        }
        .pencil-icon:hover { opacity: 0.6; }

        .dropdown-arrow {
            cursor: pointer;
            font-size: 0.75rem;
            color: #6c757d;
            user-select: none;
            padding: 0 2px;
        }
        .dropdown-arrow:hover { color: #20375E; }

        .dropdown-menu li + li { border-top: 1px solid #f0f0f0; }
        .dropdown-toggle::after { display: none !important; }
    </style>

    <script>
        function focusPriceInput(priceId) {
            const wrapper = document.getElementById('price-wrap-' + priceId);
            if (!wrapper) return;

            // 1. Try visible input
            const input = wrapper.querySelector('input[type="number"], input[type="text"], input:not([type="hidden"])');
            if (input) {
                input.focus();
                input.select();
                return;
            }

            // 2. Click the span/element that toggles edit mode in price-edit component
            const clickable = wrapper.querySelector('span, [wire\\:click]');
            if (clickable) {
                clickable.click();
                setTimeout(() => {
                    const inp = wrapper.querySelector('input');
                    if (inp) { inp.focus(); inp.select(); }
                }, 50);
            }
        }
    </script>
</div>