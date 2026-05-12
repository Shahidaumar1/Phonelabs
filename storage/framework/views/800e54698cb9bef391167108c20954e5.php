<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l2105207076-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2105207076-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2105207076-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2105207076-0');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2105207076-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    
    <style>
        /* CORE LAYOUT */
        .main-wrapper {
            padding-top: 5px;
            padding-bottom: 3px; 
            /* Ensure footer is below the fold on desktop */
            min-height: 80vh;
        }

        /* FADE IN ANIMATION FOR STEPS */
        .form-step {
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ARROW BREADCRUMBS */
        .steps-nav {
            display: flex;
            justify-content: flex-start;
            padding: 0 0 10px 0;
            margin-top: 20px; /* Added Margin Top as requested */
            list-style: none;
            gap: 5px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .steps-nav::-webkit-scrollbar { display: none; }

        @media (min-width: 992px) {
            .steps-nav { justify-content: center; }
        }

        .steps-nav-item { flex: 0 0 auto; }

        .steps-nav-link {
            display: block;
            padding: 8px 20px 8px 30px;
            background: #f0f2f5;
            color: #666;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 600;
            clip-path: polygon(90% 0%, 100% 50%, 90% 100%, 0% 100%, 10% 50%, 0% 0%);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .steps-nav-item:first-child .steps-nav-link {
            clip-path: polygon(90% 0%, 100% 50%, 90% 100%, 0% 100%, 0% 50%, 0% 0%);
            padding-left: 15px;
        }

        .steps-nav-link.active {
            background-color: #00AEEF;
            color: #fff;
        }

        /* PRODUCT & SELECTION BOXES */
        .product-image-box, .selection-panel-box {
            border-radius: 12px;
            height: 100%; /* Ensure both stretch to equal height */
        }

        .product-image-box {
            background: #fff;
            border: 1px solid #eee;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 250px; /* Increased base height */
        }

        /* UPDATED: WHITE BOX STYLING */
        .selection-panel-box {
            padding: 12px;
            background: #ffffff; /* Switched to White */
            color: #333333; /* Dark Text */
            border: 1px solid #eee; /* Added border for definition */
        }

        .selection-panel-box h4 {
            color: #00AEEF !important; /* Blue for the Product Title */
        }

        .selection-panel-box .spec-label {
            color: #00AEEF !important; /* Blue for labels */
            font-weight: 700;
            font-size: 0.8rem;
            margin-bottom: 5px;
        }

        .selection-panel-box hr.device-divider {
            border-top: 1px solid #eee; /* Subtle divider */
            opacity: 1;
        }

        @media (min-width: 1200px) {
            .selection-panel-box { padding: 18px; }
            .product-image-box { padding: 20px 0; }
        }

        .form-control-custom {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 10px 14px;
            background: #f8f9fa; /* Light grey background for inputs */
            width: 100%;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            color: #333 !important;
        }

        .btn-option {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 6px 15px;
            font-size: 0.8rem;
            background: white;
            color: #555;
            transition: 0.2s;
            flex: 0 1 auto;
            text-align: center;
            min-width: 80px;
        }

        .btn-option.active-spec {
            background-color: #00AEEF; /* Blue for active selection */
            border-color: #00AEEF;
            color: white;
        }

        /* QUANTITY SELECTOR ADJUSTMENTS */
        .qty-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            overflow: hidden;
            width: fit-content;
        }

        .qty-btn {
            width: 38px;
            height: 38px;
            border: none;
            background: #f8f9fa;
            color: #00AEEF;
            font-size: 1.2rem;
            transition: 0.2s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover { background: #e9ecef; }

        .qty-input {
            width: 45px;
            height: 38px;
            text-align: center;
            border: none;
            background: #fff;
            color: #333;
            font-weight: 600;
            font-size: 0.9rem;
            outline: none;
        }

        .row-separator {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #eee;
        }

        .button-27 {
            background-color: #00AEEF; /* Blue Button */
            border: none;
            border-radius: 8px;
            color: #fff; /* White Text */
            font-weight: 700;
            padding: 10px 0;
            width: 100%;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .button-27:hover { 
            transform: scale(1.02);
            background-color: #008ec3;
        }

        /* Accordion Custom Styling */
        .custom-accordion-header {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 8px 12px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: #00AEEF; /* Blue text for headers */
        }
        .accordion-content-box {
            padding: 10px;
            font-size: 0.85rem;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 6px 6px;
            background: #fff;
            color: #333;
        }

        @media (max-width: 576px) {
            .main-wrapper { padding-top: 2px; }
            .product-image-box { min-height: 180px; margin-bottom: 10px; }
            h3 { font-size: 1.1rem !important; }
        }
    </style>

    <div class="container main-wrapper">
        <ul class="steps-nav" id="form-navigation">
            <li class="steps-nav-item"><a href="#" data-step="0" class="steps-nav-link active">Product Info</a></li>
            <li class="steps-nav-item"><a href="#" data-step="1" class="steps-nav-link">Select Condition</a></li>
            <li class="steps-nav-item"><a href="#" data-step="2" class="steps-nav-link">Personal Detail</a></li>
            <li class="steps-nav-item"><a href="#" data-step="3" class="steps-nav-link">Book Repair</a></li>
        </ul>

        <section id="product-info-section" class="form-step">
            <div class="text-center" style="margin-top: -5px; margin-bottom: 10px;">
                <h3 class="fw-bold m-0" style="color: #00AEEF;">Please select specifications</h3>
            </div>

            <div class="row g-3 d-flex align-items-stretch">
                
                <div class="col-12 col-lg-4">
                    <div class="product-image-box shadow-sm">
                        <img src="<?php echo e($product_spec_image ?? $model->file); ?>" class="img-fluid" style="max-height: 250px; width: auto; object-fit: contain;">
                    </div>
                </div>

                
                <div class="col-12 col-lg-8">
                    <div class="selection-panel-box shadow-sm">
                        <h4 class="fw-bold mb-1"><?php echo e($model->name); ?></h4>
                        <hr class="device-divider" style="margin: 5px 0 10px 0;">

                        <div class="row g-3">
                            <div class="col-12 col-md-4">
                                <p class="spec-label">Memory</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <?php if(!empty($available_memory_sizes)): ?>
                                        <?php $__currentLoopData = $available_memory_sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $memory_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button type="button" class="btn-option <?php echo e($memory_size == $selectedMemorySize ? 'active-spec' : ''); ?>" wire:click="$set('selectedMemorySize', '<?php echo e($memory_size); ?>')">
                                                <?php echo e($memory_size); ?>

                                            </button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <p class="spec-label">Grade</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <?php $__currentLoopData = $available_grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button type="button" class="btn-option <?php echo e($grade == $selectedGrade ? 'active-spec' : ''); ?>" wire:click="$set('selectedGrade', '<?php echo e($grade); ?>')">
                                            <?php echo e($grade); ?>

                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <p class="spec-label">Colour</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    <?php if(!empty($available_colors)): ?>
                                        <?php $__currentLoopData = $available_colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button type="button" class="btn-option <?php echo e($color == $selectedColor ? 'active-spec' : ''); ?>" wire:click="$set('selectedColor', '<?php echo e($color); ?>')">
                                                <?php echo e($color); ?>

                                            </button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row g-3 row-separator align-items-end">
                            <div class="col-6 col-md-4">
                                <p class="spec-label">Quantity</p>
                                <div class="qty-container">
                                    <button type="button" class="qty-btn btn-minus" wire:click="decreaseQuantity">−</button>
                                    <input type="text" class="qty-input" value="<?php echo e($quantity); ?>" readonly>
                                    <button type="button" class="qty-btn btn-plus" wire:click="increaseQuantity">+</button>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <p class="spec-label">Price</p>
                                <input type="text" class="form-control-custom" style="font-weight:bold; height: 40px;" value="£<?php echo e($price ?? 0); ?>.00" readonly>
                            </div>

                            <div class="col-12 col-md-4">
                                <button id="next-button" type="button" class="button-27" style="height: 40px;">Next Step</button>
                            </div>
                        </div>

                        
                        <div class="row g-2 mt-3" x-data="{ openTab: 0 }">
                            <div class="col-12 col-md-4">
                                <div class="custom-accordion-header" @click="openTab === 1 ? openTab = 0 : openTab = 1">
                                    <span class="fw-bold"><i class="fa fa-info-circle me-1"></i> Details</span>
                                    <i :class="openTab === 1 ? 'fa fa-minus' : 'fa fa-plus'" style="font-size: 0.7rem;"></i>
                                </div>
                                <div class="accordion-content-box" x-show="openTab === 1" x-cloak x-transition>
                                    <?php echo $detail ?? 'No details available.'; ?>

                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="custom-accordion-header" @click="openTab === 2 ? openTab = 0 : openTab = 2">
                                    <span class="fw-bold"><i class="fa fa-list me-1"></i> Specification</span>
                                    <i :class="openTab === 2 ? 'fa fa-minus' : 'fa fa-plus'" style="font-size: 0.7rem;"></i>
                                </div>
                                <div class="accordion-content-box" x-show="openTab === 2" x-cloak x-transition>
                                    <?php echo $specification ?? 'No specifications available.'; ?>

                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="custom-accordion-header" @click="openTab === 3 ? openTab = 0 : openTab = 3">
                                    <span class="fw-bold"><i class="fa fa-shield me-1"></i> Warranty</span>
                                    <i :class="openTab === 3 ? 'fa fa-minus' : 'fa fa-plus'" style="font-size: 0.7rem;"></i>
                                </div>
                                <div class="accordion-content-box" x-show="openTab === 3" x-cloak x-transition>
                                    <?php echo $warranty ?? 'No warranty info available.'; ?>

                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <klarna-placement 
                                data-key="credit-promotion-badge" 
                                data-locale="en-GB" 
                                data-purchase-amount="<?php echo e(($price ?? 0) * 100); ?>">
                            </klarna-placement>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <section id="form-toggle-section" class="form-step" style="display:none;"><?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.components.form-toggle', ['data' => $data])->html();
} elseif ($_instance->childHasBeenRendered(uniqid())) {
    $componentId = $_instance->getRenderedChildComponentId(uniqid());
    $componentTag = $_instance->getRenderedChildComponentTagName(uniqid());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(uniqid());
} else {
    $response = \Livewire\Livewire::mount('guest.components.form-toggle', ['data' => $data]);
    $html = $response->html();
    $_instance->logRenderedChild(uniqid(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></section>
        <section id="patient-detail-section" class="form-step" style="display:none;"><?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.components.patient-detail-form', [])->html();
} elseif ($_instance->childHasBeenRendered(uniqid())) {
    $componentId = $_instance->getRenderedChildComponentId(uniqid());
    $componentTag = $_instance->getRenderedChildComponentTagName(uniqid());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(uniqid());
} else {
    $response = \Livewire\Livewire::mount('guest.components.patient-detail-form', []);
    $html = $response->html();
    $_instance->logRenderedChild(uniqid(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></section>
        <section id="booking-section" class="form-step" style="display:none;"><?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.buy.book-repair', ['data' => $data])->html();
} elseif ($_instance->childHasBeenRendered(uniqid())) {
    $componentId = $_instance->getRenderedChildComponentId(uniqid());
    $componentTag = $_instance->getRenderedChildComponentTagName(uniqid());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(uniqid());
} else {
    $response = \Livewire\Livewire::mount('guest.buy.book-repair', ['data' => $data]);
    $html = $response->html();
    $_instance->logRenderedChild(uniqid(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></section>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script async src="https://na-library.klarnaservices.com/lib.js" data-client-id="YOUR_KLARNA_CLIENT_ID"></script>
    <script>
        $(document).ready(function () {
            const steps = ['#product-info-section', '#form-toggle-section', '#patient-detail-section', '#booking-section'];
            let currentStep = 0;
            let formCompleted = [true, false, false, true];

            function showStep(stepIndex) {
                $('.form-step').hide(); 
                $(steps[stepIndex]).fadeIn(400);

                $('#next-button').toggle(stepIndex === 0);
                $('#form-navigation .steps-nav-link').removeClass('active');
                $('#form-navigation .steps-nav-link[data-step="' + stepIndex + '"]').addClass('active');

                const activeLink = document.querySelector('.steps-nav-link.active');
                if (activeLink && window.innerWidth < 768) {
                    activeLink.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                }
            }

            function moveToNextStep() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }

            $('#next-button').click(function () {
                if (formCompleted[currentStep]) {
                    Livewire.emit('formSubmitted', currentStep);
                } else {
                    alert('Please complete the current step.');
                }
            });

            Livewire.on('formSubmitted', function (stepIndex) {
                formCompleted[stepIndex] = true;
                moveToNextStep();
            });

            Livewire.on('formInvalid', function (stepIndex) {
                formCompleted[stepIndex] = false;
                showStep(currentStep);
            });

            $('#form-navigation .steps-nav-link').click(function (e) {
                e.preventDefault();
                const stepIndex = $(this).data('step');
                currentStep = stepIndex;
                showStep(currentStep);
            });

            showStep(currentStep);
        });
    </script>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/buy/product-specs.blade.php ENDPATH**/ ?>