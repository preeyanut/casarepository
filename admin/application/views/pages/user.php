<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        User
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
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
                        <h3 class="box-title">ข้อมูลผู้ใช้งาน</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-user"
                          class=" box-body">

                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"
                               id="user_id" class="form-control"/>

                        <div class="row">
                            <div class="form-group required col-md-3">
                                <label class=" control-label" for="input-username">ชื่อเข้าใช้งาน</label>

                                <div class="">
                                    <input type="text" name="username" value="<?php echo $username; ?>"
                                           placeholder="ชื่อเข้าใช้งาน" id="input-username"
                                           class="form-control"/>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-3">
                                <label class=" control-label" for="input-password">รหัสผ่าน</label>

                                <div class="">
                                    <input type="password" name="password" value="<?php echo $password; ?>"
                                           placeholder="รหัสผ่าน" id="input-password"
                                           class="form-control" autocomplete="off"/>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-3">
                                <label class=" control-label" for="input-confirm">ยืนยันรหัสผ่าน</label>

                                <div class="">
                                    <input type="password" name="confirm" value="<?php echo $confirm; ?>"
                                           placeholder="ยืนยันรหัสผ่าน" id="input-confirm"
                                           class="form-control"/>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group required col-md-3">
                                <label class=" control-label" for="input-user-group">กลุ่มผู้ใช้งาน</label>
                                <div class="">
                                    <select name="user_group_id" id="input-user-group" class="form-control">
                                        <?php foreach ($user_groups as $user_group) { ?>
                                            <?php

                                            if ($user_group['user_group_id'] === "1" && $this->session->userdata('user_group_id') !== "1") {

                                            } else {
                                                if ($user_group['user_group_id'] == $user_group_id) {
                                                    ?>
                                                    <option value="<?php echo $user_group['user_group_id']; ?>"
                                                            selected="selected"><?php echo $user_group['name']; ?></option>
                                                <?php } else { ?>
                                                    <option
                                                        value="<?php echo $user_group['user_group_id']; ?>"><?php echo $user_group['name']; ?></option>
                                                <?php } ?>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group required col-md-4">
                                <label class=" control-label" for="input-firstname">ชื่อผู้ใช้งาน</label>

                                <div class="">
                                    <input type="text" name="firstname" value="<?php echo $firstname; ?>"
                                           placeholder="ชื่อผู้ใช้งาน" id="input-firstname"
                                           class="form-control"/>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group required col-md-4">
                                <label class="control-label" for="input-lastname">นามสกุล</label>

                                <div class="">
                                    <input type="text" name="lastname" value="<?php echo $lastname; ?>"
                                           placeholder="นามสกุล" id="input-lastname"
                                           class="form-control"/>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class=" control-label" for="input-user-type">สถานะ</label>

                                <div class="">
                                    <select name="user_status" id="input-status" class="form-control">

                                        <option
                                            value="0" <?php if ($user_status === 0) { ?> selected="selected" <?php } ?> >
                                            ปกติ
                                        </option>
                                        <option
                                            value="1" <?php if ($user_status === 1) { ?> selected="selected" <?php } ?>>
                                            ระงับ
                                        </option>
                                        <option
                                            value="2" <?php if ($user_status === 2) { ?> selected="selected" <?php } ?>>
                                            ปิดใช้งาน
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group required col-md-4">
                                <label class=" control-label" for="input-email">อีเมล์</label>

                                <div class="">
                                    <input type="text" name="user_email" value="<?php echo $user_email; ?>"
                                           placeholder="อีเมล์" id="input-email" class="form-control"/>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group required col-md-4">
                                <label class=" control-label"
                                       for="input-user-telephone">เบอร์โทรศัพท์</label>

                                <div class="">
                                    <input type="text" min="0" name="user_telephone"
                                           value="<?php echo $user_telephone; ?>"
                                           placeholder="เบอร์โทรศัพท์" id="input-user-telephone"
                                           class="form-control"/>
                                </div>
                                <div class="text-danger"></div>
                            </div>
                        </div>
                </div>
                <!-- /.box -->
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

<script type="text/javascript">

    init_event({
        document_on:[
            'click,#button-save'
        ]
    });

    $(document).on("click", "#button-save", function () {
        $.ajax({
            url: '<?php echo base_url(); ?>user/validate_form',
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
                        $("input[name='" + input_name + "']").after('<div class="text-danger">' + json['error'][input_name] + '</div>');
                        $("select[name='" + input_name + "']").after('<div class="text-danger">' + json['error'][input_name] + '</div>');
                        p++;
                    }

                    // Highlight any found errors
                    $('.text-danger').parentsUntil('.form-group').parent().addClass('has-error');
                } else {

                    if ($('input[name="user_id"]').val()) {
                        edit_user();
                    } else {
                        add_user();
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

    function add_user() {
        $.ajax({
            url: '<?php echo base_url(); ?>user/add_user',
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
//                alert("เพิ่มข้อมูลผู้ใช้งานเสร็จสิ้น");
                var result = confirm("เพิ่มข้อมูลผู้ใช้งานเสร็จสิ้น");
                if (result == true) {
                    window.open("<?php echo base_url(); ?>user?user_id=" + json.Data.user_id, "_self");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_user() {
        var user_id = $('input[name="user_id"]').val();
        $.ajax({
            url: '<?php echo base_url(); ?>user/edit_user',
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

//                edit_default_setting(user_id);
//                edit_percent_setting(user_id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

</script>