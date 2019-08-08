/*
 *  jquery-facebox - v2.1.0
 *  Simple jQuery Modal / alert / Confirm.
 *  http://efriandika.github.io/jquery-facebox/
 *
 *  Made by: Efriandika Pratama (efriandika@gmail.com)
 *  Inspired by: https://github.com/defunkt/facebox
 *
 *  Under MIT License
 */
(function($) {
    var isInited = false;

    function Plugin(options, element)
    {
        this.elem       = element;
        this.settings   = $.extend({}, $.fn.facebox.defaults, options);
        this.init();
    }

    Plugin.prototype = {
        // called one time to setup facebox on this page
        init: function() {
            if (isInited) return true;
            else isInited = true;

            $(document).trigger('facebox.init');

            $('body').append(this.settings.faceboxHtml);

            $(document).on('close.facebox', function () {
                $('body').removeClass('facebox-open');

                if ($.facebox.jqXHR) {
                    $.facebox.jqXHR.abort();
                    $.facebox.jqXHR = null;
                }

                $('#facebox-wrapper').fadeOut(function () {
                    $('#facebox .facebox-content').empty();
                    //$(document).trigger('afterClose.facebox');
                });
            });
        },

        loadFacebox: function () {
            if($('#facebox .loader').length === 1) return true;
            this.setupOverlay();

            $('#facebox .facebox-content').empty().append(this.settings.loaderElement);

            $('#facebox-wrapper').show();
            $('#facebox').css({
                //top: getPageScroll()[1] + (getPageHeight() / 10), <-- Original
                top: (getPageHeight() / 6),
                left: $(window).width() / 2 - ($('#facebox .facebox-content').outerWidth() / 2)
            });

            $(document).trigger('load.facebox');
        },
        revealFacebox: function (data) {
            $(document).trigger('beforeReveal.facebox');

            $('#facebox .facebox-content').empty().append(data);
            $('#facebox').css('left', $(window).width() / 2 - ($('#facebox .facebox-content').outerWidth() / 2));

            $(document).trigger('afterReveal.facebox');
        },

        /**
         * Figures out what you want to display and displays it
         */
        fillFacebox: function(href) {
            if (href.match(/#/)) {
                // div

                var url = window.location.href.split('#')[0];
                var target = href.replace(url, '');
                if (target === '#') {
                    alert('Something wrong, Check your href value');
                    return;
                }
                this.fillFaceboxFromElement(target);
            } else {
                // ajax

                this.fillFaceboxFromAjax(href);
            }
        },

        fillFaceboxFromElement: function(target) {
            this.revealFacebox($(target).html());
        },

        fillFaceboxFromAjax: function(href) {
            var _self = this;
            $.facebox.jqXHR = $.get(href, function (data) {
                _self.revealFacebox(data);
            });
        },
        setupOverlay: function() {
            var _self = this;

            $('#facebox-wrapper').css('background', 'rgba(0, 0, 0, '+this.settings.opacity+')')
                .fadeIn(200)
                .animate({scrollTop: 0}, 'fast');

            if(!_self.settings.modal){
                $(document).mouseup(function (e){
                    var container = $('#facebox');

                    if (!container.is(e.target) && container.has(e.target).length === 0){
                        $(document).trigger('close.facebox');
                    }
                });
            }

            if(!$('body').hasClass('facebox-open'))
                $('body').addClass('facebox-open');

            return false;
        }
    };

    /**
     * Public, $.facebox methods
     */
    $.facebox = function (data) {
        var plugin = new Plugin();
        plugin.loadFacebox();

        if (data.ajax) plugin.fillFaceboxFromAjax(data.ajax);
        else if (data.div) plugin.fillFaceboxFromElement(data.div);
        else plugin.revealFacebox(data);
    };

    /**
     * Confirm Popup
     * @param options
     */
    $.facebox.confirm = function (options, obj, plugin) {
        if(!plugin)
            plugin = new Plugin(options, obj);

        plugin.loadFacebox();

        var title = (obj != null && $(obj).data('fbox-title')) ? $(obj).data('fbox-title') : plugin.settings.title;
        var text = (obj != null && $(obj).data('fbox-text')) ? $(obj).data('fbox-text') : plugin.settings.text;

        var html = '<div class="fbox-header"><h4>'+title+'</h4></div>' +
            '<div class="fbox-container"><div class="fbox-content">' + text + '</div>' +
            '<div class="fbox-footer">' +
            '<div class="btn-group">';

        $.each( plugin.settings.button, function(key, value) {
            var href = (value.href == null) ? '#' : value.href;
            html += '<a name="'+key+'" class="facebox-button '+value.class+'" href="'+href+'">'+value.text+'</a>';

        });

        html += '</div></div></div>';

        plugin.revealFacebox(html);

        $('a.facebox-button').on('click', function(e){
            if ($.isFunction(plugin.settings.button[$(this).attr('name')].callback))
                plugin.settings.button[$(this).attr('name')].callback.call(this, obj, plugin.settings);

            if($(this).attr('href') === '#')
                e.preventDefault();
        });

        return obj;
    };

    $.facebox.close = function () {
        $(document).trigger('close.facebox');
        return false;
    };

    /**
     * Public, $.fn.facebox methods
     */
    $.fn.facebox = function (options) {
        var elements = this;

        return elements.each(function() {
            if ($(this).length === 0) return;

            var plugin = new Plugin(options, this);

            elements.on('click.facebox', function(e){
                if(plugin.settings.type === 'default'){
                    plugin.loadFacebox();
                    plugin.fillFacebox(this.href);
                }else if(plugin.settings.type === 'confirm'){
                    $.facebox.confirm(options, this, plugin);
                }else{
                    alert('type = '+plugin.settings.type+' is unkonown');
                }

                e.preventDefault();
            });
        });
    };

    $.fn.facebox.defaults = {
        type            : 'default',
        opacity         : 0.3,
        modal           : true,
        loaderElement   : '<div class="loader">Loading...</div>',
        faceboxHtml: '<div id="facebox-wrapper" style="display:none;">' +
        '<div id="facebox">' +
        '<div class="facebox-content"></div>' +
        '</div>' +
        '</div>',
        title           : '',
        text            : '',
        button          : {
            yes: {
                text    : 'Yes',
                class   : 'btn btn-primary btn-sm',
                href    : '#',
                callback: function(obj, settings){
                    settings.onClickYesButton.call(this, obj);
                }
            },
            no: {
                text    : 'No',
                class   : 'btn btn-default btn-sm',
                href    : '#',
                callback: function(){
                    $.facebox.close();
                }
            }
        },
        onClickYesButton: function(){} // alias from  button.yes.callback
    };

    /**
     * Helper
     */
    // Adapted from getPageSize() by quirksmode.com
    var getPageHeight = function() {
        var windowHeight;
        if (self.innerHeight) {	// all except Explorer
            windowHeight = self.innerHeight;
        } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
            windowHeight = document.documentElement.clientHeight;
        } else if (document.body) { // other Explorers
            windowHeight = document.body.clientHeight;
        }
        return windowHeight;
    };

    // Re-set left
    $(window).resize(function() {
        if($(window).width() >= 768)
            $('#facebox').css('left', $(window).width() / 2 - ($('#facebox .facebox-content').outerWidth() / 2));
    });
})(jQuery);