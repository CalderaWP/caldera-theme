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
                $pattern = '<li class="list-group-item"><i class="icon-ok text-success"></i> %s</li>';
                foreach ( $benefits as $benefit ){
                    printf( $pattern, esc_html(  $benefit ) );
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

/**
 * Show Bundles pricing table on the bundles page
 */
add_filter( 'the_content', function( $content ){
    if( is_page( 'caldera-forms-bundles' ) ){
        $content .= caldera_theme_bundle_price_tables();
    }

    return $content;
});


function caldera_theme_bundle_price_tables(array $bundles = [], $upsell_title = '' ){
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

        $bundle = get_post( $bundle_id );
        $price = edd_get_download_price( $bundle_id );
        $contents = edd_get_bundled_products( $bundle_id );
        $contents_count = count( $contents );
        $name = $bundle->post_title;
        $benefits = [
            sprintf( 'Includes %d Caldera Forms Add-ons', $contents_count ),
        ];

        if( 20521 == $bundle_id ){
            $benefits[] = 'Free :)';
        }else{
            $benefits[] = 'Priority Support';
        }

        if( ! in_array( $bundle_id, [ 20520, 20521 ] ) ){
            $benefits[] = 'Includes All Caldera Forms Add-ons';
        }

        if( 20515 == $bundle_id ){
            $benefits[] = 'Lifetime License';
        }

        $button = edd_get_purchase_link(
            [
                'download_id' => $bundle_id,
                'class' => 'bundle-button btn btn-lg btn-block btn-primary',
                'text' => 'Buy Now',
                'price' => false,
            ]
        );

        $out[] = caldera_theme_price_panel( $name, $price, $button, $benefits, $color, $width );
        $i++;

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

    return implode( "\n\n", $out );


}