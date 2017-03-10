<?php

$author = get_the_author();
$author_url = get_the_author_meta('url');
if( $author_url ) {
	$author = sprintf( '<a rel="author" class="author-link" href="%s">%s</a>', esc_url( $author_url ), esc_html( $author ) );
}
?>

<div class="author-info row">

	<div class="author-avatar col-xs-3">
		<?php
			echo get_avatar( get_the_author_meta( 'user_email' ), 256, [
				'class' => 'image-responsive'
			] );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description col-xs-9">
		<h3 class="author-title" >
			<span class="screen-reader-text">
				<?php _e( 'By', 'caldera_theme' ); ?>
			</span> <?php echo $author; ?></h3>
		<p class="author-bio hidden-xs">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
