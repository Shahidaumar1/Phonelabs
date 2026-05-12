<div>
    {{-- TOP BAR + NAV --}}
    <livewire:components.top-bar />
    <livewire:components.mega-nav />

    <style>
        .breadcrumb-thread {
            display: flex;
            flex-wrap: wrap;
            padding-top: 100px;
            padding-bottom: 50px;
            margin-bottom: 1rem;
            list-style: none;
            background-color: transparent;
            border-radius: .25rem;
        }
        .breadcrumb-thread .breadcrumb-item {
            display: flex;
            align-items: center;
            position: relative;
        }
        .breadcrumb-thread .breadcrumb-item + .breadcrumb-item::before {
            content: '';
            width: 20px;
            height: 2px;
            background-color: #6c757d;
            position: absolute;
            left: -21px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }
        .breadcrumb-thread .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 9999px;
            position: relative;
            z-index: 2;
            color: black;
        }
        .breadcrumb-thread .breadcrumb-item a:hover {
            color: #dc3545;
            text-decoration: none;
            border: 1px solid #dc3545;
        }
        .breadcrumb-thread .breadcrumb-item a.active {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>

    {{-- STEPPER (desktop) --}}
    <div class="d-none d-md-block" style="display:flex;justify-content:center;align-items:center;margin:0;">
        <div class="container mt-3" style="text-align:center;">
            <ul class="breadcrumb-thread d-flex justify-content-center" id="form-navigation" style="padding:0;list-style:none;">
                <li class="breadcrumb-item" style="margin:0 10px;">
                    <a href="#" data-step="0">Product Info</a>
                </li>
                <li class="breadcrumb-item" style="margin:0 10px;">
                    <a href="#" data-step="1">Select Condition</a>
                </li>
                <li class="breadcrumb-item" style="margin:0 10px;">
                    <a href="#" data-step="2">Personal Detail</a>
                </li>
                <li class="breadcrumb-item" style="margin:0 10px;">
                    <a href="#" data-step="3">Book / Pay</a>
                </li>
            </ul>
        </div>
    </div>

    {{-- STEP 0: PRODUCT INFO --}}
    <section id="product-info-section" class="form-step">
        <div class="container mt-5">
            <div class="row">
                {{-- LEFT: image / slider --}}
                <div class="col-lg-6 p-5 mt-5 text-center">
                    @php
                        $decodedImages = json_decode($product_spec_image, true);
                    @endphp

                    @if (empty($decodedImages))
                        <img src="{{ $product_spec_image ?? $model->file }}"
                             class="img-fluid"
                             style="min-width:75%;max-height:480px;">
                    @else
                        <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($decodedImages as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }} text-center">
                                        <img src="{{ $image }}" class="img-fluid"
                                             style="min-width:75%;max-height:480px;" alt="Image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev text-bg-danger" type="button"
                                    data-bs-target="#imageSlider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next text-bg-danger" type="button"
                                    data-bs-target="#imageSlider" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>

                {{-- RIGHT: specs + options --}}
                <div class="col-lg-6">
                    <div class="mt-4 text-center">
                        <h6 class="fs-2 fw-bold">Please select specifications</h6>
                        <p class="text-danger">(This enables us to offer you a preliminary estimate.)</p>
                    </div>

                    <div class="mt-5">
                        <p class="fs-3 fw-bold">{{ $model->name }}</p>

                        {{-- Memory sizes --}}
                        @if (!empty($available_memory_sizes))
                            <p class="fs-6 fw-bold">Select 	Category:</p>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach ($available_memory_sizes as $memory_size)
                                    <button type="button"
                                            class="btn btn-outline-danger {{ $memory_size == $selectedMemorySize ? 'bg-danger text-white' : '' }}"
                                            wire:click="$set('selectedMemorySize', '{{ $memory_size }}')">
                                        {{ $memory_size }}
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        {{-- Grade --}}
                        @if (!empty($available_grades))
                            <p class="fs-5 mt-3 fw-bold">Select Grade:</p>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach ($available_grades as $grade)
                                    <button type="button"
                                            class="btn btn-outline-dark {{ $grade == $selectedGrade ? 'bg-danger text-white' : '' }}"
                                            wire:click="$set('selectedGrade', '{{ $grade }}')">
                                        {{ $grade }}
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        {{-- Color --}}
                        @if (!empty($available_colors))
                            <p class="fs-5 mt-3 fw-bold">Color:</p>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach ($available_colors as $color)
                                    <button type="button"
                                            class="btn btn-outline-dark {{ $color == $selectedColor ? 'bg-danger text-white' : '' }}"
                                            wire:click="$set('selectedColor', '{{ $color }}')">
                                        {{ $color }}
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        {{-- Quantity --}}
                        <div class="mt-3">
                            <label for="quantity">Quantity: only {{ $available_quantity }} Available</label>
                            <div class="input-group mt-2" style="max-width:max-content;">
                                <button type="button" class="btn btn-danger"
                                        wire:click="decreaseQuantity">-</button>

                                <input type="number"
                                       class="form-control border-0 text-center"
                                       wire:model="quantity"
                                       min="1"
                                       max="{{ $available_quantity }}"
                                       step="1"
                                       wire:change="quantityChanged">

                                <button type="button" class="btn btn-success"
                                        wire:click="increaseQuantity">+</button>
                            </div>
                        </div>

                        {{-- Accordions: details / specs / warranty --}}
                        <div class="accordion mt-4">
                            <div class="accordion-item" x-data="{ openTab: 1 }">
                                <div class="accordion-header bg-gray p-2 cursor-pointer"
                                     x-on:click="openTab === 1 ? openTab = 0 : openTab = 1">
                                    <span class="fw-bold">Details</span>
                                    <i x-show="openTab !== 1" class="fa fa-plus"></i>
                                    <i x-show="openTab === 1" class="fa fa-minus"></i>
                                </div>
                                <div class="accordion-content" x-show="openTab === 1">
                                    {!! $detail ?? '' !!}
                                </div>
                            </div>

                            <div class="accordion-item" x-data="{ openTab: 2 }">
                                <div class="accordion-header bg-gray p-2 cursor-pointer"
                                     x-on:click="openTab === 2 ? openTab = 0 : openTab = 2">
                                    <span class="fw-bold">Specification</span>
                                    <i x-show="openTab !== 2" class="fa fa-plus"></i>
                                    <i x-show="openTab === 2" class="fa fa-minus"></i>
                                </div>
                                <div class="accordion-content" x-show="openTab === 2">
                                    {!! $specification ?? '' !!}
                                </div>
                            </div>

                            <div class="accordion-item" x-data="{ openTab: 3 }">
                                <div class="accordion-header bg-gray p-2 cursor-pointer"
                                     x-on:click="openTab === 3 ? openTab = 0 : openTab = 3">
                                    <span class="fw-bold">Warranty</span>
                                    <i x-show="openTab !== 3" class="fa fa-plus"></i>
                                    <i x-show="openTab === 3" class="fa fa-minus"></i>
                                </div>
                                <div class="accordion-content" x-show="openTab === 3">
                                    {!! $warranty ?? '' !!}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 fs-5 text-danger fw-bold mt-4" id="cashText">
                            <h2 style="white-space:nowrap;">Cash Value: £ {{ number_format($price, 2) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STEP 1: FORM TOGGLE (postal / collection / clinic / fix etc) --}}
    <section id="form-toggle-section" class="form-step pt-5" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rounded p-4">
                        <livewire:guest.components.form-toggle :data="$data" :key="uniqid()" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STEP 2: PATIENT / CUSTOMER DETAILS --}}
    <section id="patient-detail-section" class="form-step" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rounded p-4">
                        <livewire:guest.components.patient-detail-form :key="uniqid()" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STEP 3: BOOKING + PAYMENT (summary + stripe + paypal etc.) --}}
    <section id="booking-section" class="form-step" style="display:none;">
        <div class="container" wire:ignore>
            {{-- yahi component tumhara existing buy / repair payment flow handle karta hai --}}
            <livewire:guest.buy.book-repair :data="$data" :key="uniqid()" />
        </div>
    </section>

    {{-- NEXT / BACK BUTTONS --}}
    <div class="container mt-3" style="position:relative;">
        <div class="d-flex justify-content-between">
            <button type="button" id="back-button" class="btn" style="display:none;">
                <img src="https://ik.imagekit.io/b6iqka2sz/prev.png?updatedAt=1719938010352"
                     style="width:150px;height:auto;margin-left:auto;">
            </button>

            <button id="next-button" type="button" class="button-27"
                    style="width:150px;height:auto;margin-left:auto;">
                Next
            </button>
        </div>
    </div>

    {{-- JS FOR STEP WIZARD --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = ['#product-info-section', '#form-toggle-section', '#patient-detail-section', '#booking-section'];
            let currentStep = 0;
            let formCompleted = [true, false, false, true];

            function showStep(stepIndex) {
                steps.forEach((step, index) => {
                    $(step).toggle(index === stepIndex);
                });

                $('#back-button').toggle(stepIndex > 0);
                $('#next-button').toggle(stepIndex < steps.length - 1);

                $('#form-navigation .breadcrumb-item a').removeClass('active');
                $('#form-navigation .breadcrumb-item a[data-step="' + stepIndex + '"]').addClass('active');
            }

            function moveToNextStep() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }

            $('#back-button').on('click', function () {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            $('#next-button').on('click', function () {
                if (formCompleted[currentStep]) {
                    Livewire.emit('formSubmitted', currentStep);
                } else {
                    alert('Please complete the current step.');
                }
            });

            Livewire.on('formSubmitted', function (stepIndex) {
                formCompleted[stepIndex] = true;
                moveToNextStep();
            });

            Livewire.on('formInvalid', function (stepIndex) {
                formCompleted[stepIndex] = false;
                showStep(currentStep);
            });

            $('#form-navigation .breadcrumb-item a').on('click', function (e) {
                e.preventDefault();
                const stepIndex = $(this).data('step');
                currentStep = stepIndex;
                showStep(currentStep);
            });

            showStep(currentStep);
        });
    </script>
</div>
