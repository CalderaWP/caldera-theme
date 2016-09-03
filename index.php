<?php
use \calderawp\theme\theme;
get_header(); ?>

	<div id="primary" class="content-area">

		<?php
			$title = $content = '';
			if( is_archive() ) {
				$title = get_the_archive_title() ;
				$content = sprintf('<p class="taxonomy-description">%s</p>', get_the_archive_description());
			}elseif( is_singular() ){
				global $post;
				$content = caldera_theme_get_part( 'content', 'single', get_post() );
			}else{
				if( ! is_home() && ! empty( get_the_title() ) ){
					$title = get_the_title();
				}else{
					$title = get_bloginfo( 'blogname' );
				}
			}

		   ?>

			<section id="main-contain"><!-- start main-contain -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php
								if ( ! empty( $title ) ) {
									printf('<h1 class="page-title">%s</h1>', $title);
								}
								echo $content;
							?>
						</div>
					</div>
				</div>
			</section><!--  -->


		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
				if( theme::get_instance()->get_box_options()->use_boxes() ){
					echo caldera_theme_get_part( 'boxes' );
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

	</div><!-- .content-area -->

<?php get_footer(); ?>
