<?php
if( ! defined( 'ABSPATH' ) ){
	exit;
}

if( ! is_archive() && \calderawp\theme\theme::get_instance()->get_box_options()->use_boxes() ){
	echo caldera_theme_get_part( 'boxes' );
}else{

	while ( have_posts()) {
		the_post();
		echo '<div class="">' . caldera_theme_get_part('content',  'nonbox', get_post( get_the_ID()) ) . '</div>';

	}

}

// Previous/next page navigation.
echo caldera_theme_pagination();
