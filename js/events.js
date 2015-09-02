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

/* Данная функция создаёт кроссбраузерный объект XMLHTTP */
// var getXmlHttp = function(){
//  var xmlhttp;
//  try {
//      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//  }catch (e) {
//      try {
//          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//      }catch (E) {
//          xmlhttp = false;
//      }
//  }
//  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
//      xmlhttp = new XMLHttpRequest();
//  }
//  return xmlhttp;
// };

	