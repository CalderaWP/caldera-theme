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

            <?php printf( '<a href="%s">%s</a>', esc_url( get_permalink( $post->ID ) ), caldera_theme_thumbnail( $post, 'image-responsive', 'large') ); ?>
            <?php printf( '<h5><a class="btn" style="width: 100%" href="%s">%s</a></h5>', esc_url( get_permalink( $post->ID ) ), esc_html( $post->post_title ) ); ?>

    </div>

</article>