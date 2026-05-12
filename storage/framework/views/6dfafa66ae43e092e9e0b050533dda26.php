<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.top-bar', [])->html();
} elseif ($_instance->childHasBeenRendered('l1726717490-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1726717490-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1726717490-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1726717490-0');
} else {
    $response = \Livewire\Livewire::mount('components.top-bar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1726717490-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l1726717490-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1726717490-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1726717490-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1726717490-1');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1726717490-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div>
        <section class="head-sell">
            <div class="container"></div>
        </section>

        <div class="container">
            <section class="fech">
                <div class="container">

                    <div class="row align-items-center">
                        <div class="col-2 col-sm-1 myarrow">
                            
                            <a href="<?php echo e(route('guest-sell-device-types', [
                                'category_slug' => $device->category->slug ?? \Illuminate\Support\Str::slug($device->category->name ?? 'phones'),
                            ])); ?>">
                                <img src="https://ik.imagekit.io/b6iqka2sz/ali.png?updatedAt=1709054945643" alt="Back"
                                    class="img-fluid" style="max-width: 100%; height: auto;">
                            </a>
                        </div>
                        <div class="col-10 col-sm-11">
                            <div class="d-flex flex-wrap gap-2 p-3 rounded my-3 shadow-sm justify-content-center justify-content-md-start">
                                <h1 class="fw-bold text-dark text-center text-md-start my-3">
                                    Choose Model Of <span class="text-danger"><?php echo e($device->name ?? ''); ?></span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <style>
                        .shah { transition: border-color 0.3s ease-in-out !important; height: 250px !important; }
                        .shah:hover { border-color: #dc3545 !important; box-shadow: 0 0 40px #dc3545 !important; cursor: pointer !important; }
                    </style>

                    <div class="container">

                        
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" id="modelSearch" class="form-control rounded-pill" placeholder="Search by Model Name">
                                        <button class="btn btn-outline-secondary rounded-pill" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            // ✅ Slugs ek baar yahan calculate karo — dono grids use karengi
                            $catSlugForModel = $device->category->slug
                                ?? \Illuminate\Support\Str::slug($device->category->name ?? 'phones');
                            $devSlugForModel = $device->slug
                                ?? \Illuminate\Support\Str::slug($device->name ?? 'device');
                        ?>

                        
                        <div class="row row-cols-2 d-none d-md-flex d-lg-flex row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-1 gx-0 gy-2" id="modelContainer">
                            <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col model-card">
                                <div class="card shah my-2 cursor-pointer align-items-center justify-content-center pt-2">
                                    
                                    <a href="<?php echo e(route('guest-sell-model-detail', [
                                        'category_slug' => $catSlugForModel,
                                        'device_slug'   => $devSlugForModel,
                                        'model_slug'    => $model->slug ?? $model->id,
                                    ])); ?>">
                                        <div class="card-body">
                                            <img src="<?php echo e($model->file ?? ''); ?>" class="card-img-top img-fluid p-1" style="max-height:150px; max-width:150px;">
                                            <h6 class="card-title text-center text-lg-sm" style="font-size: 15px;"><?php echo e($model->name); ?></h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col">
                                <span class="text-danger">Not Found</span>
                            </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="row row-cols-2 d-md-none d-lg-none row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-1 gx-0 gy-2">
                            <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col model-card">
                                <div class="card my-2 cursor-pointer align-items-center justify-content-center pt-2">
                                    
                                    <a href="<?php echo e(route('guest-sell-model-detail', [
                                        'category_slug' => $catSlugForModel,
                                        'device_slug'   => $devSlugForModel,
                                        'model_slug'    => $model->slug ?? $model->id,
                                    ])); ?>">
                                        <img src="<?php echo e($model->file ?? ''); ?>" class="card-img-top img-fluid p-1" style="max-height:150px; max-width:150px;">
                                    </a>
                                    <div class="card-body">
                                        <h6 class="card-title text-center text-lg-sm" style="font-size: 12px;"><?php echo e($model->name); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col">
                                <span class="text-danger">Not Found</span>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>

                    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
                    <script>
                        function searchModels() {
                            var input = document.getElementById('modelSearch');
                            var filter = input.value.toUpperCase();
                            var container = document.getElementById('modelContainer');
                            var modelCards = container.getElementsByClassName('model-card');
                            for (var i = 0; i < modelCards.length; i++) {
                                var modelName = modelCards[i].getElementsByClassName("card-title")[0];
                                if (modelName.innerText.toUpperCase().indexOf(filter) > -1) {
                                    modelCards[i].style.display = "";
                                } else {
                                    modelCards[i].style.display = "none";
                                }
                            }
                        }
                        document.getElementById('modelSearch').addEventListener('keyup', searchModels);
                    </script>

                </div>
            </section>

            <div class="container border rounded p-3 my-3">
                <h2 class="fw-bold">How do I sell my mobile phone?</h2>
                <p><?php echo e($siteSettings->buisness_name ?? ''); ?> has made selling your mobile phones surprisingly easy and
                    extremely fast. We know you'll be pleasantly surprised
                    with the brilliant prices we offer and we're absolutely sure you'll be amazed with the simplicity
                    and speed of our service.</p>
                <p>We're here to help you recycle your phone. Whether you want to sell your iPhone to upgrade to the
                    latest Apple smartphone or want to trade in an old Android device for the latest Samsung.</p>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/sell/models.blade.php ENDPATH**/ ?>