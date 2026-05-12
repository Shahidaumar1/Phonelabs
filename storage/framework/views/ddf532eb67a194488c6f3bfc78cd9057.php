<div>
    <div class="d-flex">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings'])->html();
} elseif ($_instance->childHasBeenRendered('l829309533-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l829309533-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l829309533-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l829309533-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings']);
    $html = $response->html();
    $_instance->logRenderedChild('l829309533-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'branches'])->html();
} elseif ($_instance->childHasBeenRendered('l829309533-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l829309533-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l829309533-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l829309533-1');
} else {
    $response = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'branches']);
    $html = $response->html();
    $_instance->logRenderedChild('l829309533-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            
            <div class="container my-5">
                <div>
                    <?php if(session()->has('message')): ?>
                    <h3 class="alert alert-success"><?php echo e(session('message')); ?></h3>
                    <?php endif; ?>

                    <div class="">
                        <div class="">
                            <h4 class="text-black">
                                <b>Registered Branches</b>
                                
                            </h4>
                                <a href="<?php echo e(route('create-branches')); ?>" class="btn btn-primary float-end" style = "border-radius: 10px; color: white; background-color: #20375E; padding: 15px; border:0px;">Create new</a>
                        </div>
                        <div class="card-body">
                            <div class =  "d-flex justify-content-center" >
                                <input type="text" wire:model="search" class="form-control mb-4" placeholder="Search..." style="width: 130px; min-width: 200px;">
                            </div>
                                
                            </div>
                                
                            <div class=" flex-wrap table-responive  "style="overflow-x: auto;" >
                                <!-- Search Input -->

                                <table class="table   p-5  " >
                                    <thead>
                                        <tr style = "background-color: rgb(192, 192, 239);">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Town/City</th>
                                            <th>Post Code</th>
                                            <th>Mobile Number</th>
                                            <th>Landline Number</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="table-row">
                                            <th><?php echo e(++$key); ?></th>
                                            <td><?php echo e($branch->name); ?></td>
                                            <td><?php echo e($branch->address_line_1); ?></td>
                                            <td><?php echo e($branch->town_city); ?></td>
                                            <td><?php echo e($branch->post_code); ?></td>
                                            <td><?php echo e($branch->mobile_number); ?></td>
                                            <td><?php echo e($branch->landline_number); ?></td>
                                            <td><?php echo e($branch->email); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('edit-branches', $branch->id)); ?>">
                                                    <i class="fa fa-edit text-success cursor-pointer" aria-hidden="true"></i>
                                                </a>
                                                <span class="me-2"></span>
                                                <!--<i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true" wire:click="confirmDelete(<?php echo e($branch->id); ?>)"></i>-->
 <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true" wire:click="deleteBranch(<?php echo e($branch->id); ?>)"></i>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="9">Record Not Found!</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
            <!----------------------------- footer-------------------------->

<style>
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
    margin-right: 5px; /* Adjust this value to set the desired gap */
}



</style>
<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row ">

        <div class="col-2  mt-4 ml-1">
            <a href="<?php echo e(route('payment-methods-settings')); ?>" class="text-white item "> Payment</a>
     
     
        </div>

        <div class="col-2  mt-4 ">
            <a href="<?php echo e(route('site-settings')); ?>" class="text-white  item "> site-settings</a>
        
        </div>

        <div class="col-2  mt-4 ">
            <a href="<?php echo e(route('branches-settings')); ?>" class="text-white  item "> Branches</a>
        </div>

        <div class="col-2 mt-4">
            <a href="<?php echo e(route('create-branches')); ?>" class="text-white  item ">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('services-settings')); ?>" class="text-white  item ">Services</a>
        </div>
    </div>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/settings/branches/index.blade.php ENDPATH**/ ?>