<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Subscribers - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <?php echo \Livewire\Livewire::styles(); ?>

    <style>
        body {
            background: #f4f6f9 !important;
            color: #212529 !important;
            color-scheme: light !important;
        }
    </style>
</head>
<body>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.newsletter-subscribers', [])->html();
} elseif ($_instance->childHasBeenRendered('lpHWGek')) {
    $componentId = $_instance->getRenderedChildComponentId('lpHWGek');
    $componentTag = $_instance->getRenderedChildComponentTagName('lpHWGek');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lpHWGek');
} else {
    $response = \Livewire\Livewire::mount('admin.newsletter-subscribers', []);
    $html = $response->html();
    $_instance->logRenderedChild('lpHWGek', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/newsletter-subscribers.blade.php ENDPATH**/ ?>