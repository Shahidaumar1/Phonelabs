<div>
<style>
   .form-box {
    max-width: 600px;
}

.custom-input {
    height: 50px;
    border-radius: 6px;
}

textarea.form-control {
    border-radius: 6px;
}

.custom-btn {
    background-color: black;
    color: white;
    padding: 10px 30px;
    border-radius: 6px;
    font-weight: 600;
    border: none;
}

.custom-btn:hover {
    background-color: black;
    color: white;
    opacity: 1;
    transform: none;
}

@media (max-width: 576px) {
    .custom-btn {
        width: 100%;
    }
}

</style>
<div class="form-box container mt-4">
    <h3 class="mb-3">Contact Us</h3>

    <?php if(session()->has('message')): ?>
        <div class="alert alert-success"><?php echo e(session('message')); ?></div>
    <?php endif; ?>

    <form wire:submit.prevent="sendEmail">
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control custom-input"
                    wire:model="name" placeholder="Name">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-6 mb-3">
                <input type="tel" class="form-control custom-input"
                    wire:model="phone" placeholder="Phone">
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="mb-3">
            <input type="email" class="form-control custom-input"
                wire:model="email" placeholder="Email">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <select class="form-select custom-input" wire:model="selectedOption">
                <option value="">Subject</option>
                <option value="Buying a Device">Buying a Device</option>
                <option value="Selling A Device">Selling A Device</option>
                <option value="Repairing A device">Repairing A device</option>
                <option value="Other">Other</option>
            </select>
            <?php $__errorArgs = ['selectedOption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <?php if($selectedOption == 'Other'): ?>
        <div class="mb-3">
            <input type="text" class="form-control"
                wire:model="otherOption" placeholder="Other Option">
            <?php $__errorArgs = ['otherOption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <?php endif; ?>
        
        <div class="mb-3">
            <textarea rows="5" class="form-control"
                wire:model="message" placeholder="Type Your Message"></textarea>
            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="text-center">
            <button type="submit" class="btn custom-btn">
                Submit
            </button>
        </div>

    </form>
</div>
</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/livewire/guest/user-dashboard/index.blade.php ENDPATH**/ ?>