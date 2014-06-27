var News = function () {

    function initImages() {
		var i = 1;
		var ee = $('.newsWrapper .imgZoomWrapper img').each(function(){
			var href = $(this).attr('src');
			$(this).attr('src', href);
			$(this).wrap('<div class="thumbnail-style lft-img-margin pull-left" style="width: 400px;"></div>');
			$(this).wrap('<a href="'+href+'" title="Project #1" data-rel="fancybox-button" class="fancybox-button zoomer">');
			$(this).wrap('<div class="overlay-zoom"></div>');
			$(this).after('<div class="zoom-icon"></div>');
			i++;
		});
		return true;
    }
    return {
        init: function () {
            initImages();
        }



    };
}();