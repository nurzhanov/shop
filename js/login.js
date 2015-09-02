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
				lname.style.borderColor = "red";
			}else{
				lname.style.borderColor = "";
			}
			if(lpass_val === ""){
				lpass.style.borderColor = "red";
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
	        // Создаём объект XMLHTTP
	        var xhttp_log = new XMLHttpRequest();
	        xhttp_log.onreadystatechange = function(){
				if (xhttp_log.readyState==4 && xhttp_log.status==200) {
					if(xhttp_log.responseText === "no_auth"){
						alert("Login or password is incorrect!");
					}
            		if(xhttp_log.responseText === "yes_auth"){
            			// alert("You have successfully login in!");
            			window.location.href = "account.php";
            		}
            	}
			}
			// Открываем асинхронное соединение
			xhttp_log.open('POST', 'login_server.php', true);
			// Отправляем кодировку 
			xhttp_log.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhttp_log.send("lname=" + encodeURIComponent(lname_val) + "&lpass=" + encodeURIComponent(lpass_val) + '&rememberme=' + encodeURIComponent(auth_rememberme) + '&rand='+Math.random());			
		}
	};

	var signupUser = function(e){
		eventsObj.preventDefault(e);
		var rname = doc.querySelector("#reg_name");
		var remail = doc.querySelector("#reg_email");
		var rpass = doc.querySelector("#reg_pass");
		var rname_val = rname.value;
		var remail_val = remail.value;
		var rpass_val = rpass.value;
		if((rname_val != "") || (remail_val != "") || (rpass_val != "")){
			var pattern_name = /^[a-zA-Z]/;
			var pattern_email = /\S+@\S+\.\S+/;
			var pattern_pass = /^[a-zA-Z0-9]{6,15}$/;
			if(rname_val.search(pattern_name) != 0){
				alert('Username must have alphabet characters');
			}else{
				rname.style.borderColor = "";
				if(pattern_email.test(remail_val) != true){
					alert("Email is incorrect !"); 
				}else{
					remail.style.borderColor = "";
					if(rpass_val.search(pattern_pass) != 0){
						alert("Password length should be from 6 to 15 characters or digits");
					}else{
						rpass.style.borderColor = ""; 
						// Создаём объект XMLHTTP
						// var xhttp_reg = getXmlHttp();
						var xhttp_reg = new XMLHttpRequest();
						xhttp_reg.onreadystatechange = function(){
							if (xhttp_reg.readyState==4 && xhttp_reg.status==200) {								
								if(xhttp_reg.responseText === "false"){
									alert("Login is used");
								}
	                    		if(xhttp_reg.responseText === "true"){
	             					rname.value = "";
	             					remail.value = "";
	             					rpass.value = "";
	                    			alert("You have successfully signed up!");
	                    		}
	                    	}
						}
						// Открываем асинхронное соединение
						xhttp_reg.open('POST', 'server.php', true);
						// Отправляем кодировку 
						xhttp_reg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xhttp_reg.send("rname=" + encodeURIComponent(rname_val) + "&remail=" + encodeURIComponent(remail_val) + "&rpass=" + encodeURIComponent(rpass_val) + '&rand='+Math.random());
					}
				}
			}
		}else{
			rname.style.borderColor = "red";
			remail.style.borderColor = "red";
			rpass.style.borderColor = "red";
		}		
	};

	eventsObj.addEvent(login, 'click', loginUser); 
	eventsObj.addEvent(signup, 'click', signupUser);	
})();