<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php $this->load->view('layout/header'); ?>
</head>
<body>


<style>
	.body-container{
		border: 1px solid #ff0000;
	}
	body{
		margin: 0px;
		background-image: url(https://www.casa98th.com/assets/css/../img/new-bg.jpg);
		/* background-repeat: no-repeat; */
		/* background-position: top center; */
		background-size: 950px 671px;
	}

	footer{
		padding: 10px;
		/*background-image: url(https://www.casa98th.com/assets/css/../img/main-nav-bg2.jpg);*/
		background-image: url(http://casa98-th.com/images/casa/bg.jpg);
		background-repeat: no-repeat;
		background-size: 100% ;
	}
</style>
<div id="container" class="body-container">

	<?php $this->load->view($page); ?>

</div>

</body>
<footer>
	<?php $this->load->view('layout/footer'); ?>
</footer>
</html>