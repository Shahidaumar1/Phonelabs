<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l445646701-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l445646701-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l445646701-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l445646701-0');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l445646701-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <style>
        :root {
            --primary: #00aeef;
            --primary-dark: #0095ce;
            --primary-light: #e0f4ff;
            --success: #10b981;
            --slate-50: #f8fafc;
            --slate-200: #e2e8f0;
            --slate-400: #94a3b8;
            --slate-700: #334155;
            --slate-900: #0f172a;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-lg: 0 10px 25px -5px rgba(0,0,0,0.1);
        }

        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: var(--slate-50);
            font-family: 'Inter', -apple-system, sans-serif;
            overflow-x: hidden;
        }

        .app-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100vw;
            padding-top: 8px;
            overflow-y: auto;
            padding-bottom: 40px;
        }

        .viewport-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            max-width: 1100px;
            margin: 0 auto;
            width: 95%;
            padding: 10px 0; 
            gap: 15px;
        }

        /* Progress Bar */
        .glass-header {
            background: #fff;
            border-radius: 12px;
            padding: 6px;
            border: 1px solid var(--slate-200);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .steps-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 5px;
        }

        .steps-nav-item { flex: 1; }

        .steps-nav-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--slate-700);
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            gap: 8px;
        }

        .steps-nav-link.active {
            background: var(--primary);
            color: #fff;
            transform: scale(1.02);
        }

        .steps-nav-link.completed {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* Main Content Card */
        .app-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid var(--slate-200);
            box-shadow: var(--shadow-lg);
            display: flex;
            flex-direction: column;
            position: relative;
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }

        .app-content-body { padding: 25px; }

        /* Product Display Grid */
        .product-flex-layout {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 30px;
            align-items: start;
        }

        .img-container {
            background: var(--slate-50);
            border-radius: 12px;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 350px;
        }

        .product-img {
            max-width: 100%;
            max-height: 320px;
            object-fit: contain;
        }

        /* Spec Elements */
        .spec-group-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--slate-400);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            display: block;
        }

        .spec-pill-grid { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px; }

        .spec-pill {
            padding: 8px 16px;
            border-radius: 10px;
            border: 2px solid var(--slate-50);
            background: #fff;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s;
            box-shadow: var(--shadow-sm);
        }

        .spec-pill.active {
            border-color: var(--primary);
            background: var(--primary-light);
            color: var(--primary);
        }

        /* Color Pill Specifics */
        .color-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .app-footer {
            background: #fff;
            border-top: 1px solid var(--slate-200);
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .btn-action-next {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 12px 35px;
            border-radius: 10px;
            font-weight: 700;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-action-next:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-action-back {
            background: transparent;
            border: none;
            color: #64748b;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 10px;
        }

        .value-box {
            background: var(--slate-900);
            padding: 12px 20px;
            border-radius: 12px;
            color: #fff;
            display: flex;
            flex-direction: column;
        }

        @media (max-width: 768px) {
            .product-flex-layout { grid-template-columns: 1fr; }
            .img-container { min-height: 200px; }
            .step-text { display: none; }
            .viewport-container { width: 92%; }
            .app-footer { flex-direction: column; gap: 15px; }
            .btn-action-next { width: 100%; justify-content: center; order: 1; }
            .btn-action-back { order: 2; }
            .value-box { width: 100%; text-align: center; }
        }
    </style>

    <div class="app-wrapper">
        <div class="viewport-container">
            
            <header class="glass-header">
                <ul class="steps-nav" id="form-navigation">
                    <li class="steps-nav-item">
                        <a href="#" data-step="0" class="steps-nav-link active">
                            <i class="fas fa-box-open"></i> <span class="step-text">Product</span>
                        </a>
                    </li>
                    <li class="steps-nav-item">
                        <a href="#" data-step="1" class="steps-nav-link">
                            <i class="fas fa-clipboard-check"></i> <span class="step-text">Condition</span>
                        </a>
                    </li>
                    <li class="steps-nav-item">
                        <a href="#" data-step="2" class="steps-nav-link">
                            <i class="fas fa-user-edit"></i> <span class="step-text">Details</span>
                        </a>
                    </li>
                    <li class="steps-nav-item">
                        <a href="#" data-step="3" class="steps-nav-link">
                            <i class="fas fa-calendar-alt"></i> <span class="step-text">Booking</span>
                        </a>
                    </li>
                </ul>
            </header>

            <main class="app-card" id="main-interface">
                <div class="app-content-body">
                    
                    
                    <section id="product-info-section" class="form-step-content">
                        <div class="product-flex-layout">
                            <div class="img-container">
                                <?php $images = json_decode($product_spec_image); ?>
                                <?php if(empty($images)): ?>
                                    <img src="<?php echo e($product_spec_image ?? $model->file); ?>" class="product-img" alt="<?php echo e($model->name); ?>">
                                <?php else: ?>
                                    <div id="imageSlider" class="carousel slide w-100" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                                                    <img src="<?php echo e($image); ?>" class="product-img d-block mx-auto" alt="Product View">
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="product-info-panel">
                                <h2 class="fw-bold mb-1" style="color: var(--slate-900);"><?php echo e($model->name); ?></h2>
                                <p class="text-muted small mb-4">Please select your device specifications</p>

                                
                                <?php if(!empty($available_memory_sizes)): ?>
                                    <div>
                                        <span class="spec-group-label">Storage Capacity</span>
                                        <div class="spec-pill-grid">
                                            <?php $__currentLoopData = $available_memory_sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="spec-pill <?php echo e($size == $selectedMemorySize ? 'active' : ''); ?>"
                                                     wire:click="$set('selectedMemorySize', '<?php echo e($size); ?>')">
                                                    <?php echo e($size); ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                
                                <?php if(!empty($available_colors)): ?>
                                    <div>
                                        <span class="spec-group-label">Device Color</span>
                                        <div class="spec-pill-grid">
                                            <?php $__currentLoopData = $available_colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="spec-pill <?php echo e($color == $selectedColor ? 'active' : ''); ?>"
                                                     wire:click="$set('selectedColor', '<?php echo e($color); ?>')">
                                                    <span class="color-dot" style="background-color: <?php echo e($color); ?>;"></span>
                                                    <?php echo e(ucfirst($color)); ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row align-items-end g-3">
                                    <div class="col-sm-6">
                                        <span class="spec-group-label">Quantity</span>
                                        <div class="input-group" style="max-width: 140px;">
                                            <button class="btn btn-outline-secondary border-2" wire:click="decreaseQuantity">−</button>
                                            <input type="text" class="form-control text-center border-2 bg-white fw-bold" value="<?php echo e($quantity); ?>" readonly>
                                            <button class="btn btn-outline-secondary border-2" wire:click="increaseQuantity">+</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="value-box">
                                            <span class="small opacity-75">Estimated Value</span>
                                            <span class="h3 mb-0 fw-bold">£<?php echo e(number_format($price ?? 0, 2)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    
                    <section id="form-toggle-section" class="form-step-content" style="display:none;">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.components.form-toggle', ['data' => $data])->html();
} elseif ($_instance->childHasBeenRendered('step1-'.uniqid())) {
    $componentId = $_instance->getRenderedChildComponentId('step1-'.uniqid());
    $componentTag = $_instance->getRenderedChildComponentTagName('step1-'.uniqid());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('step1-'.uniqid());
} else {
    $response = \Livewire\Livewire::mount('guest.components.form-toggle', ['data' => $data]);
    $html = $response->html();
    $_instance->logRenderedChild('step1-'.uniqid(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </section>

                    
                    <section id="patient-detail-section" class="form-step-content" style="display:none;">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.components.patient-detail-form', [])->html();
} elseif ($_instance->childHasBeenRendered('step2-'.uniqid())) {
    $componentId = $_instance->getRenderedChildComponentId('step2-'.uniqid());
    $componentTag = $_instance->getRenderedChildComponentTagName('step2-'.uniqid());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('step2-'.uniqid());
} else {
    $response = \Livewire\Livewire::mount('guest.components.patient-detail-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('step2-'.uniqid(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </section>

                    
                    <section id="booking-section" class="form-step-content" style="display:none;">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('guest.accessories.book-repair', ['data' => $data])->html();
} elseif ($_instance->childHasBeenRendered('step3-'.uniqid())) {
    $componentId = $_instance->getRenderedChildComponentId('step3-'.uniqid());
    $componentTag = $_instance->getRenderedChildComponentTagName('step3-'.uniqid());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('step3-'.uniqid());
} else {
    $response = \Livewire\Livewire::mount('guest.accessories.book-repair', ['data' => $data]);
    $html = $response->html();
    $_instance->logRenderedChild('step3-'.uniqid(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </section>
                </div>

                <footer class="app-footer">
                    <button type="button" id="back-button" class="btn-action-back" style="visibility: hidden;">
                        <i class="fas fa-chevron-left"></i> Back
                    </button>
                    
                    <button id="next-button" type="button" class="btn-action-next">
                        Next Step <i class="fas fa-arrow-right"></i>
                    </button>
                </footer>
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            let currentStep = 0;
            const sections = ['#product-info-section', '#form-toggle-section', '#patient-detail-section', '#booking-section'];

            function updateView() {
                const mainCard = $('#main-interface');
                mainCard.css('opacity', '0.6');

                setTimeout(() => {
                    $('.form-step-content').hide();
                    $(sections[currentStep]).show();
                    
                    $('.steps-nav-link').removeClass('active completed');
                    $('.steps-nav-link').each(function(i) {
                        if (i === currentStep) $(this).addClass('active');
                        if (i < currentStep) $(this).addClass('completed');
                    });

                    $('#back-button').css('visibility', currentStep > 0 ? 'visible' : 'hidden');
                    
                    if(currentStep === sections.length - 1) {
                        $('#next-button').hide();
                    } else {
                        $('#next-button').show();
                    }

                    mainCard.css('opacity', '1');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }, 200);
            }

            $('#next-button').click(function () {
                if (window.Livewire) {
                    // Logic to validate current step before proceeding
                    Livewire.emit('formSubmitted', currentStep);
                } else {
                    if (currentStep < sections.length - 1) {
                        currentStep++;
                        updateView();
                    }
                }
            });

            $('#back-button').click(function () {
                if (currentStep > 0) {
                    currentStep--;
                    updateView();
                }
            });

            if (window.Livewire) {
                Livewire.on('formSubmitted', function () {
                    if (currentStep < sections.length - 1) {
                        currentStep++;
                        updateView();
                    }
                });
            }

            $('.steps-nav-link').click(function(e) {
                e.preventDefault();
                const target = $(this).data('step');
                // Only allow clicking steps already completed or the current one
                if (target < currentStep) {
                    currentStep = target;
                    updateView();
                }
            });
        });
    </script>
</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/livewire/guest/accessories/product-specs.blade.php ENDPATH**/ ?>