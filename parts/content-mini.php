<?php
if( ! defined( 'ABSPATH' ) ){
    exit;
}


if( ! isset( $post ) ){
    return;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'container mini-view'); ?>>
    <div class="row" role="heading">
        <div class="col-sm-2" >
            <?php printf( '<a href="%s">%s</a>', esc_url( get_permalink() ), caldera_theme_thumbnail( $post, 'image-responsive thumbnail', 'thumbnail') ); ?>
        </div>
        <div class="col-sm-10">
            <?php printf( '<h5><a href="%s">%s</a></h5>', esc_url( get_permalink() ), esc_html( $post->post_title ) ); ?>
            <?php echo caldera_theme_get_excerpt( $post ); ?>

        </div>
    </div>
</article>