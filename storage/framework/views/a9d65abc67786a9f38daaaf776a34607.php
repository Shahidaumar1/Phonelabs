<div class="container justify-content-end align-items-center"
    style="">

    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Payment failed!</strong> <?php echo e($message); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
   
    <div>
        <!--<img src="https://cdn.worldvectorlogo.com/logos/klarna.svg" width="200px" height="150px"/>-->
    </div>

    <form class='w-100 '>

        <div style="position:relative;top:2px;" class="d-flex gap-2 flex-column">


            <button style="margin-left:10px; background-color:pink" type="button" wire:click="sendEmailBeforePay"
                class="btn " <?php if($loading || $price == 0): ?> disabled <?php endif; ?>>
                <div class="d-flex gap-3 justify-content-center align-itemes-center ">
                    Pay With Klarna
                    <?php if($loading): ?>
                        <span>
                            <?php if (isset($component)) { $__componentOriginalf26909af655deaf31c8e20175813a5a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf26909af655deaf31c8e20175813a5a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spinner','data' => ['color' => 'white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('spinner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'white']); ?>
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
                </div>
            </button>
        </div>

    </form>
    <div class="form-check d-flex align-items-center ">
    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckChecked" checked>
    <label class="form-check-label mb-0" for="flexCheckChecked">
        <a href="<?php echo e(route('privacy-and-policy')); ?>" class="text-decoration-none">I Agree to Privacy Policy</a> And <a href="<?php echo e(route('terms-and-conditions')); ?>" class="text-decoration-none">Terms & Conditions</a>
    </label>
</div>

</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/payment-methods/klarna.blade.php ENDPATH**/ ?>