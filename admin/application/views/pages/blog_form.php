<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-select.js"></script>

<script type="text/javascript" src="<?= base_url() ?>plugins/datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?= base_url() ?>plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>plugins/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

<link href="<?= base_url() ?>plugins/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>plugins/clockpicker/dist/bootstrap-clockpicker.min.css">

<style>
    .input-append .add-on:last-child, .input-append .btn:last-child, .input-append .btn-group:last-child > .dropdown-toggle {
        -webkit-border-radius: 0 4px 4px 0;
        -moz-border-radius: 0 4px 4px 0;
        border-radius: 0 4px 4px 0;
    }

    .input-append .add-on, .input-append .btn, .input-append .btn-group {
        margin-left: -1px;
    }

    .input-append .add-on, .input-prepend .add-on, .input-append .btn, .input-prepend .btn, .input-append .btn-group > .dropdown-toggle, .input-prepend .btn-group > .dropdown-toggle {
        vertical-align: top;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }

    .input-append .add-on, .input-prepend .add-on {
        display: inline-block;
        width: auto;
        height: 34px;
        min-width: 16px;
        padding: 4px 5px;
        font-size: 14px;
        font-weight: normal;
        line-height: 20px;
        text-align: center;
        text-shadow: 0 1px 0 #fff;
        background-color: #eee;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .input-append, .input-prepend {
        margin-bottom: 5px;
        font-size: 0;
        white-space: nowrap;
        padding: 0px;
    }

    body {
        margin: 0;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 20px;
        color: #333;
        background-color: #fff;
    }

    .input-datetime {
        float: left;
        min-width: 200px;
        width: 20%;
        /*padding: 0px;*/

    }

    .mar-top-5 {
        margin-top: 5px;
    }

    .bootstrap-datetimepicker-widget ul {
        padding-left: 0px !important;
    }

    .time-picker, .date-picker {
        min-width: 200px;
        width: 20%;
        cursor: default !important
    }
</style>

<section class="content-header">
    <h1>
        Blog
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blog</li>
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
                        <h3 class="box-title">ข้อมูลพื้นฐาน Blog</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>"
                               id="blog_id" class="form-control"/>

                        <input type="hidden" name="category_type_id" value="<?php echo $category_type_id; ?>"
                               id="category_type_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-type-name">ชื่อ Blog</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="blog_title"
                                               value="<?php echo $blog_title; ?>"
                                               placeholder="ชื่อ Blog" id="input-type-name"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class="control-label" for="input-category-id">ชื่อประเภท</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <?php
                                        if ($blog_id) {
                                            ?>
                                            <input type="text"  name="category_id" id="input-category-id"
                                                   class="form-control" disabled="disabled"
                                                   value="<?php echo $category_name; ?>" />
                                            <?php
                                        } else {
                                            ?>
                                            <select name="category_id" id="input-category-id"
                                                    class="form-control selectpicker">
                                                <?php foreach ($category as $item) { ?>
                                                    <option value="<?= $item['category_id']; ?>"
                                                        <?php if ($item['category_id'] == $category_id) { ?> selected="selected" <?php } ?> >
                                                        <?= $item['category_name']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-priority-level">ความสำคัญ</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <select name="priority_level" id="input-priority-level"
                                                class="form-control ">
                                            <?php foreach ($all_priority_level as $item) { ?>
                                                <option value="<?= $item['priority_level']; ?>"
                                                    <?php if ($item['priority_level'] == $priority_level) { ?> selected="selected" <?php } ?> >
                                                    <?= $item['priority_level']; ?>
                                                </option>
                                            <?php } ?>

                                        </select>

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

                                        <select name="blog_status" id="input-status" class="form-control selectpicker">
                                            <option
                                                value="0" <?php if ($blog_status == 0) { ?>
                                                selected="selected" <?php } ?> >
                                                ปิดการใช้งาน
                                            </option>
                                            <option
                                                value="1" <?php if ($blog_status == 1) { ?>
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
                        <h3 class="box-title">ข้อมูล Blog</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div id="form-field" class=" box-body">

                        <script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
                        <!--                        <script src="-->
                        <? //= base_url(); ?><!--assets/ckfinder/ckfinder.js"></script>-->
                        <div class="row">

                            <div id="containner-blog-field">
                                <?php if (isset($blog_field)) { ?>

                                    <?php if ($blog_field) {
                                        $count = 1;
                                        foreach ($blog_field as $item) {
                                            $html_field = '';
                                            switch ($item['field_type']) {

                                                case 'text' :
                                                    $html_field = '<input type="text" id="' . $item['category_field_id'] . '" name="' . $item['field_id'] . '" class="form-control blog-value" value="' . $item['blog_value'] . '" />';
                                                    break;
                                                case 'textarea' :
                                                    $html_field = '<input type="textarea" id="' . $item['category_field_id'] . '" name="' . $item['field_id'] . '" class="form-control date-picker blog-value" value="' . $item['blog_value'] . '" />';
                                                    $html_field .= ' <script type="text/javascript"> CKEDITOR.replace("content"
                                                     , {"language":"en","height":"400","filebrowserBrowseUrl":"' . base_url() . 'assets\/ckfinder\/ckfinder.html"
                                                     ,"filebrowserImageBrowseUrl":"' . base_url() . 'assets\/ckfinder\/ckfinder.html?type=Images"
                                                     ,"filebrowserFlashBrowseUrl":"' . base_url() . 'assets\/ckfinder\/ckfinder.html?type=Flash"
                                                     ,"filebrowserUploadUrl":"' . base_url() . 'assets\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files"
                                                     ,"filebrowserImageUploadUrl":"' . base_url() . 'assets\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images"
                                                     ,"filebrowserFlashUploadUrl":"' . base_url() . 'assets\/ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash"}); </script>';
//                                                    $html_field .= ' <script type="text/javascript"> CKEDITOR.instances["' . $item['field_id'] . '"].setData(" ' . $item['blog_value'] . ' "); </script>';
                                                    $html_field .= ' <script type="text/javascript"> CKEDITOR.instances["' . $item['category_field_id'] . '"].setData(decodeURI("' . $item['blog_value'] . '")); </script>';
                                                    break;
                                                case 'date' :
                                                    $html_field = ' <div id="div-datepicker" class="input-append datepicker">';
                                                    $html_field .= '<input id="' . $item['category_field_id'] . '" data-format="MM/dd/yyyy" type="text" class="form-control input-datetime blog-value date-picker" disabled="" value="' . $item['blog_value'] . '">';
                                                    $html_field .= '<span class="add-on"><i class="fa fa-calendar-o  mar-top-5 icon-calendar"></i></span>';
                                                    $html_field .= '</div>';
                                                    break;
                                                case 'time' :
                                                    $html_field = '  <div id="div-timepicker" class="input-append clockpicker">';
                                                    $html_field .= '<input id="' . $item['category_field_id'] . '" type="text" class="form-control input-datetime time-picker blog-value" disabled value="' . $item['blog_value'] . '">';
                                                    $html_field .= '<span class="input-group-addon add-on"><i class="fa fa-clock-o mar-top-5 icon-calendar"></i></span>';
                                                    $html_field .= '</div>';
                                                    break;
                                                case 'datetime' :
                                                    $html_field = ' <div id="div-datetimepicker" class="input-append datetimepicker">';
                                                    $html_field .= '<input id="' . $item['category_field_id'] . '" data-format="MM/dd/yyyy HH:mm:ss PP" type="text" class="form-control input-datetime blog-value"  value="' . $item['blog_value'] . '"/>';
                                                    $html_field .= '<span class="add-on"><i class="fa fa-calendar mar-top-5"></i></span>';
                                                    $html_field .= '</div>';
                                                    break;
                                                case 'video-url' :
                                                    $html_field = '<input type="text" id="' . $item['category_field_id'] . '" name="' . $item['field_id'] . '" class="form-control blog-value" value="' . $item['blog_value'] . '" />';
                                                    break;
                                                case 'image' :
                                                    $html_field = '<a href="#" id="a-' . $item['field_id'] . '" data-toggle="image" class="img-thumbnail"><img id="img-' . $item['field_id'] . '" style="max-height: 500px;" '
                                                        . ' src="' . base_url() . $item['blog_value'] . '" alt="" title="" data-placeholder="รูปสินค้า"/></a>'
                                                        . ' <input type="file" name="' . $item['field_id'] . '" class="img-input btn btn-warning blog-value" id="' . $item['category_field_id'] . '" value="' . $item['blog_value'] . '" />';
                                                    break;
                                            } ?>

                                            <div id="field-type-<?= $count; ?>"
                                                 class="div-field-type form-group required col-md-12 col-xs-12">
                                                <div class="col-md-2 col-xs-2" align="right">
                                                    <label class=" control-label"
                                                           for="input-field-type"><?= $item['field_name']; ?></label>
                                                </div>
                                                <div class="col-md-10 col-xs-10">
                                                    <div class="">
                                                        <?php echo $html_field; ?>
                                                    </div>
                                                    <div class="text-danger"></div>
                                                </div>
                                            </div>
                                            <?php
                                            $count++;
                                        } ?>
                                    <?php } ?>

                                <?php } ?>
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

                        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>"
                               id="blog_id" class="form-control"/>

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

            </div>

    </section>

</div>

<script type="text/javascript">

</script>

<script type="text/javascript">

    init_event({
        document_on: [
            'click,#button-add-field'
            , 'click,#button-save'
            , 'click,.button-delete'
            , 'change,#category_id'
            , 'change,.img-input'
        ], document_ready: [
            get_field
            , make_datetimepicker
            , make_select_picker
            , make_timepicker
        ]

    });

    $(document).on("click", "#button-save", function () {

        $('.alert, .text-danger').remove();
        $('.form-group').removeClass('has-error');

        var blog_id = $('input[name="blog_id"]').val();
        var blog_title = $('input[name="blog_title"]').val();
        var is_error = false;

        if (blog_title.length == 0) {
            $("input[name='blog_title']").after('<div class="text-danger">กรุณากรอกชื่อ Blog</div>');
            is_error = true;
        }

        var all_blog = $('.div-field-type');
        var blog_data = [];

        for (var i = 1; i <= all_blog.length; i++) {

            var field_type = $('#field-type-' + i + ' .blog-value').attr('type');
            var category_field_id = $('#field-type-' + i + ' .blog-value')[0].id;

            if (field_type == 'textarea') {
                var blog_value = encodeURI(CKEDITOR.instances[category_field_id].getData());
            } else if (field_type == 'file') {
                if (jQuery('#' + category_field_id)[0].files.length) {
                    var blog_value = 'assets/img/blog/' + blog_id + '/' + category_field_id + '/' + jQuery('#' + category_field_id)[0].files[0].name;
                } else if ($('input[name="blog_id"]').val()) {
                    var blog_value = $('#' + category_field_id).attr('value');
                } else {
                    var blog_value = "";
                }
            } else {
                var blog_value = $('#field-type-' + i + ' .blog-value').val();
            }

            var blog_data_item = {category_field_id: category_field_id, blog_value: blog_value}
            blog_data.push(blog_data_item);

        }

        if (!is_error) {
            if ($('input[name="blog_id"]').val()) {
                edit_blog(blog_data);
            } else {
                add_blog(blog_data);
            }
        }
    });

    $(document).on("change", "select[name='category_id']", function () {
        get_field();
    });

    $(document).on("change", ".img-input", function () {
        show_thumbnail(this);
    });

    function make_select_picker() {
        $('.selectpicker').selectpicker({
            style: 'btn-default',
        });
    }

    function make_datetimepicker() {
        $('.datetimepicker').datetimepicker({
            format: 'dd/MM/yyyy hh:mm:ss',
            language: 'pt-BR'
        });

        $('.datepicker').datetimepicker({
            format: 'dd/MM/yyyy',
            language: 'pt-BR'
        });
    }

    function make_timepicker() {
        $('.clockpicker').clockpicker({donetext: 'Done'});
    }

    function add_blog(data_blog_field) {
        var blog_title = $('input[name="blog_title"]').val();
        var category_id = $('select[name="category_id"]').val();
        var blog_status = $('select[name="blog_status"]').val();
        var priority_level = $('select[name="priority_level"]').val();

        var data_blog = {
            blog_title: blog_title,
            category_id: category_id,
            blog_status: blog_status,
            priority_level: priority_level
        }
        var data = {data_blog: data_blog, data_blog_field: data_blog_field}

        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>blog/add_blog',
            type: 'post',
            data: data,
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
                    uploadImage(json.Data.blog_id);
                    alert("เพิ่มข้อมูลสำเร็จ");
                    location.reload();
                    $('#blog_id').val(json.Data.blog_id);
                } else {
                    alert("เพิ่มข้อมูลผิดพลาด");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_blog(data_blog_field) {
        var blog_id = $('input[name="blog_id"]').val();
        var blog_title = $('input[name="blog_title"]').val();
        var category_id = $('select[name="category_id"]').val();
        var blog_status = $('select[name="blog_status"]').val();
        var priority_level = $('select[name="priority_level"]').val();

        var data_blog = {
            blog_id: blog_id,
            blog_title: blog_title,
            category_id: category_id,
            blog_status: blog_status,
            priority_level: priority_level
        }
        var data = {data_blog: data_blog, data_blog_field: data_blog_field}

        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>blog/edit_blog',
            type: 'post',
            data: data,
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
                    uploadImage(json.Data.blog_id);
                    alert("แก้ไขข้อมูลสำเร็จ");

                    $('#blog_id').val(json.Data.blog_id);
                } else {
                    alert("แก้ไขข้อมูลผิดพลาด");
                }
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

    function get_field() {
        var blog_id = $('#blog_id').val();
        var category_id = $('select[name="category_id"]').val()
        if (!blog_id) {

            $.ajax({
                    url: '<?php echo base_url(); ?>blog/get_field',
                    type: 'post',
                    data: {category_id: category_id},
                    dataType: 'json',
                    crossDomain: true,
                    beforeSend: function () {
//                    $('#button-save').button('loading');
                    },
                    complete: function () {
//                    $('#button-save').button('reset');
                    },
                    success: function (json) {
                        console.log(json.Data.all_priority_level);

                        var priorities = json.Data.all_priority_level;

                        $('#input-priority-level').find('option').remove();
                        for (var i = 0; i < priorities.length; i++) {
                            $('#input-priority-level').append('<option value="'+priorities[i].priority_level+'">'+priorities[i].priority_level+'</option>')
                        }

                        var blog_fields = json.Data.blog_field;
                        if (json.Data.blog_field.length > 0) {
                            $('#containner-blog-field').html('');
                        }
                        var ckeditor = [];
                        var count = 1;
                        for (var i = 0; i < blog_fields.length; i++) {

                            var blog_field = blog_fields[i];

                            var html_field = ' <div id="field-type-' + count + '"'
                                + 'class="div-field-type form-group required col-md-12 col-xs-12"> '
                                + '<div class="col-md-2 col-xs-2" align="right">'
                                + '<label class=" control-label" for="input-field-type">' + blog_field.field_name + '</label>'
                                + '</div>'
                                + '<div class="col-md-10 col-xs-10">'
                                + ' <div class="">';

                            switch (blog_field.field_type) {
                                case 'text' :
                                    html_field += '<input type="text" id="' + blog_field.category_field_id + '" name="' + blog_field.field_id + '" class="form-control blog-value" value="" />';
                                    break;
                                case 'textarea' :
                                    html_field += '<input type="textarea" id="' + blog_field.category_field_id + '" name="' + blog_field.field_id + '" class="form-control blog-value" value="" />';
                                    ckeditor.push(blog_field.field_id);
                                    break;
                                case 'date' :
                                    html_field += ' <div id="div-datepicker" class="input-append datepicker">';
                                    html_field += '<input id="' + blog_field.category_field_id + '" data-format="MM/dd/yyyy" type="text" class="form-control input-datetime blog-value date-picker" disabled value=""/>';
                                    html_field += '<span class="add-on"><i class="fa fa-calendar-o  mar-top-5"></i></span>';
                                    html_field += '</div>';

                                    break;
                                case 'time' :
                                    html_field += '  <div id="div-datetimepicker" class="input-append clockpicker">';
                                    html_field += '<input id="' + blog_field.category_field_id + '" type="text" class="form-control input-datetime blog-value time-picker" disabled value="">';
                                    html_field += '<span class="input-group-addon add-on"><i class="fa fa-clock-o mar-top-5 icon-calendar"></i></span>';
                                    html_field += '</div>';
                                    break;
                                case 'datetime' :
                                    html_field += ' <div id="div-datetimepicker" class="input-append datetimepicker">';
                                    html_field += '<input id="' + blog_field.category_field_id + '" data-format="MM/dd/yyyy HH:mm:ss PP" type="text" class="form-control input-datetime blog-value" value=""/>';
                                    html_field += '<span class="add-on"><i class="fa fa-calendar mar-top-5"></i></span>';
                                    html_field += '</div>';

                                    break;
                                case 'video-url' :
                                    html_field += '<input type="text" id="' + blog_field.category_field_id + '" name="' + blog_field.field_id + '" class="form-control blog-value" value="" />';
                                    break;
                                case 'image' :
                                    html_field += '<a href="#" id="a-' + blog_field.field_id + '" data-toggle="image" class="img-thumbnail"><img id="img-' + blog_field.field_id + '" style="max-height: 500px;" '
                                        + ' src="<?= base_url() ?>assets/img/No-image-found.jpg" alt="" title="" data-placeholder="รูปสินค้า"/></a>'
                                        + ' <input type="file" name="' + blog_field.field_id + '" class="img-input btn btn-warning blog-value" id="' + blog_field.category_field_id + '"/>';
                                    break;
                            }

                            html_field += '</div>'
                                + '<div class="text-danger"></div>'
                                + '<div class="col-md-2 col-xs-2" align="right">'
                                + '</div>';

                            $('#containner-blog-field').append(html_field);
                            count++;
                        }

                        make_datetimepicker();
                        make_timepicker();

                        for (var i = 0; i < ckeditor.length; i++) {
                            CKEDITOR.replace(ckeditor[i]);
                        }
                    }
                    , error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                }
            );
        }
    }

    function show_thumbnail(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-' + input.name).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function uploadImage(blog_id) {

        var all_blog = $('.div-field-type');

        for (var i = 1; i <= all_blog.length; i++) {

            var field_type = $('#field-type-' + i + ' .blog-value').attr('type');
            var category_field_id = $('#field-type-' + i + ' .blog-value')[0].id;
            var check_value = $('#' + category_field_id).val();
            if (field_type == 'file' && check_value) {

                var data = new FormData();

                var img = jQuery('#' + category_field_id)[0].files;
                if (img.length > 0) {
                    jQuery.each(jQuery('#' + category_field_id)[0].files, function (i, file) {
                        data.append('image', file);
                    });

                    data.append('blog_id', blog_id);
                    data.append('category_field_id', category_field_id);

                    jQuery.ajax({
                        url: '<?php echo base_url(); ?>blog/upload_file',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false, type: 'POST',
                        success: function (data) {
                            console.log(data);
                        }
                    });
                }
            } else {
                console.log('New Image is empty.')
            }
        }
    }

</script>


