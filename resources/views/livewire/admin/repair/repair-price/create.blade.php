<div class="">
    <livewire:admin.repair.repair-price.components.import-export />
    <hr>
    <x-alert />

    <div>
        <div class=" align-items-center d-flex gap-3 flex-wrap">

            <div >
                <label for="master_id">Select Device</label>
                <select class="form-select" aria-label="Default select example" id="select_Cat" wire:model="selectedCatId">
                    <option selected disabled>Select Device</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}
                    @endforeach
                    </option>
                </select>
                @error('selectedCatId')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="master_id">Select Brand</label>
                <select class="form-select" aria-label="Default select example" id="select_Cat"
                    wire:model="selectedDeviceId">
                    <option selected >Select Brand</option>
                    @foreach ($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->name }}
                    @endforeach
                    </option>
                </select>
                @error('selectedDeviceId')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="master_id">Select Model</label>
                <select class="form-select" aria-label="Default select example" id="select_Cat"
                    wire:model="selectedModelId">
                    <option>Select Model</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}
                    @endforeach
                    </option>
                </select>
                @error('selectedModelId')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="master_id">Select Repair</label>
                <select class="form-select" aria-label="Default select example" id="select_Cat"
                    wire:model="selectedRepairType">
                    <option>Select Repair</option>
                    @foreach ($repair_types as $repair)
                        <option value="{{ $repair->id }}">{{ $repair->name }}
                    @endforeach
                    </option>
                </select>
                @error('selectedRepairType')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label for="broken_screen_p">Price</label>
                <input type="text" name="price" id="price" placeholder="Price" required
                    wire:model.debounce.500="price">
                @error('price')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>
            <button type="button" class="bg-blue text-white mt-3" wire:click="create">
                Add Repair Price
                <span wire:loading wire:target='create'>
                    <x-spinner />
                </span>
            </button>
        </div>





    </div>
</div>
