$(document).ready(function(){
	"use strict";
	var elemBody = $('body');
	var elemSlider = elemBody.find('.home-sliders').eq(0);
	elemSlider.slick({
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 2
	});
});