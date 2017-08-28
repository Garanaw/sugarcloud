<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<form method="post" 
	name="new_sugar_value" 
	id="new_sugar_value" 
	class="form-horizontal collapse" 
	action="<?php echo base_url('sugar/record_sugar'); ?>" role="form">

	<div class="form-group">
		<label for="date" class="col-lg-2 control-label">Date</label>
		<div class="col-xs-3">
			<input type="date" name="date" id="datepicker" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="timepicker" class="col-lg-2 control-label">Time</label>
		<div class="col-xs-3">
			<input id="timepicker" type="time" name="time" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="messure" class="col-lg-2 control-label">Messure</label>
		<div class="col-xs-3">
			<select name="messure" id="messure" class="form-control">
				<option value="mmol/l">Mmol/l</option>
				<option value="mg/dl">Mg/dl</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="value" class="col-lg-2 control-label">Value</label>
		<div class="col-xs-3">
			<input type="text" name="value" id="value" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="insulin1" class="col-lg-2 control-label">Insulin 1</label>
		<div class="col-xs-3">
			<select name="insulin1" id="insulin1" class="form-control">
				<option value="null">--------Insulin?--------</option>
				<?php
				$insulins = get_instance()->db->get('insulin_list')->result_array();
				foreach ($insulins as $insulin) {
					$c = strtolower(str_replace(' ', '-', $insulin['name']));
					echo '<option value="'.$c.'">'.$insulin['name'].'</option>'."\n";
				}
				?>
			</select>
		</div>

		<label for="units1" class="col-lg-2 control-label">Units</label>
		<div class="col-xs-3">
			<input type="number" name="units1" min="1" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="insulin2" class="col-lg-2 control-label">Insulin 2</label>
		<div class="col-xs-3">
			<select name="insulin2" id="insulin2" class="form-control">
				<option value="null">--------Insulin?--------</option>
				<?php
				foreach ($insulins as $insulin) {
					$c = strtolower(str_replace(' ', '-', $insulin['name']));
					echo '<option value="'.$c.'">'.$insulin['name'].'</option>'."\n";
				}
				?>
			</select>
		</div>

		<label for="units2" class="col-lg-2 control-label">Units</label>
		<div class="col-xs-3">
			<input type="number" name="units2" min="1" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<label for="comment" class="col-lg-2 control-label">Comment</label>
		<div class="col-xs-3">
			<textarea name="comment" id="comment" class="form-control"></textarea>
		</div>
	</div>

	<div class="form-group">
		<span class="col-lg-2"></span>
		<div class="col-xs-3">
			<input type="submit" name="send" class="btn btn-inverse btn-lg" value="Record">
		</div>
	</div>
</form>