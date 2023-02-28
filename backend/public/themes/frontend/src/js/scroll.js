/* JavaScript File                                                  */
/* scroll.js                                                  		*/
/* Modified Dec. 26, 2022                                        */


var event_scroll = (function(document) {

	var evt = [

		// tabs - function to control a tabbed interface

		function(document, window, args) {

			var header = document.querySelector('.header');

			if(window.scrollY > 10) {

				header.classList.add('scrolled');
			} else {

				header.classList.remove('scrolled');
			}
		}

	],
	initAll = function(args) {

		initEvt(document, window, args);
	},
	initEvt = function(document, window, args) {

		evt.forEach(function(e) {
			
			e(document, window, args);
		});
	};
	
	return { init: initAll };

})(document, window);

event_scroll.init();

window.addEventListener('scroll', function() {
	event_scroll.init();

});