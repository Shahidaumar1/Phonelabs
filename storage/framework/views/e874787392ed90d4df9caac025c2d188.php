<div>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        [x-cloak] { display: none !important; }

        .postal-repair-sec .repair-sec-1 h2 {
            font-size: 32px;
            line-height: 60px;
            font-weight: 700;
            text-align: center;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 50px;
            letter-spacing: -0.33px;
        }

        .postal-repair-sec .repair-sec-1 .repair-sec1-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            align-items: start;
        }

        .postal-repair-sec .repair-sec-1 .reair-sec1-box1 {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .branch-option {
            display: block;
            margin-bottom: 20px;
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .branch-option:has(input:checked) {
            border-color: #00AEEF;
            background-color: #f0f9ff;
        }

        .reair-sec1-box1-inner h4 {
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 10px;
            letter-spacing: -0.33px;
        }

        .reair-sec1-box1-inner p {
            font-size: 16px;
            line-height: 30px;
            font-weight: 400;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0;
            padding-bottom: 5px;
            letter-spacing: -0.33px;
        }

        .postal-repair-sec .repair-sec-1 .reair-sec1-box1 img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
            max-height: 150px;
            object-fit: contain;
        }

        .postal-repair-sec .repair1-box2 {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
            position: sticky;
            top: 20px;
        }

        .postal-repair-sec .repair1-box2 iframe {
            border-radius: 10px;
            height: 400px;
            width: 100%;
            border: 0;
        }

        .next-back-btn {
            width: 160px;
            height: 65px;
            border-radius: 5px;
            background-color: #00AEEF;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            font-size: 20px;
            line-height: 27px;
            text-decoration: none;
            border: 1px solid #00AEEF;
            margin-bottom: 15px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .next-back-btn:hover {
            background-color: #009bda;
        }

        .postal-repair-sec .repair-sec-2 h2 {
            font-size: 32px;
            line-height: 60px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 30px;
            letter-spacing: -0.33px;
        }

        .search-postal-input {
            max-width: 550px;
            margin-bottom: 20px;
        }

        .search-postal-input label {
            display: block;
            font-size: 16px;
            line-height: 30px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            margin-bottom: 5px;
        }

        .form-control, .form-select {
            width: 100%;
            height: 50px;
            border-radius: 5px;
            border: 1px solid #E5E5E5;
            padding: 0 15px;
            font-size: 16px;
            color: #000;
            font-family: "Manrope", sans-serif;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn-search {
            width: 120px;
            height: 50px;
            border-radius: 5px;
            background-color: rgba(234, 21, 85, 1);
            color: white;
            border: 1px solid rgba(234, 21, 85, 1);
            cursor: pointer;
            font-weight: 700;
        }

        .btn-manual {
            color: #fff;
            text-decoration: underline;
            border: 1px solid rgba(234, 21, 85, 1);
            background-color: rgba(234, 21, 85, 1);
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
        }

        .next-back-btns {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        @media(max-width:991px) {
            .postal-repair-sec .repair-sec-1 .repair-sec1-inner {
                grid-template-columns: 1fr;
            }
            .next-back-btn { width: 140px; font-size: 18px; }
        }

        @media(max-width:768px) {
            .postal-repair-sec .repair-sec-1 h2,
            .postal-repair-sec .repair-sec-2 h2 {
                font-size: 25px;
                line-height: 32px;
                padding-bottom: 30px;
            }
            .form-control, .form-select { height: 44px; font-size: 14px; }
            .postal-repair-sec .repair1-box2 iframe { height: 300px; }
        }
    </style>

    <?php if(Session::get('serviceType') == 'Repair'): ?>
    <div class="postal-repair-sec">
        <div class="cust-container" style="max-width: 1200px; margin: 0 auto; padding: 20px;">

            
            <form x-data="{ step: 0, selectedBranchId: <?php echo e($selectedBranchId ?? 'null'); ?> }"
                  class="submit-form"
                  wire:submit.prevent="submitForm">

                
                <div class="repair-sec-1" x-show="step === 0" x-cloak x-transition.opacity>
                    <h2>Post your device to this address</h2>

                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger"
                             style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:20px;">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="repair-sec1-inner">

                        
                        <div class="reair-sec1-box1">
                            <?php $__empty_1 = true; $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <label class="branch-option">
                                    
                                    <input
                                        type="radio"
                                        name="branch_id"
                                        value="<?php echo e($branch->id); ?>"
                                        wire:model="selectedBranchId"
                                        x-model="selectedBranchId"
                                        style="margin-right: 10px;"
                                        @change="$wire.selectBranch(<?php echo e($branch->id); ?>)">

                                    <div class="reair-sec1-box1-inner">
                                        <h4><?php echo e($branch->name); ?></h4>
                                        <p>
                                            <?php echo e($branch->address_line_1); ?>,
                                            <?php echo e($branch->address_line_2 ? $branch->address_line_2 . ',' : ''); ?>

                                            <?php echo e($branch->town_city); ?>,
                                            <?php echo e($branch->post_code); ?>, UK
                                        </p>

                                        <?php if(!empty($branch->email)): ?>
                                            <p><strong>Email:</strong> <?php echo e($branch->email); ?></p>
                                        <?php endif; ?>

                                        <?php if(!empty($branch->landline_number)): ?>
                                            <p><strong>Landline:</strong> <?php echo e($branch->landline_number); ?></p>
                                        <?php endif; ?>

                                        <?php if(!empty($branch->mobile_number)): ?>
                                            <p><strong>Mobile:</strong> <?php echo e($branch->mobile_number); ?></p>
                                        <?php endif; ?>

                                        <?php if(!empty($branch->image)): ?>
                                            <img src="<?php echo e($branch->image); ?>" alt="<?php echo e($branch->name); ?>">
                                        <?php endif; ?>
                                    </div>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>No branches found.</p>
                            <?php endif; ?>
                        </div>

                        
                        <div class="repair1-box2">
                            <?php if(isset($siteBranch) && $siteBranch && !empty($siteBranch->map_link)): ?>
                                <?php echo $siteBranch->map_link; ?>

                            <?php else: ?>
                                <p style="color: gray;">Map not available</p>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div class="next-back-btns" style="justify-content: flex-end;">
                        
                        <button
                            type="button"
                            class="next-back-btn"
                            :disabled="!selectedBranchId"
                            :style="!selectedBranchId ? 'opacity: 0.5; cursor: not-allowed;' : ''"
                            @click="if(selectedBranchId) step = 1">
                            Next
                            <i class="fa-solid fa-chevron-right ps-2" style="font-size: 12px;"></i>
                        </button>
                    </div>
                </div>

                
                <section class="repair-sec-2" x-show="step === 1" x-cloak x-transition.opacity>
                    <h2>Please Provide your address</h2>

                    <div class="search-postal-input">
                        <label for="post_code">Post Code:</label>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <input
                                type="text"
                                required
                                wire:model.debounce.500ms="post_code"
                                class="form-control"
                                id="post_code"
                                placeholder="Enter Post Code"
                                style="flex: 1; min-width: 200px; margin-bottom: 0;">

                            <button type="button"
                                    wire:click.prevent="changeApiData"
                                    class="btn-search">
                                Search
                            </button>
                        </div>

                        <?php $__errorArgs = ['post_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <?php if($responseData): ?>
                        <div style="margin-bottom: 15px;">
                            <select wire:model="selectedOption" class="form-select">
                                <option value="" selected disabled>Select an option</option>
                                <?php $__currentLoopData = $responseData['knownAddresses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($address); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <?php if($errorMessage): ?>
                                <p class="text-danger"><?php echo e($errorMessage); ?></p>
                            <?php endif; ?>
                        </div>

                        <button type="button"
                                class="btn-manual"
                                wire:click.prevent="toggleInputFields">
                            I can't find my address..
                        </button>
                    <?php endif; ?>

                    <?php if($showInputFields): ?>
                        <div style="background: #f9f9f9; padding: 20px; border-radius: 5px; margin-top: 20px;">
                            <div class="mb-3 mt-3">
                                <label for="address_line_1">Address Line 1*:</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    wire:model.lazy="postal.address_line_1"
                                    placeholder="Address Line 1"
                                    name="postal.address_line_1"
                                    required>
                                <?php $__errorArgs = ['postal.address_line_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="address_line_2">Address Line 2:</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    wire:model.lazy="postal.address_line_2"
                                    placeholder="Address Line 2"
                                    name="postal.address_line_2">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="city">Town/City*:</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    wire:model.lazy="postal.city"
                                    placeholder="Town/City"
                                    name="postal.city"
                                    required>
                                <?php $__errorArgs = ['postal.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="postal_code">Post Code*:</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    wire:model.lazy="postal.code"
                                    placeholder="Post Code"
                                    name="postal.code"
                                    required>
                                <?php $__errorArgs = ['postal.code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="next-back-btns">
                        <button
                            type="button"
                            class="next-back-btn"
                            style="background-color: #6c757d; border-color: #6c757d;"
                            @click="step = 0">
                            <i class="fa-solid fa-chevron-left pe-2" style="font-size: 12px;"></i>
                            Go Back
                        </button>

                        <button type="submit" class="next-back-btn">
                            Next
                            <i class="fa-solid fa-chevron-right ps-2" style="font-size: 12px;"></i>
                        </button>
                    </div>
                </section>

            </form>
        </div>
    </div>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('addressFieldsUpdated', function (data) {
                if (data && data.address1) {
                    var el = document.querySelector("input[name='postal.address_line_1']");
                    if (el) { el.value = data.address1; el.dispatchEvent(new Event('input', {bubbles:true})); }
                }
                if (data && data.address2) {
                    var el = document.querySelector("input[name='postal.address_line_2']");
                    if (el) { el.value = data.address2; el.dispatchEvent(new Event('input', {bubbles:true})); }
                }
                if (data && data.city) {
                    var el = document.querySelector("input[name='postal.city']");
                    if (el) { el.value = data.city; el.dispatchEvent(new Event('input', {bubbles:true})); }
                }
            });
        });
    </script>

</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/components/postal-repair-form.blade.php ENDPATH**/ ?>