<div>
    <div class="mb-2">
        <strong><?php echo e($category->name ?? ''); ?></strong>
    </div>
    <div class="d-flex gap-2">
        <div class=" border-gray rounded-lg p-1 border cursor-pointer <?php echo e($selectedCondition  == 'Excellent' ? 'bg-success text-white' : 'bg-gray'); ?>" wire:click="selectGrade('Excellent')">Excellent</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer <?php echo e($selectedCondition  == 'Good' ? 'bg-success text-white' : 'bg-gray'); ?>" wire:click="selectGrade('Good')">Good</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer <?php echo e($selectedCondition  == 'Fair' ? 'bg-success text-white' : 'bg-gray'); ?>" wire:click="selectGrade('Fair')">Fair</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer <?php echo e($selectedCondition  == 'Faulty' ? 'bg-success text-white' : 'bg-gray'); ?>" wire:click="selectGrade('Faulty')">Faulty</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer <?php echo e($selectedCondition  == 'Poor' ? 'bg-success text-white' : 'bg-gray'); ?>" wire:click="selectGrade('Poor')">Poor</div>
    </div>
    <div class="my-3">
        <div>
            <h4>Enter  <?php echo e($selectedCondition); ?> Condition Text</h4>
            <div>

                <div wire:ignore>
                    <textarea wire:model.debounce.500="content" id="conditionEditor"></textarea>
                </div>

                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script>
                    let editorInstance = null;

                    function createEditor() {
                        if (editorInstance) {
                            editorInstance.destroy().then(() => {
                                // console.log('Editor destroyed.');
                                initializeNewEditor();
                            });
                        } else {
                            initializeNewEditor();
                        }
                    }

                    function initializeNewEditor() {

                        ClassicEditor
                            .create(document.querySelector('#conditionEditor'))
                            .then(editor => {
                                editorInstance = editor;
                                editor.model.document.on('change:data', () => {
                                    window.livewire.find('<?php echo e($_instance->id); ?>').set('content', editor.getData());
                                });
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }


                    // createEditor();
                    Livewire.on('editorConditionChanged', (content) => {
                        if (editorInstance) {
                            editorInstance.setData(window.livewire.find('<?php echo e($_instance->id); ?>').get('content'));
                        }
                        createEditor();
                    });
                </script>
            </div>

            <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-xs text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="float-end mt-3 ">
        <button type="button" class="bg-blue text-white" wire:click="save" wire:loading.attr="disabled" wire:target="file">
            Save Changes
            <span wire:loading wire:target='save'>
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
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/sell/category/condition-text.blade.php ENDPATH**/ ?>