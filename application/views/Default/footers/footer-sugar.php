<br>
<div class="spacer"></div> <!-- keep alive so the footer doesn't go up -->
</div> <!-- container ends here -->
<footer class="footer navbar navbar-inverse fixed-shape"> <?php /*  navbar-fixed-bottom */ ?>
	<div class="container-fluid">

		<div class="navbar-inner" role="footer-nav">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url('Company/privacy'); ?>"><?php _e('footer_privacy_policies'); ?></a></li>
				<li><a href="<?php echo base_url('Company/about'); ?>"><?php _e('footer_about_us'); ?></a></li>
				<?php
				$link = 'paypal_donate_button_'.get_instance()->get_lang();
				$href = get_instance()->config->item($link);
				// https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WVN6HXUCN8XBE
				?>
				<li><a href="<?php echo $href; ?>"><?php _e('footer_donate'); ?></a></li>
			</ul>

			<ul class="nav navbar-nav pull-right text-right">
				<?php echo img('logoPablo', 'png', array('style'=>'position:relative;width:25%')); ?>
			</ul>
		</div>
			
	</div>
</footer>

</body>
</html>