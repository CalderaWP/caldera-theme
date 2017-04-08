<?php
use calderawp\theme\theme;

if (!defined('ABSPATH')) {
    exit;
}

if( ! isset( $post ) ){
    global  $post;
}


$time = $time_string = $author_meta =  '';
if ( theme::get_instance()->get_settings(get_queried_object_id())->full_width_header() ) {
	$full_width = true;
} else {
	$full_width = false;
}

if (  'post' == get_post_type( $post ) ) {
    $author_meta = caldera_theme_get_part( 'author', 'bio' );

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date()
	);
	$time_string = '<span class="posted-on">Posted On: ' . $time_string . '</span>';

}



if ( !$full_width ) {
	printf( '<div class="entry-header" role="heading"><h1 class="page-title">%s</h1>%s %s %s <hr /></div>', get_the_title( $post ), sprintf( '<span class="image main">%s</span>', caldera_theme_thumbnail( $post, 'img-responsive', 'full' ) ), $author_meta, $time_string );
} else {
    printf( '<div class="entry-header screen-reader-text" role="heading"><h1 class="page-title">%s</h1>%s</div>', get_the_title( $post ), $author_meta );
}


