<div class="d-flex">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'staff'])->html();
} elseif ($_instance->childHasBeenRendered('l294121550-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l294121550-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l294121550-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l294121550-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'staff']);
    $html = $response->html();
    $_instance->logRenderedChild('l294121550-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php if (isset($component)) { $__componentOriginald033566f468fc7bb3a8d0f946fdab616 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald033566f468fc7bb3a8d0f946fdab616 = $attributes; } ?>
<?php $component = App\View\Components\Content::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Content::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div>

            
            <?php if($successMessage): ?>
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-check-circle me-2"></i><?php echo e($successMessage); ?>

                    <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
                </div>
            <?php endif; ?>
            <?php if($errorMessage): ?>
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i><?php echo e($errorMessage); ?>

                    <button type="button" class="btn-close" wire:click="$set('errorMessage', '')"></button>
                </div>
            <?php endif; ?>

            <div class="container my-5">

                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold mb-1" style="color: #20375D;">Staff Management</h4>
                        <p class="text-muted mb-0 small">Manage your admin staff members</p>
                    </div>
                    <button
                        wire:click="toggleForm"
                        class="btn px-4 py-2 fw-semibold"
                        style="background-color: #20375D; color: white; border-radius: 10px;">
                        <i class="fa <?php echo e($showForm ? 'fa-times' : 'fa-plus'); ?> me-2"></i>
                        <?php echo e($showForm ? 'Cancel' : 'Add New Staff'); ?>

                    </button>
                </div>

                
                <?php if($showForm): ?>
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; background-color: #f8f9ff;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-4" style="color: #20375D;">
                            <i class="fa fa-user-plus me-2"></i>
                            <?php echo e($editingId ? 'Edit Staff Member' : 'Add New Staff Member'); ?>

                        </h6>

                        <div class="row g-3">
                            
                            <div class="col-12">
                                <label class="form-label fw-semibold" style="color: #20375D;">
                                    Profile Photo <small class="text-muted fw-normal">(optional)</small>
                                </label>
                                <div class="d-flex align-items-center gap-3">
                                    <?php if($photo): ?>
                                        <img src="<?php echo e($photo->temporaryUrl()); ?>"
                                             class="rounded-circle"
                                             style="width:70px; height:70px; object-fit:cover; border: 3px solid #C0C0EF;">
                                    <?php elseif($editingId): ?>
                                        <?php $editUser = collect($staffList)->firstWhere('id', $editingId); ?>
                                        <?php if(!empty($editUser['profile_photo_path'])): ?>
                                            <img src="<?php echo e(asset('storage/' . $editUser['profile_photo_path'])); ?>"
                                                 class="rounded-circle"
                                                 style="width:70px; height:70px; object-fit:cover; border: 3px solid #C0C0EF;">
                                        <?php else: ?>
                                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                                 style="width:70px; height:70px; background-color:#C0C0EF; color:#20375D; font-size:22px;">
                                                <?php echo e(strtoupper(substr($editUser['name'] ?? 'S', 0, 1))); ?>

                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                                             style="width:70px; height:70px; background-color:#e9ecef; color:#aaa; font-size:22px;">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    <?php endif; ?>

                                    <div>
                                        <input type="file"
                                               wire:model="photo"
                                               accept="image/*"
                                               class="form-control <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               style="border-radius: 10px; border: 1px solid #C0C0EF; max-width: 300px;">
                                        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <small class="text-muted">Max 2MB. JPG, PNG allowed.</small>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">Full Name</label>
                                <input type="text" wire:model.defer="name"
                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Enter full name"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">Email Address</label>
                                <input type="email" wire:model.defer="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Enter email address"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">
                                    Password
                                    <?php if($editingId): ?> <small class="text-muted fw-normal">(blank = keep current)</small> <?php endif; ?>
                                </label>
                                <input type="password" wire:model.defer="password"
                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e($editingId ? 'Leave blank to keep current' : 'Min 8 characters'); ?>"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #20375D;">Confirm Password</label>
                                <input type="password" wire:model.defer="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm password"
                                    style="border-radius: 10px; border: 1px solid #C0C0EF;">
                            </div>

                            
                            <div class="col-12">
                                <button wire:click="saveStaff" wire:loading.attr="disabled"
                                    class="btn px-4 py-2 fw-semibold"
                                    style="background-color: #29C01E; color: white; border-radius: 10px;">
                                    <span wire:loading wire:target="saveStaff">
                                        <span class="spinner-border spinner-border-sm me-2"></span>Saving...
                                    </span>
                                    <span wire:loading.remove wire:target="saveStaff">
                                        <i class="fa fa-save me-2"></i><?php echo e($editingId ? 'Update Staff' : 'Add Staff'); ?>

                                    </span>
                                </button>
                                <button wire:click="toggleForm"
                                    class="btn px-4 py-2 fw-semibold ms-2"
                                    style="background-color: #e9ecef; color: #20375D; border-radius: 10px;">
                                    <i class="fa fa-times me-2"></i>Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                
                <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                    <div class="card-body p-0">
                        <?php if(count($staffList) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3" style="background-color: #C0C0EF;">#</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Photo</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Name</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Email</th>
                                            <th class="py-3" style="background-color: #C0C0EF;">Created</th>
                                            <th class="py-3 text-center" style="background-color: #C0C0EF;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $staffList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-4 py-3 text-muted"><?php echo e($index + 1); ?></td>
                                            <td class="py-3">
                                                <?php if(!empty($staff['profile_photo_path'])): ?>
                                                    <img src="<?php echo e(asset('storage/' . $staff['profile_photo_path'])); ?>"
                                                         class="rounded-circle"
                                                         style="width:42px; height:42px; object-fit:cover; border: 2px solid #C0C0EF;">
                                                <?php else: ?>
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                                         style="width:42px; height:42px; background-color:#C0C0EF; color:#20375D; font-size:16px;">
                                                        <?php echo e(strtoupper(substr($staff['name'], 0, 1))); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="py-3 fw-semibold" style="color: #20375D;"><?php echo e($staff['name']); ?></td>
                                            <td class="py-3 text-muted"><?php echo e($staff['email']); ?></td>
                                            <td class="py-3 text-muted">
                                                <?php echo e(\Carbon\Carbon::parse($staff['created_at'])->format('d M Y')); ?>

                                            </td>
                                            <td class="py-3 text-center">
                                                <button wire:click="editStaff(<?php echo e($staff['id']); ?>)"
                                                    class="btn btn-sm px-3 me-1"
                                                    style="background-color: #C0C0EF; color: #20375D; border-radius: 8px;">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <button wire:click="deleteStaff(<?php echo e($staff['id']); ?>)"
                                                    onclick="return confirm('Delete this staff member?')"
                                                    class="btn btn-sm px-3"
                                                    style="background-color: #fee2e2; color: #dc2626; border-radius: 8px;">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-5">
                                <i class="fa fa-users fa-3x mb-3" style="color: #C0C0EF;"></i>
                                <p class="text-muted">No staff members added yet.</p>
                                <button wire:click="toggleForm"
                                    class="btn px-4 py-2 fw-semibold"
                                    style="background-color: #20375D; color: white; border-radius: 10px;">
                                    <i class="fa fa-plus me-2"></i>Add First Staff Member
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald033566f468fc7bb3a8d0f946fdab616)): ?>
<?php $attributes = $__attributesOriginald033566f468fc7bb3a8d0f946fdab616; ?>
<?php unset($__attributesOriginald033566f468fc7bb3a8d0f946fdab616); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald033566f468fc7bb3a8d0f946fdab616)): ?>
<?php $component = $__componentOriginald033566f468fc7bb3a8d0f946fdab616; ?>
<?php unset($__componentOriginald033566f468fc7bb3a8d0f946fdab616); ?>
<?php endif; ?>
</div> 
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/add-staff.blade.php ENDPATH**/ ?>