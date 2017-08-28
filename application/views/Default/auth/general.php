<?php
defined('BASEPATH') OR exit('No direct script access allowed');

get_header('sugar');
global $CI;

?>
<div id="content">
	<?php
	if('development' === ENVIRONMENT){
		/*echo '<div class="row">';
		var_dump($user); var_dump($user_meta);
		echo '</div>';*/
	}
	?>

	<div class="row" id="page-content-wrapper">
		<div class="col-md-9">

			<?php echo get_form('user-general'); ?>

		</div>

		<!-- Sidebar -->
		<div class="col-md-3">
		<?php echo get_sidebar('user'); ?>
		</div>

	</div>

</div>
<?php get_footer('sugar'); ?>