<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Repair Booking Confirmation - <?php echo e($data['repair_detail']['model'] ?? 'Your Device'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333333;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: #d32f2f;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 30px;
        }
        .greeting {
            margin-bottom: 30px;
        }
        .greeting p {
            font-size: 16px;
            line-height: 1.6;
        }
        .section-title {
            color: #d32f2f;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            border-bottom: 2px solid #d32f2f;
            padding-bottom: 5px;
        }
        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .table th {
            background: #f8e1e1;
            color: #d32f2f;
            font-weight: 600;
            width: 200px;
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #e0e0e0;
        }
        .table td {
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            vertical-align: top;
        }
        .highlight {
            color: #d32f2f;
            font-weight: 600;
        }
        .additional-costs p {
            margin: 5px 0;
        }
        .footer {
            background: #d32f2f;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            line-height: 1.6;
        }
        .footer a {
            color: #ffffff;
            text-decoration: underline;
            transition: opacity 0.2s;
        }
        .footer a:hover {
            opacity: 0.8;
        }
        @media (max-width: 576px) {
            .container {
                margin: 15px;
                padding: 0;
            }
            .content {
                padding: 20px;
            }
            .table th, .table td {
                font-size: 14px;
                padding: 10px;
            }
            .header h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Repair Booking Confirmation</h1>
            <p>Thank you for choosing <?php echo e($branch->name ?? 'Our Repair Service'); ?></p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Greeting -->
            <div class="greeting">
                <p>
                    Dear <span class="highlight"><?php echo e($data['patient']['name'] ?? 'Customer'); ?></span>,
                </p>
                <p>
                    Thank you for booking your <span class="highlight">
                        <?php echo e($data['repair_detail']['model'] ?? 'device'); ?>

                        <?php echo e($data['type'] ?? ''); ?> - <?php echo e($data['repair_detail']['fault'] ?? ''); ?>

                    </span> repair with us. Below you'll find all the details of your booking:
                </p>
            </div>

            <!-- Customer Details -->
            <div class="customer-details">
                <h5 class="section-title">Customer Details</h5>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td><?php echo e($data['patient']['name'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo e($data['patient']['email'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td><?php echo e($data['patient']['phone'] ?? 'N/A'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Repair Details -->
            <div class="repair-details">
                <h5 class="section-title">Repair Details</h5>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Booking Reference</th>
                            <td class="highlight"><?php echo e($data['repair_detail']['tracking_number'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Repair Type</th>
                            <td><?php echo e($data['type'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Device</th>
                            <td><?php echo e($data['repair_detail']['device'] ?? ''); ?> <?php echo e($data['repair_detail']['model'] ?? ''); ?></td>
                        </tr>
                        <tr>
                            <th>Repair Name</th>
                            <td><?php echo e($data['repair_detail']['fault'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Turnaround Time</th>
                            <td><?php echo e($data['repair_detail']['How_long'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Part Used</th>
                            <td><?php echo e($data['repair_detail']['part_used'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Warranty</th>
                            <td><?php echo e($data['repair_detail']['warranty'] ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Provisional Quote</th>
                            <td>£<?php echo e($data['repair_detail']['quotePrice'] ?? '0.00'); ?></td>
                        </tr>
                        <tr>
                            <th>Additional Costs</th>
                            <td class="additional-costs">
                                <?php if(!empty($data['repair_detail']['screen_protector'])): ?>
                                    <p><?php echo e($data['repair_detail']['screen_protector']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($data['repair_detail']['protective_case'])): ?>
                                    <p><?php echo e($data['repair_detail']['protective_case']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($data['repair_detail']['postal_price'])): ?>
                                    <p><?php echo e($data['repair_detail']['postal_price']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($data['repair_detail']['fix_form_price'])): ?>
                                    <p><?php echo e($data['repair_detail']['fix_form_price']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($data['repair_detail']['collection_form_price'])): ?>
                                    <p><?php echo e($data['repair_detail']['collection_form_price']); ?></p>
                                <?php endif; ?>
                                <?php if(empty($data['repair_detail']['screen_protector']) && empty($data['repair_detail']['protective_case']) && empty($data['repair_detail']['postal_price']) && empty($data['repair_detail']['fix_form_price']) && empty($data['repair_detail']['collection_form_price'])): ?>
                                    <p>None</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td class="highlight">£<?php echo e($data['repair_detail']['totalPrice'] ?? '0.00'); ?></td>
                        </tr>
                        <?php if(($data['form_type'] ?? '') == 'postal_form'): ?>
                        <tr>
                            <th>Total Price (incl. Postal)</th>
                            <td class="highlight">£<?php echo e(($data['repair_detail']['quotePrice'] + 9.99)); ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th>Payment Method</th>
                            
                            <td><?php echo e($data['repair_detail']['pm'] ?? 'Not specified'); ?></td>
                        </tr>
                        <tr>
                            <th>Appointment Location</th>
                            <td>
                                <span class="highlight"><?php echo e($branch->name ?? 'Branch name not available'); ?></span>
                                <br>
                                <?php echo e($branch->address_line_1 ?? ''); ?>

                                <?php if(!empty($branch->address_line_2)): ?>
                                    , <?php echo e($branch->address_line_2); ?>

                                <?php endif; ?>
                                , <?php echo e($branch->town_city ?? ''); ?>, <?php echo e($branch->post_code ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Location Map</th>
                            <td>
                                <?php if(session()->has('google_map_profile_link')): ?>
                                    <a href="<?php echo e(session('google_map_profile_link')); ?>" target="_blank">
                                        <button>View Map Location</button>
                                    </a>
                                <?php elseif(!empty($branch->map_link)): ?>
                                    <a href="<?php echo e($branch->map_link); ?>" target="_blank">
                                        <button>View Map Location</button>
                                    </a>
                                <?php else: ?>
                                    Map link not available
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Date & Time</th>
                            <td>
                                <?php echo e($data['form']['appointment_date'] ?? ($data['form']['repair_date'] ?? 'Not specified')); ?>

                                - <?php echo e($data['form']['appointment_time'] ?? ($data['form']['repair_time'] ?? 'Not specified')); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Repair Note</th>
                            <td><?php echo e($data['form']['repair_note'] ?? 'None'); ?></td>
                        </tr>
                        <tr>
                            <th>Our Commitment</th>
                            <td>
                                If we can't repair your device, our <span class="highlight">No-Fix, No-Fee</span>
                                policy ensures you won't be charged for the work undertaken.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>
                Need assistance? Contact us at
                <a href="mailto:<?php echo e($branch->email ?? 'support@repair-service.com'); ?>"><?php echo e($branch->email ?? 'support@repair-service.com'); ?></a>
                or call <?php echo e($branch->mobile_number ?? ($branch->landline_number ?? 'Not available')); ?>

            </p>
            <p>
                Visit us at <a href="<?php echo e($branch->website ?? 'https://phonelabsburnley.co.uk/'); ?>"><?php echo e($branch->website ?? 'https://phonelabsburnley.co.uk/'); ?></a>
            </p>
            <p>© <?php echo e(date('Y')); ?> <?php echo e($branch->name ?? 'Repair Service'); ?>. All rights reserved.</p>
        </div>
    </div>
</body>
</html><?php /**PATH /home/phonelabs/public_html/resources/views/emails/clinic_repair_lb_temp.blade.php ENDPATH**/ ?>