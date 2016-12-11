<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        List user
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List User</li>
    </ol>
</section>

<!-- Main content -->
<div id="container-content">

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">List User</h3>
                    </div>
                    <div class="box-header with-border" style="background-color:#ccc;">
                        <div class="form-group form-horizontal">
                            <div class="col-sm-8 form-horizontal">
                                <div class="col-sm-4" style="float: left;">
                                    <label class=" control-label" for="input-search" style="float: left">จำนวน
                                        : </label>
                                    <div class="col-sm-8">
                                        <select id="filter-number" name="table_user_summay_master_length"
                                                aria-controls="table_user_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="-1">All</option>
                                        </select>
                                    </div>
                                    <label class="control-label" for="input-search">แถว </label>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <label class=" control-label" for="input-search" style="float: left">สถานะ
                                        : </label>
                                    <div class="col-sm-8">
                                        <select id="filter-user-status" name="table_user_summay_master_length"
                                                aria-controls="table_user_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="-1">ทั้งหมด</option>
                                            <option value="0">ปกติ</option>
                                            <option value="1">ถูกระงับ</option>
                                            <option value="2">ปิดใช้งาน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;">

                                    <label class=" control-label" for="input-search" style="float: left">ระดับ
                                        : </label>
                                    <div class="col-sm-8">
                                        <select id="filter-user-group" name="table_user_summay_master_length"
                                                aria-controls="table_user_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="-1" selected="selected" >ทั้งหมด</option>
                                            <?php foreach ($user_groups as $user_group) { ?>
                                                    <option
                                                        value="<?php echo $user_group['user_group_id']; ?>"><?php echo $user_group['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <label class="col-sm-3 control-label" for="input-search">ค้นหา : </label>
                                <div class="col-sm-9">
                                    <input type="text" name="search" placeholder="ค้นหา" id="input-search"
                                           class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php //echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-user">
                        <div class="table-responsive  box-body ">
                            <table class="table table-bordered table-hover">
                                <thead class="table-user">
                                <tr>
                                    <td class="text-center">ลำดับ</td>
                                    <td class="text-center">รหัสสมาชิก</td>
                                    <td class="text-center">ชื่อสมาชิก</td>
                                    <td class="text-center">เบอร์โทรศัพท์</td>
                                    <td class="text-center">ระดับ</td>
                                    <td class="text-center">เครดิต</td>
                                    <td class="text-center">ยอดค้าง</td>
                                    <td class="text-center">สถานะ</td>
                                    <td class="text-center">จัดการ</td>


                                </tr>
                                </thead>
                                <tbody id="tbody-user">
                                <?php //echo var_dump($list) ; ?>
                                <?php if ($list) {
                                    $count = 1; ?>
                                    <?php foreach ($list as $user) { ?>
                                        <tr id="tr_id<?php echo $user['user_id']; ?>" class="tr_id"
                                            >

                                            <td class="text-center"><?php echo $count;
                                                $count++; ?></td>
                                            <td class="text-center"><?php echo $user['user_code']; ?></td>
                                            <td class="text-center"><?php echo $user['firstname'] . " " . $user['lastname']; ?></td>
                                            <td class="text-center"><?php echo $user['user_telephone']; ?></td>
                                            <td class="text-center"><?php echo $user['user_group_name']; ?></td>
                                            <td class="text-center"><label
                                                    class="label-number"><?php echo $user['user_credit']; ?></label>
                                            </td>
                                            <td class="text-center"><label
                                                    class="label-number"><?php echo $user['user_balance']; ?></label>
                                            </td>
                                            <td class="text-center" style="color: <?php
                                            $str_status = "";
                                            switch ($user['user_status']) {
                                                case 0:
                                                    echo "#00A65A";
                                                    $str_status = "ปกติ";
                                                    break;
                                                case 1:
                                                    echo "#DD4B39";
                                                    $str_status = "ถูกระงับ";
                                                    break;
                                                case 2 :
                                                    echo "#CCCCCC";
                                                    $str_status = "ปิดใช้งาน";
                                                    break;
                                            }
                                            ?> ">
                                                <?php echo $str_status; ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" name="button-edit<?php echo $user['user_id']; ?>"
                                                        id="button-edit" class="btn btn-warning button-edit">แก้ไข
                                                </button>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td class="text-center" colspan="9"><?php // echo $text_no_results; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <div class="col-sm-6">
                                <ul class="pagination" style="visibility: visible;">
                                    <li class="prev">
                                        <a class="paging" href="#" id="page-1" title="Prev"><i
                                                class="fa fa-angle-left"></i></a>
                                    </li>
                                </ul>
                                <div class="container-paging pagination">

                                </div>

                                <ul class="pagination" style="visibility: visible;">

                                    <li class="next">
                                        <a class="paging" href="#" id="page+1" title="Next"><i
                                                class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" name="filter-page" id="filter-page"
                                   class="form-control"/>
                        </div>

                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->

        </div>

        <div class="display-none">
            <div class="box-body border-radius-none">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <div class="box-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
        </div>
        <!-- /.row -->
    </section>

</div>

<script type="application/javascript">

    init_event({
        fn: [readyFn],
        controlerPaging: 'list_user/get_paging',
        functionPaging: search_user,
        disEvent: ["click,.button-edit"]
    });

    function readyFn(){
        get_paging();
        label_red_color();
    }

    function formatNumber(number){
        var p = number.toFixed(2).split(".");
        var minus = p[0].substring(0, 1);
        if(minus=="-"){
            p[0] = p[0].substring(1,p[0].length);
            return "-" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
                    return number + (i && !(i % 3) ? "," : "") + acc;
                }, "") + "." + p[1];
        }
        else{
            return "" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
                    return number + (i && !(i % 3) ? "," : "") + acc;
                }, "") + "." + p[1];
        }
    }

    function reload_list_user(user_id) {
        $("#tbody-user").empty();
        $.ajax({
            url: '<?php echo base_url(); ?>list_user/get_all_user',
            type: 'post',
            data: "user_id=" + user_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () { },
            complete: function () { },
            success: function (json) {
                var data = json.Data;
                var users = data["list"];
                $("#tbody-user").empty();
                for (var i = 0; i < users.length; i++) {
                    var user = users[i];

                    var color_status = "";
                    var str_status = "";

                    switch (user.user_status) {
                        case 0:
                            color_status = "#00A65A";
                            str_status = "ปกติ";
                            break;
                        case 1:
                            color_status = "#DD4B39";
                            str_status = "ถูกระงับ";
                            break;
                        case 2 :
                            color_status = "#CCCCCC";
                            str_status = "ปิดใช้งาน";
                            break;
                    }

                    var html = "<tr class='tr_id" + user.user_id + "'  style='cursor: pointer;'>"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + user.user_code + "</td>"
                        + "<td class='text-center'>" + user.firstname + " " + user.lastname + "</td>"
                        + "<td class='text-center'>" + user.user_telephone + "</td>"
                        + "<td class='text-center'>" + user.user_group_name + "</td>"
                        + "<td class='text-center'><label class='label-number'>" + user.user_credit + "</label></td>"
                        + "<td class='text-center'><label class='label-number'>" + user.user_balance + "</label></td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + "</tr>";


                    $("#tbody-user").append(html);
                }
                alert("get user OK");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function search_user() {
        var txtSearch = $("#input-search").val();
        var filterNumber = $("#filter-number").val();
        var filterPage = $("#filter-page").val();
        var filterStatus = $("#filter-user-status").val();
        var filterUserGroup = $("#filter-user-group").val();
        $.ajax({
            url: '<?php echo base_url(); ?>list_user/search_user',
            type: 'post',
            data: "txtSearch=" + txtSearch + "&filter-number=" + filterNumber + "&filter-page=" + filterPage+ "&filter-user-status=" + filterStatus+ "&filter-user-group=" + filterUserGroup,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () { },
            complete: function () { },
            success: function (json) {
                var data = json.Data;
                var users = data["list"];
                $("#tbody-user").empty();
                for (var i = 0; i < users.length; i++) {
                    var user = users[i];
                    var color_status = "";
                    var str_status = "";
                    switch (Number(user.user_status)) {
                        case 0:
                            color_status = "#00A65A";
                            str_status = "ปกติ";
                            break;
                        case 1:
                            color_status = "#DD4B39";
                            str_status = "ถูกระงับ";
                            break;
                        case 2 :
                            color_status = "#CCCCCC";
                            str_status = "ปิดใช้งาน";
                            break;
                    }
                    var html = "<tr class='tr_id" + user.user_id + "'  >"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + user.user_code + "</td>"
                        + "<td class='text-center'>" + user.firstname + " " + user.lastname + "</td>"
                        + "<td class='text-center'>" + user.user_telephone + "</td>"
                        + "<td class='text-center'>" + user.user_group_name + "</td>"
                        + "<td class='text-center'><label class='label-number'>" + user.user_credit + "</label></td>"
                        + "<td class='text-center'><label class='label-number'>" + user.user_balance + "</label></td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + " <td class='text-center'><button type='button' name='button-edit" + user.user_id + "' "
                        + " id='button-edit' class='btn btn-warning button-edit'>แก้ไข</button></td>"
                        + "</tr>";
                    $("#tbody-user").append(html);
                }
                label_format_number();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function get_paging() {
        var txtSearch = $("#input-search").val();
        var filterNumber = $("#filter-number").val();
        var filterPage = $("#filter-page").val();
        var filterStatus = $("#filter-user-status").val();
        var filterUserGroup = $("#filter-user-group").val();

        $.ajax({
            url: '<?php echo base_url(); ?>list_user/get_paging',
            type: 'post',
            data:"txtSearch=" + txtSearch + "&filter-number=" + filterNumber + "&filter-page=" + filterPage+ "&filter-user-status=" + filterStatus+ "&filter-user-group=" + filterUserGroup,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () { },
            complete: function () { },
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

    $(document).on("click", ".button-edit", function () {
        var user_id = this.name.replace("button-edit", "");
        window.open("<?php echo base_url(); ?>user?user_id=" + user_id, "_self");
    });

    function label_red_color() {

        var label_type_number = $(".label-number");

        for (var i = 0; i < label_type_number.length; i++) {

            var intValue = Number(label_type_number[i].innerHTML.trim().replace(/,/g,""));

            // $(".label-number")[i].innerHTML = formatNumber(intValue);

            console.log(intValue);
            if(intValue<0){
                // console.log($('.label-number')[i]);
                $('.label-number')[i].style = "color:red;";
            }
        }
    }

</script>