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
                    </br>
                    <div class="row-body-center row margin-0">
                        <?php
                        switch ($item['field_type']) {

                            case 'text' :
                                $html_field = '<label class="text-single">' . $item['blog_value'] . '</label>';
                                break;
                            case 'textarea' :
                                $html_field = urldecode ( $item['blog_value'] );
                                break;
                            case 'date' :
                                $html_field = '<label class="text-single">' . $item['blog_value'] . '</label>';
                                break;
                            case 'time' :
                                $html_field = '<label class="text-single">' . $item['blog_value'] . '</label>';
                                break;
                            case 'datetime' :
                                $html_field = '<label class="text-single">' . $item['blog_value'] . '</label>';
                                break;
                            case 'video-url' :
                                $html_field = ' <iframe style="width:70%;max-height:500px;min-height:500px" src="' . $item['blog_value'] . '?rel=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>';
                                break;
                            case 'image' :
                                $html_field = '<img id="img-' . $item['field_id'] . '" style="width:100%;max-height: 500px;" '
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





















