<div>
    @php
        use App\Models\Branch;
        $branches = Branch::all();
        $mainBranch = $branches->first(); 
        
        $facebook = $mainBranch->facebook ?? '#';
        $instagram = $mainBranch->instagram ?? '#';
        $twitter = $mainBranch->twitter ?? '#';
    @endphp

    <style>
        .contact-sec-v3 {
            background: #f0f4f8;
            padding: 60px 0;
            font-family: "Manrope", sans-serif;
        }

        .custom-container {
            max-width: 1100px; 
            margin: 0 auto;
            padding: 0 20px;
        }

        .contact-grid-v3 {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            background: #fff;
        }

        .inner-card-v3 {
            padding: 50px;
        }

        /* --- Form Section --- */
        .left-box-v3 { background: #ffffff; }
        .left-box-v3 h4 { color: #02aded; font-size: 13px; text-transform: uppercase; letter-spacing: 2px; font-weight: 800; margin-bottom: 8px; }
        .left-box-v3 h2 { font-size: 36px; font-weight: 800; margin-bottom: 25px; color: #1a202c; letter-spacing: -1px; }

        .input-group-v3 { margin-bottom: 18px; }
        .input-group-v3 label { display: block; font-size: 14px; margin-bottom: 6px; font-weight: 700; color: #4a5568; }
        .input-group-v3 input, .input-group-v3 textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #edf2f7;
            border-radius: 10px;
            background: #f8fafc;
            font-family: inherit;
            transition: all 0.2s ease;
            outline: none;
        }

        .input-group-v3 input:focus, .input-group-v3 textarea:focus {
            border: 1px solid #02aded;
            background: #fff;
            box-shadow: none; 
        }

        .submit-btn-v3 {
            width: 100%;
            background: #02aded;
            color: white;
            border: none;
            padding: 16px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn-v3:hover { background: #0192c8; transform: translateY(-1px); }

        /* --- Info Section --- */
        .right-box-v3 {
            background: linear-gradient(135deg, #02aded 0%, #096182 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
        }

        .info-header-text { color: rgba(255, 255, 255, 0.9); margin-bottom: 30px; line-height: 1.5; font-size: 16px; }

        .contact-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .info-item-v3 { 
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.12);
            padding: 12px;
            border-radius: 12px;
            backdrop-filter: blur(4px);
        }

        .info-item-v3 i { font-size: 16px; min-width: 20px; text-align: center; }
        .info-item-v3 p { font-size: 13px; font-weight: 500; margin: 0; }

        .footer-social-icons { display: flex; gap: 10px; }
        .footer-social-icons a { color: #fff; font-size: 14px; transition: 0.3s; opacity: 0.9; }
        .footer-social-icons a:hover { opacity: 1; transform: translateY(-2px); }

        .map-wrapper-v3 {
            border-radius: 12px;
            overflow: hidden;
            flex-grow: 1;
            min-height: 200px;
            margin-top: 10px;
        }
        #map-v3 { height: 100%; width: 100%; }

        /* --- Professional Mobile View Adjustments --- */
        @media (max-width: 768px) {
            .contact-sec-v3 { padding: 30px 0; }
            .custom-container { padding: 0 15px; }
            
            .contact-grid-v3 { 
                grid-template-columns: 1fr; 
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            }
            
            .inner-card-v3 { padding: 35px 25px; }
            
            .left-box-v3 h2 { font-size: 28px; margin-bottom: 20px; }
            
            /* Enhanced Mobile Info Section (Instead of hiding) */
            .right-box-v3 { 
                padding: 30px 25px;
                display: block !important; 
            }
            
            .contact-info-grid {
                grid-template-columns: 1fr; /* Stack items for better readability */
                gap: 10px;
            }

            .info-item-v3 {
                background: rgba(255, 255, 255, 0.08);
                padding: 15px;
            }

            .map-wrapper-v3 { 
                display: none; /* Hide map on mobile to keep things compact */
            }

            .info-header-text {
                font-size: 15px;
                margin-bottom: 20px;
            }
        }
    </style>

    <div class="contact-sec-v3">
        <div class="custom-container">
            <div class="contact-grid-v3">
                
                <div class="inner-card-v3 left-box-v3">
                    <div class="form-box">
                   <livewire:guest.user-dashboard.index />
                </div>
                </div>

                <div class="inner-card-v3 right-box-v3">
                    <p class="info-header-text">
                        Reach out to our experts for fast repairs and support. We're here to help.
                    </p>

                    <div class="contact-info-grid">
                        <div class="info-item-v3">
                            <i class="fa-solid fa-phone-volume"></i>
                            <p>{{ $mainBranch->landline_number ?? '+44 7305 856667' }}</p>
                        </div>
                        <div class="info-item-v3">
                            <i class="fa-solid fa-envelope-open"></i>
                            <p>{{ $mainBranch->email ?? 'support@example.com' }}</p>
                        </div>
                        <div class="info-item-v3">
                            <i class="fa-solid fa-location-dot"></i>
                            <p>{{ $mainBranch->address_line_1 ?? '123 Repair St, UK' }}</p>
                        </div>
                        <div class="info-item-v3">
                            <i class="fa-solid fa-share-nodes"></i>
                            <div class="footer-social-icons">
                                @if(($siteSettings->fb_link_status ?? false) && !empty($siteSettings->fb_link))
                                    <a target="_blank" href="{{ $siteSettings->fb_link }}" aria-label="Facebook">
                                        <i class="fa-brands fa-facebook-f me-2"></i>
                                    </a>
                                @endif

                                @if(($siteSettings->insta_link_status ?? false) && !empty($siteSettings->insta_link))
                                    <a target="_blank" href="{{ $siteSettings->insta_link }}" aria-label="Instagram">
                                        <i class="fa-brands fa-instagram me-2"></i>
                                    </a>
                                @endif

                                @if(($siteSettings->twitter_link_status ?? false) && !empty($siteSettings->twitter_link))
                                    <a target="_blank" href="{{ $siteSettings->twitter_link }}" aria-label="Twitter/X">
                                        <i class="fa-brands fa-x-twitter me-2"></i>
                                    </a>
                                @endif

                                @if(($siteSettings->tiktok_link_status ?? false) && !empty($siteSettings->tiktok_link))
                                    <a target="_blank" href="{{ $siteSettings->tiktok_link }}" aria-label="TikTok">
                                        <i class="fa-brands fa-tiktok me-2"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="map-wrapper-v3">
                        <div id="map-v3"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mapElement = document.getElementById('map-v3');
            // Check if map container is actually visible before initializing
            if (mapElement && window.getComputedStyle(mapElement.parentElement).display !== 'none') {
                const mapV3 = L.map('map-v3', { 
                    scrollWheelZoom: false,
                    zoomControl: false 
                }).setView([52.5862, -2.1288], 15);

                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; OpenStreetMap'
                }).addTo(mapV3);

                L.marker([52.5862, -2.1288]).addTo(mapV3);
                setTimeout(() => { mapV3.invalidateSize(); }, 500);
            }
        });
    </script>
</div>