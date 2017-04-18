function EasyPeasyParallax() {
    
	scrollPos = $(this).scrollTop();
    
	$('.parallax').css({
		'background-position' : '50% ' + (-scrollPos/2)+"px"
	});
    
  	$('.main-title').css({
		'margin-top': (scrollPos/2)+"px",
		'opacity': 1-(scrollPos/320)
	});
}

$(document).ready(function(){
	$(window).scroll(function() {
		EasyPeasyParallax();
	});
});