<div id="header" class="header">

    <!--	--------------------------------------------  CSS ------------------------------------------------->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css">
    <!--	-------------------------------------------- End CSS ------------------------------------------------->

    <!--	--------------------------------------------  Javascript  ------------------------------------------------->

    <script href="<?= base_url(); ?>assets/javascript/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>

    <!--	-------------------------------------------- End Javascript ------------------------------------------------->

    <style>
        body {

        }

        .container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;

            padding: 0px;

            /*background-color: #ff0000;*/
        :;
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }

        .header-navigation {
            text-align: center;
            /*background-color: #ffe300;*/
            border: 1px solid #ff0000;

            min-height: 40px;
            border-width: 0;
            text-align: center;
            background-color: #8d6525;
            /* background-image: url(https://www.casa98th.com/assets/css/../img/layout/main-nav-bg.png); */
            background-image: url(https://www.casa98th.com/assets/css/../img/main-nav-bg2.jpg);
            /* background-repeat: no-repeat; */
            background-position: top center;

        }

        .header-top {
            width: 100%;
            /*height: 150px;*/
            height: 120px;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .text-center {
            text-align: center;
        }

        .link-page{
            height: 100%;
            line-height: 2;
            font-size: 20px;
        }
        .link-page a{
            color: #000;
        }

    </style>

    <div id='header-top' class="header-top">
        <div class="container">
            <div id='header-top-left' class="header-top-left col-md-6 padding-0 float-left">
                <img width="356" height="100" style="display: block !important;"
                     src="<?= base_url().'admin/'.$this->Config_model->get_config_logo_image() ?>" alt="<?= $this->Config_model->get_config_meta_keyword() ?>">
            </div>
            <div id='header-top-right' class="header-top-right col-md-6 padding-0 float-right text-center">

                <div style="clear: both;margin-top: 20px;">
                    <img src="https://www.casa98th.com/assets/img/layout/the-exclusive-society.png"
                         alt="<?= $this->Config_model->get_config_meta_keyword() ?>">
                </div>

                <div>
                    <img src="https://www.casa98th.com/assets/img/layout/divider.png" alt="<?= $this->Config_model->get_config_meta_keyword() ?>">
                </div>

                <div style="margin-top: 5px;">
                    <a href="https://line.me/ti/p/%40casa98th" class="pull-left"><img
                            src="https://www.casa98th.com/assets/img/layout/line-id.png" alt="line id @casa98th"></a>
                    <a href="#" class="pull-right"
                       style="margin-left: 10px"><img src="https://www.casa98th.com/assets/img/layout/call.png"
                                                      alt="โทรแทงบอล 088-777-7762"></a>
                </div>

            </div>
        </div>
    </div>

    <div id='header-navigation' class="header-navigation">

        <div class="container">

            <div class=" padding-0 link-page" style="width: <?php echo 100/ (sizeof($navigation)+1); ?>%;float: left">
                <a href="<?= base_url(); ?>" >
                   หน้าหลัก
                </a>
            </div>

            <?php
            foreach($navigation as $item){
                ?>
                <div class="padding-0 link-page" style="width: <?php echo 100/ (sizeof($navigation)+1); ?>%;float: left">
                    <a href="<?= base_url(); ?>blog?blog_id=<?= $item['blog_id']?>" >
                        <?= $item['blog_title']?>
                    </a>
                </div>
            <?php
            }
            ?>

        </div>
    </div>


</div>
