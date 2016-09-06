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
		<?php caldera_theme_entry_meta(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
