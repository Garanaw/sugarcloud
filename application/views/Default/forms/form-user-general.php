<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form method="post" name="general" action=<?php echo base_url('user/update'); ?>>
	<?php echo form_hidden('form', 'general'); ?>

	<fieldset class="form-group panel panel-inverse">

		<div class="panel-heading">
			<h2 class="panel-title"><?php _e('user_account_personal_information_settings'); ?></h2>
		</div>

		<div class="panel-body">

			<div class="form-group row">
				<label for="first_name" class="control-label col-md-3 col-form-label"><?php _e('user_account_name'); ?></label>
				<div class="col-md-9">
					<?php
					$first_name_input = array(
						'type' => 'text', 
						'name' => 'first_name',
						'class' => 'form-control',
						'value' => set_value('first_name', $user->first_name)
					);
					echo form_input($first_name_input);
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="last_name" class="control-label col-md-3 col-form-label"><?php _e('user_account_last_name'); ?></label>
				<div class="col-md-9">
					<?php
					$last_name_input = array(
						'type' => 'text',
						'name' => 'last_name',
						'class' => 'form-control',
						'value' => set_value('last_name', $user->last_name)
					);
					echo form_input($last_name_input);
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="control-label col-md-3 col-form-label"><?php _e('user_account_email'); ?></label>
				<div class="col-md-9">
					<?php
					$email_input = array(
						'type' => 'email',
						'name' => 'email',
						'class' => 'form-control',
						'value' => set_value('last_name', $user->email)
					);
					echo form_input($email_input);
					?>
				</div>
			</div>

		</div>

	</fieldset>

	<fieldset class="form-group panel panel-inverse">
		
		<div class="panel-heading">
			<h2 class="panel-title"><?php _e('user_account_glucose_settings'); ?></h2>
		</div>

		<div class="panel-body">

			<div class="form-group row">
				<label for="messure" class="control-label col-md-3 col-form-label"><?php _e('user_account_messure'); ?></label>
				<div class="col-md-9">
					<?php
					$is_checked = (isset($user_meta['messure']) AND ($user_meta['messure'] === 'Mg' OR $user_meta['messure'] === 'Mg/dl')) ? 
								false :
								true;
					$checkbox = array(
					 	'name'=>'messure',
					 	'value'=>'messure',
					 	'id'=>'messure',
					 	'checked'=>$is_checked,
					 	'class'=>'form-control',
					 	'data-toggle'=>'toggle',
					 	'data-onstyle'=>'success',
					 	'data-offstyle'=>'success',
					 	'data-on'=>'Mmol/l',
					 	'data-off'=>'Mg/dl'
					);
					echo form_checkbox($checkbox);
					echo '<span id="fixer-container">';
					 // in order to receive the checkbox if not checked, set a hidden field fix:
					if(!$is_checked){
					 	$hidden_fix = array(
					 		'name'=>'messure',
					 		'value'=>'false',
					 		'id'=>'messure-fix',
					 					 	'type'=>'hidden'
					 	);
					 	echo form_input($hidden_fix);
					}
					echo '</span>';
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="low" class="control-label col-md-3 col-form-label"><?php _e('user_account_low'); ?></label>
				<div class="col-md-9">
					<?php
					$low = array(
						'type'=>'number',
						'name'=>'low',
						'class'=>'form-control',
						'value'=>(isset($user_meta['low']) ? $user_meta['low'] : null),
						'step' =>0.1
					);
					echo form_input($low);
					?>
				</div>
			</div>

			<div class="form-group row">
				<label for="high" class="control-label col-md-3 col-form-label"><?php _e('user_account_high'); ?></label>
				<div class="col-md-9">
					<?php
					$high = array(
						'type'=>'number',
						'name'=>'high',
						'class'=>'form-control',
						'value'=>(isset($user_meta['high']) ? $user_meta['high'] : null),
						'step' =>0.1
					);
					echo form_input($high);
					?>
				</div>
			</div>

		</div>

	</fieldset>

	<?php echo form_submit('submit', __('user_account_submit'), array('class'=>'btn btn-inverse')); ?>

</form>