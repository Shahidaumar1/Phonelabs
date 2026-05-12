<div class="custom-sec7-wrapper">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap');

        .custom-sec7 {
            width: 100%;
            padding: 80px 15px;
            background-color: #ffffff;
            font-family: "Manrope", sans-serif;
            overflow: hidden;
        }

        /* --- Heading Design --- */
        .custom-sec7 .heading-wrapper {
            text-align: center;
            margin-bottom: 60px;
        }

        .custom-sec7 .heading-wrapper h3 {
            font-size: 14px;
            color: #00AEEF;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .custom-sec7 .heading-wrapper p {
            font-size: 38px;
            color: #111827;
            font-weight: 800;
            margin: 0;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .custom-sec7 .heading-wrapper p span {
            color: #00AEEF;
        }

        /* --- Timeline Container --- */
        .repair-options-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
        }

        /* Professional Dashed Line (No Shadow) */
        .repair-options-container::before {
            content: '';
            position: absolute;
            top: 40px; 
            left: 10%;
            right: 10%;
            height: 2px;
            border-top: 2px dashed #E5E7EB;
            z-index: 1;
        }

        /* --- Option Items --- */
        .option-item {
            position: relative;
            z-index: 2;
            flex: 1;
            text-align: center;
            padding: 0 10px;
            transition: transform 0.3s ease;
        }

        /* Icon Circle - Removed Shadows and Outlines */
        .icon-circle {
            width: 80px;
            height: 80px;
            background-color: #F3F4F6; /* Clean light grey background */
            color: #00AEEF; /* Icon color */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px auto;
            transition: all 0.3s ease;
            border: 2px solid transparent; /* Placeholder for hover */
        }

        .icon-circle i {
            font-size: 30px;
        }

        .option-item h5 {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 8px 0;
        }

        .option-item p {
            font-size: 14px;
            color: #6B7280;
            line-height: 1.4;
            font-weight: 500;
            margin: 0;
        }

        /* --- Hover States (Subtle & Professional) --- */
        .option-item:hover .icon-circle {
            background-color: #00AEEF;
            color: #ffffff;
            transform: translateY(-5px);
        }

        .option-item:hover h5 {
            color: #00AEEF;
        }

        /* --- Mobile Optimization --- */
        @media(max-width: 767px) {
            .repair-options-container {
                flex-wrap: wrap;
                gap: 30px 0;
            }
            .repair-options-container::before {
                display: none; /* Remove line on mobile for cleaner stack */
            }
            .option-item {
                flex: 0 0 50%;
            }
            .icon-circle {
                width: 65px;
                height: 65px;
            }
            .icon-circle i {
                font-size: 24px;
            }
            .custom-sec7 .heading-wrapper p {
                font-size: 28px;
            }
        }
    </style>

    <section class="custom-sec7">
        <div class="heading-wrapper">
            <h3>Repair Options</h3>
            <p>How would you like us to <span>Repair</span> your device?</p>
        </div>

        <div class="repair-options-container">
            <div class="option-item">
                <div class="icon-circle">
                    <i class="fa-solid fa-shop"></i>
                </div>
                <h5>Store</h5>
                <p>Visit our location</p>
            </div>

            <div class="option-item">
                <div class="icon-circle">
                    <i class="fa-solid fa-truck-ramp-box"></i>
                </div>
                <h5>Collection</h5>
                <p>We pick up & return</p>
            </div>

            <div class="option-item">
                <div class="icon-circle">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
                <h5>Postal</h5>
                <p>Secure mail-in service</p>
            </div>

            <div class="option-item">
                <div class="icon-circle">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
                <h5>Call-Out</h5>
                <p>On-site repair service</p>
            </div>
        </div>
    </section>
</div><?php /**PATH /home/phonelabs/public_html/resources/views/frontend/Home_page_sections/repairOptinsSec.blade.php ENDPATH**/ ?>