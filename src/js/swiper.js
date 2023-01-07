var ui_slider = (function(document) {

	var evt = [

		function(document) {

			var swipers = document.querySelectorAll('.swiper-holder');

			swipers.forEach(function(slides){

				var swipe = slides.querySelector('.swiper');

				var center = swipe.getAttribute('data-center');
				var perview = swipe.getAttribute('data-perview');
				var loop = swipe.getAttribute('data-loop');
				var perviewSm = swipe.getAttribute('data-sm-perview');
				var perviewMd = swipe.getAttribute('data-md-perview');
				var perviewLg = swipe.getAttribute('data-lg-perview');
				var pagination = slides.querySelector('.swiper-pagination');
				var effect = swipe.getAttribute('data-effect');
				var delay = swipe.getAttribute('data-delay');
				var next = slides.querySelector('.swiper-button-next');
				var prev = slides.querySelector('.swiper-button-prev');

				var myloop = Boolean(loop);
				var mycenter = (center);

				console.log(mycenter, center)

				swipe = new Swiper(swipe, {
					spaceBetween: 20,
					slidesPerView: 1,
					effect: effect,
					loop: myloop,
					centeredSlides: center,
					autoHeight: true,
					autoplay: {
						delay: delay,
						disableOnInteraction: true,
					},
					pagination: {
						el: pagination,
						type: "fraction",
						clickable: true,
					},
					navigation: {
						nextEl: next,
						prevEl: prev,
					},
					breakpoints: {
						640: {
							slidesPerView: perviewSm,
						},
						768: {
							slidesPerView: perviewMd,

						},
						1024: {
							slidesPerView: perviewLg,
						},
					},
				});

			});
		}

	],
	initAll = function() {

		initEvt(document, window);
	},
	initEvt = function(document, window) {

		evt.forEach(function(e) {
			
			e(document, window);
		});
	};
	
	return { init: initAll };

})(document, window);

ui_slider.init();