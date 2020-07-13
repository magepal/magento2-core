/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
 */

define([
    'jquery'
], function ($) {
    'use strict';

    var $searchField = $('.magepal-extension-search .search-input');
    var $searchButton = $('.magepal-extension-search button');

    var $element = $('div.config-nav-block.admin__page-magepal-tab strong');
    var html = '<span class="mp-logo"></span>';
    $element.before(html);

    var showBadge = function (config) {
        $.ajax({
            url: config.url,
            type: 'get',
            dataType: 'json',
            error: function (){}
        }).done(function (response) {
            if (typeof response === 'object' && response.hasOwnProperty('count') && response.count > 0) {
                var html = '<span class="notifications-counter">' + response.count + '</span>';
                if (config.notificationOption !== 1) {
                    $element.append(html);
                }

                $element.parent().parent().find('ul.items li.item:first').append(html)
            }
        });
    };

    return function (config) {
        if (config.notificationOption !== 0) {
            showBadge(config);
        }

        var openWindow = function ($element) {
            if ($($element).val().length > 2) {
                var newTab = window.open();
                newTab.location.href = config.searchUrl + '&q=' + encodeURI($element.val());
            }
        };

        $searchField.keypress(function (event) {
            if (event.keyCode === 13 || event.which === 13) {
                openWindow($(this));
                event.preventDefault();
            }
        });

        $searchButton.on('click', function (event) {
            event.preventDefault();
            openWindow($searchField)
        });
    }
});
