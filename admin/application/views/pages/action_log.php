<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.ajaxfileupload.js"></script>
<section class="content-header">
    <h1>
        Log List
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Log List</li>
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
                        <div class="col-md-11 col-xs-9"><h3 class="box-title">Log List</h3></div>
                        <div class="col-md-1 col-xs-2">
                            <a href="<?= base_url() ?>log">
                            </a>
                        </div>
                    </div>
                    <div class="box-header with-border" style="background-color:#ccc;">
                        <div class="form-group form-horizontal">
                            <div class="col-md-8 col-xs-8 form-horizontal">
<!--                                <div class="col-md-4 col-xs-6" style="float: left;">-->
<!--                                    <label class="col-sm-3 col-xs-3 control-label" for="input-search"-->
<!--                                           style="float: left">จำนวน </label>-->
<!--                                    <div class="col-sm-6 col-xs-9">-->
<!--                                        <select id="filter-number" name="table_summay_master_length"-->
<!--                                                aria-controls="table_summay_master"-->
<!--                                                class="form-control input-sm input-xsmall input-inline">-->
<!--                                            <option value="10">10</option>-->
<!--                                            <option value="25">25</option>-->
<!--                                            <option value="50">50</option>-->
<!--                                            <option value="-1">All</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                    <label class="control-label" for="input-search">แถว </label>-->
<!--                                </div>-->
<!---->
<!--                                <div class="col-md-4 col-xs-6" style="float: left;">-->
<!--                                    <label class="col-sm-3 col-xs-3 control-label" for="input-search"-->
<!--                                           style="float: left">สถานะ </label>-->
<!--                                    <div class="col-md-9 col-xs-9">-->
<!--                                        <select id="filter-status" name="table_summay_master_length"-->
<!--                                                aria-controls="table_summay_master"-->
<!--                                                class="form-control input-sm input-xsmall input-inline">-->
<!--                                            <option value="-1">ทั้งหมด</option>-->
<!--                                            <option value="0">ปิดการใช้งาน</option>-->
<!--                                            <option value="1">เปิดใช้งาน</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                            <div class="col-sm-4 col-xs-4 text-right">
                                <label class="col-sm-3 col-xs-3 control-label" for="input-search">ค้นหา </label>
                                <div class="col-sm-9 col-xs-9">
                                    <input type="text" name="search" placeholder="ค้นหา"
                                           id="input-search"
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
                                    <td class="text-center">เหตุการณ์</td>
                                    <td class="text-center">เกี่ยวกับ</td>
                                    <td class="text-center">ไอดี</td>
                                    <td class="text-center">พนักงาน</td>
                                    <td class="text-center">ข้อความ</td>
                                    <td class="text-center">วันที่</td>

                                </tr>
                                </thead>
                                <tbody id="tbody">
                                <?php //echo var_dump($list) ; ?>
                                <?php if ($list) {
                                    $count = 1; ?>
                                    <?php foreach ($list as $log) { ?>
                                        <tr id="tr_id<?php echo $log['log_id']; ?>" class="tr_id">

                                            <td class="text-center"><?php echo $count;
                                                $count++; ?></td>
                                            <td class="text-center"><?php echo $log['action']; ?></td>
                                            <td class="text-center"><?php echo $log['action_table']; ?></td>
                                            <td class="text-center"><?php echo $log['action_to']; ?></td>
                                            <td class="text-center"><?php echo $log['action_by_name']; ?></td>
                                            <td class="text-center"><?php echo $log['sql_script']; ?></td>
                                            <td class="text-center"><?php echo $log['action_date']; ?></td>

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
        document_on: [
            'keyup,#input-search'
            , 'click,.paging'
        ], document_ready: [
            get_paging
        ]
    });

    $(document).on("keyup", "#input-search", function () {
        search_user();
        get_paging();
    });

    function reload_log(log_id) {
        $("#tbody").empty();
        $.ajax({
            url: '<?php echo base_url(); ?>action_log/get_all',
            type: 'post',
            data: "log_id=" + log_id,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var logs = data["list"];
                $("#tbody").empty();
                for (var i = 0; i < logs.length; i++) {
                    var log = logs[i];

                    var html = "<tr class='tr_id" + log.log_id + "'  style='cursor: pointer;'>"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + log.action + "</td>"
                        + "<td class='text-center'>" + log.action_table + "</td>"
                        + "<td class='text-center'>" + log.action_to + "</td>"
                        + "<td class='text-center'>" + log.action_by_name + "</td>"
                        + "<td class='text-center'>" + log.sql_script + "</td>"
                        + "<td class='text-center'>" + log.action_date + "</td>"
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

    $(document).on("click", ".paging", function () {
        var page_number = this.id.replace("page", "");
        $(".paging").css("background-color", "#ffffff");
        var max_page = $('.container-paging').find('li').length;
        var current_page = $("#filter-page").val();
        if (current_page == 0) {
            current_page = 1;
        }
        if (page_number == "-1" && current_page > 1) {
            $("#filter-page").val(current_page - 1);
            $("#page" + (current_page - 1)).css("background-color", "#eeeeee");
        } else if (page_number == "+1" && current_page < max_page) {
            $("#filter-page").val(Number(current_page) + 1);
            $("#page" + (Number(current_page) + 1)).css("background-color", "#eeeeee");
        } else if (page_number != "-1" && page_number != "+1") {
            $("#filter-page").val(page_number);
            $("#page" + page_number).css("background-color", "#eeeeee");
        } else {
            $("#page" + (Number(current_page))).css("background-color", "#eeeeee");
        }
        search_user();
    });

    function get_paging() {
        var txtSearch = $("#input-search").val();
        var filterPage = $("#filter-page").val();

        $.ajax({
            url: '<?php echo base_url(); ?>action_log/get_paging',
            type: 'post',
            data: "txtSearch=" + txtSearch + "&filter-page=" + filterPage,
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

    function search_user() {
        var txtSearch = $("#input-search").val();
        var filterPage = $("#filter-page").val();

        $.ajax({
            url: '<?php echo base_url(); ?>action_log/search_user',
            type: 'post',
            data: "txtSearch=" + txtSearch + "&filter-page=" + filterPage ,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (json) {
                var data = json.Data;
                var logs = data["list"];
                $("#tbody").empty();
                for (var i = 0; i < logs.length; i++) {
                    var log = logs[i]

                    var html = "<tr class='tr_id" + log.log_id + "'  >"
                        + "<td class='text-center'>" + (i + 1) + "</td>"
                        + "<td class='text-center'>" + log.action + "</td>"
                        + "<td class='text-center'>" + log.action_table + "</td>"
                        + "<td class='text-center'>" + log.action_to + "</td>"
                        + "<td class='text-center'>" + log.action_by_name + "</td>"
                        + "<td class='text-center'>" + log.sql_script + "</td>"
                        + "<td class='text-center'>" + log.action_date + "</td>"
                        + "</tr>";
                    $("#tbody").append(html);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

</script>