<div>
    <div class="booking-form-container">
        <div class="form-grid">
            <!-- Left Column - Address Information -->
            <div class="form-column">
                <div class="section-header">
                    <h3 class="section-title">Delivery Address</h3>
                    <p class="section-subtitle">Where should we collect your device?</p>
                </div>

                <!-- Post Code Search -->
                <div class="input-group-modern">
                    <label class="input-label">
                        <span class="label-text">Post Code</span>
                        <span class="required-badge">Required</span>
                    </label>
                    <input type="text" 
                           wire:model.debounce.500ms="post_code" 
                           wire:model.lazy="collection.post_code" 
                           class="modern-input" 
                           id="post_code" 
                           placeholder="Enter your post code">
                    <?php $__errorArgs = ['post_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Address Selection List -->
                <?php if(isset($responseData['knownAddresses']) && count($responseData['knownAddresses']) > 0): ?>
                    <div class="address-list-container">
                        <label class="input-label">
                            <span class="label-text">Select your address</span>
                            <span class="optional-badge">Recommended</span>
                        </label>
                        <div class="address-list">
                            <?php $__currentLoopData = $responseData['knownAddresses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="address-item" 
                                     wire:click="selectedAddress = '<?php echo e(addslashes($address)); ?>'"
                                     style="cursor: pointer;">
                                    <div class="address-radio">
                                        <div class="custom-radio <?php echo e($selectedAddress === $address ? 'selected' : ''); ?>">
                                            <?php if($selectedAddress === $address): ?>
                                                <div class="radio-inner"></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="address-content">
                                        <div class="address-text"><?php echo e($address); ?></div>
                                        <div class="address-badge">Suggested</div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Manual Address Fields -->
                <div class="manual-fields">
                    <div class="input-group-modern">
                        <label class="input-label">
                            <span class="label-text">Address Line 1</span>
                            <span class="required-badge">Required</span>
                        </label>
                        <input type="text" 
                               class="modern-input" 
                               id="address_line_1" 
                               wire:model.lazy="collection.address_line_1" 
                               placeholder="Street address, house number"
                               name="address_line_1">
                        <?php $__errorArgs = ['collection.address_line_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="input-group-modern">
                        <label class="input-label">
                            <span class="label-text">Address Line 2</span>
                            <span class="optional-badge">Optional</span>
                        </label>
                        <input type="text" 
                               class="modern-input" 
                               wire:model.lazy="collection.address_line_2" 
                               id="address_line_2" 
                               placeholder="Apartment, suite, unit">
                    </div>

                    <div class="row-grid">
                        <div class="input-group-modern">
                            <label class="input-label">
                                <span class="label-text">Town/City</span>
                                <span class="required-badge">Required</span>
                            </label>
                            <input type="text" 
                                   class="modern-input" 
                                   id="city" 
                                   wire:model.lazy="collection.city" 
                                   placeholder="Enter city">
                            <?php $__errorArgs = ['collection.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-message"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="input-group-modern">
                            <label class="input-label">
                                <span class="label-text">Post Code</span>
                                <span class="required-badge">Required</span>
                            </label>
                            <input type="text" 
                                   class="modern-input" 
                                   id="post_code_field" 
                                   wire:model.lazy="collection.post_code" 
                                   placeholder="Post code">
                            <?php $__errorArgs = ['collection.post_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-message"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Appointment Details -->
            <div class="form-column">
                <div class="section-header">
                    <h3 class="section-title">Schedule Repair</h3>
                    <p class="section-subtitle">Choose your preferred date and time</p>
                </div>

                <!-- Date Selection -->
                <div class="input-group-modern">
                    <label class="input-label">
                        <span class="label-text">Preferred Date</span>
                        <span class="required-badge">Required</span>
                    </label>
                    <select class="modern-select" id="repair_date" name="repair_date" wire:model.lazy="collection.repair_date">
                        <option value="">Select a date</option>
                        <?php
                            use Carbon\Carbon;
                            $currentDate = Carbon::now('Europe/London');
                            $workingDays = 0;
                            $year = $currentDate->year;
                            $publicHolidaysURL = "https://date.nager.at/Api/v3/PublicHolidays/{$year}/GB";
                            $publicHolidaysResponse = @file_get_contents($publicHolidaysURL);
                            $publicHolidays = $publicHolidaysResponse ? json_decode($publicHolidaysResponse) : [];

                            while ($workingDays < 10) { 
                                $currentDate->addDay();
                                if ($currentDate->isWeekday() && !$this->isPublicHoliday($currentDate, $publicHolidays)) {
                                    $workingDays++;
                                    $formattedDate = $currentDate->format('l, d F Y');
                                    echo '<option value="' . $currentDate->toDateString() . '">' . $formattedDate . '</option>';
                                }
                            }
                        ?>
                    </select>
                    <?php $__errorArgs = ['collection.repair_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Time Slot Selection -->
                <div class="input-group-modern">
                    <label class="input-label">
                        <span class="label-text">Time Slot</span>
                        <span class="required-badge">Required</span>
                    </label>
                    <div class="slot-cards">
                        <div class="slot-card <?php echo e($collection['repair_slot'] === '11am - 2pm' ? 'active' : ''); ?>" 
                             wire:click="$set('collection.repair_slot', '11am - 2pm')">
                            <div class="slot-time">
                                <span class="slot-time-text">11:00 AM - 2:00 PM</span>
                            </div>
                            <div class="slot-period">Morning</div>
                            <div class="slot-check">
                                <div class="check-mark"></div>
                            </div>
                        </div>

                        <div class="slot-card <?php echo e($collection['repair_slot'] === '2pm - 5pm' ? 'active' : ''); ?>" 
                             wire:click="$set('collection.repair_slot', '2pm - 5pm')">
                            <div class="slot-time">
                                <span class="slot-time-text">2:00 PM - 5:00 PM</span>
                            </div>
                            <div class="slot-period">Afternoon</div>
                            <div class="slot-check">
                                <div class="check-mark"></div>
                            </div>
                        </div>

                        <div class="slot-card <?php echo e($collection['repair_slot'] === '5pm - 8pm' ? 'active' : ''); ?>" 
                             wire:click="$set('collection.repair_slot', '5pm - 8pm')">
                            <div class="slot-time">
                                <span class="slot-time-text">5:00 PM - 8:00 PM</span>
                            </div>
                            <div class="slot-period">Evening</div>
                            <div class="slot-check">
                                <div class="check-mark"></div>
                            </div>
                        </div>
                    </div>
                    <?php $__errorArgs = ['collection.repair_slot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Notes Section -->
                <div class="input-group-modern">
                    <label class="input-label">
                        <span class="label-text">Additional Notes</span>
                        <span class="optional-badge">Optional</span>
                    </label>
                    <textarea class="modern-textarea" 
                              id="repair_note" 
                              wire:model="collection.repair_note" 
                              rows="4" 
                              name="repair_note" 
                              placeholder="Describe the issue or any special instructions..."></textarea>
                    <?php $__errorArgs = ['collection.repair_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="submit-section">
            <button type="submit" wire:click.prevent="submitForm" class="submit-button">
                <span>Continue to Payment</span>
                <span class="button-arrow">→</span>
            </button>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .booking-form-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 40px 24px;
        background: #ffffff;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 48px;
    }

    .form-column {
        background: #ffffff;
        border-radius: 0;
        padding: 0;
    }

    /* Section Headers */
    .section-header {
        margin-bottom: 32px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f2f5;
    }

    .section-title {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 8px;
        letter-spacing: -0.3px;
    }

    .section-subtitle {
        font-size: 14px;
        color: #6c757d;
        line-height: 1.5;
    }

    /* Input Groups */
    .input-group-modern {
        margin-bottom: 28px;
    }

    .input-label {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
        gap: 8px;
    }

    .label-text {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .required-badge {
        font-size: 11px;
        padding: 3px 8px;
        background: #fff0f0;
        color: #e53e3e;
        border-radius: 12px;
        font-weight: 600;
    }

    .optional-badge {
        font-size: 11px;
        padding: 3px 8px;
        background: #f0f4f8;
        color: #64748b;
        border-radius: 12px;
        font-weight: 600;
    }

    .modern-input {
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #ffffff;
        color: #1a1a1a;
        transition: all 0.2s;
        outline: none;
        font-family: inherit;
    }

    .modern-input:focus {
        border-color: #1ba6e7;
        background: #ffffff;
    }

    .modern-input:hover {
        border-color: #1ba6e7;
    }

    /* Address List Styling */
    .address-list-container {
        margin-bottom: 28px;
    }

    .address-list {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
    }

    .address-item {
        display: flex;
        align-items: center;
        padding: 16px;
        border-bottom: 1px solid #f0f2f5;
        transition: all 0.2s;
        cursor: pointer;
    }

    .address-item:last-child {
        border-bottom: none;
    }

    .address-item:hover {
        background: #f8fafc;
    }

    .address-radio {
        margin-right: 14px;
        flex-shrink: 0;
    }

    .custom-radio {
        width: 20px;
        height: 20px;
        border: 2px solid #cbd5e0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .custom-radio.selected {
        border-color: #1ba6e7;
        background: #1ba6e7;
    }

    .radio-inner {
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
    }

    .address-content {
        flex: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .address-text {
        font-size: 14px;
        color: #2d3748;
        font-weight: 500;
        line-height: 1.4;
        word-break: break-word;
    }

    .address-badge {
        font-size: 11px;
        padding: 4px 10px;
        background: #e6f7ff;
        color: #1ba6e7;
        border-radius: 20px;
        font-weight: 600;
        flex-shrink: 0;
    }

    /* Row Grid */
    .row-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .modern-select {
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #ffffff;
        color: #1a1a1a;
        cursor: pointer;
        transition: all 0.2s;
        outline: none;
        appearance: none;
        font-family: inherit;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 16px;
    }

    .modern-select:focus {
        border-color: #1ba6e7;
    }

    /* Slot Cards */
    .slot-cards {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .slot-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s;
        background: #ffffff;
        position: relative;
        flex-wrap: wrap;
        gap: 12px;
    }

    .slot-card:hover {
        border-color: #1ba6e7;
        background: #f8fafc;
    }

    .slot-card.active {
        border-color: #1ba6e7;
        background: #f0f9ff;
    }

    .slot-time {
        flex: 1;
    }

    .slot-time-text {
        font-size: 15px;
        font-weight: 600;
        color: #2d3748;
    }

    .slot-period {
        font-size: 13px;
        color: #64748b;
        padding: 4px 12px;
        background: #f1f5f9;
        border-radius: 20px;
        flex-shrink: 0;
    }

    .slot-card.active .slot-period {
        background: #e6f7ff;
        color: #1ba6e7;
    }

    .slot-check {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: transparent;
        transition: all 0.2s;
        flex-shrink: 0;
    }

    .slot-card.active .slot-check {
        background: #1ba6e7;
    }

    .check-mark {
        width: 6px;
        height: 12px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
        display: none;
    }

    .slot-card.active .check-mark {
        display: block;
    }

    /* Textarea */
    .modern-textarea {
        width: 100%;
        padding: 12px 16px;
        font-size: 15px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #ffffff;
        color: #1a1a1a;
        resize: vertical;
        transition: all 0.2s;
        outline: none;
        font-family: inherit;
    }

    .modern-textarea:focus {
        border-color: #1ba6e7;
    }

    /* Error Messages */
    .error-message {
        display: block;
        margin-top: 8px;
        font-size: 12px;
        color: #e53e3e;
    }

    /* Submit Section */
    .submit-section {
        display: flex;
        justify-content: flex-end;
        padding-top: 24px;
        border-top: 2px solid #f0f2f5;
    }

    .submit-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 14px 32px;
        background: #1ba6e7;
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-family: inherit;
    }

    .submit-button:hover {
        background: #0d8cd0;
        transform: translateY(-2px);
    }

    .submit-button:active {
        transform: translateY(0);
    }

    .button-arrow {
        font-size: 18px;
        transition: transform 0.2s;
    }

    .submit-button:hover .button-arrow {
        transform: translateX(3px);
    }

    /* Responsive Breakpoints */
    @media (max-width: 1024px) {
        .booking-form-container {
            padding: 30px 20px;
        }
        
        .form-grid {
            gap: 30px;
        }
    }

    @media (max-width: 968px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .booking-form-container {
            padding: 24px 20px;
        }

        .section-title {
            font-size: 22px;
        }
    }

    @media (max-width: 768px) {
        .booking-form-container {
            padding: 20px 16px;
        }
        
        .section-header {
            margin-bottom: 24px;
            padding-bottom: 16px;
        }
        
        .section-title {
            font-size: 20px;
        }
        
        .section-subtitle {
            font-size: 13px;
        }
        
        .input-group-modern {
            margin-bottom: 20px;
        }
        
        .address-item {
            padding: 14px;
        }
        
        .address-text {
            font-size: 13px;
        }
        
        .slot-card {
            padding: 14px 16px;
        }
        
        .slot-time-text {
            font-size: 14px;
        }
        
        .slot-period {
            font-size: 12px;
            padding: 3px 10px;
        }
    }

    @media (max-width: 640px) {
        .row-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }
        
        .address-content {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .submit-button {
            width: 100%;
            justify-content: center;
            padding: 12px 24px;
        }
        
        .submit-section {
            justify-content: center;
        }
        
        .slot-card {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }
        
        .slot-time {
            text-align: center;
        }
        
        .slot-period {
            align-self: center;
        }
        
        .slot-check {
            align-self: center;
        }
        
        .input-label {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 480px) {
        .booking-form-container {
            padding: 16px 12px;
        }
        
        .section-title {
            font-size: 18px;
        }
        
        .modern-input,
        .modern-select,
        .modern-textarea {
            padding: 10px 14px;
            font-size: 14px;
        }
        
        .address-item {
            padding: 12px;
        }
        
        .address-text {
            font-size: 12px;
        }
        
        .address-badge {
            font-size: 10px;
            padding: 3px 8px;
        }
        
        .slot-time-text {
            font-size: 13px;
        }
        
        .submit-button {
            font-size: 14px;
            padding: 10px 20px;
        }
    }
</style><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/collection-form.blade.php ENDPATH**/ ?>