<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div id="modal-updating" class="modal fade">
	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Overall for <span></span></h3>
			</div>

			<div class="modal-body">
				Updating. . .
			</div>

			<div class="modal-footer">
				footer
			</div>

		</div>

	</div>
</div>

<?php
if(get_instance()->ion_auth->logged_in()){
	echo get_template_part('form', 'sugar');
}
?>

<div id="charts" class="row">

	<div id="line-char-wrapper" class="col-lg-12">
		<p>
			<h2><?php _e('sugar_day_controls'); ?></h2>
			<span><?php _e('sugar_day_average'); ?>: <span id="day_average"></span></span>
		</p>

		<div id="chart-line" class="col-lg-10" style="height: 250px;"></div>

		<div id="chart-line-legend" class="col-sm-2" style="height: 250px;">
			<div class="row text-center">
				<span id="see-mmol" class="cursor-pointer"><strong>Mmol/l &nbsp;</strong></span>
				<?php
				$class = (isset($user) && $user->messure == 'Mmol/l') ? 'fa-long-arrow-left' : 'fa-long-arrow-right';
				?>
				<strong><span id="see-switch" class="fa <?php echo $class; ?>"></span></strong>
				<span id="see-mg" class="cursor-pointer"><strong>&nbsp; Mg/dl</strong></span>
			</div><hr>
			<div class="col-md-2">
				<i id="btn-previous-date" class="fa fa-arrow-left" style="cursor: pointer;"></i>
			</div>
			<label for="line-date-selector" class="col-lg-7 control-label"><?php _e('sugar_select_day'); ?></label>
			<div class="col-md-2">
				<i id="btn-next-date" class="fa fa-arrow-right" style="cursor: pointer;"></i>
			</div>
			<input type="date" id="line-date-selector" name="day">
			<button type="button" id="line-day-update" class="btn btn-default"><?php _e('sugar_update'); ?></button>

			<table class="table">
				<thead>
					<th>-</th>
					<th><?php _e('sugar_month_average'); ?></th>
					<th><?php _e('sugar_week_average'); ?></th>
				</thead>
				<tbody>
					<tr>
						<td><?php _e('sugar_max'); ?></td>
						<td><span id="month_max"></span></td>
						<td><span id="week_max"></span></td>
					</tr>
					<tr>
						<td><?php _e('sugar_min'); ?></td>
						<td><span id="month_min"></span></td>
						<td><span id="week_min"></span></td>
					</tr>
					<tr>
						<td><?php _e('sugar_avg'); ?></td>
						<td><span id="month_avg"></span></td>
						<td><span id="week_avg"></span></td>
					</tr>
				</tbody>
			</table>

		</div>

	</div>

</div>
<br>