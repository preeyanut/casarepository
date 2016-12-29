<style>
    .margin-0 {
        margin: 0px !important;
    }

    .row-body-center {
        text-align: center;
    }

    .text-center {
        text-align: center;
    }

    .font-white {
        color: #fff;
    }
</style>

<link rel='stylesheet' id='flexslider-css' href='<?= base_url(); ?>assets/css/flexslider.css?ver=2.6.3' type='text/css'
      media='all'/>
<script type='text/javascript' src='<?= base_url(); ?>assets/javascript/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?= base_url(); ?>assets/javascript/jquery.slides.min.js?ver=3.0.2'></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/javascript/customscript.js?ver=1.0.2"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/javascript/jquery.flexslider-min.js?ver=2.6.3"></script>

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

            <?php if (true) { ?>
                List
                <?php

            } else {
                ?>

                <div class="row-body-top text-center row margin-0">
                    </br>
                    <h1 class="font-white"><?= $blog_title; ?></h1>
                </div>

                <div class="row-body-center row margin-0">
                    <?php

                    foreach ($blog_data as $item) {
                        ?>
                        <div class="row-body-center row margin-0">
                            <?php
                            if ($item['blog_value']) {
                                switch ($item['field_type']) {
                                    case 'text' :
                                        $html_field = '<label class="text-single">' . $item['blog_value'] . '</label>';
                                        break;
                                    case 'textarea' :
                                        $html_field = urldecode($item['blog_value']);
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
                                        $html_field = '<img id="img-' . $item['field_id'] . '" style="max-height: 500px;" '
                                            . ' src="' . base_url() . 'admin/' . $item['blog_value'] . '" alt="" title="" data-placeholder="รูปสินค้า"/>';
                                        break;
                                }
                                echo $html_field;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-xs-12 text-center padding-0"></div>
                <?php
            } ?>

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





















