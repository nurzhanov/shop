(function(){
	
	// горизонтальное меню
	// получаем элемент по id - "pull"
	var pull = $("#pull");
	// получение списка элементов
	var menu = $("nav ul");

	loadcart();

	// устанавливаем обработчик события "click" на выбранный элемент
	$(pull).on('click', function(e){
		// отменяем действия браузера
		e.preventDefault();
		// плавное сворачивание (если элемент развернут) 
		// или разворачиванию (если элемент свернут)
		menu.slideToggle();
		// устанавливаем высоту элемента без учета отступов и толщины рамки
		menuHeight = menu.height();
	});

	// вызываем событие "resize", для окна браузера. 
	$(window).resize(function(){
		// задаем ширину экрана
		var q = $(window).width();
		// если ширина экрана больше 320 и элемент menu спрятан
		if(q > 320 && menu.is(':hidden')){
			// убираем все стили для этого лемента
			menu.removeAttr('style');
		}
	});

	// вертикальное меню
	// устанавливаем обработчик события "click" на выбранный элемент
	$('#sidebarmenu li.has-sub>a').on('click', function(){
		// убираем атрибут "href" для текущего элемента
		$(this).removeAttr('href');
		// получение родительского элемента "li" для текущего выбранного элемента.
		var element = $(this).parent('li');
		/* 
		если этот элемент не скрыт то 
		*/
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
				// alert("Product added!");
				swal("Product added!", "continue shopping ...", "success");
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
