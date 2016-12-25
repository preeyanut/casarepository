<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Banner
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Banner</li>
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
                        <h3 class="box-title">แบนเนอร์</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="banner_id" value="<?php echo $banner_id; ?>"
                               id="banner_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-banner-name">ชื่อแบนเนอร์</label>
                                </div>

                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="banner_name" value="<?php echo $banner_name; ?>"
                                               placeholder="ชื่อแบนเนอร์" id="input-banner-name"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-img">Banner Image</label>
                                </div>

                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <a href="" id="a-test" data-toggle="image" class="img-thumbnail">
                                            <img id="img-banner_image" style="max-width: 500px;" src="<?php echo base_url().$banner_image; ?>" alt="" title="" data-placeholder="รูปสินค้า">
                                        </a>

                                        <input type="file" name="banner_image" class="img-input" value="0" id="input-image"/>
                                    </div>

                                    <div class="text-danger"></div>
                                    <div class="col-md-2 col-xs-2" align="right"></div>
                                </div>

                                <div class="col-md-2 col-xs-2" align="right"></div>

                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-url">URL</label>
                                </div>

                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="banner_url" value="<?php echo $banner_url; ?>"
                                               placeholder="url" id="input-url"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-priority">ความสำคัญ</label>
                                </div>

                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <select name="priority_level" id="input-priority" class="form-control" >
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

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-status">สถานะ</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <select name="banner_status" id="input-status" class="form-control">

                                            <option
                                                    value="0" <?php if ($banner_status == 0) { ?>
                                                selected="selected" <?php } ?> >
                                                ปิดการใช้งาน
                                            </option>
                                            <option
                                                    value="1" <?php if ($banner_status == 1) { ?>
                                                selected="selected" <?php } ?> >
                                                เปิดใช้งาน
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right"></div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <button type="button" id="button-save" class="btn btn-primary">บันทึก</button>
                                        <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                                    </div>
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
        document_on: [
             'click,#button-save'
            , 'change,.img-input'
        ]
    });

    $(document).on("click", "#button-save", function () {
        $.ajax({
            url: '<?php echo base_url(); ?>banner/validate_form',
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
//                alert("OK");

                $('.alert, .text-danger').remove();
                $('.form-group').removeClass('has-error');

                if (json['error']) {
//                    alert("OK1");
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
//                    alert("OK2");
                    if ($('input[name="banner_id"]').val()) {
                        edit_banner();
                    } else {
                        add_banner();
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


    function add_banner() {
        var banner_name = $('input[name="banner_name"]').val();
        var banner_url = $('input[name="banner_url"]').val();
        var banner_status = $('select[name="banner_status"]').val();
        var priority_level = $('select[name="priority_level"]').val();
        var banner_image = $('input[name="banner_image"]').val();

        var data_banner ={banner_name:banner_name,banner_url:banner_url,priority_level:priority_level,banner_status:banner_status,banner_image:banner_image}
        var data = {data_banner:data_banner}

        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>banner/add_banner',
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
//                console.log(json);
                if (json.Result) {
                    uploadImage(json.Data.banner_id);
                    alert("เพิ่มข้อมูลสำเร็จ");
                    location.reload();
                    $('#banner_id').val(json.Data.banner_id);
                } else {
                    alert("เพิ่มข้อมูลผิดพลาด");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function edit_banner() {
        var banner_id = $('input[name="banner_id"]').val();
        var banner_name = $('input[name="banner_name"]').val();
        var banner_url = $('input[name="banner_url"]').val();
        var banner_status = $('select[name="banner_status"]').val();
        var priority_level = $('select[name="priority_level"]').val();
        var banner_image = $('input[name="banner_image"]').val();

        var data_banner ={banner_name:banner_name,banner_url:banner_url,priority_level:priority_level,banner_status:banner_status,banner_id:banner_id,banner_image:banner_image}
        var data = {data_banner:data_banner}

        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>banner/edit_banner',
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
//                console.log(json);
                if (json.Result) {
                    uploadImage(json.Data.banner_id);
                    alert("แก้ไขข้อมูลสำเร็จ");

                    $('#banner_id').val(json.Data.banner_id);
                } else {
                    alert("แก้ไขข้อมูลผิดพลาด");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    $(document).on("change", ".img-input", function () {
        show_thumbnail(this);
    });

    function show_thumbnail(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-' + input.name).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function uploadImage(banner_id) {
        var data = new FormData();
        jQuery.each(jQuery('#input-image')[0].files, function (i, file) {
            data.append('image', file);
        });

        data.append('banner_id', banner_id);;


        console.log(data);
        jQuery.ajax({
            url: '<?php echo base_url(); ?>banner/upload_file',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (data) {
                console.log(data);
            }
        });
    }

</script>