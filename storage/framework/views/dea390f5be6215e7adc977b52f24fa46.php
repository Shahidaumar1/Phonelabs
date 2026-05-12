<div class="mb-3 row">
    <div class="col-12">
        <div class="mb-2">
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
        </div>

        <div class="d-flex justify-content-start gap-4 align-items-center flex-wrap">

            
            <div>
                <button type="button"
                        onclick="document.getElementById('input-file').click()"
                        class="btn btn-success">
                    <i class="bi bi-upload me-1"></i> Import Products
                </button>
                <input type="file" id="input-file" wire:model="excel_file" hidden />
                <br>
                <span wire:loading wire:target="excel_file" class="text-muted small ms-1">
                    <i class="bi bi-hourglass-split"></i> Importing…
                </span>
                <?php $__errorArgs = ['excel_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger text-xs ms-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
 
            
            <div>
                <button type="button" wire:click="export" class="btn btn-primary">
                    <i class="bi bi-download me-1"></i> Export Products
                </button>
                <br>
                <span wire:loading wire:target="export" class="text-muted small ms-1">
                    <i class="bi bi-hourglass-split"></i> Exporting…
                </span>
                <?php $__errorArgs = ['export_excel_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger text-xs ms-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div>
                <button type="button" wire:click="printPrices" class="btn btn-warning text-dark">
                    <i class="bi bi-printer me-1"></i> Print Prices
                </button>
            </div>

            
            <div>
                <?php if($template): ?>
                    <div class="d-flex gap-2 align-items-center">
                        <button type="button"
                                wire:click="downloadTemplate"
                                class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-file-earmark-arrow-down me-1"></i> Download Template
                        </button>
                        <a href="javascript:void(0)"
                           wire:click="deleteTemplate"
                           class="text-danger"
                           title="Delete template">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </div>
                    <span wire:loading wire:target="downloadTemplate" class="text-muted small ms-1">
                        Downloading…
                    </span>
                <?php else: ?>
                    <span class="text-primary"
                          style="cursor:pointer"
                          onclick="document.getElementById('template-input').click()">
                        <i class="bi bi-upload me-1"></i> Upload Template
                    </span>
                    <input type="file" wire:model="template_file" id="template-input" hidden />
                    <br>
                    <span wire:loading wire:target="template_file" class="text-muted small ms-1">
                        Uploading…
                    </span>
                    <?php $__errorArgs = ['template_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger text-xs ms-1"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>


<script>
    window.addEventListener('open-print-page', function (event) {
        window.open(event.detail.url, '_blank');
    });
</script><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/repair/repair-price/components/import-export.blade.php ENDPATH**/ ?>