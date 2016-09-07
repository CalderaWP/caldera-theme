<?php

/**
 * Class Caldera_Theme_Modal
 */
class Caldera_Theme_Modal{

    protected $button;

    protected $body;

    public function __construct( $id, $button_text, $title, $content, $button_attrs = [] ){
        $this->make_button( $id, $button_text, $button_attrs );
        $this->make_body( $id, $title, $content );
        add_action( 'wp_footer', [ $this, 'footer' ] );
    }

    public function get_button(){
        return $this->button;
    }

    protected function make_button( $id, $button_text, $_button_attrs ){
        $button_attrs = '';
        foreach( $_button_attrs as $attr => $value ){
            $button_attrs .= sprintf( '%s="%s"', $attr, esc_attr( $value ) );
        }

        $this->button = sprintf( '<button type="button" %s data-toggle="modal" data-target="#%s">%s</button>', $button_attrs, $id, wp_kses_post( $button_text ) );
    }

    protected function make_body( $id, $title, $content ){
        $modal_id = $id;
        $modal_title = $title;
        $modal_content = $content;
        ob_start();
        include get_template_directory() . '/parts/modal-content.php';
        $this->body = ob_get_clean();
    }

    public function footer(){
        echo $this->body;
    }
}