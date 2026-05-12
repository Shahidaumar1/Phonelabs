<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo "Working Process | Power Guide"; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: #ffffff;
            color: #000000;
            overflow-x: hidden;
        }

        .process-section {
            padding: 0px 0;
            display: flex;
            align-items: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .power-title {
            margin-bottom: 50px;
        }

        .power-guide {
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 3px;
            color: #00aeef;
            text-transform: uppercase;
            display: block;
            margin-bottom: 10px;
        }

        .main-heading {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(90deg, #000000, #00aeef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Desktop: Text Left, Video Right */
        .process-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.3fr; 
            gap: 60px;
            align-items: center;
        }

        .services-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            order: 1; /* Text on Left */
        }

        .media-display {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 10;
            border-radius: 30px;
            overflow: hidden;
            background: #000;
            box-shadow: 0 30px 60px rgba(0, 174, 239, 0.15);
            order: 2; /* Video on Right */
        }

        .step-item {
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            background: transparent;
        }

        /* Vertical Gradient Line */
        .step-item::before {
            content: '';
            position: absolute;
            left: -20px;
            top: 25%;
            height: 50%;
            width: 5px;
            background: #00aeef;
            border-radius: 10px;
            opacity: 0;
            transform: scaleY(0);
            transition: all 0.3s ease;
        }

        .step-item.active {
            transform: translateX(20px);
        }

        .step-item.active::before {
            opacity: 1;
            transform: scaleY(1.2);
        }

        .step-power {
            font-size: 1.2rem;
            font-weight: 800;
            color: #d1d5db;
            transition: color 0.3s ease;
        }

        .step-item.active .step-power {
            color: #00aeef;
        }

        .step-title {
            font-size: clamp(1.4rem, 2.5vw, 2rem);
            font-weight: 700;
            color: #1a1a1a;
            transition: color 0.3s ease;
        }

        .step-item.active .step-title {
            color: #00aeef;
        }

        .media-box {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease;
        }

        .media-box.active {
            opacity: 1;
            visibility: visible;
        }

        .media-box video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Mobile View: Video Top, Text Bottom */
        @media (max-width: 900px) {
            .process-wrapper {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .media-display {
                order: 1; /* Video moves to top */
                aspect-ratio: 16 / 9;
            }

            .services-list {
                order: 2; /* Text moves to bottom */
                padding-left: 25px;
            }

            .main-heading {
                text-align: center;
            }

            .power-title {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<section class="process-section" id="process-section">
    <div class="container">
        <div class="power-title">
            <span class="power-guide">GUIDE</span>
            <h1 class="main-heading">OUR WORKING PROCESS</h1>
        </div>

        <div class="process-wrapper">
            <div class="services-list">
                <?php
                $steps = [
                    ["01", "Choose Service", "m1"],
                    ["02", "Requirements", "m2"],
                    ["03", "Book Meeting", "m3"],
                    ["04", "Find Solution", "m4"]
                ];

                foreach ($steps as $index => $step): ?>
                    <div class="step-item <?php echo $index === 0 ? 'active' : ''; ?>" data-target="<?php echo $step[2]; ?>">
                        <div class="step-power"><?php echo $step[0]; ?></div>
                        <h3 class="step-title"><?php echo $step[1]; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="media-display">
                <div class="media-box active" id="m1">
                    <video src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-14%20at%203.11.00%20PM.mp4" muted playsinline ></video>
                </div>
                <div class="media-box" id="m2">
                    <video src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-14%20at%203.13.33%20PM.mp4" muted playsinline ></video>
                </div>
                <div class="media-box" id="m3">
                    <video src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-14%20at%203.16.00%20PM.mp4" muted playsinline ></video>
                </div>
                <div class="media-box" id="m4">
                    <video src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-14%20at%203.17.10%20PM.mp4" muted playsinline ></video>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    (function () {
        const section = document.getElementById('process-section');
        const stepItems = document.querySelectorAll('.step-item');
        const mediaBoxes = document.querySelectorAll('.media-box');
        let currentIndex = 0;
        let cycleInterval;
        let isUserHovering = false;

        function updateProcess(index) {
            stepItems.forEach(item => item.classList.remove('active'));
            mediaBoxes.forEach(box => {
                box.classList.remove('active');
                box.querySelector('video').pause();
            });

            stepItems[index].classList.add('active');
            const target = stepItems[index].getAttribute('data-target');
            const activeMedia = document.getElementById(target);
            activeMedia.classList.add('active');
            
            const video = activeMedia.querySelector('video');
            video.currentTime = 0;
            video.play().catch(() => {});
        }

        function startCycle() {
            cycleInterval = setInterval(() => {
                if (!isUserHovering) {
                    currentIndex = (currentIndex + 1) % stepItems.length;
                    updateProcess(currentIndex);
                }
            }, 2000);
        }

        stepItems.forEach((item, index) => {
            item.addEventListener('mouseenter', () => {
                isUserHovering = true; // Stops the auto-rotation immediately
                currentIndex = index;
                updateProcess(currentIndex);
            });
        });

        section.addEventListener('mouseleave', () => {
            isUserHovering = false; // Optional: Resume auto-rotation when leaving the section
        });

        // Initialize immediately
        updateProcess(0);
        startCycle();
    })();
</script>

</body>
</html><?php /**PATH /home/phonelabs/public_html/resources/views/frontend/Home_page_sections/wecanFix.blade.php ENDPATH**/ ?>