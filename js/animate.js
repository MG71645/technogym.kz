$(document).ready( function() {
    
    function animate() {
        $('wrapper').each(function(){
			var imagePos = $(this).offset().top;
			var topOfWindow = $(window).scrollTop();
			var Height = document.documentElement.clientHeight;
			if (imagePos < topOfWindow+(Height-200)) {
				$(this).addClass('animate');
			} else {
                $(this).removeClass('animate');
            }
		});
    }
    
    animate();
    
    $(window).scroll(function() {
		animate();
	});
    
});