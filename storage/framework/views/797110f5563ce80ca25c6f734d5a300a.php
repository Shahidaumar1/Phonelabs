<div>
    <div>
        <h3><?php echo e($model->name ?? ''); ?>

            <?php if($product_spec): ?>
                (<?php echo e($product_spec->memory_size ?? $product_spec->spec_category ?? ''); ?>)
            <?php endif; ?>
        </h3>

        <div class="d-flex justify-content-center my-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link cursor-pointer <?php echo e($editor == 'Detail' ? 'active text-success' : ''); ?>"
                       wire:click="toggleEditor('Detail')">
                        Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cursor-pointer <?php echo e($editor == 'Specification' ? 'active text-success' : ''); ?>"
                       wire:click="toggleEditor('Specification')">
                        Specification
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cursor-pointer <?php echo e($editor == 'Warranty' ? 'active text-success' : ''); ?>"
                       wire:click="toggleEditor('Warranty')">
                        Warranty
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h4>Enter <?php echo e($editor); ?></h4>

            <div>
                <div wire:ignore>
                    <textarea id="editor"></textarea>
                </div>

                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script>
                    let editorInstance = null;

                    function createEditor() {
                        if (editorInstance) {
                            editorInstance.destroy().then(() => {
                                initializeNewEditor();
                            });
                        } else {
                            initializeNewEditor();
                        }
                    }

                    function initializeNewEditor() {
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .then(editor => {
                                editorInstance = editor;

                                // jab bhi ckeditor ka data change ho, Livewire ko bhejo
                                editor.model.document.on('change:data', () => {
                                    window.livewire.find('<?php echo e($_instance->id); ?>').set('content', editor.getData());
                                });

                                // initial content set karo
                                editor.setData(window.livewire.find('<?php echo e($_instance->id); ?>').get('content') ?? '');
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }

                    // har tab change ya product load par yeh event fire hota hai
                    document.addEventListener('livewire:load', () => {
                        Livewire.on('editorTypeChanged', () => {
                            if (editorInstance) {
                                editorInstance.setData(window.livewire.find('<?php echo e($_instance->id); ?>').get('content') ?? '');
                            } else {
                                createEditor();
                            }
                        });
                    });
                </script>
            </div>

            
            <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-xs text-danger d-block"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['specification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-xs text-danger d-block"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-xs text-danger d-block"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="float-end mt-3">
        <button type="button" class="bg-blue text-white" wire:click="save">
            Save Changes
            <span wire:loading wire:target="save">
                <?php if (isset($component)) { $__componentOriginalf26909af655deaf31c8e20175813a5a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf26909af655deaf31c8e20175813a5a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spinner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('spinner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf26909af655deaf31c8e20175813a5a0)): ?>
<?php $attributes = $__attributesOriginalf26909af655deaf31c8e20175813a5a0; ?>
<?php unset($__attributesOriginalf26909af655deaf31c8e20175813a5a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf26909af655deaf31c8e20175813a5a0)): ?>
<?php $component = $__componentOriginalf26909af655deaf31c8e20175813a5a0; ?>
<?php unset($__componentOriginalf26909af655deaf31c8e20175813a5a0); ?>
<?php endif; ?>
            </span>
        </button>
    </div>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/accessories/addon/more-spec.blade.php ENDPATH**/ ?>