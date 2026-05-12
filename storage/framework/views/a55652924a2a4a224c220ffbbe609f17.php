<div>
    <div class="d-flex">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'repair'])->html();
} elseif ($_instance->childHasBeenRendered('l2856533671-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2856533671-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2856533671-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2856533671-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'repair']);
    $html = $response->html();
    $_instance->logRenderedChild('l2856533671-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.repair.components.top-nav', ['active' => 'models'])->html();
} elseif ($_instance->childHasBeenRendered('l2856533671-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2856533671-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2856533671-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2856533671-1');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.components.top-nav', ['active' => 'models']);
    $html = $response->html();
    $_instance->logRenderedChild('l2856533671-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div class="container">

                <!-- Category and Device Select Dropdown -->
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <select aria-label="Select Device Category" wire:model="selectedCatId" style="width:130px">
                        <option value="">Select Device</option>
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>

                    <select aria-label="Select Brand" wire:model="selectedDeviceId" style="width:130px">
                        <option value="">Select Brand</option>
                        <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($device->id); ?>"><?php echo e($device->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Sub Nav -->
                <div class="d-flex align-items-center gap-4 justify-content-center my-4">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.components.sub-nav', ['items' => $items])->html();
} elseif ($_instance->childHasBeenRendered('l2856533671-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2856533671-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2856533671-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2856533671-2');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.components.sub-nav', ['items' => $items]);
    $html = $response->html();
    $_instance->logRenderedChild('l2856533671-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>

                <!-- View Switch + Create Button -->
                <div class="d-flex justify-content-center gap-2 pt-1 pb-3 align-items-center">
                    <div class="d-flex gap-2">
                        <i class="fa fa-square cursor-pointer <?php echo e($activeView == 'card' ? 'text-success' : ''); ?>"
                           aria-hidden="true" wire:click="activateView('card')"></i>

                        <i class="fa fa-list cursor-pointer <?php echo e($activeView == 'list' ? 'text-success' : ''); ?>"
                           aria-hidden="true" wire:click="activateView('list')"></i>
                    </div>

                    <?php if($target == 'Publish'): ?>
                        <button class="btn mt-2"
                                onclick="showM('add-repair-model')"
                                style="border-radius: 5px; color: white; background-color: #20375E; padding: 10px">
                            Create New
                        </button>
                    <?php endif; ?>
                </div>

                
                <?php if($activeView == 'card'): ?>
                    <div>
                        <div class="d-flex justify-content-center gap-4 flex-wrap pb-5 sortable">
                            <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="card border-0 rounded-4 cursor-pointer"
                                     data-id="<?php echo e($model->id); ?>"
                                     style="width:280px;">

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <small class="text-center pt-2" style="color:#20375E;">
                                            Width: 500px Height: 700px
                                        </small>

                                        <div class="dropdown dropend" wire:ignore>
                                            <button class="btn btn-light dropdown-toggle border-0"
                                                    type="button"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <?php if($target != 'Junk'): ?>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="selectModel('<?php echo e($model->id); ?>')">Edit</a>
                                                    <?php endif; ?>
                                                </li>

                                                <li>
                                                    <?php if($target != 'Junk'): ?>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="setTopRated('<?php echo e($model->id); ?>')">
                                                            <?php echo e($model->top_rated ? 'Unset Top Rated' : 'Set Top Rated'); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </li>

                                                <li>
                                                    <?php if($target != 'Junk'): ?>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="setNewArrival('<?php echo e($model->id); ?>')">
                                                            <?php echo e($model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival'); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </li>

                                                <li>
                                                    <?php if($target == 'Junk'): ?>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="restore('<?php echo e($model->id); ?>')">Restore</a>
                                                    <?php else: ?>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                           wire:click="softDelete('<?php echo e($model->id); ?>')">Delete</a>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <a href="#"
                                       class="d-flex justify-content-center flex-column align-items-center position-relative">
                                        <img src="<?php echo e($model->file ?? '#'); ?>" class="img-fluid" style="height: 100px" />
                                    </a>

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <div class="p-2">
                                            <div class="position-absolute bg-light rounded p-1" style="right:2px; top:2px;">
                                                <strong><?php echo e($model->price); ?></strong>
                                            </div>

                                            <div style="width:140px">
                                                <h4 class="fw-bold text-center text-dark"><?php echo e($model->name); ?></h4>
                                            </div>
                                        </div>

                                        <?php if($target != 'Junk'): ?>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" role="switch"
                                                       class="form-check-input"
                                                       wire:change="toggleStatus(<?php echo e($model->id); ?>)"
                                                       <?php echo e($model->status == 'Publish' ? 'checked' : ''); ?>>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    
                                    <div class="px-3 pb-2">
                                        <label class="form-label mb-1">Protector Price</label>
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               wire:model.defer="protectorPrice.<?php echo e($model->id); ?>"
                                               placeholder="Protector price">

                                        <label class="form-label mb-1 mt-2">Cover Price</label>
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               wire:model.defer="coverPrice.<?php echo e($model->id); ?>"
                                               placeholder="Cover price">
                                    </div>

                                    
                                    <div class="px-3 pb-2 d-flex gap-3 align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="protector_<?php echo e($model->id); ?>"
                                                   wire:model="protectorSelected.<?php echo e($model->id); ?>">
                                            <label class="form-check-label" for="protector_<?php echo e($model->id); ?>">Protector</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="cover_<?php echo e($model->id); ?>"
                                                   wire:model="coverSelected.<?php echo e($model->id); ?>">
                                            <label class="form-check-label" for="cover_<?php echo e($model->id); ?>">Cover</label>
                                        </div>
                                    </div>

                                    
                                    <div class="px-3 pb-2">
                                        <button class="btn btn-primary btn-sm w-100"
                                                wire:click="saveModelExtras(<?php echo e($model->id); ?>)">
                                            Save This Model
                                        </button>
                                    </div>

                                    <div class="px-3 pb-3">
                                        <strong>Total Price: <?php echo e($this->getTotalFor($model->id)); ?></strong>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <h3 class="fw-bold text-center" style="color: darkblue">No Records!</h3>
                                        <img src="https://ik.imagekit.io/4csyk445b/no_records_found_image.png"
                                             class="img-fluid" alt="No Record icon">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
                        <script>
                            document.addEventListener('livewire:load', function() {
                                var el = document.querySelector('.sortable');
                                if (!el) return;

                                Sortable.create(el, {
                                    animation: 150,
                                    onEnd: function(evt) {
                                        var order = Array.from(el.children).map(function(child) {
                                            return child.getAttribute('data-id');
                                        });
                                        window.livewire.find('<?php echo e($_instance->id); ?>').call('updateOrder', order);
                                    },
                                });
                            });
                        </script>
                    </div>
                <?php endif; ?>

                
                <?php if($activeView == 'list'): ?>
                    <div>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex gap-2 cursor-pointer" onclick="showM('add-repair-model')">
                                <i class="fa fa-plus text-success" style="font-size:20px;" aria-hidden="true"></i>
                                <h4 class="fw-bold">Create new</h4>
                            </div>
                        </div>

                        <br>

                        <div class="d-flex justify-content-center gap-4 flex-wrap">
                            <table class="table mx-auto p-5">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th scope="row"><?php echo e($model->id); ?></th>
                                            <td><?php echo e($model->name); ?></td>
                                            <td><img src="<?php echo e($model->file ?? '#'); ?>" style="width: 2rem" /></td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" role="switch" class="form-check-input"
                                                           wire:change="toggleStatus(<?php echo e($model->id); ?>)"
                                                           <?php echo e($model->status == 'Publish' ? 'checked' : ''); ?>

                                                           <?php echo e($target == 'Junk' ? 'disabled' : ''); ?>>
                                                </div>
                                            </td>
                                            <td class="cursor-pointer">
                                                <div class="dropdown dropend" wire:ignore>
                                                    <button class="btn btn-light dropdown-toggle bg-light border-0"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <?php if($target != 'Junk'): ?>
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="selectModel('<?php echo e($model->id); ?>')">Edit</a>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <?php if($target != 'Junk'): ?>
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="setTopRated('<?php echo e($model->id); ?>')">
                                                                    <?php echo e($model->top_rated ? 'Unset Top Rated' : 'Set Top Rated'); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <?php if($target != 'Junk'): ?>
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="setNewArrival('<?php echo e($model->id); ?>')">
                                                                    <?php echo e($model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival'); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <?php if($target == 'Junk'): ?>
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="restore('<?php echo e($model->id); ?>')">Restore</a>
                                                            <?php else: ?>
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   wire:click="softDelete('<?php echo e($model->id); ?>')">Delete</a>
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr><td colspan="6">Record Not Found!</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>

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

    
    <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Model','id' => 'add-repair-model']); ?>
        <?php if($selectedDevice): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.model.create', ['device' => $selectedDevice])->html();
} elseif ($_instance->childHasBeenRendered('create-'.$selectedDeviceId)) {
    $componentId = $_instance->getRenderedChildComponentId('create-'.$selectedDeviceId);
    $componentTag = $_instance->getRenderedChildComponentTagName('create-'.$selectedDeviceId);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('create-'.$selectedDeviceId);
} else {
    $response = \Livewire\Livewire::mount('admin.repair.model.create', ['device' => $selectedDevice]);
    $html = $response->html();
    $_instance->logRenderedChild('create-'.$selectedDeviceId, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php else: ?>
            <div class="p-3">
                <h5 class="mb-0">Please select Brand first.</h5>
            </div>
        <?php endif; ?>
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
<?php $component->withAttributes(['title' => 'Edit Model','id' => 'edit-repair-model']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.repair.model.edit', [])->html();
} elseif ($_instance->childHasBeenRendered('l2856533671-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l2856533671-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2856533671-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2856533671-4');
} else {
    $response = \Livewire\Livewire::mount('admin.repair.model.edit', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2856533671-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/repair/model/index.blade.php ENDPATH**/ ?>