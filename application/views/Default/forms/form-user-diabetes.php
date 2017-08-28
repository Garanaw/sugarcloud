<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form method="post" name="diabetes" action=<?php echo base_url('user/update'); ?>>
	<?php
	if(!empty(get_instance()->session->flashdata())){
		?>
		<fieldset class="form-group panel panel-inverse">
			<div class="panel-heading">
				<h2 class="panel-title">Info</h2>
			</div>
			<div class="panel-body">
				<?php 
				if(get_instance()->session->flashdata('success')){
					if(get_instance()->session->flashdata('insulin_update_success')){
						echo '<div class="alert alert-success">';
						echo get_instance()->session->flashdata('insulin_update_success');
						echo '</div>';
					}
				}
				if(get_instance()->session->flashdata('error')){
					if(get_instance()->session->flashdata('insulin_update_error')){
						echo '<div class="alert alert-danger">';
						echo get_instance()->session->flashdata('insulin_update_error');
						echo '</div>';
					}
				}
				?>
			</div>
		</fieldset>
		<?php
	}
	?>
	<?php echo form_hidden('form', 'diabetes'); ?>

	<fieldset class="form-group panel panel-inverse">

		<div class="panel-heading">
			<h2 class="panel-title"><?php _e('user_account_diabetes_basic_info'); ?></h2>
		</div>

		<div class="panel-body">

			<div class="form-group row">
				<label for="diabetes_type" class="control-label col-md-3 col-form-label"><?php _e('user_account_diabetes_type'); ?></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
						<?php
						 $types = array(
						 	'null'=>'Select Type',
						 	'type-1'=>'Type 1',
						 	'type-2'=>'Type 2',
						 	'gestational'=>'Gestational'
						 );
						 echo form_dropdown('diabetes_type', 
						 	$types, 
						 	((isset($user_meta['diabetes_type'])) ? $user_meta['diabetes_type'] : null), 
						 	array('class'=>'form-control')
						 );
						?>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="debut" class="control-label col-md-3 col-form-label"><?php _e('user_account_debut'); ?></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
					<?php
					$debut = array(
						'type'=>'date',
						'name'=>'debut',
						'id'=>'datepicker',
						'class'=>'form-control',
						'value'=>(isset($user_meta['debut']) ? $user_meta['debut'] : NULL)
					);
					echo form_input($debut);
					?>
						</div>
					</div>
				</div>
			</div>

		</div>

	</fieldset>

	<fieldset class="form-group panel panel-inverse">

		<div class="panel-heading">
			<h2 class="panel-title"><?php _e('user_account_diabetes_med_list'); ?></h2>
		</div>

		<div class="panel-body" id="med-list">
			<div class="form-group row">
				<div class="col-md-3">
					<label class="control-label col-form-label"><?php _e('user_account_current_meds'); ?></label>
				</div>
				<div class="col-md-6">
					<?php
					$current_meds = get_instance()->db->select('insulin_list.id, name')->
									from('insulin_list', 'wi_users_meds')->
									join('wi_users_meds', 'users_meds.id_med = insulin_list.id')->
									join('wi_users', 'wi_users.id = wi_users_meds.id_user')->
									where('wi_users.id', $user->id)->where('users_meds.current', 1)->get()->result_array();

					if(!empty($current_meds)){
						?>
						<div class="row row-debug">
							<div class="col-md-12 col-debug"></div>
						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th><?php _e('user_account_name'); ?></th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
						<?php
						foreach ($current_meds as $med) {
						?>
							<tr>
								<td class="name" data-insulin="<?php echo $med['id']; ?>"><?php echo $med['name']; ?></td>
								<td class="actions"><i class="fa fa-remove cursor-pointer text-danger remover" aria-hidden="true"></i></td>
							</tr>
						<?php
						}
						echo '</tbody></table>';
					}else{
						echo 'No hay medicinas actualmente';
					}
					?>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="insulin1" class="control-label col-md-3 col-form-label"><?php _e('user_account_add_new_med'); ?></label>
				<div class="col-md-6">
					<select name="insulin[]" id="insulin1" class="form-control">
						<option value="">--------Insulin?--------</option>
						<?php
						$insulins = get_instance()->db->get('insulin_list')->result_array();
						foreach ($insulins as $insulin) {
							$c = strtolower(str_replace(' ', '-', $insulin['name']));
							echo '<option value="'.$insulin['id'].'">'.$insulin['name'].'</option>'."\n";
						}
						?>
					</select>
				</div>
				<div class="col-md-3" id="button-container">
					<button type="button" id="add-new" class="btn btn-inverse">
						<i class="fa fa-plus" aria-hidden="true"></i>
						<?php _e('user_account_add_new_med'); ?>		
					</button>
				</div>
			</div>

		</div>
		
	</fieldset>

	<?php echo form_submit('submit', __('user_account_submit'), array('class'=>'btn btn-inverse')); ?>

</form>
<div id="debug"></div>