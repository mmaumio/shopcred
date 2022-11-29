; (function ($) {
    "use strict";
    $ = jQuery;

    // woo products js starts
    var wrap = $('.wp-block-spc-woo-product');
    var btn = wrap.find(".spc-woo-product-loadmore-btn")
    var productWrapper = wrap.find(".spc-woo-product-items")

    var btnText = btn.text();
    var attributes = [];
    attributes = btn.data('attributes');
    var page = 2;

    $(btn).on("click", function (e) {
        e.preventDefault();
        $.ajax({
            url: spc_localize_ajax.ajax_url,
            type: 'POST',
            // dataType: "json",
            data: {
                action: "spc_product_loadmore",
                paged: page,
                per_page: 6,
                attributes: attributes,
                blockId: btn.data('blockid'),
                nonce: spc_localize_ajax.security
            },
            beforeSend: function (xhr) {
                btn.text('Loading...');

            },
            success: function (html) {

                // $(data).insertBefore(wrap.find('.spc-loadmore-insert-before'));
                if (html) {
                    if (html.length > 0) {
                        btn.text(btnText);
                        // productWrapper.append(data.data);
                        wrap.find('article:last-of-type').after(html);
                        page++;
                        setTimeout(function () {

                        }, 10);
                    } else {
                        btn.remove();
                    }
                } else {
                    btn.remove();
                }

            },
            error: function (xhr) {
                console.log('Error occured.please try again ' + xhr.statusText + xhr.responseText);
            },
        });
    });


    // *************************************
    // AjAX LOAD Product Filter
    // *************************************

    var filterSelectorContainer = $('.spc-ajax-filter-wrapper'),
        filterSelector = filterSelectorContainer.find(".spc-ajax-filter-inner"),
        filterSelectorAttri = filterSelector.data("selectaction"),
        filterType = filterSelector.find('.spc-ajax-filter-menu').data("filtertype"),
        taxtype = filterSelector.find('.spc-ajax-filter-menu').data("taxtype");

    var $selector;

    if (filterSelector.hasClass('spc-filter-checkbox-wrapper')) {
        $selector = $(' .spc-checkboxes-list__item input');
    } else {
        $selector = filterSelector.find(' li');
    }



    var $event = 'click';

    if (filterSelector.hasClass('spc-filter-checkbox-wrapper')) {
        $event = 'change';
    } else {
        $event = 'click';
    }

    $selector.on($event, function (e) {
        e.preventDefault();

        let that = $(this),
            selector = that.closest('.spc-ajax-filter-wrapper'),
            selectorToAction = selector.data('selectaction'),
            parents = selector.find('.spc-ajax-filter-menu'),
            wrap = $(".wp-block-spc-woo-product");

        parents.find('li').removeClass('filter-active');
        that.addClass('filter-active');

        var taxid;
        var choices = {};

        if (filterSelector.hasClass('spc-filter-checkbox-wrapper')) {

            $('input[type=checkbox]:checked').each(function () {
                if (!choices.hasOwnProperty(this.name))
                    choices[this.name] = [this.value];
                else
                    choices[this.name].push(this.value);
            });
            taxid = choices;
        } else {
            taxid = that.data('taxid');
        }

        $.ajax({
            url: spc_localize_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'spc_filter_post_grid_callback',
                selectorToAction: filterSelectorAttri,
                filterType: filterType,
                taxtype: taxtype,
                taxonomy: that.data('taxonomy'),
                taxonomyID: taxid,
                blockId: parents.data('blockid'),
                pageId: parents.data('pageid'),
                attributes: parents.data('attributes'),
                nonce: spc_localize_ajax.security
            },
            beforeSend: function () {
                wrap.addClass('spc-loading-active');
            },
            success: function (data) {

                wrap.find('.spc-woo-product-items').html(data);

                // wrap.find('.spc-woo-product-items').append(html);

            },
            complete: function () {
                wrap.removeClass('spc-loading-active');
            },
            error: function (xhr) {
                console.log('Error occured.please try again' + xhr.statusText + xhr.responseText);
                wrap.removeClass('spc-loading-active');
            },
        });
        // }
    });

})(jQuery)