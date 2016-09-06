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
if ( !$full_width ) {
    printf('<div class="entry-header" role="heading"><h1 class="page-title">%s</h1></div>', get_the_title($post));
}else{
    printf('<div class="entry-header screen-reader-text" role="heading"><h1 class="page-title">%s</h1></div>', get_the_title($post));
}

?>
<span class="image main">
    <?php
        if (! $full_width) {
            echo caldera_theme_thumbnail( $post, 'large', 'img-responsive');
        }

    ?>
</span>