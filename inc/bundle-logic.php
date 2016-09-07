<?php
function caldera_theme_bundle_included_in( $download_id ){
    $bundles = caldera_theme_get_bundles();
    $includes = [];
    /** @var EDD_Download $bundle */
    foreach ($bundles as $bundle ){
        $bundle_contents = $bundle->get_bundled_downloads();
        if( in_array( $download_id,  $bundle_contents  ) ){
            $includes[  ] = $bundle->get_ID();


        }

    }

    return $includes;



}

function caldera_theme_get_bundles(){
    if( false == ( $objs = get_transient( __FUNCTION__ ) ) ) {
        $bundles = caldera_theme_bundle_ids();
        $objs = [];
        foreach( $bundles as $bundle ){
            $objs[ $bundle ]  = new EDD_Download( $bundle );
        }

        set_transient( __FUNCTION__, $objs, DAY_IN_SECONDS  );
    }

    return $objs;
}

/**
 * @return array
 */
function caldera_theme_bundle_ids(){
    $bundles = [
        20521, //free
        20520, //developer
        20518, //agency
        20515 //unlimited/enterprise
    ];

    return $bundles;
}

/**
 * Makes a modal with bundled contents and returns HTML for modal button
 *
 * @param string  $bundle_id Modal ID attribute
 * @param string $button_text Open button text
 *
 * @return string
 */
function caldera_theme_print_bundles_modal( $bundle_id, $button_text ){
    include_once  __DIR__ . '/Caldera_Theme_Modal.php';
    $contents = edd_get_bundled_products( $bundle_id );

    $content = '';
    foreach( $contents as $id ){
        //skip caldera forms
        if( 1918 == $id ){
            continue;
        }
        $post = edd_get_download( $id );
        $content .= caldera_theme_get_part( 'content', 'mini', $post );

    }
    $modal = new Caldera_Theme_Modal( 'bundle-modal' . $bundle_id, $button_text, get_the_title( $bundle_id ), $content, [
        'class' =>'cf-bundle-modal-open',
        'title' => __( 'Click to see which add-ons are included in this bundle', 'caldera_theme' )
    ]);
    return $modal->get_button();
}