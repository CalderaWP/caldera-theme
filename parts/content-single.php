<?php
global  $post;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		printf('<div class="entry-header" role="heading"><h1 class="page-title">%s</h1></div>', get_the_title( $post ) );

	?>
	<span class="image main">
		<?php
			// Post thumbnail.
			echo caldera_theme_thumbnail( $post, 'large', 'img-responsive' );
		?>
		</span>



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
		<?php caldera_theme_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'caldera_theme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
