<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> <?php echo e($siteSettings->buisness_name ?? ''); ?></title>

<link rel="icon" type="image/x-icon" href="<?php echo e(asset($siteSettings->favicon ?? 'https://ik.imagekit.io/p2slevyg1/ea20c3ae-ce38-4625-89be-1ea4508601b1-removebg-preview.png?updatedAt=1701091177625')); ?>" />

<?php echo \Livewire\Livewire::styles(); ?>

<?php echo \Livewire\Livewire::scripts(); ?>

<link href="<?php echo e(asset('https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css')); ?>" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.1/dist/cdn.min.js"></script>
<!-- for selected dates -->
<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="<?php echo e(asset('flatpickr/flatpickr.min.css')); ?>">

<!-- Include Flatpickr JavaScript -->
<script src="<?php echo e(asset('flatpickr/flatpickr.min.js')); ?>"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R0M3CE2GE5"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());
 gtag('config', 'G-R0M3CE2GE5');
</script>



<?php echo $__env->yieldPushContent('scripts'); ?>


<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?><?php /**PATH /home/phonelabs/public_html/resources/views/frontend/sections/head.blade.php ENDPATH**/ ?>