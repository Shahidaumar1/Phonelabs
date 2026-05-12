<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.top-bar', [])->html();
} elseif ($_instance->childHasBeenRendered('l3448575225-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3448575225-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3448575225-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3448575225-0');
} else {
    $response = \Livewire\Livewire::mount('components.top-bar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3448575225-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l3448575225-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3448575225-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3448575225-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3448575225-1');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3448575225-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <section class="head-sell">
        <div class="container"></div>
    </section>

    <section class="head-sell mt-5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 p-3 mt-5">
                    <h1 style="font-family: heading;"><?php echo $webContent->brand_page_heading_1; ?></h1>
                    <p style="text-align: justify;">
                        At <?php echo e($siteSettings->buisness_name ?? ''); ?>, we've streamlined the process of selling your device, ensuring it's as effortless as can be.
                        Trust <?php echo e($siteSettings->buisness_name ?? ''); ?> for a seamless, hassle-free journey in selling your phone or tablet.
                        <?php echo $webContent->brand_page_heading_2; ?>

                    </p>
                </div>
                <div class="col-lg-6 p-3">
                    <img src="https://ik.imagekit.io/p2slevyg1/Best_Smartphones_US_2022-scaled.jpg?updatedAt=1698830519194" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row row-cols-md-4 row-cols-lg-7 justify-content-center">
                <?php $__empty_1 = true; $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col mb-4">
                    
                    <a href="<?php echo e(route('guest-sell-models', [
                        'category_slug' => $category->slug ?? \Illuminate\Support\Str::slug($category->name),
                        'device_slug'   => $device->slug ?? \Illuminate\Support\Str::slug($device->name),
                    ])); ?>">
                        <div class="card shadow-sm p-3 mb-5 rounded cursor-pointer d-flex justify-content-center align-items-center">
                            <img src="<?php echo e($device->file ?? ''); ?>" class="img-fluid" style="max-height:120px; max-width:140px;">
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="container border rounded p-3 my-3">
        <h2 class="fw-bold"><?php echo $webContent->brand_page_heading_3; ?></h2>
        <p><?php echo e($siteSettings->buisness_name ?? ''); ?> <?php echo $webContent->brand_page_heading_4; ?>.</p>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/sell/device-types.blade.php ENDPATH**/ ?>