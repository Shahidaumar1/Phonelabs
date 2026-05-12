<div>
    <?php if($showModal): ?>
        <div class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inquiry Details</h5>
                        <button type="button" class="close" aria-label="Close" wire:click="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>First Name:</strong> <?php echo e($inquiry->first_name); ?></p>
                        <p><strong>Last Name:</strong> <?php echo e($inquiry->last_name); ?></p>
                        <p><strong>Email:</strong> <?php echo e($inquiry->email); ?></p>
                        <p><strong>Phone:</strong> <?php echo e($inquiry->phone); ?></p>
                        <p><strong>Product Name:</strong> <?php echo e($inquiry->product_name); ?></p>
                        <p><strong>Checkboxes:</strong> <?php echo e(implode(', ', json_decode($inquiry->checkboxes))); ?></p>
                        <p><strong>Other Text:</strong> <?php echo e($inquiry->other_text); ?></p>
                        <p><strong>Existing Customer:</strong> <?php echo e($inquiry->existing_customer ? 'Yes' : 'No'); ?></p>
                        <p><strong>Is Business:</strong> <?php echo e($inquiry->is_business ? 'Yes' : 'No'); ?></p>
                        <p><strong>Brand:</strong> <?php echo e($inquiry->brand); ?></p>
                        <p><strong>Model:</strong> <?php echo e($inquiry->model); ?></p>
                        <p><strong>Additional Description:</strong> <?php echo e($inquiry->additional_description); ?></p>
                        <p><strong>Created At:</strong> <?php echo e($inquiry->created_at); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="close">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    <?php endif; ?>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/inquiry-modal.blade.php ENDPATH**/ ?>