var video = document.querySelector('.video');
var juice = document.querySelector('.orange-juice');
var btn = document.getElementById('play-pause');
    
function togglePlayPause() {
	if (video.paused) {
        btn.className = "pause";
		video.play();
	} else {
		btn.className = "play";
		video.pause();
	}
}

btn.onclick = function() {
    togglePlayPause();
}

video.onclick = function() {
	togglePlayPause();
}

video.addEventListener("timeupdate", function() {
	if (video.ended) {
		btn.className = 'play';
    }
    
    if (video.started) {
		btn.className = 'pause';
    }
});