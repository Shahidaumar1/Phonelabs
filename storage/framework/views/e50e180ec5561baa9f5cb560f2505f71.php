<div>

    <div class="container align-items-center"
    style="">
    <?php if($success): ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>You payment successfully charged. Admin will contact you soom.</p>
            <hr>
            <p class="mb-0">Whenever you need to, You can contact with us.</p>

        </div>
    <?php endif; ?>
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
    <form id="payment-form" class='w-100'>
        <?php echo csrf_field(); ?>
        <div style="position:relative;top:2px;" class="d-flex gap-2 flex-column">

            <div style="margin-left:10px" id="card-element" wire:ignore></div>
            <div style="margin-left:10px" id="card-errors" role="alert"></div>
            <button style="margin-left:10px" type="submit" class="btn btn-<?php echo e($color ?? ''); ?>"
                <?php if($loading || $price == 0): ?> disabled <?php endif; ?>>
                <div class="d-flex gap-3 justify-content-center align-itemes-center ">
                    Submit Payment
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
    <div class="form-check ">
        <input class="form-check-input" type="checkbox" value="" style="transform: scale(0.8);" id="flexCheckChecked" checked />

        <label style="" class="form-check-label" for="flexCheckChecked"><a href="<?php echo e(route('privacy-and-policy')); ?>">I Agree to
                Privacy Policy</a> And <a href="<?php echo e(route('terms-and-conditions')); ?>">Terms & Conditions</a></label>
    </div>

    <div>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('<?php echo e($public_key); ?>');
            var elements = stripe.elements();
            var card = elements.create('card', {
                style: {
                    base: {
                        fontSize: '16px',
                        shadow: '1px solid black',
                        padding: '5px;'
                    },
                },
            });

            card.mount('#card-element');
            var form = document.getElementById('payment-form');



            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Show any errors to the user.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Token created successfully
                        livewire.emit('tokenCreated', result.token.id);
                        // Send the token to your server for payment processing.
                    }
                });
            });
        </script>

    </div>
</div>



</div>
<style>
    .bu{
        min-height:300px; max-width:550px; background: #ffffff 0% 0% no-repeat padding-box;box-shadow: 0px 3px 6px #ff070729;border: 1px solid #cecece;border-radius: 15px;
    }
       
    }
</style>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/payment-methods/stripe.blade.php ENDPATH**/ ?>