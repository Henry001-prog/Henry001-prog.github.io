$(function(){

	var nav = $('.menu');

	$(window).scroll(function(){

		if($(this).scrollTop() > 173){

			nav.addClass("menu-fixo").css("opacity", 0.4);
			
			
		}else{

			nav.removeClass("menu-fixo").css("opacity", 1);
		}
		
	});

     
});