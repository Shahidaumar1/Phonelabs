<?php
use App\Helpers\ServiceType;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Category;
use App\Models\Branch;
$args = 'Publish';
$branches = Branch::all();
$allCategories = Category::all();

$head_branch = Branch::orderBy('created_at', 'ASC')->first();

?>

<style>
    /* Critical CSS - Prevents All Flash/Render Issues */
    * {
        box-sizing: border-box;
    }
    
    html {
        margin: 0 !important;
        padding: 0 !important;
        overflow-x: hidden !important;
        width: 100% !important;
        max-width: 100vw !important;
    }
    
    body {
        margin: 0 !important;
        padding: 0 !important;
        overflow-x: hidden !important;
        width: 100% !important;
        max-width: 100vw !important;
        position: relative;
    }
    
    /* Add padding to body when navbar is fixed */
    @media (min-width: 992px) {
        body {
            padding-top: 60px !important;
        }
    }
    
    @media (max-width: 991px) {
        body {
            padding-top: 55px !important;
        }
    }
    
    /* Prevent navbar flash */
    .mobile-menu-bar {
        display: none;
        opacity: 0;
    }
    
    .web-menu-bar {
        display: none;
        opacity: 0;
    }
    
    @media (max-width: 991px) {
        .mobile-menu-bar {
            display: block !important;
            opacity: 1 !important;
        }
        .web-menu-bar {
            display: none !important;
        }
    }
    
    @media (min-width: 992px) {
        .mobile-menu-bar {
            display: none !important;
        }
        .web-menu-bar {
            display: block !important;
            opacity: 1 !important;
        }
    }
    
    /* Phone Labs Logo Styling */
    .phone-labs-logo {
        font-size: 30px;
        font-weight: 300;
        font-family: Arial, sans-serif;
        display: flex;
        align-items: center;
        gap: 0;
        line-height: 1;
        text-decoration: none;
        padding-left:20px;
    }
    
    .phone-labs-logo .phone-text {
       font-weight: 300;
                font-size: 25px;
                line-height: 27.32px;
                color: #000;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                text-decoration: none;
                white-space: nowrap;
                transition: color 0.3s ease;
        
    }
    
    .phone-labs-logo .labs-text {
        background-color: #00AEEF;
        color: #FFFFFF;
        padding: 7px 8px;
        border-radius: 3px;
        margin-left: 3px;
        letter-spacing: 0px;
        font-weight: 700;
         font-size:23px;
    }
    /* Styling for the new icon to ensure it matches the image perfectly */
.phone-icon-svg {
    width: 22px; 
    height: 19px; 
    margin-right: 8px;
    transform: rotate(0deg);
}

@media(max-width: 1024px) {
    .phone-icon-svg {
        margin-right: 0;
        width: 20px;
        height: 20px;
    }
}

/* Ensure the link container stays centered */
.mega-nav-phone {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<div style="margin: 0; padding: 0; width: 100%; max-width: 100vw; overflow-x: hidden; box-sizing: border-box;">
   
    
    
    
    <div class="mobile-menu-bar d-block d-lg-none">
        <div class="mobile-nav-wrapper">
            <div class="mobile-nav-logo">
                <a href="/" class="phone-labs-logo">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.logo', [])->html();
} elseif ($_instance->childHasBeenRendered('l1605365767-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1605365767-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1605365767-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1605365767-0');
} else {
    $response = \Livewire\Livewire::mount('components.logo', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1605365767-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </a>
            </div>
            <i class="fa fa-bars sidebar-toggleBtn"></i>
        </div>
    </div>

    
    
    
    <div class="web-menu-bar d-none d-lg-block" x-data="{ open: false, hover: false }" @mouseleave="window.livewire.find('<?php echo e($_instance->id); ?>').call('hideDevices')">
        <div class="custom-container">
            <?php
            $routeMapping = [
                'repair' => 'categories',
            ];
            ?>
            <div :class="{ 'show': open }" id="navbarContent">
               <div class="mega-nav-wrapper">
                   <div class="mega-nav-logo">
                       <a href="/" class="phone-labs-logo">
                              <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.logo', [])->html();
} elseif ($_instance->childHasBeenRendered('l1605365767-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1605365767-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1605365767-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1605365767-1');
} else {
    $response = \Livewire\Livewire::mount('components.logo', []);
    $html = $response->html();
    $_instance->logRenderedChild('l1605365767-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                       </a>
                   </div>

                   <ul class="mx-auto main-menus">

                        
                        <?php if($formStatuses->repair): ?>
                        <li class="nav-item navList" @mouseenter="open = true; hover = true"
                            @mouseleave="hover = false; setTimeout(() => { if(!hover) open = false }, 200)">
                            <a class="nav-link"
                                @mouseenter="window.livewire.find('<?php echo e($_instance->id); ?>').call('showDevices', 'Repair')"
                                href="<?php echo e(route($routeMapping['repair'])); ?>">
                                <?php echo $webContent->mega_nav_repair; ?>

                            </a>
                        </li>
                        <?php endif; ?>

                        
                        <?php if($formStatuses->buy): ?>
                        <li class="nav-item navList">
                            <a class="nav-link" href="<?php echo e(route('guest-buy-products')); ?>">Buy a Device</a>
                        </li>
                        <?php endif; ?>

                        
                        <?php if($formStatuses->sell): ?>
                        <li class="nav-item navList">
                            <a href="<?php echo e(route('guest-sell-categories')); ?>" class="nav-link">Sell Your Device</a>
                        </li>
                        <?php endif; ?>
                        
                    <li class="nav-item navList">
                        <a class="nav-link" href="<?php echo e(route('repair-guide')); ?>">
                            Repair Guide
                        </a>
                    </li>


                        
                        <?php if($formStatuses->accessories): ?>
                        <li class="nav-item navList">
                            <a class="nav-link" href="<?php echo e(route('guest-accessories-products')); ?>">Accessories</a>
                        </li>
                        <?php endif; ?>
                        
                        
                        <li class="nav-item navList">
                            <a class="nav-link" href="<?php echo e(url('aboutus')); ?>">About us</a>
                        </li>

                        
                        <li class="nav-item navList">
                            <a class="nav-link" href="<?php echo e(route('stores')); ?>">Stores</a>
                        </li>


                    </ul>

                    <div class="mega-nav-btns">
                        <a href="tel:<?php echo e($head_branch->landline_number); ?>" class="mega-nav-phone">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="phone-icon-svg">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" 
                                      fill="none" 
                                      stroke="#00AEEF" 
                                      stroke-width="1.5" 
                                      stroke-linejoin="round"/>
                            </svg>
                            <span><?php echo e($head_branch->landline_number); ?></span>
                        </a>
                        <a href="/quotation" class="mega-nav-btn">
                            <span class="btn-text">Get a Quote</span>
                        </a>
                    </div>
               </div>
            </div>
        </div>

        <style>
            /* Mobile Menu Bar Styling */
            .mobile-menu-bar {
                width: 100%;
                max-width: 100vw;
                padding: 10px 20px;
                background-color: #fff;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
                margin: 0;
                box-sizing: border-box;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 999;
            }

            .mobile-nav-wrapper {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                max-width: 100%;
            }

            .mobile-nav-logo {
                display: flex;
                align-items: center;
            }

            .sidebar-toggleBtn {
                font-size: 24px;
                color: #000;
                cursor: pointer;
                padding: 8px;
                transition: 0.3s ease;
            }

            .sidebar-toggleBtn:hover {
                color: #00AEEF;
            }

            /* Desktop Menu Bar */
            .web-menu-bar {
                width: 100%;
                max-width: 100vw;
                padding: 9px 15px;
                background-color: #fff;
                margin: 0;
                box-sizing: border-box;
                overflow: visible;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 999;
                height:65px;
            }

            .custom-container {
                position: relative;
                max-width: 1283px;
                width: 100%;
                margin: 0 auto;
                box-sizing: border-box;
                padding-right: 25px;
            }

            .mega-nav-wrapper {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                width: 100%;
                box-sizing: border-box;
            }

            .mega-nav-logo {
                display: flex;
                align-items: center;
                flex-shrink: 0;
            }

            .web-menu-bar .main-menus {
                display: flex;
                flex-direction: row !important;
                gap: 33px !important;
                align-items: center;
                justify-content: center;
                margin: 0 !important;
                padding: 0 !important;
                list-style: none !important;
                flex: 1;
            }

            .web-menu-bar .main-menus .nav-item {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            .web-menu-bar .main-menus .nav-link {
                font-weight: 500;
                font-size: 16px;
                line-height: 27.32px;
                color: #000;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                text-decoration: none;
                white-space: nowrap;
                transition: color 0.3s ease;
            }

            .web-menu-bar .main-menus .nav-link:hover {
                color: #00AEEF !important;
            }

            .mega-nav-btns {
                display: flex;
                align-items: center;
                gap: 20px;
                flex-shrink: 0;
            }

            .mega-nav-phone {
                display: flex;
                align-items: center;
                color: #00AEEF;
                font-size: 17px;
                font-weight:600;
                font-family: "inter", sans-serif;
                text-decoration: none;
                white-space: nowrap;
                transition: opacity 0.3s ease;
            }

            .mega-nav-phone:hover {
                opacity: 0.8;
            }

            .mega-nav-phone svg {
                flex-shrink: 0;
            }

            .mega-nav-btn {
                padding: 10px 20px;
                border-radius: 10px;
                border: 2px solid #00AEEF;
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                font-size: 15px;
                line-height: 24.59px;
                font-weight: 600;
                background: #00AEEF;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                text-decoration: none;
                white-space: nowrap;
                transition: none;
                height:40px;
            }

            .mega-nav-btn:hover {
                transform: none !important;
                background: #00AEEF;
                color: #fff;
            }

            .mega-nav-btn i {
                font-size: 16px;
            }

            .web-dropmenu {
                position: absolute !important;
                display: block !important;
                background: #fff !important;
                left: 250px;
                top:44px;
                padding: 20px;
                z-index: 100;
            }

            .web-dropmenu-main {
                display: flex;
                gap: 30px;
            }

            .web-dropmenu-inner {
                display: flex;
                flex-direction: column;
                row-gap: 10px;
            }

            .web-dropmenu-inner .dropdown-heading {
                font-size: 18px;
                color: #00AEEF;
                font-weight: 700;
            }

            .web-dropmenu-inner .drop-menues-link {
                font-size: 14px;
                font-weight: 500;
                color: #000;
            }

            .web-dropmenu .see-all-devices {
                text-align: end;
                width: 100%;
            }

            .web-dropmenu .see-all-devices a {
                font-size: 18px;
                color:#00AEEF;
                font-weight: 700;
            }

            .navList {
                list-style: none;
                text-decoration: none;
            }

            .scroll-css {
                overflow-y: auto;
                max-height: 400px;
                padding-right: 10px;
            }

            @media(max-width: 1200px) {
                .web-menu-bar .main-menus {
                    gap: 20px !important;
                }
                .mega-nav-btn {
                    padding: 8px 15px;
                    font-size: 14px;
                }
                .mega-nav-btn i {
                    font-size: 14px;
                }
                .mega-nav-wrapper {
                    gap: 15px;
                }
            }

            @media(max-width: 1100px) {
                .web-menu-bar .main-menus {
                    gap: 15px !important;
                }
                .web-menu-bar .main-menus .nav-link {
                    font-size: 16px;
                }
            }

            @media(max-width: 1024px) {
                .mega-nav-wrapper {
                    gap: 10px;
                }
                .web-menu-bar .main-menus {
                    gap: 12px !important;
                }
                .web-menu-bar .main-menus .nav-link {
                    font-size: 15px;
                }
                .mega-nav-btn {
                    padding: 8px 12px;
                    font-size: 13px;
                }
                .mega-nav-btn .btn-text {
                    display: none;
                }
                .mega-nav-btn i {
                    margin: 0 !important;
                }
                .mega-nav-phone span {
                    display: none;
                }
                .mega-nav-btns {
                    gap: 12px;
                }
                .custom-container {
                    padding-right: 15px;
                }
            }

            @media(max-width: 991px) {
                .mobile-menu-bar {
                    padding: 8px 15px;
                }
            }

            @media(max-width: 576px) {
                .mobile-menu-bar {
                    padding: 8px 15px;
                }
                .sidebar-toggleBtn {
                    font-size: 22px;
                }
                .phone-labs-logo {
                    font-size: 22px;
                }
                .phone-labs-logo .labs-text {
                    padding: 8px 8px;
                }
            }
        </style>
    </div>
    
    
    
    
    <div>
        <style>
            .mobile-menu-sidebar {
                max-width: 250px;
                width: 100%;
                padding: 35px 15px;
                background-color: white;
                height: 100%;
                position: fixed;
                top: 0;
                left: -300px;
                overflow-y: auto;
                transition: left 0.3s ease;
                z-index: 1000;
                box-sizing: border-box;
            }

            .mobile-menu-sidebar.open {
                left: 0;
            }

            .mobile-menu-sidebar ul {
                list-style: none;
                padding-left: 20px;
            }

            .mobile-menu-sidebar .main-menus {
                display: flex;
                flex-direction: column;
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .mobile-menu-sidebar .main-menus li {
                border-bottom: 1px solid rgba(0, 0, 0, 0.2);
                padding: 10px 0px;
            }

            .mobile-menu-sidebar .main-menus li a {
                font-size: 16px;
                color: #000;
                text-align: left;
                text-decoration: none;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                font-weight: 600;
            }

            .mobile-menu-sidebar .main-menus div.custom-accordion {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                cursor: pointer;
            }
            
            .mobile-menu-sidebar .main-menus div.custom-accordion a {
                flex: 1;
            }
            
            .mobile-menu-sidebar .main-menus div.custom-accordion span {
                font-size: 22px;
                user-select: none;
            }

            .mobile-menu-sidebar .main-menus li:last-child {
                border-bottom: none;
            }

            .mobile-menu-sidebar .fa-close {
                position: absolute;
                right: 17px;
                top: 5px;
                font-size: 20px;
                color: #000;
                cursor: pointer;
            }

            .close-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .close-overlay.active {
                display: block;
            }

            .mobile-menu-sidebar .main-menus .panel {
                display: none;
            }
        </style>

        <div class="close-overlay"></div>
        <div class="mobile-menu-sidebar">
            <i class="fa-solid fa-close"></i>
            <ul class="main-menus">

                
                <?php if($formStatuses->repair): ?>
                <li>
                    <div class="custom-accordion">
                        <a>Repair A Device</a>
                        <span>+</span>
                    </div>
                </li>
                <?php endif; ?>

                
                <?php if($formStatuses->buy): ?>
                <li>
                    <a class="nav-link" href="<?php echo e(route('guest-buy-products')); ?>">Buy a Device</a>
                </li>
                <?php endif; ?>

                
                <?php if($formStatuses->sell): ?>
                <li>
                    <a href="<?php echo e(route('guest-sell-categories')); ?>" class="nav-link">Sell Your Device</a>
                </li>
                <?php endif; ?>

                
                <?php if($formStatuses->accessories): ?>
                <li>
                    <a class="nav-link" href="<?php echo e(route('guest-accessories-products')); ?>">Accessories</a>
                </li>
                <?php endif; ?>

                
                <li>
                    <a class="nav-link" href="<?php echo e(url('aboutus')); ?>">About us</a>
                </li>

                
                <li>
                    <a class="nav-link" href="<?php echo e(route('stores')); ?>">Stores</a>
                </li>

            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.sidebar-toggleBtn').on('click', function () {
                $('.mobile-menu-sidebar').addClass('open');
                $('.close-overlay').addClass('active');
            });

            $('.mobile-menu-sidebar .fa-close, .close-overlay').on('click', function () {
                $('.mobile-menu-sidebar').removeClass('open');
                $('.close-overlay').removeClass('active');
            });

            $('.custom-accordion').on('click', function () {
                $(this).next('.panel').slideToggle();
                $(this).find('span').text($(this).find('span').text() === '+' ? '-' : '+');
            });
        });
    </script>

</div>
<?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/livewire/components/mega-nav.blade.php ENDPATH**/ ?>