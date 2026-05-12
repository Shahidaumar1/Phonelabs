<div class="d-flex gap-2 align-items-center">
<div >
    <div class="mb-2">
        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
    </div>
    <div class="d-flex  gap-5 items-center align-items-center">
     <div class=" d-flex gap-2">
       <div>
        <button type="button" onclick="document.getElementById('input-file').click()" class="btn btn-success">Import
            Products</button>
        <input type="file" id="input-file" wire:model="excel_file" hidden /><br>
        <span wire:loading wire:target="excel_file" class="ml-2">importing.....</span>
        <?php $__errorArgs = ['excel_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color:red;" class="text-xs ml-2"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
       </div>

       <div>
        <button type="button" wire:click="export"  class="btn btn-primary">Export
            Products</button>
        <br>
        <span wire:loading wire:target="export" class="ml-2">exporting.....</span>
        <?php $__errorArgs = ['export_excel_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color:red;" class="text-xs ml-2"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
       </div>
     </div>
     <div>
        <div class="d-flex justify-content-between ">

            <?php if($template): ?>
            <div class="d-flex gap-3 items-center">
                <button type="button" wire:click="downloadTemplate" class="btn btn-primary">Download Template</button>
                <a href="javascitp:void(0)" wire:click="deleteTemplate" style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a><br>
                <span wire:loading wire:target="downloadTemplate" class="ml-2">downloading.....</span>
            </div>
            <?php else: ?>
            <span class="text-primary" style="cursor: pointer" onclick="document.getElementById('template-input').click()">Upload Template</span><br>
            <input type="file" wire:model="template_file" id="template-input" hidden/><br>
            <span wire:target="template_file" wire:loading class="ml-2">uploading.....</span>
            <?php $__errorArgs = ['template_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span style="color:red;" class="text-xs ml-2"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php endif; ?>
        </div>
     </div>
    </div>
</div>


</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/repair/components/import-export.blade.php ENDPATH**/ ?>