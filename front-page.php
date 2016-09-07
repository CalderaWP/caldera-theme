<?php
get_header();
$tweets = [
    'https://twitter.com/rpasillas/status/756603919204134912',
    'https://twitter.com/dgtlnk/status/759104085652013057',
    'https://twitter.com/bremerb/status/772724302475059200',
    'https://twitter.com/theKhazm/status/758233359332044800',
    'https://twitter.com/BenjaminCool/status/745461584655441920',
    'https://twitter.com/federico_citi/status/733560948535910401',
    'https://twitter.com/eileenlonergan/status/727078913554415616',
    'https://twitter.com/TMonzies/status/762679334561808384',
    'https://twitter.com/alexjvasquez/status/764148306515677184',
    'https://twitter.com/_mthorpe/status/768640391142895616'
];


$emebed_pattern = '<div class="col-sm-6 tweet-embed-wrap">%s</div>';
?>
<style>
    .feature-row{
        margin-top: 12px;
    }
</style>

    <div id="primary" class="container content-area caldera-forms-page"  itemscope itemtype="http://schema.org/Product" >
        <div class="entry-header jumbotron" role="heading">

            <h1 class="entry-title">Caldera Forms</h1>
            <h2>Drag and drop, responsive form builder.</h2>
            <p>
                Create smart, detailed forms quickly and easily with our FREE Caldera Forms. <strong>It's a different
                    kind of WordPress form builder.</strong> Caldera Forms' visual editor simplifies form building for
                WordPress. Set up your form with multiple columns, add additional pages, and funnel user responses with
                conditional logic to get more robust data and relevant information from your customers and visitors.

            </p>
            <div class="row">
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <ul class="list-inline">
                        <li><a href="#bundles" title="Caldera Forms Bundles" class="btn btn-green btn-lg">Get Started For Free</a></li>
                        <li><a href="<?php echo esc_url( add_query_arg( [
                                'edd_action' => 'add_to_cart',
                                'download_ID' => 20612
                            ], home_url( 'checkout' ) ) ); ?>" class="btn btn-orange btn-lg">Get A Bundle</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row happy-tweets">
            <?php
                printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[0] ) );
                printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[8] ) );
            ?>
        </div>


      
        <div class="row feature-row">
            <div class="col-md-4 col-sm-12">
                <h5>Responsive</h5>
                <p>Caldera Forms is responsive, by default – creating multi-column, mobile-friendly
                    WordPress forms is a breeze.</p>
            </div>

            <div class="col-md-6 col-sm-12">
                <img class="cf-page-screenshot img-responsive" alt="Caldera Forms Contact Form Responsive" src="https://calderawp.com/wp-content/uploads/2016/06/cf-responsive.gif">
            </div>
        </div>
        <div class="row feature-row">
            <div class="col-md-6 col-sm-12">
                <img class="cf-page-screenshot img-responsive" alt="Caldera Forms Fields List" src="https://calderawp.com/wp-content/uploads/2016/06/cf-field-types.png">
            </div>

            <div class="col-md-4 col-sm-12">
                <h5>All The Fields You Need</h5>
                <p>From simple text and dropdown fields, to fancy fields types like autocomplete and sliders, Caldera Forms has everything you need.</p>
            </div>

        </div>
        <div class="row feature-row">
            <div class="col-md-4 col-sm-12">
                <h5>Simple Conditional Logic</h5>
                <p>The Simple and intuitive conditional logic in Caldera Forms makes creating high performance forms easy.</p>
            </div>
            <div class="col-md-6 col-sm-12">
                <img class="cf-page-screenshot img-responsive" alt="Caldera Forms Conditional Logic Editor" src="https://calderawp.com/wp-content/uploads/2016/06/cf-conditionals.png">
            </div>
        </div>

        <div class="row" id="testimonials">
            <div class="col-md-4 col-sm-12">
                <img src="https://pippinsplugins.com/wp-content/themes/pippinsplugins-30/images/about.jpg" class="img-responsive" alt="Picture of Pippin Williamson">
                <blockquote><p>5 Stars! "Exceptionally well thought out and executed."</p><cite>
                        <p><strong>Pippin Williamson</strong></p>
                        <p>Developer, Easy Digital Downloads, Restrict Content Pro and AffiliateWP</p>
                    </cite>
            </div>
            <div class="col-md-4 col-sm-12">
                <img src="https://calderawp.com/wp-content/uploads/2016/08/devin.jpg" class="img-responsive" alt="Picture of Devin Walker">
                <blockquote><p>"Great plugin that I will be using for years to come"</p><cite>
                        <p><strong>Devin Walker</strong></p>
                        <p>Developer: WordImpress, GiveWP</p>
                    </cite>
            </div>
            <div class="col-md-4 col-sm-12 well">
                <h5>Over A 100 5 Star Reviews</h5>
                <p><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></p>
                <ul id="cf-reviews" style="list-style: none;">
                    <li><i class="fa fa-star" aria-hidden="true"></i><a href="https://wordpress.org/support/topic/amazing-plugin-395" target="_blank">Amazing features, clean UI, plenty of premium features and does exactly what you need it to do - all for free.</a></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i><a href="https://wordpress.org/support/topic/this-form-is-amazing" target="_blank">Best free contact form plugin!</a></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i><a href="https://wordpress.org/support/topic/awesome-plugin-1355#post-" target="_blank">Easy to use and simply beautiful. I love the way the conditional logic works and how easy it is to set up.</a></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i><a href="https://wordpress.org/support/topic/best-free-forms-plugin" target="_blank">I've been testing several form plugins and this is by far the easiest to use</a>.</li>
                    <li><i class="fa fa-star" aria-hidden="true"></i><a href="https://wordpress.org/support/topic/the-most-incredible-form-plugin-you-ever-seen#post-" target="_blank">The most incredible form plugin you ever seen!&nbsp;Hands down the best forms plugin and the best support!</a></li>
                </ul>
            </div>
        </div>
        <div class="row happy-tweets">
            <?php
            printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[4] ) );
            printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[2] ) );
            ?>
        </div>
        <div class="row">
            <?php //echo caldera_theme_foogallery(8709) ?>
        </div>
        <div class="row">
            <div id="key-features" class="jumbotron">
                <h5>Key Features:</h5>
                <ul>
                    <li>Seamless WordPress integration</li>
                    <li>Drag and drop field placement to quickly and easily build forms</li>
                    <li>Conditional logic</li>
                    <li>Extensive list of form elements to choose from</li>
                    <li>Responsive across all devices</li>
                    <li>Developer-friendly</li>
                    <li>Expandable with premium add-ons</li>
                    <li>Easy For Anyone To Use–Beginners & Developers A Like</li>
                </ul>
            </div>
            <p>Caldera Forms' drag and drop field placement makes it easy to build complex form layouts. Fields and processors can be configured to fit your purpose, and altering the layout to create multi-column, mobile-friendly WordPress forms is a breeze.</p>

            <p>Developers will be pleased to know we’ve included numerous filters and actions that make Caldera Forms completely customizable. The use of Bootstrap for the responsive grid allows you to modify the appearance of your forms, and integrate with other Bootstrap-based plugins and themes.</p>
            <p>For developers and advanced users, the plugin includes various form types; mail and redirect processors, entry logging, and AJAX submissions.</p>
        </div>
        <div class="row happy-tweets">
            <?php
            printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[1] ) );
            printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[9] ) );
            ?>
        </div>
        <div id="bundles" class="row">
            <h3>Bundles</h3>
            <p>We have a full line of <a href="<?php echo esc_url( get_permalink( 712 ) ); ?>">add-ons</a> for accepting payments, login, registration, front-end editing, mailing list building and more. Add-ons can be purchased individually or you can save big by buying one of our bundles.</p>
            <?php echo caldera_theme_bundle_price_tables(); ?>

        </div>

    </div>
    <div class="row happy-tweets">
        <?php
     //   printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[7] ) );
      //  printf( $emebed_pattern, caldera_theme_oembed_get( $tweets[5] ) );
        ?>
    </div>








<?php get_footer( );