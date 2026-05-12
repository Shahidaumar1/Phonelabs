<!-- resources/views/emails/customer-info.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Your Product Information</title>
</head>

<body>
    <h2>Hello, <?php echo e($data['firstName']); ?> <?php echo e($data['lastName']); ?></h2>

    <p>Thank you for providing your information. Here are the details you submitted:</p>

    <ul>
        <li><strong>Phone:</strong> <?php echo e($data['phone']); ?></li>
        <li><strong>Email:</strong> <?php echo e($data['email']); ?></li>
        <li><strong>Confirm Email</strong> <?php echo e($data['productName']); ?></li>

    </ul>

    <!-- Display the selected checkboxes -->
    <?php if(isset($data['checkboxes']) && count($data['checkboxes']) > 0): ?>
        <p>Checkboxes you selected:</p>
        <ul>
            <?php $__currentLoopData = $data['checkboxes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkbox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($checkbox); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <!-- Display text for "Other" checkbox if applicable -->
    <?php if(isset($data['otherText']) && !empty($data['otherText'])): ?>
        <p>You specified: <?php echo e($data['otherText']); ?></p>
    <?php endif; ?>

    <!-- Display whether the customer is an existing customer -->
    <p>Existing Customer: <?php echo e($data['existingCustomer'] == 'yes' ? 'Yes' : 'No'); ?></p>

    <!-- Display whether the customer is a business -->
    <p>Business: <?php echo e($data['isBusiness'] == 'yes' ? 'Yes' : 'No'); ?></p>

    <!-- Display brand and model information -->
    <?php if(isset($data['brand']) && !empty($data['brand'])): ?>
        <p>Brand: <?php echo e($data['brand']); ?></p>
    <?php endif; ?>

    <?php if(isset($data['model']) && !empty($data['model'])): ?>
        <p>Model: <?php echo e($data['model']); ?></p>
    <?php endif; ?>

    <!-- Additional description if available -->
    <?php if(isset($data['additionalDescription']) && !empty($data['additionalDescription'])): ?>
        <p>Additional Description: <?php echo e($data['additionalDescription']); ?></p>  
    <?php endif; ?>

    <p>We appreciate your interest and will get back to you soon.</p>

    <p>Best regards,</p>
    <p> <?php echo e($siteSettings->buisness_name ?? ''); ?> Team</p>
</body>

</html>
<?php /**PATH /home/phonelabs/public_html/resources/views/emails/customer-info.blade.php ENDPATH**/ ?>