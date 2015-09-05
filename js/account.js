(function(){
	var doc = document,
		save = doc.querySelector('#save');

	var changeUserInfo = function(e){
		eventsObj.preventDefault(e);
		console.log("001");
	}

	eventsObj.addEvent(save, 'click', changeUserInfo);
})();