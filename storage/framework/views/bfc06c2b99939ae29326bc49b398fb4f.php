    <div>
        
        <?php

        use App\Models\FormStatus;

        $formStatuses = FormStatus::where('name', 'services')->first();

        ?>



<?php

use App\Models\SiteSetting;

$setting = SiteSetting::first();

?>

        <style>

          @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

            footer {

                display: block;

                width: 100%;

                float: left;

                padding: 72px 15px 0 15px;

                background-color: #00AEEF;

                font-family: "Manrope", serif;

                font-style: normal;

            }

            a{

                color: #000;

                text-decoration:none;

            }



            .custom-container {

                max-width: 1283px;

                margin: 0 auto;



            }



            .footer-logo-box h4 {

                font-size: 28px;

                line-height: 34.13px;

                color: #fff;

                font-weight: 700;

                font-family: "Manrope", serif;

                font-style: normal;

                margin: 0;

                padding-bottom: 20px;

            }



            .footer-logo-box p {

                font-size: 14px;

                line-height: 24px;

                letter-spacing: -0.28px;

                color: rgba(255, 255, 255, 0.9);

                margin: 0 !important;

                padding-bottom: 40px;

                max-width: 242px;

                text-transform: capitalize;

                font-family: "Manrope", serif;

                font-style: normal;

                font-weight: 500;



            }



            .footer-social-icons a {

                color: #fff !important;

                font-size: 20px;

            }



            .footer-box h5 {

                font-size: 21px;

                line-height: 24px;

                font-weight: 700;

                text-transform: capitalize;

                margin: 0;

                padding-bottom: 28px;

                color: #fff;

                font-family: "Manrope", serif;

                font-style: normal;

            }



            .footer-box .newsLetter-input {

                position: relative;

                max-width: 420px;

                margin-bottom: 13px;

            }



            .footer-box .newsLetter-input input {

                max-width: 420px;

                width: 100%;

                height: 60px;

                padding: 15px 15px;

                color: #000;

                font-family: "Manrope", serif;

                font-style: normal;

                border-radius: 10px;

                font-size: 16px;

                letter-spacing: -0.30px;

                outline: none;

                border: 0;

            }



            .footer-box .newsLetter-input button {

                width: 158px;

                height: 54px;

                background-color: #00AEEF;

                color: #fff !important;

                font-size: 16px;

                line-height: 21.86px;

                font-weight: 600;

                border-radius: 10px;

                display: flex;

                justify-content: center;

                align-items: center;

                text-align: center;

                position: absolute;

                top: 3px;

                right: 3px;

            }

.footer-box .newsLetter-input button:hover{
    background: #0eadc9;
}


            .footer-box form p {

                font-size: 14px;

                line-height: 26px;

                letter-spacing: -0.28px;

                color: rgba(255, 255, 255, 0.9);

                margin: 0 !important;

                padding-bottom: 40px;

                text-transform: capitalize;

                font-weight: 500;

            }



            .footer-box ul {

                list-style: none;

                padding-left: 0;

            }



            .footer-box ul li {

                margin-bottom: 15px;

                color: #fff;

                display: flex;

                font-size: 14px;

                align-items: center;

            }



            .footer-box ul li:last-child {

                margin-bottom: 0 !important;

            }



            .footer-box ul li a {

                font-size: 14px;

                line-height: 24px;

                color: rgba(255, 255, 255, 0.9) !important;

                font-weight: 500;

                text-decoration: none;



            }



            .copy-write-sec {

                border-top: 1px solid #fff;

                background-color:#00AEEF;

                float: left;

                width: 100%;

                display: block;

            }



            .copy-write-content {

                display: flex;

                justify-content: space-between;

                padding: 29px 0;

            }



            .copy-write-content a,

            .copy-write-content p {

                font-size: 14px;

                text-transform: capitalize;

                font-weight: 500;

                color: rgba(255, 255, 255, 0.8) !important;

                text-decoration: none;



            }



            footer .row {

                row-gap: 30px;

            }



            @media(max-width: 768px) {

                footer {

                    padding: 40px 15px 0 15px;

                }



                .footer-box .newsLetter-input input {

                    height: 48px;

                    padding: 15px 15px;

                    border-radius: 5px;

                    font-size: 14px;

                }



                .footer-box .newsLetter-input button {

                    width: 110px;

                    height: 44px;

                    font-size: 14px;

                    line-height: 21.86px;

                    border-radius: 5px;

                    top: 2px;

                    right: 2px;

                }



                .footer-box h5 {

                    font-size: 18px;

                    line-height: 22px;

                    padding-bottom: 23px;

                }



                .footer-logo-box p {

                    padding-bottom: 20px;

                }



                .copy-write-content {

                    flex-direction: column;

                    align-items: center;

                    padding: 10px 0;

                }



                .copy-write-content a,

                .copy-write-content p {

                    font-size: 13px;



                }





            }



            @media(max-width: 576px) {

                footer {

                    padding: 40px 13px 0 13px;

                }



                .footer-logo-box h4 {

                    font-size: 24px;

                    line-height: 30.13px;

                    padding-bottom: 20px;

                    text-align: center;

                }



                .footer-logo-box p {

                    text-align: center;

                    margin: 0 auto !important;



                }



                .footer-social-icons {

                    text-align: center;

                }



                .footer-accordion h5 {

                    padding: 0 !important;

                }



                .footer-box ul li {

                    margin-bottom: 10px;

                    font-size: 12px;

                }



                .footer-box ul li a {

                    font-size: 12px;



                }



                .footer-panel {

                    padding-top: 25px;

                }



                .footer-accordion {

                    position: relative;

                }



                .footer-accordion:after {

                    content: '\002B';

                    color: #fff;

                    font-family: "Font Awesome 6 Free";

                    font-size: 18px;

                    position: absolute;

                    height: 100%;

                    display: flex;

                    align-items: center;

                    margin: 0px;

                    top: 0px;

                    right: 0px;

                }



                .footer-accordion.active:after {

                    content: '\2212' !important;

                    color: #fff;

                    font-family: "revicons";

                    font-size: 21px;

                    position: absolute;

                    height: 100%;

                    display: flex;

                    align-items: center;

                    margin: 0px;

                    top: 0px;

                    right: 0px;

                }



                .footer-panel {

                    display: none;

                    overflow: hidden;

                    transition: 0.5s ease-out;

                    text-align: left;

                }



                .footer-box form p {

                    font-size: 12px;

                    line-height: 19px;

                    padding-bottom: 10px;

                }

            }

        </style>



        <?php

            use App\Models\Branch;



            $head_branch = Branch::orderBy('created_at', 'ASC')->first();



        ?>



        <footer>

            <div class="custom-container">

                <div class="row pb-4 pb-md-5">

                    <div class="col-sm-6 col-lg-3 col-xl-4">

                        <div class="footer-logo-box">

                            <a href="/"><h4><?php echo e($head_branch->name); ?></h4></a>

                            <p>Your trusted <?php echo e($head_branch->name); ?> partners in UK. Welcome to <?php echo e($head_branch->name); ?></p>

                            <!--<div class="footer-social-icons">-->

                                <!-- <?php if($siteSettings->linkedin_link_status && $siteSettings->linkedin_link): ?>

                            <a target="_blank" href="<?php echo e($siteSettings->linkedin_link); ?>" class="instagram">

                                <i class="fa-brands fa-linkedin-in me-3"></i>

                            </a>

                            <?php endif; ?>



                            <?php if($siteSettings->twitter_link_status && $siteSettings->twitter_link): ?>

                            <a target="_blank" href="<?php echo e($siteSettings->twitter_link); ?>" class="twitter">

                                <i class="fa fa-twitter-square me-3"></i></a>

                            <?php endif; ?>

                            <?php if($siteSettings->tiktok_link_status && $siteSettings->tiktok_link): ?>

                            <a target="_blank" href="<?php echo e($siteSettings->tiktok_link); ?>" class="tiktok">

                                <i class="fa-brands fa-tiktok me-3"></i>

                            </a>

                            <?php endif; ?>

                            <?php if($siteSettings->snapchat_link_status && $siteSettings->snapchat_link): ?>

                            <a target="_blank" href="<?php echo e($siteSettings->snapchat_link); ?>" class="snapchat"><i class="fa fa-snapchat" style="font-size: 30px;"></i></a>

                            <?php endif; ?> -->



                            <!--    <a href="#"><i class="fa-brands fa-linkedin-in me-3"></i></a>-->

                            <!--    <a href="#"><i class="fa-brands fa-facebook-f me-3"></i></a>-->

                            <!--    <a href="#"><i class="fa-brands fa-instagram"></i></a>-->

                            <!--</div>-->

                             

              <div class="footer-social-icons">

                <?php if(($siteSettings->fb_link_status ?? false) && !empty($siteSettings->fb_link)): ?>

                  <a target="_blank" href="<?php echo e($siteSettings->fb_link); ?>" aria-label="Facebook">

                    <i class="fa-brands fa-facebook-f me-2"></i>

                  </a>

                <?php endif; ?>



                <?php if(($siteSettings->insta_link_status ?? false) && !empty($siteSettings->insta_link)): ?>

                  <a target="_blank" href="<?php echo e($siteSettings->insta_link); ?>" aria-label="Instagram">

                    <i class="fa-brands fa-instagram me-2"></i>

                  </a>

                <?php endif; ?>



                <?php if(($siteSettings->twitter_link_status ?? false) && !empty($siteSettings->twitter_link)): ?>

                  <a target="_blank" href="<?php echo e($siteSettings->twitter_link); ?>" aria-label="Twitter/X">

                    <i class="fa-brands fa-x-twitter me-2"></i>

                  </a>

                <?php endif; ?>



                <?php if(($siteSettings->tiktok_link_status ?? false) && !empty($siteSettings->tiktok_link)): ?>

                  <a target="_blank" href="<?php echo e($siteSettings->tiktok_link); ?>" aria-label="TikTok">

                    <i class="fa-brands fa-tiktok me-2"></i>

                  </a>

                <?php endif; ?>



                <?php if(($siteSettings->linkedin_link_status ?? false) && !empty($siteSettings->linkedin_link)): ?>

                  <a target="_blank" href="<?php echo e($siteSettings->linkedin_link); ?>" aria-label="LinkedIn">

                    <i class="fa-brands fa-linkedin-in me-2"></i>

                  </a>

                <?php endif; ?>



                <?php if(($siteSettings->snapchat_link_status ?? false) && !empty($siteSettings->snapchat_link)): ?>

                  <a target="_blank" href="<?php echo e($siteSettings->snapchat_link); ?>" aria-label="Snapchat">

                    <i class="fa-brands fa-snapchat"></i>

                  </a>

                <?php endif; ?>

              </div>

            

                        </div>

                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3">

                        <!--<div class="footer-box">-->

                        <!--    <div class="footer-accordion">-->

                        <!--        <h5>We Accept:</h5>-->

                        <!--    </div>-->

                        <!--    <div class="weaccept-Images footer-panel">-->

                        <!--        <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/FooterSection/pngwing.com%20(10).png" alt="1" class="me-3">-->

                        <!--        <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/FooterSection/pngwing.com%20(11).png" alt="2" class="me-3">-->

                        <!--        <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/FooterSection/pngwing.com%20(10).png" alt="3">-->

                        <!--    </div>-->

                        <!--</div>-->

                    </div>

                    <div class="col-lg-5">
    <div class="footer-box">
        <div class="footer-accordion">
            <h5>Join Our Newsletter</h5>
        </div>
        <div class="footer-panel">
            <div class="newsLetter-input">
                <input type="email" id="newsletter-email" placeholder="Your email address">
                <button type="button" id="newsletter-btn">Subscribe</button>
            </div>
            <p id="newsletter-msg" style="display:none; margin-top:8px; font-size:13px; font-weight:600;"></p>
            <p>Subscribe to get promotions, discounts and offers.</p>
        </div>
    </div>
</div>


                <div class="row pb-4">

                    <div class="col-sm-6 col-lg-3">

                        <div class="footer-box">

                            <div class="footer-accordion">

                                <h5>Categories</h5>

                            </div>

                            <ul class="footer-panel">
                                 <li class="nav-item navList">
                            <a class="nav-link" href="<?php echo e(route('guest-accessories-products')); ?>">Accessories</a>
                        </li>
                                  <?php if($formStatuses->repair): ?>

                                <li><a href="<?php echo e(route('categories')); ?>" class="footer-link">Book a repair</a></li>

                                <?php endif; ?>

                                <?php if($formStatuses->repair): ?>

                                <li><a href="<?php echo e(route('categories')); ?>" class="footer-link">Repair a device</a></li>

                                <?php endif; ?>

                            
                            </ul>

                        </div>

                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="footer-box">

                            <div class="footer-accordion">

                                <h5>Information</h5>

                            </div>

                            <ul class="footer-panel">

                                <li><a href="<?php echo e(route('aboutus')); ?>" class="footer-link">About Us</a></li>
                                
                                <li><a href="<?php echo e(route('privacy-and-policy')); ?>" class="footer-link">Privacy Policy</a>
                                
                                <li><a href="<?php echo e(route('terms-and-conditions')); ?>" class="footer-link">Terms &

                                        Conditions</a></li>


                                </li>

                    


                            </ul>

                        </div>

                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="footer-box">

                            <div class="footer-accordion">

                                <h5>Company</h5>

                            </div>

                            <ul class="footer-panel">

                                <li><a href="<?php echo e(route('home')); ?>" class="footer-link">Home</a></li>


    <li><a href="<?php echo e(route('stores')); ?>" class="footer-link">Stores</a></li>
    
                                <li><a href="<?php echo e(route('aboutus')); ?>" class="footer-link">About us</a></li>

                                </li>

                              

                            </ul>

                        </div>

                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="footer-box">

                            <div class="footer-accordion">

                                <h5>Contact Us</h5>

                            </div>

                            <ul class="footer-panel">

                                <li>

                                    <i class="fa-solid fa-phone me-2"></i>

                                    <a href="tel:<?php echo e($head_branch->landline_number); ?>" class="footer-link"><?php echo e($head_branch->landline_number); ?></a>

                                </li>

                                <li>

                                    <i class="fa-solid fa-envelope me-2"></i>

                                    <a href="mailto:<?php echo e($head_branch->email); ?>" class="footer-link"><?php echo e($head_branch->email); ?></a>

                                </li>

                                <li>

                                    <i class="fa-solid fa-location-dot me-2"></i>

                                    <a href="<?php echo e($siteSettings->google_map_profile_link); ?>" target="_blank"

                                        class="footer-link"><?php echo e($head_branch->address_line_1 . ' ' . $head_branch->address_line_2 . ' ' . $head_branch->town_city . ' ' . $head_branch->post_code); ?></a>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </footer>

        <!--<div class="copy-write-sec">-->

        <!--    <div class="px-2 px-sm-3">-->

        <!--        <div class="custom-container">-->

        <!--            <div class="copy-write-content">-->

        <!--                <p class="mb-0">Copyright © 2025 <?php echo e($head_branch->name); ?> - All Rights Reserved.</p>-->

                        <!--<div>-->

                        <!--    <a href="<?php echo e(route('terms-and-conditions')); ?>" class="me-3">Terms and conditions</a>-->

                        <!--    <a href="<?php echo e(route('privacy-and-policy')); ?>">Privacy Policy</a>-->

                        <!--</div>-->

        <!--            </div>-->

        <!--        </div>-->

        <!--    </div>-->

        <!--</div>-->

        <div class="copy-write-sec">

    <div class="px-2 px-sm-3">

        <div class="custom-container">

            <div class="copy-write-content text-center d-flex justify-content-center align-items-center">

                <p class="mb-0">Copyright © 2026 <?php echo e($head_branch->name); ?> - All Rights Reserved - <a href="https://softaccess.co.uk/">Powered by SoftAccess</a></p>

                <!--

                <div>

                    <a href="<?php echo e(route('terms-and-conditions')); ?>" class="me-3">Terms and conditions</a>

                    <a href="<?php echo e(route('privacy-and-policy')); ?>">Privacy Policy</a>

                </div>

                -->

            </div>

        </div>

    </div>

</div>





        <!-- Add jQuery CDN in the <head> or just before the custom script -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



        <script>

            var acc = document.getElementsByClassName("footer-accordion");

            var i;



            for (i = 0; i < acc.length; i++) {

                acc[i].addEventListener("click", function () {

                    this.classList.toggle("active");

                    var panel = this.nextElementSibling;

                    if (panel.style.display === "block") {

                        panel.style.display = "none";

                    } else {

                        panel.style.display = "block";

                    }

                });

            }

        </script>

<script>
document.getElementById('newsletter-btn').addEventListener('click', function () {
    var email = document.getElementById('newsletter-email').value.trim();
    var msg   = document.getElementById('newsletter-msg');
 
    if (!email) {
        msg.style.display = 'block';
        msg.style.color   = '#ffcc00';
        msg.textContent   = 'Please enter your email address.';
        return;
    }
 
    this.disabled    = true;
    this.textContent = 'Please wait...';
 
    fetch('<?php echo e(route("newsletter.subscribe")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ email: email })
    })
    .then(r => r.json())
    .then(data => {
        msg.style.display = 'block';
        msg.style.color   = data.success ? '#4ade80' : '#ffcc00';
        msg.textContent   = data.message;
        if (data.success) {
            document.getElementById('newsletter-email').value = '';
        }
        document.getElementById('newsletter-btn').disabled    = false;
        document.getElementById('newsletter-btn').textContent = 'Subscribe';
    })
    .catch(() => {
        msg.style.display = 'block';
        msg.style.color   = '#f87171';
        msg.textContent   = 'Something went wrong. Please try again.';
        document.getElementById('newsletter-btn').disabled    = false;
        document.getElementById('newsletter-btn').textContent = 'Subscribe';
    });
});
</script>

    </div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/frontend/sections/footer.blade.php ENDPATH**/ ?>