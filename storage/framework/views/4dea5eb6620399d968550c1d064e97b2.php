<div>
    <div class="d-flex">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'buy'])->html();
} elseif ($_instance->childHasBeenRendered('l803452676-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l803452676-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l803452676-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l803452676-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'buy']);
    $html = $response->html();
    $_instance->logRenderedChild('l803452676-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.buy.components.top-nav', ['active' => 'add-ons'])->html();
} elseif ($_instance->childHasBeenRendered('l803452676-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l803452676-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l803452676-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l803452676-1');
} else {
    $response = \Livewire\Livewire::mount('admin.buy.components.top-nav', ['active' => 'add-ons']);
    $html = $response->html();
    $_instance->logRenderedChild('l803452676-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div class="container my-4">

                <?php if(session('image_saved')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('image_saved')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <div class="text-center mb-3">
                    <strong>Select category, device and model to see product specifications with prices.</strong>
                </div>

                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select class="form-select" wire:model="selectedCatId">
                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select class="form-select" wire:model="selectedDeviceId">
                            <option value="null">Select device</option>
                            <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($device->id); ?>"><?php echo e($device->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select class="form-select" wire:model="selectedModelId">
                            <?php if($selectedDeviceId): ?>
                            <option value="null">Select model</option>
                            <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($model->id); ?>"><?php echo e($model->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                        <button class="btn p-3" onclick="showM('add-model-spec')" style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                            Create New
                        </button>
                    </div>
                </div>

                <div>
                    <div style="overflow-x: auto;">
                        <table class="table p-5">
                            <thead>
                                <tr style="background-color: rgb(192, 192, 239);">
                                    <th style="background-color: rgb(192, 192, 239);">#</th>
                                    <th style="background-color: rgb(192, 192, 239);">Image</th>
                                    <th style="background-color: rgb(192, 192, 239);">Memory Size</th>
                                    <th style="background-color: rgb(192, 192, 239);">Grade</th>
                                    <th style="background-color: rgb(192, 192, 239);">Color</th>
                                    <th style="background-color: rgb(192, 192, 239);">Condition</th>
                                    <th style="background-color: rgb(192, 192, 239);">Price</th>
                                    <th style="background-color: rgb(192, 192, 239);">Quantity</th>
                                    <th style="background-color: rgb(192, 192, 239);">IMEI</th>
                                    <th style="background-color: rgb(192, 192, 239);">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $product_specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr>
                                    <th><?php echo e(++$key); ?></th>

                                    <td style="min-width: 140px;">
                                        <?php
                                            $productImages = json_decode($product->image, true);
                                        ?>
                                        <?php if(is_array($productImages) && count($productImages) > 0): ?>
                                            <div class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?> text-center">
                                                        <img src="<?php echo e($image); ?>" class="img-fluid"
                                                             style="max-height: 50px;"
                                                             onerror="this.src='https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png'">
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php elseif(!empty($product->image)): ?>
                                            <img src="<?php echo e($product->image); ?>"
                                                 class="img-fluid" style="max-height: 50px;"
                                                 onerror="this.src='https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png'">
                                        <?php else: ?>
                                            <img src="https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png"
                                                 class="img-fluid" style="max-height: 50px;">
                                        <?php endif; ?>
                                    </td>

                                    <?php if($editableProductSpecId == $product->id): ?>
                                    <td><input style="width:90px; height:30px;" type="text" wire:model.debounce.500="memory_size_edit" placeholder="Memory Size" /></td>
                                    <?php else: ?>
                                    <td><?php echo e($product->memory_size ?? '....'); ?></td>
                                    <?php endif; ?>

                                    <?php if($editableProductSpecId == $product->id): ?>
                                    <td>
                                        <select style="height:30px; font-size:13px;" wire:model="grade_edit">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="A+">A+</option>
                                        </select>
                                    </td>
                                    <?php else: ?>
                                    <td><?php echo e($product->grade); ?></td>
                                    <?php endif; ?>

                                    <?php if($editableProductSpecId == $product->id): ?>
                                    <td><input style="width:80px; height:30px;" type="text" wire:model.debounce.500="color_edit" placeholder="Color" /></td>
                                    <?php else: ?>
                                    <td><?php echo e($product->color); ?></td>
                                    <?php endif; ?>

                                    <?php if($editableProductSpecId == $product->id): ?>
                                    <td>
                                        <select style="height:30px; font-size:13px;" wire:model="condition_edit">
                                            <option value="">-- Select --</option>
                                            <option value="Brand-new">Brand-new</option>
                                            <option value="Excellent">Excellent</option>
                                            <option value="Good">Good</option>
                                            <option value="Fair">Fair</option>
                                            <option value="Poor">Poor</option>
                                            <option value="Faulty">Faulty</option>
                                        </select>
                                    </td>
                                    <?php else: ?>
                                    <td><?php echo e($product->condition ?? '—'); ?></td>
                                    <?php endif; ?>

                                    <?php if($editableProductSpecId == $product->id): ?>
                                    <td>
                                        <input style="width:60px; height:30px;" type="text"
                                               wire:keydown.enter="updateProductPrice('<?php echo e($product->id); ?>')"
                                               wire:model.debounce.500="price"
                                               id="<?php echo e($product->id); ?>" />
                                    </td>
                                    <?php else: ?>
                                    <td wire:click="toggleEditable('<?php echo e($product->id); ?>')">£ <?php echo e($product->price); ?></td>
                                    <?php endif; ?>

                                    <?php if($editableProductSpecId == $product->id): ?>
                                    <td>
                                        <table>
                                            <tr>
                                                <th>Quantity</th>
                                                <td><input type="number" wire:model.debounce.500="quantity" style="width:60px;" /></td>
                                            </tr>
                                            <?php if($selectedCatId == 14): ?>
                                            <tr>
                                                <th>IMEI</th>
                                                <td>
                                                    <?php for($i = 0; $i < $quantity; $i++): ?>
                                                    <input class="mt-1" type="text"
                                                           wire:model.debounce.500="imei.<?php echo e($i); ?>"
                                                           placeholder="IMEI <?php echo e($i + 1); ?>"
                                                           oninput="validateIMEIs()" />
                                                    <?php endfor; ?>
                                                    <div wire:ignore>
                                                        <div id="imeisError" class="text-danger"></div>
                                                        <div id="imeisCount"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="d-flex gap-2 cursor-pointer align-items-center"
                                                         wire:click="updateProductQuantity('<?php echo e($product->id); ?>')">
                                                        <i class="fa fa-plus text-success" style="font-size:20px;" aria-hidden="true"></i>
                                                        <h4 class="fw-bold">Add Quantity</h4>
                                                        <span wire:loading wire:target="updateProductQuantity">saving....</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <?php else: ?>
                                    <td><?php echo e($product->quantity); ?> <span class="btn btn-success" wire:click="toggleEditable('<?php echo e($product->id); ?>')">+</span></td>
                                    <?php endif; ?>

                                    <td>
                                        <?php if($product->imei): ?>
                                            <?php $imeiList = json_decode($product->imei, true); ?>
                                            <?php if(is_array($imeiList) && count($imeiList) >= 1): ?>
                                            <select>
                                                <?php $__currentLoopData = $imeiList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pimei): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option><?php echo e($pimei['status'] ?? $pimei->status ?? ''); ?> : <?php echo e($pimei['imei'] ?? $pimei->imei ?? ''); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php else: ?>
                                            No IMEI available
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true"
                                           wire:click="delete('<?php echo e($product->id); ?>')"></i>
                                        <span class="mx-2"></span>
                                        <i class="fa fa-camera cursor-pointer text-primary me-2" aria-hidden="true"
                                           title="Edit Images"
                                           wire:click="toggleImageEdit('<?php echo e($product->id); ?>')"></i>
                                        <i class="fa fa-ellipsis-v cursor-pointer" aria-hidden="true"
                                           wire:click="editOrUpdateSpec('<?php echo e($product->id); ?>')"></i>
                                    </td>
                                </tr>

                                <?php if($imageEditProductId == $product->id): ?>
                                <tr style="background-color: #f0f4ff;">
                                    <td colspan="10">
                                        <div class="p-3">

                                            <h6 class="fw-bold mb-3" style="color: #20375E;">
                                                <i class="fa fa-image me-2"></i>
                                                Edit Images
                                                <small class="text-muted fw-normal" style="font-size:12px;">
                                                    (Remove existing or upload new, then Save)
                                                </small>
                                            </h6>

                                            <div class="row">

                                                <div class="col-md-6 mb-3">
                                                    <p class="fw-semibold mb-2" style="font-size:13px;">Current Images</p>
                                                    <?php if(!empty($existing_images)): ?>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <?php $__currentLoopData = $existing_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $imgUrl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="position-relative" style="display:inline-block;">
                                                                <img src="<?php echo e($imgUrl); ?>"
                                                                     style="width:75px; height:75px; object-fit:cover; border:2px solid #aaa; border-radius:8px;"
                                                                     onerror="this.src='https://via.placeholder.com/75x75?text=Error'">
                                                                <button type="button"
                                                                        wire:click="removeExistingImage(<?php echo e($idx); ?>)"
                                                                        style="position:absolute; top:-8px; right:-8px; background:red; color:white; border:none; border-radius:50%; width:22px; height:22px; font-size:14px; line-height:1; cursor:pointer;">
                                                                    &times;
                                                                </button>
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <p class="text-muted" style="font-size:12px;">No images currently.</p>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <p class="fw-semibold mb-2" style="font-size:13px;">Add New Images</p>

                                                    <div wire:ignore>
                                                        <input type="file"
                                                               id="imgInput_<?php echo e($product->id); ?>"
                                                               multiple
                                                               accept="image/jpeg,image/png,image/webp,image/gif"
                                                               class="form-control form-control-sm"
                                                               style="max-width:300px;"
                                                               onchange="previewAndSendImages(this, '<?php echo e($product->id); ?>')">
                                                    </div>

                                                    <div id="newImgPreview_<?php echo e($product->id); ?>" class="d-flex flex-wrap gap-2 mt-2"></div>

                                                    <?php if(!empty($new_image_previews)): ?>
                                                    <small class="text-success d-block mt-1">
                                                        <?php echo e(count($new_image_previews)); ?> new image(s) ready to save
                                                    </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2 mt-1">
                                                <button type="button"
                                                        class="btn btn-sm px-4 text-white"
                                                        style="background-color:#20375E; border-radius:8px;"
                                                        wire:click="saveImages('<?php echo e($product->id); ?>')">
                                                    <span wire:loading wire:target="saveImages">
                                                        <i class="fa fa-spinner fa-spin"></i> Saving...
                                                    </span>
                                                    <span wire:loading.remove wire:target="saveImages">
                                                        <i class="fa fa-save me-1"></i> Save Images
                                                    </span>
                                                </button>

                                                <button type="button"
                                                        class="btn btn-sm btn-outline-secondary px-4"
                                                        style="border-radius:8px;"
                                                        wire:click="cancelImageEdit">
                                                    Cancel
                                                </button>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="10" class="text-center">Record Not Found!</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
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

    <?php if($selectedModel): ?>
    <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Specification','id' => 'add-model-spec','size' => 'xl']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.buy.addon.add-spec', ['model' => $selectedModelId])->html();
} elseif ($_instance->childHasBeenRendered('l803452676-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l803452676-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l803452676-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l803452676-2');
} else {
    $response = \Livewire\Livewire::mount('admin.buy.addon.add-spec', ['model' => $selectedModelId]);
    $html = $response->html();
    $_instance->logRenderedChild('l803452676-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

    <?php if($selectedModel): ?>
    <?php if (isset($component)) { $__componentOriginale6a555649da86b3de44465cdfe004aa4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a555649da86b3de44465cdfe004aa4 = $attributes; } ?>
<?php $component = App\View\Components\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Specifications Detail','id' => 'add-model-more-spec','size' => 'xl']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.buy.addon.more-spec', ['model' => $selectedModelId])->html();
} elseif ($_instance->childHasBeenRendered('l803452676-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l803452676-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l803452676-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l803452676-3');
} else {
    $response = \Livewire\Livewire::mount('admin.buy.addon.more-spec', ['model' => $selectedModelId]);
    $html = $response->html();
    $_instance->logRenderedChild('l803452676-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

<script>
    function previewAndSendImages(input, productId) {
        const files = Array.from(input.files);
        if (!files.length) return;

        const previewArea = document.getElementById('newImgPreview_' + productId);
        previewArea.innerHTML = '';

        const promises = files.map(file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = e => {
                const wrapper = document.createElement('div');
                wrapper.innerHTML = `
                    <img src="${e.target.result}"
                         style="width:65px; height:65px; object-fit:cover; border:2px solid #20375E; border-radius:6px;"
                         title="${file.name}">`;
                previewArea.appendChild(wrapper);

                // Clean base64 - remove prefix
                const base64String = e.target.result.split(',')[1];

                resolve({
                    name: file.name,
                    type: file.type,
                    data: base64String
                });
            };
            reader.onerror = () => reject('Error reading file');
            reader.readAsDataURL(file);
        }));

        Promise.all(promises).then(filesData => {
            window.livewire.find('<?php echo e($_instance->id); ?>').call('receiveNewImages', filesData);
        }).catch(err => {
            console.error('Upload error:', err);
        });
    }

    function validateIMEIs() {
        const imeisInput = document.querySelectorAll('input[type="text"][placeholder^="IMEI"]');
        const imeisError = document.getElementById("imeisError");
        const imeisCount = document.getElementById("imeisCount");
        let isValid = true, errorMessage = "";

        imeisInput.forEach(input => {
            const imei = input.value.trim();
            if (imei.length !== 15 || isNaN(imei)) {
                isValid = false;
                errorMessage += "IMEI must be exactly 15 digits\n";
            } else if (!isValidIMEI(imei)) {
                isValid = false;
                errorMessage += "IMEI is not valid\n";
            }
        });

        imeisError.textContent = isValid ? "" : errorMessage;
        imeisCount.textContent = isValid ? "Valid IMEI" : "";
    }

    function isValidIMEI(imei) {
        imei = imei.replace(/[^0-9]/g, '');
        if (!/^\d{15}$/.test(imei)) return false;
        const rev = imei.split('').reverse().join('');
        let sum = 0;
        for (let i = 0; i < 15; i++) {
            let n = parseInt(rev[i]);
            if (i % 2 === 1) { n *= 2; if (n > 9) n -= 9; }
            sum += n;
        }
        return sum % 10 === 0;
    }
</script><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/buy/addon/index.blade.php ENDPATH**/ ?>