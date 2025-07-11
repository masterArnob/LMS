(function ($) {
    $.fn.starRating = function (options) {
        var settings = $.extend({
            stars: 5,
            current: 0,
            callback: function (value) {
            },
            static: false
        }, options);

        var $ul = this;
        var $li = $('<li class="star"><i class="fa fa-star"></i></li>');

        if ($ul.hasClass('starrating-init')) {
            return;
        }

        if (this.attr('data-current')) {
            settings.current = this.attr('data-current');
        }

        if (this.attr('data-stars')) {
            settings.stars = this.attr('data-stars');
        }

        if (this.attr('data-static')) {
            settings.static = (this.attr('data-static') === '1' || this.attr('data-static') === 'true') ? true : settings.static;
        }

        for (var i = 0; i < settings.stars; i++) {
            var $clone = $li.clone();
            if (settings.current && i < settings.current) {
                $clone.addClass('active')
            }

            $ul.append($clone);
        }
        this.addClass('starrating-init');

        if (!settings.static) {
            $ul.find('li').on('click', function () {
                if ($(this).hasClass('last')) {
                    $ul.find('li.active').removeClass('active last');
                    settings.callback(0);
                    return;
                }
                $ul.find('li.active').removeClass('active last');
                $(this).addClass('active last');
                $(this).prevAll().addClass('active');

                var selected = $ul.find('li.active').length;
                settings.callback(selected);
            }).hover(function () {
                $ul.addClass('hover');
                $(this).addClass('hover');
                $(this).prevAll().addClass('hover');
            }, function () {
                $ul.removeClass('hover');
                $(this).removeClass('hover');
                $(this).prevAll().removeClass('hover');
            });
        }

        return this;
    };
}(jQuery));