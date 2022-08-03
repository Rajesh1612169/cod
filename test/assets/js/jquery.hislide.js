 (function($) {

    var slide = function(ele,options) {
        var $ele = $(ele);
        var setting = {
            speed: 500,
            interval: 2000,
            
        };
        $.extend(true, setting, options);
        var states = [
			{ $zIndex: 1, width: 424, height: 250, top: 69, left: 134, $opacity: 0.2, $blur:2},
            { $zIndex: 2, width: 424, height: 270, top: 59, left: 0, $opacity: 0.7, $blur:2},
            { $zIndex: 3, width: 424, height: 318, top: 35, left: 110, $opacity: 0.9, $blur:2},
            { $zIndex: 4, width: 424, height: 350, top: 0, left: 263, $opacity: 1, $blur:0 },
            { $zIndex: 3, width: 424, height: 318, top: 35, left: 470, $opacity: 0.9, $blur:2},
            { $zIndex: 2, width: 424, height: 270, top: 59, left: 620, $opacity: 0.7, $blur:2},
            { $zIndex: 1, width: 424, height: 250, top: 69, left: 500, $opacity: 0.2,$blur:2}
        ];

        var $lis = $ele.find('li');
        var timer = null;

        // 事件
        $ele.find('.hi-next').on('click', function() {
            next();
        });
        $ele.find('.hi-prev').on('click', function() {
            states.push(states.shift());
            move();
        });
        $ele.on('mouseenter', function() {
            clearInterval(timer);
            timer = null;
        }).on('mouseleave', function() {
            autoPlay();
        });

        move();
        autoPlay();

        // 让每个 li 对应上面 states 的每个状态
        // 让 li 从正中间展开
        function move() {
            $lis.each(function(index, element) {
                var state = states[index];

                $(element).css('z-index', state.$zIndex).finish().animate(state, setting.speed).css('opacity', state.$opacity)
					.css({"filter": "blur("+state.$blur+"px)"});
            });
        }

        // 切换到下一张
        function next() {
            // 原理：把数组最后一个元素移到第一个
            states.unshift(states.pop());
            move();
        }

        function autoPlay() {
            timer = setInterval(next, setting.interval);
        }
    };
    // 找到要轮播的轮播图的根标签，调用 slide()
    $.fn.hiSlide = function(options) {
        $(this).each(function(index, ele) {
            slide(ele,options);
        });
        // 返回值，以便支持链式调用
        return this;
    };
})(jQuery);
