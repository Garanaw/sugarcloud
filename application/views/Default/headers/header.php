<?php echo doctype('html5') ?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php _e(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
	<?php

	$CI =& get_instance();

	$default_scripts = array(
		'jquery/jquery-1.4.4'
		/*'jquery/jquery-1.9.1',
		'jquery/jquery-1.4.4',
		'jquery/jquery-ui-1.12.0',
		'bootstrap/bootstrap.min'*/
	);
	$default_styles = array(
		/*'jquery/jquery-ui', 
		'jquery/jquery-ui.structure', 
		'jquery/jquery-ui.theme',
		'style' /*, 
		'bootstrap/bootstrap.min'*/
	);

	$scripts = array_merge($default_scripts, $CI->get_scripts());
	$styles = array_merge($default_styles, $CI->get_styles());

	echo "\n".'<!-- Styles -->'."\n";
	foreach ($styles as $style) {
		print_css($style);
	}

	echo "\n".'<!-- Scripts -->'."\n";
	foreach ($scripts as $script) {
		print_js($script);
	}

	?>

</head>
<body>
<header>
	<?php echo get_menu('v2'); ?>
	<?php /*echo get_menu();*/ ?>
</header>

<div class="container-fluid"> <!-- container begins -->
