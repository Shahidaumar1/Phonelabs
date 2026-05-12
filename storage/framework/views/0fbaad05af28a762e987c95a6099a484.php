 <nav class=" px-3" style=" background-color: transparent;">
     <div class="d-flex justify-content-between align-items-center ">
         <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true" onclick="toggleLeftDrawer()"></i>

         <div class="d-none d-md-flex align-items-center admin-top-items">
             <div>
                 <a href="<?php echo e(route('accessories-categories')); ?>"  class=" item p-3 <?php echo e($active == 'categories' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Brands</a>
             </div>
             <div>
                 <a href="<?php echo e(route('accessories-devices')); ?>"  class=" item p-3 <?php echo e($active == 'categories' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Models</a>
             </div>

             <div>
                 <a href="<?php echo e(route('accessories-models')); ?>"  class=" item p-3 <?php echo e($active == 'categories' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Accessories</a>
             </div>
             <div>
                 <a href="<?php echo e(route('accessories-models-add-ons')); ?>"  class=" item p-3 <?php echo e($active == 'categories' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Variations</a>
             </div>

         </div>

         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.avatar', [])->html();
} elseif ($_instance->childHasBeenRendered('l2354634809-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2354634809-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2354634809-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2354634809-0');
} else {
    $response = \Livewire\Livewire::mount('components.avatar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2354634809-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
     </div>

 </nav>
 <?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/accessories/components/top-nav.blade.php ENDPATH**/ ?>