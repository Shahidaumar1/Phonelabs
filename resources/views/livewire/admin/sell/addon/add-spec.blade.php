<div>
    <div class=" d-flex justify-content-center align-items-center flex-column w-50 ">
        <input type="file" wire:model="image" accept="image/jpg,image/png,image/jpeg" />
        <span wire:loading wire:target="image">loading....</span>
    </div>
    <div class="d-flex  gap-4  flex-wrap  ">
        <table class="table mx-auto p-5">
            <thead>
                <tr>
                    <th>{{ $model->name ?? '' }}</th>
                    <th colspan="7">Select specificatoin and price</th>
                </tr>
            </thead>
            <tbody>
                <div>
                    <tr>
                        <th>Memory Size</th>
                        @forelse($memory_sizes as $memory_size)
                            <td class="rounded cursor-pointer border border-dark {{ $selectedMemorySize == $memory_size ? 'bg-success text-white' : 'bg-light' }} "
                                wire:click="selectMemorySize('{{ $memory_size }}')">
                                {{ $memory_size }}
                            </td>
                        @empty
                        @endforelse
                        <td><input type="text" placeholder="Other" wire:model.debounce.500="selectedMemorySize"
                                style="width:60px!important; height:30px;border:none" /></td>
                    </tr>

                    <tr>
                        <th>Condition</th>
                        @forelse($conditions as $condition)
                            <td class=" rounded cursor-pointer border border-dark {{ $selectedCondition == $condition ? 'bg-success text-white' : 'bg-light' }} "
                                wire:click="selectCondition('{{ $condition }}')">
                                {{ $condition }}
                            </td>
                        @empty
                        @endforelse
                    </tr>

                </div>
                @if ($mobileMode || $tabletMode)
                    <tr>
                        <th>Network</th>
                        @forelse($network_providers as $network)
                            <td class="cursor-pointer border border-dark {{ ($selectedNetwork ?? '') == $network['name'] ? 'bg-success' : 'bg-light' }}"
                                wire:click="selectNetwork('{{ $network['name'] }}')">
                                <img src="{{ asset($network['image']) }}" alt="{{ $network['name'] }}"
                                    style="width: 30px; height: 30px;" />
                            </td>
                        @empty
                            <td>No networks available</td>
                        @endforelse
                        <td>
                            <input type="text" placeholder="Other" wire:model="selectedNetwork"
                                style="width: 60px; height: 30px; border: none;" />
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        @error('selectedCondition')
            <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class=" d-flex justify-content-between my-3 align-items-center bg-light ">
        <div class=" d-flex gap-2 cursor-pointer " wire:click="clear">
            <i class="fa fa-times text-dark " style="font-size:20px;" aria-hidden="true"></i>
            <h4 class="fw-bold">Clear</h4>
        </div>
        {{-- Temporary Debug - remove after fix --}}
@dump($product_specs)
        <div>
            <input type="text" placeholder="Enter Price" wire:model.debounce.500="price" />
            @error('price')
                <span class="text-sm text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex gap-2 cursor-pointer align-items-center" wire:click="save" id="{{ $rand }}">
            <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
            <h4 class="fw-bold">Add Price</h4>
            <span wire:loading wire:target="save">saving....</span>
        </div>
    </div>
</div>