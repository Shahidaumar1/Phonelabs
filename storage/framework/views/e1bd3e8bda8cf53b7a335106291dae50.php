<div>
    <div class="d-flex">

        <div></div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings'])->html();
} elseif ($_instance->childHasBeenRendered('l1254660600-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1254660600-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1254660600-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1254660600-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings']);
    $html = $response->html();
    $_instance->logRenderedChild('l1254660600-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    $html = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'services'])->html();
} elseif ($_instance->childHasBeenRendered('l1254660600-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1254660600-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1254660600-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1254660600-1');
} else {
    $response = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'services']);
    $html = $response->html();
    $_instance->logRenderedChild('l1254660600-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <div
                style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
                <div class="container my-5">

                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table  table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">
                                        <div class="d-flex">
                                            <span class="flex-fill">Sell</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" role="switch" type="checkbox"
                                                    wire:click="toggleStatus(<?php echo e($formStatuses[4]->id); ?>, 'sell')"
                                                    <?php echo e($formStatuses[4]->sell ? 'checked' : ''); ?> />
                                            </div>
                                        </div>

                                    </th>
                                    <th scope="col">
                                        <div class="d-flex">
                                            <span class="flex-fill">Buy</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" role="switch" type="checkbox"
                                                    wire:click="toggleStatus(<?php echo e($formStatuses[4]->id); ?>, 'buy')"
                                                    <?php echo e($formStatuses[4]->buy ? 'checked' : ''); ?> />
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex">
                                            <span class="flex-fill">Repair</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" role="switch" type="checkbox"
                                                    wire:click="toggleStatus(<?php echo e($formStatuses[4]->id); ?>, 'repair')"
                                                    <?php echo e($formStatuses[4]->repair ? 'checked' : ''); ?> />
                                            </div>
                                        </div>
                                    </th>

                                     <th scope="col">
                                        <div class="d-flex">
                                            <span class="flex-fill">Accessories</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" role="switch" type="checkbox" wire:click="toggleStatus(<?php echo e($formStatuses[4]->id); ?>, 'accessories')" <?php echo e($formStatuses[4]->accessories ? 'checked' : ''); ?> />
                                            </div>
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" role="switch" type="checkbox"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus(<?php echo e($formStatuses[0]->id); ?>, 'sell')"
                                                <?php echo e($formStatuses[0]->sell ? 'checked' : ''); ?> />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Sell In
                                                Store</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus(<?php echo e($formStatuses[0]->id); ?>, 'buy')"
                                                <?php echo e($formStatuses[0]->buy ? 'checked' : ''); ?> />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Buy in
                                                Store</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus(<?php echo e($formStatuses[0]->id); ?>, 'repair')"
                                                <?php echo e($formStatuses[0]->repair ? 'checked' : ''); ?> />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Store
                                                Repair</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus(<?php echo e($formStatuses[1]->id); ?>, 'sell')"
                                                <?php echo e($formStatuses[1]->sell ? 'checked' : ''); ?> />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Post Your
                                                Device</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus(<?php echo e($formStatuses[1]->id); ?>, 'buy')"
                                                <?php echo e($formStatuses[1]->buy ? 'checked' : ''); ?> />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Post My
                                                Device</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault1"
                                                    wire:click="toggleStatus(<?php echo e($formStatuses[1]->id); ?>, 'repair')"
                                                    <?php echo e($formStatuses[1]->repair ? 'checked' : ''); ?> />
                                                <label class="form-check-label" for="flexSwitchCheckDefault1">Postal
                                                    Repair</label>
                                            </div>

                                            <!--add postal price method -->
                                            <div class="form-check form-switch">
                                                <input role="switch" type="checkbox" checked class="form-check-input"
                                                    wire:click="toggleCustomStatus">
                                                <p style="width: 167px;font-weight:bold">
                                                    <?php echo e($customToggleStatus ? 'Delievry Charges: On' : 'Delievry Charges: Off'); ?>

                                                </p>

                                                </input>

                                            </div>



                                            <div>
                                                <div style="position: relative;">
                                                    <input type="text" placeholder="Enter Price in £"
                                                        wire:model="inputValue"
                                                        class="form-control mr-2 border-success"
                                                        style="width: 150px; height: 30px; display: inline-block; ">
                                                    <button class="btn btn-success rounded-pill"
                                                        wire:click="storeInput"
                                                        style="position: absolute; right: 0; top: 0; height: 100%; padding: 0 10px;">Save
                                                    </button>
                                                </div>


                                                <?php $__errorArgs = ['inputValue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="error"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <?php
                                                    $storedInputValue = Session::get('storedInputValue');
                                                ?>
                                                <?php if($storedInputValue): ?>
                                                    <p style="font-size:0.8vw">Deleivry Charges For Postal Repair:
                                                        £<?php echo e($storedInputValue); ?></p>
                                                <?php endif; ?>
                                            </div>




                                            <!--ends here-->



                                        </div>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus(<?php echo e($formStatuses[2]->id); ?>, 'sell')"
                                                <?php echo e($formStatuses[2]->sell ? 'checked' : ''); ?> />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Collect My
                                                Device</label>
                                        </div>



                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <!-- First element -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault1"
                                                    wire:click="toggleStatus(<?php echo e($formStatuses[2]->id); ?>, 'repair')"
                                                    <?php echo e($formStatuses[2]->repair ? 'checked' : ''); ?> />
                                                <label class="form-check-label" for="flexSwitchCheckDefault1">Collect
                                                    My Device</label>
                                            </div>

                                            <!-- Second element -->
                                            <div class="form-check form-switch">
                                                <input role="switch" type="checkbox" checked
                                                    class="form-check-input" wire:click="toggleAnotherStatus">
                                                <p style="width: 167px;font-weight:bold">
                                                    <?php echo e($anotherToggleStatus ? 'Delievry Charges: On' : 'Delievry Charges: Off'); ?>

                                                </p>

                                                </input>

                                            </div>



                                            <div>
                                                <div style="position: relative;">
                                                    <input type="text" placeholder="Enter Price in £"
                                                        wire:model="collectionRepairPriceInput"
                                                        class="form-control mr-2 border-success"
                                                        style="width: 150px; height: 30px; display: inline-block; ">
                                                    <button class="btn btn-success rounded-pill"
                                                        wire:click="storeCollectionRepairPrice"
                                                        style="position: absolute; right: 0; top: 0; height: 100%; padding: 0 10px; ">Save</button>
                                                </div>


                                                <?php $__errorArgs = ['collectionRepairPriceInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="error"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <?php
                                                    $storedCollectionRepairPrice = Session::get(
                                                        'collectionRepairPrice',
                                                    );
                                                ?>
                                                <?php if($storedCollectionRepairPrice): ?>
                                                    <p style="font-size:0.8vw">Delivery Charges For Collection Repair:
                                                        £<?php echo e($storedCollectionRepairPrice); ?></p>
                                                <?php endif; ?>
                                            </div>


                                            

                                        </div>



                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus(<?php echo e($formStatuses[3]->id); ?>, 'repair')"
                                                <?php echo e($formStatuses[3]->repair ? 'checked' : ''); ?> />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Fix At My
                                                Address</label>
                                        </div>







                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('payment-method-toggle', [])->html();
} elseif ($_instance->childHasBeenRendered('l1254660600-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l1254660600-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1254660600-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1254660600-2');
} else {
    $response = \Livewire\Livewire::mount('payment-method-toggle', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1254660600-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>          

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





        <!-- File: resources/views/livewire/admin/settings/services-settings.blade.php -->




    </div>

    <div class="container d-flex justify-content-center">

        




        <!-- Include Bootstrap CSS in your HTML head section -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS for animations and styling -->
        <style>
            .fade-in {
                animation: fadeIn 1s ease-in-out;
            }

            .btn-danger {
                color: white;
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }

                100% {
                    opacity: 1;
                }
            }

            .btn-danger:hover {
                animation: shake 0.5s;
                animation-iteration-count: 1;
            }

            @keyframes shake {
                0% {
                    transform: translate(1px, 1px) rotate(0deg);
                }

                10% {
                    transform: translate(-1px, -2px) rotate(-1deg);
                }

                20% {
                    transform: translate(-3px, 0px) rotate(1deg);
                }

                30% {
                    transform: translate(3px, 2px) rotate(0deg);
                }

                40% {
                    transform: translate(1px, -1px) rotate(1deg);
                }

                50% {
                    transform: translate(-1px, 2px) rotate(-1deg);
                }

                60% {
                    transform: translate(-3px, 1px) rotate(0deg);
                }

                70% {
                    transform: translate(3px, 1px) rotate(-1deg);
                }

                80% {
                    transform: translate(-1px, -1px) rotate(1deg);
                }

                90% {
                    transform: translate(1px, 2px) rotate(0deg);
                }

                100% {
                    transform: translate(1px, -2px) rotate(-1deg);
                }
            }
        </style>

        <div class="container my-4">
            <h2 class="mb-4">Service Charges</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $serviceCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceCharge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($serviceCharge->name); ?></td>
                            <td><?php echo e($serviceCharge->price); ?></td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customSwitch<?php echo e($serviceCharge->id); ?>"
                                        <?php echo e($serviceCharge->charges ? 'checked' : ''); ?> disabled>
                                    <label class="custom-control-label"
                                        for="customSwitch<?php echo e($serviceCharge->id); ?>"></label>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                    wire:click="startEdit(<?php echo e($serviceCharge->id); ?>)">Edit</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php if($editingServiceChargeId): ?>
                <div class="card mt-4 fade-in">
                    <div class="card-header bg-danger text-white">
                        <h3>Edit Service Charge</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="updateServiceCharge">
                            <div class="form-group">
                                <label for="serviceChargeName">Service Charge Name:</label>
                                <input type="text" class="form-control" id="serviceChargeName"
                                    wire:model="serviceChargeName" required>
                            </div>
                            <div class="form-group">
                                <label for="serviceChargePrice">Price:</label>
                                <input type="number" step="0.01" class="form-control" id="serviceChargePrice"
                                    wire:model="serviceChargePrice" required>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="serviceChargeCharges"
                                    wire:model="serviceChargeCharges">
                                <label class="custom-control-label" for="serviceChargeCharges">Is Active</label>
                            </div>
                            <button type="submit" class="btn btn-danger mt-3">Update</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Include Bootstrap JS and dependencies in your HTML before the closing body tag -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>







        


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
        margin-right: 5px;
        /* Adjust this value to set the desired gap */
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
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/settings/services-settings.blade.php ENDPATH**/ ?>