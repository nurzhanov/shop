(function(){
	var doc = document;
	var login = doc.querySelector('#login');
	var signup = doc.querySelector('#signup');
	
	var loginUser = function(e){
		eventsObj.preventDefault(e);
		var lname = doc.querySelector("#login_name");
		var lpass = doc.querySelector("#login_pass");
		var lname_val = lname.value;
		var lpass_val = lpass.value;
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
			console.log("it`s OK");
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
			var pattern = /^[a-zA-Z0-9]{6,20}$/;
			var pattern_email = /\S+@\S+\.\S+/;
			if(rname_val.search(pattern) != 0){
				rname.style.borderColor = "red";
			}else{
				rname.style.borderColor = "";
				if(pattern_email.test(remail_val) != true){
					remail.style.borderColor = "red";
				}else{
					remail.style.borderColor = "";
					if(rpass_val.search(pattern) != 0){
						rpass.style.borderColor = "red";
					}else{
						rpass.style.borderColor = "";
						var xhttp = new XMLHttpRequest();
						xhttp.open('POST','server.php?rname='+encodeURI(rname_val)+'&rand='+Math.random(),true);
		                xhttp.send();
		                xhttp.onreadystatechange = function(){
		                    if (xhttp.readyState==4 && xhttp.status==200) {
		                    	// alert(xhttp.responseText)
		                        var xhttp2 = new XMLHttpRequest();
								xhttp2.open('POST','server.php?rnamee='+encodeURI(rname_val)+'&remail='+encodeURI(remail_val)+'&rpass='+encodeURI(rpass_val)+'&rand='+Math.random(),true);
				                xhttp2.send();
				                xhttp2.onreadystatechange = function(){
			                    	if (xhttp2.readyState==4 && xhttp2.status==200) {
			                    		console.log(xhttp2.responseText);
			                    	}
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

		// var pattern = /^[a-zA-Z0-9]{6,20}$/;
		// var pattern_email = /\S+@\S+\.\S+/;
		// if((rname_val.search(pattern) == 0) && rname_val != ""){
		// 	rname.style.borderColor = "";

		// 	if((pattern_email.test(remail_val) === true) && (remail_val != "")){
		// 		remail.style.borderColor = "";

		// 		if((rpass_val.search(pattern) == 0) && (rpass_val != "")){
		// 			rpass.style.borderColor = "";
		// 			console.log("OK");
		// 		}else{
		// 			rpass.style.borderColor = "red";
		// 		}

		// 	}else{
		// 		remail.style.borderColor = "red";
		// 	}

		// }else{
		// 	rname.style.borderColor = "red";
		// }







		
		

		
		
		
	
		
		


		// var pattern = /^[a-zA-Z0-9]{6,20}$/;
		// var pattern_email = /\S+@\S+\.\S+/;
		// if((rname_val.search(pattern) == 0) && rname_val != ""){
		// 	rname.style.borderColor = "";
		// }else{
		// 	rname.style.borderColor = "red";
		// }
		// if((pattern_email.test(remail_val) === true) && (remail_val != "")){
		// 	remail.style.borderColor = "";
		// }else{
		// 	remail.style.borderColor = "red";
		// }
		// if((rpass_val.search(pattern) == 0) && (rpass_val != "")){
		// 	rpass.style.borderColor = "";
		// }else{
		// 	rpass.style.borderColor = "red";
		// }
		// console.log("ok");
	};

	eventsObj.addEvent(login, 'click', loginUser); 
	eventsObj.addEvent(signup, 'click', signupUser);	
})();