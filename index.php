<?php
use \calderawp\theme\theme;
get_header(); ?>

	<div id="primary" class="container content-area">

		<?php
			$show_sidebar = false;
			if( theme::get_instance()->get_settings( get_queried_object_id() )->full_width_header() ) {
				$full_width = true;

			}else{
				$full_width = false;
			}

			$title = $content = '';
			if( is_archive() ) {

				$title = get_the_archive_title() ;
				$content = sprintf('<p class="taxonomy-description">%s</p>', get_the_archive_description());
			}elseif( is_singular() ){
				global $post;
				$partial = 'single';
				if( 'download' == get_post_type( $post ) ) {
					$partial = 'download';
				}else{
					if( is_page() ){
						$partial = 'page';
					}
					if ( ! is_page() && ! $full_width ) {
						$show_sidebar = true;

					}
				}
				$content = caldera_theme_get_part( 'content', $partial, get_post() );
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
						<div class="col-sm-12">
							<?php
								if ( ! empty( $title ) ) {
									$extra = '';
									$class = 'page-title';
									if( $full_width ){
										$class .= ' screen-reader-text';
										$extra = 'aria-hidden="true" style="display:none;visibility:hidden;';
									}
									$extra = '';
									printf('<h1 class="%s" %s>%s</h1>', esc_attr( $class ), $extra, $title );
								}

							?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 <?php if( $show_sidebar ) : echo 'col-md-9'; endif; ?>">


						<?php
							echo $content;
							echo '</div>';
							if( $show_sidebar ) {
								get_sidebar();
							} ?>
						</div>
					</div>
				</div>
			</section><!--  -->


		<?php

		if ( ( is_home() && is_archive() ) && have_posts() ) : ?>
			<?php
				if( theme::get_instance()->get_box_options()->use_boxes() ){
					echo caldera_theme_get_part( 'boxes' );
				}else{

					while (have_posts()) {
						the_post();
						echo '<div class="container">' . caldera_theme_get_part('content',  'nonbox', get_post( get_the_ID()) ) . '</div>';

					}

				}

			// Previous/next page navigation.
			echo caldera_theme_pagination();



		endif;
		?>

	</div><!-- .content-area #primary-->

<?php get_footer(); ?>
