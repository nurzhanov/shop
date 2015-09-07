(function(){
	
	// horizontal menu
	var pull = $("#pull");
	var menu = $("nav ul");

	loadcart();

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
				// console.log("add ok");
				loadcart();
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
				if(data == "0"){
					$('#sub-menu > a').html("Cart is empty");
				}else{
					$('#cart_status').html("Cart +"+data);
				}
			}
		});
	};



	$('.count-minus').click(function(){
		var curid = $(this).attr("curid");
		$.ajax({
			type: "POST",
			url: "./include/count_minus.php",
			data: "id="+curid,
			dataType: "html",
			cache: false,
			success: function(data){
				$('#input_id'+curid).val(data);
				loadcart();
				// переменная с ценой продукта
				var priceproduct = $("#tovar"+curid+ " > p").attr("price");
				// цену умножаем на количество
				result_total = Number(priceproduct) * Number(data);

				$("#tovar"+curid+" > p").html(result_total+"$");
				$("#tovar"+curid+" > h5 > .span-count").html(data);

				itog_price();
			}
		});
	});

	$('.count-plus').click(function(){
		var curid = $(this).attr("curid");
		$.ajax({
			type: "POST",
			url: "./include/count_plus.php",
			data: "id="+curid,
			dataType: "html",
			cache: false,
			success: function(data){
				$('#input_id'+curid).val(data);
				loadcart();
				// переменная с ценой продукта
				var priceproduct = $("#tovar"+curid+ " > p").attr("price");
				// цену умножаем на количество
				result_total = Number(priceproduct) * Number(data);

				$("#tovar"+curid+" > p").html(result_total+"$");
				$("#tovar"+curid+" > h5 > .span-count").html(data);

				itog_price();
			}
		});
	});

	function itog_price(){
		$.ajax({
			type: "POST",
			url: "./include/itog_price.php",
			dataType: "html",
			cache: false,
			success: function(data){
				$(".itog-price > strong").html(data);
			}
		});
	};

	// $('.count-input').keypress(function(e)){
	// 	if(e.keyCode == 13){
	// 		var curid = $(this).attr("curid");
	// 		var incount = $("#input-id"+curid.val());

	// 		$.ajax({
	// 			type: "POST",
	// 			url: "./include/count_input.php",
	// 			data: "id="+curid+"&count="+incount,
	// 			dataType: "html",
	// 			cache: false,
	// 			success: function(data){
	// 				$("#input-id"+curid).val(data);
	// 				loadcart();
	// 				// переменная с ценой продукта
	// 				var priceproduct = $("#tovar"+curid+ " > p").attr("price");
	// 				// цену умножаем на количество
	// 				result_total = Number(priceproduct) * Number(data);
	// 				$("#tovar"+curid+" > p").html(result_total+"$");
	// 				$("#tovar"+curid+" > h5 > .span-count").html(data);
	// 				itog_price();
	// 			}
	// 		});
	// 	}
	// };	
})();
