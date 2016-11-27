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
				<a href="#buy-now" class="btn-orange btn-block" title="Download Options">Download For Free</a>
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

	if ( ! edd_is_free_download( $post->ID )) {
	$prices = edd_get_variable_prices($post->ID);

	caldera_theme_pricing_style_css();
	$benefits = [
		'Use On Unlimited Forms',
		'Priority Support'
	];
	$bundles = caldera_theme_bundle_included_in($post->ID);


	?>
	<div id="buy-now" class="container well">
			<?php
			if (!empty($bundles)) {
				echo caldera_theme_bundle_price_tables($bundles, $post->post_title);
			}
			?>
			<div
				class="row price-table-wrap single-product-price-table" <?php if (!empty($bundles)) : echo 'aria-hidden="true" style="display:none;visibility:hidden;"'; endif; ?>>

				<?php

				$ii = 1;
				foreach ($prices as $i => $price) {
					if (1 == $ii) {
						$color = 'grey';
					} elseif (2 == $ii) {
						$color = 'green';
					} elseif (3 == $ii) {
						$color = 'orange';
					} else {
						break;
					}

					if (!empty($price['index'])) {
						$price_id = $price['index'];
					} else {
						$price_id = $i;
					}

					$name = $prices[$price_id]['name'];
					if (0 === strpos($name, 'Up To')) {
						$name = str_replace('Up To', '', $name);
					}

					$button = edd_get_purchase_link(
						[
							'download_id' => $post->ID,
							'class' => 'bundle-button btn btn-lg btn-block btn-primary',
							'text' => 'Buy Now',
							'price_id' => $price_id,
							'price' => false,
						]
					);

					$price = $prices[$price_id]['amount'];
					echo caldera_theme_price_panel($name, $price, $button, $benefits, $color);

					$ii++;
				}
				if (!empty($bundles)) {
					echo '<p class="text-center"><a href="#" aria-hidden="true" style="display:none;visibility:hidden;" id="see-bundle-prices" title="View cost saving bundle pricing">See Bundle Prices</a></p>';
				}
			}else{
				echo '<style>#free-plugin-buttons .edd_purchase_submit_wrapper a {margin: 0;}#free-plugin-buttons .edd_download_purchase_form {margin-bottom: 4px !important;}#free-plugin-buttons a.btn-block.btn-orange {margin-top: 0px;}</style>';
				echo '<div class="row" id="free-plugin-buttons"><div class="col-sm-12 col-md-10 col-md-offset-1">';
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
						'text' => sprintf( 'Get All %d Free Add-ons', $count ),
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
