<?php
use calderawp\theme\theme;
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
		<div class="col-md-9 col-sm-12">
			<?php echo caldera_theme_foogallery( theme::get_instance()->get_download_foo_gallery_id() ); ?>
		</div>
		<div class="col-md-3 col-sm-12">
			<a href="#buy-now" class="btn-orange" title="Purchase This Plugin">Buy Now</a>
		</div>
	</div>
	<div class="entry-content">
		<?php

			echo apply_filters( 'the_content', $post->post_content );

		?>
	</div><!-- .entry-content -->

	<style>
		.panel.price,
		.panel.price>.panel-heading{
			border-radius:0px;
			-moz-transition: all .3s ease;
			-o-transition:  all .3s ease;
			-webkit-transition:  all .3s ease;
		}
		.panel.price:hover{
			box-shadow: 0px 0px 30px rgba(0,0,0, .2);
		}
		.panel.price:hover>.panel-heading{
			box-shadow: 0px 0px 30px rgba(0,0,0, .2) inset;
		}


		.panel.price>.panel-heading{
			box-shadow: 0px 5px 0px rgba(50,50,50, .2) inset;
			text-shadow:0px 3px 0px rgba(50,50,50, .6);
		}

		.price .list-group-item{
			border-bottom-:1px solid rgba(250,250,250, .5);
			font-weight:600;
			text-shadow: 0px 1px 0px rgba(250,250,250, .75);
		}

		.panel.price .list-group-item:last-child {
			border-bottom-right-radius: 0px;
			border-bottom-left-radius: 0px;
		}
		.panel.price .list-group-item:first-child {
			border-top-right-radius: 0px;
			border-top-left-radius: 0px;
		}

		.price .panel-footer {
			color: #fff;
			border-bottom:0px;
			background-color:  rgba(0,0,0, .1);
			box-shadow: 0px 3px 0px rgba(0,0,0, .3);
		}


		.panel.price .btn{
			background-color:#7e943d;
			box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
			border:0px;
		}

		.panel.price .btn:hover{
			background-color:#ff7e30;
			box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
			border:0px;
		}



		/* green panel */


		.price.panel-green>.panel-heading {
			color: #fff;
			background-color: #a3bf61;
			border-color: #a3bf61;
			border-bottom: 1px solid #a3bf61;
		}


		.price.panel-green>.panel-body {
			color: #fff;
			background-color: #a3bf61;
		}


		.price.panel-green>.panel-body .lead{
			text-shadow: 0px 3px 0px rgba(50,50,50, .3);
		}

		.panel.price.panel-green .btn {
			background-color: #a3bf61;
		}

		.panel.price.panel-green .btn:hover {
			background-color: #ff7e30;
		}


		/* orange price */
		.price.panel-orange>.panel-heading {
			color: #fff;
			background-color: #ff7e30;
			border-color: #fff;
			border-bottom: 1px solid #000;
		}

		.price.panel-orange>.panel-body {
			color: #fff;
			background-color: #ff7e30;
		}

		.price.panel-orange>.panel-body .lead{
			text-shadow: 0px 3px 0px rgba(50,50,50, .3);
		}

		.price.panel-orange .list-group-item {
			color: #000;
			background-color: rgba(50,50,50, .01);
			font-weight:600;
			text-shadow: 0px 1px 0px rgba(250,250,250, .75);
		}

		.panel.price.panel-orange .btn {
			 background-color: #ff7e30;
		}

		.panel.price.panel-orange .btn:hover {
			background-color: #a3bf61;
		}

		/* grey price */


		.price.panel-grey>.panel-heading {
			color: #fff;
			background-color: #6D6D6D;
			border-color: #B7B7B7;
			border-bottom: 1px solid #B7B7B7;
		}


		.price.panel-grey>.panel-body {
			color: #fff;
			background-color: #808080;
		}



		.price.panel-grey>.panel-body .lead{
			text-shadow: 0px 3px 0px rgba(50,50,50, .3);
		}


		.panel.price.panel-grey .btn {
			background-color: #cfcfcf;
		}

		.panel.price.panel-grey .btn:hover {
			background-color: #a3bf61;
		}

	</style>
	<?php
	$prices = edd_get_variable_prices( get_the_ID() );

	//var_dump( $prices );exit;
	?>
	<div id="buy-now">
		<div class="row">

			<?php
				$ii = 1;
				foreach ( $prices as $i => $price ) {
					if( 1 == $ii ){
						$color = 'grey';
					}elseif( 2 == $ii ){
						$color = 'green';
					}elseif( 3 == $ii ){
						$color = 'orange';
					}else{
						break;
					}

				if( ! empty( $price[ 'index' ] ) ){
					$price_id = $price[ 'index' ];
				}else{
					$price_id = $i;
				}

				$name = $prices[$price_id][ 'name' ];
				if( 0 === strpos( $name, 'Up To') ){
					$name = str_replace( 'Up To', '', $name );
				}
			?>


			<div class="col-sm-12 col-md-4">
				<div class="panel price panel-<?php echo $color; ?>">
					<div class="panel-heading arrow_box text-center">
						<h3>
							<?php echo esc_html( $name ); ?>
						</h3>
						<div class="panel-body text-center">
							<p itemprop="price" class="lead" style="font-size:40px"><strong>
									$<?php echo esc_html( $prices[$price_id][ 'amount' ] ); ?>
							</strong></p>
						</div>
					</div>

					<ul class="list-group list-group-flush text-center">
						<li class="list-group-item"><i class="icon-ok text-success"></i> Use On Unlimited Forms</li>
						<li class="list-group-item"><i class="icon-ok text-success"></i> Priority Support</li>
					</ul>
					<div class="panel-footer">
						<?php echo edd_get_purchase_link(
							[
								'download_id' => get_the_ID(),
								'class' => 'bundle-button btn btn-lg btn-block btn-primary',
								'text' => 'Buy Now',
								'price_id' => $price_id,
								'price' => false,
							]
						); ?>
					</div>
				</div>
			</div>

			<?php $ii++; } ?>



		</div>

	<footer class="entry-footer">
		<?php caldera_theme_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'caldera_theme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
