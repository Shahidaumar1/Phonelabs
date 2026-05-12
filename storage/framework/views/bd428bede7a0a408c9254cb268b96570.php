<div>
    <style>
        .sticky-top-nav {
            position: -webkit-sticky !important;
            position: sticky !important;
            top: 0 !important;
            z-index: 1020 !important;
            background: white !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 0 !important;
            width: 100% !important;
        }

        .filter-container {
            background: white;
            padding: 15px;
            border-radius: 5px;
        }

        x-content, .content-wrapper {
            overflow: visible !important;
        }

        /* Google Ads Date Picker (same as Orders) */
        .google-datepicker-wrapper { position: relative; display: inline-block; }
        .google-date-inputs { display:flex; gap:10px; align-items:center; }
        .google-date-input {
            background:white; border:1px solid #dadce0; border-radius:4px;
            padding:6px 10px; font-size:13px; min-width:130px; cursor:pointer;
            transition: all .2s;
        }
        .google-date-input:hover { border-color:#5f6368; box-shadow:0 1px 3px rgba(0,0,0,0.1); }
        .google-date-label { font-size:10px; color:#5f6368; margin-bottom:2px; }
        .google-date-value { font-size:13px; color:#202124; font-weight:500; }

        .google-date-dropdown {
            position:absolute; top:100%; left:0; margin-top:8px;
            background:white; border-radius:8px; box-shadow:0 4px 20px rgba(0,0,0,0.15);
            z-index:1050; display:none; min-width:680px;
        }
        .google-date-dropdown.show { display:flex; }
        .google-preset-panel { width:220px; border-right:1px solid #e8eaed; padding:8px 0; }
        .google-preset-option {
            padding:10px 20px; cursor:pointer; font-size:14px; color:#202124;
            transition: background .2s; display:flex; justify-content:space-between; align-items:center;
        }
        .google-preset-option:hover { background:#f1f3f4; }
        .google-preset-option.active { background:#e8f0fe; color:#1a73e8; font-weight:500; }

        .google-calendar-panel { flex:1; padding:20px; }
        .google-month-nav { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
        .google-month-nav-btn {
            background:none; border:none; color:#1a73e8; cursor:pointer;
            padding:8px; border-radius:50%; width:36px; height:36px;
            display:flex; align-items:center; justify-content:center; transition: background .2s;
        }
        .google-month-nav-btn:hover { background:#f1f3f4; }
        .google-month-selector { display:flex; align-items:center; gap:10px; }
        .google-month-dropdown {
            border:1px solid #dadce0; border-radius:4px; padding:6px 10px;
            font-size:14px; color:#202124; background:white; cursor:pointer;
        }
        .google-calendars-container { display:flex; gap:40px; }
        .google-calendar { flex:1; }
        .google-calendar-header { display:grid; grid-template-columns:repeat(7,1fr); gap:4px; margin-bottom:8px; }
        .google-day-name { text-align:center; font-size:12px; color:#5f6368; font-weight:500; padding:8px 0; }
        .google-calendar-grid { display:grid; grid-template-columns:repeat(7,1fr); gap:4px; }

        .google-calendar-day {
            aspect-ratio:1; display:flex; align-items:center; justify-content:center;
            border-radius:50%; font-size:13px; color:#202124; cursor:pointer; transition:all .2s;
        }
        .google-calendar-day:not(.disabled):hover { background:#f1f3f4; }
        .google-calendar-day.other-month { color:#9aa0a6; }
        .google-calendar-day.selected { background:#1a73e8; color:white; font-weight:500; }
        .google-calendar-day.in-range { background:#e8f0fe; border-radius:0; }
        .google-calendar-day.range-start { background:#1a73e8; color:white; border-radius:50% 0 0 50%; }
        .google-calendar-day.range-end { background:#1a73e8; color:white; border-radius:0 50% 50% 0; }
        .google-calendar-day.today { border:2px solid #1a73e8; }

        .google-action-buttons {
            display:flex; justify-content:flex-end; gap:10px; padding:16px 20px;
            border-top:1px solid #e8eaed; margin-top:20px;
        }
        .google-btn-cancel {
            padding:8px 24px; border:none; background:none; color:#1a73e8;
            font-size:14px; font-weight:500; cursor:pointer; border-radius:4px;
        }
        .google-btn-cancel:hover { background:#f1f3f4; }
        .google-btn-apply {
            padding:8px 24px; border:none; background:#1a73e8; color:white;
            font-size:14px; font-weight:500; cursor:pointer; border-radius:4px;
        }
        .google-btn-apply:hover { background:#1557b0; }
    </style>

    <div class="d-flex">
        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'orders'])->html();
} elseif ($_instance->childHasBeenRendered('l865258815-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l865258815-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l865258815-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l865258815-0');
} else {
    $response = \Livewire\Livewire::mount('admin.components.side-nave', ['active' => 'orders']);
    $html = $response->html();
    $_instance->logRenderedChild('l865258815-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
            
            <div class="sticky-top-nav">
                <div wire:ignore>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.orders.components.top-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('top-nav-free-repair-'.now())) {
    $componentId = $_instance->getRenderedChildComponentId('top-nav-free-repair-'.now());
    $componentTag = $_instance->getRenderedChildComponentTagName('top-nav-free-repair-'.now());
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('top-nav-free-repair-'.now());
} else {
    $response = \Livewire\Livewire::mount('admin.orders.components.top-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('top-nav-free-repair-'.now(), $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>

                
                <div class="filter-container">
                    <div class="row g-2 align-items-center">

                        
                        <div class="col-auto">
                            <input type="text"
                                   wire:model.live.debounce.500ms="search"
                                   class="form-control form-control-sm"
                                   placeholder="Search name/email/phone"
                                   style="width:220px;">
                        </div>

                        
                        <div class="col-auto" wire:ignore>
                            <div class="google-datepicker-wrapper">
                                <div class="google-date-inputs">
                                    <div class="google-date-input" id="startDateBox">
                                        <div class="google-date-label">From date</div>
                                        <div class="google-date-value" id="startDateDisplay">Select</div>
                                    </div>
                                    <span style="color:#5f6368;">—</span>
                                    <div class="google-date-input" id="endDateBox">
                                        <div class="google-date-label">To date</div>
                                        <div class="google-date-value" id="endDateDisplay">Select</div>
                                    </div>
                                </div>

                                <div class="google-date-dropdown" id="googleDateDropdown">
                                    <div class="google-preset-panel">
                                        <div class="google-preset-option" data-preset="custom">Custom</div>
                                        <div class="google-preset-option" data-preset="today">Today</div>
                                        <div class="google-preset-option" data-preset="yesterday">Yesterday</div>
                                        <div class="google-preset-option" data-preset="this-week">This week (Mon – Today) <span>›</span></div>
                                        <div class="google-preset-option" data-preset="last-7">Last 7 days</div>
                                        <div class="google-preset-option" data-preset="last-week">Last week (Mon – Sun) <span>›</span></div>
                                        <div class="google-preset-option" data-preset="last-14">Last 14 days</div>
                                        <div class="google-preset-option" data-preset="this-month">This month</div>
                                        <div class="google-preset-option" data-preset="last-30">Last 30 days</div>
                                        <div class="google-preset-option" data-preset="last-month">Last month</div>
                                    </div>

                                    <div class="google-calendar-panel">
                                        <div class="google-month-nav">
                                            <button type="button" class="google-month-nav-btn" id="googlePrevMonth">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <div class="google-month-selector">
                                                <select class="google-month-dropdown" id="googleMonth1"></select>
                                                <select class="google-month-dropdown" id="googleMonth2"></select>
                                            </div>
                                            <button type="button" class="google-month-nav-btn" id="googleNextMonth">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>

                                        <div class="google-calendars-container">
                                            <div class="google-calendar" id="googleCalendar1"></div>
                                            <div class="google-calendar" id="googleCalendar2"></div>
                                        </div>

                                        <div class="google-action-buttons">
                                            <button type="button" class="google-btn-cancel" id="googleCancelBtn">Cancel</button>
                                            <button type="button" class="google-btn-apply" id="googleApplyBtn">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-auto">
                            <select wire:model.live="status"
                                    class="form-select form-select-sm"
                                    style="width:130px;">
                                <option value="">All Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>

                        
                        <div class="col-auto ms-auto">
                            <div class="btn-group" role="group">
                                <button wire:click="showAllItems"
                                        type="button"
                                        class="btn btn-sm <?php echo e(!$showJunk ? 'btn-primary' : 'btn-outline-primary'); ?>"
                                        style="min-width:60px;">
                                    All
                                </button>
                                <button wire:click="showJunkItems"
                                        type="button"
                                        class="btn btn-sm <?php echo e($showJunk ? 'btn-dark' : 'btn-outline-dark'); ?>"
                                        style="min-width:60px;">
                                    Junk
                                </button>
                            </div>
                        </div>

                        
                        <!--<div class="col-auto">-->
                        <!--    <button class="btn btn-sm btn-secondary"-->
                        <!--            wire:click="resetFilters"-->
                        <!--            style="min-width:90px;">-->
                        <!--        Reset-->
                        <!--    </button>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('message')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead style="background:#C0C0EF">
                        <tr>
                            <th>#</th>
                            <th>Date & Time</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Device</th>
                            <th>Model</th>
                            <th>Repair</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($items->firstItem() + $i); ?></td>
                                <td><?php echo e(optional($row->created_at)->format('d/m/Y h:i A')); ?></td>
                                <td><?php echo e($row->name); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td><?php echo e($row->phone); ?></td>
                                <td><?php echo e($row->device); ?></td>
                                <td><?php echo e($row->modal); ?></td>
                                <td><?php echo e($row->repair); ?></td>

                                <td style="width:140px;">
                                    <select class="form-select form-select-sm"
                                            wire:change="updateStatus(<?php echo e($row->id); ?>, $event.target.value)">
                                        <option value="Pending" <?php if($row->status=='Pending'): echo 'selected'; endif; ?>>Pending</option>
                                        <option value="Completed" <?php if($row->status=='Completed'): echo 'selected'; endif; ?>>Completed</option>
                                        <option value="Cancelled" <?php if($row->status=='Cancelled'): echo 'selected'; endif; ?>>Cancelled</option>
                                    </select>
                                </td>

                                <td style="width:220px;">
                                    <?php if($row->deleted_at): ?>
                                        <button wire:click="restore(<?php echo e($row->id); ?>)"
                                                class="btn btn-success btn-sm mb-1">
                                            <i class="fa fa-undo"></i> Restore
                                        </button>

                                        <button wire:click="deleteForever(<?php echo e($row->id); ?>)"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete forever?')">
                                            <i class="fa fa-trash"></i> Delete Forever
                                        </button>
                                    <?php else: ?>
                                        <button wire:click="junk(<?php echo e($row->id); ?>)"
                                                class="btn btn-warning btn-sm">
                                            <i class="fa fa-trash-o"></i> Junk
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="10" class="text-center py-4">
                                    <i class="fa fa-inbox fa-3x text-muted mb-2"></i>
                                    <p class="text-muted">No records found</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <?php echo e($items->links()); ?>

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

    <script>
        document.addEventListener('livewire:load', function() {
            initializeFreeRepairDatePicker();
        });

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeFreeRepairDatePicker);
        } else {
            initializeFreeRepairDatePicker();
        }

        function initializeFreeRepairDatePicker() {
            if (window.freeRepairDatePickerInitialized) return;
            window.freeRepairDatePickerInitialized = true;

            class LivewireGoogleDatePicker {
                constructor() {
                    this.startDate = null;
                    this.endDate = null;
                    this.tempStartDate = null;
                    this.tempEndDate = null;
                    this.currentMonth1 = new Date();
                    this.currentMonth2 = new Date();
                    this.currentMonth2.setMonth(this.currentMonth2.getMonth() + 1);
                    this.init();
                }

                init() {
                    this.setupEventListeners();
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                setupEventListeners() {
                    const startBox = document.getElementById('startDateBox');
                    const endBox = document.getElementById('endDateBox');
                    if (!startBox || !endBox) { setTimeout(() => this.init(), 150); return; }

                    startBox.addEventListener('click', () => this.openDropdown());
                    endBox.addEventListener('click', () => this.openDropdown());

                    document.getElementById('googleCancelBtn').addEventListener('click', () => this.closeDropdown());
                    document.getElementById('googleApplyBtn').addEventListener('click', () => this.applyDates());

                    document.getElementById('googlePrevMonth').addEventListener('click', () => this.previousMonth());
                    document.getElementById('googleNextMonth').addEventListener('click', () => this.nextMonth());

                    document.getElementById('googleMonth1').addEventListener('change', (e) => this.changeMonth(1, e.target.value));
                    document.getElementById('googleMonth2').addEventListener('change', (e) => this.changeMonth(2, e.target.value));

                    document.querySelectorAll('.google-preset-option').forEach(option => {
                        option.addEventListener('click', (e) => {
                            const preset = e.target.closest('.google-preset-option').dataset.preset;
                            this.selectPreset(preset);
                        });
                    });
                }

                openDropdown() {
                    document.getElementById('googleDateDropdown').classList.add('show');
                    this.tempStartDate = this.startDate ? new Date(this.startDate) : null;
                    this.tempEndDate = this.endDate ? new Date(this.endDate) : null;
                    this.renderCalendars();
                }

                closeDropdown() {
                    document.getElementById('googleDateDropdown').classList.remove('show');
                }

                applyDates() {
                    if (this.tempStartDate && this.tempEndDate) {
                        this.startDate = new Date(this.tempStartDate);
                        this.endDate = new Date(this.tempEndDate);
                        this.updateDisplay();
                        this.updateLivewire();
                        this.closeDropdown();
                    }
                }

                updateDisplay() {
                    const formatShort = (date) => {
                        const d = String(date.getDate()).padStart(2,'0');
                        const m = String(date.getMonth()+1).padStart(2,'0');
                        const y = date.getFullYear();
                        return `${d}/${m}/${y}`;
                    };
                    const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    const formatLong = (date) => `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;

                    document.getElementById('startDateDisplay').textContent = formatShort(this.startDate);
                    document.getElementById('endDateDisplay').textContent = formatLong(this.endDate);
                }

                updateLivewire() {
                    const toYmd = (date) => {
                        const y = date.getFullYear();
                        const m = String(date.getMonth()+1).padStart(2,'0');
                        const d = String(date.getDate()).padStart(2,'0');
                        return `${y}-${m}-${d}`;
                    };

                    if (typeof Livewire !== 'undefined') {
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('fromDate', toYmd(this.startDate));
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('toDate', toYmd(this.endDate));
                        Livewire.emit('refreshFreeRepairBookings');
                    }
                }

                selectPreset(preset) {
                    const today = new Date(); today.setHours(0,0,0,0);

                    document.querySelectorAll('.google-preset-option').forEach(opt => opt.classList.remove('active'));
                    const el = document.querySelector(`[data-preset="${preset}"]`);
                    if (el) el.classList.add('active');

                    switch(preset) {
                        case 'today':
                            this.tempStartDate = new Date(today);
                            this.tempEndDate = new Date(today);
                            break;
                        case 'yesterday':
                            const y = new Date(today); y.setDate(y.getDate()-1);
                            this.tempStartDate = new Date(y); this.tempEndDate = new Date(y);
                            break;
                        case 'last-7':
                            this.tempEndDate = new Date(today);
                            this.tempStartDate = new Date(today); this.tempStartDate.setDate(this.tempStartDate.getDate()-6);
                            break;
                        case 'last-14':
                            this.tempEndDate = new Date(today);
                            this.tempStartDate = new Date(today); this.tempStartDate.setDate(this.tempStartDate.getDate()-13);
                            break;
                        case 'last-30':
                            this.tempEndDate = new Date(today);
                            this.tempStartDate = new Date(today); this.tempStartDate.setDate(this.tempStartDate.getDate()-29);
                            break;
                        case 'this-month':
                            this.tempStartDate = new Date(today.getFullYear(), today.getMonth(), 1);
                            this.tempEndDate = new Date(today);
                            break;
                        case 'last-month':
                            this.tempStartDate = new Date(today.getFullYear(), today.getMonth()-1, 1);
                            this.tempEndDate = new Date(today.getFullYear(), today.getMonth(), 0);
                            break;
                        case 'this-week':
                            const dow = today.getDay();
                            const toMon = dow === 0 ? 6 : dow - 1;
                            this.tempStartDate = new Date(today); this.tempStartDate.setDate(today.getDate()-toMon);
                            this.tempEndDate = new Date(today);
                            break;
                        case 'last-week':
                            const end = new Date(today);
                            const dow2 = today.getDay();
                            const toSun = dow2 === 0 ? 0 : dow2;
                            end.setDate(today.getDate()-toSun);
                            this.tempEndDate = new Date(end);
                            this.tempStartDate = new Date(end); this.tempStartDate.setDate(end.getDate()-6);
                            break;
                        default:
                            break;
                    }
                    this.renderCalendars();
                }

                populateMonthSelectors() {
                    const months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
                    const cy = new Date().getFullYear();
                    const s1 = document.getElementById('googleMonth1');
                    const s2 = document.getElementById('googleMonth2');
                    if (!s1 || !s2) return;

                    [s1,s2].forEach(sel => {
                        sel.innerHTML = '';
                        for (let y = cy-2; y <= cy+2; y++) {
                            months.forEach((m, idx) => {
                                const opt = document.createElement('option');
                                opt.value = `${y}-${idx}`;
                                opt.textContent = `${m} ${y}`;
                                sel.appendChild(opt);
                            });
                        }
                    });

                    s1.value = `${this.currentMonth1.getFullYear()}-${this.currentMonth1.getMonth()}`;
                    s2.value = `${this.currentMonth2.getFullYear()}-${this.currentMonth2.getMonth()}`;
                }

                changeMonth(num, val) {
                    const [y,m] = val.split('-').map(Number);
                    if (num === 1) {
                        this.currentMonth1 = new Date(y,m,1);
                        this.currentMonth2 = new Date(y,m+1,1);
                    } else {
                        this.currentMonth2 = new Date(y,m,1);
                    }
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                previousMonth() {
                    this.currentMonth1.setMonth(this.currentMonth1.getMonth()-1);
                    this.currentMonth2.setMonth(this.currentMonth2.getMonth()-1);
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                nextMonth() {
                    this.currentMonth1.setMonth(this.currentMonth1.getMonth()+1);
                    this.currentMonth2.setMonth(this.currentMonth2.getMonth()+1);
                    this.populateMonthSelectors();
                    this.renderCalendars();
                }

                renderCalendars() {
                    this.renderCalendar('googleCalendar1', this.currentMonth1);
                    this.renderCalendar('googleCalendar2', this.currentMonth2);
                }

                renderCalendar(id, date) {
                    const cal = document.getElementById(id);
                    if (!cal) return;

                    const year = date.getFullYear();
                    const month = date.getMonth();

                    const header = document.createElement('div');
                    header.className = 'google-calendar-header';
                    ['M','T','W','T','F','S','S'].forEach(d => {
                        const el = document.createElement('div');
                        el.className = 'google-day-name';
                        el.textContent = d;
                        header.appendChild(el);
                    });

                    const grid = document.createElement('div');
                    grid.className = 'google-calendar-grid';

                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month+1, 0).getDate();
                    const prevLast = new Date(year, month, 0).getDate();
                    const startDay = firstDay === 0 ? 6 : firstDay - 1;

                    const today = new Date(); today.setHours(0,0,0,0);

                    for (let i = startDay; i > 0; i--) {
                        grid.appendChild(this.createDayElement(prevLast - i + 1, true, new Date(year, month-1, prevLast - i + 1)));
                    }

                    for (let i = 1; i <= lastDate; i++) {
                        const d = new Date(year, month, i);
                        const el = this.createDayElement(i, false, d);

                        if (d.getTime() === today.getTime()) el.classList.add('today');

                        if (this.tempStartDate && this.tempEndDate) {
                            const t = d.getTime();
                            const s = this.tempStartDate.getTime();
                            const e = this.tempEndDate.getTime();

                            if (t === s && t === e) el.classList.add('selected');
                            else if (t === s) el.classList.add('range-start');
                            else if (t === e) el.classList.add('range-end');
                            else if (t > s && t < e) el.classList.add('in-range');
                        }

                        grid.appendChild(el);
                    }

                    const remaining = 42 - (startDay + lastDate);
                    for (let i = 1; i <= remaining; i++) {
                        grid.appendChild(this.createDayElement(i, true, new Date(year, month+1, i)));
                    }

                    cal.innerHTML = '';
                    cal.appendChild(header);
                    cal.appendChild(grid);
                }

                createDayElement(dayNum, other, date) {
                    const el = document.createElement('div');
                    el.className = 'google-calendar-day';
                    el.textContent = dayNum;
                    if (other) el.classList.add('other-month');

                    el.addEventListener('click', (e) => {
                        e.stopPropagation();
                        this.selectDate(date);
                    });

                    return el;
                }

                selectDate(date) {
                    if (!this.tempStartDate || (this.tempStartDate && this.tempEndDate)) {
                        this.tempStartDate = new Date(date);
                        this.tempEndDate = null;
                    } else {
                        if (date < this.tempStartDate) {
                            this.tempEndDate = new Date(this.tempStartDate);
                            this.tempStartDate = new Date(date);
                        } else {
                            this.tempEndDate = new Date(date);
                        }
                    }
                    this.renderCalendars();
                }
            }

            new LivewireGoogleDatePicker();
        }
    </script>
</div>
<?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/free-repair-bookings/index.blade.php ENDPATH**/ ?>