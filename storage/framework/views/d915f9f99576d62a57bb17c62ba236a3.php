 <nav class=" px-3 " style=" background-color: transparent;">
     <div class="d-flex justify-content-between align-items-center ">
         <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true" onclick="toggleLeftDrawer()"></i>

     
         <div class="d-none d-md-flex align-items-center admin-top-items">
             <div>
                 <a href="<?php echo e(route('repair-categories')); ?>"
                     class=" text-dark  p-3 <?php echo e($active == 'categories' ? 'text-danger fw-bold  p-3' : ''); ?>">Devices</a>
             </div>
             <div>
                 <a href="<?php echo e(route('repair-devices')); ?>"
                     class=" text-dark p-3   <?php echo e($active == 'devices' ? 'text-danger fw-bold  p-3' : ''); ?>">Brands</a>
             </div>

             <div>
                 <a href="<?php echo e(route('repair-models')); ?>"
                     class=" text-dark p-3   <?php echo e($active == 'models' ? 'text-danger fw-bold  p-3' : ''); ?>">Models</a>
             </div>

             <div>
                <a href="<?php echo e(route('repair-price')); ?>"
                    class=" text-dark p-3   <?php echo e($active == 'price' ? 'text-danger fw-bold  p-3' : ''); ?>">Repair</a>
            </div>



         </div>

         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.avatar', [])->html();
} elseif ($_instance->childHasBeenRendered('l1739380584-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1739380584-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1739380584-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1739380584-0');
} else {
    $response = \Livewire\Livewire::mount('components.avatar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1739380584-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
     </div>

 </nav>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/repair/components/top-nav.blade.php ENDPATH**/ ?>