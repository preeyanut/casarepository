<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        category type
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">category type</li>
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
                        <h3 class="box-title">ข้อมูลพื้นฐานประเภทหมวดหมู่</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="category_type_id" value="<?php echo $category_type_id; ?>"
                               id="category_type_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-type-name">ชื่อประเภท</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="category_type_name"
                                               value="<?php echo $category_type_name; ?>"
                                               placeholder="ชื่อประเภท" id="input-type-name"
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
                                        <select name="category_type_status" id="input-status" class="form-control">
                                            <option
                                                value="0" <?php if ($category_type_status == 0) { ?>
                                                selected="selected" <?php } ?> >
                                                ปิดการใช้งาน
                                            </option>
                                            <option
                                                value="1" <?php if ($category_type_status == 1) { ?>
                                                selected="selected" <?php } ?>>
                                                เปิดใช้งาน
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ชนิดข้อมูลภายในประเภทหมวดหมู่</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div id="form-field" class=" box-body">

                        <div class="row">

                            <div id="containner-category-field">


                                <input id="count-field" type="hidden" value="<?php if ($category_field) {
                                    echo sizeof($category_field);
                                } else {
                                    echo 0;
                                } ?>">
                                <?php if ($category_field) {
                                    $count = 1;
                                    foreach ($category_field as $item) { ?>

                                        <div id="field-type-<?= $count; ?>"
                                             class="div-field-type form-group required col-md-12 col-xs-12">
                                            <div class="col-md-2 col-xs-2" align="right">
                                                <label class=" control-label" for="input-field-type">ชื่อประเภท</label>
                                            </div>
                                            <div class="col-md-3 col-xs-3">
                                                <div class="">
                                                    <select name="field_type" id="input-field-type"
                                                            class="form-control">
                                                        <option
                                                            value="text" <?php if ($item['field_type'] == 'text') { ?>
                                                            selected="selected" <?php } ?> >
                                                            Text
                                                        </option>
                                                        <option
                                                            value="textarea" <?php if ($item['field_type'] == 'textarea') { ?>
                                                            selected="selected" <?php } ?>>
                                                            Textarea
                                                        </option>
                                                        <option
                                                            value="date" <?php if ($item['field_type'] == 'date') { ?>
                                                            selected="selected" <?php } ?>>
                                                            Date
                                                        </option>
                                                        <option
                                                            value="time" <?php if ($item['field_type'] == 'time') { ?>
                                                            selected="selected" <?php } ?>>
                                                            Time
                                                        </option>
                                                        <option
                                                            value="datetime" <?php if ($item['field_type'] == 'datetime') { ?>
                                                            selected="selected" <?php } ?>>
                                                            Datetime
                                                        </option>
                                                        <option
                                                            value="video-url" <?php if ($item['field_type'] == 'video-url') { ?>
                                                            selected="selected" <?php } ?>>
                                                            Video-URL
                                                        </option>
                                                        <option
                                                            value="image" <?php if ($item['field_type'] == 'image') { ?>
                                                            selected="selected" <?php } ?>>
                                                            Image
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>
                                            <div class="col-md-3 col-xs-3">
                                                <div class="">
                                                    <input type="text" name="field_name"
                                                           value="<?php echo $item['field_name']; ?>"
                                                           placeholder="ชื่อข้อมูล" id="input-field-name"
                                                           class="form-control"/>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>
                                            <div class="col-md-3 col-xs-3">
                                                <div class="">
                                                    <input type="text" name="field_id"
                                                           value="<?php echo $item['field_id']; ?>"
                                                           placeholder="ชื่อระบุชนิดเจาะจง" id="input-field-id"
                                                           class="form-control"/>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>

                                            <div class="col-md-1 col-xs-1">
                                                <div class="">
                                                    <button type="button" id="button-delete-<?= $count; ?>"
                                                            class="button-delete btn btn-danger"> ลบ
                                                    </button>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>
                                        </div>
                                        <?php
                                        $count++;
                                    } ?>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="form-group col-md-6" style="text-align: right;">
                            <br>

                            <div class="">
                                <button type="button" id="button-add-field" class="btn btn-success"> เพิ่ม +</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>


            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <div id="div-button-submit" class="box-body">

                        <input type="hidden" name="category_type_id" value="<?php echo $category_type_id; ?>"
                               id="category_type_id" class="form-control"/>

                        <div class="row">

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

                <div class="display-none">
                    <div class="box-body border-radius-none">
                        <div class="chart" id="line-chart" style="height: 250px;"></div>
                    </div>
                    <div class="box-body">
                        <div id="world-map" style="height: 250px; width: 100%;"></div>
                    </div>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart"
                             style="position: relative; height: 300px;"></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>
                <!-- /.row -->
    </section>

</div>

<script type="text/javascript">

    init_event({
        document_on: [
            'click,#button-add-field'
            , 'click,#button-save'
            , 'click,.button-delete'
        ]

    });

    $(document).on("click", "#button-add-field", function () {

        var count_field = $('#count-field').val();
        console.log(count_field);
        count_field++;
        $('#count-field').val(count_field);
        $('#containner-category-field').append(
            ' <div id="field-type-' + count_field + '" class="div-field-type form-group required col-md-12 col-xs-12">'
            + '<div class="col-md-2 col-xs-2" align="right">'
            + '<label class=" control-label" for="input-field-type">ชื่อประเภท</label>'
            + '</div>'
            + '<div class="col-md-3 col-xs-3">'
            + '<div class="">'
            + '<select name="field_type" id="input-field-type"  class="form-control">'
            + '<option  value="text" selected="selected"> Text </option>'
            + '<option  value="textarea" > Textarea </option>'
            + '<option  value="date" > Date </option>'
            + '<option  value="time" > Time </option>'
            + '<option  value="datetime" > Datetime </option>'
            + '<option  value="video-url" > Video-URL </option>'
            + '<option  value="image" > Image </option>'
            + '</select>'
            + '</div>'
            + '<div class="text-danger"></div>'
            + '</div>'
            + '<div class="col-md-3 col-xs-3">'
            + '<div class="">'
            + '<input type="text" name="field_name"  placeholder="ชื่อข้อมูล" id="input-field-name" class="form-control"/> '
            + '</div>'
            + '<div class="text-danger"></div>'
            + '</div>'
            + '<div class="col-md-3 col-xs-3">'
            + ' <div class="">'
            + '<input type="text" name="field_id" placeholder="ชื่อระบุชนิดเจาะจง" id="input-field-id" class="form-control"/>'
            + '</div>'
            + '<div class="text-danger"></div>'
            + '</div>'
            + '<div class="col-md-1 col-xs-1">'
            + '<div class="">'
            + ' <button type="button" id="button-delete-' + count_field + '" class="button-delete btn btn-danger"> ลบ</button>'
            + '</div>'
            + '<div class="text-danger"></div>'
            + '</div>'
            + '</div>'
        )
    });

    $(document).on("click", "#button-save", function () {

        $('.alert, .text-danger').remove();
        $('.form-group').removeClass('has-error');

        var category_type_name = $('input[name="category_type_name"]').val();
        var is_error = false;

        if (category_type_name.length == 0) {
            $("input[name='category_type_name']").after('<div class="text-danger">กรุณากรอกประเภทหมวดหมู่</div>');
            is_error = true;
        }


//        ---------------------- Check data Field is Exist
        var all_category_type = $('.div-field-type');
        var category_field = [];
        var div_field_type_number = [];
        for (var i = 1; i < div_field_type_number.length; i++) {

            var field_type = $('#field-type-' + div_field_type_number[i] + ' select[name="field_type"').val();
            var field_name = $('#field-type-' + div_field_type_number[i] + ' input[name="field_name"').val();
            var field_id = $('#field-type-' + div_field_type_number[i] + ' input[name="field_id"').val();

            var data_item = {
                category_type_id: category_type_id
                , field_type: field_type
                , field_name: field_name
                , field_id: field_id
            };
            category_field.push(data_item);
        }

        if (category_field.length === 0 && all_category_type.length > 0) {

            if ($('input[name="field_name"]').val().length != 0 && $('input[name="field_id"]').val().length != 0) {
                div_field_type_number.push(i);
            } else if ($('input[name="field_name"] ').val().length != 0 && $('input[name="field_id"]').val().length == 0) {
                $('input[name="field_id"]').after('<div class="text-danger error-text">กรุณาระบุชื่อเฉพาะ</div>');
                is_error = true;
            } else if ($('input[name="field_name"]').val().length == 0 && $('input[name="field_id"]').val().length != 0) {
                $('input[name="field_name"]').after('<div class="text-danger error-text">กรุณากรอกชื่อชนิดข้อมูล</div>');
                is_error = true;
            } else {
                is_error = true;
                $('input[name="field_id"]').after('<div class="text-danger error-text">กรุณาระบุชื่อเฉพาะ</div>');
                $('input[name="field_name"]').after('<div class="text-danger error-text">กรุณากรอกชื่อชนิดข้อมูล</div>');
            }

        } else if (all_category_type.length > 0) {
            for (var i = 1; i <= all_category_type.length; i++) {
                if ($('#field-type-' + i + ' input[name="field_name"]').val().length != 0 && $('#field-type-' + i + ' input[name="field_id"]').val().length != 0) {
                    div_field_type_number.push(i);
                } else if ($('#field-type-' + i + ' input[name="field_name"] ').val().length != 0 && $('#field-type-' + i + ' input[name="field_id"]').val().length == 0) {
                    $('#field-type-' + i + ' input[name="field_id"]').after('<div class="text-danger error-text">กรุณาระบุชื่อเฉพาะ</div>');
                    is_error = true;
                } else if ($('#field-type-' + i + ' input[name="field_name"]').val().length == 0 && $('#field-type-' + i + ' input[name="field_id"]').val().length != 0) {
                    $('#field-type-' + i + ' input[name="field_name"]').after('<div class="text-danger error-text">กรุณากรอกชื่อชนิดข้อมูล</div>');
                    is_error = true;
                }
            }
        } else {
            alert('กรุณาเพิ่มข้อชนิดข้อมูล อย่างน้อย 1 ชนิด');
            is_error = true;
        }

        if (!is_error) {
            if ($('input[name="category_type_id"]').val()) {
                edit_category_type(div_field_type_number);
            } else {
                add_category_type(div_field_type_number);
            }
        }
    });

    $(document).on("click", ".button-delete", function () {

        var field_type_id = this.id.replace('button-delete-', '');
        console.log(field_type_id);

        $('#field-type-' + field_type_id).remove();

    });

    function add_category_type(div_field_type_number) {
        $.ajax({
            url: '<?php echo base_url(); ?>category_type/add_category_type',
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
                if (json.Result) {
                    add_category_field(json.Data.category_type_id, div_field_type_number);
                } else {
                    alert("เพิ่มข้อมูลผิดพลาด");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function add_category_field(category_type_id, div_field_type_number) {

        var category_field = [];
        for (var i = 0; i < div_field_type_number.length; i++) {

            var field_type = $('#field-type-' + div_field_type_number[i] + ' select[name="field_type"').val();
            var field_name = $('#field-type-' + div_field_type_number[i] + ' input[name="field_name"').val();
            var field_id = $('#field-type-' + div_field_type_number[i] + ' input[name="field_id"').val();

            var data_item = {
                category_type_id: category_type_id
                , field_type: field_type
                , field_name: field_name
                , field_id: field_id
            };
            category_field.push(data_item);
        }

        console.log(category_field);
//
        $.ajax({
            url: '<?php echo base_url(); ?>category_type/add_category_field',
            type: 'post',
            data: {category_field: category_field},
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
                if (json.Result) {
                    alert("เพิ่มข้อมูลเสร็จสิ้น");
                    clear_input_blank();
                } else {
                    alert("เพิ่มข้อมูลผิดพลาด");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_category_type(div_field_type_number) {

        var category_type_id = $('input[name="category_type_id"]').val();
        var category_type_name = $('input[name="category_type_name"]').val();
        var category_type_status = $('select[name="category_type_status"]').val();

        var data_category_type = {
            category_type_id: category_type_id
            , category_type_name: category_type_name
            , category_type_status: category_type_status
        };

        console.log(data_category_type);

        var category_field = [];
        for (var i = 0; i < div_field_type_number.length; i++) {

            var field_type = $('#field-type-' + div_field_type_number[i] + ' select[name="field_type"').val();
            var field_name = $('#field-type-' + div_field_type_number[i] + ' input[name="field_name"').val();
            var field_id = $('#field-type-' + div_field_type_number[i] + ' input[name="field_id"').val();

            var data_item = {
                category_type_id: category_type_id
                , field_type: field_type
                , field_name: field_name
                , field_id: field_id
            };
            category_field.push(data_item);
        }

        console.log(category_field);

        $.ajax({
            url: '<?php echo base_url(); ?>category_type/edit_category_type',
            type: 'post',
            data: {data_category_type: data_category_type, category_field: category_field},
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

    function clear_input_blank() {
        $('#input-type-name').val('');
        $('#input-status').val('0');
        $('.div-field-type').remove();
    }

</script>