<div id="slide-navigation" class="slide-navigation">
<<<<<<< HEAD
	<?php

	$query = $this->db->query("select user_group.permission  FROM user "
		. "    inner join user_group on user.user_group_id = user_group.user_group_id "
		. " WHERE user.user_id in (" . $this->session->userdata("user_id") . ")"
	);
	$get_permission = json_decode($query->result_array()[0]["permission"]);
	$access_permission = $get_permission->access;
	?>

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image" style="color: #ffffff;">
				<!--                    <i class="fa fa-user"></i>-->
				<!--                    <img src="-->
				<?php //echo $this->session->userdata('image'); ?><!--" class="img-circle" alt="User Image">-->
			</div>
			<div class="pull-left " style="color: #ffffff;">

				<p><?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'); ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li>
				<a href="<?= base_url() ?>dashboard">
					<i class="fa  fa-home"></i> <span>หน้าหลัก</span>
					<small class="label pull-right bg-red"></small>
				</a>
			</li>

<!--			                --><?php
//			                if (in_array("banner", $access_permission) || in_array("change_password", $access_permission)) {
//			                    ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-file-image-o"></i>
					<span>แบนเนอร์</span>
					<span class="label label-primary pull-right"></span>
				</a>
				<ul class="treeview-menu">
					<!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>banner"><i class="fa fa-circle-o"></i> แบนเนอร์ทั้งหมด</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>banner/getForm"><i class="fa fa-circle-o"></i> เพิ่มแบนเนอร์ใหม่</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
					<!--                            <li><a href="-->
					<? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
					<!--                            </li>-->
					<!--                        --><?php //} ?>
				</ul>
			</li>

			<!--                --><?php //} ?>

			<!--                --><?php
			//                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
			//                    ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-columns"></i>
					<span>บล็อก</span>
					<span class="label label-primary pull-right"></span>
				</a>
				<ul class="treeview-menu">
					<!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>blog"><i class="fa fa-circle-o"></i> บล็อกทั้งหมด</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>blog/get_form"><i class="fa fa-circle-o"></i> เพิ่มบล็อกใหม่</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
					<!--                            <li><a href="-->
					<? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
					<!--                            </li>-->
					<!--                        --><?php //} ?>
				</ul>
			</li>

			<!--                --><?php //} ?>


			<!--                --><?php
			//                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
			//                    ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-navicon"></i>
					<span>หมวดหมู่</span>
					<span class="label label-primary pull-right"></span>
				</a>
				<ul class="treeview-menu">
					<!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>category"><i class="fa fa-circle-o"></i> หมวดหมู่ทั้งหมด</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>category/get_form"><i class="fa fa-circle-o"></i> เพิ่มหมวดหมู่ใหม่</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
					<!--                            <li><a href="-->
					<? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
					<!--                            </li>-->
					<!--                        --><?php //} ?>
				</ul>
			</li>
			<!--                --><?php //} ?>

			<!--                --><?php
			//                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
			//                    ?>
			<li class="treeview">
				<a href="#">
					<i class="	fa fa-list"></i>
					<span>ประเภทหมวดหมู่</span>
					<span class="label label-primary pull-right"></span>
				</a>
				<ul class="treeview-menu">
					<!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>category_type"><i class="fa fa-circle-o"></i> ประเภททั้งหมด</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>category_type/get_form"><i class="fa fa-circle-o"></i> เพิ่มประเภทใหม่</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
					<!--                            <li><a href="-->
					<? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
					<!--                            </li>-->
					<!--                        --><?php //} ?>
				</ul>
			</li>

			<!--                --><?php //} ?>


			<!--                --><?php
			//                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
			//                    ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-dollar"></i>
					<span>รายการธนาคาร</span>
					<span class="label label-primary pull-right"></span>
				</a>
				<ul class="treeview-menu">
					<!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>bank_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>bank_list/getForm"><i class="fa fa-circle-o"></i>
					<li><a href="<?= base_url(); ?>bank"><i class="fa fa-circle-o"></i>
							เพิ่มรายการใหม่</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
					<!--                            <li><a href="-->
					<? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
					<!--                            </li>-->
					<!--                        --><?php //} ?>
				</ul>
			</li>
			<!--                --><?php //} ?>


			<!--                --><?php
			//                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
			//                    ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-play-circle-o"></i>
					<span>Live Stream</span>
					<span class="label label-primary pull-right"></span>
				</a>
				<ul class="treeview-menu">
					<!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>blog/blog_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>blog_list/getForm"><i class="fa fa-circle-o"></i> เพิ่มรายการใหม่</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
					<!--                            <li><a href="-->
					<? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
					<!--                            </li>-->
					<!--                        --><?php //} ?>
				</ul>
			</li>
			<!--                --><?php //} ?>

			<!--                --><?php
			//                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
			//                    ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-chain"></i>
					<span>Link</span>
					<span class="label label-primary pull-right"></span>
				</a>
				<ul class="treeview-menu">
					<!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>blog/blog_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
					<li><a href="<?= base_url(); ?>link_stream/get_form"><i class="fa fa-circle-o"></i> เพิ่มรายการใหม่</a>
					</li>
					<!--                        --><?php //} ?>
					<!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
					<!--                            <li><a href="-->
					<? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
					<!--                            </li>-->
					<!--                        --><?php //} ?>
				</ul>
			</li>
			<!--                --><?php //} ?>

			<?php
			if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user"></i>
						<span>บัญชีของฉัน</span>
						<span class="label label-primary pull-right"></span>
					</a>
					<ul class="treeview-menu">
						<?php if (in_array("my_balance", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>my_balance"><i class="fa fa-circle-o"></i> My Balance</a>
							</li>
						<?php } ?>
						<?php if (in_array("change_password", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>change_password"><i class="fa fa-circle-o"></i>
									เปลี่ยนรหัสผ่าน</a></li>
						<?php } ?>

					</ul>
				</li>
			<?php } ?>
			<?php
			if (in_array("buy_lotto", $access_permission) || in_array("view_ticket", $access_permission) || in_array("change_password", $access_permission)) {
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-list-alt"></i>
						<span>หวย</span>
						<span class="label label-primary pull-right"></span>
					</a>
					<ul class="treeview-menu">
						<?php if (in_array("buy_lotto", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>buy_lotto"><i class="fa fa-circle-o"></i> ซื้อหวย</a>
							</li>
						<?php } ?>
						<?php if (in_array("view_ticket", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>view_ticket"><i class="fa fa-circle-o"></i> รายการที่ซื้อ</a>
							</li>
						<?php } ?>
						<?php if (in_array("change_password", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>
							</li>
						<?php } ?>
					</ul>
				</li>
			<?php } ?>

			<?php

			if (in_array("user", $access_permission) || in_array("list_user", $access_permission)) {
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i>
						<span>รายการสมาชิก</span>
						<span class="label label-primary pull-right"></span>
					</a>
					<ul class="treeview-menu">
						<?php if (in_array("user", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>user"><i class="fa fa-user-plus"></i> เพื่มสมาชิก</a></li>
						<?php } ?>
						<?php if (in_array("list_user", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>list_user"><i class="fa fa-circle-o"></i>
									แอดมินทั้งหมด</a>
							</li>
						<?php } ?>
						<?php if (in_array("customer", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>customer"><i class="fa fa-user-plus"></i> เพิ่มลูกค้า</a>
							</li>
						<?php } ?>
						<?php if (in_array("list_customer", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>list_customer"><i class="fa fa-circle-o"></i>
									ลูกค้าทั้งหมด</a></li>
						<?php } ?>
					</ul>
				</li>
			<?php } ?>
			<?php
			if (in_array("user_group", $access_permission) || in_array("credit", $access_permission)
				|| in_array("commission", $access_permission)
				|| in_array("reward", $access_permission)
				|| in_array("percent", $access_permission)
				|| in_array("clear_credit", $access_permission)
			) {

				?>

				<li class="treeview">

					<a href="#">
						<i class="fa fa-sliders"></i>
						<span>จัดการสมาชิก</span>
						<span class="label label-primary pull-right"></span>
					</a>
					<ul class="treeview-menu">
						<?php if (in_array("user_group", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>user_group"><i class="fa fa-circle-o"></i>
									จัดกลุ่มสมาชิก</a></li>
						<?php } ?>
						<?php if (in_array("credit", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>credit"><i class="fa fa-circle-o"></i>
									จัดการเครดิต</a></li>
						<?php } ?>
						<?php if (in_array("commission", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>commission"><i class="fa fa-circle-o"></i>
									จัดการคอมมิชชั่น</a></li>
						<?php } ?>
						<?php if (in_array("reward", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>reward"><i class="fa fa-circle-o"></i>
									จัดการรางวัล</a></li>
						<?php } ?>
						<?php if (in_array("percent", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>percent"><i class="fa fa-circle-o"></i>
									จัดการเปอร์เซ็น</a></li>
						<?php } ?>
						<?php if (in_array("clear_credit", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>clear_credit"><i class="fa fa-circle-o"></i>
									จัดการยอดคงค้าง</a></li>
						<?php } ?>
					</ul>

				</li>

				<li class="treeview">
					<a href="<?= base_url(); ?>config/get_form">
						<i class="fa fa-gear"></i>
						<span>ตั้งค่าเว็บ</span>
						<span class="label label-primary pull-right"></span>
					</a>
				</li>

				<li class="treeview">
					<a href="<?= base_url(); ?>config_group/get_form">
						<i class="fa fa-gears"></i>
						<span>ขั้นสูง</span>
						<span class="label label-primary pull-right"></span>
					</a>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-hdd-o"></i>
						<span>Log</span>
						<span class="label label-primary pull-right"></span>
					</a>
				</li>

			<?php } ?>
			<?php
			if (in_array("report_estimate_profit", $access_permission)
				|| in_array("report_bet_user", $access_permission)
				|| in_array("report_bet_lotto_type", $access_permission)
				|| in_array("report_bet_lotto", $access_permission)
				|| in_array("report_result_user", $access_permission)
				|| in_array("report_result_lotto", $access_permission)
				|| in_array("report_bet_lotto_user", $access_permission)
			) {
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-bar-chart"></i>
						<span>รายงาน</span>
						<span class="label label-primary pull-right"></span>
					</a>
					<ul class="treeview-menu">

						<?php if (in_array("report_estimate_profit", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>report_estimate_profit"><i class="fa fa-circle-o"></i>
									รายงานรายได้ที่คาดคะเน</a>
							</li>
						<?php } ?>
						<?php if (in_array("report_bet_user", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>report_bet_user"><i class="fa fa-circle-o"></i>
									รายงานสรุปยอดรายบุคคล</a></li>
						<?php } ?>
						<?php if (in_array("report_bet_lotto_type", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>report_bet_lotto_type"><i class="fa fa-circle-o"></i>
									รายงานสรุปยอดชนิดหมายเลข</a></li>
						<?php } ?>
						<?php if (in_array("report_bet_lotto", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>report_bet_lotto"><i class="fa fa-circle-o"></i>
									รายงานสรุปยอดตามหมายเลข</a></li>
						<?php } ?>
						<?php if (in_array("report_result_user", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>report_result_user"><i class="fa fa-circle-o"></i>
									รายงานได้เสียรายบุคคล</a></li>
						<?php } ?>
						<?php if (in_array("report_result_lotto_type", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>report_result_lotto_type"><i class="fa fa-circle-o"></i>
									รายงานได้เสียชนิดหมายเลข</a></li>
						<?php } ?>
						<?php if (in_array("report_bet_lotto_user", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>report_bet_lotto_user"><i class="fa fa-circle-o"></i>
									รายงานการแทงตามหมายเลข</a></li>
						<?php } ?>

						<?php if (in_array("report_same_as", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>report_same_as"><i class="fa fa-circle-o"></i>
									รายงานการแทงรายบุคคล</a></li>
						<?php } ?>

					</ul>
				</li>
			<?php } ?>
			<?php
			if (in_array("lotto_group_type", $access_permission)
				|| in_array("lotto_type", $access_permission)
				|| in_array("limit_lotto", $access_permission)
				|| in_array("result", $access_permission)
				|| in_array("report_over_lotto", $access_permission)
			) {
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-cog"></i>
						<span>ตั้งค่าหวย</span>
						<span class="label label-primary pull-right"></span>
					</a>
					<ul class="treeview-menu">
						<?php if (in_array("lotto_group_type", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>lotto_group_type"><i class="fa fa-circle-o"></i>จัดการกลุ่มหมายเลข</a>
							</li>
						<?php } ?>
						<?php if (in_array("lotto_type", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>lotto_type"><i class="fa fa-circle-o"></i>จัดการชนิดหมายเลข</a>
							</li>
						<?php } ?>
						<?php if (in_array("limit_lotto", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>limit_lotto"><i class="fa fa-circle-o"></i>จัดการเงินถือสู้</a>
							</li>
						<?php } ?>
						<?php if (in_array("report_over_lotto", $access_permission)) { ?>
							<li><a href="<?= base_url() ?>report_over_lotto"><i class="fa fa-circle-o"></i>จัดการออกของ</a>
							</li>
						<?php } ?>
						<?php if (in_array("result", $access_permission)) { ?>
							<li><a href="<?= base_url(); ?>result"><i class="fa fa-circle-o"></i> จัดการผลสลากรางวัล</a>
							</li>
						<?php } ?>
					</ul>
				</li>
			<?php } ?>
			<?php if (in_array('manager_risk', $access_permission)) { ?>
				<li>
					<a href="<?= base_url() ?>manager_risk">
						<i class="fa fa-asterisk"></i> <span>ความเสี่ยง</span>
						<small class="label pull-right bg-red"></small>
					</a>
				</li>
			<?php } ?>
		</ul>

	</section>
=======
    <?php

    $query = $this->db->query("select user_group.permission  FROM user "
        . "    inner join user_group on user.user_group_id = user_group.user_group_id "
        . " WHERE user.user_id in (" . $this->session->userdata("user_id") . ")"
    );
    $get_permission = json_decode($query->result_array()[0]["permission"]);
    $access_permission = $get_permission->access;
    ?>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="color: #ffffff;">
                <!--                    <i class="fa fa-user"></i>-->
                <!--                    <img src="-->
                <?php //echo $this->session->userdata('image'); ?><!--" class="img-circle" alt="User Image">-->
            </div>
            <div class="pull-left " style="color: #ffffff;">

                <p><?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?= base_url() ?>dashboard">
                    <i class="fa  fa-home"></i> <span>หน้าหลัก</span>
                    <small class="label pull-right bg-red"></small>
                </a>
            </li>

            <!--			                --><?php
            //			                if (in_array("banner", $access_permission) || in_array("change_password", $access_permission)) {
            //			                    ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-image-o"></i>
                    <span>แบนเนอร์</span>
                    <span class="label label-primary pull-right"></span>
                </a>
                <ul class="treeview-menu">
                    <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>banner"><i class="fa fa-circle-o"></i> แบนเนอร์ทั้งหมด</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>banner/getForm"><i class="fa fa-circle-o"></i> เพิ่มแบนเนอร์ใหม่</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                    <!--                            <li><a href="-->
                    <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                    <!--                            </li>-->
                    <!--                        --><?php //} ?>
                </ul>
            </li>

            <!--                --><?php //} ?>

            <?php
            if (in_array("list_blog", $access_permission) || in_array("blog", $access_permission)) {
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-columns"></i>
                        <span>บล็อก</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (in_array("list_blog", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>list_blog"><i class="fa fa-circle-o"></i> บล็อกทั้งหมด</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("blog", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>blog/get_form"><i class="fa fa-circle-o"></i> เพิ่มบล็อกใหม่</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>

            <?php } ?>


            <!--                --><?php
            //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
            //                    ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-navicon"></i>
                    <span>หมวดหมู่</span>
                    <span class="label label-primary pull-right"></span>
                </a>
                <ul class="treeview-menu">
                    <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>category"><i class="fa fa-circle-o"></i> หมวดหมู่ทั้งหมด</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>category/get_form"><i class="fa fa-circle-o"></i>
                            เพิ่มหมวดหมู่ใหม่</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                    <!--                            <li><a href="-->
                    <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                    <!--                            </li>-->
                    <!--                        --><?php //} ?>
                </ul>
            </li>
            <!--                --><?php //} ?>

            <!--                --><?php
            //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
            //                    ?>
            <li class="treeview">
                <a href="#">
                    <i class="	fa fa-list"></i>
                    <span>ประเภทหมวดหมู่</span>
                    <span class="label label-primary pull-right"></span>
                </a>
                <ul class="treeview-menu">
                    <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>category_type"><i class="fa fa-circle-o"></i> ประเภททั้งหมด</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>category_type/get_form"><i class="fa fa-circle-o"></i>
                            เพิ่มประเภทใหม่</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                    <!--                            <li><a href="-->
                    <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                    <!--                            </li>-->
                    <!--                        --><?php //} ?>
                </ul>
            </li>

            <!--                --><?php //} ?>


            <!--                --><?php
            //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
            //                    ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dollar"></i>
                    <span>รายการธนาคาร</span>
                    <span class="label label-primary pull-right"></span>
                </a>
                <ul class="treeview-menu">
                    <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>bank_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>bank_list/getForm"><i class="fa fa-circle-o"></i>
                            เพิ่มรายการใหม่</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                    <!--                            <li><a href="-->
                    <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                    <!--                            </li>-->
                    <!--                        --><?php //} ?>
                </ul>
            </li>
            <!--                --><?php //} ?>


            <!--                --><?php
            //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
            //                    ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-play-circle-o"></i>
                    <span>Live Stream</span>
                    <span class="label label-primary pull-right"></span>
                </a>
                <ul class="treeview-menu">
                    <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>blog/blog_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>blog_list/getForm"><i class="fa fa-circle-o"></i> เพิ่มรายการใหม่</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                    <!--                            <li><a href="-->
                    <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                    <!--                            </li>-->
                    <!--                        --><?php //} ?>
                </ul>
            </li>
            <!--                --><?php //} ?>

            <!--                --><?php
            //                if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
            //                    ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-chain"></i>
                    <span>Link</span>
                    <span class="label label-primary pull-right"></span>
                </a>
                <ul class="treeview-menu">
                    <!--                        --><?php //if (in_array("bank_list", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>blog/blog_list"><i class="fa fa-circle-o"></i> รายการทั้งหมด</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("addnew", $access_permission)) { ?>
                    <li><a href="<?= base_url(); ?>link_stream/get_form"><i class="fa fa-circle-o"></i> เพิ่มรายการใหม่</a>
                    </li>
                    <!--                        --><?php //} ?>
                    <!--                        --><?php //if (in_array("change_password", $access_permission)) { ?>
                    <!--                            <li><a href="-->
                    <? //= base_url(); ?><!--list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>-->
                    <!--                            </li>-->
                    <!--                        --><?php //} ?>
                </ul>
            </li>
            <!--                --><?php //} ?>

            <?php
            if (in_array("my_balance", $access_permission) || in_array("change_password", $access_permission)) {
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>บัญชีของฉัน</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (in_array("my_balance", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>my_balance"><i class="fa fa-circle-o"></i> My Balance</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("change_password", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>change_password"><i class="fa fa-circle-o"></i>
                                    เปลี่ยนรหัสผ่าน</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>
            <?php
            if (in_array("buy_lotto", $access_permission) || in_array("view_ticket", $access_permission) || in_array("change_password", $access_permission)) {
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i>
                        <span>หวย</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (in_array("buy_lotto", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>buy_lotto"><i class="fa fa-circle-o"></i> ซื้อหวย</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("view_ticket", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>view_ticket"><i class="fa fa-circle-o"></i> รายการที่ซื้อ</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("change_password", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>list_result"><i class="fa fa-circle-o"></i> ผลสลากรางวัล</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <?php

            if (in_array("user", $access_permission) || in_array("list_user", $access_permission)) {
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>รายการสมาชิก</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (in_array("user", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>user"><i class="fa fa-user-plus"></i> เพื่มสมาชิก</a></li>
                        <?php } ?>
                        <?php if (in_array("list_user", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>list_user"><i class="fa fa-circle-o"></i>
                                    แอดมินทั้งหมด</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("customer", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>customer"><i class="fa fa-user-plus"></i> เพิ่มลูกค้า</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("list_customer", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>list_customer"><i class="fa fa-circle-o"></i>
                                    ลูกค้าทั้งหมด</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php
            if (in_array("user_group", $access_permission) || in_array("credit", $access_permission)
                || in_array("commission", $access_permission)
                || in_array("reward", $access_permission)
                || in_array("percent", $access_permission)
                || in_array("clear_credit", $access_permission)
            ) {

                ?>

                <li class="treeview">

                    <a href="#">
                        <i class="fa fa-sliders"></i>
                        <span>จัดการสมาชิก</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (in_array("user_group", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>user_group"><i class="fa fa-circle-o"></i>
                                    จัดกลุ่มสมาชิก</a></li>
                        <?php } ?>
                        <?php if (in_array("credit", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>credit"><i class="fa fa-circle-o"></i>
                                    จัดการเครดิต</a></li>
                        <?php } ?>
                        <?php if (in_array("commission", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>commission"><i class="fa fa-circle-o"></i>
                                    จัดการคอมมิชชั่น</a></li>
                        <?php } ?>
                        <?php if (in_array("reward", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>reward"><i class="fa fa-circle-o"></i>
                                    จัดการรางวัล</a></li>
                        <?php } ?>
                        <?php if (in_array("percent", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>percent"><i class="fa fa-circle-o"></i>
                                    จัดการเปอร์เซ็น</a></li>
                        <?php } ?>
                        <?php if (in_array("clear_credit", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>clear_credit"><i class="fa fa-circle-o"></i>
                                    จัดการยอดคงค้าง</a></li>
                        <?php } ?>
                    </ul>

                </li>

                <li class="treeview">
                    <a href="<?= base_url(); ?>config/get_form">
                        <i class="fa fa-gear"></i>
                        <span>ตั้งค่าเว็บ</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?= base_url(); ?>config_group/get_form">
                        <i class="fa fa-gears"></i>
                        <span>ขั้นสูง</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-hdd-o"></i>
                        <span>Log</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                </li>

            <?php } ?>
            <?php
            if (in_array("report_estimate_profit", $access_permission)
                || in_array("report_bet_user", $access_permission)
                || in_array("report_bet_lotto_type", $access_permission)
                || in_array("report_bet_lotto", $access_permission)
                || in_array("report_result_user", $access_permission)
                || in_array("report_result_lotto", $access_permission)
                || in_array("report_bet_lotto_user", $access_permission)
            ) {
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i>
                        <span>รายงาน</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (in_array("report_estimate_profit", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>report_estimate_profit"><i class="fa fa-circle-o"></i>
                                    รายงานรายได้ที่คาดคะเน</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("report_bet_user", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>report_bet_user"><i class="fa fa-circle-o"></i>
                                    รายงานสรุปยอดรายบุคคล</a></li>
                        <?php } ?>
                        <?php if (in_array("report_bet_lotto_type", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>report_bet_lotto_type"><i class="fa fa-circle-o"></i>
                                    รายงานสรุปยอดชนิดหมายเลข</a></li>
                        <?php } ?>
                        <?php if (in_array("report_bet_lotto", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>report_bet_lotto"><i class="fa fa-circle-o"></i>
                                    รายงานสรุปยอดตามหมายเลข</a></li>
                        <?php } ?>
                        <?php if (in_array("report_result_user", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>report_result_user"><i class="fa fa-circle-o"></i>
                                    รายงานได้เสียรายบุคคล</a></li>
                        <?php } ?>
                        <?php if (in_array("report_result_lotto_type", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>report_result_lotto_type"><i class="fa fa-circle-o"></i>
                                    รายงานได้เสียชนิดหมายเลข</a></li>
                        <?php } ?>
                        <?php if (in_array("report_bet_lotto_user", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>report_bet_lotto_user"><i class="fa fa-circle-o"></i>
                                    รายงานการแทงตามหมายเลข</a></li>
                        <?php } ?>

                        <?php if (in_array("report_same_as", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>report_same_as"><i class="fa fa-circle-o"></i>
                                    รายงานการแทงรายบุคคล</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>
            <?php
            if (in_array("lotto_group_type", $access_permission)
                || in_array("lotto_type", $access_permission)
                || in_array("limit_lotto", $access_permission)
                || in_array("result", $access_permission)
                || in_array("report_over_lotto", $access_permission)
            ) {
                ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>ตั้งค่าหวย</span>
                        <span class="label label-primary pull-right"></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (in_array("lotto_group_type", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>lotto_group_type"><i class="fa fa-circle-o"></i>จัดการกลุ่มหมายเลข</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("lotto_type", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>lotto_type"><i
                                        class="fa fa-circle-o"></i>จัดการชนิดหมายเลข</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("limit_lotto", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>limit_lotto"><i
                                        class="fa fa-circle-o"></i>จัดการเงินถือสู้</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("report_over_lotto", $access_permission)) { ?>
                            <li><a href="<?= base_url() ?>report_over_lotto"><i class="fa fa-circle-o"></i>จัดการออกของ</a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("result", $access_permission)) { ?>
                            <li><a href="<?= base_url(); ?>result"><i class="fa fa-circle-o"></i> จัดการผลสลากรางวัล</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array('manager_risk', $access_permission)) { ?>
                <li>
                    <a href="<?= base_url() ?>manager_risk">
                        <i class="fa fa-asterisk"></i> <span>ความเสี่ยง</span>
                        <small class="label pull-right bg-red"></small>
                    </a>
                </li>
            <?php } ?>
        </ul>

    </section>
>>>>>>> ab2e25edfeae6925b9794b6f153bb47c50425433
</div>
