<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="py-2 px-4  mb-2 rounded bg-danger text-white ">
            <span class="text-sm"><?php echo e($message); ?></span>
        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php if(session()->has('success')): ?>
        <div class="p-2 rounded-lg " style="background:rgb(200, 235, 168);color:black">
            <span class="text-sm"><?php echo e(session()->get('success')); ?></span>
        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/components/alert.blade.php ENDPATH**/ ?>