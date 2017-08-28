<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="sidebar sidebar-inverse sidebar-fixed-right">
	<div class="container-fluid">

		<div class="sidebar-header">
			<a class="sidebar-brand" href="#">Brand</a>
		</div>

		<div class="sidebar-inner" role="navigation">
			<ul class="nav sidebar-nav">
				<li><i class="fa fa-cog"></i><a href="<?php echo base_url('user/general'); ?>"><?php _e('user_account_menu_general'); ?></a></li>
				<li><i class="fa fa-user"></i><a href="<?php echo base_url('user/bio'); ?>"><?php _e('user_account_menu_bio'); ?></a></li>
				<li><i class="fa fa-medkit"></i><a href="<?php echo base_url('user/diabetes'); ?>"><?php _e('user_account_menu_medicine'); ?></a></li>
			</ul>
		</div>

	</div>
</nav>