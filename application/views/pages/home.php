<style>
    .register-guild {
        height: 100%;
        border: 1px solid #ff0000;
        background-color: #F5E85E;
        /*background-image: url(http://casa98-th.com/images/casa/bg.jpg);*/
        /*background-image: url(https://www.casa98th.com/assets/css/../img/main-nav-bg2.jpg);*/
        /*background-repeat: no-repeat;*/
        /*background-size: 100%  ;*/
    }

    .video-present {
        height: 350px;
        /*background-color: #12ff00;*/
        padding: 0px;
        border: 1px solid #ff0000;
    }

    .register-form {
        height: 100%;
        background-color: #F5E85E;
        border: 1px solid #ff0000;
        /*background-color: #ff00c1;*/
        /*background-image: url(https://www.casa98th.com/assets/css/../img/main-nav-bg2.jpg);*/
    }

    .form-register {
        background-image: url(https://www.casa98th.com/assets/img/login-form/form-login.png);
        background-size: 252px 295px;
        height: 300px;
        width: 250px;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }

    .display-none {
        display: none;
    }

    .div-banner-slide {
        width: 100%;
        height: 480px;
    }

    .banner-slide {
        width: 100%;
        margin: 0px !important;
        max-width: none !important;
    }

    .home-banner-item {
        position: absolute;
        z-index: 3;
        width: 100%;
    }

    .btn-banner-register {
        position: absolute;
        bottom: 40px;
        left: 22%;
        z-index: 1;
        width: 170px;
        -webkit-box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.75);
    }

    .img-btn-register {
        width: 200px;
    }

    .register-guild p {
        font-weight: 600;

    }

    .img-responsive {
        width: 100%;
    }

    .div-banner-slide {
        width: 100%;
        height: 500px;
    }

    .row-body-top {
        height: 350px;
    }

    @media screen and (max-width: 1201px) {
        .div-banner-slide {
            /*height: 400px;*/
        }
    }

    @media screen and (max-width: 991px) {
        .div-banner-slide {
            height: 430px;
        }
    }

    @media screen and (max-width: 901px) {
        .div-banner-slide {
            height: 380px;
        }
    }

    @media screen and (max-width: 800px) {
        .div-banner-slide {
            height: 340px;
        }

        .register-guild {
            width: 100%;
        }

        .video-present {
            width: 100%;
        }

        .register-form {
            width: 100%;
        }

        .row-body-top {
            height: 100%;
        }
    }

    @media screen and (max-width: 750px) {
        .div-banner-slide {
            height: 320px;
        }

        .img-btn-register {
            display: none !important;
        }
    }

    @media screen and (max-width: 700px) {
        .div-banner-slide {
            height: 300px;
        }
    }

    @media screen and (max-width: 650px) {
        .div-banner-slide {
            height: 280px;
        }
    }

    @media screen and (max-width: 600px) {
        .div-banner-slide {
            height: 260px;
        }
    }

    @media screen and (max-width: 550px) {
        .div-banner-slide {
            height: 240px;
        }
    }

    @media screen and (max-width: 460px) {
        .div-banner-slide {
            height: 220px;
        }
    }

    @media screen and (max-width: 420px) {
        .div-banner-slide {
            height: 200px;
        }
    }

    @media screen and (max-width: 380px) {
        .div-banner-slide {
            height: 175px;
        }
    }

    @media screen and (max-width: 350px) {
        .div-banner-slide {
            height: 155px;
        }
    }

    @media screen and (max-width: 320px) {
        .div-banner-slide {
            height: 135px;
        }
    }

    .banner-slide {
        width: 100%;
        margin: 0px !important;
        max-width: none !important;
    }

    .margin-0 {
        margin: 0px !important;
    }

    .padding-0 {
        padding: 0px !important;
    }

    .padding-10 {
        padding: 10px !important;
    }

    /*-----------------------------------------  Slide Banner  -------------------------------------------*/
    #carousel-home {
        z-index: 2
    }

    #carousel-home ul.products {
        margin-bottom: 0
    }

    .slides li.carousel-item {
        position: relative;
        margin: 0 40px 0 0;
        overflow: hidden;
        color: #fff;
    }

    .top-area {
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: scroll;
        background-position: center top;
        margin: 0;
        padding: 0 10%;
        border-bottom: 10px solid #D3D3D3;
        z-index: 0;
    }

    .top-area:after {
        background: url(img/pattern.png) center repeat;
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        opacity: 1;
        z-index: 1;
        display: block;
    }

    .top-carousel-img {
        border-left: 8px solid #fff;
        border-right: 8px solid #fff;
    }

    .top-carousel-img img {
        width: 100%
    }

    .top-carousel-heading {
        position: absolute;
        bottom: 0;
        padding: 5%;
        text-align: center;
        width: 100%;
        opacity: 1;
        -webkit-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        background-color: rgba(0, 0, 0, 0.52);
    }

    li.carousel-item:hover .top-carousel-heading {
        opacity: 0
    }

    .carousel-heading-hover {
        position: absolute;
        bottom: 100%;
        padding: 15% 5%;
        text-align: center;
        width: 100%;
        height: 100%;
        opacity: 0;
        -webkit-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        background-color: rgba(0, 0, 0, 0.52);
    }

    li.carousel-item:hover .carousel-heading-hover {
        opacity: 1;
        bottom: 0;
    }

    /*-----------------------------------------  End Slide Banner  -------------------------------------------*/

</style>
<!--<link rel='stylesheet' id='alpha-store-stylesheet-css'  href='--><? //= base_url();?><!--assets/css/style.css?ver=1.2.5' type='text/css' media='all' />-->
<link rel='stylesheet' id='flexslider-css' href='<?= base_url(); ?>assets/css/flexslider.css?ver=2.6.3' type='text/css'
      media='all'/>
<script type='text/javascript' src='<?= base_url(); ?>assets/javascript/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?= base_url(); ?>assets/javascript/jquery.slides.min.js?ver=3.0.2'></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/javascript/customscript.js?ver=1.0.2"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/javascript/jquery.flexslider-min.js?ver=2.6.3"></script>


<div id="container">

    <div id='home-banner' class="home-banner">
        <div class="container">
            <div class="row margin-0">
                <div class="col-xs-12 padding-0">
                    <div class="home-banner-animate">
                        <div class="w3-content w3-section banner-slide div-banner-slide">
                            <div class="home-banner-item ">
                                <a class="hidden-xs mySlides-btn btn-banner-register"
                                   href="https://www.casa98th.com/index.php/register">
                                    <img id="btn-register-0"
                                         src="https://www.casa98th.com/assets/img/layout/btn-register.png"
                                         alt="ลงทะเบียนเล่น Casa98" class="img-btn-register" style="display: none;">
                                </a>
                                <a href="https://www.casa98th.com/index.php/register">
                                    <img id="img-slide-0"
                                         src="https://www.casa98th.com//uploads/home_banner6/home_banner_6.jpeg"
                                         class="img-responsive mySlides "
                                         alt="เว็บตรง สู่ Casa98 บอลออนไลน์ ราคาบอล ดีที่สุด" style="display: none;">
                                </a>
                            </div>
                            <div class="home-banner-item ">
                                <a class="hidden-xs mySlides-btn btn-banner-register"
                                   href="https://www.casa98th.com/index.php/register">
                                    <img id="btn-register-1"
                                         src="https://www.casa98th.com/assets/img/layout/btn-register.png"
                                         alt="ลงทะเบียนเล่น Casa98" class="img-btn-register" style="display: inline;">
                                </a>
                                <a href="https://www.casa98th.com/index.php/register">
                                    <img id="img-slide-1"
                                         src="https://www.casa98th.com//uploads/home_banner7/home_banner_7.jpeg"
                                         class="img-responsive mySlides "
                                         alt="เว็บตรง สู่ Casa98 บอลออนไลน์ ราคาบอล ดีที่สุด" style="display: block;">
                                </a>
                            </div>
                            <div class="home-banner-item ">
                                <a class="hidden-xs mySlides-btn btn-banner-register"
                                   href="https://www.casa98th.com/index.php/register">
                                    <img id="btn-register-2"
                                         src="https://www.casa98th.com/assets/img/layout/btn-register.png"
                                         alt="ลงทะเบียนเล่น Casa98" class="img-btn-register" style="display: none;">
                                </a>
                                <a href="https://www.casa98th.com/index.php/register">
                                    <img id="img-slide-2"
                                         src="https://www.casa98th.com//uploads/home_banner8/home_banner_8.jpeg"
                                         class="img-responsive mySlides "
                                         alt="เว็บตรง สู่ Casa98 บอลออนไลน์ ราคาบอล ดีที่สุด" style="display: none;">
                                </a>
                            </div>
                            <div class="home-banner-item ">
                                <a class="hidden-xs mySlides-btn btn-banner-register"
                                   href="https://www.casa98th.com/index.php/register">
                                    <img id="btn-register-3"
                                         src="https://www.casa98th.com/assets/img/layout/btn-register.png"
                                         alt="ลงทะเบียนเล่น Casa98" class="img-btn-register" style="display: none;">
                                </a>
                                <a href="https://www.casa98th.com/index.php/register">
                                    <img id="img-slide-3"
                                         src="https://www.casa98th.com//uploads/home_banner10/home_banner_10.jpeg"
                                         class="img-responsive mySlides "
                                         alt="เว็บตรง สู่ Casa98 บอลออนไลน์ ราคาบอล ดีที่สุด" style="display: none;">
                                </a>
                            </div>
                            <div class="home-banner-item ">
                                <a class="hidden-xs mySlides-btn btn-banner-register"
                                   href="https://www.casa98th.com/index.php/register">
                                    <img id="btn-register-4"
                                         src="https://www.casa98th.com/assets/img/layout/btn-register.png"
                                         alt="ลงทะเบียนเล่น Casa98" class="img-btn-register" style="display: none;">
                                </a>
                                <a href="javascript:void(0);">
                                    <img id="img-slide-4"
                                         src="https://www.casa98th.com//uploads/home_banner11/home_banner_11.jpeg"
                                         class="img-responsive mySlides "
                                         alt="เว็บตรง สู่ Casa98 บอลออนไลน์ ราคาบอล ดีที่สุด" style="display: none;">
                                </a>
                            </div>
                            <div class="home-banner-item ">
                                <a class="hidden-xs mySlides-btn btn-banner-register"
                                   href="https://www.casa98th.com/index.php/register">
                                    <img id="btn-register-5"
                                         src="https://www.casa98th.com/assets/img/layout/btn-register.png"
                                         alt="ลงทะเบียนเล่น Casa98" class="img-btn-register" style="display: none;">
                                </a>
                                <a href="javascript:void(0);">
                                    <img id="img-slide-5"
                                         src="https://www.casa98th.com//uploads/home_banner12/home_banner_12.jpeg"
                                         class="img-responsive mySlides "
                                         alt="เว็บตรง สู่ Casa98 บอลออนไลน์ ราคาบอล ดีที่สุด" style="display: none;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='body-center' class="body-center">

        <div class="container">

            <div class="row-body-top row margin-0">
                <div class="col-sm-3 register-guild padding-0">
                    <p>ขั้นตอนการสมัคร</p>

                    <p>1.สมัครผ่านหน้าเว็บไซต์ หรือ แอดไลน์ @casa98th</p>

                    <p>2.น้องคาซ่าจะติดต่อกลับไปเพื่อขอข้อมูลในการเปิดบัญชี</p>

                    <p>3.รับยูเซอร์ทดลองใช้งาน และ สามารถแจ้งฝาก-ถอนผ่านเว็บไซต์ได้</p>

                    <a href="#"><p>วิธีแจ้งฝาก-ถอน(คลิก)</p></a>
                </div>

                <div class="col-sm-6 video-present padding-0">
                    <iframe width="100%" height="100%"
                            src="https://www.youtube.com/embed/2ZBIcLQOybI?rel=0&amp;autoplay=1"
                            frameborder="0" allowfullscreen=""></iframe>
                </div>

                <div class="col-sm-3 register-form padding-0">

                    <div class="col-xs-12 padding-0">
                        <form id="form-register" class="form-register" method="post" name="form">

                            <div class="display-none">
                                <div class="col-xs-12">
                                    <input id="username" name="user"
                                           class="form-control input-login-mobile username-input"
                                           type="text" placeholder="username">
                                    <input id="password" name="pass"
                                           class="form-control input-login-mobile mar-left-5 password-input"
                                           type="password"
                                           placeholder="password">
                                </div>
                                <div class="col-xs-12 text-center mar-top-21 ">

                                    <img src="https://www.casa98th.com/getCodeImage.php?main-mobile=1"
                                         class="img-code-mobile">

                                    <input type="text" id="code" name="code" class="input-code-mobile"
                                           placeholder="รหัส">

                                    <a href="#" class="btn-submit-mobile">
                                        <img class="btn-login-mobile"
                                             src="https://www.casa98th.com/assets/img/btn-login.png"
                                             alt="เข้าสู่ระบบ แทงบอล Casa98">
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="row-body-center row margin-0">

                <div class="col-xs-12 padding-0">
                    <img width="100%" src="http://casa98-th.com/images/banner.png" alt="">
                </div>
                <div class="col-xs-12 padding-0">

                    <div class="col-xs-3 padding-10">
                        <img width="100%" src="<?= base_url(); ?>assets/images/banner/adban6.jpg" alt="">
                    </div>
                    <div class="col-xs-3 padding-10">
                        <img width="100%" src="<?= base_url(); ?>assets/images/banner/adban1.jpg" alt="">
                    </div>
                    <div class="col-xs-3 padding-10">
                        <img width="100%" src="<?= base_url(); ?>assets/images/banner/adban2.jpg" alt="">
                    </div>
                    <div class="col-xs-3 padding-10">
                        <img width="100%" src="<?= base_url(); ?>assets/images/banner/adban3.jpg" alt="">
                    </div>

                </div>

            </div>

            <div class="col-xs-12 padding-0">
                <h1>Body</h1>
                <?php $this->Home->get_blog('test'); ?>
                <div class="top-area container-fluid">
                    <div id="carousel-home" class="flexslider woocommerce">

                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides products"
                                style="width: 1000%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">

                                    <li class="carousel-item c-item-1 id-11"
                                        style="width: 272.4px; margin-right: 40px; float: left; display: block;">
                                        <div class="flex-img">
                                            <div class="top-carousel-img">
                                                <img width="270" height="423"
                                                     src="http://45.125.195.205:8008/assets/images/banner/adban1.jpg"
                                                     class="attachment-alpha-store-carousel size-alpha-store-carousel wp-post-image"
                                                     alt="%e0%b9%82%e0%b8%9b%e0%b8%a3%e0%b8%a2%e0%b9%89%e0%b8%b2%e0%b8%a2%e0%b8%84%e0%b9%88%e0%b8%b2%e0%b8%a22"
                                                     draggable="false"></div>
                                            <div class="top-carousel-heading">
                                                <div class="top-carousel-title">
                                                    Casa98th
                                                </div>
                                                <div class="price">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test-copy-copy-copy"
                                                   data-quantity="1" data-product_id="11" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                            <div class="carousel-heading-hover">
                                                <div class="top-carousel-title-hover"><a
                                                        href="https://www.tded24.com/?product=test-copy-copy-copy"
                                                        title="Casa98th">Casa98th</a></div>
                                                <div class="top-carousel-excerpt">
                                                </div>
                                                <div class="price-hover">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test-copy-copy-copy"
                                                   data-quantity="1" data-product_id="11" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                        </div>
                                    </li>

                                    <li class="carousel-item c-item-2 id-10"
                                        style="width: 272.4px; margin-right: 40px; float: left; display: block;">
                                        <div class="flex-img">
                                            <div class="top-carousel-img">
                                                <img width="270" height="423"
                                                     src="http://45.125.195.205:8008/assets/images/banner/adban2.jpg"
                                                     class="attachment-alpha-store-carousel size-alpha-store-carousel wp-post-image"
                                                     alt="%e0%b8%ab%e0%b8%a7%e0%b8%a27-1" draggable="false"></div>

                                            <div class="top-carousel-heading">
                                                <div class="top-carousel-title">
                                                    Casa98th
                                                </div>
                                                <div class="price">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test-copy-copy"
                                                   data-quantity="1" data-product_id="10" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                            <div class="carousel-heading-hover">
                                                <div class="top-carousel-title-hover"><a
                                                        href="https://www.tded24.com/?product=test-copy-copy"
                                                        title="Casa98th">Casa98th</a></div>
                                                <div class="top-carousel-excerpt">
                                                </div>
                                                <div class="price-hover">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test-copy-copy"
                                                   data-quantity="1" data-product_id="10" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                        </div>
                                    </li>

                                    <li class="carousel-item c-item-3 id-12"
                                        style="width: 272.4px; margin-right: 40px; float: left; display: block;">
                                        <div class="flex-img">
                                            <div class="top-carousel-img">
                                                <img width="270" height="423"
                                                     src="http://45.125.195.205:8008/assets/images/banner/adban3.jpg"
                                                     class="attachment-alpha-store-carousel size-alpha-store-carousel wp-post-image"
                                                     alt="casino1" draggable="false"></div>

                                            <div class="top-carousel-heading">
                                                <div class="top-carousel-title">
                                                    Casa98th
                                                </div>
                                                <div class="price">
                                                </div>
                                                <a rel="nofollow"
                                                   href="https://www.tded24.com/?product=test-copy-copy-copy-copy"
                                                   data-quantity="1" data-product_id="12" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                            <div class="carousel-heading-hover">
                                                <div class="top-carousel-title-hover"><a
                                                        href="https://www.tded24.com/?product=test-copy-copy-copy-copy"
                                                        title="Casa98th">Casa98th</a></div>
                                                <div class="top-carousel-excerpt">
                                                </div>
                                                <div class="price-hover">
                                                </div>
                                                <a rel="nofollow"
                                                   href="https://www.tded24.com/?product=test-copy-copy-copy-copy"
                                                   data-quantity="1" data-product_id="12" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                        </div>
                                    </li>

                                    <li class="carousel-item c-item-4 id-9"
                                        style="width: 272.4px; margin-right: 40px; float: left; display: block;">
                                        <div class="flex-img">
                                            <div class="top-carousel-img">
                                                <img width="270" height="423"
                                                     src="http://45.125.195.205:8008/assets/images/banner/adban4.jpg"
                                                     class="attachment-alpha-store-carousel size-alpha-store-carousel wp-post-image"
                                                     alt="%e0%b8%ab%e0%b8%a7%e0%b8%a210" draggable="false"></div>

                                            <div class="top-carousel-heading">
                                                <div class="top-carousel-title">
                                                    Casa98th
                                                </div>
                                                <div class="price">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test-copy"
                                                   data-quantity="1" data-product_id="9" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                            <div class="carousel-heading-hover">
                                                <div class="top-carousel-title-hover"><a
                                                        href="https://www.tded24.com/?product=test-copy" title="Casa98th">Casa98th</a>
                                                </div>
                                                <div class="top-carousel-excerpt">
                                                </div>
                                                <div class="price-hover">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test-copy"
                                                   data-quantity="1" data-product_id="9" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                        </div>
                                    </li>

                                    <li class="carousel-item c-item-5 id-5"
                                        style="width: 272.4px; margin-right: 40px; float: left; display: block;">
                                        <div class="flex-img">
                                            <div class="top-carousel-img">
                                                <img width="270" height="423"
                                                     src="http://45.125.195.205:8008/assets/images/banner/adban5.jpg"
                                                     class="attachment-alpha-store-carousel size-alpha-store-carousel wp-post-image"
                                                     alt="%e0%b8%ab%e0%b8%a7%e0%b8%a24" draggable="false"></div>

                                            <div class="top-carousel-heading">
                                                <div class="top-carousel-title">
                                                    Casa Lotto
                                                </div>
                                                <div class="price">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test"
                                                   data-quantity="1" data-product_id="5" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                            <div class="carousel-heading-hover">
                                                <div class="top-carousel-title-hover"><a
                                                        href="https://www.tded24.com/?product=test" title="Casa Lotto">Casa
                                                        Lotto</a></div>
                                                <div class="top-carousel-excerpt">
                                                </div>
                                                <div class="price-hover">
                                                </div>
                                                <a rel="nofollow" href="https://www.tded24.com/?product=test"
                                                   data-quantity="1" data-product_id="5" data-product_sku=""
                                                   class="button product_type_simple ajax_add_to_cart">Read more</a></div>
                                        </div>
                                    </li>
                            </ul>
                        </div>
                        <ul class="flex-direction-nav">
                            <li class="flex-nav-prev"><a class="flex-prev flex-disabled" href="#"
                                                         tabindex="-1">Previous</a></li>
                            <li class="flex-nav-next"><a class="flex-next flex-disabled" href="#" tabindex="-1">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var y = document.getElementsByClassName("mySlides-btn");

        for (i = 0; i < x.length; i++) {
            $('#btn-register-' + i).fadeOut(3000, function () {
                // Animation complete.
            });
            $('#img-slide-' + i).fadeOut(3000, function () {
                // Animation complete.
            });
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }

        var index = myIndex - 1;
        $('#btn-register-' + index).fadeIn(3000, function () {
            // Animation complete.
        });
        $('#img-slide-' + index).fadeIn(3000, function () {
            // Animation complete.
        });

        setTimeout(carousel, 10000); // Change image every 10 seconds
    }

</script>





















