<div id="header" class="header">

    <title><?= $this->Config_model->get_config_webname() ?></title>

    <!--	--------------------------------------------  CSS ------------------------------------------------->

    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style-switcher.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/flaticon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/css_ajax.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.datetimepicker.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"><!-- font icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link href="<?= base_url() ?>plugins/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!--	-------------------------------------------- End CSS ------------------------------------------------->

    <!--	--------------------------------------------  Javascript  ------------------------------------------------->

    <script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <script id="moneyScript" src="<?= base_url() ?>assets/js/jquery.maskMoney.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>

<!--    <script src="--><?//= base_url() ?><!--plugins/datepicker/bootstrap-min.js"></script>-->
    <script src="<?= base_url() ?>plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!--	-------------------------------------------- End Javascript ------------------------------------------------->

    <div id="annual"></div>


    <script type="application/javascript">

        var custom_load_page_data=false;

        function init_event(data) {
            custom_load_page_data = data;

            if (custom_load_page_data.document_ready) {
                for (var i = 0; i < custom_load_page_data.document_ready.length; i++) {
                    custom_load_page_data.document_ready[i]();
                }
            }
        }

        function remove_init_event() {
            if (typeof custom_load_page_data.document_on != 'undefined') {
                for (var i = 0; i < custom_load_page_data.document_on.length; i++) {
                    var data = custom_load_page_data.document_on[i].split(',');
                    $(document).off(data[0], data[1]);
                }
            }
        }

        $(document).on("click", ".btn-logout", function () {
            var result = confirm("ยืนยันการออกจากระบบ");
            if (result === true) {
                $.ajax({
                    url: '<?php echo base_url(); ?>dashboard/logout',
                    type: 'post',
                    data: "user_id=0",
                    dataType: 'json',
                    crossDomain: true,
                    beforeSend: function () {
                        //  $('#button-delete').button('loading');
                    },
                    complete: function () {
                        //$('#button-delete').button('reset');
                    },
                    success: function (json) {
                        window.open("<?php echo base_url(); ?>", "_self");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        });

        $(document).on('click','.sidebar-menu a',function(ev){
            var urls = $(this)[0].href;
            if (urls.indexOf('#') !== -1) {
                return;
            }
            ev.preventDefault();
            window.history.pushState({
                title: 'casa98thailand',
                url: urls
            }, 'casa98thailand', urls);
            load_custom_page(urls);
        });

        function load_custom_page(urls) {
            remove_init_event();
            $('#container-custom-load-page').html('Loading...');
            $.post(urls, {'custom_load': 'true'}, function (data) {
                if (data.indexOf("<!DOCTYPE html>") !== -1) {
                    window.location.reload();
                }
                $('#container-custom-load-page').html('');
                $('#container-custom-load-page').html(data);
            }).fail(function () {
                $('#container-custom-load-page').html('has error.');
            });
        }

    </script>

</div>
