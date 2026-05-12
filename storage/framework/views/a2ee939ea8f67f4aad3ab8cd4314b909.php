<div>
    <div class="d-flex" style = "background-color: whitesmoke;">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'sell'])->html();
} elseif ($_instance->childHasBeenRendered('l4122765786-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4122765786-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4122765786-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4122765786-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'sell']);
    $html = $response->html();
    $_instance->logRenderedChild('l4122765786-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.sell.components.top-nav', ['active' => 'categories'])->html();
} elseif ($_instance->childHasBeenRendered('l4122765786-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l4122765786-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4122765786-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4122765786-1');
} else {
    $response = \Livewire\Livewire::mount('admin.sell.components.top-nav', ['active' => 'categories']);
    $html = $response->html();
    $_instance->logRenderedChild('l4122765786-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div class="container">
                <div class="mt-5">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.sell.components.sub-nav', ['items' => $items])->html();
} elseif ($_instance->childHasBeenRendered('l4122765786-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l4122765786-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4122765786-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4122765786-2');
} else {
    $response = \Livewire\Livewire::mount('admin.sell.components.sub-nav', ['items' => $items]);
    $html = $response->html();
    $_instance->logRenderedChild('l4122765786-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
                                <div class="d-flex justify-content-end align-items-center ">

                    <?php if($target == 'Publish'): ?>
                    <button class="btn mt-2" onclick="showM('add-sell-cat')" style="border-radius: 5px; color: white; 
                    background-color: #20375E; pading: 10px">
                       
                        Create New
                    </button>
                    
                     <?php endif; ?>

                </div>
                <div>
                    <div class="d-flex mb-5 justify-content-center gap-4  flex-wrap mt-5">
                    
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card rounded-4 border-0 cursor-pointer">
                                <div class = "d-flex justify-content-center align-items-center p-1">
                                <a href="<?php echo e(route('sell-devices', $category)); ?>">
                                    <img src="<?php echo e($category->file ?? '#'); ?>" class="img-fluid"
                                        style="height: 150px; width: 200px" />
                                </a>
                                </div>
                                <div class = "d-flex justify-content-between align-items-center">
                                    <div class="p-2">
                                        <h4 class="fw-bold text-center text-dark"><?php echo e($category->name); ?></h4>
                                    </div>
                                 <div class="form-check form-switch">
                                        <input type="checkbox" role="switch" class="form-check-input"
                                            wire:change="toggleStatus(<?php echo e($category->id); ?>)"
                                            <?php echo e($category->status == 'Publish' ? 'checked' : ''); ?>>
                                    </div>
                                     <div class="dropdown dropend" id="<?php echo e($rand); ?>" wire:ignore>
                                        <button class="btn btn-light dropdown-toggle bg-light border-0" type="button"
                                            id="<?php echo e($rand); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="<?php echo e($rand); ?>">
                                            <li>
                                                <?php if($target != 'Junk'): ?>
                                                    <a class="dropdown-item" href="javascirpt:void(0)"
                                                        wire:click="selectCat('<?php echo e($category->id); ?>')">Edit</a>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <span class="dropdown-item"
                                                    wire:click="addConditionText('<?php echo e($category->id); ?>')">Add Condition Text</span>
                                        </li>
                                            <li>
                                                <?php if($target == 'Junk'): ?>
                                                    <a class="dropdown-item"
                                                        wire:click="restore('<?php echo e($category->id); ?>')">Restore</a>
                                                <?php else: ?>
                                                    <a class="dropdown-item"
                                                        wire:click="softDelete('<?php echo e($category->id); ?>')">Delete</a>
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
            <a href="<?php echo e(route('sell-categories')); ?>" class="text-white item "> Devices</a>
        </div>

        <div class="col-2  mt-4 ">
            <a href="<?php echo e(route('sell-devices')); ?>" class="text-white  item"> Brands</a>
        </div>

        <div class="col-2  mt-4 ">
            <a href="<?php echo e(route('sell-models')); ?>" class="text-white  item "> Models</a>
        </div>

        <div class="col-2 mt-4">
            <a href="<?php echo e(route('sell-models-add-ons')); ?>" class="text-white  item "> Addon</a>
        </div>
    </div>
</div>


    </div>
    
    <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Category','id' => 'add-sell-cat']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.sell.category.create', [])->html();
} elseif ($_instance->childHasBeenRendered('l4122765786-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l4122765786-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4122765786-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4122765786-3');
} else {
    $response = \Livewire\Livewire::mount('admin.sell.category.create', []);
    $html = $response->html();
    $_instance->logRenderedChild('l4122765786-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Condition Text','id' => 'add-condition-text','size' => 'lg']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.sell.category.condition-text', [])->html();
} elseif ($_instance->childHasBeenRendered('l4122765786-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l4122765786-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4122765786-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4122765786-4');
} else {
    $response = \Livewire\Livewire::mount('admin.sell.category.condition-text', []);
    $html = $response->html();
    $_instance->logRenderedChild('l4122765786-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    <?php if($selectedCat): ?>
        <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Category','id' => 'edit-sell-cat']); ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.sell.category.edit', [])->html();
} elseif ($_instance->childHasBeenRendered('l4122765786-5')) {
    $componentId = $_instance->getRenderedChildComponentId('l4122765786-5');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4122765786-5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4122765786-5');
} else {
    $response = \Livewire\Livewire::mount('admin.sell.category.edit', []);
    $html = $response->html();
    $_instance->logRenderedChild('l4122765786-5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/sell/category/index.blade.php ENDPATH**/ ?>