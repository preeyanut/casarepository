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

    function validate_setting_default() {
        var obj_setting_default = get_default_setting();
        // console.log(JSON.stringify(obj_setting_default));
        $.ajax({
            url: '<?php echo base_url(); ?>user/validate_setting_default',
            type: 'post',
            data: "setting_default=" + JSON.stringify(obj_setting_default),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {

                // alert("เพิ่มข้อมูลผู้ใช้งานเสร็จสิ้น");

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function get_default_setting() {

        var array_setting_default = [];

        var lotto_type = $("#tbody-setting-default").find("tr");
        for (var i = 0; i < lotto_type.length; i++) {

            var lotto_type_id = lotto_type[i].id.replace("lotto_type_id", "");

            var tr_id = lotto_type[i].id;
            // var intValue = Number(lotto_type[i].value);
            var minimum = $("#" + tr_id).find("#minimum").val().replace(",", "");
            var maximum = $("#" + tr_id).find("#maximum").val().replace(",", "");
            var reward = $("#" + tr_id).find("#reward").val().replace(",", "");
            var commission = $("#" + tr_id).find("#commission").val().replace(",", "");

            var setting_default = {
                lotto_type_id: lotto_type_id,
                minimum: minimum,
                maximum: maximum,
                reward: reward,
                commission: commission

            };
            array_setting_default.push(setting_default);

        }

        console.log(array_setting_default);

        return array_setting_default;
    }

    function get_percent_setting() {
        var array_percent_setting = [];
        //---------  My Percent
        var my_percents = $(".my_percent_user");
        var sub_percents = $(".sub_percent_user");
        for (var i = 0; i < my_percents.length; i++) {

            var lotto_type_id = my_percents[i].id.replace("my_percent", "");
            var my_percent = Number(my_percents[i].value);
            var sub_percent = Number(sub_percents[i].value);

            var percent = {
                lotto_type_id: lotto_type_id,
                my_percent: my_percent,
                sub_percent: sub_percent,
            }
            array_percent_setting.push(percent);
        }
        return array_percent_setting;
    }

    $(document).on("focusout", "#minimum", function () {
        var tr_id = this.closest("tr").id;
        var value = Number(this.value.replace(",", ""));
        var min_value = Number($('#' + tr_id).find('#minimum').attr('data-min').replace(",", ""));
        var max_value = Number($('#' + tr_id).find('#minimum').attr('data-max').replace(",", ""));

        if (value > max_value) {
            this.value = max_value;
            alert("รับสูงสุดได้ : " + max_value);
        }
//        if (value < min_value) {
//            this.value = min_value;
//            alert("รับขั้นต่ำได้ : " + min_value);
//        }

    });

    $(document).on("focusout", "#reward", function () {
        var tr_id = this.closest("tr").id;
        var value = Number(this.value.replace(",", ""));
        var min_value = Number($('#' + tr_id).find('#reward').attr('data-min').replace(",", ""));
        var max_value = Number($('#' + tr_id).find('#reward').attr('data-max').replace(",", ""));

        if (value > max_value) {
            this.value = max_value;
            alert("รับสูงสุดได้ : " + max_value);
        }
        if (value < min_value) {
            this.value = min_value;
            alert("รับขั้นต่ำได้ : " + min_value);
        }
    });

    $(document).on("focusout", "#maximum", function (){
        var tr_id = this.closest("tr").id;
        var value = Number(this.value.replace(",", ""));
        var min_value = Number($('#' + tr_id).find('#maximum').attr('data-min').replace(",", ""));
        var max_value = Number($('#' + tr_id).find('#maximum').attr('data-max').replace(",", ""));

//        if (value > max_value) {
//            this.value = max_value;
//            alert("รับสูงสุดได้ : " + max_value);
//        }
        if (value < min_value) {
            this.value = min_value;
            alert("รับขั้นต่ำได้ : " + min_value);
        }

    });

    $(document).on("focusout", "#commission", function () {
        var tr_id = this.closest("tr").id;
        var value = Number(this.value.replace(",", ""));
        var min_value = Number($('#' + tr_id).find('#commission').attr('data-min').replace(",", ""));
        var max_value = Number($('#' + tr_id).find('#commission').attr('data-max').replace(",", ""));

        if (value > max_value) {
            this.value = formatNumber(max_value);
            alert("รับสูงสุดได้ : " + max_value);
        }
        if (value < min_value) {
            this.value = formatNumber(min_value);;
            alert("รับขั้นต่ำได้ : " + min_value);
        }

    });

    $(document).on("focusout", "#tbody-setting-default input", function () {
        var arr_value = this.value.split(".");
        if (arr_value.length < 2) {
            this.value = formatNumber(Number(this.value));
//            this.value = this.value+".00";
        }
    });

    $(document).on("focusout", "#input-user-credit", function () {

        var test = this.value;

        var value = Number(this.value.replace(/,/g, ""));
        var min_value = Number(0);
        var max_value = Number(this.max);

        if (max_value == "-1") {
            this.value = formatNumber(value);
            if (value < min_value) {
                this.value = formatNumber(min_value);
                alert("ให้เครดิตขั้นต่ำ 0.00 บาท ");
            }
        } else {
            if (value > max_value) {
                this.value = formatNumber(max_value);
                alert("เครดิตของคุณมีไม่พอแบ่งให้ Sub Agent : " + formatNumber(max_value));
            }
            if (value < min_value) {
                this.value = formatNumber(min_value);
                alert("ให้เครดิตขั้นต่ำ 0.00 บาท ");
            }
        }
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

                // alert("เพิ่มข้อมูลผู้ใช้งานเสร็จสิ้น");
                add_default_setting(json.Data.user_id);
                add_percent_setting(json.Data.user_id);

                // upload file
//                uploadImage(json.Data.user_id);
//
//                reloadListEmployee();
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
                // alert("แก้ไขข้อมูลผู้ใช้งานเสร็จสิ้น");

                edit_default_setting(user_id);
                edit_percent_setting(user_id);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function add_default_setting(user_id) {

        var str_json = JSON.stringify(get_default_setting());
        console.log(str_json);
        $.ajax({
            url: '<?php echo base_url(); ?>user/add_default_setting',
            type: 'post',
            data: "default_setting=" + str_json + "&user_id=" + user_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {

                //alert("Save Default Setting Success.");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function add_percent_setting(user_id) {
        var str_json = JSON.stringify(get_percent_setting());
        $.ajax({
            url: '<?php echo base_url(); ?>user/add_percent_setting',
            type: 'post',
            data: "percent_setting=" + str_json + "&user_id=" + user_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {

                // alert("Save Percent Setting Success.");

                // upload file
//                uploadImage(json.Data.user_id);
//
//                reloadListEmployee();
                window.open("<?php echo base_url(); ?>user?user_id=" + user_id, "_self");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_default_setting(user_id) {

        var str_json = JSON.stringify(get_default_setting());
        console.log(str_json);
        $.ajax({
            url: '<?php echo base_url(); ?>user/edit_default_setting',
            type: 'post',
            data: "default_setting=" + str_json + "&user_id=" + user_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {

                //alert("Save Default Setting Success.");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_percent_setting(user_id) {
        var str_json = JSON.stringify(get_percent_setting());
        $.ajax({
            url: '<?php echo base_url(); ?>user/edit_percent_setting',
            type: 'post',
            data: "percent_setting=" + str_json + "&user_id=" + user_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save').button('loading');
            },
            complete: function () {
                $('#button-save').button('reset');
            },
            success: function (json) {

                window.open("<?php echo base_url(); ?>user?user_id=" + user_id, "_self");
                //alert("Save Percent Setting Success.");

                // upload file
//                uploadImage(json.Data.user_id);
//
//                reloadListEmployee();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }



    $(document).on("change", ".my_percent_user", function () {

        console.log("..1");
        var tr_id = this.closest("tr").id;
        var value = Number(this.value.replace(",", ""));
        var min_value = Number(this.min);
        var max_value = Number(this.max);

        if (value > max_value) {
            this.value = max_value;
            alert("แบ่งได้สูงสุดได้ : " + max_value);
        }
        if (value < min_value) {
            this.value = min_value;
            alert("แบ่งต่ำสุดได้ : " + min_value);
        }


        var lotto_type_id = this.id.replace("my_percent", "");
        var percent = max_value - Number(this.value);
        $("#sub_percent" + lotto_type_id).val(formatNumber(percent));

    });

    $(document).on("change", ".sub_percent_user", function () {
        console.log("..2");

        var tr_id = this.closest("tr").id;
        var value = Number(this.value.replace(",", ""));
        var min_value = Number(this.min);
        var max_value = Number(this.max);

        if (value > max_value) {
            this.value = max_value;
            alert("แบ่งได้สูงสุดได้ : " + max_value);
        }
        if (value < min_value) {
            this.value = min_value;
            alert("แบ่งต่ำสุดได้ : " + min_value);
        }

        var lotto_type_id = this.id.replace("sub_percent", "");
        var percent = max_value - Number(this.value);
        $("#my_percent" + lotto_type_id).val(formatNumber(percent));

    });

    $(document).on("focusout", ".my_percent_user", function () {
        console.log("..3");
        var arr_value = this.value.split(".");
        if (arr_value.length < 2) {
            this.value = formatNumber(Number(this.value));
//            this.value = this.value+".00";
        }
    });

    $(document).on("focusout", ".sub_percent_user", function () {
        console.log("..4");
        var arr_value = this.value.split(".");
        if (arr_value.length < 2) {
            this.value = formatNumber(Number(this.value));
//            this.value = this.value+".00";
        }
    });


</script>