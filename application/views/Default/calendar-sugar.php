<?php


?>

<div id="modal-new" class="modal fade">
	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title"><?php _e('sugar_modal_add_new_value'); ?> <span></span></h3>
			</div>

			<div class="modal-body">
				<?php
				echo get_form('sugar');
				?>
			</div>

			<div class="modal-footer">
				footer
			</div>

		</div>

	</div>
</div>

<div id="calendar-wrapper">

	<div id="calendar-controls" class="row">
		<div id="calendar-message" class="ui-corner-all col-md-6">
			<blockquote id="message" class="ui-corner-all" style="min-height:130px">
				<span id="eventDate"></span>
				<span id="value"></span>
				<span id="insulin_1"></span>
				<span id="insulin_2"></span>
				<span id="comment"></span>
			</blockquote>
		</div>
	</div>

	<div id="calendar"></div>
</div>