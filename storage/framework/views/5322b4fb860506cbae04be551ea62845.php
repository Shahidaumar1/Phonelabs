<div class="d-flex">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings'])->html();
} elseif ($_instance->childHasBeenRendered('l1523044342-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1523044342-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1523044342-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1523044342-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'settings']);
    $html = $response->html();
    $_instance->logRenderedChild('l1523044342-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'site-settings'])->html();
} elseif ($_instance->childHasBeenRendered('l1523044342-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1523044342-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1523044342-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1523044342-1');
} else {
    $response = \Livewire\Livewire::mount('admin.settings.components.top-nav', ['active' => 'site-settings']);
    $html = $response->html();
    $_instance->logRenderedChild('l1523044342-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div>
                            <img style="max-width: 210px; height: 61px;" id="selectedImage" wire:ignore src="<?php echo e(asset($siteSetting->logo)); ?>" alt="web site logo" />
                        </div>
                        <div class="btn btn-primary btn-rounded mt-3" style="background-color: #E4E7E9; color: black; border: 1px solid #212059; padding: 10px 56px">
                            <label class="form-label m-1" for="customFile1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                                </svg> Choose Logo
                            </label>
                            <input type="file" wire:model="logo" class="form-control d-none" id="customFile1" name="logo" accept="image/*" onchange="displaySelectedImage(event, 'selectedImage')" />
                            <span wire:loading wire:target="logo">loading...</span>
                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div>
                            <img style="max-width: 60px;" id="selectedFav" wire:ignore src="<?php echo e(asset($siteSetting->favicon)); ?>" alt="web site Favicon" />
                        </div>
                        <div class="btn btn-primary btn-rounded mt-3" style="background-color: #E4E7E9; color: black; border: 1px solid #212059; padding: 10px 56px">
                            <label class="form-label m-1" for="customFile">
                                Choose fav
                                <div class="tooltip-container">
                                    <span class="tooltip-trigger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                        </svg>
                                    </span>
                                    <div class="tooltip-content" style="border-radius: 30px; min-width: 200px;">
                                        <p>What’s Fav</p>
                                        <img src="https://ik.imagekit.io/4csyk445b/Screenshot%202024-04-05%20154440.png?updatedAt=1712320570090" alt="Tooltip Image">
                                        <p>image displayed next to <br> the page title in the <br>browser tab</p>
                                    </div>
                                </div>
                            </label>
                            <input type="file" class="form-control d-none" wire:model="favicon" id="customFile" name="fav" accept="image/*" onchange="displaySelectedFav(event, 'selectedFav')" />
                            <span wire:loading wire:target="favicon">loading...</span>
                            <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <script>
                    function displaySelectedImage(event, elementId) {
                        const selectedImage = document.getElementById(elementId);
                        const fileInput = event.target;
                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                selectedImage.src = e.target.result;
                            };
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }

                    function displaySelectedFav(event, elementId) {
                        const selectedFav = document.getElementById(elementId);
                        const fileInput = event.target;
                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                selectedFav.src = e.target.result;
                            };
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }
                </script>
            </div>

            <form wire:submit.prevent="updateSiteSettings">
                <?php echo csrf_field(); ?>
                <div class="mt-5">
                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="buisness_name" class="form-label">Business Name:</label>
                            <input type="text" wire:model="siteSetting.buisness_name" class="form-control" id="buisness_name" placeholder="Enter Business Name">
                            <?php $__errorArgs = ['siteSetting.buisness_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label for="website_url" class="form-label">Website URL:</label>
                            <input type="url" wire:model="siteSetting.website_url" class="form-control" id="website_url" placeholder="Enter Website URL">
                            <?php $__errorArgs = ['siteSetting.website_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                         <div class="col-md-4">
        <label for="whatsapp_number" class="form-label">WhatsApp Number:</label>
        <input type="text" wire:model="siteSetting.whatsapp_number" class="form-control" id="whatsapp_number" placeholder="e.g. +447123456789">
    </div>
                    </div>
                    
 <!-- Adding Repair Time and Warranty Boxes -->
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-4">
                        <label for="repair_time" class="form-label">Repair Time (in minutes):</label>
                        <input type="text" wire:model="siteSetting.repair_time" class="form-control" id="repair_time" placeholder="Enter Repair Time">
                        <?php $__errorArgs = ['siteSetting.repair_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4">
                        <label for="warranty" class="form-label">Warranty:</label>
                        <input type="text" wire:model="siteSetting.warranty" class="form-control" id="warranty" placeholder="Enter Warranty">
                        <?php $__errorArgs = ['siteSetting.warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div> 

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="fb_link" class="form-label">Facebook Link:</label>
                            <input type="url" wire:model="siteSetting.fb_link" class="form-control" id="fb_link" placeholder="Enter Facebook Link">
                            <?php $__errorArgs = ['siteSetting.fb_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.fb_link_status" id="fb_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="fb_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="insta_link" class="form-label">Instagram Link:</label>
                            <input type="url" wire:model="siteSetting.insta_link" class="form-control" id="insta_link" placeholder="Enter Instagram Link">
                            <?php $__errorArgs = ['siteSetting.insta_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.insta_link_status" id="insta_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class termes-de-service="form-check-label" for="insta_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="linkedin_link" class="form-label">LinkedIn Link:</label>
                            <input type="url" wire:model="siteSetting.linkedin_link" class="form-control" id="linkedin_link" placeholder="Enter LinkedIn Link">
                            <?php $__errorArgs = ['siteSetting.linkedin_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.linkedin_link_status" id="linkedin_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="linkedin_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="twitter_link" class="form-label">Twitter Link:</label>
                            <input type="url" wire:model="siteSetting.twitter_link" class="form-control" id="twitter_link" placeholder="Enter Twitter Link">
                            <?php $__errorArgs = ['siteSetting.twitter_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.twitter_link_status" id="twitter_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="twitter_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="tiktok_link" class="form-label">TikTok Link:</label>
                            <input type="url" wire:model="siteSetting.tiktok_link" class="form-control" id="tiktok_link" placeholder="Enter TikTok Link">
                            <?php $__errorArgs = ['siteSetting.tiktok_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.tiktok_link_status" id="tiktok_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="tiktok_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="snapchat_link" class="form-label">Snapchat Link:</label>
                            <input type="url" wire:model="siteSetting.snapchat_link" class="form-control" id="snapchat_link" placeholder="Enter Snapchat Link">
                            <?php $__errorArgs = ['siteSetting.snapchat_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-check form-switch mt-2">
                                <label class="form-check-label">Status</label>
                                <input class="form-check-input" type="checkbox" role="switch" wire:model="siteSetting.snapchat_link_status" id="snapchat_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="google_map_profile_link" class="form-label">Google Map Profile Link:</label>
                            <input type="url" wire:model="siteSetting.google_map_profile_link" class="form-control" id="google_map_profile_link" placeholder="Enter Google Map Profile Link">
                            <?php $__errorArgs = ['siteSetting.google_map_profile_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.google_map_profile_link_status" id="google_map_profile_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="google_map_profile_link_status">Status</label>
                            </div>
                        </div>
                    </div>
                    
                    

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.settings.google-reviews.manage-google-reviews', [])->html();
} elseif ($_instance->childHasBeenRendered('l1523044342-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l1523044342-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1523044342-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1523044342-2');
} else {
    $response = \Livewire\Livewire::mount('admin.settings.google-reviews.manage-google-reviews', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1523044342-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="map_link" class="form-label">Map Link:</label>
                            <textarea rows="10" wire:model="siteSetting.map_link" class="form-control" id="map_link" placeholder="Enter Map Embedded code"></textarea>
                            <?php $__errorArgs = ['siteSetting.map_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 pb-5">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Update Site Settings</button>
                            <span wire:loading wire:target="updateSiteSettings">saving...</span>
                        </div>
                        <div class="col-auto">
                            <?php
                            $firstBranch = \App\Models\Branch::first();
                            $hasBranches = $firstBranch !== null;
                            ?>
                            <a href="<?php echo e($hasBranches ? route('edit-branches', ['branchId' => $firstBranch->id]) : route('create-branches')); ?>" class="text-white item m-1">
                                <button type="button" class="btn btn-primary">
                                    <?php echo e($hasBranches ? 'Edit Main Branch' : 'Create Main Branch'); ?>

                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="m-4"><?php echo $siteSetting->map_link; ?></div>
            <div class="row mt-3 justify-content-center">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.manage-emails', [])->html();
} elseif ($_instance->childHasBeenRendered('l1523044342-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l1523044342-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1523044342-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1523044342-3');
} else {
    $response = \Livewire\Livewire::mount('admin.manage-emails', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1523044342-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
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

<!-- Include jQuery and Bootstrap Switch -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof jQuery !== 'undefined' && jQuery.fn.bootstrapSwitch) {
            jQuery('[data-toggle="switch"]').bootstrapSwitch();
        } else {
            console.error('jQuery or Bootstrap Switch is not loaded.');
        }
    });
</script>

<style>
.button-sticky {
    height: 60px;
    color: white;
    font-family: sans-serif;
    font-size: 15px;
    line-height: 15px;
    text-align: center;
    position: fixed !important;
    bottom: -2px;
    z-index: 999;
    width: 100%;
}
.home-btn:hover {
    color: orange;
}
.button-sticky .col-2 {
    margin-right: 5px;
}
.tooltip-container {
    position: relative;
    display: inline-block;
}
.tooltip-content {
    visibility: hidden;
    position: absolute;
    z-index: 1;
    background-color: #334155;
    padding: 10px;
    border: 1px solid #ccc;
    color: white;
    top: calc(100% + 10px);
    left: 50%;
    transform: translateX(-50%);
}
.tooltip-content img {
    max-width: 200px;
    border-radius: 10px;
}
.tooltip-container:hover .tooltip-content {
    visibility: visible;
}
</style>

<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row">
        <div class="col-2 mt-4 ml-1">
            <a href="<?php echo e(route('payment-methods-settings')); ?>" class="text-white item">Payment</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('site-settings')); ?>" class="text-white item">site-settings</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('branches-settings')); ?>" class="text-white item">Branches</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('create-branches')); ?>" class="text-white item">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="<?php echo e(route('services-settings')); ?>" class="text-white item">Services</a>
        </div>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/settings/site-settings/site-settings.blade.php ENDPATH**/ ?>