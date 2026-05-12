<style>
    .nav-box {
        background-color: rgb(192, 192, 239);
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .nav-box a {
        color: #343a40 !important;
        font-weight: bold;
    }
    .nav-box.active-box {
        background-color: #007bff;
    }
    .nav-box.active-box a {
        color: #fff !important;
    }
    .nav-box:hover {
        background-color: #e2e6ea;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .nav-item-wrap {
        display: flex;
        align-items: center;
        gap: 4px;
    }
</style>

<nav class="px-3" style="border-bottom:1px solid #ddd">
    <div class="d-flex justify-content-between align-items-center py-2">
        <i class="fa fa-bars cursor-pointer" onclick="toggleLeftDrawer()"></i>

        <div class="d-flex align-items-center gap-3">

            <div class="nav-item-wrap">
                <div class="nav-box <?php echo e(request()->is('orders') || request()->is('admin/orders') ? 'active-box' : ''); ?>">
                    <a href="<?php echo e(route('orders')); ?>" class="d-flex px-4 py-2 text-decoration-none">
                        Orders
                    </a>
                </div>
            </div>

            <div class="nav-item-wrap">
                <div class="nav-box <?php echo e(request()->is('contacts*') || request()->is('admin/contacts*') ? 'active-box' : ''); ?>">
                    <a href="<?php echo e(route('contacts.index')); ?>" class="d-flex px-4 py-2 text-decoration-none">
                        Customer Inquiries
                    </a>
                </div>
            </div>

            <div class="nav-item-wrap">
                <div class="nav-box <?php echo e(request()->is('customer-inquiries*') ? 'active-box' : ''); ?>">
                    <a href="<?php echo e(route('customer-inquiries')); ?>" class="d-flex px-4 py-2 text-decoration-none">
                        Quotation Request
                    </a>
                </div>
            </div>

            <div class="nav-item-wrap">
                <div class="nav-box <?php echo e(request()->is('admin/repair-quotations*') ? 'active-box' : ''); ?>">
                    <a href="<?php echo e(route('admin.repair-quotations')); ?>" class="d-flex px-4 py-2 text-decoration-none">
                        Repair Quotation
                    </a>
                </div>
            </div>

            <div class="nav-item-wrap">
                <div class="nav-box <?php echo e(request()->is('admin/free-repair-bookings*') ? 'active-box' : ''); ?>">
                    <a href="<?php echo e(route('admin.free-repair-bookings')); ?>" class="d-flex px-4 py-2 text-decoration-none">
                        Free Repair Bookings
                    </a>
                </div>
            </div>

        </div>

        <div class="d-flex align-items-center gap-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.avatar', [])->html();
} elseif ($_instance->childHasBeenRendered('l3131872218-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3131872218-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3131872218-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3131872218-0');
} else {
    $response = \Livewire\Livewire::mount('components.avatar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3131872218-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</nav><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/admin/orders/components/top-nav.blade.php ENDPATH**/ ?>