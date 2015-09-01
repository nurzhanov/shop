(function(){
	var doc = document;
	var login = doc.querySelector('#login');
	var signup = doc.querySelector('#signup');
	var form = doc.querySelectorAll("#reg_form");
	
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

	        var xhttp_log = new XMLHttpRequest();
			xhttp_log.open('POST','login_server.php?lname='+encodeURI(lname_val)+'&lpass='+encodeURI(lpass_val)+'&rememberme='+encodeURI(auth_rememberme)+'&rand='+Math.random(),true);
			xhttp_log.send();
			xhttp_log.onreadystatechange = function(){
				if (xhttp_log.readyState==4 && xhttp_log.status==200) {
					if(xhttp_log.responseText === "no_auth"){
						alert("Login or password is incorrect!");
					}
            		if(xhttp_log.responseText === "yes_auth"){
            			window.location.href = "account.php";
            		}
            	}
			}
			
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
			var pattern_name = /^[a-zA-Z0-9]/;
			var pattern_email = /\S+@\S+\.\S+/;
			var pattern_pass = /^[a-zA-Z0-9]{6,15}$/;
			if(rname_val.search(pattern_name) != 0){
				alert('Username must have alphabet characters or digits between 0-9 and length from 6 to 15 characters');
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
						var xhttp = new XMLHttpRequest();
						xhttp.open('POST','server.php?rname='+encodeURI(rname_val)+'&remail='+encodeURI(remail_val)+'&rpass='+encodeURI(rpass_val)+'&rand='+Math.random(),true);
						xhttp.send();
						xhttp.onreadystatechange = function(){
							if (xhttp.readyState==4 && xhttp.status==200) {
								
								if(xhttp.responseText === "false"){
									alert("Login is used");
								}
	                    		if(xhttp.responseText === "true"){
	                    			alert("New user was created!");
	                    			// window.location.href = "account.php";
	                    		}
	                    	}
						}
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