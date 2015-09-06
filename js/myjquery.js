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

	// add to cart
	$('.add-to-cart').click(function(){
		var tid = $(this).attr("tid");
		// console.log(tid);
		$.ajax({
			type: "POST",
			url: "./include/addtocart.php",
			data: "id="+tid,
			dataType: "html",
			cache: false,
			success: function(data){
				console.log("add ok");
				// loadcart();
			}
		});
	});

	function loadcart(){
		$.ajax({
			type: "POST",
			url: "./include/loadcart.php",
			dataType: "html",
			cache: false,
			success: function(data){
				if(data == 0){
					$('#cart_status').html("Cart is empty");
				}else{
					$('#cart_status').html("Cart +"+data);
				}
			}
		});
	};

})();
