<div wire:key="main-product-wrapper" class="bg-light min-vh-100 pb-5">
    <div wire:ignore.self>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l3517743918-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3517743918-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3517743918-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3517743918-0');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3517743918-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

    <div class="container-xl pt-4">
        <div class="row justify-content-center mb-5 px-2">
            <div class="col-12 col-lg-9">
                <div class="search-container shadow-sm rounded-3 bg-white d-flex align-items-center p-1 border">
                    <div class="dropdown d-none d-md-block px-2 border-end">
                        <select class="form-select border-0 bg-transparent fw-bold text-dark p-0 ps-2" style="cursor: pointer; outline: none; box-shadow: none; font-size: 0.85rem; min-width: 150px;" wire:model="selectedCategoryId">
                            <option value="All">Buy My Mobile</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <input type="text" class="form-control border-0 shadow-none flex-grow-1 px-3" placeholder="Search devices..." wire:model.debounce.500ms="search" style="font-size: 0.95rem;">
                    <button class="btn btn-primary rounded-2 d-flex align-items-center justify-content-center px-4 py-2 me-1" style="background: #00AEEF; border: none; height: 42px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <aside class="col-md-4 col-lg-3">
                <div class="sticky-top" style="top: 20px;">
                    
                    <div class="d-md-none px-2 mb-4">
                        <div class="mobile-dropdown-group mb-2">
                            <div class="custom-hover-dropdown">
                                <button class="btn w-100 d-flex justify-content-between align-items-center bg-white border shadow-sm py-3 px-3 fw-bold text-muted small rounded-3">
                                    FILTER BY BRAND
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="dropdown-content shadow-lg rounded-3 border">
                                    <button wire:click="$set('selectedCategoryId', 'All')" class="dropdown-item py-2 border-bottom <?php echo e($selectedCategoryId == 'All' ? 'bg-primary text-white' : ''); ?>">All Brands</button>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <button wire:click="$set('selectedCategoryId', '<?php echo e($category->id); ?>')" class="dropdown-item py-2 border-bottom <?php echo e($selectedCategoryId == $category->id ? 'bg-primary text-white' : ''); ?>"><?php echo e($category->name); ?></button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="mobile-dropdown-group mb-3">
                            <div class="custom-hover-dropdown">
                                <button class="btn w-100 d-flex justify-content-between align-items-center bg-white border shadow-sm py-3 px-3 fw-bold text-muted small rounded-3">
                                    AVAILABLE MODELS
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="dropdown-content shadow-lg rounded-3 border" style="max-height: 250px; overflow-y: auto;">
                                    <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <button wire:click="selectDevice('<?php echo e($device->id); ?>')" class="dropdown-item py-2 border-bottom d-flex justify-content-between">
                                            <span><?php echo e($device->name); ?></span>
                                            <i class="bi bi-chevron-right opacity-50"></i>
                                        </button>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="p-3 text-center text-muted small">Select a brand first</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-3 rounded-3 border shadow-sm">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="small fw-bold text-muted">MAX PRICE:</span>
                                <span class="small fw-bold">£<?php echo e(number_format($price ?? 12000)); ?></span>
                            </div>
                            <input type="range" class="form-range custom-range" min="0" max="12000" step="100" wire:model="price">
                        </div>
                    </div>

                    <div class="d-none d-md-block">
                        <div class="filter-group mb-4">
                            <h6 class="sidebar-heading">FILTER BY BRAND</h6>
                            <div class="brand-stack">
                                <div class="brand-box <?php echo e($selectedCategoryId == 'All' ? 'active' : ''); ?>" wire:click="$set('selectedCategoryId', 'All')">
                                    All Brands
                                </div>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="brand-box <?php echo e($selectedCategoryId == $category->id ? 'active' : ''); ?>" wire:click="$set('selectedCategoryId', '<?php echo e($category->id); ?>')">
                                        <?php echo e($category->name); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="filter-group mb-4">
                            <h6 class="sidebar-heading">AVAILABLE MODELS</h6>
                            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                                <div class="custom-scrollbar" style="max-height: 280px; overflow-y: auto;">
                                    <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="model-item d-flex justify-content-between align-items-center border-bottom p-3" wire:click="selectDevice('<?php echo e($device->id); ?>')" style="cursor: pointer;">
                                            <span class="fw-semibold text-dark small"><?php echo e($device->name); ?></span>
                                            <i class="bi bi-chevron-right text-muted x-small"></i>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="p-3 text-center text-muted small">Select a brand</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="price-container p-3 bg-white rounded-3 border shadow-sm">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="sidebar-heading mb-0">MAX PRICE:</span>
                                <span class="fw-bold text-dark">£<?php echo e(number_format($price ?? 12000)); ?></span>
                            </div>
                            <input type="range" class="form-range custom-range" min="0" max="12000" step="100" wire:model="price">
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-md-8 col-lg-9">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3 px-2">
               <?php $__empty_1 = true; $__currentLoopData = collect($models)->sortByDesc(function ($item) {
    // Step 1: extract number
    preg_match('/\d+/', $item['name'], $matches);
    $number = $matches[0] ?? 0;

    // Step 2: variant priority
    $name = strtolower($item['name']);
    $priority = 0;

    if (str_contains($name, 'pro max')) $priority = 3;
    elseif (str_contains($name, 'pro')) $priority = 2;
    elseif (str_contains($name, 'plus')) $priority = 1;

    // Step 3: combine
    return ($number * 10) + $priority;
}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col" wire:key="prod-<?php echo e($model['id']); ?>">
                        
                        <a href="<?php echo e(route('guest-buy-product-specs', [
                                'category_slug' => $model['category_slug'],
                                'device_slug'   => $model['device_slug'],
                                'model_slug'    => $model['slug'],
                            ])); ?>" class="text-decoration-none h-100 d-block">
                            <div class="card h-100 border-0 rounded-4 product-card shadow-sm p-3">
                                <div class="image-box mb-3 text-center">
                                    <img src="<?php echo e($model['file'] ?? asset('assets/no-img.png')); ?>" class="img-fluid" style="height: 130px; object-fit: contain;">
                                </div>
                                <div class="card-content text-center">
                                    <h6 class="product-name text-dark fw-bold mb-2"><?php echo e($model['name']); ?></h6>
                                    
                                    <div class="klarna-pill mb-3">
                                        <span class="k-logo">K.</span>
                                        <span class="k-txt">PAY WITH KLARNA X3</span>
                                    </div>

                                    <div class="details-link">VIEW DETAILS</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 py-5 text-center bg-white rounded-4 border shadow-sm">
                        <p class="text-muted fw-medium mb-0">No matching devices found.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-blue: #00AEEF;
        --klarna-pink-bg: #FFF0F3;
        --klarna-pink-text: #FF8FA3;
        --text-gray: #718096;
        --border-color: #edf2f7;
    }

    /* Custom Hover Dropdown for Mobile */
    .custom-hover-dropdown {
        position: relative;
        display: block;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 100%;
        z-index: 1000;
        top: 100%;
        left: 0;
    }
    .dropdown-item {
        background: white;
        border: none;
        width: 100%;
        text-align: left;
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--text-gray);
    }
    /* Trigger hover effect */
    .custom-hover-dropdown:hover .dropdown-content {
        display: block;
    }

    /* Keep Card Layouts Consistent */
    @media (max-width: 767.98px) {
        .product-card { display: flex !important; flex-direction: row !important; align-items: center; }
        .product-card .image-box { width: 85px; margin-bottom: 0 !important; margin-right: 15px; }
        .product-card .card-content { text-align: left !important; flex: 1; }
        .details-link { text-align: left; border-top: none !important; margin-top: 0 !important; }
    }

    /* Professional Sidebar Styling */
    .sidebar-heading { font-size: 0.7rem; font-weight: 800; color: var(--text-gray); letter-spacing: 1px; margin-bottom: 12px; text-transform: uppercase; }
    
    .brand-box {
        background: white; padding: 12px 16px; border-radius: 10px; cursor: pointer; margin-bottom: 8px; border: 1px solid var(--border-color); font-weight: 700; color: var(--text-gray); font-size: 0.85rem; transition: 0.2s;
    }
    .brand-box.active { background: var(--primary-blue); color: white; border-color: var(--primary-blue); }

    .product-card { transition: 0.3s; border: 1px solid transparent !important; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(0,0,0,0.07) !important; border-color: var(--primary-blue) !important; }
    
    .product-name { font-size: 0.9rem; line-height: 1.3; min-height: 2.6em; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }

    .klarna-pill { background: var(--klarna-pink-bg); display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 4px; }
    .k-logo { color: var(--klarna-pink-text); font-weight: 900; font-size: 0.75rem; }
    .k-txt { color: var(--klarna-pink-text); font-size: 0.55rem; font-weight: 800; letter-spacing: 0.4px; }

    .details-link { font-size: 0.65rem; font-weight: 800; color: #cbd5e0; text-transform: uppercase; border-top: 1px solid #f1f5f9; padding-top: 8px; margin-top: 5px; }
    .product-card:hover .details-link { color: var(--primary-blue); }

    .custom-range::-webkit-slider-thumb { background: var(--primary-blue); }
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
</style>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/buy/index.blade.php ENDPATH**/ ?>