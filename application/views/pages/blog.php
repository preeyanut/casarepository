<style>
    .margin-0 {
        margin: 0px !important;
    }
    .row-body-center{
        text-align: center;
    }
    .text-center{
        text-align: center;
    }
    .font-white{
        color : #fff;
    }
</style>

<div id="container">
    <div id='home-banner' class="home-banner">
        <div class="container">
            <div class="row margin-0">
                <div class="col-xs-12 padding-0">
                    <div class="home-banner-animate">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='body-center' class="body-center">

        <div class="container">

            <div class="row-body-top text-center row margin-0">
                <h6>Body Top</h6>
                <h1 class="font-white"><?= $blog_title; ?></h1>
            </div>

            <div class="row-body-center row margin-0">
                <h6>Body Center</h6>
                <?php

                foreach ($blog_data as $item) {
                    ?>
                    <div class="row-body-center row margin-0">
                        <?php
                        switch ($item['field_type']) {

                            case 'text' :
                                $html_field = '<input type="text" id="' . $item['category_field_id'] . '" name="' . $item['field_id'] . '" class="form-control blog-value" value="' . $item['blog_value'] . '" />';
                                break;
                            case 'textarea' :
                                $html_field = '<input type="textarea" id="' . $item['category_field_id'] . '" name="' . $item['field_id'] . '" class="form-control date-picker blog-value" value="' . $item['blog_value'] . '" />';
                                $html_field .= ' <script type="text/javascript"> CKEDITOR.replace( "' . $item['field_id'] . '" ); </script>';
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
                                $html_field = '  <iframe width="100%" height="100%" src="' . $item['blog_value'] . '?rel=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>';
                                break;
                            case 'image' :
                                $html_field = '<img id="img-' . $item['field_id'] . '" style="max-height: 500px;" '
                                    . ' src="' . base_url() . 'admin/' . $item['blog_value'] . '" alt="" title="" data-placeholder="รูปสินค้า"/>';
                                break;
                        }
                        echo $html_field;
                        ?>
                    </div>

                    <?php


                }
                ?>
            </div>

            <div class="col-xs-12 text-center padding-0">
                <h6>Body Footer</h6>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var y = document.getElementsByClassName("mySlides-btn");

        for (i = 0; i < x.length; i++) {
            $('#btn-register-' + i).fadeOut(3000, function () {
                // Animation complete.
            });
            $('#img-slide-' + i).fadeOut(3000, function () {
                // Animation complete.
            });
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }

        var index = myIndex - 1;
        $('#btn-register-' + index).fadeIn(3000, function () {
            // Animation complete.
        });
        $('#img-slide-' + index).fadeIn(3000, function () {
            // Animation complete.
        });

        setTimeout(carousel, 10000); // Change image every 10 seconds
    }

</script>





















