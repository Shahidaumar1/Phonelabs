<div>
    <div class="d-flex">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'accessories'])->html();
} elseif ($_instance->childHasBeenRendered('l3184506425-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3184506425-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3184506425-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3184506425-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'accessories']);
    $html = $response->html();
    $_instance->logRenderedChild('l3184506425-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.accessories.components.top-nav', ['active' => 'add-ons'])->html();
} elseif ($_instance->childHasBeenRendered('l3184506425-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3184506425-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3184506425-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3184506425-1');
} else {
    $response = \Livewire\Livewire::mount('admin.accessories.components.top-nav', ['active' => 'add-ons']);
    $html = $response->html();
    $_instance->logRenderedChild('l3184506425-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div class="container my-4">
                <div class="text-center mb-3">
                   <h3>Select categeory,device and model to seee product specifications with
                        prices.
                   </h3>
                </div>
                
                
               <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" aria-label="Default select example" wire:model="selectedCatId">
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" aria-label="Default select example" wire:model="selectedDeviceId">
                                <option value="null">Select device</option>
                                <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($device->id); ?>"><?php echo e($device->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" aria-label="Default select example" wire:model="selectedModelId">
                                <?php if($selectedDeviceId): ?>
                                <option value="null">Select model</option>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($model->id); ?>"><?php echo e($model->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3 d-flex gap-2 cursor-pointer justify-content-center align-items-center">
                            
                                 <div class=" d-flex gap-2 cursor-pointer mt-3" wire:click="$emit('showM', 'add-model-spec')">
                                 <button class="btn p-3"  style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px"> 
                                 Create New
                                </button>
                             </a>
                              
                      
                          
                           
                        </div>
                </div>


                </div>


                <div>

                    <div class="d-flex  gap-4  flex-wrap table-responive y " style="overflow-x: auto;">


                        <table class="table   p-5 shadow">
                            <thead>
                                <tr style= "background-color: rgb(192, 192, 239);">
                                    <th style= "background-color: rgb(192, 192, 239);">#</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Image</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Category</th>
                                    <!--<th style= "background-color: rgb(192, 192, 239);">Manufacturers</th>-->
                                    <th style= "background-color: rgb(192, 192, 239);">Color</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Price</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Quantity</th>
                                    <th style= "background-color: rgb(192, 192, 239);">imei</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__empty_1 = true; $__currentLoopData = $product_specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th><?php echo e(++$key); ?></th>
                                    <td style="min-width: 140px;">
                                        <?php if(json_decode($product->image) === null): ?>
                                        <!-- Display single image -->
                                        <img src="<?php echo e($product->image ?? 'https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png'); ?>" class="img-fluid" style="max-height: 50px;">
                                        <?php else: ?>
                                        <!-- Display image slider for multiple images -->
                                        <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php $__currentLoopData = json_decode($product->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?> text-center">
                                                    <img src="<?php echo e($image); ?>" class="img-fluid" style="max-height: 50px;" alt="Image <?php echo e($index + 1); ?>">
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </td>

                                    <!--<td><?php echo e($product->memory_size ?? '....'); ?></td>-->
                                    <td><?php echo e($product->memory_size ?? '....'); ?></td>

                                    <!--<td><?php echo e($product->spec_category ?? $product->memory_size ?? '....'); ?></td>-->

                                    <!--<td><?php echo e($product->grade); ?></td>-->
                                    <td><?php echo e($product->color); ?></td>
                                    <?php if($editableProductSpecId == $product->id): ?>
                                    <td><input style="width:30px; height:30px;" type="text" wire:keydown.enter="updateProductPrice('<?php echo e($product->id); ?>')" wire:model.debounce.500="price" id="<?php echo e($product->id); ?>" /></td>
                                    <?php else: ?>
                                    <td wire:click="toggleEditable('<?php echo e($product->id); ?>')">£
                                        <?php echo e($product->price); ?>

                                    </td>
                                    <?php endif; ?>
                                    <?php if($editableProductSpecId == $product->id): ?>

                                    <td>
                                <tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td><input type="number" wire:model.debounce.500="quantity" /></td>
                                    <?php if($selectedCatId==14): ?>
                                </tr>
                                <tr>
                                    <th>IMEI </th>
                                    <td>
                                        <?php for($i = 0; $i
                                        < $quantity; $i++): ?> <input class="mt-1" type="text" wire:model.debounce.500="imei.<?php echo e($i); ?>" placeholder="IMEI <?php echo e($i + 1); ?>" oninput="validateIMEIs()" />
                                        <?php endfor; ?>
                                        <div wire:ignore>
                                            <div id="imeisError" class="text-danger"></div>
                                            <div id="imeisCount"></div>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="d-flex gap-2 cursor-pointer align-items-center" wire:click="updateProductQuantity('<?php echo e($product->id); ?>')">
                                            <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
                                            <h4 class="fw-bold">Add Quantity</h4>
                                            <span wire:loading wire:target="updateProductQuantity">saving....</span>
                                        </div>
                                    </td>
                                </tr>
                                </td>
                                <?php endif; ?>
                                </tr>
                                <?php else: ?>
                                <td> <?php echo e($product->quantity); ?> <span class="btn btn-success" wire:click="toggleEditable('<?php echo e($product->id); ?>')">+</span>
                                </td>
                                <?php endif; ?>
                                <td>
                                    <?php if($product->imei): ?>
                                    <?php if(count(json_decode($product->imei))>=1): ?>
                                    <select>

                                        <?php $__currentLoopData = json_decode($product->imei); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pimei): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class=""><?php echo e($pimei->status); ?> : <?php echo e($pimei->imei); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!-- <option class="bg-danger">Sold : 123456789012345</option> -->

                                    </select>

                                    <?php else: ?>
                                    No IMEI available
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true" wire:click="delete('<?php echo e($product->id); ?>')"></i>
                                    <span class="mx-2"></span>
                                    <i class="fa fa-ellipsis-v cursor-pointer" aria-hidden="true" wire:click="editOrUpdateSpec('<?php echo e($product->id); ?>')"></i>

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
            overflow-x: auto;
            width:100;
        }

        .home-btn:hover {
            color: orange;
        }

        .button-sticky .col-2 {
            margin-right: 10px;
            /* Adjust this value to set the desired gap */
        }

        .button-sticky .col-2:last-child {
            margin-right: 0;
            /* Remove margin from the last button to prevent extra space */
        }
        </style>

        <div class="button-sticky container bg-blue d-lg-none d-md-none">
            <div class="row justify-content-center">

                <div class="col-2  mt-4 ">
                    <a href="<?php echo e(route('accessories-categories')); ?>" class="text-white item "> Brands</a>
                </div>

                <div class="col-2  mt-4 ">
                    <a href="<?php echo e(route('accessories-devices')); ?>" class="text-white "> Models</a>
                </div>

                <div class="col-3  mt-4 ">
                    <a href="<?php echo e(route('accessories-models')); ?>" class="text-white  item "> Accessories</a>
                </div>

                <div class="col-3 mt-4">
                    <a href="<?php echo e(route('accessories-models-add-ons')); ?>" class="text-white  item "> Variations</a>
                </div>
            </div>
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
    $html = \Livewire\Livewire::mount('admin.accessories.addon.add-spec', ['model' => $selectedModelId])->html();
} elseif ($_instance->childHasBeenRendered('l3184506425-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l3184506425-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3184506425-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3184506425-2');
} else {
    $response = \Livewire\Livewire::mount('admin.accessories.addon.add-spec', ['model' => $selectedModelId]);
    $html = $response->html();
    $_instance->logRenderedChild('l3184506425-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php $component->withAttributes(['title' => 'Add Specfications Detail','id' => 'add-model-more-spec','size' => 'xl']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.accessories.addon.more-spec', ['model' => $selectedModelId])->html();
} elseif ($_instance->childHasBeenRendered('l3184506425-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l3184506425-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3184506425-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3184506425-3');
} else {
    $response = \Livewire\Livewire::mount('admin.accessories.addon.more-spec', ['model' => $selectedModelId]);
    $html = $response->html();
    $_instance->logRenderedChild('l3184506425-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    async function validateIMEIs() {
        const imeisInput = document.querySelectorAll('input[type="text"][placeholder^="IMEI"]');
        const imeisError = document.getElementById("imeisError");
        const imeisCount = document.getElementById("imeisCount");

        let isValid = true;
        let errorMessage = "";

        imeisInput.forEach(input => {
            const imei = input.value.trim();

            if (imei.length !== 15 || isNaN(imei)) {
                isValid = false;
                errorMessage += `IMEI must be exactly 15 digits\n`;
            } else if (!isValidIMEI(imei)) {
                isValid = false;
                errorMessage += `IMEI is not valid\n`;
            }
        });

        if (!isValid) {
            imeisError.textContent = errorMessage;
            imeisCount.textContent = "";
        } else {
            imeisError.textContent = "";
            imeisCount.textContent = `Valid IMEI`;
        }
    }

    function isValidIMEI(imei) {
        imei = imei.replace(/[^0-9]/g, ''); // Remove non-numeric characters
        if (!/^\d{15}$/.test(imei)) {
            return false;
        }

        const reversedImei = imei.split('').reverse().join('');
        let totalSum = 0;

        for (let i = 0; i < 15; i++) {
            let num = parseInt(reversedImei[i]);
            if (i % 2 === 1) {
                num *= 2;
                if (num > 9) {
                    num -= 9;
                }
            }
            totalSum += num;
        }

        return totalSum % 10 === 0;
    }
</script><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/accessories/addon/index.blade.php ENDPATH**/ ?>