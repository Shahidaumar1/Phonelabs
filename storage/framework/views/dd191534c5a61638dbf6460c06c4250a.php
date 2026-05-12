<div>
    <div class="my-2">
        <strong><?php echo e($model->name ?? ''); ?></strong>
    </div>
    <div classs="old-spec-addition-form">
        <div class="my-4 d-flex justify-content-center align-items-center flex-column w-50 ">
            <input type="file" wire:model="image" accept="image/jpg,image/png,image/jpeg" multiple />
            <span wire:loading wire:target="image">loading....</span>
        </div>
        <div class=" gap-4  flex-wrap  ">
            <table class="table mx-auto p-5">
                <tbody>
                    <tr>
                        <th>Memory Size</th>
                        <?php $__empty_1 = true; $__currentLoopData = $memory_sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $memory_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <td class="rounded cursor-pointer border border-dark <?php echo e($selectedMemorySize == $memory_size ? 'bg-success text-white' : 'bg-light'); ?> " wire:click="selectMemorySize('<?php echo e($memory_size); ?>')">
                            <?php echo e($memory_size); ?>

                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                        <td><input type="text" placeholder="Other" wire:model.debounce.500="selectedMemorySize" style="width:70px!important; height:30px;border:none" /></td>
                    </tr>

                    <tr>
                        <th>Grade</th>
                        <?php $__empty_1 = true; $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <td class=" rounded cursor-pointer border border-dark <?php echo e($selectedGrade == $grade ? 'bg-success text-white' : 'bg-light'); ?> " wire:click="selectGrade('<?php echo e($grade); ?>')">
                            <?php echo e($grade); ?>

                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </tr>

                    <tr>
                        <th>Colours</th>
                        <?php $__empty_1 = true; $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <td class="rounded cursor-pointer border border-dark <?php echo e($selectedColor == $color ? 'bg-success text-white' : 'bg-light'); ?> " wire:click="selectColor('<?php echo e($color); ?>')">
                            <?php echo e($color); ?>

                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                        <td><input type="text" placeholder="Other" wire:model.debounce.500="selectedColor" style="width:70px!important; height:30px;border:none" /></td>
                    </tr>

                    
                    <tr>
                        <th>Condition <span class="text-danger">*</span></th>
                        <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="rounded cursor-pointer border border-dark <?php echo e($selectedCondition == $condition ? 'bg-success text-white' : 'bg-light'); ?>"
                            wire:click="selectCondition('<?php echo e($condition); ?>')">
                            <?php echo e($condition); ?>

                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>

                    <tr>
                        <th>Quantity</th>
                        <td><input type="number" wire:model.debounce.500="quantity" /></td>
                    </tr>

                    <?php if($selectedCatId==14): ?>
                    <tr>
                        <th>IMEI</th>
                        <td>
                            <?php for($i = 0; $i < $quantity; $i++): ?>
                            <input class="mt-1" type="text" wire:model.debounce.500="imei.<?php echo e($i); ?>" placeholder="IMEI <?php echo e($i + 1); ?>" oninput="validateIMEIs()" />
                            <?php endfor; ?>
                            <div wire:ignore>
                                <div id="imeisError" class="text-danger"></div>
                                <div id="imeisCount"></div>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-sm text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['selectedCondition'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-sm text-danger d-block text-center mb-2">Please select a condition!</span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
        <div class=" d-flex justify-content-between my-3 align-items-center bg-light ">
            <div class=" d-flex gap-2 cursor-pointer " wire:click="clear">
                <i class="fa fa-times text-dark " style="font-size:20px;" aria-hidden="true"></i>
                <h4 class="fw-bold">Clear</h4>
            </div>

            <div>
                <input type="text" placeholder="Enter Price" wire:model.debounce.500="price" />
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-sm text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="d-flex gap-2 cursor-pointer align-items-center" wire:click="save" id="<?php echo e($rand); ?>">
                <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
                <h4 class="fw-bold">Add Price</h4>
                <span wire:loading wire:target="save">saving....</span>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/buy/addon/add-spec.blade.php ENDPATH**/ ?>