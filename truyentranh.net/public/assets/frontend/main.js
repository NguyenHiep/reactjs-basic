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

$(document).ready(function () {

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});

	$('.scrollup').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});

});
// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});

	// scroll body to 0px on click
	$('#back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
});
