<?php

namespace calderawp\theme;


class theme{


    CONST BOX_KEY = 'caldera_theme_box_settings';

    CONST PAGE_KEY = 'caldera_theme_page_settings';

    /**
     * @var theme
     */
    protected static $instance;

    /**
     * @var array
     */
    protected $page_settings = [];

    /**
     * @var box_options
     */
    protected $box_options;

    /**
     * @return theme
     */
    public static function get_instance(){
        if( null === static::$instance ){
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct(){
        $this->box_options = new box_options( get_option( self::BOX_KEY, [] ) );
    }

    /**
     * Get the box options
     *
     * @return box_options
     */
    public function get_box_options(){
        return $this->box_options;
    }

    /**
     * Get a page settings instance. Handles lazyloading/cache/etc
     *
     * @param $id
     * @return page_settings
     */
    public function get_page_settings( $id ){
        if( isset( $this->page_settings[ $id ] ) ) {
            $this->page_settings[ $id ] = $this->create_a_page_settings($id);
        }

        return $this->page_settings[ $id ];
    }

    /**
     * Create a new page setttings instance
     *
     * @param int $id
     * @return page_settings
     */
    protected function create_a_page_settings($id){
        $meta = get_post_meta($id, self::PAGE_KEY);
        if (empty($meta)) {
            $meta = [];
        }

       return new page_settings($meta);
    }


}