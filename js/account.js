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

			var xhttp_acc = new XMLHttpRequest();
			xhttp_reg.onreadystatechange = function(){
				if (xhttp_reg.readyState==4 && xhttp_reg.status==200) {
					if(xhttp_reg.responseText === "false"){
						swal("Oops!", "Login is used!", "error");
					}
					if(xhttp_reg.responseText === "true"){
						login.value = "";
						pass.value = "";
						email.value = "";
						name.value = "";
						surname.value = "";
						phone.value = "";
						address.value = "";
						swal("Good job!", "You are signed up!", "success");
					}
				}	
			}

	}

	eventsObj.addEvent(save, 'click', changeUserInfo);
})();