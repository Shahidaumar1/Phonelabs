<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <title>Store Buy: LB</title>
    <link rel="stylesheet" href="Clinic-Repair-LB.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="m-0 fs-5">
                    Hi
                    <span style=" font-weight: 600">
                        <?php echo e($data['patient']['name'] ?? ''); ?>,
                    </span>
                </p>
                <p class="fs-5">
                    I hope you're well and thanks for booking your
                    <span style=" font-weight: 600">
                        <?php echo e($data['buy_detail']['modal']['name'] ?? ''); ?>

                    </span>
                    mobile. Here’s the details you need:
                </p>
            </div>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Customer Details:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td style="width: 180px;">Name:</td>
                            <td style="font-weight: 600">
                                <?php echo e($data['patient']['name'] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px;">Email:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($data['patient']['email'] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 180px;">Contact number:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($data['patient']['phone'] ?? ''); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php if(isset($data['selectedBranch']['name'])): ?>
                <div class="mb-3 col-12">
                    <span><strong>Store Details:</strong></span>
                    <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                        <tbody>
                            <tr>
                                <td style="width: 180px;">Address:</td>
                                <td>
                                    <span>
                                        <?php echo e($data['selectedBranch']['name'] ?? ''); ?>,
                                        <?php echo e($data['selectedBranch']['address_line_1'] ?? ''); ?>,
                                        <?php echo e($data['selectedBranch']['address_line_2'] ?? ''); ?>

                                        <?php echo e(!empty($data['selectedBranch']['address_line_2']) ? ',' : ''); ?>

                                        <?php echo e($data['selectedBranch']['town_city'] ?? ''); ?>,
                                        <?php echo e($data['selectedBranch']['post_code'] ?? ''); ?>,
                                        UK
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 180px;">Email:</td>
                                <td>
                                    <span><?php echo e($data['selectedBranch']['email'] ?? ''); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" style="width: 180px;">Landline Number:</td>
                                <td>
                                    <span><?php echo e($data['selectedBranch']['landline_number'] ?? ''); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" style="width: 180px;">Mobile Number:</td>
                                <td>
                                    <span><?php echo e($data['selectedBranch']['mobile_number'] ?? ''); ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php
                $buy = $data['buy_detail'] ?? [];
                $attrs = $buy['attributes'] ?? [];

                $deviceName = $buy['device']['name'] ?? ($buy['modal']['name'] ?? '');
                $modelName = $buy['modal']['name'] ?? '';

                $memorySize = $buy['memory_size'] ?? ($attrs['memory_size'] ?? 'N/A');
                $color      = $buy['color'] ?? ($attrs['color'] ?? 'N/A');
                $grade      = $buy['grade'] ?? ($attrs['grade'] ?? 'N/A');
                $detail     = $buy['detail'] ?? ($attrs['detail'] ?? '');
                $spec       = $buy['specification'] ?? ($attrs['specification'] ?? '');
                $warranty   = $buy['warranty'] ?? ($attrs['warranty'] ?? '');
                $quantity   = $buy['quantity'] ?? 1;
                $price      = $buy['price'] ?? 0;
            ?>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Device Details:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td scope="col" style="width: 180px;">Booking Reference:</td>
                            <td scope="col">
                                This will follow in the acknowledgement email to be sent by
                                our Lab Team
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Device:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($deviceName); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Model:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($modelName); ?>

                            </td>
                        </tr>

                        <tr>
                            <td scope="row" style="width: 170px;">Memory Size:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($memorySize); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Color:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($color); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Grade:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($grade); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Detail:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($detail); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Specification:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($spec); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Warranty:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($warranty); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Quantity:</td>
                            <td style=" font-weight: 600">
                                <?php echo e($quantity); ?>

                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Provisional Quote:</td>
                            <td style=" font-weight: 600">
                                £ <?php echo e($price); ?>

                            </td>
                        </tr>

                        <tr>
                            <td scope="row" style="width: 170px;">Note</td>
                            <td>
                                <?php echo e($data['form']['repair_note'] ?? ''); ?>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Repair Options:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td scope="row" style="width: 170px;">appointment at</td>
                            <td>
                                <span style="color: red">
                                    <strong><?php echo e($data['form']['name'] ?? ''); ?></strong>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td scope="row" style="width: 170px;">Date - Time</td>
                            <td class="text-info" style="font-weight: 600;">
                                <?php echo e($data['form']['appointment_date'] ?? ''); ?>

                                -
                                <?php echo e($data['form']['appointment_time'] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px;">Directions:</td>
                            <td>
                                The entrance to the alleyway is next to Holland & Barrett
                                (opposite Borough Market) and we’re in the same building as the
                                Vape Store. If you're travelling by Underground, please exit
                                London Bridge Station from the
                                <b>Borough High Street (East)</b> exit. It’s a 30-second walk
                                from here, but up to 10 minutes from other exits.
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>
<?php /**PATH /home/phonelabs/public_html/resources/views/emails/buy/clinic_repair_lb_temp.blade.php ENDPATH**/ ?>