<?php
if ($this->input->post('custom_load') === 'true') {
    $this->load->view($page);
    return;
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- ----------------------------------------- Header (Bundle) --------------------------------------------- -->
    <?php $this->load->view('layout/header.php') ?>
    <!-- -------------------------------------------- End Header ----------------------------------------------- -->
</head>
<body class="hold-transition skin-blue sidebar-mini"

<div class="wrapper">

    <!-- -------------------------------------------- Header Bar ----------------------------------------------- -->
    <header class="main-header">

        <a href="<?= base_url() ?>dashboard" class="logo" style="background-color: #000000;">
            <span class="logo-mini"><b>CST</b></span>
            <span class="logo-lg"><b></b>CASA98THAILAND</span>
        </a>
        <nav class="navbar navbar-static-top" style="background-color: #313131;">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span
                                class="hidden-xs"><?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="btn-logout" data-toggle="control-sidebar" alt="ออกจากระบบ"><i
                                class="fa  fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    <!-- -------------------------------------------- End Header Bar ------------------------------------------ -->


    <!-- ------------------------------------------------Marquee ------------------------------------------------ -->
    <div class="marquee-casabet">
        <marquee>
            <p class="text-marquee">!!! ยินดีต้อนรับเข้าสู่ Casa98thailand เว็บแทงหวยออนไลน์ ที่ราคาดีที่สุด </p>
        </marquee>
    </div>
    <!-- --------------------------------------------- End Marquee ---------------------------------------------- -->

    <aside class="main-sidebar">
        <?php $this->load->view('layout/slide-navigation.php'); ?>
    </aside>

    <!-- ---------------------------------------------  Content ------------------------------------------------ -->
    <div id='container-custom-load-page' class="content-wrapper" style="background-color: #FFFFFF;">
        <?php $this->load->view($page); ?>
    </div>
    <!-- ---------------------------------------------  Content ------------------------------------------------ -->

    <!-- ---------------------------------------------  Footer ------------------------------------------------ -->
    <footer class="main-footer">

        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://casabet.in.th/">Casabet.in.th</a>.</strong> All rights
        reserved.

        <?php $this->load->view('layout/footer.php') ?>
    </footer>
    <!-- ---------------------------------------------  End Footer ------------------------------------------------ -->

    <div class="control-sidebar-bg"></div>

</div>

</body>

</html>
