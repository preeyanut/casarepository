<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Config Webpage Group
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Config Group</li>
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
                                <div class="col-md-7 col-xs-7">
                                    <div class="">
                                        <input type="text" name="config_group_name"
                                               value="<?php echo $config_group_name; ?>"
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
                                <div class="col-md-7 col-xs-7">
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
                                <div class="col-md-7 col-xs-7">
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

                            <div class="form-group col-md-5" style="text-align: right;">
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

            <!-- list config_group-->
            <div class="container-content col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Config Group</h3>
                    </div>

                    <div class="box-header with-border" style="background-color:#ccc;">
                        <div class="form-group form-horizontal">
                            <div class="col-md-8 col-xs-8 form-horizontal">
                                <div class="col-md-4 col-xs-6" style="float: left;">
                                    <label class="col-sm-3 col-xs-3 control-label" for="input-search"
                                           style="float: left">จำนวน </label>
                                    <div class="col-sm-6 col-xs-9">
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

                                <div class="col-md-4 col-xs-6" style="float: left;">
                                    <label class="col-sm-3 col-xs-3 control-label" for="input-search"
                                           style="float: left">สถานะ </label>
                                    <div class="col-md-9 col-xs-9">
                                        <select id="filter-status" name="table_summay_master_length"
                                                aria-controls="table_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="-1">ทั้งหมด</option>
                                            <option value="0">ปิดการใช้งาน</option>
                                            <option value="1">เปิดใช้งาน</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-4 text-right">
                                <label class="col-sm-3 col-xs-3 control-label" for="input-search">ค้นหา : </label>
                                <div class="col-sm-9 col-xs-9">
                                    <input type="text" name="search" placeholder="กรุณาใส่ config group name เพื่อค้นหา"
                                           id="input-search"
                                           class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->


                    <!-- form start -->
                    <form action="<?php ?>" method="post" enctype="multipart/form-data" id="form">
                        <div class="table-responsive  box-body ">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-center">ลำดับ</td>
                                    <td class="text-center">Config Group Name</td>
                                    <!--<td class="text-center">ความสำคัญ</td>-->
                                    <td class="text-center">วันที่เพิ่ม</td>
                                    <td class="text-center">พนักงานที่เพิ่ม</td>
                                    <td class="text-center">แก้ไขล่าสุด</td>
                                    <td class="text-center">พนักงานที่แก้ไข</td>
                                    <td class="text-center">สถานะ</td>
                                    <td class="text-center">จัดการ</td>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                <?php if ($list) {
                                    $count = 1; ?>
                                    <?php foreach ($list as $config_group) { ?>
                                        <tr id="tr_id<?php echo $config_group['config_group_id']; ?>" class="tr_id">
                                            <td class="text-center"><?php echo $count;
                                                $count++; ?></td>
                                            <td class="text-center"><?php echo $config_group['config_group_name']; ?></td>
                                            <!--<td class="text-center"><?php echo $config_group['priority_level']; ?></td>-->
                                            <td class="text-center"><?php echo $config_group['create_date']; ?></td>
                                            <td class="text-center"><?php echo $config_group['create_by_name']; ?></td>
                                            <td class="text-center"><?php echo $config_group['update_date']; ?></td>
                                            <td class="text-center"><?php echo $config_group['update_by_name']; ?></td>
                                            <?php if ($config_group['config_group_status'] == 0) { ?>
                                                <td class="text-center text-disable">ปิดการใช้งาน</td>
                                            <?php } else { ?>
                                                <td class="text-center">เปิดใช้งาน</td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <button type="button"
                                                        name="button-edit<?php echo $config_group['config_group_id']; ?>"
                                                        id="button-edit"
                                                        class="btn btn-warning button-edit">แก้ไข
                                                </button>
                                                <button type="button"
                                                        name="button-delete<?php echo $config_group['config_group_id']; ?>"
                                                        id="button-delete" class="btn btn-danger button-delete">ลบ
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

            <!-- list config_group-->

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
        document_on: [
            'keyup,#input-search'
            , 'click,#button-save'
            , 'click,.button-edit'
            , 'click,.button-delete'
            , 'click,.paging'
            , 'change,#filter-number'
            , 'change,#filter-status'
        ], document_ready: [
            get_paging
        ]
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
                location.reload();
                reload_config_group();
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

                reload_config_group();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
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
        var config_group_id = this.name.replace("button-edit", "");
        window.open("<?php echo base_url(); ?>config_group/get_form?config_group_id=" + config_group_id, "_self");
    });

    $(document).on("click", ".button-delete", function () {
        var config_group_id = this.name.replace("button-delete", "");
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

                    reload_config_group();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }

    });

    $(document).on("keyup", "#input-search", function () {
        search_user();
        get_paging();
    });

    $(document).on("change", "#filter-number", function () {
        search_user();
        get_paging();
    });

    $(document).on("change", "#filter-status", function () {
        search_user();
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
        search_user();
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

                    switch (Number(config_group.config_group_status))  {
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
                        + "<td class='text-center'>" + config_group.create_date + "</td>"
                        + "<td class='text-center'>" + config_group.create_by_name + "</td>"
                        + "<td class='text-center'>" + config_group.update_date + "</td>"
                        + "<td class='text-center'>" + config_group.update_by_name + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + "<td class='text-center'>"
                        + "<button type='button' name='button-edit" + config_group.config_group_id + "' id='button-edit' "
                        + " class='btn btn-warning button-edit'>แก้ไข</button>"
                        + " <button type='button' name='button-delete" + config_group.config_group_id + "' id='button-delete' "
                        + " class='btn btn-danger button-delete'>ลบ</button>"
                        + "</td>"
                        + "</tr>";

                    $("#tbody").append(html);
                }
                //label_format_number();
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
        var filterStatus = $("#filter-status").val();

        $.ajax({
            url: '<?php echo base_url(); ?>config_group/search_user',
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
                var config_groups = data["list"];

                console.log(json);
                $("#tbody").empty();
                for (var i = 0; i < config_groups.length; i++) {
                    var config_group = config_groups[i]

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
                        + "<td class='text-center'>" + config_group.create_date + "</td>"
                        + "<td class='text-center'>" + config_group.create_by_name + "</td>"
                        + "<td class='text-center'>" + config_group.update_date + "</td>"
                        + "<td class='text-center'>" + config_group.update_by_name + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + "<td class='text-center'>"
                        + "<button type='button' name='button-edit" + config_group.config_group_id + "' id='button-edit' "
                        + " class='btn btn-warning button-edit'>แก้ไข</button>"
                        + " <button type='button' name='button-delete" + config_group.config_group_id + "' id='button-delete' "
                        + " class='btn btn-danger button-delete'>ลบ</button>"
                        + "</td>"
                        + "</tr>";
                    $("#tbody").append(html);
                }
                //label_format_number();
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

//        filterPage=1;
//        console.log(txtSearch);
//        console.log(filterNumber);
//        console.log(filterPage);
//        console.log(filterStatus);
        $.ajax({
            url: '<?php echo base_url(); ?>config_group/get_paging',
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