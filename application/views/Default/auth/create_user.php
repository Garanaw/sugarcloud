<?php defined('BASEPATH') OR exit('No direct script access allowed');

get_header('sugar');
global $CI;

?>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title"><?php _e('create_user_heading'); ?></h3>
			</div>

			<form method="post" action="<?php echo base_url('user/create_user'); ?>" class="form panel-body" role="form">

				<div class="form-group">
					<label for="first_name" class="control-label"><?php _e('create_user_fname_label'); ?></label>
					<input type="text" name="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>">
				</div>

				<div class="form-group">
					<label for="first_name" class="control-label"><?php _e('create_user_lname_label'); ?></label>
					<input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>">
				</div>

				<div class="form-group">
					<label for="username" class="control-label"><?php _e('create_user_username_label'); ?></label>
					<input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>">
				</div>

				<div class="form-group">
					<label for="email" class="control-label"><?php _e('create_user_email_label'); ?></label>
					<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
				</div>

				<div class="form-group">
					<label for="phone" class="control-label"><?php _e('create_user_phone_label'); ?></label>
					<input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>">
				</div>

				<div class="form-group">
					<label for="password" class="control-label"><?php _e('create_user_password_label'); ?></label>
					<input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
				</div>

				<div class="form-group">
					<label for="password_confirm" class="control-label"><?php _e('create_user_password_confirm_label'); ?></label>
					<input type="password" name="password_confirm" class="form-control" value="<?php echo set_value('password_confirm'); ?>">
				</div>

			  <input type="submit" name="create_user" class="btn btn-inverse" value="<?php _e('create_user_heading'); ?>">

			</form>
			
		</div>
	</div>
</div>