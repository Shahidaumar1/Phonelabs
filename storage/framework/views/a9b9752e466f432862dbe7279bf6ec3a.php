<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l180087746-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l180087746-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l180087746-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l180087746-0');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l180087746-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <div class="container bg-gray rounded-4 p-5 mt-5 mb-5">

        <form wire:submit.prevent="sendCustomerEmail">

            <div class="row">

                <div class="container col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="brand">Brand:</label>
                        <input class="form-control" type="text" id="brand" wire:model="brand"
                            placeholder="Enter brand">
                        <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="model">Model:</label>
                        <input class="form-control" type="text" id="model" wire:model="model"
                            placeholder="Enter model">
                        <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="additionalDescription">Additional Information:</label>
                        <textarea class="form-control" id="additionalDescription" wire:model="additionalDescription"
                            placeholder="Enter additional information"></textarea>
                        <?php $__errorArgs = ['additionalDescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="container col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="otherText">Additional Information:</label>
                        <textarea class="form-control" id="otherText" wire:model="otherText"
                            placeholder="Enter additional information"></textarea>
                        <?php $__errorArgs = ['otherText'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

            </div>

            <div class="row mt-5">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="firstName">First Name:</label>
                        <input class="form-control" type="text" id="firstName"
                            wire:model="firstName" required placeholder="Enter your first name">
                        <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="lastName">Last Name:</label>
                        <input class="form-control" type="text" id="lastName"
                            wire:model="lastName" required placeholder="Enter your last name">
                        <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone:</label>
                        <input class="form-control" type="text" id="phone"
                            wire:model="phone" required placeholder="Enter your phone number">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control" type="email" id="email"
                            wire:model="email" required placeholder="Enter your email">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="productName">Confirm Email</label>
                        <input class="form-control" type="email" id="productName"
                            wire:model="productName" required placeholder="Confirm your email">
                        <?php $__errorArgs = ['productName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-5">
                <button class="btn text-white rounded-pill px-5 py-2"
                    style="background-color: #00BFFF;"
                    type="submit">
                    Ask For Quote
                </button>
            </div>

        </form>

        <?php if(session()->has('emailSent')): ?>
            <div class="alert alert-success mt-3" role="alert">
                Email sent successfully!
            </div>
        <?php endif; ?>

        <?php if(session()->has('emailSendFailed')): ?>
            <div class="alert alert-danger mt-3" role="alert">
                Email sending failed: <?php echo e(session('emailSendFailed')); ?>

            </div>
        <?php endif; ?>

    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/quotation/index.blade.php ENDPATH**/ ?>