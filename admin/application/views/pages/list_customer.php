<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        List Customer
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">customer</li>
    </ol>
</section>

<style>
    #tbody-customer td, .table-customer td {
        white-space: nowrap;
    }
</style>

<!-- Main content -->
<div id="container-content">

    <section class="content">

        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">List customer</h3>
                    </div>
                    <div class="box-header with-border" style="background-color:#ccc;">
                        <div class="form-group form-horizontal">
                            <div class="col-sm-8 form-horizontal">
                                <div class="col-sm-4" style="float: left;">
                                    <label class=" control-label" for="input-search" style="float: left">จำนวน
                                        : </label>

                                    <div class="col-sm-8">
                                        <select id="filter-number" name="table_summay_master_length"
                                                aria-controls="table_summay_master"
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
                                    <label class=" control-label" for="input-search" style="float: left">สถานะ: </label>

                                    <div class="col-sm-8">
                                        <select id="filter-status" name="table_summay_master_length"
                                                aria-controls="table_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="-1">ทั้งหมด</option>
                                            <option value="0">ปกติ</option>
                                            <option value="1">ถูกระงับ</option>
                                            <option value="2">ปิดใช้งาน</option>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="col-sm-4" style="float: left;">

                                    <label class=" control-label" for="input-search" style="float: left">ระดับ
                                        : </label>

                                    <div class="col-sm-8">
                                        <select id="filter-customer-group" name="table_customer_summay_master_length"
                                                aria-controls="table_customer_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="-1" selected="selected">ทั้งหมด</option>
                                            <?php foreach ($customer_groups as $customer_group) { ?>
                                                <option
                                                    value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>-->
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
                    <form action="<?php //echo $delete; ?>" method="post" enctype="multipart/form-data"
                          id="form-customer">
                        <div class="table-responsive  box-body ">
                            <table class="table table-bordered table-hover">
                                <thead class="table-customer">
                                <tr>
                                    <td class="text-center">ลำดับ</td>
                                    <td class="text-center">รหัสสมาชิก</td>
                                    <td class="text-center">วันที่ลูกค้าสมัคร</td>
                                    <td class="text-center">ชื่อสมาชิก</td>
                                    <td class="text-center">เบอร์โทรศัพท์</td>
                                    <td class="text-center">Lind ID</td>
                                    <td class="text-center">Email</td>
                                    <td class="text-center">ช่องทางที่รู้จักเว็บ</td>
                                    <td class="text-center">ธนาคาร</td>
                                    <td class="text-center">ชื่อบัญชี</td>
                                    <td class="text-center">หมายเลขบัญชี</td>
                                    <td class="text-center">ยอดเงินเปิดบัญชี</td>
                                    <td class="text-center">หมายเลขโปรย้ายค่าย</td>
                                    <td class="text-center">รับลูกค้าโดย</td>
                                    <td class="text-center">วันที่รับลูกค้า</td>
                                    <td class="text-center">อัพเดทข้อมูลโดย</td>
                                    <td class="text-center">อัพเดทข้อมูลวันที่</td>
                                    <td class="text-center">สถานะ</td>
                                    <td class="text-center">จัดการ</td>

                                </tr>
                                </thead>
                                <tbody id="tbody">
                                <?php //echo var_dump($list) ; ?>
                                <?php if ($list) {
                                    $count = 1; ?>
                                    <?php foreach ($list as $customer) { ?>
                                        <tr id="tr_id<?php echo $customer['customer_id']; ?>" class="tr_id">

                                            <td class="text-center"><?php echo $count;
                                                $count++; ?></td>
                                            <td class="text-center"><?php echo $customer['member_id']; ?></td>
                                            <td class="text-center"><?php echo $customer['submission_date']; ?></td>
                                            <td class="text-center"><?php echo $customer['customer_firstname'] . " " . $customer['customer_lastname']; ?></td>
                                            <td class="text-center"><?php echo $customer['customer_telephone']; ?></td>
                                            <td class="text-center"><?php echo $customer['customer_line_id']; ?></td>
                                            <td class="text-center"><?php echo $customer['customer_email']; ?></td>

                                            <td class="text-center"><?php echo $customer['how_to_know_web']; ?></td>
                                            <td class="text-center"><?php echo $customer['bank_name']; ?></td>
                                            <td class="text-center"><?php echo $customer['bank_account_name']; ?></td>
                                            <td class="text-center"><?php echo $customer['bank_account_number']; ?></td>
                                            <td class="text-center">
                                                <label class="label-number"><?php echo $customer['money_open_account']; ?></label>
                                            </td>

                                            <td class="text-center"><?php echo $customer['old_id_promotion']; ?></td>
                                            <td class="text-center"><?php echo $customer['accept_by_name']; ?></td>
                                            <td class="text-center"><?php echo $customer['accept_date']; ?></td>
                                            <td class="text-center"><?php echo $customer['update_by_name']; ?></td>
                                            <td class="text-center"><?php echo $customer['update_date']; ?></td>
                                            <td class="text-center" style="color: <?php
                                            $str_status = "";
                                            switch ($customer['customer_status']) {
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
                                                <button type="button"
                                                        name="button-edit<?php echo $customer['customer_id']; ?>"
                                                        id="button-edit" class="btn btn-warning button-edit">แก้ไข
                                                </button>
                                                <button type="button"
                                                        name="button-delete<?php echo $customer['customer_id']; ?>"
                                                        id="button-delete" class="btn btn-danger button-delete">ลบ
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
            <!--/.col (right) -->
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

<script type="text/javascript">

    init_event({
        document_on: [
            'keyup,#input-search'
            , 'change,#filter-number'
            , 'change,#filter-status'
            , 'click,.button-edit'
            , 'click,.button-delete'
            , 'click,.paging'
        ], document_ready: [
            get_paging
        ]
    });

    $(document).on("click", ".button-edit", function () {
        var customer_id = this.name.replace("button-edit", "");
        window.open("<?php echo base_url(); ?>customer/get_form?customer_id=" + customer_id, "_self");
    });

    $(document).on("click", ".button-delete", function () {
        var customer_id = this.name.replace("button-delete", "");
        var result = confirm("ยืนยันการลบข้อมูล");
        if (result == true) {
            $.ajax({
                url: '<?php echo base_url(); ?>list_customer/delete_customer',
                type: 'post',
                data: "customer_id=" + customer_id,
                dataType: 'json',
                crossDomain: true,
                beforeSend: function () {
                    $('.button-delete').button('loading');
                },
                complete: function () {
                    $('.button-delete').button('reset');
                },
                success: function (json) {

                    reload_list_customer();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }

    });


    $(document).on("keyup", "#input-search", function () {
        search_customer();
        get_paging();
    });

    $(document).on("change", "#filter-number", function () {
        search_customer();
        get_paging();
    });

    $(document).on("change", "#filter-status", function () {
        search_customer();
        get_paging();
    });

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
        search_customer();
    });

    function edit_customer() {
        var customer_id = $('input[name="customer_id"]').val();
        $.ajax({
            url: '<?php echo base_url(); ?>customer/edit_customer',
            type: 'post',
            data: $('input , select'),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {
                alert("แก้ไขข้อมูลผู้ใช้งานเสร็จสิ้น");

                //reload_list_customer();

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function reload_list_customer(customer_id) {
        $("#tbody").empty();
        $.ajax({
            url: '<?php echo base_url(); ?>list_customer/get_all_customer',
            type: 'post',
            data: "customer_id=" + customer_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var customers = data["list"];
                $("#tbody").empty();
                for (var i = 0; i < customers.length; i++) {
                    var customer = customers[i];

                    var color_status = "";
                    var str_status = "";

                    switch (Number(customer.customer_status)) {
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

                    var html = "<tr class='tr_id" + customer.customer_id + "'  style='cursor: pointer;'>"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + customer.member_id + "</td>"
                        + "<td class='text-center'>" + customer.submission_date + "</td>"
                        + "<td class='text-center'>" + customer.customer_firstname + " " + customer.customer_lastname + "</td>"
                        + "<td class='text-center'>" + customer.customer_telephone + "</td>"
                        + "<td class='text-center'>" + customer.customer_line_id + "</td>"
                        + "<td class='text-center'>" + customer.customer_email + "</td>"
                        + "<td class='text-center'>" + customer.how_to_know_web + "</td>"
                        + "<td class='text-center'>" + customer.bank_name + "</td>"
                        + "<td class='text-center'>" + customer.bank_account_name + "</td>"
                        + "<td class='text-center'>" + customer.bank_account_number + "</td>"
                        + "<td class='text-center'>" + customer.money_open_account + "</td>"
                        + "<td class='text-center'>" + customer.old_id_promotion + "</td>"
                        + "<td class='text-center'>" + customer.accept_by_name + "</td>"
                        + "<td class='text-center'>" + customer.accept_date + "</td>"
                        + "<td class='text-center'>" + customer.update_by_name + "</td>"
                        + "<td class='text-center'>" + customer.update_date + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + " <td class='text-center'>"
                        + "<button type='button' name='button-edit" + customer.customer_id + "' "
                        + " id='button-edit' class='btn btn-warning button-edit'>แก้ไข</button>"
                        + " <button type='button' name='button-delete" + customer.customer_id + "' id='button-delete' "
                        + " class='btn btn-danger button-delete'>ลบ</button>"
                        + "</td>"
                        + "</tr>";

                    $("#tbody").append(html);
                }
                alert("get  OK");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function search_customer() {
        var txtSearch = $("#input-search").val();
        var filterNumber = $("#filter-number").val();
        var filterPage = $("#filter-page").val();
        var filterStatus = $("#filter-status").val();

        $.ajax({
            url: '<?php echo base_url(); ?>list_customer/search_customer',
            type: 'post',
            data: "txtSearch=" + txtSearch + "&filter-number=" + filterNumber + "&filter-page=" + filterPage + "&filter-status=" + filterStatus,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var customers = data["list"];

                //console.log(json);

                $("#tbody").empty();
                for (var i = 0; i < customers.length; i++) {
                    var customer = customers[i];
                    var color_status = "";
                    var str_status = "";
                    switch (Number(customer.customer_status)) {
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
                    var html = "<tr class='tr_id" + customer.customer_id + "'  >"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + customer.member_id + "</td>"
                        + "<td class='text-center'>" + customer.submission_date + "</td>"
                        + "<td class='text-center'>" + customer.customer_firstname + " " + customer.customer_lastname + "</td>"
                        + "<td class='text-center'>" + customer.customer_telephone + "</td>"
                        + "<td class='text-center'>" + customer.customer_line_id + "</td>"
                        + "<td class='text-center'>" + customer.customer_email + "</td>"
                        + "<td class='text-center'>" + customer.how_to_know_web + "</td>"
                        + "<td class='text-center'>" + customer.bank_name + "</td>"
                        + "<td class='text-center'>" + customer.bank_account_name + "</td>"
                        + "<td class='text-center'>" + customer.bank_account_number + "</td>"
                        + "<td class='text-center'>" + customer.money_open_account + "</td>"
                        + "<td class='text-center'>" + customer.old_id_promotion + "</td>"
                        + "<td class='text-center'>" + customer.accept_by_name + "</td>"
                        + "<td class='text-center'>" + customer.accept_date + "</td>"
                        + "<td class='text-center'>" + customer.update_by_name + "</td>"
                        + "<td class='text-center'>" + customer.update_date + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + " <td class='text-center'>"
                        + "<button type='button' name='button-edit" + customer.customer_id + "' "
                        + " id='button-edit' class='btn btn-warning button-edit'>แก้ไข</button>"
                        + " <button type='button' name='button-delete" + customer.customer_id + "' id='button-delete' "
                        + " class='btn btn-danger button-delete'>ลบ</button>"
                        + "</td>"
                        + "</tr>";
                    $("#tbody").append(html);
                }
//                label_format_number();
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
        var filterStatus = $("#filter-status").val();

        $.ajax({
            url: '<?php echo base_url(); ?>list_customer/get_paging',
            type: 'post',
            data: "txtSearch=" + txtSearch + "&filter-number=" + filterNumber + "&filter-page=" + filterPage + "&filter-status=" + filterStatus,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                console.log(json);
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


</script>