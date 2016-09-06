<?php
global $post;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'row not-box'); ?>>


	<div class="entry-header" role="heading">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</div><!-- .entry-header -->
	<?php printf( '<a href="%s">%s</a>', esc_url( get_permalink() ), caldera_theme_thumbnail( $post, 'large', 'img-responsive') ); ?>
	<div class="entry-content">
		<?php
			echo caldera_theme_get_excerpt( get_post() );
			printf( '<a href="%s" class="btn btn-green btn-block btn-readmore" rel="bookmark" title="View %s">%s</a>', esc_url( get_permalink() ), esc_attr( 'View ' . $post->post_title ), esc_html__( 'Read More', 'caldera_theme' )  );

		?>
	</div><!-- .entry-content -->



	<footer class="entry-footer">
		</footer><!-- .entry-footer -->

</article><!-- #post-## -->
