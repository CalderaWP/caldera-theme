<?php

function caldera_theme_pricing_style_css(){
    if( ! did_action( __FUNCTION__ ) ){
        echo caldera_theme_get_part( 'pricing', 'css' );
    }
}

function caldera_theme_price_panel( $name, $price, $button, array $benefits = null, $color = 'green', $width = 4 ){
    if( absint( $width ) > 12 || absint( $width  ) < 0 ){
        $width = 4;
    }
    ob_start();
    ?>
    <div class="col-sm-12 col-md-<?php echo $width; ?>">
        <div class="panel price panel-<?php echo $color; ?>">
            <div class="panel-heading arrow_box text-center">
                <h3>
                    <?php echo esc_html( $name ); ?>
                </h3>
                <div class="panel-body text-center">
                    <p itemprop="price" class="lead" style="font-size:40px"><strong>
                            $<?php echo esc_html( $price ); ?>
                        </strong></p>
                </div>
            </div>

            <ul class="list-group list-group-flush text-center">
                <?php
                $defaults = [
                    'content' => '',
                    'li_class' => '',
                    'inner_class' => ''
                ];
                $pattern = '<li class="list-group-item %s"> <span class="%s">%s</span> </li>';
                foreach ( $benefits as $benefit ){
                    if( is_array( $benefit ) ){
                        $b = wp_parse_args( $benefit, $defaults );
                    }else{
                        $b = $defaults;
                        $b[ 'content' ] = $benefit;
                    }


                    printf( $pattern, esc_attr( $b[ 'li_class' ] ), esc_attr( $b[ 'inner_class' ] ), $b[ 'content' ] );
                }

                ?>
            </ul>
            <div class="panel-footer">
                <?php echo $button; ?>
            </div>
        </div>
    </div>

    <?php

    $html = ob_get_clean();
    return $html;
}



function caldera_theme_bundle_price_tables(array $bundles = [], $upsell_title = '', $type = 'Caldera Forms add-ons'  ){
   remove_filter( 'get_post_metadata', 'caldera_theme_alt_thumbnail', 10 );

    caldera_theme_pricing_style_css();
    if (empty($bundles)) {
        $bundles = caldera_theme_bundle_ids();
    }


    $count = count($bundles);
    $i = 4 - $count + 1;



    $width = ceil( 12/$count );

    $out[] = '<div class="row price-table-wrap bundle-price-table" id="cf-bundle-price-table">';


    if ( ! empty( $upsell_title )) {
        $out[] = '<h2 class="text-center">Bundle Up And Save</h2>';
        $out[] = sprintf('<p class="text-center">%s is included in %d of our cost-saving bundles</p>',
            esc_html($upsell_title),
            $count
        );
    }

    foreach( $bundles as $bundle_id ){
        if( 3 == $i ){
            $color = 'green';
        }elseif( 4 == $i ){
            $color = 'orange';
        }else{
            $color = 'grey';
        }
        $i++;

        if( 20520 == $bundle_id ){
            ob_start();
            cf_dot_com_custom_bundle_lead_in( $width, true, 'Choose' );
            $out[] = ob_get_clean();
            continue;
        }

        $bundle = get_post( $bundle_id );
        if( ! is_object( $bundle ) ){
            continue;
        }

        $price = edd_get_download_price( $bundle_id );
        $contents = edd_get_bundled_products( $bundle_id );
        $contents_count = count( $contents ) - 1;
        $name = $bundle->post_title;

        if( is_array( $type ) && isset( $type[ 'content' ] ) ){
            $t = $type;
            $type = '';
            if( isset( $t[ 'count' ] ) ){
                $contents_count = $t[ 'count' ];
            }
            $type = $t[ 'content' ];
        }

        if( in_array($bundle_id, [ 20518, 48255 ] ) ){
            $modal_button_text =  __( 'Includes All Caldera Forms Add-ons', 'caldera_theme'  );

        }else{
            $modal_button_text =  sprintf( __( 'Includes %d %s', 'caldera_theme' ), $contents_count, $type );

        }
        $modal_button = caldera_theme_print_bundles_modal( $bundle_id, $modal_button_text );
        $benefits = [
            $modal_button
        ];

        if( 20521 == $bundle_id ){
            $benefits[] = 'Free :)';
        }else{
            $benefits[] = 'Priority Support';
        }

        if( 20518 == $bundle_id ){
            $benefits[] =
                [
                    'content' => '$2400 Value',
                    'li_class' => 'green',
                ];
            $benefits[] = '15 Site License';

        }

        if(  20520 == $bundle_id ){
            $benefits[] =
                [
                    'content' => '$250 Value',
                    'li_class' => 'green',
                ];
            $benefits[] = '1 Site License';

        }

        if( 48255 == $bundle_id ){
            $benefits[] =
                [
                    'content' => '$2500 Value',
                    'li_class' => 'orange',
                ];
            $benefits[] =
                [
                    'content' => 'Includes Easy Pods',
                    'li_class' => 'green',
                ];
            $benefits[] =
                [
                    'content' => 'Includes Easy Queries',
                    'li_class' => 'green',
                ];
            $benefits[] =
                [
                    'content' => 'Access To Private Facebook Group',
                    'li_class' => 'green',
                ];
        }



        if( 20515 == $bundle_id ){
            $benefits[] =
                [
                    'content' => 'Lifetime License',
                    'li_class' => 'orange',
                ];
            $benefits[] = 'Unlimited Sites';

        }

        $button = edd_get_purchase_link(
            [
                'download_id' => $bundle_id,
                'class' => 'bundle-button btn btn-lg btn-block btn-primary',
                'text' => 'Buy Now',
                'price' => false,
            ]
        );

        $out[] = sprintf( '<div id="%s" class="cf-bundle-wrap">%s</div>', esc_attr( 'cf-bundle-wrap-' . $bundle_id ), caldera_theme_price_panel( $name, $price, $button, $benefits, $color, $width ) );

    }
    $out[] = '</div>';
    $out[] = '<div style="clear:both;"></div>';
    $out[] = '<div class="row" id="prices-options-row">';
    if ( ! empty( $upsell_title )) {
        $out[] = sprintf('<p class="text-center"><a class="" href="%s" title="See all cost saving Caldera Forms Bundles">See All Bundles</a> or <a class="see-single-prices" href="#" title="See prices for %s">Just Purchase This Add-on</a></p>',
            esc_url(home_url('caldera-forms-bundles')),
            $upsell_title
        );
    }

    $out[] = '</div>';
    add_filter( 'get_post_metadata', 'caldera_theme_alt_thumbnail',  10, 4 );

    return implode( "\n\n", $out );


}