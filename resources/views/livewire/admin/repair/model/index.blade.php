<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="repair" />
        <x-content>
            <livewire:admin.repair.components.top-nav active="models" />
            <div class="container">

                <!-- Category and Device Select Dropdown -->
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <select aria-label="Select Device Category" wire:model="selectedCatId" style="width:130px">
                        <option value="">Select Device</option>
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>

                    <select aria-label="Select Brand" wire:model="selectedDeviceId" style="width:130px">
                        <option value="">Select Brand</option>
                        @forelse($devices as $device)
                            <option value="{{ $device->id }}">{{ $device->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>

                <!-- Sub Nav -->
                <div class="d-flex align-items-center gap-4 justify-content-center my-4">
                    <livewire:admin.repair.components.sub-nav :items="$items" />
                </div>

                <!-- View Switch + Create Button -->
                <div class="d-flex justify-content-center gap-2 pt-1 pb-3 align-items-center">
                    <div class="d-flex gap-2">
                        <i class="fa fa-square cursor-pointer {{ $activeView == 'card' ? 'text-success' : '' }}"
                           aria-hidden="true" wire:click="activateView('card')"></i>

                        <i class="fa fa-list cursor-pointer {{ $activeView == 'list' ? 'text-success' : '' }}"
                           aria-hidden="true" wire:click="activateView('list')"></i>
                    </div>

                    @if ($target == 'Publish')
                        <button class="btn mt-2"
                                onclick="showM('add-repair-model')"
                                style="border-radius: 5px; color: white; background-color: #20375E; padding: 10px">
                            Create New
                        </button>
                    @endif
                </div>

                {{-- CARD VIEW --}}
                @if ($activeView == 'card')
                    <div>
                        <div class="d-flex justify-content-center gap-4 flex-wrap pb-5 sortable">
                            @forelse($models as $model)
                                <div class="card border-0 rounded-4 cursor-pointer"
                                     data-id="{{ $model->id }}"
                                     style="width:280px;">

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <small class="text-center pt-2" style="color:#20375E;">
                                            Width: 500px Height: 700px
                                        </small>

                                        <div class="dropdown dropend" wire:ignore>
                                            <button class="btn btn-light dropdown-toggle border-0"
                                                    type="button"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                                    @endif
                                                </li>

                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="setTopRated('{{ $model->id }}')">
                                                            {{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                                        </a>
                                                    @endif
                                                </li>

                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="setNewArrival('{{ $model->id }}')">
                                                            {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}
                                                        </a>
                                                    @endif
                                                </li>

                                                <li>
                                                    @if ($target == 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="restore('{{ $model->id }}')">Restore</a>
                                                    @else
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="softDelete('{{ $model->id }}')">Delete</a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <a href="#"
                                       class="d-flex justify-content-center flex-column align-items-center position-relative">
                                        <img src="{{ $model->file ?? '#' }}" class="img-fluid" style="height: 100px" />
                                    </a>

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <div class="p-2">
                                            <div class="position-absolute bg-light rounded p-1" style="right:2px; top:2px;">
                                                <strong>{{ $model->price }}</strong>
                                            </div>

                                            <div style="width:140px">
                                                <h4 class="fw-bold text-center text-dark">{{ $model->name }}</h4>
                                            </div>
                                        </div>

                                        @if ($target != 'Junk')
                                            <div class="form-check form-switch">
                                                <input type="checkbox" role="switch"
                                                       class="form-check-input"
                                                       wire:change="toggleStatus({{ $model->id }})"
                                                       {{ $model->status == 'Publish' ? 'checked' : '' }}>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- ✅ Per Model Prices --}}
                                    <div class="px-3 pb-2">
                                        <label class="form-label mb-1">Protector Price</label>
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               wire:model.defer="protectorPrice.{{ $model->id }}"
                                               placeholder="Protector price">

                                        <label class="form-label mb-1 mt-2">Cover Price</label>
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               wire:model.defer="coverPrice.{{ $model->id }}"
                                               placeholder="Cover price">
                                    </div>

                                    {{-- ✅ Per Model Checkboxes --}}
                                    <div class="px-3 pb-2 d-flex gap-3 align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="protector_{{ $model->id }}"
                                                   wire:model="protectorSelected.{{ $model->id }}">
                                            <label class="form-check-label" for="protector_{{ $model->id }}">Protector</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="cover_{{ $model->id }}"
                                                   wire:model="coverSelected.{{ $model->id }}">
                                            <label class="form-check-label" for="cover_{{ $model->id }}">Cover</label>
                                        </div>
                                    </div>

                                    {{-- ✅ Save --}}
                                    <div class="px-3 pb-2">
                                        <button class="btn btn-primary btn-sm w-100"
                                                wire:click="saveModelExtras({{ $model->id }})">
                                            Save This Model
                                        </button>
                                    </div>

                                    <div class="px-3 pb-3">
                                        <strong>Total Price: {{ $this->getTotalFor($model->id) }}</strong>
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <h3 class="fw-bold text-center" style="color: darkblue">No Records!</h3>
                                        <img src="https://ik.imagekit.io/4csyk445b/no_records_found_image.png"
                                             class="img-fluid" alt="No Record icon">
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
                        <script>
                            document.addEventListener('livewire:load', function() {
                                var el = document.querySelector('.sortable');
                                if (!el) return;

                                Sortable.create(el, {
                                    animation: 150,
                                    onEnd: function(evt) {
                                        var order = Array.from(el.children).map(function(child) {
                                            return child.getAttribute('data-id');
                                        });
                                        @this.call('updateOrder', order);
                                    },
                                });
                            });
                        </script>
                    </div>
                @endif

                {{-- LIST VIEW --}}
                @if ($activeView == 'list')
                    <div>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex gap-2 cursor-pointer" onclick="showM('add-repair-model')">
                                <i class="fa fa-plus text-success" style="font-size:20px;" aria-hidden="true"></i>
                                <h4 class="fw-bold">Create new</h4>
                            </div>
                        </div>

                        <br>

                        <div class="d-flex justify-content-center gap-4 flex-wrap">
                            <table class="table mx-auto p-5">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($models as $model)
                                        <tr>
                                            <th scope="row">{{ $model->id }}</th>
                                            <td>{{ $model->name }}</td>
                                            <td><img src="{{ $model->file ?? '#' }}" style="width: 2rem" /></td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" role="switch" class="form-check-input"
                                                           wire:change="toggleStatus({{ $model->id }})"
                                                           {{ $model->status == 'Publish' ? 'checked' : '' }}
                                                           {{ $target == 'Junk' ? 'disabled' : '' }}>
                                                </div>
                                            </td>
                                            <td class="cursor-pointer">
                                                <div class="dropdown dropend" wire:ignore>
                                                    <button class="btn btn-light dropdown-toggle bg-light border-0"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            @if ($target != 'Junk')
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if ($target != 'Junk')
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="setTopRated('{{ $model->id }}')">
                                                                    {{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if ($target != 'Junk')
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="setNewArrival('{{ $model->id }}')">
                                                                    {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if ($target == 'Junk')
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="restore('{{ $model->id }}')">Restore</a>
                                                            @else
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="softDelete('{{ $model->id }}')">Delete</a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6">Record Not Found!</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </x-content>
    </div>

    {{-- ✅ MODALS (IMPORTANT: ALWAYS render modal container) --}}
    <x-modal title="Add Model" id="add-repair-model">
        @if ($selectedDevice)
            <livewire:admin.repair.model.create :device="$selectedDevice" :key="'create-'.$selectedDeviceId" />
        @else
            <div class="p-3">
                <h5 class="mb-0">Please select Brand first.</h5>
            </div>
        @endif
    </x-modal>

    <x-modal title="Edit Model" id="edit-repair-model">
        <livewire:admin.repair.model.edit />
    </x-modal>
</div>
