<?php
echo doctype('html5');

$CI =& get_instance();
?>
<html lang="<?php echo $CI->get_lang_code(); ?>">
<head>
	<meta charset="utf-8">
	<?php
	if(isset($title)){echo '<title>'.$title.'</title>';}

	/*foreach(__('meta_keywords') as $keyword){
		add_keyword($keyword);
	}*/
	set_meta_tag('description', __('meta_description'));
	echo generate_meta_tags();
	?>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
	<script type="text/javascript">
		window.cookieconsent_options = {
			"message":"This website uses cookies to ensure you get the best experience on our website",
			"dismiss":"Got it!",
			"learnMore":"More info",
			/*"container":"div#cookieconsent div.col-md-12",*/
			"link":null,
			"theme":"dark-bottom"
		};
	</script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
	<!-- End Cookie Consent plugin -->

	<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
	<?php

	$default_scripts = array(
		'jquery/jquery-1.4.4'
	);
	$default_styles = array(
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
<div id="fb-root"></div>
<header>
	<?php echo get_menu('v2'); ?>
</header>

<div class="container-fluid main-container"> <!-- container begins -->
