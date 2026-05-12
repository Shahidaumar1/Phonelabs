<nav class=" px-3 " style=" background-color: transparent;">
    <div class="d-flex justify-content-between align-items-center ">
        <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true" onclick="toggleLeftDrawer()"> </i>

         <div class="d-none d-md-flex align-items-center admin-top-items" >
            <div>
                <a href="<?php echo e(route('buy-categories')); ?>" 
                class="text-dark item p-3 <?php echo e($active == 'categories' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Devices</a>
            </div>
            <div>
                <a href="<?php echo e(route('buy-devices')); ?>" 
                class="text-dark p-3 item <?php echo e($active == 'devices' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Brands</a>
            </div>
            <div>
                <a href="<?php echo e(route('buy-models')); ?>" 
                class="text-dark p-3 item <?php echo e($active == 'models' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Models</a>
            </div>
            <div>
                <a href="<?php echo e(route('buy-models-add-ons')); ?>" 
                class="text-dark p-3 item <?php echo e($active == 'add-ons' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Addons</a>
            </div>
        </div>




        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.avatar', [])->html();
} elseif ($_instance->childHasBeenRendered('l2647137316-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2647137316-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2647137316-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2647137316-0');
} else {
    $response = \Livewire\Livewire::mount('components.avatar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2647137316-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>


</nav>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/buy/components/top-nav.blade.php ENDPATH**/ ?>