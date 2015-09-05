(function(){
	var doc = document,
		login = doc.querySelector('#login'),
		signup = doc.querySelector('#signup');
	
	var loginUser = function(e){
		eventsObj.preventDefault(e);
		var error_username = doc.querySelector("#error_username"),
			error_password = doc.querySelector("#error_password"),
			lname = doc.querySelector("#login_name"),
			lpass = doc.querySelector("#login_pass"),
			rememberme = doc.querySelector("#rememberme"),
			lname_val = lname.value,
			lpass_val = lpass.value,
			send_login = "",
			send_pass = "",
			auth_rememberme = "";
		if(lname_val === "" || lpass_val === ""){
			if(lname_val === ""){
				error_username.innerHTML = "Login field is empty!";
				lname.style.borderColor = "#BF5252";
				lname.style.backgroundColor = "#F2C9C9";
			}else{
				error_username.innerHTML = "";
				lname.style.borderColor = "#cdd2d4";
				lname.style.backgroundColor = "#edeff0";
			}
			if(lpass_val === ""){
				error_password.innerHTML = "Password field is empty!";
				lpass.style.borderColor = "#BF5252";
				lpass.style.backgroundColor = "#F2C9C9";
			}else{
				error_password.innerHTML = "";
				lpass.style.borderColor = "#cdd2d4";
				lpass.style.backgroundColor = "#edeff0";
			}
		}else{
			lname.style.borderColor = "";
			lpass.style.borderColor = "";
			if (rememberme.checked) {
	            auth_rememberme = "yes";
	        } else {
	            auth_rememberme = "no";
	        }
	        //Создаём объект XMLHTTP
	        var xhttp_log = new XMLHttpRequest();
	        xhttp_log.onreadystatechange = function(){
				if (xhttp_log.readyState==4 && xhttp_log.status==200) {
					if(xhttp_log.responseText === "no_auth"){
						swal("Oops!", "Login or Password is incorrect!", "error");
					}
            		if(xhttp_log.responseText === "yes_auth"){
            			// alert("You have successfully login in!");
            			window.location.href = "account.php";
            		}
            	}
			}
			// Открываем асинхронное соединение
			xhttp_log.open('POST', './include/authorization.php', true);
			// Отправляем кодировку 
			xhttp_log.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhttp_log.send("login=" + encodeURIComponent(lname_val) + "&pass=" + encodeURIComponent(lpass_val) + '&rememberme=' + encodeURIComponent(auth_rememberme) + '&rand='+Math.random());			
		}
	};

	var signupUser = function(e){

		eventsObj.preventDefault(e);
		var error_login = doc.querySelector("#error_login"),
			error_pass = doc.querySelector("#error_pass"),
			error_email = doc.querySelector("#error_email"),
			error_name = doc.querySelector("#error_name"),
			error_surname = doc.querySelector("#error_surname"),
			error_phone = doc.querySelector("#error_phone"),
			error_address = doc.querySelector("#error_address"),
			login = doc.querySelector("#reg_login"),
			pass = doc.querySelector("#reg_pass"),
			email = doc.querySelector("#reg_email"),
			name = doc.querySelector("#reg_name"),
			surname = doc.querySelector("#reg_surname"),
			phone = doc.querySelector("#reg_phone"),
			address = doc.querySelector("#reg_address"),
			login_val = login.value,
			pass_val = pass.value,
			email_val = email.value,
			name_val = name.value,
			surname_val = surname.value,
			phone_val = phone.value,
			address_val = address.value;

		if((login_val != "") || (pass_val != "") || (email_val != "") || (name_val != "") || (surname_val != "") || (phone_val != "") || (address_val != "") ){
			var pattern = /^[a-zA-Z0-9]/,
				pattern_name = /^[a-zA-Z]/,
				pattern_phone = /^[0-9]{10}/,
				pattern_pass = /^[a-zA-Z0-9]{6,15}$/,
				pattern_email = /\S+@\S+\.\S+/;
			if(login_val.search(pattern) != 0){
				error_login.innerHTML = "Only characters or digits!";
				login.style.borderColor = "#BF5252";
				login.style.backgroundColor = "#F2C9C9";
			}else{
				error_login.innerHTML = "";
				login.style.borderColor = "#cdd2d4";
				login.style.backgroundColor = "#edeff0";
				if(pass_val.search(pattern_pass) != 0){
					error_pass.innerHTML = "Length (6-15) characters or digits!";
					pass.style.borderColor = "#BF5252";
					pass.style.backgroundColor = "#F2C9C9";
				}else{
					error_pass.innerHTML = "";
					pass.style.borderColor = "#cdd2d4";
					pass.style.backgroundColor = "#edeff0";
					if(pattern_email.test(email_val) != true){
						error_email.innerHTML = "Email is incorrect!";
						email.style.borderColor = "#BF5252";
						email.style.backgroundColor = "#F2C9C9";
					}else{
						error_email.innerHTML = "";
						email.style.borderColor = "#cdd2d4";
						email.style.backgroundColor = "#edeff0";
						if(name_val.search(pattern_name) != 0){
							error_name.innerHTML = "Only characters!";
							name.style.borderColor = "#BF5252";
							name.style.backgroundColor = "#F2C9C9";
						}else{
							error_name.innerHTML = "";
							name.style.borderColor = "#cdd2d4";
							name.style.backgroundColor = "#edeff0";
							if(surname_val.search(pattern_name) != 0){
								error_surname.innerHTML = "Only characters!";
								surname.style.borderColor = "#BF5252";
								surname.style.backgroundColor = "#F2C9C9";
							}else{
								error_surname.innerHTML = "";
								surname.style.borderColor = "#cdd2d4";
								surname.style.backgroundColor = "#edeff0";
								if(phone_val.search(pattern_phone) != 0){
									error_phone.innerHTML = "Phone is incorrect!";
									phone.style.borderColor = "#BF5252";
									phone.style.backgroundColor = "#F2C9C9";
								}else{
									error_phone.innerHTML = "";
									phone.style.borderColor = "#cdd2d4";
									phone.style.backgroundColor = "#edeff0";
									if(address_val === ""){
										error_address.innerHTML = "Address does not exist!";
										address.style.borderColor = "#BF5252";
										address.style.backgroundColor = "#F2C9C9";
									}else{
										error_address.innerHTML = "";
										address.style.borderColor = "#cdd2d4";
										address.style.backgroundColor = "#edeff0";
										// Создаём объект XMLHTTP
										var xhttp_reg = new XMLHttpRequest();
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
										// Открываем асинхронное соединение
										xhttp_reg.open('POST', './include/registration.php', true);
										// Устанавливаем кодировку
										xhttp_reg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
										// Отправляем данные
										xhttp_reg.send("login=" + encodeURIComponent(login_val) + 
													   "&pass=" + encodeURIComponent(pass_val) + 
													   "&email=" + encodeURIComponent(email_val) + 
													   "&name=" + encodeURIComponent(name_val) + 
													   "&surname=" + encodeURIComponent(surname_val) + 
													   "&phone=" + encodeURIComponent(phone_val) + 
													   "&address=" + encodeURIComponent(address_val) + 
													   "&rand="+Math.random());
									}
								}
							}
						}
					}
				}
			}
		}else{
			login.style.borderColor = "#BF5252";
			email.style.borderColor = "#BF5252";
			pass.style.borderColor = "#BF5252";
			name.style.borderColor = "#BF5252";
			surname.style.borderColor = "#BF5252";
			phone.style.borderColor = "#BF5252";
			address.style.borderColor = "#BF5252";
			login.style.backgroundColor = "#F2C9C9";
			email.style.backgroundColor = "#F2C9C9";
			pass.style.backgroundColor = "#F2C9C9";
			name.style.backgroundColor = "#F2C9C9";
			surname.style.backgroundColor = "#F2C9C9";
			phone.style.backgroundColor = "#F2C9C9";
			address.style.backgroundColor = "#F2C9C9";
			error_login.innerHTML = "Login field is empty!";
			error_email.innerHTML = "Email field is empty!";
			error_pass.innerHTML = "Password field is empty!";
			error_name.innerHTML = "Name field is empty!";
			error_surname.innerHTML = "Surname field is empty!";
			error_phone.innerHTML = "Phone field is empty!";
			error_address.innerHTML = "Address field is empty!"; 
		}		
	};

	eventsObj.addEvent(login, 'click', loginUser); 
	eventsObj.addEvent(signup, 'click', signupUser);	
})();