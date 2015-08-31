(function(){
	var doc = document;
	var back = doc.querySelector('#back');
	var backUp = function(e){
		eventsObj.preventDefault(e);
		console.log("baaaaaaaaaaack");
	};
	eventsObj.addEvent(back, 'click', backUp);  
})();