<?php
global  $post;
remove_filter( 'edd_after_download_content', 'edd_append_purchase_link' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<span class="image main">
		<?php
			// Post thumbnail.
			echo caldera_theme_thumbnail( $post, 'large', 'img-responsive' );
		?>
	</span>
	<?php
		printf('<div class="entry-header" role="heading"><h1 class="page-title">%s</h1></div>', get_the_title( $post ) );
	?>

	<div class="row">
		<div class="col-md-12">
			<?php echo caldera_theme_foogallery( 29 ); ?>
		</div>
	</div>
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
