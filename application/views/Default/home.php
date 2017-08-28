<?php
defined('BASEPATH') OR exit('No direct script access allowed');

get_header('sugar');
global $CI;

?>
<div id="content">

	<!-- Heading Row -->
	<div class="row">
		
		<div class="col-md-8">
			<?php
			$img = 'header.jpg';
			echo img($img, false, array('class'=>'img-responsive img-rounded'));
			?>
		</div>

		<div class="col-md-4">
			<h1><?php echo $CI->config->item('site_title'); ?></h1>
			<p><?php _e('home_intro_1'); ?></p>
			<p><?php _e('home_intro_2'); ?></p>
			<a class="btn btn-inverse btn-lg" href="#"><?php _e('home_call_to_action'); ?></a>
		</div>
	</div>

	<hr>

	<!-- Call to Action Well -->
	<div class="row">
		<div class="col-lg-12">
			<div class="well well-sm text-center">
				<h2 class="h2"><?php _e('home_tagline'); ?></h2>
			</div>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">
		<?php
			$img_path = get_subdir_full_path('images/');
		?>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $img_path; ?>graph.png">
						<?php echo img('graph.png', false, array('class'=>'img-responsive img-thumbnail', 'title'=>'Gráficos')); ?>
						<div><small class="text-muted"><?php _e('home_graphs_title'); ?></small></div>
					</a>
					<p><?php _e('home_graphs_text'); ?></p>
					<hr>
					<p>
						<a href="<?php echo base_url('sugar/charts'); ?>" class="btn btn-inverse" role="button"><?php _e('home_button_see_more'); ?></a>
					</p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $img_path; ?>calendar.png">
						<?php echo img('calendar.png', false, array('class'=>'img-responsive img-thumbnail', 'title'=>'Calendario')); ?>
						<div><small class="text-muted"><?php _e('home_calendar_title'); ?></small></div>
					</a>
					<p><?php _e('home_calendar_text'); ?></p>
					<hr>
					<p>
						<a href="<?php echo base_url('sugar/calendar'); ?>" class="btn btn-inverse" role="button"><?php _e('home_button_see_more'); ?></a>
					</p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $img_path; ?>personal_area.png">
						<?php echo img('personal_area.png', false, array('class'=>'img-responsive img-thumbnail', 'title'=>'panel')); ?>
						<div><small class="text-muted"><?php _e('home_personal_area_title'); ?></small></div>
					</a>
					<p><?php _e('home_personal_area_text'); ?></p>
					<hr>
					<p>
						<a href="<?php echo base_url('user/account'); ?>" class="btn btn-inverse" role="button"><?php _e('home_button_see_more'); ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>

<?php get_footer('sugar'); ?>