<?php
	use \calderawp\theme\theme;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
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

	if( is_front_page() || theme::get_instance()->get_settings( get_queried_object_id() )->show_menu() ) : ?>
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
                                <li><a href="/" class="logo navbar-brand">
                                    <span class="">
                                    <img style="height: 40px;width: auto;" src="<?php echo esc_url( caldera_theme_assets_uri() . '/images/caldera-globe-logo-sm.png' ); ?>" class="" alt="Caldera Forms Banner with globe logo and name">
                                    </span>
                                    <span class="title"><span id="title-caldera" style="color:#fff;">Caldera</span> <span id="title-forms" style="color:#a3bf61">Forms</span></span>
                                </a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">

								<li class="dropdown">
									<a href="<?php echo esc_url( home_url() ); ?>" id="menu-item-home" class="menu-item dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Caldera Forms</a>
									<ul class="dropdown-menu">
										<li><a href="https://WordPress.org/plugins/caldera-forms" target="_blank">Get Started Free</a></li>
										<li><a href="<?php echo esc_url( get_permalink( 23339 ) ); ?>">Save With Bundles</a></li>
										<li><a href="<?php echo esc_url( get_permalink( 712 ) ); ?>">Add-ons</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="https://Caldera.Space">Form To PDF</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="<?php echo esc_url( home_url( 'getting-started' ) ); ?>" id="menu-item-getting-started" class="menu-item dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Getting Started</a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo esc_url( home_url( 'getting-started' ) ); ?>">Getting Started Guide</a></li>
										<li><a href="https://www.youtube.com/playlist?list=PLgeaHmX3MoiuXOhRlDdYn7k0RcL4afLzQ">YouTube</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="<?php echo esc_url( get_permalink( 1011 ) ); ?>" id="menu-item-1011" class="menu-item dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Support</a>
									<ul class="dropdown-menu">
										<?php
											echo caldera_theme_menu_item( 1011 );
											echo caldera_theme_menu_item( 8128 );
										?>
									</ul>
								</li>
								<li class="dropdown">
									<a href="<?php echo esc_url( get_permalink( 712 ) ); ?>" id="menu-item-712" class="menu-item dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Add-ons</a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo esc_url( get_permalink( 712 ) .'/#/payment' ); ?>">
												Payment Processors
											</a>
										</li>
										<li>
                                            <a href="<?php echo esc_url( get_permalink( 712 ) .'/#/email' ); ?>">
												Email Marketing
											</a>
										</li>
										<li>
                                            <a href="<?php echo esc_url( get_permalink( 712 ) .'/#/tools' ); ?>">
                                                Tools
											</a>
										</li>
										<li>
                                            <a href="<?php echo esc_url( get_permalink( 712 ) .'/#/free' ); ?>">
												Free
											</a>
										</li>

									</ul>
								</li>
								<li>
									<a href="<?php echo esc_url( home_url( 'blog' ) ); ?>" title="Caldera Forms Blog">
										Blog
									</a>
								</li>

							</ul>
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
			</header>
		</section><!-- end collapsed -->
<?php
	endif;

	


