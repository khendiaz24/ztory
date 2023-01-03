var ui_close = (function(document) {

	var evt = [

		// accordion - function to control an accordion menu

		function(document) {

			var toggle = document.querySelectorAll('[data-toggle=close]');

			toggle.forEach(function(close) {

        var panel = document.querySelector('#' + close.getAttribute('aria-controls'));
				var backdrop = document.querySelector('.layout-backdrop');
				var menu = document.querySelector('[data-toggle=menu]');

				close.addEventListener('click', function (event) {

					panel.classList.remove('open');
					backdrop.setAttribute('aria-hidden', true);
          document.querySelector('html').classList.remove('overflow-panel');
					menu.classList.remove('hide');
					close.classList.remove('show');
					document.querySelectorAll('.mobile-menu').forEach(function(mobile_menu){
						mobile_menu.classList.remove('open');
					});

				}, false);
			});

			var toggle2 = document.querySelectorAll('[data-toggle=searchClose]');

			toggle2.forEach(function(close) {

        var panel = document.querySelector('#' + close.getAttribute('aria-controls'));
				var backdrop = document.querySelector('.layout-backdrop');

				close.addEventListener('click', function (event) {

					panel.classList.remove('open');
					backdrop.setAttribute('aria-hidden', true);
          document.querySelector('html').classList.remove('overflow-panel');

				}, false);
			});

			var toggle3 = document.querySelectorAll('[data-toggle=submenuClose]');

			toggle3.forEach(function(close) {

        var panel = document.querySelector('#' + close.getAttribute('aria-controls'));

				close.addEventListener('click', function (event) {

					panel.classList.remove('open');

				}, false);
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

ui_close.init();