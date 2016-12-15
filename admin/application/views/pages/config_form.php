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
                    <div class="row">

                        <br>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="col-md-2 col-xs-2" align="right">
                                <label class=" control-label" for="input-type">Config Group</label>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <div class="">
                                    <select name="config_id" id="select-config" class="form-control" onchange="">
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
                        <!-- Fronted Setting Form-->
                        <div class="content-boxed">
                            <hr>
                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"
                                  id="fronted-form" class=" box-body">

                                <input type="hidden" name="config_id" value="<?php echo $config_id; ?>"
                                       id="config_id" class="form-control"/>

                                <div class="row">

                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="input-type-name">Title</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
                                            <div class="">
                                                <input type="text" name="config_title"
                                                       value="<?php echo $config_title; ?>"
                                                       placeholder="Title" id="input-config-title"
                                                       class="form-control"/>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="input-type-name">Favicon</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
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
                                        <div class="col-md-10 col-xs-10">
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
                                        <div class="col-md-10 col-xs-10">
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
                                        <div class="col-md-10 col-xs-10">
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
                                                   for="input-login-link">Line ID</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
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
                                        <div class="col-md-10 col-xs-10">
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
                                        <div class="col-md-10 col-xs-10">
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
                                                   for="input-google-plus">Google Plus</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
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
                                                   for="input-instagram">Instagram</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
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
                                        <div class="col-md-10 col-xs-10">
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
                                        <div class="col-md-10 col-xs-10">
                                            <div class="">
                                                <input type="text" name="twitter"
                                                       value="<?php echo $youtube; ?>"
                                                       placeholder="" id="input-twitter"
                                                       class="form-control"/>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" style="text-align: center;">
                                        <br>
                                        <div class="">
                                            <button type="button" id="button-save" class="btn btn-primary"> บันทึก
                                            </button>
                                            <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>


                        <!-- Contact Setting Form-->

                        <div class="content-boxed">
                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"
                                  id="contact-form" class=" box-body">

                                <input type="hidden" name="config_id" value="<?php echo $config_id; ?>"
                                       id="config_id" class="form-control"/>

                                <div class="row">

                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="input-type-name">Content</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
                                            <div class="">
                                                <input type="text" name="config_content"
                                                       value="<?php echo $config_content; ?>"
                                                       placeholder="" id="input-config-content"
                                                       class="form-control"/>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6" style="text-align: center;">
                                        <br>
                                        <div class="">
                                            <button type="button" id="button-save" class="btn btn-primary"> บันทึก
                                            </button>
                                            <button type="reset" id="btn-reset" class="btn btn-default">ยกเลิก</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <!-- Contact Setting Form-->


                    </div>

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


<script>


    //$("#select-config").change(function () {
        //$("#fronted_form").toggle("slow", function () {
        //});
    //});

    $(document).ready(function() {
        $("#select-config").change(function() {

            $("#fronted-form").toggle("slow");
            //$("#contact-form").toggle();

        });
    });


</script>