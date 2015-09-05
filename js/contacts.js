(function(){
	var doc = document;
	var info_send = doc.querySelector('#info_send');

	var addContact = function(e){
		eventsObj.preventDefault(e);

		var info_name = doc.querySelector('#info_name');
		var info_email = doc.querySelector('#info_email');
		var info_subject = doc.querySelector('#info_subject');
		var info_message = doc.querySelector('#info_message');
		
		var info_name_val = info_name.value;
		var info_email_val = info_email.value;
		var info_subject_val = info_subject.value;
		var info_message_val = info_message.value;

		if((info_name_val != "") || (info_email_val != "") || (info_subject_val != "") || (info_message_val != "")){
			var pattern_info = /^[a-zA-Z]/;
			var pattern_email = /\S+@\S+\.\S+/;
			if(info_name_val.search(pattern_info) != 0){
				alert('Name must have only alphabet characters');
			}else{
				info_name.style.borderColor = "";
				if(pattern_email.test(info_email_val) != true){
					alert("Email is incorrect !"); 
				}else{
					info_email.style.borderColor = "";
					if(info_subject_val.search(pattern_info) != 0){
						alert('Subject must have only alphabet characters');
					}else{
						info_subject.style.borderColor = "";
						if(info_message_val != ""){
							info_message.style.borderColor = "";
							var xhttp_info = new XMLHttpRequest();
							xhttp_info.onreadystatechange = function(){
								if(xhttp_info.readyState==4 && xhttp_info.status==200){
									if(xhttp_info.responseText == "true"){
										swal("Good job!", "We will reply soon =)", "success");
									}else{
										swal("Oops!", "Try again!", "error");
									}
								}
							}
							// Открываем асинхронное соединение
							xhttp_info.open('POST', './include/contacts.php', true);
							// Отправляем кодировку 
							xhttp_info.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
							xhttp_info.send("info_name=" + encodeURIComponent(info_name_val) + "&info_email=" + encodeURIComponent(info_email_val) + "&info_subject=" + encodeURIComponent(info_subject_val) + "&info_message=" + encodeURIComponent(info_message_val) + '&rand='+Math.random());
						}else{
							info_message.style.borderColor = "red";
						}
					}
				}
			}
		}else{
			info_name.style.borderColor = "red";
			info_email.style.borderColor = "red";
			info_subject.style.borderColor = "red";
			info_message.style.borderColor = "red";
		}
	};

	eventsObj.addEvent(info_send, 'click', addContact);  
})();