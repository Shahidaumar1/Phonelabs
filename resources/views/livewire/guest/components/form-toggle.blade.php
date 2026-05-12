<div>
    @php
        $tagline = [
            'sell'        => 'How you’ll send your device',
            'repair'      => 'How would you like us to repair your device?',
            'buy'         => 'How you’ll get your device',
            'accessories' => 'Choose how you want to complete your accessories purchase.',
        ];

        $heading = [
            'sell'        => 'Selling Options',
            'repair'      => 'Repair Options',
            'buy'         => 'Buying Options',
            'accessories' => 'How would you like to buy this accessory?',
        ];

        $postalText = [
            'sell'        => 'Post Your Device',
            'repair'      => 'Postal Repair',
            'buy'         => 'Post My Device',
            'accessories' => 'Choose how you want to complete your accessories purchase.',
        ];

        $formService = strtolower($data['service'] ?? 'repair');

        if (! array_key_exists($formService, $tagline)) {
            $formService = 'repair';
        }
    @endphp

    <script>
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        window.onload = function () { window.scrollTo(0, 0); };
        window.onbeforeunload = function () { window.scrollTo(0, 0); };
    </script>

    <style>
        /* All your existing styles remain exactly the same */
        .form-toggle-wrapper { margin: 0; padding: 0; font-family: 'Inter', sans-serif; background: #f7f9fc; }
        .professional-container { max-width: 1280px; margin: 0 auto; padding: 0px 24px 12px; /* Changed 20px to 0px */ }
        .professional-header { text-align: center; margin-bottom: 10px; padding-top: 0; }
        .professional-tagline { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: #00AEEF; margin-bottom: 0px; display: inline-block; background: rgba(0, 174, 239, 0.08); padding: 4px 12px; border-radius: 20px; }
        .professional-heading { font-size: 32px; font-weight: 800; color: #1a2a3a; letter-spacing: -0.5px; line-height: 1.2; margin: 0 0 14px 0; position: relative; display: inline-block; }
        .professional-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; max-width: 900px; margin: 0 auto; }
        .professional-card { background: #ffffff; border: 1px solid #e8edf2; border-radius: 8px; padding: 20px; cursor: pointer; transition: all 0.2s ease; }
        .professional-card:hover { border-color: #00AEEF; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04); transform: translateY(-1px); }
        /* Targets the image specifically inside the 3rd card (Collection) */
.professional-grid .professional-card:nth-child(3) .card-icon img {
    width: 65px;  /* Increased from 22px */
    height: 65px; /* Increased from 22px */
}

/* Optional: Increase the container size if the image looks cramped */
.professional-grid .professional-card:nth-child(3) .card-icon {
    width: 50px;
    height: 50px;
}
        .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
        .card-icon { width: 40px; height: 40px; background: #f0f7fc; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
        .card-icon img { width: 22px; height: 22px; object-fit: contain; }
        .card-title { font-size: 16px; font-weight: 700; color: #1a2a3a; margin-bottom: 6px; }
        .card-description { font-size: 13px; color: #5a6e7c; line-height: 1.4; margin-bottom: 16px; }
        .card-features { display: flex; gap: 16px; border-top: 1px solid #e8edf2; padding-top: 12px; }
        .feature-item { display: flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 500; color: #5a6e7c; }
        .feature-item i { font-size: 10px; color: #00AEEF; }
        .professional-form-section { background: #ffffff; border-top: 1px solid #e8edf2; margin-top: 0; }
        .form-wrapper { max-width: auto; margin: 0 auto; padding: 24px; position: relative; }
        .professional-back-btn { position: absolute; top: 24px; left: 24px; background: transparent; border: none; display: inline-flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 600; color: #5a6e7c; cursor: pointer; transition: all 0.2s ease; padding: 6px 10px; border-radius: 4px; z-index: 10; }
        .professional-back-btn:hover { color: #00AEEF; background: #f0f7fc; }
        .professional-loading { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 255, 255, 0.95); display: flex; align-items: center; justify-content: center; z-index: 1000; }
        .loading-spinner { width: 32px; height: 32px; border: 2px solid #e8edf2; border-top-color: #00AEEF; border-radius: 50%; animation: spin 0.6s linear infinite; margin-bottom: 8px; }
        @keyframes spin { to { transform: rotate(360deg); } }
        @media (max-width: 768px) {
            .professional-grid { grid-template-columns: 1fr; }
            .form-wrapper { padding: 70px 16px 20px; }
        }
    </style>

    <div class="form-toggle-wrapper">
        {{-- GRID OF OPTIONS --}}
        {{-- Added wire:key to ensure Livewire treats the grid as a separate entity --}}
        @if ($showGrid)
            <div class="professional-container" wire:key="grid-view-container">
                <div class="professional-header">
                    <h1 class="professional-heading">{{ $heading[$formService] ?? '' }}</h1>
                </div>

                <div class="professional-grid">
                    @if (isset($formStatuses[0]) && !empty($formStatuses[0]->$formService))
                        <div class="professional-card" wire:click="showForm('clinic_form')" wire:key="card-clinic">
                            <div class="card-header">
                                <div class="card-icon">
                                    <img src="https://ik.imagekit.io/b6iqka2sz/Store%20Repair.png?updatedAt=1719830430304" alt="Store Repair">
                                </div>
                            </div>
                            <h3 class="card-title">{{ $optionLabels['Store Repair'] }}</h3>
                            <p class="card-description">Visit our store for professional repair service.</p>
                            <div class="card-features">
                                <div class="feature-item"><i class="fas fa-check-circle"></i> Same-day</div>
                                <div class="feature-item"><i class="fas fa-check-circle"></i> Walk-in</div>
                            </div>
                        </div>
                    @endif

                    @if (isset($formStatuses[1]) && !empty($formStatuses[1]->$formService))
                        <div class="professional-card" wire:click="showForm('postal_form')" wire:key="card-postal">
                            <div class="card-header">
                                <div class="card-icon">
                                    <img src="https://ik.imagekit.io/b6iqka2sz/Postal%20Repair.png?updatedAt=1719830318561" alt="Postal Repair">
                                </div>
                            </div>
                            <h3 class="card-title">{{ $optionLabels['Postal Repair'] }}</h3>
                            <p class="card-description">Send your device with free insured shipping.</p>
                            <div class="card-features">
                                <div class="feature-item"><i class="fas fa-check-circle"></i> Free ship</div>
                                <div class="feature-item"><i class="fas fa-check-circle"></i> Insured</div>
                            </div>
                        </div>
                    @endif

                    @if (isset($formStatuses[2]) && !empty($formStatuses[2]->$formService) && $formService !== 'buy')
                        <div class="professional-card" wire:click="showForm('collection_form')" wire:key="card-collection">
                            <div class="card-header">
                                <div class="card-icon">
                                    <img src="https://ik.imagekit.io/8qyy56iye/House%20Of%20gadgets/9cd76873-660c-462f-9813-1e7feec37570.png?updatedAt=1776344202358" alt="Collection">
                                </div>
                            </div>
                            <h3 class="card-title">{{ $optionLabels['Collect My Device'] }}</h3>
                            <p class="card-description">We'll collect and return after repair.</p>
                            <div class="card-features">
                                <div class="feature-item"><i class="fas fa-check-circle"></i> Pickup</div>
                                <div class="feature-item"><i class="fas fa-check-circle"></i> Free return</div>
                            </div>
                        </div>
                    @endif

                    @if ($formService === 'repair' && isset($formStatuses[3]) && !empty($formStatuses[3]->$formService) && !empty($data['device']['name'] ?? null) && $data['device']['name'] !== 'Apple iPad')
                        <div class="professional-card" wire:click="showForm('fix_form')" wire:key="card-fix">
                            <div class="card-header">
                                <div class="card-icon">
                                    <img src="https://ik.imagekit.io/b6iqka2sz/Fix%20At%20My%20Address.png?updatedAt=1719830266710" alt="Call Out">
                                </div>
                            </div>
                            <h3 class="card-title">{{ $optionLabels['Call Out Repair'] }}</h3>
                            <p class="card-description">Technician visits your location.</p>
                            <div class="card-features">
                                <div class="feature-item"><i class="fas fa-check-circle"></i> On-site</div>
                                <div class="feature-item"><i class="fas fa-check-circle"></i> Flexible</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        {{-- SELECTED FORM RENDER --}}
        {{-- Added dynamic wire:key to force Livewire to re-render the form section from scratch --}}
        @if ($showForm)
            <div class="professional-form-section" wire:key="form-view-section-{{ $form_type }}">
                <div wire:loading wire:target="showForm, hideForm">
                    <div class="professional-loading">
                        <div class="loading-spinner"></div>
                        <p class="loading-text">Loading...</p>
                    </div>
                </div>

                <div wire:loading.remove wire:target="showForm, hideForm">
                    <div class="form-wrapper">
                        <button class="professional-back-btn" type="button" wire:click="hideForm">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>

                        <div class="form-content">
                            @if($form_type == 'postal_form')
                                <livewire:guest.components.postal-repair-form initialBranchId="13" :key="'postal-'.uniqid()" />
                            @elseif($form_type == 'clinic_form')
                                <livewire:guest.components.clinic-repair-form :key="'clinic-'.uniqid()" />
                            @elseif($form_type == 'collection_form')
                                <livewire:guest.collection-form :key="'collection-'.uniqid()" />
                            @elseif($form_type == 'fix_form')
                                <livewire:guest.fix-form :key="'fix-'.uniqid()" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Your existing JS remains untouched --}}
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('formShown', function () {
                document.querySelectorAll('.tab-pane').forEach(function (tabPane) {
                    tabPane.classList.remove('active', 'show');
                });
            });

            Livewire.on('BranchSelected', function () {
                const backBtn = document.querySelector('.back-button');
                if (backBtn) { backBtn.style.display = 'none'; }
            });

            Livewire.on('childGoBack', function () {
                const backBtn = document.querySelector('.back-button');
                if (backBtn) { backBtn.style.display = 'block'; }
            });
        });

        function forgetPreviousForm() {
            @this.forgetSession('form_type');
        }
    </script>

    @push('scripts')
        <script>
            function forgetPreviousForm() {
                @this.call('forgetFormType');
            }
            document.addEventListener('livewire:load', function () {
                Livewire.on('someEvent', function () {
                    forgetPreviousForm();
                });
            });
        </script>
    @endpush

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('formTypeLoaded', function (formType) {
                updateFormDisplay(formType);
            });

            Livewire.on('formToggle', function (formType, data) {
                updateFormDisplay(formType);
            });

            function updateFormDisplay(formType) {
                document.querySelectorAll('.form-section').forEach(function (element) {
                    element.style.display = 'none';
                });

                if (formType === 'postal_form') {
                    const el = document.getElementById('postal-form');
                    if (el) el.style.display = 'block';
                } else if (formType === 'collection_form') {
                    const el = document.getElementById('collection-form');
                    if (el) el.style.display = 'block';
                } else if (formType === 'fix_form') {
                    const el = document.getElementById('fix-form');
                    if (el) el.style.display = 'block';
                }
            }
        });
    </script>
</div>