<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Employee Group
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employee Group</li>
    </ol>
</section>

<!-- Main content -->
<div id="container-content">

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee Group</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-user"
                          class="form-horizontal box-body">

                        <input type="hidden" name="user_group_id" value="<?php echo $user_group_id; ?>"
                               id="user_group_id" class="form-control"/>

                        <div class="form-group required">
                            <label class="col-sm-3 control-label" for="input-username">ชื่อกลุ่มพนักงาน</label>

                            <div class="col-sm-9">
                                <input type="text" name="name" value="<?php echo $name; ?>"
                                       placeholder="ชื่อกลุ่มพนักงาน" id="input-name"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-gl-2 col-md-2 col-sm-12">
                                <label class="control-label">เข้าถึง</label>
                            </div>
                            <div class="col-gl-10 col-md-10 col-sm-12">
                                <div class="well well-sm" style="height: 150px; overflow: auto;">
                                    <?php foreach ($permissions as $permission) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <?php if (in_array($permission, $access)) { ?>
                                                    <input type="checkbox" name="permission[access][]"
                                                           value="<?php echo $permission; ?>" checked="checked"/>
                                                    <?php echo $permission; ?>
                                                <?php } else { ?>
                                                    <input type="checkbox" name="permission[access][]"
                                                           value="<?php echo $permission; ?>"/>
                                                    <?php echo $permission; ?>
                                                <?php } ?>
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">เลือกทั้งหมด</a>
                                / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">ไม่เลือกทั้งหมด</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-gl-2 col-md-2 col-sm-12">
                                <label class="control-label">แก้ไข</label>
                            </div>
                            <div class="col-gl-10 col-md-10 col-sm-12">
                                <div class="well well-sm" style="height: 150px; overflow: auto;">
                                    <?php foreach ($permissions as $permission) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <?php if (in_array($permission, $modify)) { ?>
                                                    <input type="checkbox" name="permission[modify][]"
                                                           value="<?php echo $permission; ?>" checked="checked"/>
                                                    <?php echo $permission; ?>
                                                <?php } else { ?>
                                                    <input type="checkbox" name="permission[modify][]"
                                                           value="<?php echo $permission; ?>"/>
                                                    <?php echo $permission; ?>
                                                <?php } ?>
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">เลือกทั้งหมด</a>
                                / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">ไม่เลือกทั้งหมด</a>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6 text-left">
                                <?php if ($user_group_id) { ?>
                                    <a href="<?= base_url() ?>user_group"
                                    <button type="button" class="btn btn-default">กลับ</button>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="reset" class="btn btn-default">ยกเลิก</button>
                                <button type="button" id="button-save" class="btn btn-primary"> บันทึก</button>
                            </div>
                        </div>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Employee</h3>
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
                    <form action="<?php //echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-user">
                        <div class="table-responsive  box-body ">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">รหัสกลุ่มพนักงาน</td>
                                    <td class="text-left">ชื่อกลุ่มพนักงาน</td>
                                    <td class="text-left">จัดการ</td>
                                </tr>
                                </thead>
                                <tbody id="tbody-user-group">
                                <?php if ($list) { ?>
                                    <?php foreach ($list as $user_group) { ?>
                                        <tr>
                                            <td class="text-left"><?php echo $user_group['user_group_id']; ?></td>
                                            <td class="text-left"><?php echo $user_group['name']; ?></td>
                                            <td class="text-left">
                                                <button type="button"
                                                        name="button-edit-<?php echo $user_group['user_group_id']; ?>"
                                                        id="button-edit"
                                                        class="btn btn-warning button-edit">แก้ไข
                                                </button>
                                                <button type="button"
                                                        name="button-delete-<?php echo $user_group['user_group_id']; ?>"
                                                        id="button-delete"
                                                        class="btn btn-danger button-delete">ลบ
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

<script type="application/javascript">

    init_event({
        fn: [readyFn],
        disEvent: ["click,#button-save","click,.button-edit","click,.button-delete"]
    });

    function readyFn(){
//        $('#input-user-credit').maskMoney();
//        $('.input-number').maskMoney();
    }

    $(document).on("click", "#button-save", function (){
        $.ajax({
            url: '<?php echo base_url(); ?>user_group/validate_form',
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
                        p++;
                    }

                    // Highlight any found errors
                    $('.text-danger').parentsUntil('.form-group').parent().addClass('has-error');
                } else {

                    if ($('input[name="user_group_id"]').val()) {
                        editEmployee();
                    } else {
                        addEmployee();
                    }
                    // Refresh products, vouchers and totals
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
        var user_group_id = this.name.replace("button-edit-", "");
        window.open("<?php echo base_url(); ?>user_group?user_group_id=" + user_group_id, "_self");
    });

    function addEmployee() {
        $.ajax({
            url: '<?php echo base_url(); ?>user_group/add',
            type: 'post',
            data: $('input[name=name], input[type=checkbox]:checked'),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {

                alert("เพิ่มข้อมูลกลุ่มพนักงานเสร็จสิ้น");
                reloadListUserGroup();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function editEmployee() {
        $.ajax({
            url: '<?php echo base_url(); ?>user_group/edit',
            type: 'post',
            data: $('input[name=name], input[name=user_group_id], input[type=checkbox]:checked'),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {

                alert("แก้ไขข้อมูลกลุ่มพนักงานเสร็จสิ้น");

                reloadListUserGroup();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    $(document).on("click", ".button-delete", function () {
        var user_group_id = this.name.replace("button-delete-", "");
        var result = confirm("ยืนยันการลบข้อมูลกลุ่มพนักงาน");
        if (result == true) {
            $.ajax({
                url: '<?php echo base_url(); ?>user_group/delete',
                type: 'post',
                data: "user_group_id=" + user_group_id,
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

    function reloadListUserGroup() {
        $("#tbody-user-group").empty();

        $.ajax({
            url: '<?php echo base_url(); ?>user_group/get_all_user_group',
            type: 'post',
            data: "user_group_id=" + user_group_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                //  $('#button-delete').button('loading');
            },
            complete: function () {
                //$('#button-delete').button('reset');
            },
            success: function (json) {
                var data = json.Data;
                var user_groups = data["list"];

                for (var i = 0; i < user_groups.length; i++) {
                    var user_group = user_groups[i];
                    var html = "<tr>"
                        + "<td class='text-left'>" + user_group.user_group_id + "</td>"
                        + "<td class='text-left'>" + user_group.name + "</td>"
                        + "<td class='text-left'>"
                        + "<button type='button' name='button-edit-" + user_group.user_group_id + "' id='button-edit' "
                        + " class='btn btn-warning button-edit'>แก้ไข</button>"
                        + " <button type='button' name='button-delete-" + user_group.user_group_id + "' id='button-delete' "
                        + " class='btn btn-danger button-delete'>ลบ</button>"
                        + "</td>"
                        + "</tr>";
                    $("#tbody-user-group").append(html);
                }
                // alert("get user_group OK");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    var interval;

</script>