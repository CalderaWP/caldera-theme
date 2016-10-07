<?php
    if( ! defined( 'ABSPATH' ) ){
        exit;
    }
    if( ! isset( $img_src ) ){
        $img_src = caldera_theme_add_protocol( 'd1dy2qw4671tuy.cloudfront.net/images/cf-banner.png' );
    }

    if( ! filter_var( $img_src, FILTER_VALIDATE_URL ) ){
        return;
    }
?>
<section id="header" class="logo_only"><!-- start header section -->
    <header><!-- start header -->
        <img src="<?php echo esc_url( $img_src ); ?>" class="img-responsive header-full" width="100%">
    </header>
</section><!-- end collapsed -->