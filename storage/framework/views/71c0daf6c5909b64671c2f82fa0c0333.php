 <nav class=" px-3 " style=" background-color: transparent;">
     <div class="d-flex justify-content-between align-items-center ">
         <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true" onclick="toggleLeftDrawer()"></i>

         <div class="d-none d-md-flex align-items-center admin-top-items" >
             <div>
                 <a href="<?php echo e(route('sell-categories')); ?>"
                     class=" text-dark item p-3 <?php echo e($active == 'categories' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Devices</a>
             </div>
             <div>
                 <a href="<?php echo e(route('sell-devices')); ?>"
                     class="  text-dark item p-3 <?php echo e($active == 'devices' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Brands</a>
             </div>

             <div>
                 <a href="<?php echo e(route('sell-models')); ?>"
                     class=" text-dark item p-3 <?php echo e($active == 'models' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Models</a>
             </div>

             <div>
                 <a href="<?php echo e(route('sell-models-add-ons')); ?>"
                     class=" text-dark item p-3 <?php echo e($active == 'add-ons' ? 'text-danger fw-bold p-3' : ''); ?>" style="background-color: transparent;">Add-Ons</a>
             </div>

         </div>

         <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.avatar', [])->html();
} elseif ($_instance->childHasBeenRendered('l331515098-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l331515098-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l331515098-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l331515098-0');
} else {
    $response = \Livewire\Livewire::mount('components.avatar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l331515098-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
     </div>

 </nav>

<!----------------------------- footer-------------------------->
<style>
.button-sticky {
    height: 60px;
    color: white;
    font-family: sans-serif;
    font-size: 17px;
    line-height: 15px;
    text-align: center;
    position: fixed;
    bottom: -2px;
    z-index: 999;
    overflow-x:auto;
}

.home-btn:hover {
    color: orange;
}
.button-sticky .col-2 {
    margin-right: 10px; /* Adjust this value to set the desired gap */
}

.button-sticky .col-2:last-child {
    margin-right: 0; /* Remove margin from the last button to prevent extra space */
}

</style>

<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/sell/components/top-nav.blade.php ENDPATH**/ ?>