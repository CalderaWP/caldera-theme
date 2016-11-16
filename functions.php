<?php
use \calderawp\theme\theme;
define( 'CALDERA_THEME_VERSION', '0.1.0' );

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */
if ( ! isset( $content_width ) ) {
    $content_width = 660;
}


if ( ! function_exists( 'caldera_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function caldera_theme_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/caldera_theme
         * If you're building a theme based on caldera_theme, use a find and replace
         * to change 'caldera_theme' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'caldera_theme' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 825, 510, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu',      'caldera_theme' ),
            'social'  => __( 'Social Links Menu', 'caldera_theme' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ) );

        /*
         * Enable support for custom logo.
         *
         * @since Twenty Fifteen 1.5
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 248,
            'width'       => 248,
            'flex-height' => true,
        ) );

    }
endif; // caldera_theme_setup
add_action( 'after_setup_theme', 'caldera_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function caldera_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'caldera_theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'caldera_theme' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'caldera_theme_widgets_init' );


/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function caldera_theme_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'caldera_theme_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function caldera_theme_scripts() {

    wp_enqueue_style( 'caldera_theme-bootstrap', caldera_theme_add_protocol( 'cdn.jsdelivr.net/bootstrap/3.0.2/css/bootstrap.min.css' )  );
    wp_enqueue_style( 'caldera_theme-font-awesome', caldera_theme_add_protocol( 'cdn.jsdelivr.net/fontawesome/4.3.0/css/font-awesome.min.css' ) );
    wp_enqueue_style( 'caldera_theme-style', caldera_theme_assets_uri() . '/css/style.css', [], CALDERA_THEME_VERSION );
    wp_enqueue_style( 'caldera_theme-animate', caldera_theme_assets_uri() . '/css/animate.css' );


    wp_enqueue_script( 'caldera_theme-bootstrap', caldera_theme_add_protocol( 'cdn.jsdelivr.net/bootstrap/3.0.2/js/bootstrap.min.js' ), [ 'jquery' ], CALDERA_THEME_VERSION, true );
    wp_enqueue_script( 'caldera_theme-easing', caldera_theme_add_protocol( 'cdn.jsdelivr.net/jquery.easing/1.3/jquery.easing.1.3.min.js' ), [ 'jquery' ], CALDERA_THEME_VERSION, true );
    wp_enqueue_script( 'caldera_theme-jquery-color', caldera_theme_add_protocol( 'cdn.jsdelivr.net/jquery.color-animation/1.6.0/jquery.animate-colors-min.js' ), [ 'jquery' ], CALDERA_THEME_VERSION, true );

    /**
    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style( 'caldera_theme-ie', get_template_directory_uri() . '/css/ie.css', array( 'caldera_theme-style' ), '20141010' );
    wp_style_add_data( 'caldera_theme-ie', 'conditional', 'lt IE 9' );

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style( 'caldera_theme-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'caldera_theme-style' ), '20141010' );
    wp_style_add_data( 'caldera_theme-ie7', 'conditional', 'lt IE 8' );
     */

    wp_enqueue_script( 'caldera_theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20141010', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'caldera_theme-keyboard-image-navigation', get_template_directory_uri() . '/assets/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
    }

    wp_enqueue_script( 'caldera_theme-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20150330', true );
    wp_localize_script( 'caldera_theme-script', 'screenReaderText', array(
        'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'caldera_theme' ) . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'caldera_theme' ) . '</span>',
    ) );

    $active_top = 0;
    if( is_front_page() ){
        $active_top = 'menu-item-home';
    }elseif ( is_singular()  ){
        $active_top = 'menu-item-' .get_queried_object_id();
    }
    wp_localize_script( 'caldera_theme-script', 'CALDERA_THEME', [
        'activeTop' => $active_top
    ] );

    if( is_page( 'caldera-forms-add-ons' ) ){
        caldera_theme_load_angular();

        wp_enqueue_script( 'caldera_theme-addons', caldera_theme_assets_uri() . '/js/addons.js', [ 'angular', 'jquery' ], CALDERA_THEME_VERSION, true );
	    wp_localize_script( 'caldera_theme-addons', 'CFADDONS', [
	    	'api' => esc_url_raw( rest_url( 'calderawp_api/v2/products/cf-addons' ) )
	    ]);
    }
}
add_action( 'wp_enqueue_scripts', 'caldera_theme_scripts' );

/**
 * Load AngularJS
 */
function caldera_theme_load_angular(){
    wp_enqueue_script('angular', caldera_theme_add_protocol('ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js'), ['jquery'], '1.5.8', true);
    wp_enqueue_script('angular-resource', caldera_theme_add_protocol('cdnjs.cloudflare.com/ajax/libs/angular-resource/1.5.8/angular-resource.min.js'), ['angular'], '1.5.8', true);
    wp_enqueue_script('angular-animate', caldera_theme_add_protocol('ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.js'), ['angular'], '1.5.8', true);
    wp_enqueue_script('angular-ui-router', caldera_theme_add_protocol('cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.3.1/angular-ui-router.min.js'), ['angular', 'angular-resource', 'jquery'], '1.5.8', true);
    wp_enqueue_script('angular-sanitize', caldera_theme_add_protocol('ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-sanitize.js'), ['angular'], '1.5.8', true);
}



/**
 * Get URL for assets DIR via CDN, or local
 *
 * @param bool $local Optional. If true, the default CDN is used, else stylesheet directory URI
 * @return mixed|void
 */
function caldera_theme_assets_uri( $local = false ){

    if( $local ){
        $uri = get_template_directory_uri() . '/assets';
    }else{
        if ( defined( 'LOCAL_DEV' ) && LOCAL_DEV ) {
            $uri = 's3.amazonaws.com/caldera-theme';

        } else {
            $uri = 'd1dy2qw4671tuy.cloudfront.net';
        }
        $uri = caldera_theme_add_protocol( $uri );
    }


    return apply_filters( 'caldera_theme_assets_uri', $uri );
}

/**
 * @param $url
 * @return string
 */
function caldera_theme_add_protocol( $url ){
    if( is_ssl() ){
        $url = 'https://' . $url;
    }else{
        $url = 'http://' . $url;
    }

    return $url;
}

/**
 * Add featured image as background image to post navigation elements.
 *
 *
 * @see wp_add_inline_style()
 */
function caldera_theme_post_nav_background() {
    if ( ! is_single() ) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
        return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
        $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
        $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style( 'caldera_theme-style', $css );
}
add_action( 'wp_enqueue_scripts', 'caldera_theme_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function caldera_theme_nav_description( $item_output, $item, $depth, $args ) {
    if ( 'primary' == $args->theme_location && $item->description ) {
        $item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'caldera_theme_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *

 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function caldera_theme_search_form_modify( $html ) {
    return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'caldera_theme_search_form_modify' );


/**
 * Custom template tags for this theme.
 *
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Pricing table functions
 */
require get_template_directory() . '/inc/pricing-tables.php';



function caldera_theme_get_part( $first, $second = null, $post = null ){
    if( null == $post ){
        $post = get_post();
    }

    $name = 'parts/' . $first;
    if( $second ){
        $name .= '-' . $second;
    }
    $name .= '.php';


    $path = locate_template( $name );
    if( file_exists( $path ) ) {
        ob_start();
        include  $path;
        return ob_get_clean();
    }else{
        var_dump( $name );
    }

}

function caldera_theme_thumbnail( $post, $classes = '', $size = 'post-thumbnail' ){
    $id = get_post_thumbnail_id( $post );
    $attrs = [];
    if( ! empty( $classes ) ){
        $attrs = [ 'class' => $classes ];
    }
    return wp_get_attachment_image( $id, $size, false, $attrs );
}

function caldera_theme_tile( $post, $style_count ){
    ob_start();
    include  __DIR__ . '/parts/tile.php';
    return ob_get_clean();
}

add_filter( 'get_post_metadata', function( $return_value, $object_id, $meta_key ){
    if( is_admin() ){
        return $return_value;
    }

    if( FOOGALLERY_META_ATTACHMENTS == $meta_key ){
        global $post;
        if( ! empty( $post  ) && 'download' == $post->post_type ){
            $meta = get_post_meta( $post->ID, theme::PRODUCT_IMAGES_KEY, true );
            if( is_array( $meta ) ){
                $prepared = [];
                foreach( $meta as $i => $url ){

                    if ( 'attachment' === get_post_type( $i ) ) {
                        $prepared[] = $i;

                    }
                }


                return [ $prepared ];
            }
        }
    }

    return $return_value;
}, 10,  3 );

function caldera_theme_foogallery( $id ) {

    if ( class_exists( 'FooGallery_Template_Loader' ) ) {
        $args = array(
            'id' => $id,
            'gallery' => '',
        );

        $args = apply_filters('foogallery_shortcode_atts', $args);

        $engine = new FooGallery_Template_Loader();

        ob_start();

        $engine->render_template($args);

        $output_string = ob_get_contents();
        ob_end_clean();
        return $output_string;
    }
}

/**
 * Get URL for globe logo
 *
 * @param string $size
 * @return mixed|string
 */
function caldera_theme_globe_logo( $size = 'md' ){
    if( ! in_array( $size, [ 'sm', 'md', 'lg' ]) ){
        $size = 'md';
    }

    $url = caldera_theme_add_protocol( 'd1dy2qw4671tuy.cloudfront.net/images/caldera-globe-logo.png' );
    if( 'lg' != $size ){
       $url = str_replace( '.png', '-' . $size . '.png', $url );
    }

    return $url;


}

function caldera_theme_pagination(){

    return sprintf( '<div class="row pagination-wrap"><div class="col-md-6 col-md-offset-4 col-sm-12 ">%s</div></div>', get_the_posts_pagination(array(
        'prev_text' => __('Previous Page', 'caldera_theme'),
        'next_text' => __('Next Page', 'caldera_theme'),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'caldera_theme') . ' </span>',
    ) ) );
}


function caldera_theme_fullwidth_header( $id = 0 ){
	$show = apply_filters( 'caldera_theme_fullwidth_header_show', true );
	if( false == $show ){
		return '';
	}

    if( empty( $id ) && ! empty( get_queried_object_id() ) ){
        $id = get_post_thumbnail_id( get_queried_object_id() );
    }

    if( ! empty( $id ) ){
        $img = wp_get_attachment_image_src( $id, 'full' );

        if( is_array( $img ) ){
            $img_src = $img[0];
        }
    }

    ob_start();
    include __DIR__ . '/parts/header-full.php';
    return ob_get_clean();
}


/**
 * @param WP_Post $post
 *
 * @return string
 */
function caldera_theme_get_excerpt(  $post ){
    if( ! empty( $post->post_excerpt ) ){
        $excerpt = $post->post_excerpt;
    }else{
        $excerpt = $post->post_content;
    }

    return caldera_theme_limit_text( $excerpt, 55 );

}

function caldera_theme_limit_text($text, $limit){
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

function caldera_theme_recent_posts( array $args = [] ){
    return caldera_theme_mini_loop( 'caldera-theme-recent-posts', $args );
}



/**
 * @param array $args
 * @return string
 */
function caldera_theme_mini_loop( $wrap_class, array $args = [] ){
    if (!isset($args['posts_per_page'])) {
        $args['posts_per_page'] = 5;
    }
    $query = new WP_Query($args);
    $out = [];
    $out[] = sprintf( '<div class="%s">', esc_attr($wrap_class));
    while( $query->have_posts() ) {
        $out[] = caldera_theme_get_part('content', 'mini', $query->the_post() );
    }
    $out[] = '</div>';
    wp_reset_query();

    return implode("\n\n", $out);
}


/**
 * Caching wrapper for wp_oembed_get()
 *
 * @param $url
 * @return false|mixed|string
 */
function caldera_theme_oembed_get( $url ){
    $key = md5( __FUNCTION__ . $url );
    if( false == ( $embed = get_transient( $key ) ) ){
        $embed = wp_oembed_get( $url );
        if( ! empty( $embed ) ){
            set_transient( $key, $embed, WEEK_IN_SECONDS );
        }
    }

    return $embed;


}


add_filter('get_image_tag_class', 'caldera_theme_image_class_filter');
function caldera_theme_image_class_filter( $classes ){
    $classes .= ' img-responsive';

    return $classes;
}

function caldera_theme_menu_item( $post, $title = '' ){
    if( is_numeric( $post ) ){
        $post = get_post( $post );
    }
    if( empty( $title ) ){
        $title = $post->post_title;
    }


    $attrs = 'class="menu-link"';

    return sprintf( '<li class="menu-item" id="%s"><a href="%s" title="%s" %s>%s</a></li>',
        esc_attr( 'menu-item-' . $post->ID ),
        esc_url( get_permalink( $post->ID ) ),
        esc_attr(  $title ),
        $attrs,
        wp_kses_post( $title )
    );
}

/**
 * On addons page get HTML for Angular App
 */
add_filter( 'the_content', function( $content) {
    if( is_page( 'caldera-forms-add-ons' ) ){
        ob_start();
        include  __DIR__ . '/parts/addons.php';

        $content = ob_get_clean();
    }

    return $content;
});




/**
 * Use alt thumbnail if possible
 */
add_filter( 'get_post_metadata', 'caldera_theme_alt_thumbnial',  10, 4 );
function caldera_theme_alt_thumbnial( $value, $object_id, $meta_key, $single ){
	if( ! is_admin() &&  '_thumbnail_id' == $meta_key ){
		if( $object_id !== get_the_ID() ){

			remove_filter( 'get_post_metadata', __FUNCTION__ );
			$alt = get_post_meta( $object_id, theme::NO_COLOR_IMAGE . '_id', true );
			add_filter( 'get_post_metadata', __FUNCTION__, 10, 4 );
			if( ! empty( $alt ) ){
				if( $single ){
					return $alt;
				}else{
					return [ $alt ];
				}

			}
		}
	}

	return $value;
}