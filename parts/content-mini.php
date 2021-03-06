<?php
if( ! defined( 'ABSPATH' ) ){
    exit;
}


if( ! isset( $post ) ){
    return;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'container mini-view'); ?>>
    <div role="heading">

            <?php printf( '<a href="%s">%s</a>', esc_url( get_permalink( $post ) ), caldera_theme_thumbnail( $post, 'image-responsive', 'large') ); ?>
            <?php printf( '<h5 class="hidden-sm hidden-xs"><a class="btn btn-block" style="%s" href="%s">%s</a></h5>', '100%', esc_url( get_permalink( $post ) ), esc_html( $post->post_title ) ); ?>

    </div>

</article>