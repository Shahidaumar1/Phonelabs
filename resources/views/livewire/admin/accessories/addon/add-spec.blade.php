<div>
    <div class="my-2">
        <strong>{{ $model->name ?? '' }}</strong>
    </div>

    <table class="table mx-auto">
        <tbody>
            <tr>
                <th>Category</th>
                <td>
                    <input type="text"
                           class="form-control"
                           placeholder="Enter Category"
                           wire:model="spec_category" />
                </td>
            </tr>

            <tr>
                <th>Colours</th>
                @foreach($colors as $color)
                    <td class="border cursor-pointer {{ $selectedColor == $color ? 'bg-success text-white' : '' }}"
                        wire:click="selectColor('{{ $color }}')">
                        {{ $color }}
                    </td>
                @endforeach
            </tr>

            <tr>
                <th>Quantity</th>
                <td>
                    <input type="number" wire:model="quantity" min="1" />
                </td>
            </tr>

            <tr>
                <th>Price</th>
                <td>
                    <input type="text" wire:model="price" />
                </td>
            </tr>
        </tbody>
    </table>

    <div class="my-3">
        <button wire:click="save" class="btn btn-success">
            {{ $editingSpecId ? 'Update' : 'Add' }}
        </button>

        <button wire:click="clear" class="btn btn-secondary">
            Clear
        </button>
    </div>

    <hr>

    <h5>Added Specs</h5>

    <table class="table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Color</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product_specs as $spec)
                <tr>
                    <td>{{ $spec->memory_size }}</td>
                    <td>{{ $spec->color }}</td>
                    <td>{{ $spec->price }}</td>
                    <td>{{ $spec->quantity }}</td>
                    <td>
                        <button wire:click="edit({{ $spec->id }})"
                                class="btn btn-sm btn-primary">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>