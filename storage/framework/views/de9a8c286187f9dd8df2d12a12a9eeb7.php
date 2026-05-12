<div>
    <div class="d-flex" style="min-height:100vh; background:#f4f6f9;">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'newsletter'])->html();
} elseif ($_instance->childHasBeenRendered('l2754767154-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2754767154-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2754767154-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2754767154-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'newsletter']);
    $html = $response->html();
    $_instance->logRenderedChild('l2754767154-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <div style="flex:1; padding:30px; overflow-y:auto;">

            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 style="color:#20375D; font-weight:700; margin:0;">Newsletter Subscribers</h3>
                <span style="background:#20375D; font-size:14px; padding:8px 16px; border-radius:20px; color:white; font-weight:600;">
                    Total: <?php echo e($emails->count()); ?>

                </span>
            </div>

            
            <div class="row g-2 mb-4">
                <div class="col-md-4">
                    <input type="text"
                        wire:model.live.debounce.400ms="search"
                        class="form-control"
                        placeholder="Search by email...">
                </div>
                <div class="col-md-3">
                    <label class="form-label mb-1" style="font-size:12px; color:#666;">From Date</label>
                    <input type="date" wire:model.live="start_date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label mb-1" style="font-size:12px; color:#666;">To Date</label>
                    <input type="date" wire:model.live="end_date" class="form-control">
                </div>
                <!--<div class="col-md-2 d-flex align-items-end">-->
                <!--    <button wire:click="$set('search', '')" class="btn w-100 btn-outline-secondary">-->
                <!--        Reset-->
                <!--    </button>-->
                <!--</div>-->
            </div>

            
            <?php if($broadcastSuccess): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo e($broadcastSuccess); ?>

                    <button type="button" class="btn-close" wire:click="$set('broadcastSuccess', '')"></button>
                </div>
            <?php endif; ?>

            
            <div class="table-responsive mb-5">
                <table class="table table-hover table-striped">
                    <thead style="background:#C0C0EF;">
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Subscribed On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($subscriber->email); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($subscriber->created_at)->format('d M Y, h:i A')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                <i class="fa fa-inbox fa-3x text-muted mb-2"></i>
                                <p class="text-muted">No subscribers found.</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div class="card shadow-sm border-0">
                <div class="card-header text-white" style="background:#20375D;">
                    <h5 class="mb-0">
                        <i class="fa fa-paper-plane me-2"></i> Send Broadcast Email to All Subscribers
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject</label>
                        <input type="text" wire:model="subject" class="form-control" placeholder="Email subject">
                        <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message</label>
                        <textarea wire:model="message" class="form-control" rows="5" placeholder="Write your message here..."></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button wire:click="sendBroadcast" class="btn text-white" style="background:#20375D;">
                        <span wire:loading.remove wire:target="sendBroadcast">
                            <i class="fa fa-paper-plane me-1"></i> Send to All (<?php echo e($emails->count()); ?> subscribers)
                        </span>
                        <span wire:loading wire:target="sendBroadcast">Sending...</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/emails/index.blade.php ENDPATH**/ ?>