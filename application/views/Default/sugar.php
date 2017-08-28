<?php
defined('BASEPATH') OR exit('No direct script access allowed');

get_header('sugar');
global $CI;

?>
<div id="content">

	<?php

	$load = (isset($template)) ? $template : 'charts';

	echo get_template_part($load, 'sugar');

	?>

</div>
<?php get_footer('sugar'); ?>