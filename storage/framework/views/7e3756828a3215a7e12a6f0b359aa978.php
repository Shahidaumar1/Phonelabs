<div>
    <?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title' => null,
    'id' => null,
    'size' => 'md',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title' => null,
    'id' => null,
    'size' => 'md',
]); ?>
<?php foreach (array_filter(([
    'title' => null,
    'id' => null,
    'size' => 'md',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
    <style>
        .backdrop {
            position: absolute;
            width: 100%;
            height: 100vh;
            z-index: 9999;
            top: 0;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 18px;
            display: none;
        }

        .custom-modal {
            background: white;
            width: 500px;
            margin: auto;
            border-radius: 5px;
            padding: 18px;

        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .custom-modal {
            animation-name: fadeIn;
            animation-duration: 0.3s;
            animation-timing-function: ease-in;
        }
    </style>

    <?php
        $sizes = [
        'md' => '400px',
        'lg' => '600px',
        'xl' => '800px',
        'full' => '100%',
    ];
    ?>
    <div wire:ignore.self class="backdrop" id="<?php echo e($id); ?>">
        <div class="custom-modal"  style="width:<?php echo e($sizes[$size]); ?>!important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="fw-bold"><?php echo e($title ?? 'Modal Title'); ?></h4>
                    <span style="cursor:pointer" onclick="closeM('<?php echo e($id); ?>')"><i class="fa fa-times"
                            aria-hidden="true"></i></span>
                </div>
                <div class="my-3" style="height:auto; overflow-y:auto">
                    <?php echo e($slot); ?>

                </div>

            </div>
        </div>
    </div>



</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/components/modal.blade.php ENDPATH**/ ?>