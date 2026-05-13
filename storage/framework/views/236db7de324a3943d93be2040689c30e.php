<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Repair Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d9dd1;
            --primary-dark:#4877c7;
            --accent-blue: #1a67eb; /* Requested border color */
            --text-main: #0F172A;
            --text-light: #ffffff;
            --white: #ffffff;
            --bg-page: #f0f2f5; 
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body { 
            margin: 0; 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-page); 
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

        .repair-head { text-align: center; padding: 60px 0 40px; }
        .repair-head h1 { font-size: 36px; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 10px; }
        .repair-head p { font-size: 18px; color: #64748b; margin: 0; }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 80px;
        }

        .repair-card {
            border-radius: 28px;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            transition: var(--transition);
            height: 580px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .repair-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Video Area: 60% Height with Inner Screen Effect */
        .video-container-wrapper {
            height: 60%; 
            padding: 8px; 
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }

        .inner-screen {
            width: 100%;
            height: 100%;
            border: 1.5px solid var(--accent-blue); 
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            background: #000;
        }

        .inner-screen video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Content Area: 40% Height */
        .card-content {
            height: 40%;
            padding: 25px 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .repair-card h4 {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 8px 0;
        }

        .repair-card p {
            font-size: 15px;
            line-height: 1.5;
            margin: 0;
        }

        /* --- Theme 1 & 3: White BG, Primary Text --- */
        .card-light { 
            border: 1px solid #0d9dd1;
            background-color: var(--white); 
        }
        .card-light h4  { color: var(--primary); }
       .card-light p{ color:#094257;}
        .card-light .card-link {
            background-color: #0d9dd1;
            color: var(--white);
        }

        /* --- Theme 2: Accent BG, White Text --- */
        .card-dark { background-color:#0d9dd1; }
        .card-dark h4, .card-dark p { color: var(--white); }
        .card-dark .card-link {
            background-color: var(--white);
            color:#0d9dd1;
        }

        .card-link { 
            font-size: 14px; 
            font-weight: 700; 
            padding: 14px;
            border-radius: 14px;
            text-align: center;
            transition: var(--transition);
        }

        @media (max-width: 950px) {
            .services-grid { grid-template-columns: 1fr; justify-items: center; }
            .repair-card { max-width: 380px; width: 100%; }
        }
    </style>
</head>
<body>

<div class="container">
    <section class="repair-head">
        <h1>Expert Device Repairs</h1>
        <p>Reliable fixes for your essential tech.</p>
    </section>

    <div class="services-grid">
        <a href="<?php echo e(route('device-types', 'mobile-phone')); ?>" class="repair-card card-light">
            <div class="video-container-wrapper">
                <div class="inner-screen">
                    <video autoplay loop muted playsinline>
                        <source src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-08%20at%206.00.48%20PM.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="card-content">
                <div>
                    <h4>Mobile Phone</h4>
                    <p>Expert screen replacements and hardware fixes for all major brands.</p>
                </div>
                <div class="card-link">Request Service</div>
            </div>
        </a>

        <a href="<?php echo e(route('device-types', 'computing')); ?>" class="repair-card card-dark">
            <div class="video-container-wrapper">
                <div class="inner-screen">
                    <video autoplay loop muted playsinline>
                        <source src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-08%20at%206.13.54%20PM.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="card-content">
                <div>
                    <h4>Computing</h4>
                    <p>Professional laptop repair, data recovery, and performance tuning.</p>
                </div>
                <div class="card-link">Request Service</div>
            </div>
        </a>

        <a href="<?php echo e(route('device-types', 'tablet-devices')); ?>" class="repair-card card-light">
            <div class="video-container-wrapper">
                <div class="inner-screen">
                    <video autoplay loop muted playsinline>
                        <source src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-08%20at%206.00.49%20PM.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="card-content">
                <div>
                    <h4>Tablet Devices</h4>
                    <p>Precision digitizer replacement and battery optimization services.</p>
                </div>
                <div class="card-link">Request Service</div>
            </div>
        </a>
    </div>
</div>

</body>
</html><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/frontend/Home_page_sections/devicesAndBrandsSection.blade.php ENDPATH**/ ?>