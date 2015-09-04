(function(){
	var doc = document;
	var back = doc.querySelector('#back');
	var backUp = function(e){
		eventsObj.preventDefault(e);
		// sweetAlert("baaaaaaaaaaack");
		swal("Oops!", "Something went wrong on the page!", "error");
	};
	eventsObj.addEvent(back, 'click', backUp);  
})();