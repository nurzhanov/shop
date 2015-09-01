(function(){
	var doc = document;
	var login = doc.querySelector('#login');
	var signup = doc.querySelector('#signup');
	var form = doc.querySelectorAll("#reg_form");
	
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

	// var checkForm = function(form){



	// 	if((rname_val === "") && (remail_val === "") && (rpass_val === "")){
	// 		rname.style.borderColor = "red";
	// 		remail.style.borderColor = "red";
	// 		rpass.style.borderColor = "red";
	// 		var pattern = /^[a-zA-Z0-9]{6,20}$/;
	// 		var pattern_email = /\S+@\S+\.\S+/;
	// 		if(rname_val.search(pattern) == 0){
	// 			rname.style.borderColor = "";
	// 			return false;
	// 		}else{
	// 			rname.style.borderColor = "red";
				
	// 		}
	// 		if(pattern_email.test(remail_val) === true){
	// 			remail.style.borderColor = "";
	// 			return false;
	// 		}else{
	// 			remail.style.borderColor = "red";
				
	// 		}
	// 		if(rpass_val.search(pattern) == 0){
	// 			rpass.style.borderColor = "";
	// 			return false;
	// 		}else{
	// 			rpass.style.borderColor = "red";
				
	// 		}
	// 	}else{
	// 		console.log("OK");
	// 		return true;
	// 	}
	// };


	function allLetter(uname){   
		var letters = /^[A-Za-z]+$/;  
		if(uname.value.match(letters)){
			uname.style.borderColor = "";  
			return true;
		}else{  
			// alert('Username must have alphabet characters only');
			uname.style.borderColor = "red";
			uname.focus();
			return false;  
		}  
	};

	function ValidateEmail(uemail){  
		var mailformat = /\S+@\S+\.\S+/;  
		if(uemail.value.match(mailformat)){
			uemail.style.borderColor = "";  
			return true;
		}else{  
			// alert("You have entered an invalid email address!");  
			uemail.style.borderColor = "red";  
			uemail.focus();  
			return false;  
		}  
	};  

	function passid_validation(passid,mx,my){
	var passid_len = passid.value.length;  
		if (passid_len == 0 ||passid_len >= my || passid_len < mx){  
			// alert("Password should not be empty / length be between "+mx+" to "+my);
			passid.style.borderColor = "red";
			passid.focus();  
			return false;  
		}
		passid.style.borderColor = "";  
		return true;  
	};   



	var signupUser = function(e){
		eventsObj.preventDefault(e);
		var rname = doc.querySelector("#reg_name");
		var remail = doc.querySelector("#reg_email");
		var rpass = doc.querySelector("#reg_pass");
		// var rname_val = rname.value;
		// var remail_val = remail.value;
		// var rpass_val = rpass.value;

		allLetter(rname);
		ValidateEmail(remail);
		passid_validation(rpass, 7, 12);
		console.log("OK");






		// if((rname_val != "") || (remail_val != "") || (rpass_val != "")){
		// 	var pattern = /^[a-zA-Z0-9]{6,20}$/;
		// 	var pattern_email = /\S+@\S+\.\S+/;
		// 	if(rname_val.search(pattern) != 0){
		// 		rname.style.borderColor = "red";
		// 	}else{
		// 		rname.style.borderColor = "";
		// 		if(pattern_email.test(remail_val) != true){
		// 			remail.style.borderColor = "red";
		// 		}else{

		// 			rname.style.borderColor = "";

		// 			remail.style.borderColor = "";
		// 			if(rpass_val.search(pattern) != 0){
		// 				rpass.style.borderColor = "red";
		// 			}else{

		// 				rname.style.borderColor = "";
		// 				remail.style.borderColor = "";

		// 				rpass.style.borderColor = "";
		// 				var xhttp = new XMLHttpRequest();
		// 				// xhttp.open('POST','server.php?rname='+encodeURI(rname_val)+'&rand='+Math.random(),true);
		// 				xhttp.open('POST','server.php?rname='+encodeURI(rname_val)+'&remail='+encodeURI(remail_val)+'&rpass='+encodeURI(rpass_val)+'&rand='+Math.random(),true);
		//                 xhttp.send();
		//                 xhttp.onreadystatechange = function(){
		//                     if (xhttp.readyState==4 && xhttp.status==200) {
		//                     	console.log(xhttp.responseText);
	 //                		}
		// 				}
		// 			}
		// 		}
		// 	}
		// }else{
		// 	rname.style.borderColor = "red";
		// 	remail.style.borderColor = "red";
		// 	rpass.style.borderColor = "red";
		// }








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