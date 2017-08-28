<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<form method="post" name="bio" action=<?php echo base_url('user/update'); ?>>
	<?php echo form_hidden('form', 'bio'); ?>

	<fieldset class="form-group panel panel-inverse">

		<div class="panel-heading">
			<h2 class="panel-title"><?php _e('user_account_personal_information_settings'); ?></h2>
		</div>

		<div class="panel-body">
			<div class="form-group row">
				<label for="gender" class="control-label col-md-3 col-form-label"><?php _e('user_account_gender_title'); ?></label>
				<div class="col-md-9">
					<?php
					$is_checked = (isset($user_meta['gender']) AND ($user_meta['gender'] === 'male')) ? true : false;
					$checkbox = array(
						'name'=>'gender',
						'value'=>'gender',
						'id'=>'gender',
						'checked'=>$is_checked,
						'class'=>'form-control',
						'data-toggle'=>'toggle',
						'data-onstyle'=>'success',
						'data-offstyle'=>'success',
						'data-on'=>__('user_account_gender_male'),
						'data-off'=>__('user_account_gender_female')
					);
					echo form_checkbox($checkbox);
					echo '<span id="fixer-container">';
					 // in order to receive the checkbox if not checked, set a hidden field fix:
					if(!$is_checked){
					 	$hidden_fix = array(
					 		'name'=>'gender',
					 		'value'=>'gender',
					 		'id'=>'gender-fix',
					 					 	'type'=>'hidden'
					 	);
					 	echo form_input($hidden_fix);
					}
					echo '</span>';
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="bio" class="control-label col-md-3 col-form-label"><?php _e('user_account_bio'); ?></label>
				<div class="col-md-9">
					<?php
					 $bio = array(
					 	'name'=>'bio',
					 	'value'=>(isset($user_meta['bio']) ? $user_meta['bio'] : null),
					 	'class'=>'form-control',
					 	'maxlength'=>'250'
					 );
					 echo form_textarea($bio);
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="phone" class="control-label col-md-3 col-form-label"><?php _e('user_account_phone'); ?></label>
				<div class="col-md-9">
					<?php
					 $phone = array(
					 	'type'=>'tel',
					 	'name'=>'phone',
					 	'class'=>'form-control',
					 	'value' => set_value('phone', $user->phone)
					 );
					 echo form_input($phone);
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="birthdate" class="control-label col-md-3 col-form-label"><?php _e('user_account_birthdate'); ?></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-4">
							<?php
							$birthdate = array(
								'type'=>'date',
								'name'=>'birthdate',
								'class'=>'form-control',
								'id'=>'birthdate',
								'value'=>(isset($user_meta['birthdate']) ? $user_meta['birthdate'] : NULL)
							);
							echo form_input($birthdate);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</fieldset>

	<fieldset class="form-group panel panel-inverse">
		
		<div class="panel-heading">
			<h2 class="panel-title"><?php _e('user_account_localization_settings'); ?></h2>
		</div>

		<div class="panel-body">

			<div class="form-group row">
				<label for="country" class="control-label col-md-3 col-form-label"><?php _e('user_account_country'); ?></label>
				<div class="col-md-9">
					<?php
						echo form_dropdown('country',
							__('countries'),
							(isset($user_meta['country']) ? $user_meta['country'] : NULL),
							'class="form-control"'
						);
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="language" class="control-label col-md-3 col-form-label"><?php _e('user_account_language'); ?></label>
				<div class="col-md-9">
					<?php
					$active_languages = get_instance()->config->item('active_languages');
					echo form_dropdown('language',
						$active_languages,
						(isset($user_meta['language']) ? $user_meta['language'] : NULL),
						array('class'=>'form-control')
					);
					?>
				</div>
			</div>

		</div>

	</fieldset>

	<?php

	// TO DO:
	// Implement social networks and make it capable to login with them

	/*<fieldset class="form-group panel panel-inverse">
		
	<div class="panel-heading">
		<h2 class="panel-title"><?php _e('user_account_social_title'); ?></h2>
	</div>

	<div class="panel-body">
		
		SOCIAL LINKS:<br>
		Twitter<br>
		Facebook<br>

	</div>

	</fieldset>*/
	?>

	<?php echo form_submit('submit', __('user_account_submit'), array('class'=>'btn btn-inverse')); ?>

</form>