<?php
    if( ! defined( 'ABSPATH' ) ){
        exit;
    }
    if( ! isset( $img_src ) ){
        $img_src = caldera_theme_add_protocol( 'd1dy2qw4671tuy.cloudfront.net/images/cf-banner.png' );
    }
?>
<section id="header" class="logo_only"><!-- start header section -->
    <header><!-- start header -->
        <img src="<?php echo esc_url( $img_src ); ?>" class="img-responsive" width="100%">
    </header>
</section><!-- end collapsed -->