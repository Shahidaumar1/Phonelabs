<div>
    <div class="d-flex">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'repair'])->html();
} elseif ($_instance->childHasBeenRendered('l3349132380-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3349132380-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3349132380-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3349132380-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'repair']);
    $html = $response->html();
    $_instance->logRenderedChild('l3349132380-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.repair.components.top-nav', ['active' => 'devices'])->html();
} elseif ($_instance->childHasBeenRendered('l3349132380-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3349132380-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3349132380-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3349132380-1');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.components.top-nav', ['active' => 'devices']);
    $html = $response->html();
    $_instance->logRenderedChild('l3349132380-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div class="container mt-2">
                    <h3 class = "text-start"><?php echo e($selectedCategory->name ?? ''); ?></h3>
                <div class="d-flex align-items-center gap-4  justify-content-start my-4">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.components.sub-nav', ['items' => $items])->html();
} elseif ($_instance->childHasBeenRendered('l3349132380-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l3349132380-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3349132380-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3349132380-2');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.components.sub-nav', ['items' => $items]);
    $html = $response->html();
    $_instance->logRenderedChild('l3349132380-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    
                </div>
                <div class="d-flex justify-content-center align-items-center gap-4 my-4">
                    <select class="form-select form-control" aria-label="Default select example" wire:model="selectedCatId"
                        style="width:30%">
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                     <?php if($target == 'Publish'): ?>
                    <button class="btn p-2" onclick="showM('add-repair-device')" style="border-radius: 5px; color: white; 
                    background-color: #20375E; pading: 10px">
                       
                        Create New
                    </button>
                    
                     <?php endif; ?>
                     
                </div>
                <div class="d-flex justify-content-center gap-4  flex-wrap pb-5 ">
                    <?php if($target == 'Publish'): ?>
                         <div class="plus-card bg-white">
                   <div class="d-flex align-items-center  justify-content-center my-4">               
                         <img src="https://ik.imagekit.io/4csyk445b/Rectangle%201.png?updatedAt=1712154034586" class="img-fluid" style="height: 130px; width: 200px" />
                    </div>
                              <div class="d-flex align-items-center  justify-content-between p-2">
                        <h4 class="fw-bold">Allow Others</h4>
                        
                            <div class="form-check form-switch">
                                  <input type="checkbox" role="switch" class="form-check-input border border-dark"
                                        <?php if($selectedCategory): ?> wire:change="toggleOthers(<?php echo e($selectedCategory->id); ?>)"
                                        <?php echo e($selectedCategory->others == true ? 'checked' : ''); ?> <?php endif; ?>>
                            </div>
                        
                    </div>
                    </div>

                    <?php endif; ?>
                    <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card  cursor-pointer">
                            
                            <div class="p-2 d-flex justify-content-center align-items-center">
                                
                             <a href="<?php echo e(route('repair-models', $device)); ?>"
                            class="">
                                <img src="<?php echo e($device->file ?? '#'); ?>" class="img-fluid"
                                    style="width: 150px; height:150px;" />
                            </a>     
                            </div>  
                            
                            <div class="p-2 d-flex justify-content-between align-items-center">
                                <div class="p-2">
                                    <h4 class="fw-bold text-center text-dark"><?php echo e($device->name); ?></h4>
                                </div>
                            <!--toggle button -->
                                <div class="form-check form-switch">
                                    <input type="checkbox" role="switch" class="form-check-input border border-dark"
                                        wire:change="toggleStatus(<?php echo e($device->id); ?>)"
                                        <?php echo e($device->status == 'Publish' ? 'checked' : ''); ?>>
                                </div>
                                
                                <!--drop down button -->
                                <div class="dropdown dropend" id="<?php echo e(uniqid()); ?>" wire:ignore>
                                    <button class="btn btn-light dropdown-toggle bg-light border-0" type="button"
                                        id="<?php echo e(uniqid()); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="<?php echo e(uniqid()); ?>">
                                        <li>
                                            <?php if($target != 'Junk'): ?>
                                                <a class="dropdown-item" href="javascirpt:void(0)"
                                                    wire:click="selectDevice('<?php echo e($device->id); ?>')">Edit</a>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($target == 'Junk'): ?>
                                                <a class="dropdown-item"
                                                    wire:click="restore('<?php echo e($device->id); ?>')">Restore</a>
                                            <?php else: ?>
                                                <a class="dropdown-item"
                                                    wire:click="softDelete('<?php echo e($device->id); ?>')">Delete</a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            
                            
                                  
                                
                            </div>
                        </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="d-flex justify-content-center align-items-center">
                               <div>
                                <h3 class="fw-bold text-center " style="color: darkblue">No Records !</h3>
                                <img src="https://ik.imagekit.io/4csyk445b/archivo_de_documento_no_encontrado__b%C3%BAsqueda_sin_resultado_concepto_ilustraci%C3%B3n_dise%C3%B1o_plano_vector_eps10__elemento_gr%C3%A1fico_moderno_para_p%C3%A1gina_de_inicio__interfaz_de_usuario_de_estado_vac%C3%ADo__infograf%202.png?updatedAt=1712404110308" class = "img-fluid" alt="No Recode icon">
                                
                               </div>
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

<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row justify-content-center">

        <div class="col-2  mt-4 ">
            <a href="<?php echo e(route('repair-categories')); ?>" class="text-white item "> Devices</a>
        </div>

        <div class="col-2  mt-4 ">
            <a href="<?php echo e(route('repair-devices')); ?>" class="text-white  item "> Brands</a>
        </div>

        <div class="col-2  mt-4 ">
            <a href="<?php echo e(route('repair-models')); ?>" class="text-white  item "> Models</a>
        </div>

        <div class="col-2 mt-4">
            <a href="<?php echo e(route('repair-price')); ?>"
                    class=" text-white p-3 item ">Repair</a>
        </div>
    </div>
</div>

    </div>
    
    <?php if($selectedCategory): ?>
        <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Device','id' => 'add-repair-device']); ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.device.create', ['category' => $selectedCategory])->html();
} elseif ($_instance->childHasBeenRendered('l3349132380-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l3349132380-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3349132380-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3349132380-3');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.device.create', ['category' => $selectedCategory]);
    $html = $response->html();
    $_instance->logRenderedChild('l3349132380-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6a555649da86b3de44465cdfe004aa4)): ?>
<?php $attributes = $__attributesOriginale6a555649da86b3de44465cdfe004aa4; ?>
<?php unset($__attributesOriginale6a555649da86b3de44465cdfe004aa4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6a555649da86b3de44465cdfe004aa4)): ?>
<?php $component = $__componentOriginale6a555649da86b3de44465cdfe004aa4; ?>
<?php unset($__componentOriginale6a555649da86b3de44465cdfe004aa4); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Device','id' => 'edit-repair-device']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.device.edit', [])->html();
} elseif ($_instance->childHasBeenRendered('l3349132380-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l3349132380-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3349132380-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3349132380-4');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.device.edit', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3349132380-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6a555649da86b3de44465cdfe004aa4)): ?>
<?php $attributes = $__attributesOriginale6a555649da86b3de44465cdfe004aa4; ?>
<?php unset($__attributesOriginale6a555649da86b3de44465cdfe004aa4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6a555649da86b3de44465cdfe004aa4)): ?>
<?php $component = $__componentOriginale6a555649da86b3de44465cdfe004aa4; ?>
<?php unset($__componentOriginale6a555649da86b3de44465cdfe004aa4); ?>
<?php endif; ?>


</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/repair/device/index.blade.php ENDPATH**/ ?>