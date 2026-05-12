<div>
    <div class="d-flex justify-content-start ">
        <ul class=" " role="group">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
                    <button class="button btn mx-1 my-1 <?php echo e($active == $item['name'] ? 'selected-button' : 'unselected-button'); ?>" aria-current="page" wire:click="showData('<?php echo e($item['name']); ?>')"><?php echo e($item['name']); ?></button>
               
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/repair/components/sub-nav.blade.php ENDPATH**/ ?>