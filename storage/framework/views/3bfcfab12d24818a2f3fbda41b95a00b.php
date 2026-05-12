<div class=" d-flex justify-content-between align-items-cente">
    <!-- -------change radio forms------ -->
  <style>
    .col-md-7 {
        width: 100%;
        height: 450px;
        background: #ffffff;
       
        border: 1px solid #cecece;
        border-radius: 15px;
        margin: auto; /* Center the container horizontally */
    }

    @media (max-width: 767px) {
        /* Apply styles for screens smaller than 768px (phones) */
        .col-md-7 {
            width: 100%;
           
        }
        .btn-success{
            margin-top:-20px;
        }
       
    }
</style>

   <div class=" col-md-12 " style="">
        <div id="paymentForm">
            


            <div class="">
                <label for="disabledSelect" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" wire:model.debounce.500="paypalDetail.account_name">
                <?php $__errorArgs = ['paypalDetail.account_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger error"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class=" py-2">
                <label for="disabledSelect" class="form-label">Email Address</label>
                <input type="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email Address" wire:model.debounce.500="paypalDetail.email">
                <?php $__errorArgs = ['paypalDetail.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger error"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class=" ">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I agreed with Privacy Policy and Terms & Conditions.
                    </label>
                </div>
            </div>

           <div class="cursor-point align-items-center d-grid gap-2 p-4 col-12 justify-content-center">
    <button class="btn btn-success" wire:click="submit">Submit</button>
    <?php if($loading): ?>
        <span>Submitting...</span>
    <?php endif; ?>
</div>


        </div>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/sell/components/paypal.blade.php ENDPATH**/ ?>