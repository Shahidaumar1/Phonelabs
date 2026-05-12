<div>
    <style>
        /* Main Container */
        .call-out-rapir-sec {
            width: 100%;
            background: #f7f9fc;
            min-height: 100vh;
        }

        /* Step 1 - Address Form - Compact */
        .call-out-sec1 {
            background: transparent;
        }

        .call-out-sec1 .form-group label,
        .call-out-sec1 .conditional-address-form label {
            font-size: 12px;
            font-weight: 600;
            color: #1e293b;
            font-family: 'Inter', sans-serif;
            margin: 0 !important;
            padding-bottom: 4px;
            letter-spacing: 0.3px;
        }

        .call-out-sec1 .form-group input,
        .call-out-sec1 #resultContainer select,
        .call-out-sec1 .conditional-address-form input {
            width: 100%;
            height: 40px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 0 12px;
            font-size: 13px;
            font-weight: 400;
            color: #1e293b;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s ease;
            background: #ffffff;
        }

        .call-out-sec1 .form-group input:focus,
        .call-out-sec1 #resultContainer select:focus,
        .call-out-sec1 .conditional-address-form input:focus {
            outline: none;
            border-color: #00AEEF;
            box-shadow: 0 0 0 2px rgba(0, 174, 239, 0.1);
        }

        /* Next Button */
        .go-next-btn {
            width: auto;
            min-width: 100px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #00AEEF 0%, #008bbf 100%);
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
            border: none;
            padding: 0 24px;
            cursor: pointer;
            transition: all 0.2s ease;
            gap: 6px;
        }

        .go-next-btn:hover {
            transform: translateY(-1px);
            background: linear-gradient(135deg, #008bbf 0%, #00AEEF 100%);
        }

        .go-next-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* Address Button */
        .btn.text-danger {
            font-size: 11px;
            color: #00AEEF !important;
            text-decoration: underline;
            padding: 0;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        /* Compact Form Groups */
        .mb-3 {
            margin-bottom: 12px !important;
        }
        
        .mt-3 {
            margin-top: 12px !important;
        }

        /* Cute Date & Time Section */
        .cute-datetime-section {
            padding: 16px 0;
        }

        .cute-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .cute-header small {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #00AEEF;
            display: inline-block;
            background: rgba(0, 174, 239, 0.1);
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 8px;
        }

        .cute-header h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            letter-spacing: -0.3px;
        }

        /* Cute Back Button */
        .cute-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid #e2e8f0;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s ease;
            border-radius: 30px;
            margin-bottom: 16px;
            font-family: 'Inter', sans-serif;
        }

        .cute-back-btn:hover {
            background: #00AEEF;
            border-color: #00AEEF;
            color: white;
            transform: translateX(-2px);
        }

        .cute-back-btn i {
            font-size: 11px;
        }

        /* Date Selection Card - No Box Shadow */
        .date-selection-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            margin-bottom: 16px;
        }

        .date-label {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .date-label i {
            color: #00AEEF;
            font-size: 14px;
        }

        /* Calendar Trigger Button */
        .calendar-trigger {
            width: 100%;
            padding: 12px 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .calendar-trigger:hover {
            border-color: #00AEEF;
            background: #f0f9ff;
        }

        .calendar-trigger-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .calendar-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #00AEEF 0%, #008bbf 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-icon i {
            color: white;
            font-size: 18px;
        }

        .calendar-text {
            text-align: left;
        }

        .calendar-text .label {
            font-size: 11px;
            color: #64748b;
            font-weight: 500;
        }

        .calendar-text .selected-date {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
        }

        .calendar-trigger i:last-child {
            color: #00AEEF;
            font-size: 16px;
        }

        /* Calendar Modal */
        .calendar-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .calendar-modal-content {
            background: white;
            border-radius: 24px;
            width: 90%;
            max-width: 380px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .calendar-modal-header {
            padding: 16px;
            background: linear-gradient(135deg, #00AEEF 0%, #008bbf 100%);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-modal-header h3 {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .close-modal {
            background: rgba(255,255,255,0.2);
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .close-modal:hover {
            background: rgba(255,255,255,0.3);
            transform: rotate(90deg);
        }

        .calendar-modal-body {
            padding: 16px;
        }

        /* Cute Calendar - No Box Shadow */
        .cute-calendar {
            width: 100%;
        }

        .calendar-month-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            padding: 0 5px;
        }

        .month-nav-btn {
            background: #f1f5f9;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .month-nav-btn:hover {
            background: #00AEEF;
            color: white;
        }

        .current-month {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
        }

        .calendar-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            margin-bottom: 8px;
        }

        .weekday {
            text-align: center;
            font-size: 11px;
            font-weight: 600;
            color: #94a3b8;
            padding: 8px 0;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 500;
            color: #1e293b;
            cursor: pointer;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .calendar-day:hover:not(.disabled) {
            background: #f0f9ff;
            color: #00AEEF;
        }

        .calendar-day.selected {
            background: #00AEEF;
            color: white;
        }

        .calendar-day.disabled {
            color: #cbd5e1;
            cursor: not-allowed;
            background: #f8fafc;
        }

        .calendar-day.today {
            border: 1px solid #00AEEF;
            font-weight: 700;
        }

        /* Time Selection - Redesigned */
        .time-selection-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #e2e8f0;
        }

        .time-label {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .time-label i {
            color: #00AEEF;
            font-size: 14px;
        }

        /* Improved Time Grid - Clean Design */
        .time-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .time-slot {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .time-slot:hover {
            border-color: #00AEEF;
            background: #f0f9ff;
        }

        .time-slot.active {
            background: #00AEEF;
            border-color: #00AEEF;
            color: white;
        }

        .time-slot .time-icon {
            font-size: 20px;
            color: #00AEEF;
            margin-bottom: 6px;
            display: block;
        }

        .time-slot.active .time-icon {
            color: white;
        }

        .time-slot .time-value {
            font-size: 14px;
            font-weight: 700;
            display: block;
        }

        .time-slot .time-period-badge {
            font-size: 10px;
            font-weight: 500;
            color: #64748b;
            margin-top: 4px;
            display: block;
        }

        .time-slot.active .time-period-badge {
            color: rgba(255,255,255,0.8);
        }

        /* Selected Summary */
        .selected-summary {
            background: #f8fafc;
            border-radius: 12px;
            padding: 14px;
            margin-top: 16px;
            text-align: center;
            border: 1px solid #e2e8f0;
        }

        .selected-summary p {
            margin: 0;
            font-size: 12px;
            color: #64748b;
        }

        .selected-summary strong {
            color: #00AEEF;
            font-size: 13px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .time-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }

            .cute-header h2 {
                font-size: 20px;
            }

            .date-selection-card,
            .time-selection-card {
                padding: 16px;
            }

            .calendar-trigger {
                padding: 10px 12px;
            }

            .calendar-icon {
                width: 36px;
                height: 36px;
            }

            .calendar-icon i {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .time-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="call-out-rapir-sec pb-5">
        <div x-data="{ step: 1, showCalendar: false }">
            <!-- Step 1 - Compact Address Form -->
            <div x-show="step === 1" class="call-out-sec1" x-data="{ selectedAddress: '', showFields: false }">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <!-- Post Code Input -->
                        <div class="form-group mb-3">
                            <label for="post_code">Post Code</label>
                            <input type="text" wire:model.debounce.500ms="post_code" class="form-control" id="post_code"
                                placeholder="Enter your post code">
                            <?php $__errorArgs = ['post_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger" style="font-size: 11px;"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Address Selection Dropdown -->
                        <div id="resultContainer" class="mb-3">
                            <?php if(isset($responseData['knownAddresses']) && is_array($responseData['knownAddresses']) &&
                            count($responseData['knownAddresses']) > 0): ?>
                            <select x-model="selectedAddress" wire:model="selectedAddress" class="form-select">
                                <option value="" selected>Select your address</option>
                                <?php $__currentLoopData = $responseData['knownAddresses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($address); ?>"><?php echo e($address); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="mt-2 d-flex justify-content-start">
                                <button type="button" class="btn text-danger" @click="showFields = !showFields">
                                    <i class="fas fa-pen me-1"></i> I can't find my address
                                </button>
                            </div>
                            <?php else: ?>
                            <p style="font-size: 13px; color: #64748b;">No addresses found. Please enter manually.</p>
                            <div class="mt-2">
                                <button type="button" class="btn text-danger" @click="showFields = !showFields">
                                    <i class="fas fa-pen me-1"></i> Enter address manually
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- Conditional Form Fields - Compact -->
                        <div x-show="showFields" x-cloak class="conditional-address-form">
                            <div class="mb-3">
                                <label for="address_line_1">Address Line 1</label>
                                <input type="text" class="form-control" id="address_line_1"
                                    wire:model.lazy="fixed.address_line_1" placeholder="Street name, building number">
                                <?php $__errorArgs = ['fixed.address_line_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger" style="font-size: 11px;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label for="address_line_2">Address Line 2 (Optional)</label>
                                <input type="text" class="form-control"
                                    wire:model.lazy="fixed.address_line_2" id="address_line_2"
                                    placeholder="Apartment, suite, unit">
                            </div>
                            <div class="mb-3">
                                <label for="city">Town/City</label>
                                <input type="text" class="form-control" id="city"
                                    wire:model.lazy="fixed.city" placeholder="Town or city name">
                                <?php $__errorArgs = ['fixed.city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger" style="font-size: 11px;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label for="post_code_fixed">Post Code</label>
                                <input type="text" class="form-control" id="post_code_fixed"
                                    wire:model.lazy="fixed.post_code" placeholder="Enter post code">
                                <?php $__errorArgs = ['fixed.post_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger" style="font-size: 11px;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="go-next-btn" @click="step = 2"
                                :disabled="!selectedAddress && !showFields">
                                Next <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 - Cute Date & Time -->
            <section x-show="step === 2" class="cute-datetime-section" x-cloak>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10">
                        <!-- Cute Back Button -->
                        <button class="cute-back-btn" @click="step = 1">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>

                        <div class="cute-header">
                            <h2>Choose Your Date & Time</h2>
                        </div>

                        <!-- Date Selection -->
                        <div class="date-selection-card">
                            <div class="date-label">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Select Date</span>
                            </div>
                            
                            <div class="calendar-trigger" @click="showCalendar = !showCalendar">
                                <div class="calendar-trigger-left">
                                    <div class="calendar-icon">
                                        <i class="fas fa-calendar-week"></i>
                                    </div>
                                    <div class="calendar-text">
                                        <div class="label">Selected Date</div>
                                        <div class="selected-date">
                                            <?php echo e($fixed['repair_date'] ?? 'Choose a date'); ?>

                                        </div>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-down"></i>
                            </div>

                            <!-- Calendar Modal -->
                            <div x-show="showCalendar" class="calendar-modal" @click.away="showCalendar = false">
                                <div class="calendar-modal-content">
                                    <div class="calendar-modal-header">
                                        <h3><i class="fas fa-calendar-alt"></i> Select Date</h3>
                                        <button class="close-modal" @click="showCalendar = false">✕</button>
                                    </div>
                                    <div class="calendar-modal-body">
                                        <div class="cute-calendar">
                                            <div class="calendar-month-nav">
                                                <button type="button" class="month-nav-btn" wire:click="previousMonth">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <span class="current-month"><?php echo e($this->currentMonth->format('F Y')); ?></span>
                                                <button type="button" class="month-nav-btn" wire:click="nextMonth">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            <div class="calendar-weekdays">
                                                <div class="weekday">Mon</div>
                                                <div class="weekday">Tue</div>
                                                <div class="weekday">Wed</div>
                                                <div class="weekday">Thu</div>
                                                <div class="weekday">Fri</div>
                                                <div class="weekday">Sat</div>
                                                <div class="weekday">Sun</div>
                                            </div>
                                            <div class="calendar-days">
                                                <?php if($this->calendarDays): ?>
                                                    <?php $__currentLoopData = $this->calendarDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $__currentLoopData = $week; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="calendar-day <?php echo e($day['class']); ?> <?php echo e($day['disabled'] ? 'disabled' : ''); ?>"
                                                                <?php if(!$day['disabled']): ?>
                                                                    wire:click="selectDate('<?php echo e($day['date']); ?>')"
                                                                    @click="showCalendar = false"
                                                                <?php endif; ?>>
                                                                <?php echo e($day['day']); ?>

                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $__errorArgs = ['fixed.repair_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger" style="font-size: 11px; margin-top: 8px; display: block;"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Time Selection - Redesigned Clean -->
                        <div class="time-selection-card">
                            <div class="time-label">
                                <i class="fas fa-clock"></i>
                                <span>Select Time Slot</span>
                            </div>
                            <div class="time-grid">
                                <?php 
                                $formattedTime = $fixed['repair_time'] ?? '';
                                ?>
                                <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeslots): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="time-slot <?php echo e($fixed['repair_time'] === $timeslots['time'] ? 'active' : ''); ?>"
                                    wire:click="$set('fixed.repair_time', '<?php echo e($timeslots['time']); ?>')">
                                    <i class="<?php echo e($timeslots['icon']); ?> time-icon"></i>
                                    <span class="time-value"><?php echo e($timeslots['time']); ?></span>
                                    <span class="time-period-badge">
                                        <?php if(strpos($timeslots['time'], '09') !== false || strpos($timeslots['time'], '10') !== false): ?>
                                            Morning
                                        <?php elseif(strpos($timeslots['time'], '12') !== false || strpos($timeslots['time'], '13') !== false): ?>
                                            Lunch
                                        <?php elseif(strpos($timeslots['time'], '14') !== false || strpos($timeslots['time'], '15') !== false): ?>
                                            Afternoon
                                        <?php elseif(strpos($timeslots['time'], '16') !== false || strpos($timeslots['time'], '17') !== false): ?>
                                            Evening
                                        <?php else: ?>
                                            Available
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php $__errorArgs = ['fixed.repair_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger" style="font-size: 11px; margin-top: 8px; display: block;"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Selected Summary -->
                        <div class="selected-summary">
                            <p>
                                <i class="fas fa-calendar-check"></i> 
                                <strong>Date:</strong> <?php echo e($fixed['repair_date'] ?? 'Not selected'); ?> &nbsp;|&nbsp;
                                <strong>Time:</strong> <?php echo e($fixed['repair_time'] ?? 'Not selected'); ?>

                            </p>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" wire:click.prevent="submitForm" class="go-next-btn">
                                Confirm & Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/fix-form.blade.php ENDPATH**/ ?>