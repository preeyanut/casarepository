<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Category List
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category List</li>
    </ol>
</section>

<!-- Main content -->
<div id="container-content">

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-11"><h3 class="box-title">Category List</h3></div>
                        <div class="col-md-1">
                            <a href="<?= base_url() ?>category/get_form">
                                <button type="button" name="button-add" style="width: 100px"
                                        id="button-add" class="btn btn-primary ">New
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="box-header with-border" style="background-color:#ccc;">
                        <div class="form-group form-horizontal">
                            <div class="col-sm-8 form-horizontal">
                                <div class="col-sm-4" style="float: left;">
                                    <label class=" control-label" for="input-search" style="float: left">จำนวน
                                        : </label>
                                    <div class="col-sm-8">
                                        <select id="filter-number" name="table_summay_master_length"
                                                aria-controls="table_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="-1">All</option>
                                        </select>
                                    </div>
                                    <label class="control-label" for="input-search">แถว </label>
                                </div>
                                <div class="col-sm-4" style="float: left;">
                                    <label class=" control-label" for="input-search" style="float: left">สถานะ
                                        : </label>
                                    <div class="col-sm-8">
                                        <select id="filter-status" name="table_summay_master_length"
                                                aria-controls="table_summay_master"
                                                class="form-control input-sm input-xsmall input-inline">
                                            <option value="-1">ทั้งหมด</option>
                                            <option value="0">ปิดการใช้งาน</option>
                                            <option value="1">เปิดใช้งาน</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <label class="col-sm-3 control-label" for="input-search">ค้นหา : </label>
                                <div class="col-sm-9">
                                    <input type="text" name="search" placeholder="ค้นหา" id="input-search"
                                           class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php //echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
                        <div class="table-responsive  box-body ">
                            <table class="table table-bordered table-hover">
                                <thead class="table">
                                <tr>
                                    <td class="text-center">ลำดับ</td>
                                    <td class="text-center">ชื่อหมวดหมู่</td>
                                    <td class="text-center">ประเภท</td>
                                    <td class="text-center">ไอคอน</td>
                                    <td class="text-center">ระดับ</td>
                                    <td class="text-center">วันที่เพิ่ม</td>
                                    <td class="text-center">พนักงานที่เพิ่ม</td>
                                    <td class="text-center">แก้ไขล่าสุด</td>
                                    <td class="text-center">พนักงานที่แก้ไข</td>
                                    <td class="text-center">สถานะ</td>
                                    <td class="text-center">จัดการ</td>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                <?php if ($groups) {
                                    $count = 1; ?>
                                    <?php foreach ($groups as $category) { ?>
                                        <tr id="tr_id<?php echo $category['category_id']; ?>" class="tr_id">

                                            <td class="text-center"><?php echo $count;
                                                $count++; ?></td>
                                            <td class="text-center"><?php echo $category['category_name']; ?></td>
                                            <td class="text-center"><?php for ($i = 0; $i < count($type_id); $i++) {
                                                if($type_id[$i] == $category['type_id']){
                                                    echo $type_name[$i];
                                                }
                                                }; ?></td>
                                            <td class="text-center"><?php echo $category['category_icon']; ?></td>
                                            <td class="text-center"><?php echo $category['priority_level']; ?></td>
                                            <td class="text-center"><?php echo $category['create_date']; ?></td>
                                            <td class="text-center">
                                                <?php for ($i = 0; $i < count($user_id); $i++) {
                                                    if ($category['create_by'] == $user_id[$i]) {
                                                        echo $username[$i];
                                                    }
                                                } ?>
                                            </td>
                                            <td class="text-center"><?php echo $category['update_date']; ?></td>
                                            <td class="text-center">
                                                <?php for ($i = 0; $i < count($user_id); $i++) {
                                                    if ($category['update_by'] == $user_id[$i]) {
                                                        echo $username[$i];
                                                    }
                                                } ?>
                                            </td>
                                            <td class="text-center"><?php if ($category['category_status'] == 0) {
                                                    echo "ปิดการใช้งาน";
                                                } else {
                                                    echo "เปิดใช้งาน";
                                                } ?></td>
                                            <td class="text-center">
                                                <button type="button"
                                                        name="button-edit<?php echo $category['category_id']; ?>"
                                                        id="button-edit" class="btn btn-warning button-edit">แก้ไข
                                                </button>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td class="text-center" colspan="9"><?php // echo $text_no_results; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <div class="col-sm-6">
                                <ul class="pagination" style="visibility: visible;">
                                    <li class="prev">
                                        <a class="paging" href="#" id="page-1" title="Prev"><i
                                                    class="fa fa-angle-left"></i></a>
                                    </li>
                                </ul>
                                <div class="container-paging pagination">

                                </div>

                                <ul class="pagination" style="visibility: visible;">

                                    <li class="next">
                                        <a class="paging" href="#" id="page+1" title="Next"><i
                                                    class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" name="filter-page" id="filter-page"
                                   class="form-control"/>
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

    init_event({
        fn: [readyFn],
        controlerPaging: 'category/get_paging',
        functionPaging: search,
        disEvent: ["click,.button-edit"]
    });

    function readyFn() {
        get_paging();
    }

    function formatNumber(number) {
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

    function reload_category(category_id) {
        $("#tbody").empty();
        $.ajax({
            url: '<?php echo base_url(); ?>category/get_all',
            type: 'post',
            data: "category_id=" + category_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var categorys = data["list"];
                $("#tbody").empty();
                for (var i = 0; i < categorys.length; i++) {
                    var category = categorys[i];

                    var color_status = "";
                    var str_status = "";

                    switch (category.category_status) {
                        case 0:
                            color_status = "#00A65A";
                            str_status = "ทั้งหมด";
                            break;
                        case 1:
                            color_status = "#DD4B39";
                            str_status = "ปิดการใช้งาน";
                            break;
                        case 2 :
                            color_status = "#CCCCCC";
                            str_status = "เปิดใช้งาน";
                            break;
                    }

                    var html = "<tr class='tr_id" + category.category_id + "'  style='cursor: pointer;'>"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + category.category_name + "</td>"
                        + "<td class='text-center'>" + category.create_date + "</td>"
                        + "<td class='text-center'>" + category.username + "</td>"
                        + "<td class='text-center'>" + category.update_date + "</td>"
                        + "<td class='text-center'>" + category.username + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + "</tr>";

                    $("#tbody").append(html);
                }
                alert("get  OK");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function search() {
        var txtSearch = $("#input-search").val();
        var filterNumber = $("#filter-number").val();
        var filterPage = $("#filter-page").val();
        var filterStatus = $("#filter-status").val();

        $.ajax({
            url: '<?php echo base_url(); ?>category/search',
            type: 'post',
            data: "txtSearch=" + txtSearch + "&filter-number=" + filterNumber + "&filter-page=" + filterPage + "&filter-status=" + filterStatus,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var categorys = data["list"];
                $("#tbody").empty();
                for (var i = 0; i < categorys.length; i++) {
                    var category = categorys[i];
                    var color_status = "";
                    var str_status = "";
                    switch (Number(category.category_status)) {
                        case 0:
                            color_status = "#00A65A";
                            str_status = "ปกติ";
                            break;
                        case 1:
                            color_status = "#DD4B39";
                            str_status = "ถูกระงับ";
                            break;
                        case 2 :
                            color_status = "#CCCCCC";
                            str_status = "ปิดใช้งาน";
                            break;
                    }
                    var html = "<tr class='tr_id" + category.category_id + "'  >"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + category.category_name + "</td>"
                        + "<td class='text-center'>" + category.create_date + "</td>"
                        + "<td class='text-center'>" + category.username + "</td>"
                        + "<td class='text-center'>" + category.update_date + "</td>"
                        + "<td class='text-center'>" + category.username + "</td>"
                        + "<td class='text-center' style='color: " + color_status + "'>"
                        + str_status + "</td>"
                        + " <td class='text-center'><button type='button' name='button-edit" + category.category_id + "' "
                        + " id='button-edit' class='btn btn-warning button-edit'>แก้ไข</button></td>"
                        + "</tr>";
                    $("#tbody").append(html);
                }
                label_format_number();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    function get_paging() {
        var txtSearch = $("#input-search").val();
        var filterNumber = $("#filter-number").val();
        var filterPage = $("#filter-page").val();
        var filterStatus = $("#filter-status").val();

        $.ajax({
            url: '<?php echo base_url(); ?>category/get_paging',
            type: 'post',
            data: "txtSearch=" + txtSearch + "&filter-number=" + filterNumber + "&filter-page=" + filterPage + "&filter-status=" + filterStatus,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var paging = data["paging"];
                $(".container-paging").empty();
                for (var i = 1; i <= paging; i++) {
                    var html = "<li><a class='paging' href='#' id='page" + i + "'>" + i + "</a></li>";
                    $(".container-paging").append(html);
                }
                $("#page1").css("background-color", "#eeeeee");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    $(document).on("click", ".button-edit", function () {
        var category_id = this.name.replace("button-edit", "");
        window.open("<?php echo base_url(); ?>category/get_form?category_id=" + category_id, "_self");
    });

</script>