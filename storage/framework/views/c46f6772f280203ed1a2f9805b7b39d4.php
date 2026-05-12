<section>
    <style>
        @media only screen and (max-width: 767px) {
            .text-sm {
                font-size: 20px;
                /* Adjust the font size as needed */
                text-align: center;
                /* Center the text */
            }

            .text-m {
                font-size: 25px;
                /* Adjust the font size as needed */
                text-align: center;
                /* Center the text */
                font-weight: bold;
                /* Set the font weight to bold */
                margin-left: 3%;
            }

        }
    </style>
    <style>
        .accordion-button:not(.collapsed) {
            background-color: white;
            box-shadow: none;
        }

        .accordion-button:not(.collapsed)::after {
            display: none;
        }

        .accordion-button::after {
            display: none;
        }

        .accordion-item {
            justify-content: space-between;
        }
    </style>





    <?php if($form_type == 'postal_form'): ?>
    <?php

    $form_name = 'Post Your Device';

    ?>
    <?php endif; ?>



    <?php if($form_type == 'clinic_form'): ?>
    <?php

    $form_name = 'Sell In Store';

    ?>
    <?php endif; ?>


    <?php if($form_type == 'collection_form'): ?>

    <?php

    $form_name = 'Collect My Device';

    ?>








    <?php endif; ?>










    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

    <?php if($success): ?>
    <div class="col-4">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Congratulations! 🎉 Your order has been successfully placed.</h4>
            <p> Check your email for more instructions.</p>
            <hr>
            <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
        </div>

    </div>
    <?php else: ?>

    <!-- <h3 class="text-center  mt-1" style="color: red;">How would you like to Pay?</h3> -->

    <div class="container mb-4 ">


        <div class="row">


            <div class="col-lg-4  col-md-6 col-12 ">
                <h3 class="my-2">&nbsp;</h3>
                <table class="table table-striped border" style="position:relative;top:5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <thead>



                        <tr>
                            <th colspan="2" class="text-center text-danger fw-bolder fs-3">Sell Summary
                            </th>
                            <!-- Center-aligned heading -->
                        </tr>



                        <tr>

                            <td>Model</td>
                            <td class="text-end"><?php echo e(session()->get('modelName')); ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="justify-content-between">

                            <td>Type</td>
                            <td class="text-end"><?php echo e($form_name); ?></td>

                        </tr>





                        <tr>

                            <td>Price</td>


                            <td class="text-end">£ <?php echo e($price ?? ''); ?>.00 </td>

                        </tr>

                    </tbody>
                </table>


            </div>

            <div class="col-md-1 d-sm-none d-md-none d-lg-block"></div>

            <div class="col-md-6 col-12 col-lg-6 ">

                <h3 class="my-2" style="color: red;">How would you like to Pay?</h3>
                <div style="height: 100%;gap: 0px;border-radius: 10px 10px 10px 10px;opacity: 0px;border: 2px solid #EA1555;">

                    <p class="text-center mt-3"
                        style="font-family: Manrope;
                                       font-size: 18px;
                                       font-weight: 700;
                                       line-height: 40px;
                                       letter-spacing: -0.01em;
                                       text-align: center;">Select your payment option </p>

                    <div class=" p-1  ">
                        <div class="container p-1">
                            <div class="accordion" id="payment-accodoion">
                                <div class="accordion-item " style="border: 1px solid #EA1555; width:100%;">
                                    <h2 class="accordion-header" id="headingthree">
                                        <button style="padding-bottom: 0px;"
                                            class="accordion-button collapsed d-flex  justify-content-between"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree"
                                            aria-expanded="false" aria-controls="collapsethree"
                                            onclick="handleRadio(this)">

                                            <div> <input type="radio" onclick="event.stopPropagation();"
                                                    name="radio-payment"
                                                    style=" width: 19px;height: 17px; font-size: 1.3rem;accent-color:#EA1555;">
                                                <img class="img-fluid" style="width: 100px;"
                                                    src="https://ik.imagekit.io/4csyk445b/PayPal_horizontally_Logo_2014.png?updatedAt=1709738114776"
                                                    alt>
                                            </div>
                                            <p style="font-size: 1.3rem; color:red;">£ <?php echo e($price ?? ''); ?>.00</p>

                                        </button>
                                    </h2>

                                    <div id="collapsethree" class="accordion-collapse collapse"
                                        aria-labelledby="collapsethree" data-bs-parent="#payment-accodoion">
                                        <div class="accordion-body">
                                            <p class="text-center">Seamlessly checkout with
                                                PayPal for a trusted payment experience. </p>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.sell.components.paypal', [])->html();
} elseif ($_instance->childHasBeenRendered('l2969335943-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2969335943-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2969335943-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2969335943-0');
} else {
    $response = \Livewire\Livewire::mount('guest.sell.components.paypal', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2969335943-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                            <div class="d-flex justify-content-center">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="accordion-item" style="border: 1px solid #EA1555; width:100%;">
                                    <h2 class="accordion-header" id="headingfour">
                                        <button style="padding-bottom: 0px;"
                                            class="accordion-button d-flex justify-content-between" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsefour"
                                            aria-expanded="true" aria-controls="collapsefour"
                                            onclick="handleRadio(this)">
                                            <div>
                                                <p style="font-size: 1.4rem;">
                                                    <input type="radio" name="radio-payment"
                                                        style="width: 19px; height: 17px;accent-color:#EA1555;" checked> Pay in-BANK
                                                </p>
                                            </div>
                                            <h4 style="font-size: 1.3rem; color: red;">£ <?php echo e($price ?? ''); ?>.00</h4>
                                        </button>
                                    </h2>
                                    <div id="collapsefour" class="accordion-collapse collapse show"
                                        aria-labelledby="collapsefour" data-bs-parent="#payment-accodoion">
                                        <div class="accordion-body">
                                            
                                            <!-- -------change radio forms------ -->
                                            <div class="d-flex  align-items-center">
                                                <style>
                                                    .col-7 {
                                                        width: 100%;
                                                        height: 100%;
                                                        background: #ffffff 0% 0% no-repeat padding-box;

                                                        border-radius: 15px;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                    }

                                                    @media (max-width: 767px) {
                                                        .col-7 {
                                                            width: 100%;
                                                            /* Limit maximum width */
                                                        }

                                                        .btn-success {
                                                            margin-top: -20px;
                                                        }

                                                    }
                                                </style>
                                                <div class=" col-12" style="">
                                                    <div id="paymentForm">
                                                        <!--<h2 class="text-center p-2 fw-bold">Bank Transfer</h2>-->

                                                        <div class="px-1 ">
                                                            <!--<label for="disabledSelect" class="form-label">Account Title</label>-->
                                                            <!--<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Account Title" wire:model.debounce.500="bank.account_title">-->

                                                            <div class="row" style="margin-top:0px;">
                                                                <label for="exampleFormControlInput1"

                                                                    class="col-sm-2 col-form-label">Title</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="exampleFormControlInput1"

                                                                        placeholder="Enter Account Title"
                                                                        wire:model.debounce.500="bank.account_title">
                                                                </div>
                                                            </div>




                                                            <?php $__errorArgs = ['bank.account_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger error"><?php echo e($message); ?></span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                        <div class="px-1 ">
                                                            <!--<label for="disabledSelect" class="form-label">Account Number</label>-->
                                                            <!--<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Account Number" wire:model.debounce.500="bank.account_number">-->
                                                            <div class="row " style="margin-top:0px;">
                                                                <label for="exampleFormControlInput1"

                                                                    class="col-sm-2 col-form-label">Account</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control"
                                                                        id="exampleFormControlInput1"

                                                                        placeholder="Enter Account Number"
                                                                        wire:model="bank.account_number">
                                                                </div>
                                                            </div>


                                                            <?php $__errorArgs = ['bank.account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger error"><?php echo e($message); ?></span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="px-1 ">
                                                            <!--<label for="disabledSelect" class="form-label">Bank Name</label>-->
                                                            <!--<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Bank Name" wire:model.debounce.500="bank.name">-->
                                                            <div class="row " style="margin-top:0px;">
                                                                <label for="exampleFormControlInput1"

                                                                    class="col-sm-2 col-form-label">Bank</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="exampleFormControlInput1"

                                                                        placeholder="Enter Bank Name"
                                                                        wire:model="bank.name">
                                                                </div>
                                                            </div>



                                                            <?php $__errorArgs = ['bank.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger error"><?php echo e($message); ?></span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                        <div class="px-1 ">
                                                            <!--<label for="disabledSelect" class="form-label">Sort Code</label>-->
                                                            <!--<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Sort Code" wire:model.debounce.500="bank.sort_code">-->
                                                            <div class="row " style="margin-top:0px;">
                                                                <label for="exampleFormControlInput1"

                                                                    class="col-sm-2 col-form-label">S.code</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="exampleFormControlInput1"

                                                                        placeholder="Enter Sort Code"
                                                                        wire:model="bank.sort_code">
                                                                </div>
                                                            </div>



                                                            <?php $__errorArgs = ['bank.sort_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger error"><?php echo e($message); ?></span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="px-2 py-2">
                                                            <div class="form-check">
                                                                <input style="transform: scale(0.8);"
                                                                    class="form-check-input" type="checkbox"
                                                                    value="" id="flexCheckDefault" />
                                                                <label
                                                                    class="form-check-label" for="flexCheckDefault">
                                                                    Agree with Privacy Policy Terms & Conditions
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="cursor-point align-items-center d-grid gap-2 col-12 justify-content-center">

                                                            <button class="btn btn-danger text-white"
                                                                wire:click="submit">Submit</button>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>











        </div>


    </div>
    <?php endif; ?>






    <script>
        function handleRadio(button) {
            var radio = button.querySelector('input[name="radio-payment"]');
            var isChecked = radio.checked;

            // Uncheck all radio buttons with name "radio-payment"
            document.querySelectorAll('input[name="radio-payment"]').forEach(function(radioBtn) {
                radioBtn.checked = false;
            });

            // If radio button was not checked, check it
            if (!isChecked) {
                radio.checked = true;
            }
        }
    </script><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/sell/booking-form.blade.php ENDPATH**/ ?>