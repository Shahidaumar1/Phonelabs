<div>
    <div class="d-flex justify-content-center admin-sub-nav">
    <div class="pt-2 gap-3" role="group" >
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button type="button" 
                    class="btn m-2 <?php echo e($active == $item['name'] ? 'selected-button' : 'unselected-button'); ?> mx-1" 
                    wire:click="showData('<?php echo e($item['name']); ?>')">
                <?php echo e($item['name']); ?>

            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/buy/components/sub-nav.blade.php ENDPATH**/ ?>