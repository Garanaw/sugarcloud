<?php
defined('BASEPATH') OR exit('No direct script access allowed');

get_header('sugar');
global $CI;

?>
<div id="content">

	<div class="row" id="page-content-wrapper">
		<div class="col-md-9">

			<?php echo get_form('user-bio'); ?>

		</div>

		<!-- Sidebar -->
		<div class="col-md-3">
		<?php echo get_sidebar('user'); ?>
		</div>

	</div>

</div>
<?php get_footer('sugar'); ?>