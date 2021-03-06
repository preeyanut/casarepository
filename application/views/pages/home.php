<style>


    .register-guild {
        height: 100%;
        /*border: 1px solid #ff0000;*/
        /*background-color: #F5E85E;*/
        /*background-image: url(http://casa98-th.com/images/casa/bg.jpg);*/
        /*background-image: url(https://www.casa98th.com/assets/css/../img/main-nav-bg2.jpg);*/
        /*background-repeat: no-repeat;*/
        /*background-size: 100%  ;*/
    }

    .video-present {
        height: 350px;
        /*background-color: #12ff00;*/
        padding: 0px;
        /*border: 1px solid #ff0000;*/
    }

    .register-form {
        height: 100%;
        /*background-color: #F5E85E;*/
        /*border: 1px solid #ff0000;*/
        /*background-color: #ff00c1;*/
        /*background-image: url(https://www.casa98th.com/assets/css/../img/main-nav-bg2.jpg);*/
    }

    .form-register {
        /*background-image: url(https://www.casa98th.com/assets/img/login-form/form-login.png);*/
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
        /*width: 100%;*/
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
        /*font-weight: 600;*/
        font-size: 20px;
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
        /*border-bottom: 10px solid #D3D3D3;*/
        z-index: 0;
    }

    .top-area:after {
        /*background: url(/admin/assets/img/blog/6/20/bg_product.jpg) center repeat;*/
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
        /*border-left: 8px solid #fff;*/
        /*border-right: 8px solid #fff;*/
    }

    .top-carousel-img img {
        /*width: 100%*/
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

    .float-none {
        float: none !important;
    }

    .product_type_simple {
        color: #ecd542;
        font-size: 25px;
    }
</style>
<!--<link rel='stylesheet' id='alpha-store-stylesheet-css'  href='--><? //= base_url();?><!--assets/css/style.css?ver=1.2.5' type='text/css' media='all' />-->
<link rel='stylesheet' id='flexslider-css' href='<?= base_url(); ?>assets/css/flexslider.css?ver=2.6.3' type='text/css'
      media='all'/>
<script type='text/javascript' src='<?= base_url(); ?>assets/javascript/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?= base_url(); ?>assets/javascript/jquery.slides.min.js?ver=3.0.2'></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/javascript/customscript.js?ver=1.0.2"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/javascript/jquery.flexslider-min.js?ver=2.6.3"></script>

<div id="">

    <div id='home-banner' class="home-banner container">
        <div class="container">
            <div class="row margin-0">
                <div class="col-xs-12 padding-0">
                    <div class="home-banner-animate">
                        <div class="w3-content w3-section banner-slide div-banner-slide">

                            <?php
                            $count = 0;
                            if ($home_banners) {
                                foreach ($home_banners as $item) {
                                    ?>
                                    <div class="home-banner-item ">
                                        <a class="hidden-xs mySlides-btn btn-banner-register"
                                           href="<?= base_url(); ?>">
                                            <img id="btn-register-<?= $count ?>"
                                                 src="<?= base_url(); ?>assets/images/btn-register.png"
                                                 alt="ลงทะเบียนเล่น Casa98" class="img-btn-register"
                                                 style="display: none;">
                                        </a>
                                        <a href="<?= base_url(); ?>">
                                            <img id="img-slide-<?= $count ?>"
                                                 src="<?= base_url() . 'admin/' . $item['banner_image'] ?>"
                                                 class="img-responsive mySlides "
                                                 alt="เว็บตรง สู่ Casa98 บอลออนไลน์ ราคาบอล ดีที่สุด"
                                                 style="display: none;">
                                        </a>
                                    </div>

                                    <?php
                                    $count++;
                                }

                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12  float-none"
         style="background: url(assets/images/bggold3.png) center repeat;padding-bottom: 10px;padding-top: 10px;">

        <div class="top-area container-fluid">
            <div id="carousel-home" class="flexslider woocommerce">

                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                    <ul class="slides products"
                        style="width: 1000%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">

                        <?php

                        if (isset($news)) {
                            $count = 1;
                            foreach ($news as $items) {

                                $meta_keyword = 'การพนันออนไลน์';

                                $blog_id = $items['blog_id'];
                                $blog_url = base_url() . 'blog?blog_id=' . $items['blog_id'];
                                $blog_title = $items['blog_title'];

                                foreach ($items['news_info'] as $item) {
                                    if ($item['field_type'] === 'date' && $item['field_id'] === 'date-shower') {
                                        $date_shower = $item['blog_value'];
                                    }
                                    if ($item['field_type'] === 'image' && $item['field_id'] === 'image') {
                                        $image = base_url() . 'admin/' . $item['blog_value'];
                                    }
                                }
                                ?>
                                <li class="carousel-item c-item-<?= $count; ?> id-<?= $blog_id; ?>"
                                    style="width: 100%; margin-right: 40px; float: left; display: block;">
                                    <div class="flex-img">
                                        <div class="top-carousel-img">
                                            <img
                                                    width="270" height="423"
                                                    src="<?= $image ?>"
                                                    class="attachment-alpha-store-carousel size-alpha-store-carousel wp-post-image"
                                                    alt="<?= $meta_keyword; ?>"
                                                    draggable="false"></div>
                                        <div class="top-carousel-heading">
                                            <div class="top-carousel-title">
                                                <?= $blog_title; ?>
                                            </div>
                                            <!--                                        <div class="price">-->
                                            <!--                                            --><?//= $blog_title; ?>
                                            <!--                                        </div>-->
                                        </div>
                                        <div class="carousel-heading-hover">
                                            <div class="top-carousel-title-hover"><?= $blog_title; ?></div>
                                            <div class="top-carousel-excerpt">
                                            </div>
                                            <div class="price-hover">
                                            </div>
                                            <a rel="nofollow" href="<?= $blog_url; ?>"
                                               data-quantity="1" data-product_id="<?= $blog_id; ?>" data-product_sku=""
                                               class="button product_type_simple ajax_add_to_cart">อ่าน</a></div>
                                    </div>
                                </li>
                                <?php
                            }
                        }

                        ?>

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

    <div id='body-center' class="body-center container" style="    background: url(assets/images/bggold2.png) ;">

        <div class="container">

            <div class="col-xs-12 padding-0">
                <img width="100%" src="http://casa98-th.com/images/banner.png" alt="">
            </div>

            <div class="row-body-top row margin-0">
                <div class="col-sm-3 register-guild " style="padding: 20px; color: #4b2113;">
                    <p style="    font-size: 23px; font-weight: 500; text-decoration: underline;">ขั้นตอนการสมัคร</p>

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

                    <div class="col-xs-12 ">

                        </br>

                        <!--			//-----------------------  Google Doc form  ----------------------------------//-->
                        <style>
                            .input-register {
                                background-color: #fff !important;
                                float: none;
                                width: 100% !important;
                                border-radius: 10px;
                                color: #000;
                                min-height: 35px !important;
                            }

                            .field-input {
                                height: 20px !important;
                                min-height: 30px;
                                margin-bottom: 10px;
                            }

                            .btn-submit {
                                background-color: #36a929;
                                border-radius: 7px;
                                border: 0px;
                                height: 30px;
                            }

                            .input-medium-size {
                                width: 40% !important;
                            }

                            .label-control {
                                font-weight: 400;
                            }

                            .form-register {
                                padding: 10px;
                                /*border: 1px #fff solid;*/
                                border-radius: 10px;
                            }
                        </style>



                        <form id="register" target="_self" class="form-register" onsubmit=""
                              action="javascript: postContactToGoogle()">
                            <h2>สมัครสมาชิก</h2>
                            <fieldset class="field-input">
                                <input id="name" class="col-sm-10 input-register" type="text" name="name"
                                       placeholder="ชื่อ :">
                            </fieldset>
                            <fieldset class="field-input">
                                <input id="sname" class="col-sm-10 input-register" type="text" name="sname"
                                       placeholder="นามสกุล : ">
                            </fieldset>
                            <fieldset class="field-input">
                                <input id="phone-number" class="col-sm-10 input-register " type="text"
                                       name="phone-number" placeholder="เบอร์โทรศัพท์ : ">
                            </fieldset>
                            <fieldset class="field-input">
                                <input id="line-id" class="col-sm-10 input-register " type="text"
                                       name="Line-ID" placeholder="Line ID : ">
                            </fieldset>
                            <fieldset class="field-input">
                                <input id="email" class="col-sm-10 input-register" type="email" name="email"
                                       placeholder="E-mail : ">
                            </fieldset>

                            <fieldset class="field-input">
                                <div style="width: 100%; display: block; float: right;text-align: center;">
                                    <button id="register1" type="button" class="btn-submit">
                                        สมัครสมาชิก
                                    </button>

<!--                                    <button id="login1" type="button" class="btn-submit">-->
<!--                                        เข้าสู่ระบบ-->
<!--                                    </button>-->
                                </div>
                            </fieldset>

                            <div style="width: 100%; display: block; float: right; padding-top: 15px;">
                                <div class="requestSubmited" style="display:none; text-align: center;">Your request has
                                    been sent!
                                </div>
                            </div>
                        </form>

<!--                        <form id="login" target="_self" class="form-register" onsubmit=""-->
<!--                              action="javascript: postContactToGoogle()">-->
<!--                            <h2>เข้าสู่ระบบ</h2>-->
<!--                            <fieldset class="field-input">-->
<!--                                <input id="name" class="col-sm-10 input-register" type="text" name="name"-->
<!--                                       placeholder="ชื่อ :">-->
<!--                            </fieldset>-->
<!--                            <fieldset class="field-input">-->
<!--                                <input id="sname" class="col-sm-10 input-register" type="text" name="sname"-->
<!--                                       placeholder="นามสกุล : ">-->
<!--                            </fieldset>-->
<!--                            <fieldset class="field-input">-->
<!--                                <input id="phone-number" class="col-sm-10 input-register " type="text"-->
<!--                                       name="phone-number" placeholder="เบอร์โทรศัพท์ : ">-->
<!--                            </fieldset>-->
<!--                            <fieldset class="field-input">-->
<!--                                <input id="line-id" class="col-sm-10 input-register " type="text"-->
<!--                                       name="Line-ID" placeholder="Line ID : ">-->
<!--                            </fieldset>-->
<!--                            <fieldset class="field-input">-->
<!--                                <input id="email" class="col-sm-10 input-register" type="email" name="email"-->
<!--                                       placeholder="E-mail : ">-->
<!--                            </fieldset>-->
<!---->
<!--                            <fieldset class="field-input">-->
<!--                                <div style="width: 100%; display: block; float: right;text-align: center;">-->
<!--                                    <button id="register2" type="button" class="btn-submit">-->
<!--                                        สมัครสมาชิก-->
<!--                                    </button>-->
<!---->
<!--                                    <button id="login2" type="button" class="btn-submit">-->
<!--                                        เข้าสู่ระบบ-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </fieldset>-->
<!---->
<!--                            <div style="width: 100%; display: block; float: right; padding-top: 15px;">-->
<!--                                <div class="requestSubmited" style="display:none; text-align: center;">Your request has-->
<!--                                    been sent!-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->

                        <!--                                                <form id="form-register" class="form-register" method="post" name="form">-->
                        <!--                        -->
                        <!--                                                    <div class="display-none">-->
                        <!--                                                        <div class="col-xs-12">-->
                        <!--                                                            <input id="username" name="user"-->
                        <!--                                                                   class="form-control input-login-mobile username-input"-->
                        <!--                                                                   type="text" placeholder="username">-->
                        <!--                                                            <input id="password" name="pass"-->
                        <!--                                                                   class="form-control input-login-mobile mar-left-5 password-input"-->
                        <!--                                                                   type="password"-->
                        <!--                                                                   placeholder="password">-->
                        <!--                                                        </div>-->
                        <!--                                                        <div class="col-xs-12 text-center mar-top-21 ">-->
                        <!--                        -->
                        <!--                                                            <img src="https://www.casa98th.com/getCodeImage.php?main-mobile=1"-->
                        <!--                                                                 class="img-code-mobile">-->
                        <!--                        -->
                        <!--                                                            <input type="text" id="code" name="code" class="input-code-mobile"-->
                        <!--                                                                   placeholder="รหัส">-->
                        <!--                        -->
                        <!--                                                            <a href="#" class="btn-submit-mobile">-->
                        <!--                                                                <img class="btn-login-mobile"-->
                        <!--                                                                     src="https://www.casa98th.com/assets/img/btn-login.png"-->
                        <!--                                                                     alt="เข้าสู่ระบบ แทงบอล Casa98">-->
                        <!--                                                            </a>-->
                        <!--                                                        </div>-->
                        <!--                                                    </div>-->
                        <!--                        -->
                        <!--                                                </form>-->
                    </div>
                </div>
            </div>

            <div class="row-body-center row margin-0">

                <div class="col-xs-12 padding-0">
                    <img width="100%" src="http://casa98-th.com/images/banner.png" alt="">
                </div>

                <h1>Hilight</h1>

                <div class="col-xs-12 padding-0">

                    <?php

                    if (isset($hilights)) {
                        $count = 1;
                        foreach ($hilights as $items) {

                            $meta_keyword = 'การพนันออนไลน์';

                            $blog_id = $items['blog_id'];
                            $blog_url = base_url() . 'blog?blog_id=' . $items['blog_id'];
                            $blog_title = $items['blog_title'];

                            foreach ($items['hilights_info'] as $item) {
                                if ($item['field_type'] === 'date' && $item['field_id'] === 'date-shower') {
                                    $date_shower = $item['blog_value'];
                                }
                                if ($item['field_type'] === 'image' && $item['field_id'] === 'image') {
                                    $image = base_url() . 'admin/' . $item['blog_value'];
                                }
                            }
                            ?>

                            <div class="col-xs-3 padding-10">
                                <img width="100%" src="<?= $image; ?>"
                                     alt="<?= $this->Config_model->get_config_meta_keyword(); ?>">
                            </div>

                            <?php
                        }
                    }

                    ?>

                </div>

            </div>

            <div class="row-body-center row margin-0">

                <div class="col-xs-12 padding-0">
                    <img width="100%" src="http://casa98-th.com/images/banner.png" alt="">
                </div>

                <h1>CASA GUIDE</h1>

                <div class="col-xs-12 padding-0">

                    <?php

                    //                    var_dump($casa_guides);

                    if (isset($casa_guides)) {
                        $count = 1;
                        foreach ($casa_guides as $items) {

                            $meta_keyword = 'การพนันออนไลน์';

                            $blog_id = $items['blog_id'];
                            $blog_url = base_url() . 'blog?blog_id=' . $items['blog_id'];
                            $blog_title = $items['blog_title'];

                            foreach ($items['casa_guide_info'] as $item) {
                                if ($item['field_type'] === 'date' && $item['field_id'] === 'date-shower') {
                                    $date_shower = $item['blog_value'];
                                }
                                if ($item['field_type'] === 'image' && $item['field_id'] === 'image') {
                                    $image = base_url() . 'admin/' . $item['blog_value'];
                                }
                            }
                            ?>

                            <div class="col-xs-3 padding-10">
                                <img width="100%" src="<?= $image; ?>"
                                     alt="<?= $this->Config_model->get_config_meta_keyword(); ?>">
                            </div>

                            <?php
                        }
                    }

                    ?>
                </div>
            </div>

        </div>

    </div>

    <!--    <div class="col-xs-12 padding-0 float-none">-->
    <!--        <h1>Body</h1>-->
    <!---->
    <!--        <div class="top-area container-fluid">-->
    <!--            <div id="carousel-home" class="flexslider woocommerce">-->
    <!---->
    <!--                <div class="flex-viewport" style="overflow: hidden; position: relative;">-->
    <!--                    <ul class="slides products"-->
    <!--                        style="width: 1000%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">-->
    <!---->
    <!--                        --><?php
    //                        $count = 1;
    //                        foreach ($news as $items) {
    //
    //                            $meta_keyword = 'การพนันออนไลน์';
    //
    //                            $blog_id = $items['blog_id'];
    //                            $blog_url = base_url() . 'blog?blog_id=' . $items['blog_id'];
    //                            $blog_title = $items['blog_title'];
    //
    //                            foreach ($items['news_info'] as $item) {
    //                                if ($item['field_type'] === 'date' && $item['field_id'] === 'date-shower') {
    //                                    $date_shower = $item['blog_value'];
    //                                }
    //                                if ($item['field_type'] === 'image' && $item['field_id'] === 'image') {
    //                                    $image = base_url() . 'admin/' . $item['blog_value'];
    //                                }
    //                            }
    //                            ?>
    <!--                            <li class="carousel-item c-item---><? //= $count; ?><!-- id--->
    <? //= $blog_id; ?><!--"-->
    <!--                                style="width: 100%; margin-right: 40px; float: left; display: block;">-->
    <!--                                <div class="flex-img">-->
    <!--                                    <div class="top-carousel-img">-->
    <!--                                        <img width="270" height="423"-->
    <!--                                             src="--><? //= $image ?><!--"-->
    <!--                                             class="attachment-alpha-store-carousel size-alpha-store-carousel wp-post-image"-->
    <!--                                             alt="--><? //= $meta_keyword; ?><!--"-->
    <!--                                             draggable="false"></div>-->
    <!--                                    <div class="top-carousel-heading">-->
    <!--                                        <div class="top-carousel-title">-->
    <!--                                            --><? //= $blog_title; ?>
    <!--                                        </div>-->
    <!--<!--                                        <div class="price">-->-->
    <!--<!--                                            -->--><? ////= $blog_title; ?>
    <!--<!--                                        </div>-->-->
    <!--                                    </div>-->
    <!--                                    <div class="carousel-heading-hover">-->
    <!--                                        <div class="top-carousel-title-hover"><a-->
    <!--                                                href="--><? //= $blog_url; ?><!--"-->
    <!--                                                title="--><? //= $blog_title; ?><!--">-->
    <? //= $blog_title; ?><!--</a></div>-->
    <!--                                        <div class="top-carousel-excerpt">-->
    <!--                                        </div>-->
    <!--                                        <div class="price-hover">-->
    <!--                                        </div>-->
    <!--                                        <a rel="nofollow" href="--><? //= $blog_url; ?><!--"-->
    <!--                                           data-quantity="1" data-product_id="-->
    <? //= $blog_id; ?><!--" data-product_sku=""-->
    <!--                                           class="button product_type_simple ajax_add_to_cart">อ่าน</a></div>-->
    <!--                                </div>-->
    <!--                            </li>-->
    <!--                            --><?php
    //                        }
    //                        ?>
    <!---->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--                <ul class="flex-direction-nav">-->
    <!--                    <li class="flex-nav-prev"><a class="flex-prev flex-disabled" href="#"-->
    <!--                                                 tabindex="-1">Previous</a></li>-->
    <!--                    <li class="flex-nav-next"><a class="flex-next flex-disabled" href="#" tabindex="-1">Next</a>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!---->
    <!--    </div>-->

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

    $(document).on('click', '.btn-submit', function () {
        postContactToGoogle();
    });

    function postContactToGoogle() {
        var name = $('#name').val();
        var sname = $('#sname').val();
        var phonenumber = $('#phone-number').val();
        var lineid = $('#line-id').val();
        var email = $('#email').val();

        $.ajax({
//                url: "https://docs.google.com/forms/d/14OpOkDrn2Si--TjHP0AnJ_AxDUubFwSWL8bRh7IRYBA/formResponse",
//            url: "https://docs.google.com/forms/d/e/1FAIpQLSeaONiW_LSrFzAf7Q16BLGJ1Yey6Z-UGnhetbzaEcNT-7g27w/formResponse",
            url: "https://docs.google.com/forms/d/e/1FAIpQLScEh4FLc6-rndPb_RPJ0wS2gs-IvsDCRdSclR8vFRjGQ_KjaQ/formResponse",
            data: {
                'entry.497544943': name,
                'entry.1332461462': sname,
                'entry.945056523': phonenumber,
                'entry.64143949': lineid,
                'entry.454765789': email
            },
            type: "POST",
            dataType: "xml",
            statusCode: {
                0: function () {

                    $('#name').val('');
                    $('#sname').val('');
                    $('#phone-number').val('');
                    $('#line-id').val('');
                    $('#email').val('');
                },
                200: function () {
                    $('#name').val('');
                    $('#sname').val('');
                    $('#phone-number').val('');
                    $('#line-id').val('');
                    $('#email').val('');
                }
            }
        });

    }

</script>

<script>
    //    $(document).ready(function(){
    //        $("button").click(function(){
    //            $("#callus").toggle("slow");
    //        });
    //    });

//    $("#login1").click(function () {
//        $("#register").hide("slow");
//        $("#login").show("slow");
//
//    });

//    $("#register2").click(function () {
//
//        $("#register").show("slow");
//        $("#login").hide("slow");
//
//    });
</script>



















