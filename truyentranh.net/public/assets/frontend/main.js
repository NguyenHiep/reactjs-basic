"use strict";
$(document).ready(function () {
	var elemBody = $('body');
	var elemSlider = elemBody.find('.home-sliders').eq(0);
	// Slider page home
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
	// Chapter selected
	elemBody.find('[rel=chap-select]').change(function(){
		var item = $(this),
			href   = item.val();
		if (!href) {
			return false;
		}
		return window.location.href = href;
	});

	var reportForm = elemBody.find('#report-form').submit(function(){
		var form = this;
		if($.trim(this.id.value).length == 0 || $.trim(this.cid.value).length == 0){
			alert('Unknow error!');
			return false;
		}
		if($.trim(this.content.value).length == 0 || $.trim(this.content.value).length < 10){
			alert('Vui lòng mô tả lỗi!');
			this.content.focus();
			return false;
		}

		$.post(reportForm.attr('action'), reportForm.serialize(), function(json){
			console.log(json);
			if (json.status == true) {
				form.content.value = '';
				$('#boxReport').hide();
				$('.modal-backdrop.fade.show').hide();
				alert('Thông báo thành công, cảm ơn rất nhiều !');
			} else {
				alert(json.msg);
			}

		}, 'json');
		return false;
	});

});
(function ($) {
	// Scroll bar in maga book
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
