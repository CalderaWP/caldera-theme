<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">

			<section class="error-404 not-found row" >
				<header class="page-header col-sm-12">
					<h1 class="page-title">
						<?php _e( 'Oops! That page can&rsquo;t be found.', 'caldera_theme' ); ?>
					</h1>
				</header><!-- .page-header -->

				<div class="page-content col-sm-12">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'caldera_theme' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
