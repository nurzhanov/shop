(function(){

	var eventsObj = {
	    addEvent: function(el, type, fn){
	        if(typeof addEventListener !== "undefined"){
	            el.addEventListener(type, fn, false);
	        }else if(typeof attachEvent !== "undefined"){
	            el.attachEvent("on" + type, fn);
	        }else{
	            el["on" + type] = fn;
	        }
	    },

	    removeEvent: function(el, type, fn){
	        if(typeof removeEventListener !== "undefined"){
	            el.removeEventListener(type, fn, false);
	        }else if(typeof detachEvent !== "undefined"){
	            el.detachEvent("on" + type, fn);
	        }else{
	            el["on" + type] = null;
	        }
	    },

	    getTarget: function(event){
	        if(typeof event.target !== "undefined"){
	            return event.target;
	        }else{
	            return event.srcElement;
	        }
	    },

	    preventDefault: function(event){
	        if(typeof event.preventDefault !== "undefined"){
	            event.preventDefault();
	        }else{
	            event.returnValue = false;
	        }
	    }
	};


	var link = document.querySelector('#back');
	var link2 = document.querySelector('#back2');
	var someFunk = function(e) {
		eventsObj.preventDefault(e);
		console.log("Какой-то текст");
	}
		var someFunk2 = function(e) {
		eventsObj.preventDefault(e);
		console.log("Какой-то текст2222");
	}
	eventsObj.addEvent(link, 'click', someFunk); 
	eventsObj.addEvent(link2, 'click', someFunk2); 




	// var pull = $("#pull");
	// var menu = $("nav ul");


	// var pull = document.querySelector("#pull");
	// var menu = document.querySelectorAll("nav ul");

	// var menuHeight = function(e){
	// 	eventsObj.preventDefault(e);
	// 	menu.height = 
	// 	menuHeight = menu.height();
	// };

	// eventsObj.addEvent(pull, 'click', menuHeight);



	// $(pull).on('click', function(e){
	// 	e.preventDefault();
	// 	menu.slideToggle();
	// 	menuHeight = menu.height();
	// });

	// $(window).resize(function(){
	// 	var q = $(window).width(); 
	// 	if(q > 320 && menu.is(':hidden')){
	// 		menu.removeAttr('style');
	// 	}
	// });


})();