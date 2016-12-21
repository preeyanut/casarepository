<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        category
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">category</li>
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
                        <h3 class="box-title">ข้อมูลหมวดหมู่</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
                          class=" box-body">

                        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>"
                               id="category_id" class="form-control"/>

                        <div class="row">

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-category-name">ชื่อหมวดหมู่</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="category_name" value="<?php echo $category_name; ?>"
                                               placeholder="ชื่อหมวดหมู่" id="input-category-name"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-type">ประเภท</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <select name="category_type_id" id="input-type" class="form-control ">
                                            <?php for ($i = 0; $i < count($type_id); $i++) { ?>
                                                <option value="<?php echo $type_id[$i]; ?>" <?php if ($type_id[$i] == $category_type_id) { ?>
                                                    selected="selected" <?php } ?> >
                                                    <?php echo $category_type_name[$i]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class="control-label" for="input-category-icon"> ไอคอน</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <select name="category_icon" class="form-control selectpicker">
                                        <option data-icon="fa fa-address-book-o" value="1" <?php if ($category_icon == 1) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-area-chart" value="2" <?php if ($category_icon == 2) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-book" value="3" <?php if ($category_icon == 3) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-camera" value="4" <?php if ($category_icon == 4) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-film" value="5" <?php if ($category_icon == 5) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-university" value="6" <?php if ($category_icon == 6) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-file-text-o" value="7" <?php if ($category_icon == 7) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-calendar-o" value="8" <?php if ($category_icon == 8) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-clone" value="9" <?php if ($category_icon == 9) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-cubes" value="10" <?php if ($category_icon == 10) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-child" value="11" <?php if ($category_icon == 11) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-fax" value="12" <?php if ($category_icon == 12) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-credit-card" value="13" <?php if ($category_icon == 13) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="fa fa-map-o" value="14" <?php if ($category_icon == 14) { ?>
                                            selected="selected" <?php } ?>></option>
                                        <option data-icon="	fa fa-newspaper-o" value="14" <?php if ($category_icon == 15) { ?>
                                            selected="selected" <?php } ?>></option>
                                    </select>
                                </div>
                                <div class="text-danger"></div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-priority">ระดับ</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="priority_level" value="<?php echo $priority_level; ?>"
                                               placeholder="ระดับ" id="input-priority"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <?php if ($category_id != '') { ?>
                                <?php if ($category_id != '') { ?>
                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="create_date">วันที่เพิ่ม</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
                                            <div class="">
                                                <input type="text" name="create_date"
                                                       value="<?php echo $create_date; ?>"
                                                       id="create_date"
                                                       disabled
                                                       class="form-control"/>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="input-create-by">เพิ่มโดย</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
                                            <div class="">
                                                <input type="text" name="create_by"
                                                       value="<?php echo $create_by_name ?>"
                                                       id="input-create-by" disabled
                                                       class="form-control"/>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="create_date">วันที่แก้ไขล่าสุด</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
                                            <div class="">
                                                <input type="text" name="create_date"
                                                       value="<?php echo $update_date; ?>"
                                                       id="create_date"
                                                       disabled
                                                       class="form-control"/>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="form-group required col-md-12 col-xs-12">
                                        <div class="col-md-2 col-xs-2" align="right">
                                            <label class=" control-label" for="input-create-by">แก้ไขโดย</label>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
                                            <div class="">
                                                <input type="text" name="create_by"
                                                       value="<?php echo $update_by_name ?>"
                                                       id="input-create-by" disabled
                                                       class="form-control"/>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>

                                <?php } ?>
                            <?php } ?>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-keyword-thai">Meta keyword thai</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="meta_keyword_thai"
                                               value="<?php echo $meta_keyword_thai; ?>"
                                               placeholder="meta keyword thai" id="input-keyword-thai"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-keyword-eng">Meta keyword eng</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="meta_keyword_eng"
                                               value="<?php echo $meta_keyword_eng; ?>"
                                               placeholder="meta keyword eng" id="input-keyword-eng"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-description-thai">Meta description
                                        thai</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="meta_description_thai"
                                               value="<?php echo $meta_description_thai; ?>"
                                               placeholder="meta description thai" id="input-description-thai"
                                               class="form-control"/>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="form-group required col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-2" align="right">
                                    <label class=" control-label" for="input-description-eng">Meta description
                                        eng</label>
                                </div>
                                <div class="col-md-10 col-xs-10">
                                    <div class="">
                                        <input type="text" name="meta_description_eng"
                                               value="<?php echo $meta_description_eng; ?>"
                                               placeholder="meta description eng" id="input-description-eng"
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
                                        <select name="category_status" id="input-status" class="form-control">

                                            <option
                                                    value="0" <?php if ($category_status == 0) { ?>
                                                selected="selected" <?php } ?> >
                                                ปิดการใช้งาน
                                            </option>
                                            <option
                                                    value="1" <?php if ($category_status == 1) { ?>
                                                selected="selected" <?php } ?>>
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
                    </form>
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

    //    init_event({
    //        fn: [readyLoad],
    //        disEvent: ["click,#button-save", "focusout,#minimum", "focusout,#reward", "focusout,#maximum", "focusout,#commission"
    //            , "focusout,#tbody-setting-default input", "focusout,#input-user-credit", "change,.my_percent_user"
    //            , "change,.sub_percent_user", "focusout,.my_percent_user", "focusout.sub_percent_user"]
    //        document_on: [ 'click,#button-save'],
    //        document_ready: [get_field, add_select_picker]
    //    });

    init_event({
        document_on: ['click,#button-save'],
        document_ready: [add_select_picker]
    });

//    function readyLoad() {
//        $('.input-number').maskMoney();
//    }

        //    function formatNumber(number) {
        //        //var int_number = Number(number);
        //        var p = number.toFixed(2).split(".");
        //        var minus = p[0].substring(0, 1);
        //        if (minus == "-") {
        //            p[0] = p[0].substring(1, p[0].length);
        //
        //            return "-" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
        //                    return number + (i && !(i % 3) ? "," : "") + acc;
        //                }, "") + "." + p[1];
        //        }
        //        else {
        //            return "" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
        //                    return number + (i && !(i % 3) ? "," : "") + acc;
        //                }, "") + "." + p[1];
        //        }
        //    }

        $(document).on("click", "#button-save", function () {
            $.ajax({
                url: '<?php echo base_url(); ?>category/validate_form',
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

                        if ($('input[name="category_id"]').val()) {
                            edit_category();
                        } else {
                            add_category();
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

        function add_category() {
            $.ajax({
                url: '<?php echo base_url(); ?>category/add_category',
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

        function edit_category() {
            var category_id = $('input[name="category_id"]').val();
            $.ajax({
                url: '<?php echo base_url(); ?>category/edit_category',
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

        function add_select_picker() {
            $('.selectpicker').selectpicker({style: 'btn-default', size: 4});
        }

</script>