<?php
use calderawp\theme\theme;
global  $post;
remove_filter( 'edd_after_download_content', 'edd_append_purchase_link' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'container'); ?>>

	<?php echo caldera_theme_get_part( 'single', 'top', $post  ); ?>


	<div class="row" <?php if ( empty( $gallery ) ) : echo 'style="margin-bottom:12px; "'; endif; ?>>
		<?php
			$gallery = caldera_theme_foogallery( theme::get_instance()->get_download_foo_gallery_id() );

			if( ! empty( $gallery ) ){
				echo '<div class="col-md-9 col-sm-12" >' . $gallery . '</div>';
			}?>


		<div class="<?php if ( ! empty( $gallery ) ) : echo 'col-md-3'; endif; ?> col-sm-12">
			<?php if ( ! edd_is_free_download( $post->ID ) ) { ?>
				<a href="#buy-now" class="btn-orange btn-block" title="Price Options">Buy Now</a>
			<?php }else{ ?>
				<a href="#buy-now" class="btn-green btn-block" title="Download Options">Free</a>
			<?php } ?>
		</div>

	</div>

	<div class="row">
		<div class="entry-content col-sm-12" style="margin-top: 12px;">
			<?php

			echo apply_filters( 'the_content', $post->post_content );

			?>
		</div><!-- .entry-content -->
	</div>



	<?php
	$bundles = [];
	if ( ! edd_is_free_download( $post->ID )) {
		$prices = edd_get_variable_prices( $post->ID );

		caldera_theme_pricing_style_css();
		$benefits = [
			'Use On Unlimited Forms',
			'Priority Support'
		];
		$bundles  = caldera_theme_bundle_included_in( $post->ID );

	}

	?>
	<div id="buy-now" class="container well">
			<?php
			if (!empty($bundles)) {
				echo caldera_theme_bundle_price_tables($bundles, $post->post_title);
			}
			else{

				echo '<div class="row buy-now-free-wrap" id="buy-now"><div class="col-sm-12 col-md-10 col-md-offset-1">';
					$button = edd_get_purchase_link([
							'download_id' => $post->ID,
							'class' => 'btn-block btn-green',
							'text' => 'Get This Plugin For Free',
							'price' => false,
					]);
					echo $button;
					$count = count( edd_get_bundled_products( 20521 ) );

					$button = edd_get_purchase_link([
						'download_id' => 20521,
						'class' => 'bundle-button btn-block btn-green',
						'text' => sprintf( 'Get %d Free Plugins', $count ),
						'price' => false,
					]);
					echo $button;

					printf( '<a href="%s" class="btn-block btn-orange" title="Caldera Forms Bundles Page">See All Of Our Cost Saving Bundles</a>', esc_url( home_url( 'caldera-forms-bundles' ) ));
				echo '</div></div>';
			}
			?>



		</div>

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
