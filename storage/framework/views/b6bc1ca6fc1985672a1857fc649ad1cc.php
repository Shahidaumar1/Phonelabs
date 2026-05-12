<div class="" style="overflow: hidden;">
    <div class="row">
        <div class="col">
            <div class="d-flex flex-column flex-md-row">

                
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings'])->html();
} elseif ($_instance->childHasBeenRendered('l112972486-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l112972486-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l112972486-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l112972486-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings']);
    $html = $response->html();
    $_instance->logRenderedChild('l112972486-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                
                <?php if (isset($component)) { $__componentOriginald033566f468fc7bb3a8d0f946fdab616 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald033566f468fc7bb3a8d0f946fdab616 = $attributes; } ?>
<?php $component = App\View\Components\Content::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Content::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'payment'])->html();
} elseif ($_instance->childHasBeenRendered('l112972486-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l112972486-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l112972486-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l112972486-1');
} else {
    $response = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'payment']);
    $html = $response->html();
    $_instance->logRenderedChild('l112972486-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    <div class="container">
                        <h2 class="px-3 pt-1 pt-md-5 pb-3">
                            <b>Payment Gateway</b>
                        </h2>

                        <p class="px-3 py-1">
                            A payment gateway facilitates secure online payments for businesses.
                        </p>

                        
                        <div class="ml-2 d-flex gap-2 align-items-center">
                            <label
                                class="p-3 text-center <?php echo e($pm == 'Paypal' ? 'selected-button' : 'unselected-button'); ?> cursor-pointer"
                                wire:click="$set('pm', 'Paypal')">
                                Paypal
                            </label>

                            <label
                                class="p-3 text-center <?php echo e($pm == 'Stripe' ? 'selected-button' : 'unselected-button'); ?> cursor-pointer"
                                wire:click="$set('pm', 'Stripe')">
                                Stripe
                            </label>

                            <label
                                class="p-3 text-center <?php echo e($pm == 'Klarna' ? 'selected-button' : 'unselected-button'); ?> cursor-pointer"
                                wire:click="$set('pm', 'Klarna')">
                                Klarna
                            </label>
                        </div>

                        
                        <div class="px-3 pt-3">

                            
                            <?php if($pm === 'Paypal'): ?>
                                <div class="card p-3">
                                    <label class="pb-2"><b>Client ID</b></label>
                                    <input type="text"
                                           class="form-control input_form mb-2 w-75"
                                           placeholder="Client ID"
                                           wire:model.defer="paypal_client_id" />
                                    <?php $__errorArgs = ['paypal_client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-primary"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <label class="pb-2"><b>Secret</b></label>
                                    <input type="text"
                                           class="form-control input_form mb-2 w-75"
                                           placeholder="Secret"
                                           wire:model.defer="paypal_secret" />
                                    <?php $__errorArgs = ['paypal_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-primary"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <label class="pb-2"><b>Mode</b></label>
                                    <input type="text"
                                           class="form-control input_form mb-2 w-75"
                                           placeholder="Live / Sandbox"
                                           wire:model.defer="paypal_mode" />

                                    <div class="form-check mt-2">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="paypalEnabled"
                                               wire:model="paypal_enabled">
                                        <label class="form-check-label" for="paypalEnabled">
                                            Enable Paypal payment method
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center pt-2 mb-3">
                                    <button type="button"
                                            class="<?php echo e($dirty ? 'selected-button' : 'unselected-button'); ?>"
                                            wire:click="connect">
                                        Connect
                                    </button>
                                    <span wire:loading wire:target="connect">connecting....</span>
                                    <?php if(session()->has('message')): ?>
                                        <span class="text-success ms-2"><?php echo e(session('message')); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            
                            <?php if($pm === 'Stripe'): ?>
                                <p>Stripe keys will work for Klarna also.</p>

                                <div class="card p-3">
                                    <label class="pb-2 mt-3"><b>Private Key</b></label>
                                    <input type="text"
                                           class="form-control input_form w-75 mb-3"
                                           placeholder="Secret Key"
                                           wire:model.defer="stripe_secret" />
                                    <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-primary pb-3"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <label class="pb-2 mt-3"><b>Public Key</b></label>
                                    <input type="text"
                                           class="form-control input_form w-75 mb-3"
                                           placeholder="Public Key"
                                           wire:model.defer="stripe_public_key" />
                                    <?php $__errorArgs = ['stripe_public_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <div class="form-check mt-2">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="stripeEnabled"
                                               wire:model="stripe_enabled">
                                        <label class="form-check-label" for="stripeEnabled">
                                            Enable Stripe payment method
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center pt-2 mb-3">
                                    <button type="button"
                                            class="<?php echo e($dirty ? 'selected-button' : 'unselected-button'); ?>"
                                            wire:click="connect">
                                        Connect
                                    </button>
                                    <span wire:loading wire:target="connect">connecting....</span>
                                    <?php if(session()->has('message')): ?>
                                        <span class="text-success ms-2"><?php echo e(session('message')); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            
                            <?php if($pm === 'Klarna'): ?>
                                <div class="card p-3">
                                    <p>
                                        Klarna uses your Stripe account.
                                        Provide the Stripe <b>secret key</b> to enable Klarna.
                                    </p>

                                    <label class="pb-2 mt-2"><b>Stripe Secret Key for Klarna</b></label>
                                    <input type="text"
                                           class="form-control input_form w-75 mb-3"
                                           placeholder="Stripe Secret Key"
                                           wire:model.defer="klarna_secret" />
                                    <?php $__errorArgs = ['klarna_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-primary pb-3"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <div class="form-check mt-2">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="klarnaEnabled"
                                               wire:model="klarna_enabled">
                                        <label class="form-check-label" for="klarnaEnabled">
                                            Enable Klarna payment method
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center pt-2 mb-3">
                                    <button type="button"
                                            class="<?php echo e($dirty ? 'selected-button' : 'unselected-button'); ?>"
                                            wire:click="connect">
                                        Connect
                                    </button>
                                    <span wire:loading wire:target="connect">connecting....</span>
                                    <?php if(session()->has('message')): ?>
                                        <span class="text-success ms-2"><?php echo e(session('message')); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald033566f468fc7bb3a8d0f946fdab616)): ?>
<?php $attributes = $__attributesOriginald033566f468fc7bb3a8d0f946fdab616; ?>
<?php unset($__attributesOriginald033566f468fc7bb3a8d0f946fdab616); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald033566f468fc7bb3a8d0f946fdab616)): ?>
<?php $component = $__componentOriginald033566f468fc7bb3a8d0f946fdab616; ?>
<?php unset($__componentOriginald033566f468fc7bb3a8d0f946fdab616); ?>
<?php endif; ?>

            </div>
        </div>
    </div>
</div>


<style>
    .card {
        min-width: 200px;
        border-radius: 20px;
        border: 1px solid gray;
        background: whitesmoke;
    }

    .button-sticky {
        height: 60px;
        color: white;
        font-family: sans-serif;
        font-size: 15px;
        line-height: 15px;
        text-align: center;
        position: fixed !important;
        bottom: -2px;
        z-index: 999;
        width: 100%;
    }

    .home-btn:hover {
        color: orange;
    }

    .button-sticky .col-2 {
        margin-right: 5px;
    }
</style>

<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row">
        <div class="col-2 mt-4 ml-1">
            <a href="<?php echo e(route('payment-methods-settings')); ?>" class="text-white item">Payment</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('site-settings')); ?>" class="text-white item">site-settings</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('branches-settings')); ?>" class="text-white item">Branches</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('create-branches')); ?>" class="text-white item">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('services-settings')); ?>" class="text-white item">Services</a>
        </div>
    </div>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/settings/payment-methods.blade.php ENDPATH**/ ?>