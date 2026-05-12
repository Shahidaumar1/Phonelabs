<div class="mx-auto pt-5 cus-width">

    <div class="container">
        <div class="position-relative">
            <img src="https://www.transparentpng.com/thumb/shape/7wHXSo-red-shape-wonderful-picture-images.png" />
            <h5 class="acc-login-text fs-4 fw-bold position-absolute text-white  text-center">Account Login</h5>
        </div>

        <div>
            <form>
                <section>
                    <div class="mb-3">
                        <label class="form-label" id="labelText">Username or email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            wire:model.debounce.500="email" />
                        <div id="emailHelp" class="form-text">
                            We'll never share your email with anyone else.
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger text-xs"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" id="labelText">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            wire:model.debounce.500="password" />
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger text-xs"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>

                    <button id="button" type="button" class="btn text-white " style="background-color: #da0a0a"
                        wire:click="login">
                        <span class="d-flex gap-2 align-items-center justify-content-center">
                            Login
                            <span wire:loading wire:target='login'>
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
                        </span>

                    </button>
                    <button class="btn btn-danger" type="reset"><a href="<?php echo e(route('password.request')); ?>">
                                Forgot Password?
                            </a>
                        </button>

                    <p id="p1">Or Continue With</p>
                    <div class="icons d-flex justify-content-around align-items-center p-2">
                        <button id="btnG">
                            <a href="" id="a1"><img id="google" style="height:20px; width:20px;"
                                    src="https://static.vecteezy.com/system/resources/previews/013/948/549/original/google-logo-on-transparent-white-background-free-vector.jpg" />
                                Google</a>
                        </button>
                        <button id="btnG">
                            <a href="" id="a2">
                                <img id="facebook" style="height:20px; width:20px;"
                                    src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/256/social-facebook-icon.png" />
                                Facebook</a>
                        </button>
                     
                    </div>
                    <section>
            </form>
        </div>
    </div>
</div>
<style>
    .cus-width {
        width: 40%;
    }

    @media screen and (max-width: 767px) {
        .cus-width {
            width: 100%;
            /* Adjust this value as needed */
        }
    }
</style><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/account/login.blade.php ENDPATH**/ ?>