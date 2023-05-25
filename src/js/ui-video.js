var ui_video = (function(document) {

	var evt = [

		// accordion - function to control an accordion menu

		function(document) {

			var toggle = document.querySelectorAll('[data-toggle=video]');

			toggle.forEach(function(video) {

        var videoPlayer = video.querySelector('.video-player');

				video.addEventListener('click', function (event) {

					video.classList.add('play');
          videoPlayer.src += "&autoplay=1";

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

ui_video.init();