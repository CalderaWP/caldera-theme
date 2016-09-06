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