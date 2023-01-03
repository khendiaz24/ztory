/* JavaScript File                                                  */
/* ui-tabs.js                                                  		*/
/* Modified June 11, 2022                                        */


var ui_tabs_filter = (function(document) {

	var evt = [

		// tabs - function to control a tabbed interface

		function(document, window, args) {

			var tabs = document.querySelectorAll('[data-toggle=filter]');

			tabs.forEach(function(trigger) {

				trigger.addEventListener('click', function (event) {
					event.preventDefault();

					var target = trigger.getAttribute('href');
					var ss = trigger.closest('.tab-nav');

					if(ss.querySelector('a.active')){
						ss.querySelector('a.active').classList.remove('active');
					}
					
					trigger.classList.add('active');

					var filters = document.querySelectorAll('.filters');

					if( target == '*') {

						filters.forEach(function(filter){

							filter.style.display = 'block';
						});

					} else {

						var newTargets = document.querySelectorAll('.' + target);

						filters.forEach(function(filter){

							filter.style.display = 'none';
						});

						newTargets.forEach(function(newTarget){

							newTarget.style.display = 'block';
						});
						
					}

				}, false);

			});
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

ui_tabs_filter.init();