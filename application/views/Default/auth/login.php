<?php
defined('BASEPATH') OR exit('No direct script access allowed');

get_header('login');
global $CI;

?>
<div id="content">

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="row">
				<div class="col-md-12" id="status"></div>
			</div>
			<div class="login-panel panel panel-inverse">
				<div class="panel-heading">
					<h3 class="panel-title"><?php _e('login_sign_in'); ?></h3>
				</div>
				<div class="panel-body">
					<?php if ($this->session->flashdata('message')): ?>
						<div class="alert alert-danger fade in">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<?= $this->session->flashdata('message') ?>
						</div>
					<?php endif; ?>
					<form role="form" method="POST" action="<?= base_url('auth/login') ?>">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="identity" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<div class="form-group">
								<?php
								/*
								<div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true" scope="public_profile,email" onlogin="checkLoginState();">
								</div>
								*/
								?>
							</div>
							<button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>