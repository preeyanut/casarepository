<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Config Webpage Group
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Config Webpage Group</li>
    </ol>
</section>

<!-- Main content -->
<div id="container-content col-md-9">

    <section class="content">


        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Config Group</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="config_group_id" value="<?php echo $config_group_id; ?>"
                               id="config_group_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-type-name">Webpage Name</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="config_group_name" value="<?php echo $config_group_name; ?>"
                                               placeholder="Webpage Name" id="input-config-name"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-priority-level">ลำดับความสำคัญ</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="priority_level" value="<?php echo $priority_level; ?>"
                                               placeholder="ลำดับความสำคัญ" id="input-priority-level"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-status">สถานะ</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <select name="config_group_status" id="input-status" class="form-control">
                                            <option
                                                    value="0" <?php if ($config_group_status == 0) { ?>
                                                selected="selected" <?php } ?> >
                                                ปิดการใช้งาน
                                            </option>
                                            <option
                                                    value="1" <?php if ($config_group_status == 1) { ?>
                                                selected="selected" <?php } ?>>
                                                เปิดใช้งาน
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6" style="text-align: right;">
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

            <!-- list webname-->
            <div class="container-content col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Webpage Name</h3>
                    </div>
                    <div class="box-header with-border" style="background-color:#ccc;">
                        <div class="form-group form-horizontal">
                            <label class="col-sm-3 control-label" for="input-search">ค้นหา : </label>
                            <div class="col-sm-9">
                                <input type="text" name="search" placeholder="ค้นหา" id="input-search"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php //echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
                        <div class="table-responsive  box-body ">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-center">ลำดับ</td>
                                    <td class="text-center">Config Group Name</td>
                                    <td class="text-center">ความสำคัญ</td>
                                    <td class="text-center">วันที่เพิ่ม</td>
                                    <td class="text-center">พนักงานที่เพิ่ม</td>
                                    <td class="text-center">แก้ไขล่าสุด</td>
                                    <td class="text-center">พนักงานที่แก้ไข</td>
                                    <td class="text-center">สถานะ</td>
                                    <td class="text-center">จัดการ</td>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                <?php if ($list) { ?>
                                    <?php foreach ($list as $config_group) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $count;
                                                $count++; ?></td>
                                            <td class="text-center"><?php echo $config_group['config_group_name']; ?></td>
                                            <td class="text-center"><?php echo $config_group['priority_level']; ?></td>
                                            <td class="text-center"><?php echo $config_group['create_date']; ?></td>
                                            <td class="text-center"><?php echo $config_group['create_by_name'];?></td>
                                            <td class="text-center"><?php echo $config_group['update_date']; ?></td>
                                            <td class="text-center"><?php echo $config_group['update_by_name'];?></td>
                                            <td class="text-center"><?php if ($config_group['config_group_status'] == 0) {
                                                    echo "ปิดการใช้งาน";
                                                } else {
                                                    echo "เปิดใช้งาน";
                                                } ?></td>
                                            <td class="text-center">
                                                <button type="button"
                                                        name="button-edit-<?php echo $config_group['config_group_id']; ?>"
                                                        id="button-edit"
                                                        class="btn btn-warning button-edit">แก้ไข
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td class="text-center" colspan="5"><?php // echo $text_no_results; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>

            <!-- list webname-->

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
            url: '<?php echo base_url(); ?>config_group/validate_form',
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

                    if ($('input[name="config_group_id"]').val()) {
                        edit_config_group();
                    } else {
                        add_config_group();
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

    $(document).on("click", ".button-edit", function () {
        var config_group_id = this.name.replace("button-edit-", "");
        window.open("<?php echo base_url(); ?>config_group?config_group_id=" + config_group_id, "_self");
    });


    function add_config_group() {
        $.ajax({
            url: '<?php echo base_url(); ?>config_group/add_config_group',
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

                alert("เพิ่มข้อมูลเสร็จสิ้น");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_config_group() {
        var config_group_id = $('input[name="config_group_id"]').val();
        $.ajax({
            url: '<?php echo base_url(); ?>config_group/edit_config_group',
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


    $(document).on("click", ".button-delete", function () {
        var config_group_id = this.name.replace("button-delete-", "");
        var result = confirm("ยืนยันการลบข้อมูล");
        if (result == true) {
            $.ajax({
                url: '<?php echo base_url(); ?>config_group/delete_config_group',
                type: 'post',
                data: "config_group_id=" + config_group_id,
                dataType: 'json',
                crossDomain: true,
                beforeSend: function () {
                    $('.button-delete').button('loading');
                },
                complete: function () {
                    $('.button-delete').button('reset');
                },
                success: function (json) {
                    // alert("Delete user_group OK");
                    reloadListUserGroup();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }

    });


    function reload_config_group(config_group_id) {
        $("#tbody").empty();
        $.ajax({
            url: '<?php echo base_url(); ?>config_group/get_all',
            type: 'post',
            data: "config_group_id=" + config_group_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var config_groups = data["list"];

                $("#tbody").empty();
                for (var i = 0; i < config_groups.length; i++) {
                    var config_group = config_groups[i];

                    var color_status = "";
                    var str_status = "";

                    switch (config_group.config_group_status) {
                        case 0:
                            color_status = "#8a0004";
                            str_status = "ปิดการใช้งาน";
                            break;
                        case 1:
                            str_status = "เปิดใช้งาน";
                            break;
                    }

                    var html = "<tr class='tr_id" + config_group.config_group_id + "'  style='cursor: pointer;'>"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + config_group.config_group_name + "</td>"
                        + "<td class='text-center'>" + config_group.priority_level + "</td>"
                        + "<td class='text-center'>" + config_group.create_date + "</td>"
                        + "<td class='text-center'>" + config_group.create_by_name + "</td>"
                        + "<td class='text-center'>" + config_group.update_date + "</td>"
                        + "<td class='text-center'>" + config_group.update_by_name + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
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

    function search_config_group() {
        var txtSearch = $("#input-search").val();
        var filterNumber = $("#filter-number").val();
        var filterPage = $("#filter-page").val();
        var filterStatus = $("#filter-status").val();

        $.ajax({
            url: '<?php echo base_url(); ?>config_group/search_config',
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
                var configs = data["list"];
                $("#tbody").empty();
                for (var i = 0; i < configs.length; i++) {
                    var config_group = config_groups[i];

                    var color_status = "";
                    var str_status = "";
                    switch (Number(config_group.config_group_status)) {
                        case 0:
                            color_status = "#8a0004";
                            str_status = "ปิดการใช้งาน";
                            break;
                        case 1:
                            str_status = "เปิดใช้งาน";
                            break;
                    }
                    var html = "<tr class='tr_id" + config_group.config_group_id + "'  >"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + config_group.config_group_name + "</td>"
                        + "<td class='text-center'>" + config_group.priority_level + "</td>"
                        + "<td class='text-center'>" + config_group.create_date + "</td>"
                        + "<td class='text-center'>" + config_group.create_by_name + "</td>"
                        + "<td class='text-center'>" + config_group.update_date + "</td>"
                        + "<td class='text-center'>" + config_group.update_by_name + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + " <td class='text-center'><button type='button' name='button-edit" + config_group.config_group_id + "' "
                        + " id='button-edit' class='btn btn-warning button-edit'>แก้ไข</button></td>"
                        + "</tr>";
                    $("#tbody").append(html);
                }
                label_format_number();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

</script>