<div>
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<style>
    .product_brand_section {
        display: block;
        width: 100%;
        margin-bottom: 70px;
        float: left;
        padding: 0px 10px;
        overflow: hidden; 
    }

    .product_brand_main {
        float: left;
        width: 100%;
    }

    .brand_slider_arrow_box {
        display: flex;
        justify-content: space-between;
        height: 100%;
        align-items: center;
        position: absolute;
        top: 0px;
        left: 0px;

        width: 100%;
    }

    .brand_slider_arrow_box a.brand_pre_arrow.slick-arrow {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99;
    }

    .brand_slider_arrow_box a.brand_pre_arrow.slick-arrow i {
        color: #000;
    }


    .product_brand_list {
        float: left;
        width: 100%;
        padding: 0px 0px;
        position: relative;
    }

    .product_brand_list ul {
        margin: 0px -15px;
        padding: 0px;
    }

    .product_brand_list ul li {
        list-style: none;
        width: 25%;
        padding: 0px 15px 0px 15px;
        float: left;
        margin: 0px !important;
    }
    .mt {
        margin-top:89;
    }

    .product_brand_figure_box {
        float: left;
        text-align: center;
        display: flex;
        justify-content: center;
        width: 100%;
        align-items: center;

    }

    .product_brand_figure_box figure {
        width: 100%;
        height: 100%;
        margin: 0px !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product_brand_figure_box figure img {
        width: 100%;
        object-fit: cover;
        height: 100%;
        max-width: 169px;
    }

    @media (max-width: 1024px) {

        .product_brand_list {
            width: 100%;
            padding: 0px;
        }

        .product_brand_list ul {
            margin: 0px -10px;
        }

        .product_brand_list ul li {

            padding: 0px 10px 0px 10px;

        }

        .brand_slider_arrow_box a.brand_pre_arrow.slick-arrow {
            background: #FFFFFF;
            box-sizing: border-box;
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.12);
            border-radius: 2px;
        }

        .product_brand_section { 
            margin-bottom: 50px;
        }

    }

/* DELETE OR COMMENT THIS BLOCK OUT */
.mb img {
    width: 60% !important; 
    
    transform: translateY(-15px) !important; 

}

/* Ensure the hover zoom still works but stays "small" relative to others */

    @media(max-width: 768px) {
        .product_brand_section { 
            margin-bottom: 40px;
        }
    }

    @media (max-width: 548px) {
        .product_brand_section { 
            margin-bottom: 30px;
        }
    }
    /* Direct Image Zoom - Final Fix */
.product_brand_figure_box img {
    transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1) !important;
    display: inline-block !important;
    position: relative !important;
    z-index: 1 !important;
}

/* Hover effect */
.product_brand_figure_box:hover img {
    transform: scale(1.25) !important; 
    z-index: 10 !important;*
}

/* Container overflow check */
.product_brand_list ul li {
    overflow: visible !important; 
}
</style>
<section class="product_brand_section">
    <div class="product_brand_main">
        <div class="product_brand_list">
            <div class="brand_slider_arrow_box"></div>
            <ul class="product_brand_slider">
                <li>
                    <div class="product_brand_figure_box">
                        <figure><img class="lazy"
                                src="https://ik.imagekit.io/myfirstKit/irepairLondon/BrandSection/Frame%201366%20(1).png?updatedAt=1731329665186" />
                        </figure>
                    </div>
                </li>
<li>
    <div class="product_brand_figure_box mb">
        <figure>
            <img class="lazy"
                 src="https://ik.imagekit.io/8qyy56iye/ChatGPT%20Image%20Apr%208,%202026,%2011_32_16%20AM.png" />
        </figure>
    </div>
</li>
                <li>
                    <div class="product_brand_figure_box">
                        <figure><img class="lazy"
                                src="https://ik.imagekit.io/myfirstKit/irepairLondon/BrandSection/Frame%201365%20(1).png?updatedAt=1731329665155" />
                        </figure>
                    </div>
                </li>
                <li>
                    <div class="product_brand_figure_box">
                        <figure><img class="lazy"
                                src="https://ik.imagekit.io/myfirstKit/irepairLondon/BrandSection/Frame%201363%20(1).png?updatedAt=1731329665103" />
                        </figure>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>


</div>