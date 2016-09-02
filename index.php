<?php
use \calderawp\theme\theme;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
				if( theme::get_instance()->get_box_options()->use_boxes(  ) ){
					caldera_theme_get_part( 'boxes' );
				}else{

					while (have_posts()) {
						the_post();


						get_template_part('content', get_post_type());

					}

				}

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'caldera_theme' ),
				'next_text'          => __( 'Next page', 'caldera_theme' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'caldera_theme' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
