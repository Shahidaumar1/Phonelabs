<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobileBitz - Buy, Sell, Repair</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Top Bar Livewire Component -->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.top-bar')->html();
} elseif ($_instance->childHasBeenRendered('M4u2RyR')) {
    $componentId = $_instance->getRenderedChildComponentId('M4u2RyR');
    $componentTag = $_instance->getRenderedChildComponentTagName('M4u2RyR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('M4u2RyR');
} else {
    $response = \Livewire\Livewire::mount('components.top-bar');
    $html = $response->html();
    $_instance->logRenderedChild('M4u2RyR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Navigation Bar -->
    <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page Content -->
    <div class="container mt-5">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Footer (Optional) -->
    <footer class="bg-light text-center py-3 mt-5">
        <p>&copy; 2025 MobileBitz. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/layouts/app.blade.php ENDPATH**/ ?>