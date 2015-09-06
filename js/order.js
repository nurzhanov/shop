(function(){
	var doc = document,
		order_next = doc.querySelector("#order_next");

	var checkOrder = function(e){
		eventsObj.preventDefault(e);
		console.log("0000000001");
	}

	eventsObj.addEvent(order_next, 'click', loginUser); 
})();