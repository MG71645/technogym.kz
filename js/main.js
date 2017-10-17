$(document).ready( function() {
    /*
    var now = new Date();
	var newDate = new Date((now.getMonth()+1)+"/"+now.getDate()+"/"+now.getFullYear()+" 23:59:59");
	var totalRemains = (newDate.getTime()-now.getTime());
    var clock = $('#countdown-01').FlipClock((3600 * 12),{
        language: 'ru-ru',
        countdown: true
    });
    var clock = $('#countdown-02').FlipClock((3600 * 12),{
        language: 'ru-ru',
        countdown: true
    });*/
    
    $('fade').click( function() {
        popdown();
    });
    
    $(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
    
    //$('video').click(function(){this.paused?this.play():this.pause();});
    var video = document.getElementById('video');
    $('button.play').click(function() {
        $(this).remove();
        video.setAttribute("controls","controls");
        video.play();
    });
    
});