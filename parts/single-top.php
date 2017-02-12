<?php
use calderawp\theme\theme;

if (!defined('ABSPATH')) {
    exit;
}

if( ! isset( $post ) ){
    global  $post;
}


if ( theme::get_instance()->get_settings(get_queried_object_id())->full_width_header() ) {
    $full_width = true;
} else {
    $full_width = false;
}
$author_meta = '';

if (  'post' == get_post_type( $post ) ) {
    $author_meta = caldera_theme_get_part( 'author', 'bio' );
}

if ( !$full_width ) {
    printf('<div class="entry-header" role="heading"><h1 class="page-title">%s</h1>%s</div>', get_the_title( $post ), $author_meta );
} else {
    printf( '<div class="entry-header screen-reader-text" role="heading"><h1 class="page-title">%s</h1>%s</div>', get_the_title( $post ), $author_meta );
}

?>
    <?php

        if (! $full_width) {
            printf( '<span class="image main">%s</span>', caldera_theme_thumbnail( $post, 'img-responsive', 'full' ) );
        }

    ?>
