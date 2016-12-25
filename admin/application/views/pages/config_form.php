<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Setting Webpage
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
                        <h3 class="box-title">Setting Config</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php //echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="config_id" value="<?php echo $config_id; ?>"
                               id="config_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-config">Config Group</label>
                                </div>
                                <div class="col-md-5 col-xs-5">
                                    <div class="">
                                        <select name="config_group_id" id="select-config" class="form-control"
                                                onchange="change_config()">
                                            <?php

                                            foreach ($config_group as $item) {
                                                ?>
                                                <option value="<?php echo $item['config_group_id']; ?>" <?php if ($item['config_group_id'] == $config_group_id) { ?>
                                                    selected="selected" <?php } ?> >
                                                    <?php echo $item['config_group_name']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="box box-primary" id="frontend-form">
                    <div class="box-header with-border">
                        <h3 class="box-title">ข้อมูล Frontend Setting</h3>
                    </div>


                    <!-- Fronted Setting Form-->
                    <div class="box-body">
                        <div class="row">


                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-config-title">Title</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="config_title"
                                               value="<?php echo $config_title; ?>"
                                               placeholder="" id="input-config-title"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-img">Favicon Image</label>
                                </div>

                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <a href="" id="a-test" data-toggle="image" class="img-thumbnail">
                                            <img id="img-frontend_image" style="max-width: 500px;" src="<?php echo $frontend_image; ?>" alt="" title="" data-placeholder="รูปสินค้า">
                                        </a>
                                        <input type="file" name="frontend_image" class="img-favicon-input" value="0" id="input-favicon-image"/>
                                    </div>

                                    <div class="text-danger"></div>
                                    <div class="col-md-2 col-xs-2" align="right"></div>
                                </div>

                                <div class="col-md-2 col-xs-2" align="right"></div>

                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-img">Logo Image</label>
                                </div>

                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <a href="" id="a-test" data-toggle="image" class="img-thumbnail">
                                            <img id="img-logo_image" style="max-width: 500px;"
                                                 src="<?php echo $logo_image; ?>"
                                                 alt="" title="" data-placeholder="รูปสินค้า">
                                        </a>

                                        <input type="file" name="logo_image" class="img-logo-input" value="0"
                                               id="input-logo-image"/>
                                    </div>

                                    <div class="text-danger"></div>
                                    <div class="col-md-2 col-xs-2" align="right"></div>
                                </div>

                                <div class="col-md-2 col-xs-2" align="right"></div>

                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-meta-keyword">Meta Keyword</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                                <textarea name="meta_keyword"
                                                          value=""
                                                          placeholder="" id="input-meta-keyword"
                                                          class="form-control"><?php echo $meta_keyword; ?></textarea>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-meta-description">Meta Description</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                                <textarea type="text" name="meta_description"
                                                          value=""
                                                          placeholder="" id="input-meta-description"
                                                          class="form-control"><?php echo $meta_description; ?></textarea>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-login-link">Login Link</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="login_link"
                                               value="<?php echo $login_link; ?>"
                                               placeholder="" id="input-login-link"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-line-id">Line ID</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="line_id"
                                               value="<?php echo $line_id; ?>"
                                               placeholder="" id="input-line-id"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-telephone">Telephone Number</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="telephone"
                                               value="<?php echo $telephone; ?>"
                                               placeholder="" id="input-telephone"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-facebook">Facebook</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="facebook"
                                               value="<?php echo $facebook; ?>"
                                               placeholder="" id="input-facebook"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-google">Google Plus</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="googleplus"
                                               value="<?php echo $googleplus; ?>"
                                               placeholder="" id="input-google"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-instagram">Instagram</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="instagram"
                                               value="<?php echo $instagram; ?>"
                                               placeholder="" id="input-instagram"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-youtube">Youtube</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="youtube"
                                               value="<?php echo $youtube; ?>"
                                               placeholder="" id="input-youtube"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-twitter">Twitter</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="twitter"
                                               value="<?php echo $twitter; ?>"
                                               placeholder="" id="input-twitter"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-10" style="text-align: center;">
                                <br>
                                <div class="">
                                    <button type="button" id="button-save-frontend" class="btn btn-primary"
                                            name="button-save-frontend"> บันทึก
                                    </button>
                                    <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Contact Setting Form-->
                <div class="box box-primary" id="contact-form">
                    <div class="box-header with-border">
                        <h3 class="box-title">ข้อมูล Contact Setting</h3>
                    </div>
                    <div class="box-body">

                        <script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
                        <div class="row">


                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-config_content">Content</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <textarea name="config_content" value="" placeholder="" id="edittext"
                                                  class="form-control"><?php echo $config_content; ?></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('edittext');
                                        </script>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-img">Image</label>
                                </div>

                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <a href="" id="a-test" data-toggle="image" class="img-thumbnail">
                                            <img id="img-contact_image" style="max-width: 500px;"
                                                 src="<?php echo $contact_image; ?>"
                                                 alt="" title="" data-placeholder="รูปสินค้า">
                                        </a>

                                        <input type="file" name="contact_image" class="img-input" value="0"
                                               id="input-image"/>
                                    </div>

                                    <div class="text-danger"></div>
                                    <div class="col-md-2 col-xs-2" align="right"></div>
                                </div>

                                <div class="col-md-2 col-xs-2" align="right"></div>

                            </div>


                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-email">E-mail</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="email"
                                               value="<?php echo $email; ?>"
                                               placeholder="" id="input-email"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-line-id">Line ID</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="line-id"
                                               value="<?php echo $line_id; ?>"
                                               placeholder="" id="input-line-id"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-facebook">Facebook</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="face-book"
                                               value="<?php echo $facebook; ?>"
                                               placeholder="" id="input-facebook"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-ins-tagram">Instagram</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="ins-tagram"
                                               value="<?php echo $instagram; ?>"
                                               placeholder="" id="input-ins-tagram"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-google-plus">Google Plus</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="google-plus"
                                               value="<?php echo $googleplus; ?>"
                                               placeholder="" id="input-google-plus"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label"
                                           for="input-you-tube">Youtube</label>
                                </div>
                                <div class="col-md-9 col-xs-9">
                                    <div class="">
                                        <input type="text" name="you-tube"
                                               value="<?php echo $youtube; ?>"
                                               placeholder="" id="input-you-tube"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-10" style="text-align: center;">
                                <br>
                                <div class="">
                                    <button type="button" id="button-save-contact" class="btn btn-primary"
                                            name="button-save-contact"> บันทึก
                                    </button>
                                    <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Contact Setting Form-->

                <!--<div class="box box-primary" id="contact-form">

                    <div class="box-body">
                        <div class="form-group col-md-10" style="text-align: center;">
                            <br>
                            <div class="">
                                <button type="button" id="button-save" class="btn btn-primary" name="button-save"> บันทึก </button>
                                <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>-->

                </form>
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

    init_event({
        document_on: [
            'click,#button-save-frontend'
            , 'click,#button-save-contact'
            , 'click,.button-edit'
            , 'change,.img-input'
            , 'change,.img-favicon-input'
            , 'change,.img-logo-input'

        ]
    });

    <!--===================================== add fronted setting=============================================-->
    function add_frontend_setting() {
        $.ajax({
            url: '<?php echo base_url(); ?>config/add_frontend_setting',
            type: 'post',
            data: $('input , select , textarea'),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save-frontend').button('loading');
            },
            complete: function () {
                $('#button-save-frontend').button('reset');
            },
            success: function (json) {

                console.log(json);
                if (json.Result) {

                    alert(json.Data.config_id=1);
                    console.log(json);
                    upload_favicon(json.Data.config_id=1);

                    upload_logo(json.Data.config_id=1);

                    alert("เพิ่มข้อมูลเสร็จสิ้น");
                } else {
                    alert("เพิ่มข้อมูลผิดพลาด");
                }


            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    <!--===================================== add Contact setting=============================================-->
    function add_contact_setting() {

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        $.ajax({
            url: '<?php echo base_url(); ?>config/add_contact_setting',
            type: 'post',
            data: $('input , select , textarea'),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save-contact').button('loading');
            },
            complete: function () {
                $('#button-save-contact').button('reset');
            },
            success: function (json) {

                console.log(json);
                if (json.Result) {

                    alert(json.Data.config_id=2);
                    console.log(json);

                    upload_Contact_Image(json.Data.config_id=2);

                    alert("เพิ่มข้อมูลเสร็จสิ้น");
                } else {
                    alert("เพิ่มข้อมูลผิดพลาด");
                }

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }


    <!--===================================== add fronted setting=============================================-->
    $(document).on("click", "#button-save-frontend", function () {
        $.ajax({
            url: '<?php echo base_url(); ?>config/validate_frontend_form',
            type: 'post',
            data: $('input , select , textarea'),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save-frontend').button('loading');
            },
            complete: function () {
                $('#button-save-frontend').button('reset');
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

                    console.log("0000");
                    add_frontend_setting();


                    $('#button-refresh').trigger('click');
                    $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });


    <!--===================================== add Contact setting=============================================-->
    $(document).on("click", "#button-save-contact", function () {
        $.ajax({
            url: '<?php echo base_url(); ?>config/validate_contact_form',
            type: 'post',
            data: $('input , select , textarea'),
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
                $('#button-save-contact').button('loading');
            },
            complete: function () {
                $('#button-save-contact').button('reset');
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

                    console.log("0000");
                    add_contact_setting();


                    $('#button-refresh').trigger('click');
                    $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    <!--========================= dropdown change ====================================-->

    $(document).ready(function () {
        change_config();
        $("#select-config").change(function () {
            change_config();
        });
    });

    function change_config() {
        var sel = document.getElementById('select-config');
        var opts = sel.options[sel.selectedIndex].text;


        if (opts == 'Frontend Setting') {
            document.getElementById('contact-form').style.display = 'none';
            document.getElementById('frontend-form').style.display = 'block';
        }
        else if (opts == 'Contact Setting') {
            document.getElementById('frontend-form').style.display = 'none';
            document.getElementById('contact-form').style.display = 'block';
        }
    }

    <!--==================add image ========================-->


    $(document).on("change", ".img-input", function () {
        show_thumbnail(this);
    });

    $(document).on("change", ".img-favicon-input", function () {
        show_thumbnail(this);
    });

    $(document).on("change", ".img-logo-input", function () {
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

    function upload_Contact_Image(config_id) {


        var data = new FormData();
        jQuery.each(jQuery('#input-image')[0].files, function (i, file) {
            data.append('image', file);
        });

        data.append('config_id', config_id);

        console.log(data);
        jQuery.ajax({
            url: '<?php echo base_url(); ?>config/upload_Contact_Image',
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

    function upload_favicon(config_id) {

        var data = new FormData();
        jQuery.each(jQuery('#input-favicon-image')[0].files, function (i, file) {
            data.append('image', file);
        });

        data.append('config_id', config_id);

        console.log(data);
        jQuery.ajax({
            url: '<?php echo base_url(); ?>config/upload_favicon',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (data) {
                //console.log('upload_favicon');
                console.log(data);
            }
        });
    }

    function upload_logo(config_id) {


        var data = new FormData();
        jQuery.each(jQuery('#input-logo-image')[0].files, function (i, file) {
            data.append('image', file);
        });

        data.append('config_id', config_id);

        console.log(data);
        jQuery.ajax({
            url: '<?php echo base_url(); ?>config/upload_logo',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (data) {
                console.log('upload_logo');
                console.log(data);
            }
        });
    }
</script>