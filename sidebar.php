<?php

?>
	<div id="secondary" class="secondary col-sm-12 col-md-3">

		<aside id="caldera-forms-widget" class="widget well row">
			<div class="col-sm-12">
				<a href="<?php echo  esc_url( home_url() ); ?>">
					<img src="<?php echo esc_url( caldera_theme_add_protocol( 'd1dy2qw4671tuy.cloudfront.net/images/cf-banner.png' ) ); ?>" class="img-responsive"  alt="Caldera Forms Banner">
				</a>
			</div>
			<div class="col-sm-12">
				<p class="text-center" style="margin-top:0;">
					<?php esc_html_e( 'A different kind of form builder' , 'caldera_theme' ); ?>
				</p>
				<a href="<?php echo  esc_url( home_url() ); ?>" class="btn btn-primary btn-orange" style="margin-top: 0;background-color: #ff7e30;style:100%;">
					<?php esc_html_e( 'Learn More' , 'caldera_theme' ); ?>
				</a>
			</div>
		</aside>

		<aside id="doc-search-widget" class="widget well row">
			<div class="col-sm-12">
				<h4 class="widget-title">
					<?php esc_html_e( 'Caldera Forms Add-ons' , 'caldera_theme' ); ?>
				</h4>
				<?php echo caldera_theme_popular_addons(); ?>
				<a href="<?php echo  esc_url( home_url( 'caldera-forms-addons') ); ?>" class="btn btn-primary btn-orange" style="margin-top: 0;background-color: #ff7e30;width:100%">
					<?php esc_html_e( 'See All' , 'caldera_theme' ); ?>
				</a>
			</div>
		</aside>

		<aside id="doc-search-widget" class="widget well row">
			<div class="col-sm-12">
				<h4 class="widget-title" style="width:100%;">
					<?php esc_html_e( 'Doc Search' , 'caldera_theme' ); ?>
				</h4>
				<?php echo caldera_theme_docs_search_form(); ?>
			</div>
		</aside>

		<?php if( is_single() || is_home() ) : ?>
			<aside id="recent-posts-widget" class="widget well row">
				<div class="col-sm-12">
					<h4 class="widget-title">
						<?php esc_html_e( 'Recent Posts' , 'caldera_theme' ); ?>
					</h4>
					<?php echo caldera_theme_recent_posts(); ?>
				</div>
			</aside>
		<?php endif; ?>

		<aside id="doc-search-widget" class="widget well row">
			<div class="col-sm-12">
				<h4 class="widget-title">
					<?php esc_html_e( 'Subscribe To Our Blog' , 'caldera_theme' ); ?>
				</h4>
				<?php echo Caldera_Forms::render_form( 'CF56f4b1c725394' ); ?>
			</div>
		</aside>



	</div><!-- .secondary -->

