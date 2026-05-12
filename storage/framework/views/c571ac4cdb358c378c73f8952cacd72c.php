
<div class="cust-container" style="max-width:600px;margin:60px auto">
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.top-bar', [])->html();
} elseif ($_instance->childHasBeenRendered('l3763466503-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3763466503-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3763466503-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3763466503-0');
} else {
    $response = \Livewire\Livewire::mount('components.top-bar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3763466503-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', ['theme' => 'white'])->html();
} elseif ($_instance->childHasBeenRendered('l3763466503-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3763466503-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3763466503-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3763466503-1');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', ['theme' => 'white']);
    $html = $response->html();
    $_instance->logRenderedChild('l3763466503-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <h2 class="mb-4">Ask For Quotation</h2>

    
    <div class="mb-4 p-3 border rounded bg-light">
        <p><strong>Device:</strong> <?php echo e($device); ?></p>
        <p><strong>Model:</strong> <?php echo e($modal); ?></p>
        <p><strong>Repair:</strong> <?php echo e($repair); ?></p>
    </div>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form wire:submit.prevent="submit" class="d-flex flex-column gap-3">

        <input type="text" wire:model.defer="name" class="form-control" placeholder="Your Name">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input type="email" wire:model.defer="email" class="form-control" placeholder="Email">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <input type="text" wire:model.defer="phone" class="form-control" placeholder="Phone">
        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <textarea wire:model.defer="message" class="form-control" placeholder="Message (optional)"></textarea>

       <button type="submit" class="btn fw-bold" style="background:#00aeef;color:#fff;border:none;height:56px;border-radius:12px;">
    Submit Quotation
</button>

    </form>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/quotation-form.blade.php ENDPATH**/ ?>