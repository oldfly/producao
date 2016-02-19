/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

jQuery(function($) {

    // Options
    var config = $('html').data('config') || {},
        navbar = $('.tm-navbar');

    // Centered dropdown
    navbar.find('.uk-dropdown').addClass('uk-dropdown-center');

    // Social buttons
    $('article[data-permalink]').socialButtons(config);

});
