<div>
    <div>
        <div class="d-flex">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'repair'])->html();
} elseif ($_instance->childHasBeenRendered('l1632697122-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1632697122-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1632697122-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1632697122-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'repair']);
    $html = $response->html();
    $_instance->logRenderedChild('l1632697122-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.repair.components.top-nav', ['active' => 'price'])->html();
} elseif ($_instance->childHasBeenRendered('l1632697122-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1632697122-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1632697122-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1632697122-1');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.components.top-nav', ['active' => 'price']);
    $html = $response->html();
    $_instance->logRenderedChild('l1632697122-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <div class="container">
                    <div class="text-center my-3">
                        <h3>Select category, device, and model to see product specifications with prices.</h3>
                    </div>

                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                            <a href="<?php echo e(route('repair-master-type')); ?>">
                                <button class="btn p-3" style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                                    Master Repairs
                                </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" aria-label="Default select example" wire:model="selectedCatId">
                                <option disabled selected>Select Category</option>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option>No Categories Available</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" aria-label="Default select example" wire:model="selectedDeviceId">
                                <option disabled selected>Select device</option>
                                <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($device->id); ?>"><?php echo e($device->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option>No Devices Available</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                            <button class="btn p-3" onclick="showM('add-new-repair')" style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                                Add New Repair
                            </button>
                        </div>
                    </div>

                    <div style="overflow-x: auto; max-height: 600px; overflow-y: auto;">
                        <div id="wrap">
                            <div class="container">
                                <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

                                <table class="table table-striped table-bordered" id="table_id">
                                    <thead>
                                        <?php if($selectedDevice): ?>
                                            <tr wire:sortable="updateTaskOrder">
                                                <th style="position: sticky; top: 0; left: 0; background-color: white; z-index: 20;">
                                                    <?php echo e($selectedDevice->name); ?>

                                                </th>

                                                <?php $__currentLoopData = $selectedDevice->repair_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td
                                                        style="position: sticky; top: 0; background-color: white; z-index: 10;"
                                                        wire:sortable.item="<?php echo e($repair_type->id); ?>"
                                                        wire:key="repair-<?php echo e($repair_type->id); ?>"
                                                    >
                                                        <div class="d-flex justify-content-between align-items-center gap-2">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <span class="fas fa-arrows-alt"
                                                                      style="cursor: grab;"
                                                                      wire:sortable.handle></span>
                                                                <span><?php echo e($repair_type->name); ?></span>
                                                            </div>

                                                            <button
                                                                type="button"
                                                                class="btn btn-sm btn-outline-danger"
                                                                title="Remove from this device"
                                                                onclick="if(!confirm('Remove this repair from this device?')){ event.preventDefault(); event.stopImmediatePropagation(); }"
                                                                wire:click.stop="removeRepairType(<?php echo e($repair_type->id); ?>)"
                                                            >
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <th style="position: sticky; top: 0; background-color: white; z-index: 10;">Status</th>
                                            </tr>
                                        <?php endif; ?>
                                    </thead>

                                    <tbody wire:sortable="updateModelOrder">
                                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr wire:sortable.item="<?php echo e($model->id); ?>" wire:key="model-<?php echo e($model->id); ?>" style="cursor: move;">
                                                <td wire:sortable.handle style="position: sticky; left: 0; background-color: white; z-index: 5;">
                                                    <div class="d-flex align-items-center">
                                                        <span class="fas fa-grip-vertical me-2" style="cursor: grab;"></span>
                                                        <?php echo e($model->name); ?>

                                                    </div>
                                                </td>

                                                <?php $__currentLoopData = $selectedDevice->repair_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repairType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($price = $model->prices->where('repair_type_id', $repairType->id)->first()): ?>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1">

                                                                
                                                                <div id="price-wrap-<?php echo e($price->id); ?>">
                                                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('repair.components.price-edit', ['price' => $price])->html();
} elseif ($_instance->childHasBeenRendered(uniqid())) {
    $componentId = $_instance->getRenderedChildComponentId(uniqid());
    $componentTag = $_instance->getRenderedChildComponentTagName(uniqid());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(uniqid());
} else {
    $response = \Livewire\Livewire::mount('repair.components.price-edit', ['price' => $price]);
    $html = $response->html();
    $_instance->logRenderedChild(uniqid(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                                </div>

                                                                
                                                                <span
                                                                    class="pencil-icon"
                                                                    onclick="focusPriceInput(<?php echo e($price->id); ?>)"
                                                                    title="Edit price"
                                                                >✎</span>

                                                                
                                                                <div class="dropdown">
                                                                    <span
                                                                        class="dropdown-arrow"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false"
                                                                        title="Quick set"
                                                                    >▾</span>
                                                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="min-width: 155px; font-size: 0.85rem;">
                                                                        <li>
                                                                            <button class="dropdown-item d-flex align-items-center gap-2" type="button" wire:click="setHide(<?php echo e($price->id); ?>)">
                                                                                <i class="fas fa-eye-slash text-muted" style="width:14px;"></i>
                                                                                <span>Hide</span>
                                                                                <small class="ms-auto text-muted">£0.00</small>
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <button class="dropdown-item d-flex align-items-center gap-2" type="button" wire:click="setAskQuote(<?php echo e($price->id); ?>)">
                                                                                <i class="fas fa-comment-dots text-info" style="width:14px;"></i>
                                                                                <span>Ask a Quote</span>
                                                                                <small class="ms-auto text-muted">£0.01</small>
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <button class="dropdown-item d-flex align-items-center gap-2" type="button" wire:click="setFreeRepair(<?php echo e($price->id); ?>)">
                                                                                <i class="fas fa-gift text-success" style="width:14px;"></i>
                                                                                <span>Free Repair</span>
                                                                                <small class="ms-auto text-muted">£0.02</small>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>....</td>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <td><?php echo e($model->status); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

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

            <div class="button-sticky container bg-blue d-lg-none d-md-none">
                <div class="row justify-content-center">
                    <div class="col-2 mt-4">
                        <a href="<?php echo e(route('repair-categories')); ?>" class="text-white item">Devices</a>
                    </div>
                    <div class="col-2 mt-4">
                        <a href="<?php echo e(route('repair-devices')); ?>" class="text-white item">Brands</a>
                    </div>
                    <div class="col-2 mt-4">
                        <a href="<?php echo e(route('repair-models')); ?>" class="text-white item">Models</a>
                    </div>
                    <div class="col-2 mt-4">
                        <a href="<?php echo e(route('repair-price')); ?>" class="text-white item">Repair</a>
                    </div>
                </div>
            </div>

        </div>

        <?php if($selectedDevice): ?>
            <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Model','id' => 'add-new-repair','size' => 'xl']); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.repair-price.create', ['device' => $selectedDevice])->html();
} elseif ($_instance->childHasBeenRendered('l1632697122-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l1632697122-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1632697122-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1632697122-3');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.repair-price.create', ['device' => $selectedDevice]);
    $html = $response->html();
    $_instance->logRenderedChild('l1632697122-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php $component->withAttributes(['title' => 'Edit Model','id' => 'edit-repair-model']); ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.model.edit', [])->html();
} elseif ($_instance->childHasBeenRendered('l1632697122-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l1632697122-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1632697122-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1632697122-4');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.model.edit', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1632697122-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

    <style>
        [wire\:sortable\.item] { transition: transform 0.2s ease; }
        [wire\:sortable\.item].sortable-ghost { opacity: 0.5; background-color: #f8f9fa; }
        [wire\:sortable\.item].sortable-drag { opacity: 0.9; background-color: #e3f2fd; box-shadow: 0 5px 15px rgba(0,0,0,0.3); }
        tbody tr:hover { background-color: #f8f9fa; }
        .fa-grip-vertical { color: #6c757d; }
        .fa-grip-vertical:hover { color: #20375E; }

        .pencil-icon {
            cursor: pointer;
            font-size: 1rem;
            color: #20375E;
            line-height: 1;
            user-select: none;
            padding: 0 2px;
        }
        .pencil-icon:hover { opacity: 0.6; }

        .dropdown-arrow {
            cursor: pointer;
            font-size: 0.75rem;
            color: #6c757d;
            user-select: none;
            padding: 0 2px;
        }
        .dropdown-arrow:hover { color: #20375E; }

        .dropdown-menu li + li { border-top: 1px solid #f0f0f0; }
        .dropdown-toggle::after { display: none !important; }
    </style>

    <script>
        function focusPriceInput(priceId) {
            const wrapper = document.getElementById('price-wrap-' + priceId);
            if (!wrapper) return;

            // 1. Try visible input
            const input = wrapper.querySelector('input[type="number"], input[type="text"], input:not([type="hidden"])');
            if (input) {
                input.focus();
                input.select();
                return;
            }

            // 2. Click the span/element that toggles edit mode in price-edit component
            const clickable = wrapper.querySelector('span, [wire\\:click]');
            if (clickable) {
                clickable.click();
                setTimeout(() => {
                    const inp = wrapper.querySelector('input');
                    if (inp) { inp.focus(); inp.select(); }
                }, 50);
            }
        }
    </script>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/repair/repair-price/index.blade.php ENDPATH**/ ?>