<?php
	use \calderawp\theme\theme;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<?php do_action( 'caldera_theme_header_top' ); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	<?php

	if( is_home() || is_front_page() || theme::get_instance()->get_settings( get_queried_object_id() )->show_menu() ) : ?>
		<section id="header"><!-- start header section -->
			<header><!-- start header -->
				<div class="container">
					<nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="100">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">

							<ul class="nav navbar-nav navbar-left">
                                <?php do_action( 'caldera_theme_toppar_left' ); ?>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">



							</ul>
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
			</header>
		</section><!-- end collapsed -->
<?php
	endif;

	/**
	if ( ! is_front_page() ) {
		if ( is_object( theme::get_instance()->get_settings( get_queried_object_id() )->full_width_header() ) && theme::get_instance()->get_settings( get_queried_object_id() )->full_width_header() ) {
			echo caldera_theme_fullwidth_header();
		}
	}else{
		do_action( 'caldera_theme_front_page_below_menu' );
	}
	**/
	/**add-ons >**/


