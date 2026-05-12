<div class="container   align-items-center" >
    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class=" alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Payment failed!</strong> <?php echo e($message); ?>

        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <div class="container d-flex justify-content-center">
    <button wire:click="createPayment" class="btn btn-<?php echo e($color ?? ''); ?>" style="width: 180px;">
        <span class="p-2">
            Pay with PayPal
            <?php if($loading): ?>
                <span>
                    <?php if (isset($component)) { $__componentOriginalf26909af655deaf31c8e20175813a5a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf26909af655deaf31c8e20175813a5a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spinner','data' => ['color' => 'black']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('spinner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'black']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf26909af655deaf31c8e20175813a5a0)): ?>
<?php $attributes = $__attributesOriginalf26909af655deaf31c8e20175813a5a0; ?>
<?php unset($__attributesOriginalf26909af655deaf31c8e20175813a5a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf26909af655deaf31c8e20175813a5a0)): ?>
<?php $component = $__componentOriginalf26909af655deaf31c8e20175813a5a0; ?>
<?php unset($__componentOriginalf26909af655deaf31c8e20175813a5a0); ?>
<?php endif; ?>
                </span>
            <?php endif; ?>
        </span>
    </button>
</div>

    <div class="form-check m-2">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>

        <label  class="form-check-label" for="flexCheckChecked"><a href="<?php echo e(route('privacy-and-policy')); ?>">I Agree to Privacy Policy</a> And <a href="<?php echo e(route('terms-and-conditions')); ?>">Terms & Conditions</a></label>
    </div>
</div>

<style>
    .blu{
        min-height:300px;background: #ffffff 0% 0% no-repeat padding-box; max-width: 550px "
    }
    }
</style><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/payment-methods/paypal.blade.php ENDPATH**/ ?>