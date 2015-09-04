(function(){
	var doc = document;
	var login = doc.querySelector('#login');
	var signup = doc.querySelector('#signup');
	var form = doc.querySelectorAll("#reg_form");

	/* Данная функция создаёт кроссбраузерный объект XMLHTTP */
	// function getXmlHttp(){
	// 	var xmlhttp;
	// 	try {
	// 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	// 	}catch (e) {
	// 		try {
	// 	  		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	// 		}catch (E) {
	// 			xmlhttp = false;
	// 		}
	// 	}
	// 	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	// 		xmlhttp = new XMLHttpRequest();
	// 	}
	// 	return xmlhttp;
	// };
	
	var loginUser = function(e){
		eventsObj.preventDefault(e);
		var lname = doc.querySelector("#login_name");
		var lpass = doc.querySelector("#login_pass");
		var rememberme = doc.querySelector("#rememberme");
		var lname_val = lname.value;
		var lpass_val = lpass.value;
		var send_login = "";
		var send_pass = "";
		var auth_rememberme = "";
		if(lname_val === "" || lpass_val === ""){
			if(lname_val === ""){
				lname.style.borderColor = "#BF5252";
				lname.style.backgroundColor = "#F2C9C9";
			}else{
				lname.style.borderColor = "";
			}
			if(lpass_val === ""){
				lpass.style.borderColor = "#BF5252";
				lpass.style.backgroundColor = "#F2C9C9";
			}else{
				lpass.style.borderColor = "";
			}
		}else{
			lname.style.borderColor = "";
			lpass.style.borderColor = "";
			if (rememberme.checked) {
	            auth_rememberme = "yes";
	        } else {
	            auth_rememberme = "no";
	        }
	        sweetAlert("OK");
	        // Создаём объект XMLHTTP
	  //       var xhttp_log = new XMLHttpRequest();
	  //       xhttp_log.onreadystatechange = function(){
			// 	if (xhttp_log.readyState==4 && xhttp_log.status==200) {
			// 		if(xhttp_log.responseText === "no_auth"){
			// 			alert("Login or password is incorrect!");
			// 		}
   //          		if(xhttp_log.responseText === "yes_auth"){
   //          			// alert("You have successfully login in!");
   //          			window.location.href = "account.php";
   //          		}
   //          	}
			// }
			// // Открываем асинхронное соединение
			// xhttp_log.open('POST', 'login_server.php', true);
			// // Отправляем кодировку 
			// xhttp_log.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			// xhttp_log.send("lname=" + encodeURIComponent(lname_val) + "&lpass=" + encodeURIComponent(lpass_val) + '&rememberme=' + encodeURIComponent(auth_rememberme) + '&rand='+Math.random());			
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
			error_address = doc.querySelector("error_address"),
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

								alert("OK");

								// // Создаём объект XMLHTTP
						// // var xhttp_reg = getXmlHttp();
						// var xhttp_reg = new XMLHttpRequest();
						// xhttp_reg.onreadystatechange = function(){
						// 	if (xhttp_reg.readyState==4 && xhttp_reg.status==200) {								
						// 		if(xhttp_reg.responseText === "false"){
						// 			alert("Login is used");
						// 		}
	     //                		if(xhttp_reg.responseText === "true"){
	     //         					rname.value = "";
	     //         					remail.value = "";
	     //         					rpass.value = "";
	     //                			alert("You have successfully signed up!");
	     //                		}
	     //                	}
						// }
						// // Открываем асинхронное соединение
						// xhttp_reg.open('POST', 'server.php', true);
						// // Отправляем кодировку 
						// xhttp_reg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// xhttp_reg.send("rname=" + encodeURIComponent(rname_val) + "&remail=" + encodeURIComponent(remail_val) + "&rpass=" + encodeURIComponent(rpass_val) + '&rand='+Math.random());


								
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
		}		
	};

	eventsObj.addEvent(login, 'click', loginUser); 
	eventsObj.addEvent(signup, 'click', signupUser);	
})();