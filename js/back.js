(function(){
	var doc = document;
	var back = doc.querySelector('#back');
	var backUp = function(e){
		eventsObj.preventDefault(e);
		// sweetAlert("baaaaaaaaaaack");
		// swal("Oops!", "Something went wrong on the page!", "error");
		swal("Good job!", "You clicked the button!", "success")
	};
	eventsObj.addEvent(back, 'click', backUp);  
})();