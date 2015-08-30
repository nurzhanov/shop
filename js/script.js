(function(){
	
	// horizontal menu
	var pull = $("#pull");
	var menu = $("nav ul");

	$(pull).on('click', function(e){
		e.preventDefault();
		menu.slideToggle();
		menuHeight = menu.height();
	});

	$(window).resize(function(){
		var q = $(window).width(); 
		if(q > 320 && menu.is(':hidden')){
			menu.removeAttr('style');
		}
	});


	// vertical menu
	// $('#cssmenu li.active').addClass('open').children('ul').show();
	$('#sidebarmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});
})();
