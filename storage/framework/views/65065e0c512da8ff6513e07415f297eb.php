<div class="card mt-4">
    <div class="card-header">
        <h5 class="m-0">Google Reviews (Homepage Banner)</h5>
    </div>

    <div class="card-body">
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success mb-3"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="row g-3">
            
            <div class="col-md-3">
                <label class="form-label">Rating (0–5)</label>
                
                <input type="number" step="0.1" min="0" max="5"
                       wire:model="form.rating"
                       class="form-control" placeholder="e.g. 4.9">
                <?php $__errorArgs = ['form.rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="col-md-3">
                <label class="form-label d-block">Stars (auto)</label>

                <?php
                    $previewRating = max(0, min(5, (float) ($form['rating'] ?? 0)));
                    $rounded       = round($previewRating * 2) / 2;   // nearest 0.5
                    $full          = (int) floor($rounded);
                    $half          = (($rounded - $full) >= 0.5) ? 1 : 0;
                    $empty         = 5 - $full - $half;
                ?>

                <div class="d-flex align-items-center gap-2 border rounded px-2 py-2" style="min-height:42px;">
                    <span>
                        <?php for($i=0;$i<$full;$i++): ?>
                            <i class="fa-solid fa-star text-warning"></i>
                        <?php endfor; ?>
                        <?php if($half): ?>
                            <i class="fa-solid fa-star-half-stroke text-warning"></i>
                        <?php endif; ?>
                        <?php for($i=0;$i<$empty;$i++): ?>
                            <i class="fa-regular fa-star text-warning"></i>
                        <?php endfor; ?>
                    </span>
                    <strong><?php echo e(number_format($rounded,1)); ?>/5</strong>
                </div>
                <small class="text-muted">Auto-rounded to nearest 0.5</small>
            </div>

            
            <div class="col-md-3">
                <label class="form-label">Reviews Count</label>
                <input type="number" min="0"
                       wire:model.defer="form.reviews_count"
                       class="form-control" placeholder="e.g. 321">
                <?php $__errorArgs = ['form.reviews_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="col-md-3">
                <label class="form-label">Google Review URL</label>
                <input type="url"
                       wire:model.defer="form.review_url"
                       class="form-control" placeholder="https://g.page/r/... or https://maps.app.goo.gl/...">
                <?php $__errorArgs = ['form.review_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="mt-3 d-flex align-items-center gap-2">
            <button wire:click="save" class="btn btn-primary">
                Save Google Reviews
            </button>
            <span wire:loading wire:target="save">Saving…</span>
        </div>
    </div>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/settings/google-reviews/manage-google-reviews.blade.php ENDPATH**/ ?>