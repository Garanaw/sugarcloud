<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div >
	<div id="accordion" class="panel-group">
		<button type="button" id="draggable" class="btn btn-inverse" data-toggle="collapse" data-target="#new_sugar_value">
			<i class="fa fa-heartbeat" title="Add New"></i> <?php _e('sugar_form_collapsible_button_record_new_value'); ?>
		</button>

		<?php
		echo get_form('sugar');
		?>

	</div>
</div>