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
    #tbody-customer td,.table-customer td{
        white-space: nowrap;
    }
</style>

<!-- Main content -->
<div id="container-content">

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="row" style="margin: 0px">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">ข้อมูลลูกค้า</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">

                            <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"
                                   id="customer_id" class="form-control"/>

                            <div class="row">

                                <div class="form-group required col-md-4">
                                    <label class=" control-label" for="input-customer-firstname">ชื่อผู้ใช้งาน</label>

                                    <div class="">
                                        <input type="text" name="customer_firstname" value="<?php echo $customer_firstname; ?>"
                                               placeholder="ชื่อผู้ใช้งาน" id="input-customer-firstname"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="form-group required col-md-4">
                                    <label class="control-label" for="input-customer-lastname">นามสกุล</label>

                                    <div class="">
                                        <input type="text" name="customer_lastname" value="<?php echo $customer_lastname; ?>"
                                               placeholder="นามสกุล" id="input-customer-lastname"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" control-label" for="input-customer-type">สถานะ</label>

                                    <div class="">
                                        <select name="customer_status" id="input-status" class="form-control">

                                            <option
                                                value="0" <?php if ($customer_status === 0) { ?> selected="selected" <?php } ?> >
                                                ปกติ
                                            </option>
                                            <option
                                                value="1" <?php if ($customer_status === 1) { ?> selected="selected" <?php } ?>>
                                                ระงับ
                                            </option>
                                            <option
                                                value="2" <?php if ($customer_status === 2) { ?> selected="selected" <?php } ?>>
                                                ปิดใช้งาน
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group required col-md-4">
                                    <label class=" control-label"
                                           for="input-customer-line-id">Line ID</label>

                                    <div class="">
                                        <input type="text" min="0" name="customer_line_id"
                                               value="<?php echo $customer_telephone; ?>"
                                               placeholder="Line ID" id="input-customer-line-id"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="form-group required col-md-4">
                                    <label class=" control-label"
                                           for="input-customer-telephone">เบอร์โทรศัพท์</label>

                                    <div class="">
                                        <input type="text" min="0" name="customer_telephone"
                                               value="<?php echo $customer_telephone; ?>"
                                               placeholder="เบอร์โทรศัพท์" id="input-customer-telephone"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="form-group required col-md-4">
                                    <label class=" control-label" for="input-email">อีเมล์</label>

                                    <div class="">
                                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>"
                                               placeholder="อีเมล์" id="input-email" class="form-control"/>

                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.box -->
                </div>
                <div class="row" style="margin: 0px">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">รายละเอียดลูกค้า</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class=" box-body">

                            <div class="row">

                                <div class="form-group required col-md-6">
                                    <label class="control-label" for="input-member-id">Member ID</label>

                                    <div class="">
                                        <input type="text" name="member_id" value="<?php echo $member_id; ?>"
                                               placeholder="นามสกุล" id="input-member-id"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>

                                <div class="form-group required col-md-6">
                                    <label class=" control-label" for="input-customer_firstname">ช่องทางที่ลูกค้ารู้จัก</label>

                                    <div class="">
                                        <input type="text" name="how_to_know_web" value="<?php echo $how_to_know_web; ?>"
                                               placeholder="ช่องทางที่ลูกค้ารู้จัก" id="input-how-to-know-web"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group required col-md-12">
                                    <label class=" control-label" for="input-bank-name">ธนาคาร</label>

                                    <div class="">
                                        <input type="text" name="bank_name" value="<?php echo $bank_name; ?>"
                                               placeholder="ธนาคาร" id="input-bank-name" class="form-control"/>

                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group required col-md-6">
                                    <label class=" control-label" for="input-bank-account-name">ชื่อบัญชี</label>

                                    <div class="">
                                        <input type="text" name="bank_account_name" value="<?php echo $bank_account_name; ?>"
                                               placeholder="ชื่อบัญชี" id="input-bank-account-name" class="form-control"/>

                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="form-group required col-md-6">
                                    <label class=" control-label" for="input-bank-account-number">เลขบัญชี</label>

                                    <div class="">
                                        <input type="text" name="bank_account_number" value="<?php echo $bank_account_number; ?>"
                                               placeholder="เลขบัญชี" id="input-bank-account-number" class="form-control"/>

                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group required col-md-6">
                                    <label class=" control-label" for="input-money-open-account">ยอดเงินเปิดบัญชี</label>

                                    <div class="">
                                        <input type="text" name="money_open_account" value="<?php echo $bank_account_number; ?>"
                                               placeholder="ยอดเงินเปิดบัญชี" id="input-money-open-account" class="form-control"/>

                                        <div class="text-danger"></div>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">
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
                                        <select id="filter-number" name="table_customer_summay_master_length"
                                                aria-controls="table_customer_summay_master"
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
                                        <select id="filter-customer-status" name="table_customer_summay_master_length"
                                                aria-controls="table_customer_summay_master"
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
                    <form action="<?php //echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-customer">
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

                                    <td class="text-center">สถานะลูกค้า</td>

                                    <td class="text-center">จัดการ</td>


                                </tr>
                                </thead>
                                <tbody id="tbody-customer">
                                <?php //echo var_dump($list) ; ?>
                                <?php if ($list) {
                                    $count = 1; ?>
                                    <?php foreach ($list as $customer) { ?>
                                        <tr id="tr_id<?php echo $customer['customer_id']; ?>" class="tr_id">

                                            <td class="text-center"><?php echo $count; $count++; ?></td>
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

                                            <td class="text-center"><?php echo $customer['accept_by']; ?></td>
                                            <td class="text-center"><?php echo $customer['accept_date']; ?></td>
                                            <td class="text-center"><?php echo $customer['update_by']; ?></td>
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
                                                <button type="button" name="button-edit<?php echo $customer['customer_id']; ?>"
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
            <!--/.col (right) -->
        </div>

        <div class="row ">
            <div class="col-sm-12">
                <div class="box box-default ">
                    <div class="box-header">
                        <div class="col-sm-12" style="text-align: center;">
                            <button type="button" id="button-save" class="btn btn-primary"> บันทึก</button>
                            <button id="btn-reset" type="reset" class="btn btn-default">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </div>
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

    function format_to_money() {
        var input_type_number = $('.input-number');

        for (var i = 0; i < input_type_number.length; i++) {

            var intValue = Number(input_type_number[i].value);

            $('.input-number')[i].value = formatNumber(intValue);

            // console.log(formatNumber(intValue));
        }
    }

    function formatNumber(number) {
        //var int_number = Number(number);
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

    function label_format_number() {

        var label_type_number = $(".label-number");

        for (var i = 0; i < label_type_number.length; i++) {

            var intValue = Number(label_type_number[i].innerHTML.trim());

            $(".label-number")[i].innerHTML = formatNumber(intValue);

        }
    }

    $(document).on("click", "#button-save", function () {
        $.ajax({
            url: '<?php echo base_url(); ?>customer/validate_form',
            type: 'post',
            data: $('input , select'),
            // data:  "abcd=1234",
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {
                //alert("OK");

                $('.alert, .text-danger').remove();
                $('.form-group').removeClass('has-error');

                if (json['error']) {

                    var p = 0;
                    for (var i = 0; i < Object.keys(json['error']).length; i++) {
                        var input_name = Object.keys(json['error'])[i];
                        //var txterror = json['error'][input_name];
                        $("input[name='" + input_name + "']").after('<div class="text-danger">' + json['error'][input_name] + '</div>');
                        $("select[name='" + input_name + "']").after('<div class="text-danger">' + json['error'][input_name] + '</div>');
                        p++;
                    }

                    // Highlight any found errors
                    $('.text-danger').parentsUntil('.form-group').parent().addClass('has-error');
                } else {

                    if ($('input[name="customer_id"]').val()) {
                        edit_customer();
                    } else {
                        add_customer();
                    }

                    $('#button-refresh').trigger('click');
                    $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });


    function add_customer() {

        $.ajax({
            url: '<?php echo base_url(); ?>customer/add_customer',
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

                 console.log(json);
                 alert("เพิ่มข้อมูลผู้ใช้งานเสร็จสิ้น");

                // upload file
//                uploadImage(json.Data.customer_id);
//
//                reloadListEmployee();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_customer() {
        var customer_id = $('input[name="customer_id"]').val();
        $.ajax({
            url: '<?php echo base_url(); ?>customer/edit_customer',
            type: 'post',
            //data: $('input , select')+"&customer_id="+customer_id,
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
                // alert("แก้ไขข้อมูลผู้ใช้งานเสร็จสิ้น");

                edit_default_setting(customer_id);
                edit_percent_setting(customer_id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    $(document).on("click", ".button-edit", function () {
        var customer_id = this.name.replace("button-edit", "");

        $.ajax({
            url: '<?php echo base_url(); ?>customer/get_customer',
            type: 'post',
            //data: $('input , select')+"&customer_id="+customer_id,
            data: {customer_id:customer_id},
            dataType: 'json',
            crossDomain: true,
            success: function (json) {

                console.log(json);

                console.log(json.Data.customer_info.customer_firstname);
                $('#input-customer-firstname').val(json.Data.customer_info.customer_firstname);
                $('#input-customer-lastname').val(json.Data.customer_info.customer_lastname);
                $('#input-customer-line-id').val(json.Data.customer_info.customer_line_id);
                $('#input-customer-telephone').val(json.Data.customer_info.customer_telephone);
                $('#input-customer-email').val(json.Data.customer_info.customer_email);

                $('#input-member-id').val(json.Data.customer_info.member_id);
                $('#input-how-to-know-web').val(json.Data.customer_info.how_to_know_web);
                $('#input-bank-name').val(json.Data.customer_info.bank_name);
                $('#input-bank-account-name').val(json.Data.customer_info.bank_account_name);
                $('#input-bank-account-number').val(json.Data.customer_info.bank_account_number);
                $('#input-money-open-account').val(json.Data.customer_info.money_open_account);

//                alert("แก้ไขข้อมูลผู้ใช้งานเสร็จสิ้น");

//                edit_default_setting(customer_id);
//                edit_percent_setting(customer_id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });


</script>