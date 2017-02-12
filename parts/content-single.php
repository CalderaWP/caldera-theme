<?php
use calderawp\theme\theme;
global  $post;


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php echo caldera_theme_get_part( 'single', 'top', $post  ); ?>



	<div class="entry-content">
		<?php
			echo apply_filters( 'the_content', $post->post_content );

		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php
		if ( is_single() ) :
			$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'caldera_theme' ) );
			if ( $categories_list && caldera_theme_categorized_blog() ) {
				printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x( 'Categories', 'Used before category names.', 'caldera_theme' ), $categories_list );
			}


			$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'caldera_theme' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x( 'Tags', 'Used before tag names.', 'caldera_theme' ), $tags_list );
			}
		endif;
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
