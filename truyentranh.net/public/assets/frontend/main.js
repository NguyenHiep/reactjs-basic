"use strict";
$(document).ready(function () {
	var elemBody = $('body');
	var elemSlider = elemBody.find('.home-sliders').eq(0);
	elemSlider.slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 6,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: false,
					autoplay: true,
					autoplaySpeed: 5000
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 5000
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 5000
				}
			}
		]
	});
});
(function ($) {
	$(window).on("load", function () {
		var elemBody = $('body');
		var elemCustomScrollbar = elemBody.find('.mCustomScrollbar');
		elemCustomScrollbar.mCustomScrollbar({
			theme: "minimal"
		});
	});
})(jQuery);