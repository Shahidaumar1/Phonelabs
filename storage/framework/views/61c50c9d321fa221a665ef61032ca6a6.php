<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Device Repair | Select Brand</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --cyan: #00AEEF;
            --cyan-dark: #0089bd;
            --cyan-light: rgba(0, 174, 239, 0.15);
            --glass-bg: rgba(255, 255, 255, 0.45);
            --glass-border: rgba(255, 255, 255, 0.6);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Manrope', sans-serif;
            background: radial-gradient(circle at top right, #ffffff, #f2f4f5, #e1eff2);
            min-height: 100vh;
        }

        .cust-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* ── HEADER & PROGRESS ── */
        .device-type-head { padding-top: 15px; }
        .breadcrumb { background: transparent; padding: 0.5rem 0; font-size: 0.85rem; }
        .breadcrumb-item a { color: #2c6280; font-weight: 500; text-decoration: none; }
        
        .progress {
            height: 6px !important;
            border-radius: 40px;
            background: #c5d5e8;
            margin: 8px 0;
            overflow: visible;
        }
        .progress-bar-custom {
            background: linear-gradient(90deg, #00AEEF, #5ec8f0) !important;
            border-radius: 40px;
            width: 65%;
            position: relative;
        }
        .progress-end-dot {
            width: 12px; height: 12px;
            background: #00AEEF;
            border-radius: 50%;
            position: absolute;
            right: -6px; top: -3px;
            box-shadow: 0 0 0 3px rgba(0, 174, 239, 0.25);
        }

        /* ── SECTION TITLE ── */
        .section-title-wrap { 
            padding: 15px 0 5px; 
            text-align: center; 
        }
        .section-title-wrap h3 { font-weight: 800; color: #1a3a5c; margin-bottom: 4px; font-size: 1.8rem; }
        .section-title-wrap p { color: #5a7184; font-size: 0.95rem; }

        /* ── THE CRYSTAL BOX (Container) ── */
        .crystal-container {
            background: var(--glass-bg);
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            border: 1px solid var(--glass-border);
            border-radius: 35px;
            padding: 30px 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            margin-top: 10px;
        }

        /* ── THE CRYSTAL CARDS ── */
        .d10-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .d10-card {
            height: 190px;
            perspective: 1200px;
            cursor: pointer;
        }

        .d10-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .d10-card:hover .d10-inner {
            transform: rotateY(180deg);
        }

        .d10-front, .d10-back {
            position: absolute;
            inset: 0;
            backface-visibility: hidden;
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow: hidden; /* For the shimmer effect */
        }

        .d10-front {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
            transition: 0.4s;
        }

        /* The Sheen/Shimmer Effect */
        .d10-front::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.6), transparent);
            transform: skewX(-25deg);
            transition: 0.5s;
        }

        .d10-card:hover .d10-front::before {
            left: 150%;
            transition: 0.7s;
        }

        .d10-front h3 {
            font-size: 1.35rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1a3a5c 0%, #00AEEF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            letter-spacing: -0.5px;
            transition: 0.3s;
        }

        .d10-back {
            background: linear-gradient(135deg, var(--cyan), var(--cyan-dark));
            transform: rotateY(180deg);
            color: white;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .d10-back-text {
            font-size: 0.9rem;
            line-height: 1.4;
            margin-bottom: 12px;
            opacity: 0.9;
        }

        .d10-back-btn {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: white;
            padding: 7px 20px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            transition: 0.3s;
        }

        .d10-back-btn:hover {
            background: white;
            color: var(--cyan);
            transform: translateY(-2px);
        }

        /* ── MOBILE OPTIMIZATION ── */
        @media (max-width: 576px) {
            .section-title-wrap { padding: 5px 0; }
            .section-title-wrap h3 { font-size: 1.4rem; }
            .crystal-container { padding: 15px 12px; border-radius: 25px; margin-top: 5px; }
            .d10-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
            .d10-card { height: 150px; }
            .d10-front h3 { font-size: 1.05rem; }
            .d10-back-text { font-size: 0.75rem; }
        }

        /* ── FORM ── */
        .ToggleOtherOptionForm { padding-top: 30px; display: none; }
        .from-sec {
            background: white; border-radius: 28px; padding: 30px;
            border: 1px solid #eef2f6; max-width: 800px; margin: 0 auto;
            box-shadow: 0 15px 35px rgba(0,0,0,0.03);
        }
        .form-control { border-radius: 12px; padding: 12px; border: 1.5px solid #edf2f7; }
        .form-control:focus { border-color: var(--cyan); box-shadow: 0 0 0 3px var(--cyan-light); }
        .submit-btn {
            background: linear-gradient(90deg, #00AEEF, #5ec8f0);
            border: none; padding: 12px 40px; border-radius: 30px;
            color: white; font-weight: 700; transition: 0.3s;
        }
        .submit-btn:hover { transform: scale(1.03); box-shadow: 0 10px 20px rgba(0, 174, 239, 0.2); }
    </style>
</head>
<body>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('l1449693225-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1449693225-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1449693225-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1449693225-0');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1449693225-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<section class="device-type-head">
    <div class="cust-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li> 
               <li class="breadcrumb-item"><a href="<?php echo e(route('categories')); ?>">Device Type</a></li> 
               <li class="breadcrumb-item active" aria-current="page">Select Brand</li>
            </ol>
        </nav>
        <div class="progress">
            <div class="progress-bar progress-bar-custom" role="progressbar">
                <span class="progress-end-dot"></span>
            </div>
        </div>
    </div>
</section>

<div class="page-section">
    <div class="cust-container">
        <div class="section-title-wrap">
            <h3>Who Made Your Device?</h3>
            <p>Select your manufacturer to see specific model repairs</p>
        </div>
        
        <div class="crystal-container">
            <div class="d10-grid">
                <?php $__empty_1 = true; $__currentLoopData = $device_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($device_type->name != 'Apple iPad'): ?>
                    <div class="d10-card" onclick="window.location.href='<?php echo e(route('modals', $device_type->id)); ?>'">
                        <div class="d10-inner">
                            <div class="d10-front">
                                <h3><?php echo e($device_type->name); ?></h3>
                            </div>
                            <div class="d10-back">
                                <div class="d10-back-text">View repairs for<br><strong><?php echo e($device_type->name); ?></strong></div>
                                <span class="d10-back-btn">Select →</span>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="d10-card">
                        <div class="d10-inner">
                            <div class="d10-front">
                                <h3>Smartphone</h3>
                            </div>
                            <div class="d10-back">
                                <div class="d10-back-text">Standard Repairs</div>
                                <span class="d10-back-btn">View →</span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="d10-card" onclick="toggleVisibility()">
                    <div class="d10-inner">
                        <div class="d10-front">
                            <h3 style="background: linear-gradient(135deg, #4a5568 0%, #718096 100%); -webkit-background-clip: text;">Other Brand</h3>
                        </div>
                        <div class="d10-back" style="background: linear-gradient(135deg, #4a5568, #2d3748);">
                            <div class="d10-back-text">Can't find your brand?<br><strong>Get a Quote</strong></div>
                            <span class="d10-back-btn">Click Here</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ToggleOtherOptionForm" id="otherFormSection">
            <div class="from-sec">
                <h4 class="text-center mb-4" style="font-weight:800; color:#1a3a5c;">Get a Custom Quote</h4>
                <form wire:submit.prevent="sendCustomerEmail">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input class="form-control mb-3" type="text" placeholder="Brand Name" wire:model="brand">
                            <input class="form-control mb-3" type="text" placeholder="Model Name" wire:model="model">
                            <input class="form-control mb-3" type="text" placeholder="Your Name" wire:model="firstName">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control mb-3" type="text" placeholder="Phone Number" wire:model="phone">
                            <textarea class="form-control" rows="3" placeholder="What's the issue?" wire:model="additionalDescription"></textarea>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button class="submit-btn" type="submit">Submit Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleVisibility() {
        const formDiv = document.getElementById('otherFormSection');
        const isHidden = (formDiv.style.display === 'none' || formDiv.style.display === '');
        formDiv.style.display = isHidden ? 'block' : 'none';
        if(isHidden) {
            formDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
</script>

</body>
</html><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/device-typs.blade.php ENDPATH**/ ?>