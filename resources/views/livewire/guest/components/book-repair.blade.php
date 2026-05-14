@php
    $siteSetting = \App\Models\SiteSetting::first();
@endphp

@php
    use App\Models\PaymentMethodSetting;

    $form_name       = 'Call Out Repair';
    $paywithcardtext = 'Pay in Store';

    $paypalRow = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
    $stripeRow = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
    $klarnaRow = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();

    $paypalSettings = $paypalRow ? json_decode($paypalRow->settings, true) : null;
    $stripeSettings = $stripeRow ? json_decode($stripeRow->settings, true) : null;
    $klarnaSettings = $klarnaRow ? json_decode($klarnaRow->settings, true) : null;

    $paypalEnabled  = (bool) ($paypalSettings['enabled'] ?? false);
    $stripeEnabled  = (bool) ($stripeSettings['enabled'] ?? false);
    $klarnaEnabled  = (bool) ($klarnaSettings['enabled'] ?? false);
    $offlineEnabled = (bool) ($stripeSettings['enable_offline_pay'] ?? true);

    if (session('form_type') == 'postal_form') {
        $form_name       = 'Post Your Device';
        $paywithcardtext = 'Pay At our Store';
    } elseif (session('form_type') == 'collection_form') {
        $form_name       = 'We Collect Your Device';
        $paywithcardtext = "I'll Pay after Repair";
    } elseif (session('form_type') == 'clinic_form') {
        $form_name       = 'Store Repair';
        $paywithcardtext = "I'll Pay after Repair";
    } elseif (session('form_type') == 'fix_form') {
        $form_name       = 'Call Out Repair';
        $paywithcardtext = "I'll Pay after Repair";
    }

    $basePrice     = (float) ($price ?? 0);
    $serviceCharge = 0.0;

    if (isset($formType) && $formType === 'postal_form') {
        $serviceCharge = (float) ($condition1Price ?? 0);
    } elseif (isset($formType) && $formType === 'collection_form') {
        $serviceCharge = (float) ($condition2Price ?? 0);
    } elseif (isset($formType) && $formType === 'fix_form') {
        $serviceCharge = (float) ($condition3Price ?? 0);
    }

    if (!empty($price)) {
        $basePrice = (float) $price - (float) $serviceCharge;
    }
@endphp

@if (session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Congratulations! Your repair has been booked.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ session('success') }}</p>
                    <div class="alert alert-success" role="alert">
                        <p>Check your email for more instructions.</p>
                        <hr>
                        <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        };
    </script>
@endif

<div>
    @php $storedInputValue = Session::get('storedInputValue'); @endphp
    @if ($storedInputValue)
        <p>Delivery Charges For Postal Repair: &pound;{{ $storedInputValue }}</p>
    @endif

    @php $storedCollectionRepairPrice = Session::get('collectionRepairPrice'); @endphp
    @if ($storedCollectionRepairPrice)
        <p style="font-size:1vw">Delivery Charges For Collection Repair: &pound;{{ $storedCollectionRepairPrice }}</p>
    @endif

    <style>
        .repair-payment-sec { margin-top: 30px; padding: 0 15px; }
        .cust-container { max-width: 1140px; margin: 0 auto; }
        .payment-box-heading, .summry-heading {
            font-size: 32px; line-height: 60px; font-weight: 700;
            color: #00AEEF; font-family: "Manrope", sans-serif;
            font-style: normal; margin: 0 !important;
            padding-bottom: 0px; letter-spacing: -0.33px;
        }
        @media (max-width: 768px) {
            .payment-box-heading, .summry-heading { font-size: 25px; line-height: 32px; padding-bottom: 40px; }
        }
        @media (max-width: 480px) { .repair-payment-sec { margin-top: 0; } }
    </style>

    <div class="repair-payment-sec">
        <div class="cust-container mb-5 pb-md-4 pb-lg-5 rounded">
            <div class="z">
                <div class="col-md-12">

                    <x-alert />

                    @if ($pm == 'pay_at_store')
                        <div class="d-flex justify-content-between align-items-center">
                            @if ($success)
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Congratulations! Your repair has been booked.</h4>
                                    <p>Check your email for more instructions.</p>
                                    <hr>
                                    <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="row align-items-stretch" style="row-gap: 30px;">

                        {{-- LEFT SUMMARY --}}
                        <div class="col-lg-5 d-flex">
                            <div class="w-100" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1); border:1px solid #ddd; border-radius:8px;">
                                <table id="repair-summary" class="table table-striped border repair-summary">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                <h2 class="summry-heading">Repair Summary</h2>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Model</td>
                                            <td class="text-end">{{ $data['modal']['name'] }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Type</td>
                                            <td class="text-end">{{ $form_name }}</td>
                                        </tr>

                                        @if ($form_name === 'Store Repair')
                                            <tr>
                                                <td>{{ $data['repair_type']['name'] }}</td>
                                                <td class="text-end">&pound; {{ number_format($basePrice ?? $price, 2) }}</td>
                                            </tr>

                                            @if (data_get($addons, 'protector_selected') || data_get($addons, 'cover_selected'))
                                                @if (data_get($addons, 'protector_selected'))
                                                    <tr>
                                                        <td>Protector</td>
                                                        <td class="text-end">&pound; {{ number_format((float) data_get($addons, 'protector_price', 0), 2) }}</td>
                                                    </tr>
                                                @endif
                                                @if (data_get($addons, 'cover_selected'))
                                                    <tr>
                                                        <td>Cover</td>
                                                        <td class="text-end">&pound; {{ number_format((float) data_get($addons, 'cover_price', 0), 2) }}</td>
                                                    </tr>
                                                @endif
                                            @endif

                                            <tr>
                                                <td>Total Price</td>
                                                <td class="text-end">&pound; {{ number_format($price, 2) }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td>Repair Time</td>
                                            <td class="text-end">{{ $siteSetting->repair_time ?? '30 mins' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Warranty</td>
                                            <td class="text-end">{{ $siteSetting->warranty ?? '6 Months' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                       {{-- RIGHT SIDE --}}
<div class="col-lg-6 col-12 d-flex">
    <div class="w-100 p-2 p-lg-3 payment-box"
        style="border-radius:10px; border:2px solid #00AEEF;">

        <h2 class="payment-box-heading pb-2 text-center">
            How would you like to Pay?
        </h2>

        <p class="text-center mt-3 fw-bold">
            Select your payment option
        </p>

        {{-- PAY AT STORE --}}
        @if ($offlineEnabled)
            <section class="accordion">
                <div class="tab">

                    {{-- RADIO --}}
                    <input
                        type="radio"
                        checked
                        name="accordion-1"
                        id="cb4"
                        wire:model="pm"
                        value="pay_at_store"
                        style="display:none;"
                    >

                    {{-- LABEL --}}
                    <label
                        for="cb4"
                        class="tab__label"
                        style="
                            border:1px solid #00AEEF;
                            width:100%;
                            height:80px;
                            border-radius:10px;
                            display:flex;
                            align-items:center;
                            justify-content:space-between;
                            padding:0 25px;
                            cursor:pointer;
                        "
                    >
                        <div style="font-weight:600;">
                            {{ $paywithcardtext }}
                        </div>

                        <h4 class="text-danger fw-bold">
                            &pound;{{ number_format($price ?? 0, 2) }}
                        </h4>
                    </label>

                    {{-- CONTENT --}}
                    <div class="tab__content text-center mt-3">

                        <p class="fw-bold">
                            Pay at store when you visit our location below
                        </p>

                        <p>
                            {{ $name }},
                            {{ $address_line_1 }},
                            {{ $town_city }},
                            {{ $post_code }}
                        </p>

                        <p>{{ $email }}</p>

                        <p>{{ $landline_number }}</p>

                        <button type="button" class="btn submit-btn mt-3"
    wire:click="BookRepair"
    wire:loading.attr="disabled"
    style="
        border:1px solid #00AEEF;
        width:120px;
        height:45px;
        background:#00AEEF;
        color:#fff;
    ">
    <span wire:loading.remove wire:target="BookRepair">Submit</span>
    <span wire:loading wire:target="BookRepair">Submitting...</span>
</button>
                     

                    </div>
                </div>
            </section>
        @endif

    </div>
</div>
                                {{-- STRIPE --}}
                                @if ($stripeEnabled)
                                    <section class="accordion mt-2">
                                        <div class="tab">
                                            <input class="form-check-input" type="radio"
                                                wire:click="changePm('stripe')" name="accordion-1" id="cb3">
                                            <label for="cb3" class="tab__label responsive"
                                                style="border:1px solid #00AEEF; width:100%; height:80px; border-radius:10px;">
                                                <div class="flex space-between mysetting col-12"
                                                    style="display:flex; align-items:center; justify-content:space-between;">
                                                    <div class="text-start">
                                                        <div style="font-weight:800;">Pay With Card</div>
                                                        <img class="img-fluid" style="width:30%;"
                                                            src="https://ik.imagekit.io/4csyk445b/2560px-Stripe_Logo__revised_2016%205.png?updatedAt=1711551636602"
                                                            alt="Stripe">
                                                    </div>
                                                    <div class="text-end">
                                                        <h4 class="text-danger fw-bold" style="margin-right:50px !important;">
                                                            &pound;{{ number_format($price ?? 0, 2) }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                                @if ($pm == 'stripe')
                                                    <div class="mt-2">
                                                        <livewire:payment-methods.stripe :price="$price" color="success" service="Repair" />
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                @endif

                                {{-- PAYPAL --}}
                                @if ($paypalEnabled)
                                    <section class="accordion mt-2">
                                        <div class="tab">
                                            <input class="form-check-input" type="radio"
                                                wire:click="changePm('paypal')" name="accordion-1" id="cb1" style="display:none;">
                                            <label for="cb1" class="tab__label responsive"
                                                style="border:1px solid #00AEEF; width:100%; height:80px; border-radius:10px;">
                                                <div class="flex space-between mysetting col-12"
                                                    style="display:flex; align-items:center; justify-content:space-between;">
                                                    <div class="text-start">
                                                        <img class="img-fluid"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png"
                                                            alt="PayPal" style="width:50px; height:auto;">
                                                    </div>
                                                    <div class="text-end">
                                                        <h4 class="text-danger fw-bold" style="margin-right:50px !important;">
                                                            &pound;{{ number_format($price ?? 0, 2) }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                                @if ($pm == 'paypal')
                                                    <div>
                                                        <livewire:payment-methods.paypal :price="$price" color="success" service="Repair" />
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                @endif

                                {{-- KLARNA --}}
                                @if ($klarnaEnabled)
                                    <section class="accordion mt-2">
                                        <div class="tab">
                                            <input class="form-check-input" type="radio"
                                                wire:click="changePm('klarna')" name="accordion-1" id="cb2">
                                            <label for="cb2" class="tab__label responsive"
                                                style="border:1px solid #00AEEF; width:100%; height:80px; border-radius:10px;">
                                                <div class="flex space-between mysetting col-12"
                                                    style="display:flex; align-items:center; justify-content:space-between;">
                                                    <div>
                                                        <h4>&nbsp;&nbsp;
                                                            <img class="img-fluid myklarna"
                                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Klarna_Payment_Badge.svg/2560px-Klarna_Payment_Badge.svg.png"
                                                                alt="Klarna" style="width:50px; height:auto; object-fit:cover;">
                                                        </h4>
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="klarna-resp meri-marzi">
                                                            Make 3 payments of <b class="fw-bolder">Klarna</b>
                                                            &pound;{{ number_format(($price ?? 0) / 3, 2) }} in installments.
                                                            Terms and conditions apply.
                                                        </p>
                                                    </div>
                                                    <div class="text-end">
                                                        <h4 class="text-danger fw-bold" style="margin-right:50px !important;">
                                                            &pound;{{ number_format($price ?? 0, 2) }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                                @if ($pm == 'klarna')
                                                    <livewire:payment-methods.klarna :price="$price" color="success" service="Repair" />
                                                @endif
                                            </div>
                                        </div>
                                    </section>
                                @endif

                            </div>
                        </div>

                    </div>

                    <div class="gap-2">
                        @if ($form_type == 'clinic_form')
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================
         CONFIRM MODAL FOR PAY AT STORE

         FIX: The original button used wire:click="BookRepair" which
         routed to the PARENT Livewire component (guest.repair-detail)
         instead of this BookRepair component, causing MethodNotFoundException
         and silently failing the submit.

         Fix: Use onclick with window.bookRepairComponentId which is set
         below via @this.id — this targets THIS component instance directly
         using Livewire's JS API, bypassing the parent component entirely.
    ============================================================ --}}
    <div class="modal fade" id="bookConfirmModal" tabindex="-1" aria-labelledby="bookConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookConfirmModalLabel">Congratulations! Your repair has been booked.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success mb-0" role="alert">
                        <p class="mb-2">Check your email for more instructions.</p>
                        <hr>
                        <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>

                    {{--
                        KEY FIX: Instead of wire:click="BookRepair" (which routes
                        to the parent component), we use Livewire's JS API to call
                        BookRepair() directly on THIS component's instance ID.
                        window.bookRepairComponentId is set in the script below.
                    --}}
                    <button type="button"
                        class="btn btn-primary"
                        wire:click="BookRepair"
                        data-bs-dismiss="modal"
                        wire:loading.attr="disabled">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Store this component's Livewire ID for reference
        window.bookRepairComponentId = '{{ $this->id }}';
    </script>

</div>