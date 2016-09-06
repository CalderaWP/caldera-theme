<?php
/**
 Pricing table CSS
 */
?>
<style>
    .panel.price,
    .panel.price>.panel-heading{
        border-radius:0px;
        -moz-transition: all .3s ease;
        -o-transition:  all .3s ease;
        -webkit-transition:  all .3s ease;
    }
    .panel.price:hover{
        box-shadow: 0px 0px 30px rgba(0,0,0, .2);
    }
    .panel.price:hover>.panel-heading{
        box-shadow: 0px 0px 30px rgba(0,0,0, .2) inset;
    }


    .panel.price>.panel-heading{
        box-shadow: 0px 5px 0px rgba(50,50,50, .2) inset;
        text-shadow:0px 3px 0px rgba(50,50,50, .6);
    }

    .price .list-group-item{
        border-bottom-:1px solid rgba(250,250,250, .5);
        font-weight:600;
        text-shadow: 0px 1px 0px rgba(250,250,250, .75);
    }

    .panel.price .list-group-item:last-child {
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
    }
    .panel.price .list-group-item:first-child {
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
    }

    .price .panel-footer {
        color: #fff;
        border-bottom:0px;
        background-color:  rgba(0,0,0, .1);
        box-shadow: 0px 3px 0px rgba(0,0,0, .3);
    }


    .panel.price .btn{
        background-color:#7e943d;
        box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
        border:0px;
    }

    .panel.price .btn:hover{
        background-color:#ff7e30;
        box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
        border:0px;
    }



    /* green panel */


    .price.panel-green>.panel-heading {
        color: #fff;
        background-color: #a3bf61;
        border-color: #a3bf61;
        border-bottom: 1px solid #a3bf61;
    }


    .price.panel-green>.panel-body {
        color: #fff;
        background-color: #a3bf61;
    }


    .price.panel-green>.panel-body .lead{
        text-shadow: 0px 3px 0px rgba(50,50,50, .3);
    }

    .panel.price.panel-green .btn {
        background-color: #a3bf61;
    }

    .panel.price.panel-green .btn:hover {
        background-color: #ff7e30;
    }


    /* orange price */
    .price.panel-orange>.panel-heading {
        color: #fff;
        background-color: #ff7e30;
        border-color: #fff;
        border-bottom: 1px solid #000;
    }

    .price.panel-orange>.panel-body {
        color: #fff;
        background-color: #ff7e30;
    }

    .price.panel-orange>.panel-body .lead{
        text-shadow: 0px 3px 0px rgba(50,50,50, .3);
    }

    .price.panel-orange .list-group-item {
        color: #000;
        background-color: rgba(50,50,50, .01);
        font-weight:600;
        text-shadow: 0px 1px 0px rgba(250,250,250, .75);
    }

    .panel.price.panel-orange .btn {
        background-color: #ff7e30;
    }

    .panel.price.panel-orange .btn:hover {
        background-color: #a3bf61;
    }

    /* grey price */


    .price.panel-grey>.panel-heading {
        color: #fff;
        background-color: #6D6D6D;
        border-color: #B7B7B7;
        border-bottom: 1px solid #B7B7B7;
    }


    .price.panel-grey>.panel-body {
        color: #fff;
        background-color: #808080;
    }



    .price.panel-grey>.panel-body .lead{
        text-shadow: 0px 3px 0px rgba(50,50,50, .3);
    }


    .panel.price.panel-grey .btn {
        background-color: #cfcfcf;
    }

    .panel.price.panel-grey .btn:hover {
        background-color: #a3bf61;
    }



    #prices-options-row p.text-center {
        margin-top: 12px;
    }


</style>
