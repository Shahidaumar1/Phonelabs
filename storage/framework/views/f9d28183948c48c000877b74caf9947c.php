  
<div class="rounded-lg" style="min-width: 20%; min-height: 700px; color: blue; background-color: #C0C0EF;" id="leftDrawer">
    <div class="p-4" style="background-color: #C0C0EF; color: #20375D !important;">
        <a href="/">
            <h3 class="text-black" style="color: #20375D !important;">Admin Panel</h3>
        </a>
    </div>
    <div class="d-flex flex-column" style="color: black; background-color: #C0C0EF; color: #20375D !important;">
         <?php
    $fixForm = $formStatuses->where('name', 'fix_form')->first();
        ?>

        <?php if($formStatuses[4]->buy): ?>
        <div class="custom-start <?php echo e($active == 'buy' ? 'custom-color' : ''); ?> d-flex custom-start align-items-center">
            <a href="<?php echo e(route('buy-categories')); ?>" class="text-white d-flex flex-fill gap-2 align-items-center py-2 px-4">
                <i class="fa fa-shopping-bag"></i>
                <span>Buy</span>
            </a>
            <div class="form-check form-switch d-flex align-items-center">
                <input class="form-check-input" role="switch" type="checkbox" style="width: 40px; background-color:#29C01E;" wire:click="toggleStatus(<?php echo e($formStatuses[4]->id); ?>, 'buy')" <?php echo e($formStatuses[4]->buy ? 'checked' : ''); ?> />
            </div>
        </div>
        <?php endif; ?>

        <?php if($formStatuses[4]->sell): ?>
        <div class="custom-start <?php echo e($active == 'sell' ? 'custom-color' : ''); ?> d-flex custom-start align-items-center">
            <a href="<?php echo e(route('sell-categories')); ?>" class="text-white d-flex flex-fill gap-2 align-items-center py-2 px-4">
                <i class="fa fa-shopping-cart"></i>
                <span>Sell</span>
            </a>
            <div class="form-check form-switch d-flex align-items-center">
                <input class="form-check-input" role="switch" type="checkbox" style="width: 40px; background-color:#29C01E;" wire:click="toggleStatus(<?php echo e($formStatuses[4]->id); ?>, 'sell')" <?php echo e($formStatuses[4]->sell ? 'checked' : ''); ?> />
            </div>
        </div>
        <?php endif; ?>

        <?php if($formStatuses[4]->repair): ?>
        <div class="custom-start <?php echo e($active == 'repair' ? 'custom-color' : ''); ?> d-flex custom-start align-items-center">
            <a href="<?php echo e(route('repair-categories')); ?>" class="text-white d-flex flex-fill gap-2 align-items-center py-2 px-4">
                <i class="fa fa-wrench"></i>
                <span>Repair</span>
            </a>
            <div class="form-check form-switch d-flex align-items-center">
                <input class="form-check-input" role="switch" type="checkbox" style="width: 40px; background-color:#29C01E;" wire:click="toggleStatus(<?php echo e($formStatuses[4]->id); ?>, 'repair')" <?php echo e($formStatuses[4]->repair ? 'checked' : ''); ?> />
            </div>
        </div>
        <?php endif; ?>

       <?php if($fixForm && $fixForm->accessories): ?>
<div class="custom-start <?php echo e($active == 'accessories' ? 'custom-color' : ''); ?> d-flex custom-start align-items-center">
    <a href="<?php echo e(route('accessories-categories')); ?>" class="text-white d-flex flex-fill gap-2 align-items-center py-2 px-4">
        <i class="fa fa-shopping-bag"></i>
        <span>Accessories</span>
    </a>
    <div class="form-check form-switch d-flex align-items-center">
        <input class="form-check-input" role="switch" type="checkbox" style="width: 40px; background-color:#29C01E;"
               wire:click="toggleStatus(<?php echo e($fixForm->id); ?>, 'accessories')"
               <?php echo e($fixForm->accessories ? 'checked' : ''); ?> />
    </div>
</div>
<?php endif; ?>


        <div class="custom-start <?php echo e($active == 'orders' ? 'custom-color' : ''); ?> custom-start align-items-center">
            <a href="<?php echo e(route('orders')); ?>" class="text-white d-flex gap-2 align-items-center py-2 px-4">
                <i class="fa fa-signal"></i>
                <span>Orders</span>
            </a>
        </div>



<!--<div class="custom-start <?php echo e($active == 'staff' ? 'custom-color' : ''); ?> custom-start  align-items-center">-->
<!--            <a href="<?php echo e(route('contacts.index')); ?>" class="text-white d-flex gap-2 align-items-center py-2  px-4">-->
<!--                <i class="fa fa-users"></i>-->
<!--                <span>View Contacts</span>-->
<!--            </a>-->
<!--        </div>-->



        <div class="custom-start <?php echo e($active == 'staff' ? 'custom-color' : ''); ?> custom-start align-items-center">
            <a href="<?php echo e(route('add-staff')); ?>" class="text-white d-flex gap-2 align-items-center py-2 px-4">
                <i class="fa fa-users"></i>
                <span>Add Staff</span>
            </a>
        </div> 
 
        <div class="custom-start <?php echo e($active == 'newsletter' ? 'custom-color' : ''); ?> custom-start align-items-center">
            <a href="<?php echo e(route('newsletter.emails')); ?>" class="text-white d-flex gap-2 align-items-center py-2 px-4">
                <i class="fa fa-envelope"></i>
                <span>Subscribers</span>
            </a>
        </div>
        

        <div class="custom-start <?php echo e($active == 'settings' ? 'custom-color' : ''); ?> custom-start align-items-center">
            <a href="<?php echo e(route('payment-methods-settings')); ?>" class="text-white d-flex gap-2 align-items-center py-2 px-4">
                <i class="fa fa-cog"></i>
                <span>Settings</span>
            </a>
        </div>
        
        <div class="custom-start <?php echo e($active == 'website-contents' ? 'custom-color' : ''); ?> custom-start align-items-center">
            <a href="<?php echo e(route('website-contents')); ?>" class="text-white d-flex gap-2 align-items-center py-2 px-4">
                <i class="fa fa-cog"></i>
                <span>Website Contents</span>
            </a>
        </div>
        
        <div class="custom-start <?php echo e($active == 'change-password' ? 'custom-color' : ''); ?> custom-start align-items-center">
            <a href="<?php echo e(route('change-password')); ?>" class="text-white d-flex gap-2 align-items-center py-2 px-4">
            <i class="fa fa-lock"></i>
            <span>Change Password</span>
            </a>
        </div>
        
        
        <div class="d-flex align-items-center custom-start custom-start">
            <a href="javascript:void(0)" wire:click="logout" class="text-white d-flex gap-2 align-items-center py-2 px-4">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </div>

    </div>
</div>

<style>
    #leftDrawer {
        width: 20%;
        background-color: #C0C0EF;
    }
    @media (max-width: 767px) {
        #leftDrawer {
            position: fixed;
            top: 0;
            left: 0;
            width: 20%;
            height: 100%;
            z-index: 9999;
            overflow-y: auto;
        }
    }
    .custom-color {
        background-color: #20375E !important;
        color: white;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        border-right: 20px;
        height: 50px !important;
        padding-left: 20px;
        margin-left: 20px;
    }
    .custom-start {
        background-color: #C0C0EF;
        color: #20375D !important;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        height: 50px !important;
        padding-left: 20px;
        margin-left: 20px;
    }
    .form-check-input:checked {
        background-color: #29C01E;
    }
    .custom-start:hover {
        background-color: #C0C0EF;
    }
</style>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/components/side-nave.blade.php ENDPATH**/ ?>