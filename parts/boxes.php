<?php

?>
<section class="tiles"><!-- start tiles -->
    <div class="container">
        <div class="tiles-row">
            <div class="row">
                <?php
                $row_count = 1;
                $style_count = 1;
                global $post;
                while ( have_posts() ) {
                    the_post();
                    echo caldera_theme_tile( $post, $style_count );
                    if( $style_count <= 6 ) {
                        $style_count++;
                    }else{
                        $style_count = 1;
                    }
                    if( 3 == $row_count ){
                        echo '</div><div class="row">';
                        $row_count = 1;
                    }else{
                        $row_count++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>