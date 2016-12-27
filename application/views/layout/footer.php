<div id="footer" class="footer">

    <style>
        .footer {
            /*background-color: #532300;*/
            /*border: 1px solid #ff0000;*/
            font-size: 23px;
        }

        .footer-fa {
            font-size: 50px;
            margin-left: 20px;
        }

        .footer-center {
            text-align: left;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }

        .fa-facebook-square {
            /*color: #0275D8;*/
            color: #ffffff;
        }

        .fa-google-plus-square {
            /*color: #DB4F42;*/
            color: #ffffff;
        }

        .fa-instagram {
            /*color: #853B90;*/
            color: #ffffff;
        }

        .fa-youtube-play {
            /*color: #C61C20;*/
            color: #ffffff;
        }

        .fa-twitter-square {
            /*color: #C61C20;*/
            color: #ffffff;
        }


        .footer-bottom {
            text-align: left;
        }

        .footer .container {
            font-weight: 500;
        }

        .padding-0 {
            padding: 0px !important;
        }

    </style>

    <div class="container" style="">

        <div class="col-sm-4 footer-left padding-0" style="color:#ffffff">
            <div class="copyright">2016 <?= $this->Config_model->get_config_webname() ?>. All rights reserved.</div>
        </div>

        <div class="col-sm-8  footer-right padding-0">

            <a href="<?= $this->Config_model->get_contact_facebook() ?>" class="fb  padding-0" target="_blank">
                <i class="footer-fa fa fa-facebook-square "></i>
            </a>

            <a href="<?= $this->Config_model->get_contact_googleplus() ?>" class="gb " target="_blank">
                <i class="footer-fa fa fa-google-plus-square "></i>
            </a>

            <a href="<?= $this->Config_model->get_contact_instagram() ?>" class="ig " target="_blank">
                <i class="footer-fa fa fa-instagram "></i>
            </a>

            <a href="<?= $this->Config_model->get_contact_youtube() ?>" class="yt " target="_blank">
                <i class="footer-fa fa fa-youtube-play  "></i> </a>

            <a href="<?= $this->Config_model->get_contact_twitter() ?>" class="tw " target="_blank">
                <i class="footer-fa fa fa-twitter-square  "></i> </a>


        </div>

        <div class="row" style="color:#4b2113">
            <div class="col-sm-8 footer-bottom ">
                <div itemscope="" itemtype="http://schema.org/Person">
                    <span itemprop="name">แทงบอลออนไลน์ </span>
                    <span itemprop="company"><?= $this->Config_model->get_config_webname() ?> Company</span>
                    <a itemprop="telephone" href="tel://<?= $this->Config_model->get_contact_telephone() ?>"><span
                            itemprop="tel"><?= $this->Config_model->get_contact_telephone() ?></span></a>
                    <a itemprop="email"
                       href="mailto:<?= $this->Config_model->get_contact_email() ?>"><?= $this->Config_model->get_contact_email() ?></a>
                </div>
            </div>

            <div class="col-sm-4 footer-right">
                <div class="copyright"> Power by <?= $this->Config_model->get_config_webname() ?> Team.</div>
            </div>
        </div>
    </div>


</div>
