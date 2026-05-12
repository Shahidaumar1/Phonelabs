<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Repair Services | Fast & Reliable Device Repair</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #00AEEF;
            --primary-dark: #008bbf;
            --bg-light: #f4f7f9;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --card-shadow: 0 4px 8px -2px rgba(100, 116, 139, 0.15);
            --glass-bg: rgba(255, 255, 255, 0.8);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Manrope', sans-serif;
            background: radial-gradient(circle at top, #ffffff, #f0f4f8);
            color: var(--text-main);
            line-height: 1.5;
            min-height: 100vh;
        }

        .cust-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ========== HEADER ========== */
        .repair-header {
            text-align: center;
            margin: 30px 0;
        }

        .repair-header h1 {
            font-size: clamp(24px, 4vw, 36px);
            font-weight: 800;
            letter-spacing: -1px;
            color: #0a1629;
        }

        /* ========== REPAIR GRID ========== */
        .repair-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 60px;
        }

        .repair-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(0,0,0,0.01);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
        }

        .repair-card:hover {
            box-shadow: 0 10px 20px -5px rgba(100, 116, 139, 0.2);
            transform: translateY(-6px);
            border-color: rgba(0, 174, 239, 0.3);
        }

        .card-media {
            background: linear-gradient(to bottom, #fcfdfe, #ffffff);
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .card-media img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .repair-card:hover .card-media img {
            transform: scale(1.08) rotate(2deg);
        }

        .card-content {
            padding: 18px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .repair-title {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 6px;
            color: #0f172a;
            min-height: 40px;
            line-height: 1.3;
        }

        .price-box { margin-bottom: 15px; min-height: 50px; }

        .repair-price {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .installment-badge {
            font-size: 11px;
            background: #f0fdf4;
            color: #166534;
            padding: 3px 8px;
            border-radius: 6px;
            display: inline-block;
            margin-top: 4px;
            font-weight: 700;
            border: 1px solid #dcfce7;
        }

        .btn-book {
            margin-top: auto;
            background: var(--primary);
            color: #fff;
            text-align: center;
            padding: 12px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 14px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .repair-card:hover .btn-book {
            background: var(--primary-dark);
        }

        /* ========== MOBILE ========== */
        @media (max-width: 768px) {
            .cust-container { padding: 0 15px; }
            .repair-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .repair-card {
                border-radius: 16px;
                box-shadow: 0 2px 5px -1px rgba(100, 116, 139, 0.15);
            }
            .card-media { height: 100px; padding: 12px; }
            .card-content { padding: 12px; }
            .repair-title { font-size: 13px; min-height: 32px; margin-bottom: 4px; }
            .repair-price { font-size: 18px; }
            .installment-badge { font-size: 9px; padding: 2px 5px; }
            .btn-book { padding: 9px; font-size: 12px; border-radius: 10px; }
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<?php
    $deviceSeo = App\Helpers\SeoUrl::encodeUrl($device->name ?? 'device');
    $modelSeo  = App\Helpers\SeoUrl::encodeUrl($modal->name ?? 'model');
?>
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.top-bar', [])->html();
} elseif ($_instance->childHasBeenRendered('l2469862552-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2469862552-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2469862552-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2469862552-0');
} else {
    $response = \Livewire\Livewire::mount('components.top-bar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2469862552-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', ['theme' => 'white'])->html();
} elseif ($_instance->childHasBeenRendered('l2469862552-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2469862552-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2469862552-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2469862552-1');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', ['theme' => 'white']);
    $html = $response->html();
    $_instance->logRenderedChild('l2469862552-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


<div class="cust-container">

    <header class="repair-header">
        <h1>Reliable <span style="color: var(--primary);">Repair</span> Services</h1>
        <p style="color: var(--text-muted); font-weight: 500;">Select the repair you need for your <?php echo e($modal->name ?? 'device'); ?></p>
    </header>

    <div class="repair-grid">
        <?php if($device && $device->repair_types): ?>
            <?php $__currentLoopData = $device->repair_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $priceRecord = App\Models\Price::where('modal_id', $modal->id)
                        ->where('repair_type_id', $repair_type->id)
                        ->first();

                    $priceAmount = $priceRecord ? (float) $priceRecord->price : 0;

                    $repairSeo = App\Helpers\SeoUrl::encodeUrl($repair_type->name);

                    $r_slug = !empty($repair_type->slug)
                        ? $repair_type->slug
                        : \Illuminate\Support\Str::slug($repair_type->name);

                    // Price rules:
                    // 0      => hide
                    // 0.01   => Ask a Quotation
                    // 0.02   => Free Repair Booking
                    // >0.02  => Normal price + Book Instant Repair
                    $isQuotation   = ($priceAmount > 0    && $priceAmount < 0.02);
                    $isFreeBooking = ($priceAmount >= 0.02 && $priceAmount < 0.03);
                    $isNormal      = ($priceAmount >= 0.03);

                    // Target URL
                    if ($isFreeBooking) {
                        $targetUrl = route('free-repair-booking', [
                            'category_slug' => $category->slug ?? '',
                            'device_slug'   => $device->slug,
                            'model_slug'    => $modal->slug,
                            'repair_slug'   => $r_slug,
                        ]);
                    } elseif ($isQuotation) {
                        $targetUrl = route('quotation.livewire', [
                            'device' => $device->slug,
                            'modal'  => $modal->slug,
                            'repair' => $r_slug,
                        ]);
                    } else {
                        $targetUrl = route('repair-detail', [
    'device' => $deviceSeo,
    'modal'  => $modelSeo,
    'repair' => $repairSeo,
]) . '?price=' . $priceAmount;
                    }

                    $showKlarna = $isNormal && $priceAmount >= 30;
                ?>

                <?php if($priceAmount > 0): ?>
                <a href="<?php echo e($targetUrl); ?>" class="repair-card">
                    <div class="card-media">
                        <img src="<?php echo e(asset($repair_type->image)); ?>" alt="<?php echo e($repair_type->name); ?>" loading="lazy">
                    </div>

                    <div class="card-content">
                        <h3 class="repair-title"><?php echo e($repair_type->name); ?></h3>

                        <div class="price-box">
                            
                            <?php if($isNormal): ?>
                                <span class="repair-price">£<?php echo e(number_format($priceAmount, 2)); ?></span>

                                
                                <?php if($showKlarna): ?>
                                    <br>
                                    <div class="installment-badge">
                                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAFwAXAMBIgACEQEDEQH/xAAcAAEAAwADAQEAAAAAAAAAAAAABQcIAwQGAQL/xAA6EAABAwMBBQUFAw0AAAAAAAABAAIDBAURBgcSITFBNlFhdIETMkJxsReh0hQkJUNTVYKRkpOywdH/xAAZAQEBAAMBAAAAAAAAAAAAAAAAAQIDBAX/xAAfEQEBAAMAAgIDAAAAAAAAAAAAAQIDEQQSMkEUIjH/2gAMAwEAAhEDEQA/ALEREWL3BERFEREBERAREQEBKIESiIiDhrauCgpJaurkEUELS6R5BIaO/gvP/aBpT99Qf0v/AArn192MvPlXrNJVcu/flry5Gr6KrgrqSKqpJBJBM0PjeAcOB68VzKC0L2Osvk4/op09yjpwvcZUFcNZadttZLR111hhqIjh8bmuy04z0C7Nm1Dab46Vtpro6kw4Mm41w3c5xzA7is7awr23PVF0rGEGOSpfuEdWg4B/kArJ2EUpbQ3asPKSWOIfwgk/5hVya/Iyz2ev0tRERR2iBECJRERBA6+7GXnyr1mgrS+vuxl58q9ZoPNWPP8AM+caX0L2Nsvk4/oo3aZqdmnrDJFC/wDP6xpjgaDxYPif6dPEhRDNb0OldEWWJzTUXCShY6KnacADHvOPQZ9T96qC+Xitvlxlr7jMZZ5PQNHRrR0ARns3zHXMcf66C0ns+srrFpSipZWbtQ8e2nBHEPdxwfkMD0VWbKNIPvFzZdq6L9HUj95u9+ukHIDwHM+g71eqU8TXz96IiKO4QIgRKIiIIHX3Yy8+Ves0HmtL6+7GXnyr1mgqx5/mfOLuqNKM1Rs1szYQ1twp6NjqZ568LCD4H7jhUnLE+GV8UrHMkYS1zXDBaRzBC0roXsbZfKR/ReF2waP32v1FboyXAAVsbRzHST/R9D3ou7T3CZx2Nj+rWVNKzT1c5rZ4Wk0juXtGcy35jifEfJWgsn0lTNRVMVTSyOinieHse3m0jkVo3Q2qIdUWZtQN1tXFhlVEPhd3jwPMeo6JWfi7uz0r0aZVT7SNodztl5ltFje2n/J8CacsDnOcQDgZyAAD3KS2Xa6rNQ1E1su+4+qjj9rHOxobvtBAIcBwzxHJG6eRhc/RYyBECjdRERBF6ot81109cLfTFgmqIXRsLzhuT3qnvsh1H+3tv95/4VeqKtWzRjsvajNNUE1r0/bqCpLDNTwNjeWHLcgdFIyMZJG5kjQ5jhhzXDIIPQr9Io2ySTimr7sjuDrpO+yT0goXu3o2TyODmZ+Hg05A6eC7mkNCas0xeYq6nntzovdnh9u7EjOo93n1B71bKKuf8XCXsVbtD2cV14vEl2sr4nPnA9tBK/dO8BjLTy4gDh/1SWzTQdRpqea43OSJ1ZJH7JkcRyI2kgnJ6k4Hy9VYCIynj4TP3ECIFG6iL6QvmEBEwmEOiJhMIdETCYQ6ImEwh0QJhfQES1//2Q=="
                                             alt="Klarna"
                                             style="height:18px;width:auto;vertical-align:middle;margin-right:5px;">
                                        3x £<?php echo e(number_format($priceAmount / 3, 2)); ?>

                                    </div>
                                <?php endif; ?>

                            <?php elseif($isQuotation): ?>
                                
                                <span class="repair-price" style="font-size:16px;">Get a Quote</span>

                            <?php elseif($isFreeBooking): ?>
                                
                                <span class="repair-price" style="font-size:16px; color:#10b981;">Free</span>
                            <?php endif; ?>
                        </div>

                        
                        <?php if($isQuotation): ?>
                            <div class="btn-book">
                                Ask a Quotation <i class="fas fa-arrow-right"></i>
                            </div>
                        <?php elseif($isFreeBooking): ?>
                            <div class="btn-book">
                                Free Repair Booking <i class="fas fa-arrow-right"></i>
                            </div>
                        <?php else: ?>
                            <div class="btn-book">
                                Book Now <i class="fas fa-arrow-right"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>

<div class="cust-container" style="text-align:center; padding-bottom: 60px;">
    <div style="display:inline-flex; align-items:center; gap:12px; background:#fff; padding:10px 24px; border-radius:100px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); border: 1px solid #f1f5f9;">
        <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" width="18">
        <span style="font-weight:800; font-size: 14px;">Google Verified Repair Center</span>
        <div style="color: #f1c40f; font-size: 11px;">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
    </div>
</div>

</body>
</html><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/livewire/guest/repair-types.blade.php ENDPATH**/ ?>