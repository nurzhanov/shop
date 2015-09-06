(function(){
    var doc = document,
        login_button = doc.querySelector("#login"),
        signup_button = doc.querySelector("#signup"),
        info_send = doc.querySelector('#info_send'),
        logout = doc.querySelector("#logout"),
        order_next = doc.querySelector("#order_next");

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
                xhttp_log.send("login=" + encodeURIComponent(lname_val) + 
                               "&pass=" + encodeURIComponent(lpass_val) + 
                               "&rememberme=" + encodeURIComponent(auth_rememberme) + 
                               "&rand="+Math.random());            
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

    var addContact = function(e){
        eventsObj.preventDefault(e);
        var info_name = doc.querySelector('#info_name'),
            info_email = doc.querySelector('#info_email'),
            info_subject = doc.querySelector('#info_subject'),
            info_message = doc.querySelector('#info_message'),
            info_name_val = info_name.value,
            info_email_val = info_email.value,
            info_subject_val = info_subject.value,
            info_message_val = info_message.value;

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
                                        swal("Good job!", "We will write to you as soon", "success");
                                    }else{
                                        swal("Oops!", "Try again!", "error");
                                    }
                                }
                            }
                            // Открываем асинхронное соединение
                            xhttp_info.open('POST', './include/contacts.php', true);
                            // Отправляем кодировку 
                            xhttp_info.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhttp_info.send("info_name=" + encodeURIComponent(info_name_val) + 
                                            "&info_email=" + encodeURIComponent(info_email_val) + 
                                            "&info_subject=" + encodeURIComponent(info_subject_val) + 
                                            "&info_message=" + encodeURIComponent(info_message_val) + 
                                            "&rand="+Math.random());
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

    var logoutFromAccount = function(e){
        eventsObj.preventDefault(e);
        var xhttp_logout = new XMLHttpRequest();
        xhttp_logout.onreadystatechange = function(){
            if(xhttp_logout.readyState==4 && xhttp_logout.status==200){
                if(xhttp_logout.responseText === "logout"){
                    window.location.href = "index.php";
                }
            }
        }
        xhttp_logout.open('POST', './include/logout.php', true);
        xhttp_logout.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp_logout.send("rand="+Math.random());
    };

    var checkOrderInfo = function(e){
        eventsObj.preventDefault(e);
        var order_comment = doc.querySelector('#order_comment'),
            order_comment_val = order_comment.value;

            if(order_comment_val != ""){
                var xhttp_comment = new XMLHttpRequest();
                    xhttp_comment.onreadystatechange = function(){
                        if(xhttp_comment.readyState==4 && xhttp_comment.status==200){
                            if(xhttp_comment.responseText === "comment_true"){
                                window.location.href = "cart.php?action=completion";
                            }
                        }
                    }
                    xhttp_comment.open('POST', './include/check_order.php', true);
                    xhttp_comment.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhttp_comment.send("&note=" + encodeURIComponent(order_comment_val) +
                                       "&rand="+Math.random());
            }

        var order_surname = doc.querySelector('#order_surname'),
            order_email = doc.querySelector('#order_email'),
            order_phone = doc.querySelector('#order_phone'),
            order_address = doc.querySelector('#order_address'),
            order_surname_val = order_surname.value,
            order_email_val = order_email.value,
            order_phone_val = order_phone.value,
            order_address_val = order_address.value,
            check = /^[a-zA-Z]/,
            check_phone = /^[0-9]{10}/,
            check_email = /\S+@\S+\.\S+/;

            if((order_surname_val != "") || (order_email_val != "") || (order_phone_val != "") || (order_address_val != "")){
                if(order_surname_val.search(check) != 0){
                    // error_login.innerHTML = "Only characters or digits!";
                    order_surname.style.borderColor = "#BF5252";
                    order_surname.style.backgroundColor = "#F2C9C9";
                }else{
                    // error_login.innerHTML = "";
                    order_surname.style.borderColor = "#cdd2d4";
                    order_surname.style.backgroundColor = "#edeff0";
                    if(check_email.test(order_email_val) != true){
                        order_email.style.borderColor = "#BF5252";
                        order_email.style.backgroundColor = "#F2C9C9"; 
                    }else{
                        order_email.style.borderColor = "#cdd2d4";
                        order_email.style.backgroundColor = "#edeff0";
                        if(order_phone_val.search(check_phone) != 0){
                            order_phone.style.borderColor = "#BF5252";
                            order_phone.style.backgroundColor = "#F2C9C9";
                        }else{
                            order_phone.style.borderColor = "#cdd2d4";
                            order_phone.style.backgroundColor = "#edeff0";
                            if(order_address_val.search(check) != 0){
                                order_address.style.borderColor = "#BF5252";
                                order_address.style.backgroundColor = "#F2C9C9";
                            }else{
                                order_address.style.borderColor = "#cdd2d4";
                                order_address.style.backgroundColor = "#edeff0";
                                var xhttp_order = new XMLHttpRequest();
                                xhttp_order.onreadystatechange = function(){
                                    if(xhttp_order.readyState==4 && xhttp_order.status==200){
                                        if(xhttp_order.responseText === "order_true"){
                                            window.location.href = "cart.php?action=completion";
                                        }
                                    }
                                }
                                xhttp_order.open('POST', './include/check_order.php', true);
                                xhttp_order.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                xhttp_order.send("&surname=" + encodeURIComponent(order_surname_val) +
                                                 "&email=" + encodeURIComponent(order_email_val) + 
                                                 "&phone=" + encodeURIComponent(order_phone_val) +                                                 
                                                 "&address=" + encodeURIComponent(order_address_val) +
                                                 "&comment=" + encodeURIComponent(order_comment_val) +  
                                                 "&rand="+Math.random());
                            }
                        }
                    }
                }
            }else{
                order_surname.style.borderColor = "#BF5252";
                order_surname.style.backgroundColor = "#F2C9C9";
                order_email.style.borderColor = "#BF5252";
                order_email.style.backgroundColor = "#F2C9C9";
                order_phone.style.borderColor = "#BF5252";
                order_phone.style.backgroundColor = "#F2C9C9";
                order_address.style.borderColor = "#BF5252";
                order_address.style.backgroundColor = "#F2C9C9"; 
            }
    };

    if(login_button != null){
        eventsObj.addEvent(login_button, 'click', loginUser); 
    }
    if(signup_button != null){
        eventsObj.addEvent(signup_button, 'click', signupUser);  
    } 
    if(info_send != null){
        eventsObj.addEvent(info_send, 'click', addContact);  
    } 
    if(logout != null){
        eventsObj.addEvent(logout, 'click', logoutFromAccount);
    }
    if(order_next != null){
        eventsObj.addEvent(order_next, 'click', checkOrderInfo);
    }

})();