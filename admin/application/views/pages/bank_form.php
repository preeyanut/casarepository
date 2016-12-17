<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Bank
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bank</li>
    </ol>
</section>

<!-- Main content -->
<div id="container-content">

    <section class="content">


        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ข้อมูลธนาคาร</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="bank_list_id" value="<?php echo $bank_list_id; ?>"
                               id="bank_list_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group required col-md-4 col-xs-4">
                                <label class=" control-label" for="input-bank-name">ชื่อธนาคาร</label>

                                <div class="">
                                    <input type="text" name="bank_name" value="<?php echo $bank_list_name; ?>"
                                           placeholder="ชื่อธนาคาร" id="input-bank-name"
                                           class="form-control"/>
                                </div>
                                <div class="text-danger"></div>
                            </div>

                            <div class="form-group required col-md-2 col-xs-2">
                                <label class=" control-label" for="input-priority">ความสำคัญ</label>

                                <div class="">
                                    <input type="text" name="priority_level" value="<?php echo $priority_level; ?>"
                                           placeholder="ความสำคัญ" id="input-priority"
                                           class="form-control"/>
                                </div>
                                <div class="text-danger"></div>
                            </div>

                            <div class="form-group col-md-2 col-xs-2">
                                <label class=" control-label" for="input-status">สถานะ</label>

                                <div class="">
                                    <select name="bank_list_status" id="input-status" class="form-control">

                                        <option
                                                value="0" <?php if ($bank_list_status == 0) { ?>
                                            selected="selected" <?php } ?> >
                                            ปิดการใช้งาน
                                        </option>
                                        <option
                                                value="1" <?php if ($bank_list_status == 1) { ?>
                                            selected="selected" <?php } ?> >
                                            เปิดใช้งาน
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-xs-4" style="text-align: right;">
                                <br>
                                <div class="">
                                    <button type="button" id="button-save" class="btn btn-primary"> บันทึก</button>
                                    <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                                </div>
                            </div>

                        </div>
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
        fn: [readyLoad],
        disEvent: ["click,#button-save", "focusout,#minimum", "focusout,#reward", "focusout,#maximum", "focusout,#commission"
            , "focusout,#tbody-setting-default input", "focusout,#input-user-credit", "change,.my_percent_user"
            , "change,.sub_percent_user", "focusout,.my_percent_user", "focusout.sub_percent_user"]
    });

    function readyLoad() {
        $('#input-user-credit').maskMoney();
        $('.input-number').maskMoney();
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

    $(document).on("click", "#button-save", function () {
        $.ajax({
            url: '<?php echo base_url(); ?>bank/validate_form',
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
                //alert("OK");

                $('.alert, .text-danger').remove();
                $('.form-group').removeClass('has-error');

                if (json['error']) {

                    var p = 0;
                    for (var i = 0; i < Object.keys(json['error']).length; i++) {
                        var input_name = Object.keys(json['error'])[i];
                        $("input[name='" + input_name + "']").after('<div class="text-danger">' + json['error'][input_name] + '</div>');
                        $("select[name='" + input_name + "']").after('<div class="text-danger">' + json['error'][input_name] + '</div>');
                        p++;
                    }

                    // Highlight any found errors
                    $('.text-danger').parentsUntil('.form-group').parent().addClass('has-error');
                } else {

                    if ($('input[name="bank_list_id"]').val()) {
                        edit_bank();
                    } else {
                        add_bank();
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

    function add_bank() {
        $.ajax({
            url: '<?php echo base_url(); ?>bank/add_bank',
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

                var reload = alert("เพิ่มข้อมูลเสร็จสิ้น");
                if (reload)
                    window.location="<?php echo base_url(); ?>bank"
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_bank() {
        var bank_list_id = $('input[name="bank_list_id"]').val();
        $.ajax({
            url: '<?php echo base_url(); ?>bank/edit_bank',
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
                alert("แก้ไขข้อมูลเสร็จสิ้น");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

</script>