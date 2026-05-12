

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('head-scripts'); ?>
    <meta name="google-site-verification" content="VBeQKFx66BgWgsYX-MVEK9At7HDHXS7ZS1GDqYLdCiM" />
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PLKSQVFN');</script>
    <!-- End Google Tag Manager -->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<?php
use App\Models\FormStatus;
$formStatuses = FormStatus::where('name', 'services')->first();
?>

<div style="width: 100%; overflow-x: hidden;">
    
    
    
    
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('zgEAMQW')) {
    $componentId = $_instance->getRenderedChildComponentId('zgEAMQW');
    $componentTag = $_instance->getRenderedChildComponentTagName('zgEAMQW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zgEAMQW');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('zgEAMQW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    
    
    <?php echo $__env->make('frontend.Home_page_sections.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.Home_page_sections.selectAdeviceSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.Home_page_sections.devicesAndBrandsSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->make('frontend.Home_page_sections.repairOptinsSec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.wecanFix', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.Home_page_sections.whyWeChoose', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
     <?php echo $__env->make('frontend.Home_page_sections.testinomials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.Home_page_sections.formAndLocationSec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/home.blade.php ENDPATH**/ ?>