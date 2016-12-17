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
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="config_id" value="<?php echo $config_id; ?>"
                               id="config_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-type">Config Group</label>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <div class="">
                                        <select name="config_id" id="select-config" class="form-control"
                                                onchange="change_config()">
                                            <?php for ($i = 0; $i < count($config_group_id); $i++) { ?>
                                                <option value="<?php echo $config_group_id[$i]; ?>" <?php if ($config_group_id[$i] == $config_id) { ?>
                                                    selected="selected" <?php } ?> >
                                                    <?php echo $config_group_name[$i]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- /.box -->
                            <br>
                            <br>
                            <hr>

                            <!-- Fronted Setting Form-->
                            <div class="content-boxed" id="frontend-form">
                                <div class="row">


                                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"
                                          id="form"
                                          class=" box-body">

                                        <input type="hidden" name="config_id" value="<?php echo $config_id; ?>"
                                               id="config_id" class="form-control"/>

                                        <div class="form-group required col-md-12 col-xs-12">
                                            <div class="col-md-2 col-xs-2" align="right">
                                                <label class=" control-label" for="input-config-title">Title</label>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
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
                                                <label class=" control-label" for="input-config-image">Favicon</label>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <div class="">
                                                    <input type="text" name="config_image"
                                                           value="<?php echo $config_image; ?>"
                                                           placeholder="" id="input-config-image"
                                                           class="form-control"/>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="form-group required col-md-12 col-xs-12">
                                            <div class="col-md-2 col-xs-2" align="right">
                                                <label class=" control-label"
                                                       for="input-meta-keyword">Meta Keyword</label>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <div class="">
                                                <textarea type="text" name="meta_keyword"
                                                          value="<?php echo $meta_keyword; ?>"
                                                          placeholder="" id="input-meta-keyword"
                                                          class="form-control"></textarea>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="form-group required col-md-12 col-xs-12">
                                            <div class="col-md-2 col-xs-2" align="right">
                                                <label class=" control-label"
                                                       for="input-meta-description">Meta Description</label>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <div class="">
                                                <textarea type="text" name="meta_description"
                                                          value="<?php echo $meta_description; ?>"
                                                          placeholder="" id="input-meta-description"
                                                          class="form-control"></textarea>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="form-group required col-md-12 col-xs-12">
                                            <div class="col-md-2 col-xs-2" align="right">
                                                <label class=" control-label"
                                                       for="input-login-link">Login Link</label>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
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
                                            <div class="col-md-6 col-xs-6">
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
                                            <div class="col-md-6 col-xs-6">
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
                                            <div class="col-md-6 col-xs-6">
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
                                            <div class="col-md-6 col-xs-6">
                                                <div class="">
                                                    <input type="text" name="google-plus"
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
                                            <div class="col-md-6 col-xs-6">
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
                                            <div class="col-md-6 col-xs-6">
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
                                            <div class="col-md-6 col-xs-6">
                                                <div class="">
                                                    <input type="text" name="twitter"
                                                           value="<?php echo $twitter; ?>"
                                                           placeholder="" id="input-twitter"
                                                           class="form-control"/>
                                                </div>
                                                <div class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6" style="text-align: center;">
                                            <br>
                                            <div class="">
                                                <button type="button" id="button-save" class="btn btn-primary"
                                                        name="button-save"> บันทึก
                                                </button>
                                                <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก
                                                </button>
                                            </div>
                                        </div>

                                </div>

                            </div>


                            <!-- Contact Setting Form-->

                            <div class="content-boxed" id="contact-form">
                                <div class="row">

                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="input-type-name">Content</label>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <div class="">
                                                <textarea id="edittext" name="config_content"
                                                          value="<?php echo $config_content; ?>"
                                                          placeholder="" id="input-config-content"
                                                          class="form-control"></textarea>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>


                                    <!--<div class="form-group col-md-6" style="text-align: center;">
                                        <br>
                                        <div class="">
                                            <button type="button" id="button-save" class="btn btn-primary"> บันทึก
                                            </button>
                                            <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                                        </div>
                                    </div>-->

                                </div>

                            </div>

                            <!-- Contact Setting Form-->

                        </div>
                    </form>
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
        fn: [readyLoad],
        disEvent: ["click,#button-save", "click,.button-edit"]
    });

    function readyLoad() {
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
            url: '<?php echo base_url(); ?>config/validate_form',
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

                    if ($('input[name="config_id"]').val()) {
                        edit_group();
                    } else {
                        add_group();
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

    //$(document).on("click", ".button-edit", function () {
    //var config_id = this.name.replace("button-edit-", "");
    //window.open("<?php echo base_url(); ?>config?config_id=" + config_id, "_self");
    //});


    function add_config() {
        $.ajax({
            url: '<?php echo base_url(); ?>config/add_config',
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

    function edit_config() {
        var config_id = $('input[name="config_id"]').val();
        $.ajax({
            url: '<?php echo base_url(); ?>config/edit_config',
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


    <!-- dropdown change -->

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

</script>


<!--Edittext-->
<!--<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace( 'edittext' );
</script></script>-->