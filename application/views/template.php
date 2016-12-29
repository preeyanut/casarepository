<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--	---------------------  Config Web Default ------------------------>

<!--    --><?php //echo var_dump($this->Config_model->get_config_title()) ; ?>
    <title><?= $this->Config_model->get_config_webname() ?></title>

    <meta name="keywords" content="<?= $this->Config_model->get_config_meta_keyword(); ?>">
    <meta name="description" content="<?= $this->Config_model->get_config_meta_description(); ?>">

    <!--	<meta property="fb:app_id" content="188156604980369">-->
    <meta property="og:type" content="website">
    <meta property="og:title" content="เว็บตรงสู่ Casa98th แทงบอล ออนไลน์ ราคาบอล ราคาหวย ดีสุด">
    <meta property="og:description" content="แทงบอลออนไลน์,ราคาบอล,ราคาหวย">
    <meta property="og:image" content="">
    <meta property="og:url" content="">

    <link rel="icon" href="<?= $this->Config_model->get_config_favicon_image(); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= $this->Config_model->get_config_favicon_image(); ?>" type="image/x-icon">

    <!--	----------------------------  Google Analytic ------------------------------>

    <!--	<script>-->
    <!--		(function (i, s, o, g, r, a, m) {-->
    <!--			i['GoogleAnalyticsObject'] = r;-->
    <!--			i[r] = i[r] || function () {-->
    <!--					(i[r].q = i[r].q || []).push(arguments)-->
    <!--				}, i[r].l = 1 * new Date();-->
    <!--			a = s.createElement(o),-->
    <!--				m = s.getElementsByTagName(o)[0];-->
    <!--			a.async = 1;-->
    <!--			a.src = g;-->
    <!--			m.parentNode.insertBefore(a, m)-->
    <!--		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');-->
    <!---->
    <!--		ga('create', 'UA-81613388-1', 'auto');-->
    <!--		ga('send', 'pageview');-->
    <!---->
    <!--	</script>-->


<!--    -------------------------------------  Facebook Setting  --------------------------------------->
<!--    <div id="fb-root" class=" fb_reset">-->
<!--        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">-->
<!--            <div>-->
<!--                <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true"-->
<!--                        scrolling="no" id="fb_xdm_frame_https" aria-hidden="true"-->
<!--                        title="Facebook Cross Domain Communication Frame" tabindex="-1"-->
<!--                        src="https://staticxx.facebook.com/connect/xd_arbiter/r/iPrOY23SGAp.js?version=42#channel=f30eca5dcee1314&amp;origin=https%3A%2F%2Fwww.casa98th.com"-->
<!--                        style="border: none;"></iframe>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">-->
<!--            <div></div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <script>-->
<!---->
<!--        var get_next = "";-->
<!--        var get_previous = "";-->
<!--        var invitable_friends = [];-->
<!--        var friend_token = [];-->
<!--        var friend_id = [];-->
<!--        var str_facebook_token = "";-->
<!--        var main_list_friend = [];-->
<!--        var container_image = [];-->
<!--        var container_name = [];-->
<!---->
<!--        (function (d, s, id) {-->
<!--            var js, fjs = d.getElementsByTagName(s)[0];-->
<!--            if (d.getElementById(id)) return;-->
<!--            js = d.createElement(s);-->
<!--            js.id = id;-->
<!--            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=188156604980369";-->
<!--            fjs.parentNode.insertBefore(js, fjs);-->
<!--        }(document, 'script', 'facebook-jssdk'));-->
<!---->
<!--        // This is called with the results from from FB.getLoginStatus().-->
<!--        function statusChangeCallback(response) {-->
<!--            console.log('statusChangeCallback');-->
<!--            console.log(response);-->
<!--            if (response.status === 'connected') {-->
<!--                // Logged into your app and Facebook.-->
<!--//            facebook_login();-->
<!--            } else if (response.status === 'not_authorized') {-->
<!--            } else {-->
<!--            }-->
<!--        }-->
<!--    </script>-->

    <?php $this->load->view('layout/header'); ?>
</head>
<body>

<style>

    @font-face {
        font-family: 'Sukhumvit Set';
        src: url("../fonts/SukhumvitSet-SemiBold.eot");
        src: url("../fonts/SukhumvitSet-SemiBold.eot?#iefix") format("embedded-opentype"), url("../fonts/SukhumvitSet-SemiBold.woff2") format("woff2"), url("../fonts/SukhumvitSet-SemiBold.woff") format("woff"), url("../fonts/SukhumvitSet-SemiBold.ttf") format("truetype"), url("../fonts/SukhumvitSet-SemiBold.svg#SukhumvitSet-SemiBold") format("svg");
        font-weight: 600;
        font-style: normal;
    }

    @font-face {
        font-family: 'Sukhumvit Set';
        src: url("../fonts/SukhumvitSet-Medium.eot");
        src: url("../fonts/SukhumvitSet-Medium.eot?#iefix") format("embedded-opentype"), url("../fonts/SukhumvitSet-Medium.woff2") format("woff2"), url("../fonts/SukhumvitSet-Medium.woff") format("woff"), url("../fonts/SukhumvitSet-Medium.ttf") format("truetype"), url("../fonts/SukhumvitSet-Medium.svg#SukhumvitSet-Medium") format("svg");
        font-weight: 500;
        font-style: normal;
    }

    @font-face {
        font-family: 'Sukhumvit Set';
        src: url("../fonts/SukhumvitSet-Text.eot");
        src: url("../fonts/SukhumvitSet-Text.eot?#iefix") format("embedded-opentype"), url("../fonts/SukhumvitSet-Text.woff2") format("woff2"), url("../fonts/SukhumvitSet-Text.woff") format("woff"), url("../fonts/SukhumvitSet-Text.ttf") format("truetype"), url("../fonts/SukhumvitSet-Text.svg#SukhumvitSet-Text") format("svg");
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Sukhumvit Set';
        src: url("../fonts/SukhumvitSet-Thin.eot");
        src: url("../fonts/SukhumvitSet-Thin.eot?#iefix") format("embedded-opentype"), url("../fonts/SukhumvitSet-Thin.woff2") format("woff2"), url("../fonts/SukhumvitSet-Thin.woff") format("woff"), url("../fonts/SukhumvitSet-Thin.ttf") format("truetype"), url("../fonts/SukhumvitSet-Thin.svg#SukhumvitSet-Thin") format("svg");
        font-weight: 100;
        font-style: normal;
    }

    @font-face {
        font-family: 'Sukhumvit Set';
        src: url("../fonts/SukhumvitSet-Bold.eot");
        src: url("../fonts/SukhumvitSet-Bold.eot?#iefix") format("embedded-opentype"), url("../fonts/SukhumvitSet-Bold.woff2") format("woff2"), url("../fonts/SukhumvitSet-Bold.woff") format("woff"), url("../fonts/SukhumvitSet-Bold.ttf") format("truetype"), url("../fonts/SukhumvitSet-Bold.svg#SukhumvitSet-Bold") format("svg");
        font-weight: bold;
        font-style: normal;
    }

    @font-face {
        font-family: 'Sukhumvit Set';
        src: url("SukhumvitSet-Light.eot");
        src: url("SukhumvitSet-Light.eot?#iefix") format("embedded-opentype"), url("SukhumvitSet-Light.woff2") format("woff2"), url("SukhumvitSet-Light.woff") format("woff"), url("SukhumvitSet-Light.ttf") format("truetype"), url("SukhumvitSet-Light.svg#SukhumvitSet-Light") format("svg");
        font-weight: 300;
        font-style: normal;
    }

    @font-face {
        font-family: 'Supermarket';
        src: url("../fonts/supermarket.ttf");
        font-style: normal;
    }

    body {
        font-family: "Supermarket" !important;
    }
    
    .body-container {
        /*border: 1px solid #ff0000;*/
    }

    body {
        margin: 0px;
        background-image: url(https://www.casa98th.com/assets/css/../img/new-bg.jpg);
        /* background-repeat: no-repeat; */
        /* background-position: top center; */
        background-size: 950px 671px;
    }

    footer {
        padding: 10px;
        /*background-image: url(https://www.casa98th.com/assets/css/../img/main-nav-bg2.jpg);*/
        /*background-image: url(assets/images/bggold3.png) center repeat;*/
        background: url(assets/images/bggold3.png) center repeat;
        /*background-repeat: no-repeat;*/
        /*background-size: 100% ;*/
        background-size: 700px;
    }
</style>
<div id="container" class="body-container">
    <?php $this->load->view($page); ?>
</div>

</body>
<footer>
    <?php $this->load->view('layout/footer'); ?>
</footer>
</html>