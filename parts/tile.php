<?php
if( ! isset( $post ) || ! isset( $style_count ) ){
    var_dump( $post );
    return;
}
?>

<div class="col-md-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'style'. $style_count . ' animated zoomIn'); ?> data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: zoomIn;">
            <span class="image">
                <?php echo caldera_theme_thumbnail( $post, 'img-responsive' ); ?>
            </span>

        <?php
            $title = get_the_title( $post );
            printf( '<a href="%s" rel="bookmark" title="View %s">', esc_url( get_permalink() ), esc_attr( 'View ' . $title )  );
            printf( '<h2>%s</h2>', $title );
            printf( '<div class="content">%s</div>', apply_filters( 'the_excerpt', get_the_excerpt() ) );
        ?>
        </a>
    </article>
</div>
