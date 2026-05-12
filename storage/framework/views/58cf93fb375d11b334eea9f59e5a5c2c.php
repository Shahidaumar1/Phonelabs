<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.top-bar', [])->html();
} elseif ($_instance->childHasBeenRendered('l2647227132-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2647227132-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2647227132-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2647227132-0');
} else {
    $response = \Livewire\Livewire::mount('components.top-bar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2647227132-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l2647227132-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2647227132-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2647227132-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2647227132-1');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2647227132-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <section class="head-sell">
        <div class="container"></div>
    </section>

    <section class="head-sell my-5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 p-3">
                    <p><?php echo $webContent->sell_heading_1; ?><?php echo e($siteSettings->buisness_name ?? ''); ?></p>
                    <h1 style="font-family: heading;"><?php echo $webContent->sell_heading_2; ?></h1>
                    <p><?php echo $webContent->sell_heading_3; ?></p>
                    <p class="lead"><?php echo $webContent->sell_heading_4; ?></p>
                </div>
                <div class="col-lg-6">
                    <img src="https://ik.imagekit.io/2nuimwatr/online-seller-1.jpg?updatedAt=1698831017024" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h1 class="text-center" style="color: #E31E24"><?php echo $webContent->sell_heading_5; ?></h1>
            <hr class="w-25 mx-auto">
            <div class="row justify-content-center" style="margin-left:5%">
                <div class="d-flex flex-wrap align-items-center justify-content-center my-2 gap-3">
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-3 mb-3 mr-4">
                        
                        <a href="<?php echo e(route('guest-sell-device-types', [
                            'category_slug' => $category->slug ?? \Illuminate\Support\Str::slug($category->name),
                        ])); ?>" class="card shah mb-3 mr-3">
                            <img src="<?php echo e($category->file ?? ''); ?>" class="img-thumbnail" style="height:150px;">
                            <div class="icon"><i class="bi bi-tablet"></i></div>
                            <div class="card-body text-dark text-center fs-3">
                                <h4><b><?php echo e($category->name); ?></b></h4>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <style>
            .shah:hover {
                box-shadow: 0 0 15px red;
                transform: scale(1.05);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
        </style>
    </section>

    <section class="mobile">
        <div class="container">
            <h1><?php echo $webContent->sell_heading_6; ?></h1>
            <p>
                How Do I Sell My Mobile Phone? Selling your mobile phone with The <?php echo e($siteSettings->buisness_name ?? ''); ?> is quick, easy, and hassle-free. Follow these simple steps to get started: Step 1: Get an Instant Quote
                Visit our website and click on the "Sell My Phone" button. Select your device's brand, model, and condition from our easy-to-use dropdown menus. Receive an instant quote for your device's value. Our competitive prices ensure you get the best deal. Step 2: Ship Your Device for Free
                Once you accept the quote, we'll send you a free shipping label. Package your phone securely and drop it off at your nearest post office. We cover the shipping costs, so you don't have to worry about any additional expenses. Step 3: Inspection and Payment
                Our experts will inspect your device to ensure it matches the details provided. Once your phone passes inspection, we'll process your payment promptly. You can choose to receive your payment via bank transfer or check. Step 4: Enjoy Your Payment
            </p>
        </div>
    </section>

    <section class="faq mb-5">
        <div class="container">
            <h1><?php echo $webContent->sell_heading_8; ?></h1>
            <p><?php echo e($siteSettings->buisness_name ?? ''); ?> <?php echo $webContent->sell_heading_9; ?></p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion-container rounded-0">
                        <input type="checkbox" class="accordion d-none" id="accordion-1">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom text-center" for="accordion-1">Why should you sell your mobile phone to <?php echo e($siteSettings->buisness_name ?? ''); ?>?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                <?php echo $webContent->sell_heading_11; ?> <?php echo e($siteSettings->buisness_name ?? ''); ?>, but to put it simply; the price you're quoted is the price you will get, and quickly too.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-container rounded-0">
                        <input type="checkbox" class="accordion d-none" id="accordion-3">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom text-center" for="accordion-3">What is the process for recycling phones when I sell them to <?php echo e($siteSettings->buisness_name ?? ''); ?>?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                <?php echo $webContent->sell_heading_15; ?> <?php echo e($siteSettings->buisness_name ?? ''); ?> we recycle it.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-container rounded-0">
                        <input type="checkbox" class="accordion d-none" id="accordion-5">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom text-center" for="accordion-5">How much is my device worth?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                <?php echo $webContent->sell_heading_19; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="accordion-container rounded-0">
                        <input type="checkbox" class="accordion d-none" id="accordion-2">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom text-center" for="accordion-2">Why should I recycle my phone?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                <?php echo $webContent->sell_heading_13; ?>

                            </div>
                        </div>
                    </div>

                    <div class="accordion-container rounded-0">
                        <input type="checkbox" class="accordion d-none" id="accordion-4">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom text-center" for="accordion-4">What will happen to my phone?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                <?php echo $webContent->sell_heading_17; ?> <?php echo e($siteSettings->buisness_name ?? ''); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .label::before { content: '+'; font-weight: 600; float: right; }
        .text-danger { color: #737272 !important; }
        .accordion:checked + .label::before { content: '-' !important; float: right !important; }
        .content { display: none; background-color: white !important; padding: 10px; }
        .accordion:checked + .label + .content { display: block; }
        .bg-danger { background-color: #E31E24 !important; }
    </style>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/sell/categories.blade.php ENDPATH**/ ?>