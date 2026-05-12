<section style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="repair-types ">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', ['theme' => 'white'])->html();
} elseif ($_instance->childHasBeenRendered('l3118645666-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3118645666-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3118645666-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3118645666-0');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', ['theme' => 'white']);
    $html = $response->html();
    $_instance->logRenderedChild('l3118645666-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <div class="container">
        <div class="text-center my-4 w-75 mx-auto">
            <h2 class="text-danger">Prices to Repair Your Devices</h2>
            <p>Bring your ailing tech to fone doctors, where we’ll diagnose what’s wrong and nurse your sick device back
                to
                health Our provisional prices below are for our most common repairs, but if you can’t find your device
                or
                repair, please get in touch and we’ll be happy to give a no-obligation quote</p>
            <p>What we can’t put a price on is the awesome service which our patients love And yes, we are really THAT
                cheesy…😉</p>
        </div>

        <div class="mb-5 ">

            <div class="dropdown mb-3 text-center ">
                <button class="btn btn-sm btn-secondary rounded dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo e($selectedDeviceType->name ?? 'Please select your Device Type'); ?>

                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php $__currentLoopData = $device_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li wire:click="loadModalWithPrice('<?php echo e($device_type->id); ?>')"><a class="dropdown-item"
                                href="javascript:void(0)"><?php echo e($device_type->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
            </div>
            <div class="mb-3 text-center  ">
                <strong class="text-danger " wire:loading.remove>
                    <?php echo e($selectedDeviceType->name); ?>

                </strong>
                <strong wire:loading><?php if (isset($component)) { $__componentOriginalf26909af655deaf31c8e20175813a5a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf26909af655deaf31c8e20175813a5a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spinner','data' => ['color' => 'dark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('spinner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'dark']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf26909af655deaf31c8e20175813a5a0)): ?>
<?php $attributes = $__attributesOriginalf26909af655deaf31c8e20175813a5a0; ?>
<?php unset($__attributesOriginalf26909af655deaf31c8e20175813a5a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf26909af655deaf31c8e20175813a5a0)): ?>
<?php $component = $__componentOriginalf26909af655deaf31c8e20175813a5a0; ?>
<?php unset($__componentOriginalf26909af655deaf31c8e20175813a5a0); ?>
<?php endif; ?></strong>
            </div>
            
            <?php if($selectedDeviceType): ?>
                <div class="d-flex gap-2 flex-wrap justify-content-center white-cards ">
                    <?php $__currentLoopData = $modals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $d = App\Helpers\SeoUrl::encodeUrl($selectedDeviceType->name);
                            $m = App\Helpers\SeoUrl::encodeUrl($modal->name);
                        ?>

                        <div class="card">
                            <a href="<?php echo e(route('repair-types', ['device' => $d, 'modal' => $m])); ?>">
                                <div class="card-header"><?php echo e($modal->name); ?></div>
                            </a>
                            <div class="card-body">
                                <?php $__currentLoopData = $selectedDeviceType->repair_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $price = $modal->prices->where('repair_type_id', $repair_type->id)->first();
                                        $d = App\Helpers\SeoUrl::encodeUrl($selectedDeviceType->name);
                                        $m = App\Helpers\SeoUrl::encodeUrl($modal->name);
                                        $r = App\Helpers\SeoUrl::encodeUrl($repair_type->name);
                                    ?>
                                    <a
                                        href="<?php echo e(route('repair-detail', ['device' => $d, 'modal' => $m, 'repair' => $r])); ?>">
                                        <div class="d-flex justify-content-between ">
                                            <span class="repair-name"><?php echo e($repair_type->name); ?></span>
                                            <?php if($price): ?>
                                                <strong
                                                    class="fw-bold text-black">£<?php echo e(number_format($price->price, 2)); ?></strong>
                                            <?php else: ?>
                                                <strong class="fw-bold text-black">---</strong>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/price/index.blade.php ENDPATH**/ ?>