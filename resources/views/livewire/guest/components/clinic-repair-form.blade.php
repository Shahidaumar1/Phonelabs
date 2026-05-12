@php
use App\Models\SiteSetting;
use Carbon\Carbon;
$setting = SiteSetting::first();
@endphp

<div class="booking-wrapper">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap');

        :root {
            --primary-blue: #1ba6e7;
            --primary-dark: #0f7cb1;
            --accent-red: #EA1555;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --card-shadow: 0 12px 40px -12px rgba(0,0,0,0.08);
            --bg-light: #f1f5f9;
        }

        .booking-wrapper {
            font-family: "Manrope", sans-serif;
            width: 100%;
            height: 100vh;
            max-height: 900px;
            margin: 0 auto;
            background: var(--bg-light);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        /* --- GLOBAL MAP BACKGROUND --- */
        .global-map-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.5;
            pointer-events: none;
        }
        
        .global-map-bg iframe {
            width: 100%;
            height: 100%;
            border: 0;
            filter: grayscale(0.8) contrast(1.1);
        }

        /* --- NAVIGATION HEADER --- */
        .nav-header {
            height: 70px;
            display: flex;
            align-items: center;
            padding: 0 24px;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(12px);
            position: relative;
            z-index: 100;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .btn-back-pill {
            background: #fff;
            color: var(--text-dark);
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .btn-back-pill:hover {
            background: var(--text-dark);
            color: #fff;
            transform: translateX(-3px);
        }

        /* --- SEARCH SECTION --- */
        .header-search {
            padding: 30px 20px;
            display: flex;
            justify-content: center;
            position: relative;
            z-index: 10;
        }

        .search-container {
            width: 100%;
            max-width: 450px;
        }

        .search-pill {
            display: flex;
            background: #fff;
            padding: 8px;
            border-radius: 100px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border: 1px solid #fff;
            transition: border-color 0.3s;
        }

        .search-pill:focus-within {
            border-color: var(--primary-blue);
        }

        .search-pill input {
            flex: 1;
            border: none;
            padding: 0 24px;
            outline: none;
            font-size: 15px;
            font-weight: 600;
            background: transparent;
            color: var(--text-dark);
        }

        .search-pill button {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 100px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
            letter-spacing: 0.5px;
        }

        .search-pill button:hover {
            background: var(--primary-dark);
            box-shadow: 0 4px 12px rgba(27, 166, 231, 0.3);
        }

        /* --- CONTENT AREA --- */
        .content-scroll-area {
            flex: 1;
            overflow-y: auto;
            padding: 10px 24px 60px 24px;
            position: relative;
            z-index: 10;
            scrollbar-width: none;
        }
        .content-scroll-area::-webkit-scrollbar { display: none; }

        .branch-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* --- AMAZING CARD DESIGN --- */
        .branch-card {
            background: #ffffff;
            border-radius: 28px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.7);
            box-shadow: var(--card-shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            flex-direction: column;
        }

        .branch-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.12);
            border-color: var(--primary-blue);
        }

        .card-info-layer {
            padding: 30px;
            position: relative;
        }

        .distance-badge {
            position: absolute;
            top: 25px;
            right: 25px;
            background: #fff1f2;
            color: var(--accent-red);
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 5px;
            border: 1px solid #ffe4e6;
        }

        .branch-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-dark);
            margin: 0 0 10px 0;
            padding-right: 80px;
            line-height: 1.2;
        }

        .contact-pill-box { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 8px; 
            margin-bottom: 24px; 
        }

        .c-pill {
            background: #f8fafc;
            color: var(--text-muted);
            padding: 8px 14px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            border: 1px solid #f1f5f9;
        }

        .c-pill.status-open {
            background: #f0fdf4;
            color: #16a34a;
            border-color: #dcfce7;
        }

        .btn-select-branch {
            width: 100%;
            background: var(--primary-blue);
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-dark) 100%);
            color: #fff;
            border: none;
            padding: 16px;
            border-radius: 18px;
            font-weight: 800;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            transition: 0.3s;
            box-shadow: 0 10px 20px -5px rgba(27, 166, 231, 0.4);
        }

        .btn-select-branch:hover {
            box-shadow: 0 15px 25px -5px rgba(27, 166, 231, 0.5);
            transform: scale(1.02);
        }

        /* --- STEP 1 FLOW --- */
        .selection-flow-container {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .selection-flow {
            width: 100%;
            max-width: 450px;
        }

        .action-capsule {
            background: #ffffff;
            border: 2px solid #f1f5f9;
            border-radius: 24px;
            padding: 22px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 20px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .action-capsule:hover {
            border-color: var(--primary-blue);
            background: #fff;
            transform: translateY(-2px);
        }

        .capsule-icon {
            width: 54px;
            height: 54px;
            background: #eff6ff;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 1.4rem;
        }

        .capsule-content { flex: 1; }
        .capsule-label { font-size: 11px; color: var(--text-muted); font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; }
        .capsule-value { font-size: 17px; color: var(--text-dark); font-weight: 700; margin-top: 2px; }

        /* --- MODALS --- */
        .dialogue-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .dialogue-modal {
            background: white;
            width: 100%;
            max-width: 420px;
            border-radius: 32px;
            padding: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .cute-time-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            max-height: 300px;
            overflow-y: auto;
            padding: 4px;
        }

        .time-pill {
            padding: 14px;
            border-radius: 16px;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            text-align: center;
            font-weight: 700;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }

        .time-pill:hover { border-color: var(--primary-blue); background: #fff; }
        .time-pill.active { background: var(--primary-blue); color: white; border-color: var(--primary-blue); }

        .btn-confirm {
            background: var(--text-dark);
            color: white;
            border: none;
            width: 100%;
            padding: 20px;
            border-radius: 20px;
            font-weight: 800;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-confirm:not(:disabled):hover {
            background: #000;
            transform: translateY(-2px);
        }

        .btn-confirm:disabled { opacity: 0.5; cursor: not-allowed; }

        [x-cloak] { display: none !important; }

        @media (max-width: 768px) {
            .branch-grid { grid-template-columns: 1fr; gap: 20px; }
            .booking-wrapper { height: 100vh; max-height: none; }
            .nav-header { height: 65px; padding: 0 15px; }
            .card-info-layer { padding: 25px; }
            .branch-title { font-size: 18px; }
        }
        /* Calendar date hover */
.select-calender-slots-inner .date-box-inner table tbody tr td{
    cursor:pointer;
    transition:0.3s ease;
    border-radius:10px;
}

.select-calender-slots-inner .date-box-inner table tbody tr td:hover{
    background:#EA1555 !important;
    color:#fff !important;
    transform:scale(1.08);
}

/* Time slot hover */
.select-calender-slots-inner .selec-time-box 
.select-time-inner 
.slect-slot-now button{
    transition:0.3s ease;
    cursor:pointer;
    border:1px solid transparent;
}

.select-calender-slots-inner .selec-time-box 
.select-time-inner 
.slect-slot-now button:hover{
    background:#EA1555 !important;
    color:#fff !important;
    border:1px solid #EA1555;
    transform:translateY(-2px);
    box-shadow:0 4px 12px rgba(234,21,85,0.25);
}
    </style>

    <form x-data="{ 
        step: 0, 
        showDate: false,
        showTime: false
    }" wire:submit.prevent="submitForm" style="display:contents;">

        <div class="nav-header" x-show="step > 0" x-cloak>
            <a href="javascript:void(0)" @click="step = step - 1" class="btn-back-pill">
                <i class="fa fa-arrow-left"></i> Change Store
            </a>
        </div>

        <div class="global-map-bg">
            @if(!empty($setting->map_link)) {!! $setting->map_link !!} @endif
        </div>

        <div x-show="step === 0" x-transition x-cloak style="display:contents;">
            <div class="header-search">
                <div class="search-container">
                    <div class="search-pill">
                        <input type="text" wire:model.defer="postalCode" placeholder="Enter Post Code / City">
                        <button type="button" wire:click="getLatLong">Find Stores</button>
                    </div>
                </div>
            </div>

            <div class="content-scroll-area">
                <div class="branch-grid">
                    @php $branchSource = !empty($nearestBranches) ? $nearestBranches : $branches; @endphp
                    
                    @foreach ($branchSource as $branch)
                        @php 
                            $bId = is_array($branch) ? $branch['id'] : $branch->id;
                            $bName = is_array($branch) ? $branch['name'] : $branch->name;
                            $bDist = is_array($branch) ? number_format($branch['distance'] * 0.621371, 1) : null;
                            $phone = is_array($branch) ? ($branch['landline_number'] ?? $branch['mobile_number'] ?? '') : ($branch->landline_number ?? $branch->mobile_number ?? '');
                        @endphp

                        <div class="branch-card">
                            <div class="card-info-layer">
                                @if($bDist)
                                    <div class="distance-badge">
                                        <i class="fa fa-location-arrow"></i> {{ $bDist }} mi
                                    </div>
                                @endif

                                <h5 class="branch-title">{{ $bName }}</h5>

                                <div class="contact-pill-box">
                                    @if($phone)
                                        <span class="c-pill"><i class="fa fa-phone"></i> {{ $phone }}</span>
                                    @endif
                                    <span class="c-pill status-open"><i class="fa fa-circle" style="font-size: 8px;"></i> Open Today</span>
                                </div>

                                <button type="button" class="btn-select-branch" wire:click="selectBranch({{ $bId }})" @click="step = 1">
                                    Select This Store <i class="fa fa-chevron-right ms-2" style="font-size: 10px;"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div x-show="step === 1" x-transition x-cloak class="content-scroll-area">
            <div class="selection-flow-container">
                <div class="text-center mb-5">
                    <h2 class="fw-extrabold" style="color: var(--text-dark); font-weight: 800;">Secure Your Slot</h2>
                    <p class="text-muted">High demand for this location. Pick a time below.</p>
                </div>

                <div class="selection-flow">
                    <div class="action-capsule" @click="showDate = true">
                        <div class="capsule-icon"><i class="fa fa-calendar-day"></i></div>
                        <div class="capsule-content">
                            <div class="capsule-label">Appointment Date</div>
                            <div class="capsule-value">
                                {{ $clinic['appointment_date'] ? Carbon::parse($clinic['appointment_date'])->format('l, M d') : 'Select Date' }}
                            </div>
                        </div>
                        <i class="fa fa-chevron-right text-light"></i>
                    </div>

                    <div class="action-capsule" @click="showTime = true">
                        <div class="capsule-icon"><i class="fa fa-clock"></i></div>
                        <div class="capsule-content">
                            <div class="capsule-label">Preferred Time</div>
                            <div class="capsule-value">
                                {{ $clinic['appointment_time'] ?: 'Select Time' }}
                            </div>
                        </div>
                        <i class="fa fa-chevron-right text-light"></i>
                    </div>

                    <button type="submit" class="btn-confirm" {{ empty($clinic['appointment_time']) ? 'disabled' : '' }} @click="step = 2">
                        Confirm Appointment <i class="fa fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="showDate" x-cloak class="dialogue-overlay" @click.away="showDate = false">
            <div class="dialogue-modal" @click.stop>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="m-0 fw-bold">Select Date</h5>
                    <button type="button" @click="showDate = false" class="btn-close"></button>
                </div>
                
                <div class="bg-light rounded-4 p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button type="button" class="btn btn-sm btn-white border shadow-sm" wire:click="previousMonth"><i class="fa fa-chevron-left"></i></button>
                        <span class="fw-bold">{{ $this->currentMonth->format('F Y') }}</span>
                        <button type="button" class="btn btn-sm btn-white border shadow-sm" wire:click="nextMonth"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <table class="w-100 text-center">
                        <thead class="small text-muted fw-bold">
                            <tr><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th><th>S</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($this->calendarDays as $week)
                                <tr>
                                    @foreach ($week as $day)
                                        <td class="p-1">
                                            <div wire:click="selectDate('{{ $day['date'] }}')"
                                                 @click="showDate = false"
                                                 class="mx-auto d-flex align-items-center justify-content-center {{ $clinic['appointment_date'] === $day['date'] ? 'bg-primary text-white shadow-primary' : '' }} {{ $day['disabled'] ? 'opacity-25' : 'cursor-pointer day-hover' }}"
                                                 style="width:36px; height:36px; border-radius:12px; font-weight:700; font-size:13px; transition:0.2s;">
                                                {{ $day['day'] }}
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-show="showTime" x-cloak class="dialogue-overlay" @click.away="showTime = false">
            <div class="dialogue-modal" @click.stop>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="m-0 fw-bold">Available Slots</h5>
                    <button type="button" @click="showTime = false" class="btn-close"></button>
                </div>

                <div class="cute-time-grid">
                    @forelse ($timeSlots as $slot)
                        <div class="time-pill {{ $clinic['appointment_time'] === $slot ? 'active' : '' }}"
                             wire:click="$set('clinic.appointment_time', '{{ $slot }}')" @click="showTime = false">
                            {{ $slot }}
                        </div>
                    @empty
                        <div class="text-center w-100 py-5">
                            <i class="fa fa-calendar-times mb-3 d-block text-light" style="font-size: 40px;"></i>
                            <p class="text-muted small">Select a date to view available times</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div x-show="step === 2" x-cloak></div>

    </form>
</div>