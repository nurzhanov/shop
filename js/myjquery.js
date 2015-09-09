(function(){
	// горизонтальное меню
	// получаем элемент по id - "pull"
	var pull = $("#pull");
	// получение списка элементов
	var menu = $("nav ul");

	// вызов метода количества элементов в корзине
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

	// устанавливаем обработчик события "resize" для окна браузера
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
		// получение родительского элемента "li" для текущего выбранного элемента
		var element = $(this).parent('li');
		/* 
		если текущий элемент открыт то прячем его  
		и сворачиваем элемент с идентификатором "ul" за 200 мс
		иначе открываем его 
		разворачиваем у текущего элемента дочерние элементы за 200 мс
		*/
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
		}
	});

	// добавление в корзину
	// устанавливаем обработчик события "click" на выбранный элемент
	$('.add-to-cart').click(function(){
		// получаем уникальный "id" товара
		var tid = $(this).attr("tid");
		/* 
		осуществляем запрос к серверу без перезагрузки страницы
		type - типа запроса
		url — адрес запроса
		data - данные передаваемые в запросе (уникальный "id" товара)
		dataType - тип передаваемых данных в запросе
		cache - что бы запрос не кешировался нужно установить значение "false"
		success - выполняется в случае удачного завершения запроса
		в случае удачного завершения запроса - отображение соотвествующего сообщения
		обновляем значения товаров в корзине вызовом метода loadcart()
		*/
		$.ajax({
			type: "POST",
			url: "./include/addtocart.php",
			data: "id="+tid,
			dataType: "html",
			cache: false,
			success: function(data){
				swal("Product added!", "continue shopping ...", "success");
				loadcart();
			}
		});
	});

	// проверка количества элементов в корзине
	function loadcart(){
		/* 
		осуществляем запрос к серверу без перезагрузки страницы
		type - типа запроса
		url — адрес запроса
		dataType - тип передаваемых данных в запросе
		cache - что бы запрос не кешировался нужно установить значение "false"
		success - выполняется в случае удачного завершения запроса
		в случае удачного завершения запроса - выполняем проверку если данные который вернул сервер
		равны 0, то отображение сообщения что корзина пуста, иначе отображение корзины и возвращаемого
		значения количества товаров в корзине
		*/
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

	// уменьшение товаров в корзине
	// устанавливаем обработчик события "click" на выбранный элемент
	$('.count-minus').click(function(){
		// получение уникального "id" товара
		var curid = $(this).attr("curid");
		/* 
		осуществляем запрос к серверу без перезагрузки страницы
		type - типа запроса
		url — адрес запроса
		data - данные передаваемые в запросе (уникальный "id" товара)
		dataType - тип передаваемых данных в запросе
		cache - что бы запрос не кешировался нужно установить значение "false"
		success - выполняется в случае удачного завершения запроса
		*/
		$.ajax({
			type: "POST",
			url: "./include/count_minus.php",
			data: "id="+curid,
			dataType: "html",
			cache: false,
			success: function(data){
				// отображаем новое значение количества товаров
				$('#input_id'+curid).val(data);
				// обновляем количество элементов в корзине
				loadcart();
				// получаем цену продукта
				var priceproduct = $("#tovar"+curid+ " > p").attr("price");
				// цену умножаем на количество
				result_total = Number(priceproduct) * Number(data);
				// отображение результирующей цены
				$("#tovar"+curid+" > p").html(result_total+"$");
				$("#tovar"+curid+" > h5 > .span-count").html(data);
				// подчсет итоговой цены продукта
				itog_price();
			}
		});
	});

	// увеличение товаров в корзине
	// устанавливаем обработчик события "click" на выбранный элемент
	$('.count-plus').click(function(){
		// получение уникального "id" товара
		var curid = $(this).attr("curid");
		/* 
		осуществляем запрос к серверу без перезагрузки страницы
		type - типа запроса
		url — адрес запроса
		data - данные передаваемые в запросе (уникальный "id" товара)
		dataType - тип передаваемых данных в запросе
		cache - что бы запрос не кешировался нужно установить значение "false"
		success - выполняется в случае удачного завершения запроса
		*/
		$.ajax({
			type: "POST",
			url: "./include/count_plus.php",
			data: "id="+curid,
			dataType: "html",
			cache: false,
			success: function(data){
				// отображаем новое значение количества товаров
				$('#input_id'+curid).val(data);
				// обновляем количество элементов в корзине
				loadcart();
				// получаем цену продукта
				var priceproduct = $("#tovar"+curid+ " > p").attr("price");
				// цену умножаем на количество
				result_total = Number(priceproduct) * Number(data);
				// отображение результирующей цены
				$("#tovar"+curid+" > p").html(result_total+"$");
				$("#tovar"+curid+" > h5 > .span-count").html(data);
				// подчсет итоговой цены продукта
				itog_price();
			}
		});
	});

	// подчсет итоговой цены продукта
	function itog_price(){
		/* 
		осуществляем запрос к серверу без перезагрузки страницы
		type - типа запроса
		url — адрес запроса
		dataType - тип передаваемых данных в запросе
		cache - что бы запрос не кешировался нужно установить значение "false"
		success - выполняется в случае удачного завершения запроса
		в случае удачного завершения запроса - отображаем результат сумирования 
		итоговой цены товаров в корзине
		*/
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
})();
