<?php
if( ! defined( 'ABSPATH' ) ){
    exit;
}

if( ! isset( $modal_id ) || ! isset( $modal_content ) || ! isset ( $modal_title ) ){
    return;
}

?>

<div class="modal caldera-theme-modal-body fade" id="<?php echo esc_attr( $modal_id ); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content caldera-theme-modal-content">
            <div class="modal-header caldera-theme-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title caldera-theme-modal-title">
                    <?php echo esc_html( $modal_title ); ?>
                </h4>
            </div>
            <div class="modal-body caldera-theme-modal-body">
                <?php echo wp_kses_post( $modal_content ); ?>
            </div>
            <div class="modal-footer caldera-theme-modal-footer">

            </div>
        </div>
    </div>
</div>
