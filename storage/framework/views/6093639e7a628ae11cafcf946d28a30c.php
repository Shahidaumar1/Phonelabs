<nav class=" px-3 " style=" background-color: transparent;">
    <div class="d-flex justify-content-between align-items-center ">
        <i class="fa fa-bars cursor-pointer text-dark" aria-hidden="true" onclick="toggleLeftDrawer()"></i>

        <div class="d-none d-md-flex align-items-center admin-top-items">
            <div>
                <a href="<?php echo e(route('payment-methods-settings')); ?>" class=" text-dark item p-3 <?php echo e($active == 'payment' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Payment</a>
            </div>
            <div>
                <a href="<?php echo e(route('site-settings')); ?>" class=" text-dark p-3 item  <?php echo e($active == 'site-settings' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">site-settings</a>
            </div>
            <div>
                <a href="<?php echo e(route('branches-settings')); ?>" class=" text-dark p-3 item  <?php echo e($active == 'branches' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Branches</a>
            </div>
            <div>
                <a href="<?php echo e(route('create-branches')); ?>" class=" text-dark p-3 item  <?php echo e($active == 'create' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Create</a>
            </div>
            <div>
                <a href="<?php echo e(route('services-settings')); ?>" class=" text-dark p-3 item  <?php echo e($active == 'services' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Services</a>
            </div>


        </div>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.avatar', [])->html();
} elseif ($_instance->childHasBeenRendered('l4170993096-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4170993096-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4170993096-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4170993096-0');
} else {
    $response = \Livewire\Livewire::mount('components.avatar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l4170993096-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

</nav>


<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/settings/components/top-nav.blade.php ENDPATH**/ ?>