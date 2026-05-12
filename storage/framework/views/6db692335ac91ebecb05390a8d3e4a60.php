<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap');

        .form-sec {
            width: 100%;
            height: 100vh; 
            background-color: #f8fbff;
            font-family: "Manrope", sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden; 
            box-sizing: border-box;
            padding: 0; 
        }

        .custom-container {
            width: 100%;
            max-width: 460px;
            padding: 5px 20px; 
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* REFINED: Professional Icon Design */
        .profile-wrap {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 12px;
        }

        .user-icon-circle {
            width: 62px; 
            height: 62px;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border-radius: 50%; /* Pure circle for a professional, clean look */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            position: relative;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.15);
        }

        .user-icon-circle i {
            font-size: 26px;
            color: white;
        }

        /* Subtle professional outer ring */
        .user-icon-circle::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 1px solid rgba(0, 123, 255, 0.2);
            border-radius: 50%;
        }

        .heading-box small {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            color: #007bff;
            display: block;
            margin-bottom: 2px;
            letter-spacing: 1px;
        }

        .heading-box h3 {
            font-size: 22px;
            font-weight: 800;
            color: #0c2340;
            margin: 0;
        }

        /* Form Card - Clean & Sharp */
        .form-card {
            background: white;
            padding: 22px; 
            border-radius: 16px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.04);
            border: 1px solid #edf2f7;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 10px; 
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 18px;
            color: #007bff;
            font-size: 15px;
            z-index: 5;
            opacity: 0.8;
        }

        .form-sec input,
        .form-sec textarea {
            width: 100% !important;
            height: 48px; 
            padding: 10px 15px 10px 52px !important; 
            border: 1.5px solid #f1f4f8;
            border-radius: 10px;
            font-size: 14px;
            color: #1a202c;
            background: #f9fbff;
            box-sizing: border-box;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-sec textarea {
            height: 75px; 
            padding-top: 14px !important;
            resize: none;
        }

        .form-sec input:focus, 
        .form-sec textarea:focus {
            border-color: #007bff;
            background: white;
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.05);
        }

        /* Submit Button - Compact & Centered */
        .btn-container {
            margin-top: 12px;
            display: flex;
            justify-content: center;
        }

        .form-sec button {
            width: 170px; 
            height: 46px;
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 86, 179, 0.2);
        }

        .form-sec button:hover:not(:disabled) {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 86, 179, 0.3);
        }

        .form-sec button:disabled {
            background: #d1d5db;
            box-shadow: none;
            color: #9ca3af;
        }

        .text-danger { color: #e53e3e; font-size: 10px; margin-top: 2px; }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="form-sec">
        <div class="custom-container">
            
            <div class="profile-wrap">
                <div class="user-icon-circle">
                    <i class="fa-solid fa-user-astronaut"></i>
                </div>
                <div class="heading-box">
                    <h3>Customer Details</h3>
                </div>
            </div>

            <div class="form-card">
                <form wire:submit.prevent="submitForm">
                    
                    <div class="input-wrapper">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" placeholder="Full Name" wire:model.lazy="patient.name">
                    </div>
                    <?php $__errorArgs = ['patient.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" placeholder="Email Address" wire:model.lazy="patient.email">
                    </div>
                    <?php $__errorArgs = ['patient.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" placeholder="Phone Number" wire:model.lazy="patient.phone">
                    </div>
                    <?php $__errorArgs = ['patient.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="input-wrapper textarea-wrap">
                        <i class="fa-regular fa-comment-dots"></i>
                        <textarea wire:model.lazy="patient.RepairNote" placeholder="Notes..."></textarea>
                    </div>
                    <?php $__errorArgs = ['patient.RepairNote'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="btn-container">
                        <button type="submit" class="payment-method" 
                            <?php if(empty($patient['name']) || empty($patient['email']) || empty($patient['phone'])): ?> disabled <?php endif; ?>>
                            Submit <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/components/patient-detail-form.blade.php ENDPATH**/ ?>