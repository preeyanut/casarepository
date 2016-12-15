<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        customer
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">customer</li>
    </ol>
</section>

<!-- Main content -->
<div id="container-content">

    <section class="content">


        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
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
                                    <label class=" control-label" for="input-customer-status">สถานะ</label>

                                    <div class="">
                                        <select name="customer_status" id="input-customer-status" class="form-control">

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
                                               placeholder="อีเมล์" id="input-customer-email" class="form-control"/>

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
                                    <label class=" control-label" for="input-how-to-know-web">ช่องทางที่ลูกค้ารู้จัก</label>

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
                                    <label class=" control-label" for="input-bank-account-name">โปรย้ายค่าย ID เก่า</label>

                                    <div class="">
                                        <input type="text" name="old_id_promotion" value="<?php echo $bank_account_name; ?>"
                                               placeholder="โปรย้ายค่าย ID เก่า" id="input-bank-account-name" class="form-control"/>

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

    init_event({
        fn: [readyLoad],
        disEvent: ["click,#button-save","focusout,#minimum","focusout,#reward","focusout,#maximum","focusout,#commission"
            ,"focusout,#tbody-setting-default input","focusout,#input-customer-credit","change,.my_percent_customer"
            ,"change,.sub_percent_customer","focusout,.my_percent_customer","focusout.sub_percent_customer"]
    });

    function readyLoad(){
        $('#input-customer-credit').maskMoney();
        $('.input-number').maskMoney();
    }

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

                    // add_customer();

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
                 alert("แก้ไขข้อมูลผู้ใช้งานเสร็จสิ้น");

//                edit_default_setting(customer_id);
//                edit_percent_setting(customer_id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }





</script>