<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI = get_instance();
?>

<nav class="navbar navbar-inverse navbar-fixed-top" data-developer="menu-v2">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-inner navbar-collapse collapse" role="navigation">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url(); ?>"><?php _e('menu_home'); ?></a></li>

				<li><?php echo a('sugar/charts', '<span class="fa fa-line-chart pull-right"></span> '.__('menu_sugar_charts')); ?></li>

				<li><?php echo a('sugar/calendar', '<span class="fa fa-calendar pull-right"></span> '.__('menu_sugar_calendar')); ?></li>

				<?php
				if(logged_in() AND in_group('admin')){
					echo '<li>';
					echo '<a href="'.base_url('sugar/test').'">Test</a>';
					echo '</li>';
				}
				?>

			</ul>

			<ul class="nav navbar-nav navbar-right">
				<?php
				if(logged_in()){ ?>
					<li class="dropdown">
						<a href="<?php echo base_url('user/account'); ?>" class="dropdown-toggle" data-toggle="dropdown">
							<?php
								if(get_instance()->ion_auth->in_group('admin')){ $icon = 'fa-user-md'; }
								else{ $icon = 'fa-user'; }
							?>
							<span class="fa <?php echo $icon; ?>"></span>
							<?php
							echo ucfirst(get_instance()->ion_auth->user()->result_array()[0]['username']);
							?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('user/account'); ?>">Account</a></li>
							<li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
						</ul>
					</li>
				<?php
				}else{ ?>
					<li><a href="<?php echo base_url('user/login'); ?>">Log In <span class="glyphicon glyphicon-log-in"></span></a></li>
					<li><a href="<?php echo base_url('user/register'); ?>">Register <span class="glyphicon glyphicon-user"></span></a></li>
				<?php
				}
				?>
				<li class="divider-vertical hidden-xs"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
						<span class="flag-icon flag-icon-<?php echo get_country_code(); ?>"></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php
						$others = get_other_languages();
						foreach ($others as $code=>$lang) {
							$href = base_url().$CI->router->fetch_class().'/switchLang/'.
										strtolower($CI->config->item('language_codes')[strtolower($code)]);
							echo '<li><a href="'.$href.'"><span class="flag-icon flag-icon-'.
								get_country_code(get_country_from_lang(strtolower($CI->config->item('language_codes')[strtolower($code)]))).'"></span> ';
							echo '<span>'.ucfirst($lang).'</span></a></li>'."\n";
						}
						?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="row-fluid">
	<div class="span12">&nbsp;</div>
	<div class="span12">&nbsp;</div>
	<div class="span12">&nbsp;</div>
	<div class="span12">&nbsp;</div>
</div>
<div id="debug" class="row-fluid">
	<div class="span12"></div>
</div>