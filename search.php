<?php

get_header(); ?>

<div id="primary" class="container content-area">
	<div class="container">
		<?php if ( have_posts() ) :
			printf('<div class="entry-header" role="heading"><h1 class="page-title">Search Results for: %s</h1></div>', get_search_query() );
		?>
		<div class="row">
			<div class="col-sm-12 col-md-9">



					<?php
					// Start the loop.
					while ( have_posts() ) : the_post(); ?>

						<?php
							echo caldera_theme_get_part( 'content', 'nonbox' );

					// End the loop.
					endwhile;

					caldera_theme_pagination();

				// If no content, include the "No posts found" template.
				else :
					echo '<p class="text-center">No Results Found</p>';

				endif;


				?>
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div><!-- .content-area -->

<?php get_footer(); ?>
