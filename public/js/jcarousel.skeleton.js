(function($) {
    $(function() {
    $.fn.bcSwipe = function(settings) {
        var config = { threshold: 50 };
        if (settings) {
            $.extend(config, settings);
        }
        this.each(function() {
            var stillMoving = false;
            var start;
            this.addEventListener('touchstart', onTouchStart, false);
            function onTouchStart(e) {
                if (e.touches.length == 1) {
                    start = e.touches[0].pageX;
                    stillMoving = true;
                    this.addEventListener('touchmove', onTouchMove, false);
                }
            }
            function onTouchMove(e) {
                if (stillMoving) {
                    var x = e.touches[0].pageX;
                    var difference = start - x;
                    if (Math.abs(difference) >= config.threshold) {
                        //cancel touch
                        this.removeEventListener('touchmove', onTouchMove);
                        start = null;
                        stillMoving = false;
                        if (difference > 0) {
                            $(this).jcarousel('scroll', '+=1');
                        }  else {
                            $(this).jcarousel('scroll', '-=1');
                        }
                    }
                }
            }
        });
        return this;
    };
    });
})(jQuery);
