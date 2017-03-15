<?php
/**
 * The blog footer
 * El pie de página del blog
 *
 * @package vbt
 */
?>
	<!-- #vbt-footer -->
	<footer id="vbt-footer" class="site-footer site-footer-dark">
		<div class="site-footer-info">
			<div class="container">
				<p class="text-center">
					<?php echo __('Plantilla diseñada por'); ?> <a href="https://twitter.com/rincorpes">Rincorpes</a> <?php echo __('con tecnología'); ?> <a href="http://wordpress.org">Wordpress</a><br />
					© <a href="http://www.github.com/rincorpes/vbt-wp-theme">Vbt Wp Theme</a> 2017
				</p>
			</div>
		</div>
	</footer>
	<!-- end #vbt-footer -->

	<!-- IE bootstrap support -->

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!--[if lt IE 7 ]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/libs/dd_belatedpng.js"></script>
		<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->

	<?php wp_footer(); ?>
</body>

</html>