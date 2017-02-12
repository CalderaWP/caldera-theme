<?php

?>

<div class="author-info row">

	<div class="author-avatar col-sm-3">
		<?php
			echo get_avatar( get_the_author_meta( 'user_email' ), 256, [
				'class' => 'image-responsive'
			] );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description col-sm-9">
		<h3 class="author-title" ><span class="screen-reader-text"><?php _e( 'By', 'caldera_theme' ); ?></span> <?php echo get_the_author(); ?></h3>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
