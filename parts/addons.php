<?php
if( ! defined( 'ABSPATH' ) ){
    exit;
}
?>
<style>
    .ui-view-container {
        position: relative;
        height: 65px;
    }

    [ui-view].ng-enter, [ui-view].ng-leave {
        position: absolute;
        left: 0;
        right: 0;
        -webkit-transition:all .25s ease-in-out;
        -moz-transition:all .25s ease-in-out;
        -o-transition:all .25s ease-in-out;
        transition:all .25s ease-in-out;
    }

    [ui-view].ng-enter {
        opacity: 0;
        -webkit-transform:scale3d(0.25, 0.25, 0.25);
        -moz-transform:scale3d(0.25, 0.25, 0.25);
        transform:scale3d(0.25, 0.25, 0.25);
    }

    [ui-view].ng-enter-active {
        opacity: 1;
        -webkit-transform:scale3d(1, 1, 1);
        -moz-transform:scale3d(1, 1, 1);
        transform:scale3d(1, 1, 1);
    }

    [ui-view].ng-leave {
        opacity: 1;
        -webkit-transform:translate3d(0, 0, 0);
        -moz-transform:translate3d(0, 0, 0);
        transform:translate3d(0, 0, 0);
    }

    [ui-view].ng-leave-active {
        opacity: 0;
        -webkit-transform:translate3d(100px, 0, 0);
        -moz-transform:translate3d(100px, 0, 0);
        transform:translate3d(100px, 0, 0);
    }
</style>
<div ng-app="cf-addons">
    <ul class="nav nav-tabs" >
        <li role="presentation" ui-sref-active="active">
            <a ui-sref="all" ui-sref-active="active">All</a>
        </li>
        <li role="presentation" ui-sref-active="active">
            <a ui-sref="tools">Tools</a>
        </li>
        <li role="presentation" ui-sref-active="active">
            <a ui-sref="payment" >Payment</a>
        </li>
        <li role="presentation" ui-sref-active="active">
            <a ui-sref="email" >Email</a>
        </li>
        <li role="presentation" ui-sref-active="active">
            <a ui-sref="free" >Free</a>
        </li>
    </ul>


    <ui-view ng-animate="'view'"></ui-view>
</div>
<script type="text/html" id="cf-addon-template">


            <div class="container well" ng-repeat="addon in addons track by $index">
                <article id="post-{{addon.ID}}" >


                    <div class="entry-header" role="heading">
                        <h2 class="entry-title">
                            <a href="{{link}}" rel="bookmark">
                                {{addon.name}}
                            </a>
                        </h2>


                    </div><!-- .entry-header -->
                    <div class="col-sm-12 col-md-6">
                        <img ng-src="{{addon.image_src}}" class="img-responsive" />
                    </div>

                    <div class="entry-content col-sm-12 col-md-6" ng-bind-html="trustAsHtml(addon.excerpt)" >
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

    </div>
</script>

