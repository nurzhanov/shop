(function(){
	var doc = document,
		save = doc.querySelector('#save');

	var changeUserInfo = function(e){
		eventsObj.preventDefault(e);
		var cur_pass = doc.querySelector("#cur_pass"),
			new_pass = doc.querySelector("#new_pass"),
			new_email = doc.querySelector("#new_email"),
			new_name = doc.querySelector("#new_name"),
			new_surname = doc.querySelector("#new_surname"),
			new_phone = doc.querySelector("#new_phone"),
			new_address = doc.querySelector("#new_address"),
			cur_pass_val = cur_pass.value,
			new_pass_val = new_pass.value,
			new_email_val = new_email.value,
			new_name_val = new_name.value;
			new_surname_val = new_surname.value;
			new_phone_val = new_phone.value;
			new_address_val = new_address.value;
			console.log(cur_pass_val);
			console.log(new_pass_val);
			console.log(new_email_val);
			console.log(new_name_val);
			console.log(new_surname_val);
			console.log(new_phone_val);
			console.log(new_address_val);
	}

	eventsObj.addEvent(save, 'click', changeUserInfo);
})();