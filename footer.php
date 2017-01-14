<?php

?>


<footer id="footer">
	<div class="pre-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<ul class="list-inline">
						<?php do_action( 'caldera_theme_footer_left' ); ?>
					</ul>
				</div>
				<div class="col-sm-6">
					<ul class="social_icons list-inline">
						<?php do_action( 'caldera_theme_footer_right' ); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>
