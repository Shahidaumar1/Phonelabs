<div>
    <div class="my-2">
        <strong><?php echo e($model->name ?? ''); ?></strong>
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
                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td class="border cursor-pointer <?php echo e($selectedColor == $color ? 'bg-success text-white' : ''); ?>"
                        wire:click="selectColor('<?php echo e($color); ?>')">
                        <?php echo e($color); ?>

                    </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php echo e($editingSpecId ? 'Update' : 'Add'); ?>

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
            <?php $__currentLoopData = $product_specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($spec->memory_size); ?></td>
                    <td><?php echo e($spec->color); ?></td>
                    <td><?php echo e($spec->price); ?></td>
                    <td><?php echo e($spec->quantity); ?></td>
                    <td>
                        <button wire:click="edit(<?php echo e($spec->id); ?>)"
                                class="btn btn-sm btn-primary">
                            Edit
                        </button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/accessories/addon/add-spec.blade.php ENDPATH**/ ?>