<?php
/**
 * Created by PhpStorm.
 * User: adminm
 * Date: 10/11/2558
 * Time: 11:22
 */
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=width-device,initial-scale=1 maximum-scale=1">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<title>Casabet</title>

	<link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/employee_signin.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet">
	<!--    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">-->

	<style>

		body{
			min-width: 280px;
		}
		.box-result{
			top: 83% ;
			min-width: 535px; !important;
		}

		.set-center {
			float: none !important;
			margin-left: auto;
			margin-right: auto;
		}

		@media (max-width: 480px) {
			.login-fields input {
				width: 100% !important;
			}
		}

		.gold-box{
			/*width: 500px;*/
			padding-bottom: 20px;
			margin-bottom: 20px;
			margin-top: 20px;
			min-height: 200px;
			border-radius: 18px;
			background-color: #B58226;
			background: -webkit-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
			background: -o-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
			background: -moz-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
			background: linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
		}
		.box-banner img {
			/**/
			width: 75%;
		}

		.box-primary h4 {
			font-weight: 700;
		}

		.box-primary input {
			box-shadow: 2px 2px 5px 2px rgba(130, 130, 130, 0.52) !important;
			/*font-size: 25px !important;*/
			font-weight: 700;
		}

		.marquee-casabet {
			position: absolute;
			background: -webkit-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
			background: -o-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
			background: -moz-linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
			background: linear-gradient(-214deg, #ebb948, #d2a450, #fad880, #d38f3d);
			width: 100%;
			height: 35px;
			min-width: 280px;
		}

		.text-marquee {
			color: #e01b1b;
			font-size: 17px;
			line-height: 2;
			font-weight: 700;
		}

		body {
			/*background: #006C32;*/
			background: #000;
		}

		@media (max-width: 767px) {
			.box-result{
				top: 100% !important;
				margin-right: 0px;
				margin-left: 0px;
				min-width: 535px; ;
			}
		}

		@media (max-width: 540px) {
			.box-result{
				top: 100% !important;
				margin-right: 0px;
				margin-left: 0px;
				min-width: 380px; ;
			}
		}
		@media (max-width: 380px) {
			.box-result{
				top: 100% !important;
				margin-right: 0px;
				margin-left: 0px;
				min-width: 190px; ;
			}
			.box-primary h4 {
				font-size: 14px;
			}
		}

		#sub-score {
			display: none;
		}
		#main-score {
			display: block;
		}
		@media (max-width: 480px) {
			#main-score {
				display: none;
			}
		}

		.container{
			margin-top: 15%;
		}
	</style>

</head>
<body>

<div class="container">

	<div class="" style=" ;margin-right: 0px;margin-left: 0px;">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="account-container "
				 style="margin-left: auto; margin-right: auto;background: #fff;
				 box-shadow: 2px 2px 5px 2px rgb(47, 44, 44) !important;
				 /*border: 5px solid #da9c49 !important; */
				 border: 1px solid #000 !important;
				 ">
				<br><br>
				<?php if (validation_errors()): ?>
					<?php echo validation_errors(); ?>
				<?php endif; ?>
				<?php if ($this->session->flashdata('already')): ?>
					<?php echo $this->session->flashdata('already'); ?>
				<?php endif; ?>
				<?php if ($this->session->flashdata('Success')): ?>
					<?php echo $this->session->flashdata('Success'); ?>
				<?php endif; ?>
				<div class="content clearfix">

					<!--                    <div class="col-sm12">-->
					<!--                        <img class="" src="--><?//= base_url() ?><!--assets/img/banner.png" style="width:100%;">-->
					<!--                    </div>-->

					<form method="post" name="form" action="login/employee_login">
						<center><h2> เข้าสู่ระบบ</h2></center>

						<center><h4><input type="hidden" id="employee_error" name="employee_error"
										   class="login password-field" required=""/></h4></center>

						<div class="login-fields">

							<div class="field">
								<label for="username">Username</label>
								<input type="text" id="employee_username" name="employee_username" value=""
									   placeholder="Username" class="login username-field" required=""/></div>
							<!-- /field -->
							<div class="field">
								<label for="password">Password:</label>
								<input type="password" id="employee_password" name="employee_password" value=""
									   placeholder="Password" class="login password-field" required=""/></div>
							<!-- /password -->
						</div>
						<!-- /login-fields -->
						<div class="login-actions">
							<span class="login-checkbox"></span>
							<input type="button" name="login" id="button-login"
								   class="button btn btn-success btn-large btn-login"
								   value="เข้าสู่ระบบ" autofocus>
						</div>
						<!-- .actions -->
						<div id="sub-score"  style="">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php if (count($period_lotto) > 0): ?>
								<div id="lotto_type_id0" class="row mar-top-10" style="min-width: 190px;">
									<div id="lotto_type_id0" class="row ">
										<div class=" center-horizontal text-center">

											<?php
											$originalDate = $current_period;
											$newDate = date("d/m/Y", strtotime($originalDate));
											?>

											<h4 class="center-horizontal" style=" ">ผลสลากรางวัลประจำวันที่
												: <?php echo $newDate; ?> </h4>
											<!--                            <h4 class="center-horizontal" style=" font-size: 30px !important;color: red">-->
											<?php // echo $newDate;  ?><!-- </h4>-->
										</div>
									</div>

									<!-- -------------------------- รางวัลที่ 1 ---------------------------- -->

									<div id="lotto_type_id4" class="row ">
										<div class=" col-sm-12 center-horizontal text-center set-center">

											<div class="col-sm-3">

												<h4 class="center-horizontal" style="color: red;">รางวัลที่1</h4>
												<input type="text" name="result_1st_prize"
													   value="<?php echo $lotto_type_id_0_pointer_1; ?>"
													   placeholder="รางวัลที่1" id="input-result-0" maxlength="6"
													   class=" form-control text-center input-result-number" disabled="disabled"
													/>

											</div>
											<div class="col-sm-3">
												<div class=" col-sm-12  set-center">
													<h4 class="center-horizontal" style="color: red;">3ตัวบน</h4>
													<input type="text" name="result1" value="<?php echo $lotto_type_id_1_pointer_1; ?>"
														   placeholder="3ตัวบน" id="input-result-1" maxlength="3"
														   class=" form-control text-center input-result-number" disabled="disabled"
														   disabled="disabled"/>
												</div>
											</div>

											<div class="col-sm-3">
												<div class=" col-sm-12  set-center">
													<h4 class="center-horizontal">2ตัวบน</h4>
													<input type="text" name="result1" value="<?php echo $lotto_type_id_4_pointer_1 ?>"
														   placeholder="2ตัวบน" id="input-result-12" maxlength="2"
														   class=" form-control text-center input-result-number" disabled="disabled"/>
												</div>
											</div>
											<div class="col-sm-3">
												<div class=" col-sm-12 set-center ">
													<h4 class="center-horizontal">2ตัวล่าง</h4>
													<input type="text" name="result1" value="<?php echo $lotto_type_id_5_pointer_1 ?>"
														   placeholder="2ตัวบน" id="input-result-13" maxlength="2"
														   class=" form-control text-center input-result-number" disabled="disabled"/>
												</div>
											</div>


										</div>
									</div>

									<div id="lotto_type_id4" class="row ">
										<div class=" col-sm-12 center-horizontal text-center set-center">

											<h4 class="center-horizontal" style="">3ตัวล่าง</h4>
										</div>
										<div class="col-sm-12">

											<div class=" col-sm-3  ">
												<div class=" col-sm-12  set-center">
													<input type="text" name="result1" pointer="1"
														   value="<?php echo $lotto_type_id_2_pointer_1; ?>"
														   placeholder="3ตัวบน ตัวที่1" id="input-result-2" maxlength="3"
														   class=" form-control text-center input-result-number"
														   disabled="disabled"/>
												</div>
											</div>
											<div class=" col-sm-3 ">
												<div class=" col-sm-12  set-center">
													<input type="text" name="result1" pointer="2"
														   value="<?php echo $lotto_type_id_2_pointer_2 ?>"
														   placeholder="3ตัวบน ตัวที่2" id="input-result-3" maxlength="3"
														   class=" form-control text-center input-result-number"
														   disabled="disabled"/>
												</div>
											</div>
											<div class=" col-sm-3 ">
												<div class=" col-sm-12  set-center">
													<input type="text" name="result1" pointer="3"
														   value="<?php echo $lotto_type_id_2_pointer_3 ?>"
														   placeholder="3ตัวบน ตัวที่3" id="input-result-4" maxlength="3"
														   class=" form-control text-center input-result-number"
														   disabled="disabled"/>
												</div>
											</div>
											<div class=" col-sm-3 ">
												<div class=" col-sm-12  set-center">
													<input type="text" name="result1" pointer="4"
														   value="<?php echo $lotto_type_id_2_pointer_4 ?>"
														   placeholder="3ตัวบน ตัวที่4" id="input-result-5" maxlength="3"
														   class=" form-control text-center input-result-number"
														   disabled="disabled"/>
												</div>
											</div>

										</div>


									</div>


									<?php else: ?>

										<div>ยังไม่มีข้อมูลให้แสดง</div>

									<?php endif; ?>
								</div>

								<!-- /account-container -->
							</div>

						</div>
					</form>
				</div>
				<!-- /content -->
			</div>
			<!-- /account-container -->
		</div>

	</div>

</div>

<!-- java scripts -->
<script src="<?= base_url() ?>assets/js/libs/jquery-1.9.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/bootstrap.js"></script>

<script type="application/javascript">

	$(document).on("click", "#button-login", function () {
		$.ajax({
			url: '<?php echo base_url(); ?>login/validateForm',
			type: 'post',
			data: $('input '),
			dataType: 'json',
			crossDomain: true,
			beforeSend: function () {
				$('#button-login').button('loading');
			},
			complete: function () {
				$('#button-login').button('reset');
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
						p++;
					}

					// Highlight any found errors
					$('.text-danger').parentsUntil('.form-group').parent().addClass('has-error');
				} else {

					login_employee();

					// Refresh products, vouchers and totals
					$('#button-refresh').trigger('click');
					$('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});

	$(document).on("keypress", "#employee_username", function (e) {
		if (e.keyCode == 13) {
			$("#button-login").click();
		}
	});

	$(document).on("keypress", "#employee_password", function (e) {
		if (e.keyCode == 13) {
			$("#button-login").click();
		}
	});

	function login_employee() {
		$.ajax({
			url: '<?php echo base_url(); ?>login/employee_login',
			type: 'post',
			data: $('input , select'),
			dataType: 'json',
			crossDomain: true,
			beforeSend: function () {
				$('#button-login').button('loading');
			},
			complete: function () {
				$('#button-login').button('reset');
			},
			success: function (json) {

				if (json['error']) {

					var p = 0;
					for (var i = 0; i < Object.keys(json['error']).length; i++) {
						var input_name = Object.keys(json['error'])[i];
						$("input[name='" + input_name + "']").after('<div class="text-danger">' + json['error'][input_name] + '</div>');
						p++;
					}

					// Highlight any found errors
					$('.text-danger').parentsUntil('.form-group').parent().addClass('has-error');
				} else {

					if (json.Result) {
						// alert("OK");
						window.open("<?php echo base_url(); ?>dashboard", "_self");
					} else {

					}
				}

			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}

</script>
</body>
</html>
