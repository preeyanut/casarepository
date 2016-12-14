<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Casa Register</title>
    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style-switcher.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/flaticon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/css_ajax.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.datetimepicker.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"><!-- font icon-->
    <script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <script id="moneyScript" src="<?= base_url() ?>assets/js/jquery.maskMoney.min.js"></script>


    <!-- Tell the browser to be responsive to screen width -->

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/AdminLTE.min.css">
    <!-- Main style -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/main.css">
    <!-- <link rel="stylesheet" href="assets/css/main.css">-->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/iCheck/flat/blue.css">

    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="plugins/morris/morris.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <div id="annual"></div>
    <![endif]-->

    <!-- p'jef custom style -->
    <style>
        .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 1px solid #b3b3b3 !important;
        }

        .table thead {
            background-color: #ceebff;
            font-size: 16px;
            font-weight: bold;
        }

        .marquee-casabet {
            /*margin-top: 50px;*/
            /*position: fixed;*/
            background: -webkit-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
            background: -o-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
            background: -moz-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
            background: linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
            width: 100%;
            height: 35px;
        }

        .text-marquee {
            color: #e01b1b;
            font-size: 17px;
            line-height: 2;
            /*font-weight: 700;*/
        }

        .text-disable{
            color: #8a0004;
        }

    </style>
    <script>
        function removeTagMoneyScript() {
            $("#moneyScript").remove();
        }

        function addTagMoneyScript() {
            var head = document.getElementsByTagName('head')[0];
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = '<?= base_url() ?>assets/js/jquery.maskMoney.min.js';
            script.id = "moneyScript";
            head.appendChild(script);
        }

        var customPageData = false;
        function init_event(data) {
            addTagMoneyScript();
            customPageData = data;
            format_to_money();
            label_format_number();
            if (data.controlerPaging) {
                get_paging(data.controlerPaging);
            }
            //$('.input-number').maskMoney();
            if (customPageData.fn) {
                for (var t = 0; t < customPageData.fn.length; t++) {
                    customPageData.fn[t]();
                }
            }
            if (!data.notMaskMoney) {
                $('.input-number').maskMoney();
            }
        }

        function removeInitEvent() {
            //// do here ////
            if (typeof customPageData.disEvent != 'undefined') {
                for (var i = 0; i < customPageData.disEvent.length; i++) {
                    var data = customPageData.disEvent[i].split(',');
                    $(document).off(data[0], data[1]);
                }
            }
        }

        function format_to_money() {
            var input_type_number = $('.input-number');
            for (var i = 0; i < input_type_number.length; i++) {
                var intValue = Number(input_type_number[i].value);
                $('.input-number')[i].value = formatNumber(intValue);
            }
        }

        function label_format_number() {
            var label_type_number = $(".label-number");
            for (var i = 0; i < label_type_number.length; i++) {
                var intValue = Number(label_type_number[i].innerHTML.trim());
                $(".label-number")[i].innerHTML = formatNumber(intValue);
            }
        }

        function formatNumber(number) {
            var p = number.toFixed(2).split(".");
            var minus = p[0].substring(0, 1);
            if (minus == "-") {
                p[0] = p[0].substring(1, p[0].length);
                return "-" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
                        return number + (i && !(i % 3) ? "," : "") + acc;
                    }, "") + "." + p[1];
            }
            else {
                return "" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
                        return number + (i && !(i % 3) ? "," : "") + acc;
                    }, "") + "." + p[1];
            }
        }

        $(document).on("keyup", "#input-search", function () {
            search_user();
            get_paging(customPageData.controlerPaging);
        });

        $(document).on("change", "#filter-number", function () {
            $("#filter-page").val(0);
            search_user();
            get_paging(customPageData.controlerPaging);
        });

        $(document).on("change", "#filter-user-status", function () {
            $("#filter-page").val(0);
            search_user();
            get_paging(customPageData.controlerPaging);
        });

        $(document).on("change", "#filter-user-group", function () {
            $("#filter-page").val(0);
            search_user();
            get_paging(customPageData.controlerPaging);
        });

        function get_paging(urls) {
            var txtSearch = $("#input-search").val();
            var filterNumber = $("#filter-number").val();
            var filterPage = $("#filter-page").val();
            var filterStatus = $("#filter-user-status").val();
            var filterUserGroup = $("#filter-user-group").val();
            $.ajax({
                url: '<?php echo base_url(); ?>' + urls,
                type: 'post',
                data: "txtSearch=" + txtSearch + "&filter-number=" + filterNumber + "&filter-page=" + filterPage + "&filter-user-status=" + filterStatus + "&filter-user-group=" + filterUserGroup,
                dataType: 'json',
                crossDomain: true,
                beforeSend: function () {
                },
                complete: function () {
                },
                success: function (json) {
                    var data = json.Data;
                    var paging = data["paging"];
                    $(".container-paging").empty();
                    for (var i = 1; i <= paging; i++) {
                        var html = "<li><a class='paging' href='#' id='page" + i + "'>" + i + "</a></li>";
                        $(".container-paging").append(html);
                    }
                    $("#page1").css("background-color", "#eeeeee");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }

        $(document).on("click", ".paging", function () {
            var page_number = this.id.replace("page", "");
            $(".paging").css("background-color", "#ffffff");
            var max_page = $('.container-paging').find('li').length;
            var current_page = $("#filter-page").val();
            if (current_page == 0) {
                current_page = 1;
            }
            if (page_number == "-1" && current_page > 1) {
                $("#filter-page").val(current_page - 1);
                $("#page" + (current_page - 1)).css("background-color", "#eeeeee");
            } else if (page_number == "+1" && current_page < max_page) {
                $("#filter-page").val(Number(current_page) + 1);
                $("#page" + (Number(current_page) + 1)).css("background-color", "#eeeeee");
            } else if (page_number != "-1" && page_number != "+1") {
                $("#filter-page").val(page_number);
                $("#page" + page_number).css("background-color", "#eeeeee");
            } else {
                $("#page" + (Number(current_page))).css("background-color", "#eeeeee");
            }
            customPageData.functionPaging();
        });

        $(document).on("focusout", "#tbody-user input", function () {
            customPageData.focusOut(this);
        });


        $(document).on("change", ".my_percent", function () {
            var tr_id = $(this).closest("tr")[0].id;
            console.log($(this).closest("tr")[0].id);
            var value = Number(this.value.replace(",", ""));
            var min_value = Number(this.min);
            var max_value = Number(this.max);
            if (value > max_value) {
                this.value = formatNumber(max_value);
                alert("แบ่งได้สูงสุดได้ : " + max_value);
            }
            if (value < min_value) {
                this.value = formatNumber(min_value);
                alert("แบ่งต่ำสุดได้ : " + min_value);
            }
            var lotto_type_id = this.id.replace("my_percent", "");
            var percent = max_value - Number(this.value);
            $("#" + tr_id + " #sub_percent" + lotto_type_id).val(formatNumber(percent));
            var user_id = tr_id.replace("user_id", "");
            do_change_percent(this, user_id, lotto_type_id, this.value, percent);
        });

        $(document).on("change", ".sub_percent", function () {
            var tr_id = $(this).closest("tr")[0].id;

            var value = Number(this.value.replace(/,/g, ""));
            var min_value = Number(this.min);
            var max_value = Number(this.max);
            if (value > max_value) {
                this.value = formatNumber(max_value);
                alert("แบ่งสายล่างได้สูงสุดได้ : " + max_value);
            }
            if (value < min_value) {
                this.value = formatNumber(min_value);
                alert("แบ่งสายล่างต่ำสุดได้ : " + min_value);
            }
            var lotto_type_id = this.id.replace("sub_percent", "");
            var percent = max_value - Number(this.value);
            $("#" + tr_id + " #my_percent" + lotto_type_id).val(formatNumber(percent));
            var user_id = tr_id.replace("user_id", "");
            do_change_percent(this, user_id, lotto_type_id, percent, this.value);
        });
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini"

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= base_url() ?>dashboard" class="logo" style="background-color: #000000;">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>CSB</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b></b>Casabet</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" style="background-color: #313131;">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!--                    <li class="dropdown notifications-menu">-->
                    <!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                    <!--                            <i class="fa fa-bell-o"></i>-->
                    <!--                            <span class="label label-danger">0</span>-->
                    <!--                        </a>-->
                    <!--                        <ul class="dropdown-menu">-->
                    <!--                            <li class="header">You have 10 notifications</li>-->
                    <!--                            <li>-->
                    <!--                                <!-- inner menu: contains the actual data -->-->
                    <!--                                <ul class="menu">-->
                    <!--                                    <li>-->
                    <!--                                        <a href="#">-->
                    <!--                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today-->
                    <!--                                        </a>-->
                    <!--                                    </li>-->
                    <!--                                    <li>-->
                    <!--                                        <a href="#">-->
                    <!--                                            <i class="fa fa-users text-red"></i> 5 new members joined-->
                    <!--                                        </a>-->
                    <!--                                    </li>-->
                    <!--                                </ul>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                    <!-- Tasks: style can be found in dropdown.less -->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--                            <img src="-->
                            <?php //echo $this->session->userdata('image'); ?><!--" class="user-image" alt="User Image">-->

                            <i class="fa fa-user"></i>
                            <!--                            <span class="hidden-xs">Alexander Pierce</span>-->
                            <span
                                    class="hidden-xs"><?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'); ?></span>

                        </a>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="" class="btn-logout" data-toggle="control-sidebar" alt="ออกจากระบบ"><i
                                    class="fa  fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="marquee-casabet">
        <marquee>
            <p class="text-marquee">!!! ยินดีต้อนรับเข้าสู่ Casabet เว็บแทงหวยออนไลน์ ที่ราคาดีที่สุด </p></marquee>
    </div>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <?php

        $query = $this->db->query("select user_group.permission  FROM user "
            . "    inner join user_group on user.user_group_id = user_group.user_group_id "
            . " WHERE user.user_id in (" . $this->session->userdata("user_id") . ")"
        );
        $get_permission = json_decode($query->result_array()[0]["permission"]);
        $access_permission = $get_permission->access;
        ?>

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image" style="color: #ffffff;">
                    <!--                    <i class="fa fa-user"></i>-->
                    <!--                    <img src="-->
                    <?php //echo $this->session->userdata('image'); ?><!--" class="img-circle" alt="User Image">-->
                </div>
                <div class="pull-left " style="color: #ffffff;">

                    <p><?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <!--            <form action="#" method="get" class="sidebar-form">-->
            <!--                <div class="input-group">-->
            <!--                    <input type="text" name="q" class="form-control" placeholder="Search...">-->
            <!--              <span class="input-group-btn">-->
            <!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
            <!--                </button>-->
            <!--              </span>-->
            <!--                </div>-->
            <!--            </form>-->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->


            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?= base_url() ?>dashboard">
                        <i class="fa  fa-home"></i> <span>หน้าหลัก</span>
                        <small class="label pull-right bg-red"></small>
                    </a>
                </li>

                <!--                --><?php
                //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                //                    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-image-o"></i>
                        <span>แบนเนอร์</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>banner"><i class="fa fa-circle-o"></i> แบนเนอร์ทั้งหมด</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>banner/getForm"><i class="fa fa-circle-o"></i> เพิ่มแบนเนอร์ใหม่</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                        <!--                            <li><a href="-->
                        <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                        <!--                            </li>-->
                        <!--                        --><?php //} ?>
                    </ul>
                </li>

                <!--                --><?php //} ?>

                <!--                --><?php
                //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                //                    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-columns"></i>
                        <span>บล็อก</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>blog"><i class="fa fa-circle-o"></i> บล็อกทั้งหมด</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>blog/get_form"><i class="fa fa-circle-o"></i> เพิ่มบล็อกใหม่</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                        <!--                            <li><a href="-->
                        <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                        <!--                            </li>-->
                        <!--                        --><?php //} ?>
                    </ul>
                </li>

                <!--                --><?php //} ?>


                <!--                --><?php
                //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                //                    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-navicon"></i>
                        <span>หมวดหมู่</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>category"><i class="fa fa-circle-o"></i> หมวดหมู่ทั้งหมด</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>category/get_form"><i class="fa fa-circle-o"></i> เพิ่มหมวดหมู่ใหม่</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                        <!--                            <li><a href="-->
                        <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                        <!--                            </li>-->
                        <!--                        --><?php //} ?>
                    </ul>
                </li>
                <!--                --><?php //} ?>

                <!--                --><?php
                //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                //                    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="	fa fa-list"></i>
                        <span>ประเภทหมวดหมู่</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>category_type"><i class="fa fa-circle-o"></i> ประเภททั้งหมด</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>category_type/get_form"><i class="fa fa-circle-o"></i> เพิ่มประเภทใหม่</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                        <!--                            <li><a href="-->
                        <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                        <!--                            </li>-->
                        <!--                        --><?php //} ?>
                    </ul>
                </li>

                <!--                --><?php //} ?>


                <!--                --><?php
                //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                //                    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dollar"></i>
                        <span>รายการธนาคาร</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>bank_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>bank_list/getForm"><i class="fa fa-circle-o"></i>
                                เพิ่มรายการใหม่</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                        <!--                            <li><a href="-->
                        <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                        <!--                            </li>-->
                        <!--                        --><?php //} ?>
                    </ul>
                </li>
                <!--                --><?php //} ?>

                <!--                --><?php
                //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                //                    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-play-circle-o"></i>
                        <span>Live Stream</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>blog/blog_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>blog_list/getForm"><i class="fa fa-circle-o"></i> เพิ่มรายการใหม่</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                        <!--                            <li><a href="-->
                        <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                        <!--                            </li>-->
                        <!--                        --><?php //} ?>
                    </ul>
                </li>
                <!--                --><?php //} ?>

                <!--                --><?php
                //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                //                    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-chain"></i>
                        <span>Link</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>blog/blog_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                        <li><a href="<?= base_url(); ?>link_stream/get_form"><i class="fa fa-circle-o"></i> เพิ่มรายการใหม่</a>
                        </li>
                        <!--                        --><?php //} ?>
                        <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                        <!--                            <li><a href="-->
                        <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                        <!--                            </li>-->
                        <!--                        --><?php //} ?>
                    </ul>
                </li>
                <!--                --><?php //} ?>

                <?php
                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>บัญชีของฉัน</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array("my_balance", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>my_balance"><i class="fa fa-circle-o"></i> My Balance</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("change_password", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>change_password"><i class="fa fa-circle-o"></i>
                                        เปลี่ยนรหัสผ่าน</a></li>
                            <?php } ?>

                        </ul>
                    </li>
                <?php } ?>
                <?php
                if (in_array("buy_lotto", $access_permission) || in_array("view_ticket", $access_permission) || in_array("change_password", $access_permission)) {
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i>
                            <span>หวย</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array("buy_lotto", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>buy_lotto"><i class="fa fa-circle-o"></i> ซื้อหวย</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("view_ticket", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>view_ticket"><i class="fa fa-circle-o"></i> รายการที่ซื้อ</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("change_password", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>

                <?php

                if (in_array("user", $access_permission) || in_array("list_user", $access_permission)) {
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>รายการสมาชิก</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array("user", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>user"><i class="fa fa-user-plus"></i> เพื่มสมาชิก</a></li>
                            <?php } ?>
                            <?php if (in_array("list_user", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>list_user"><i class="fa fa-circle-o"></i>
                                        แอดมินทั้งหมด</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("customer", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>customer"><i class="fa fa-user-plus"></i> เพิ่มลูกค้า</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("list_customer", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>list_customer"><i class="fa fa-circle-o"></i>
                                        ลูกค้าทั้งหมด</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php
                if (in_array("user_group", $access_permission) || in_array("credit", $access_permission)
                    || in_array("commission", $access_permission)
                    || in_array("reward", $access_permission)
                    || in_array("percent", $access_permission)
                    || in_array("clear_credit", $access_permission)
                ) {

                    ?>

                    <li class="treeview">

                        <a href="#">
                            <i class="fa fa-sliders"></i>
                            <span>จัดการสมาชิก</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array("user_group", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>user_group"><i class="fa fa-circle-o"></i>
                                        จัดกลุ่มสมาชิก</a></li>
                            <?php } ?>
                            <?php if (in_array("credit", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>credit"><i class="fa fa-circle-o"></i>
                                        จัดการเครดิต</a></li>
                            <?php } ?>
                            <?php if (in_array("commission", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>commission"><i class="fa fa-circle-o"></i>
                                        จัดการคอมมิชชั่น</a></li>
                            <?php } ?>
                            <?php if (in_array("reward", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>reward"><i class="fa fa-circle-o"></i>
                                        จัดการรางวัล</a></li>
                            <?php } ?>
                            <?php if (in_array("percent", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>percent"><i class="fa fa-circle-o"></i>
                                        จัดการเปอร์เซ็น</a></li>
                            <?php } ?>
                            <?php if (in_array("clear_credit", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>clear_credit"><i class="fa fa-circle-o"></i>
                                        จัดการยอดคงค้าง</a></li>
                            <?php } ?>
                        </ul>

                    </li>

                    <li class="treeview">
                        <a href="<?= base_url(); ?>config/get_form">
                            <i class="fa fa-gear"></i>
                            <span>ตั้งค่าเว็บ</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?= base_url(); ?>config_group/get_form">
                            <i class="fa fa-gears"></i>
                            <span>ขั้นสูง</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-hdd-o"></i>
                            <span>Log</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                    </li>

                <?php } ?>
                <?php
                if (in_array("report_estimate_profit", $access_permission)
                    || in_array("report_bet_user", $access_permission)
                    || in_array("report_bet_lotto_type", $access_permission)
                    || in_array("report_bet_lotto", $access_permission)
                    || in_array("report_result_user", $access_permission)
                    || in_array("report_result_lotto", $access_permission)
                    || in_array("report_bet_lotto_user", $access_permission)
                ) {
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i>
                            <span>รายงาน</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                        <ul class="treeview-menu">

                            <?php if (in_array("report_estimate_profit", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>report_estimate_profit"><i class="fa fa-circle-o"></i>
                                        รายงานรายได้ที่คาดคะเน</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("report_bet_user", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>report_bet_user"><i class="fa fa-circle-o"></i>
                                        รายงานสรุปยอดรายบุคคล</a></li>
                            <?php } ?>
                            <?php if (in_array("report_bet_lotto_type", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>report_bet_lotto_type"><i class="fa fa-circle-o"></i>
                                        รายงานสรุปยอดชนิดหมายเลข</a></li>
                            <?php } ?>
                            <?php if (in_array("report_bet_lotto", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>report_bet_lotto"><i class="fa fa-circle-o"></i>
                                        รายงานสรุปยอดตามหมายเลข</a></li>
                            <?php } ?>
                            <?php if (in_array("report_result_user", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>report_result_user"><i class="fa fa-circle-o"></i>
                                        รายงานได้เสียรายบุคคล</a></li>
                            <?php } ?>
                            <?php if (in_array("report_result_lotto_type", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>report_result_lotto_type"><i class="fa fa-circle-o"></i>
                                        รายงานได้เสียชนิดหมายเลข</a></li>
                            <?php } ?>
                            <?php if (in_array("report_bet_lotto_user", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>report_bet_lotto_user"><i class="fa fa-circle-o"></i>
                                        รายงานการแทงตามหมายเลข</a></li>
                            <?php } ?>

                            <?php if (in_array("report_same_as", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>report_same_as"><i class="fa fa-circle-o"></i>
                                        รายงานการแทงรายบุคคล</a></li>
                            <?php } ?>

                        </ul>
                    </li>
                <?php } ?>
                <?php
                if (in_array("lotto_group_type", $access_permission)
                    || in_array("lotto_type", $access_permission)
                    || in_array("limit_lotto", $access_permission)
                    || in_array("result", $access_permission)
                    || in_array("report_over_lotto", $access_permission)
                ) {
                    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>ตั้งค่าหวย</span>
                            <span class="label label-primary pull-right"></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if (in_array("lotto_group_type", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>lotto_group_type"><i class="fa fa-circle-o"></i>จัดการกลุ่มหมายเลข</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("lotto_type", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>lotto_type"><i class="fa fa-circle-o"></i>จัดการชนิดหมายเลข</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("limit_lotto", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>limit_lotto"><i class="fa fa-circle-o"></i>จัดการเงินถือสู้</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("report_over_lotto", $access_permission)) { ?>
                                <li><a href="<?= base_url() ?>report_over_lotto"><i class="fa fa-circle-o"></i>จัดการออกของ</a>
                                </li>
                            <?php } ?>
                            <?php if (in_array("result", $access_permission)) { ?>
                                <li><a href="<?= base_url(); ?>result"><i class="fa fa-circle-o"></i> จัดการผลสลากรางวัล</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (in_array('manager_risk', $access_permission)) { ?>
                    <li>
                        <a href="<?= base_url() ?>manager_risk">
                            <i class="fa fa-asterisk"></i> <span>ความเสี่ยง</span>
                            <small class="label pull-right bg-red"></small>
                        </a>
                    </li>
                <?php } ?>
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div id='disp_paste' class="content-wrapper" style="background-color: #FFFFFF;">
        <?php $this->load->view($layout); ?>
        <!-- Content Header (Page header) -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://casabet.in.th/">Casabet.in.th</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?= base_url() ?>plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="<?= base_url() ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->

<script src="<?= base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>dist/js/demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
</body>

<script type="application/javascript">

    $(document).on("click", ".btn-logout", function () {
        var result = confirm("ยืนยันการออกจากระบบ");
        if (result === true) {
            $.ajax({
                url: '<?php echo base_url(); ?>dashboard/logout',
                type: 'post',
                data: "user_id=0",
                dataType: 'json',
                crossDomain: true,
                beforeSend: function () {
                    //  $('#button-delete').button('loading');
                },
                complete: function () {
                    //$('#button-delete').button('reset');
                },
                success: function (json) {
                    window.open("<?php echo base_url(); ?>", "_self");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    });

    $('.sidebar-menu').find('a').bind('click', function (ev) {
        var urls = $(this)[0].href;
        if (urls.indexOf('#') !== -1) {
            return;
        }
        ev.preventDefault();
        window.history.pushState({
            title: 'casabet',
            url: urls
        }, 'casabet', urls);
        load_custompage(urls);
    });

    window.addEventListener('popstate', function (event) {
        var state = event.state;
        if (state !== null) {
            load_custompage(state.url);
        }
    });

    function load_custompage(urls) {
        removeInitEvent();
        removeTagMoneyScript();
        $('#disp_paste').html('Loading...');
        $.post(urls, {'custom_load': 'true'}, function (data) {
            if (data.indexOf("<!DOCTYPE html>") !== -1) {
                window.location.reload();
            }
            $('#disp_paste').html(data);
        }).fail(function () {
            $('#disp_paste').html('has error.');
        });
    }

</script>
</html>
