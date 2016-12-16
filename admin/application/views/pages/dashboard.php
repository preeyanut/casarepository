<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="center-horizontal">

                <div style="display: inline;position:relative;"><img src="assets/img/logo-test.png" style="height:120px;weight:120px;"></div>
                <h1 ">
                    Casabet <br><small>Casabet Lotto System</small>
                </h1>

            </div>
        </div>
        <div class="box-header with-border" style="background-color:#ccc;display: none">
            <div class="form-group form-horizontal">
                <div class="col-sm-12 form-horizontal ">
                    <div class="col-sm-4 center-horizontal" style="float: left;">

<!--                        --><?php // echo $this->ckeditor->editor('', ''); ?>
<!--                        <label class=" control-label" for="input-search" style="float: left">งวดวันที่-->
<!--                            : </label>-->
<!--                        <div class="col-sm-8">-->
<!--                            <select id="filter-period-lotto" name="period_lotto"-->
<!--                                    aria-controls="period_lotto"-->
<!--                                    class="form-control input-sm input-xsmall input-inline">-->
<!--                                --><?php //foreach ($period_lotto as $item) {
//
//                                    if ($item['lotto_result_date'] === $current_period) { ?>
<!--                                        <option-->
<!--                                            value="--><?php //echo $item['lotto_result_date']; ?><!--">--><?php //echo $item['lotto_result_date']; ?><!--</option> --><?php
//                                    } else {
//                                        ?>
<!--                                        <option-->
<!--                                            value="--><?php //echo $item['lotto_result_date']; ?><!--">--><?php //echo $item['lotto_result_date']; ?><!--</option> --><?php
//                                    }
//                                    ?>
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $user_credit; ?></h3>
                    <h4>เครดิตของคุณ</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="" class="small-box-footer"></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $user_total_buy; ?></h3>
                    <h4>ยอดพนันทั้งหมด</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="" class="small-box-footer"></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $user_credit_balance; ?></h3>
                    <h4>เครดิตคงเหลือ</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer"></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $user_balance; ?></h3>
                    <h4>ยอดค้างคงเหลือ</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="" class="small-box-footer"></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

<!--    <div class="row">-->
<!---->
<!--        <div class="col-md-12 center-horizontal">-->
<!--            <div class="box box-primary">-->
<!--                <div class="box-header with-border text-center">-->
<!--                    <h2 class="box-title">ใบหวย</h2>-->
<!--                </div>-->
<!--                <form action="--><?php ////echo $delete; ?><!--" method="post" enctype="multipart/form-data" id="form-bank">-->
<!--                    <div class="table-responsive  box-body " style="padding: 0px !important;">-->
<!--                        <table class="table table-bordered table-hover">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <td class="text-center">#</td>-->
<!--                                <td class="text-center">ประเภท</td>-->
<!--                                <td class="text-center">เลข</td>-->
<!--                                <td class="text-center">จำนวน</td>-->
<!--                                <td class="text-center">ส่วนลด</td>-->
<!--                                <td class="text-center">สุทธิ</td>-->
<!--                                <td class="text-center">วัน-เวลา</td>-->
<!--                                <td class="text-center">ผล</td>-->
<!--                                <td class="text-center">รางวัล</td>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody id="tbody-lotto">-->
<!---->
<!--                            <td class="text-center" colspan="9"></td>-->
<!---->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
    <!-- Main row -->

    <!-- /.row (main row) -->
</section>

<script>

    function readyLoad() {
//        reloadListLotto();
        format_to_money();
        label_format_number();
        h_format_number();
    }

    init_event({
        notMaskMoney: true,
        fn: [readyLoad]
    });

    function reloadListLotto(){

        $("#tbody-lotto").empty();

        var period = $("#filter-period-lotto").val();
        console.log (period);
        $.ajax({
            url: '<?php echo base_url(); ?>dashboard/get_my_lotto_number',
            type: 'post',
            data: "period_lotto="+period,
            dataType: 'json',
            crossDomain: true,
            beforeSend: function (){
                //  $('#button-delete').button('loading');
            },
            complete: function (){
                //$('#button-delete').button('reset');
            },
            success: function (json){
                var data = json.Data;
                var lottos = data["data_lotto"];

                console.log (lottos);

                for(var i =0;i<lottos.length;i++){

                    var tr_color = "";
                    var str_status ="-";
                    if(lottos[i].lotto_status){
                        tr_color = "#A6FED6";
                        str_status = "ถูกรางวัล";
                    }
                    console.log(lottos[i].lotto_status);
                    if(period==-1){
                        str_status = "รอการออกรางวัล";
                    }
                    var lotto = lottos[i];
                    var html = "<tr id='lotto_number_id"+lotto.lotto_number_id+"' style='background-color: "+tr_color+"'>"
                        +"<td class='text-center'>"+(i+1)+"</td>"
                        +"<td class='text-center'>"+lotto.lotto_type_name+"</td>"
                        +"<td class='text-center'> "+lotto.lotto_number+"</td>"
                        +"<td class='text-center'><label class='label-number'>"+lotto.lotto_price+"</label></td>"
                        +"<td class='text-center'><label class='label-number'>"+lotto.lotto_discount+"</label></td>"
                        +"<td class='text-center'><label class='label-number'>"+lotto.lotto_total+"</label></td>"
                        +"<td class='text-center'>"+lotto.lotto_date_added+"</td>"
                        +"<td class='text-center'>"+str_status+"</td>"
                        +"<td class='text-center'><label class='label-number'>"+lotto.lotto_reward+"</label></td>"
                        +"</tr>";
                    $("#tbody-lotto").append(html);
                }

                label_format_number();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });

    }

    function label_format_number() {

        var label_type_number = $(".label-number");
        for (var i = 0; i < label_type_number.length; i++) {
            var intValue = Number(label_type_number[i].innerHTML.trim());
            $(".label-number")[i].innerHTML = formatNumber(intValue);
        }
    }

    function formatNumber(number) {
        //var int_number = Number(number);
        var p = number.toFixed(2).split(".");
        var minus = p[0].substring(0, 1);
        if(minus=="-"){
            p[0] = p[0].substring(1,p[0].length);

            return "-" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
                    return number + (i && !(i % 3) ? "," : "") + acc;
                }, "") + "." + p[1];
        }
        else{
            return "" + p[0].split("").reverse().reduce(function (acc, number, i, orig) {
                    return number + (i && !(i % 3) ? "," : "") + acc;
                }, "") + "." + p[1];
        }
    }

    function h_format_number() {

        var label_type_number = $("h3");

        for (var i = 0; i < label_type_number.length; i++) {
            var intValue = Number(label_type_number[i].innerHTML.trim());
            $("h3")[i].innerHTML = formatNumber(intValue);
        }
    }

</script>