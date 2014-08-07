function Ajax(url, parametros, objetivo, callback){
	url = "include/" + url;
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(parametros);

	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    		if(objetivo == null){
    			callback();
    			return;    		
    		}
			objetivo.innerHTML = xmlhttp.responseText;			
			callback();
    	}
  	}
}

function AjaxF(url, imagen, parametros, objetivo, callback){
	url = "include/" + url;
	var xmlhttp; 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	var formData = new FormData();
      /* Add the file */ 
	formData.append("upload", imagen.files[0]);

	

	xmlhttp.open("post", url + "?" + parametros, true);
	xmlhttp.setRequestHeader("Content-Type", "multipart/form-data");
	xmlhttp.send(formData);  /* Send to server */ 

	xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			if(objetivo == null){
    			callback();
    			return;    		
    		}
			objetivo.innerHTML = xmlhttp.responseText;			
			callback();
    	}
  	}
}