function login(){
if(document.getElementById("Register")){document.getElementById("Register").style.display="none";}
if(document.getElementById("forgot-password")){document.getElementById("forgot-password").style.display="none";}
if(document.getElementById("login")){document.getElementById("login").style.display="block";}
}
function Register(){
if(document.getElementById("login")){document.getElementById("login").style.display="none";}
if(document.getElementById("forgot-password")){document.getElementById("forgot-password").style.display="none";}
if(document.getElementById("Register")){document.getElementById("Register").style.display="block";}
}
function forgotpassword(){
if(document.getElementById("login")){document.getElementById("login").style.display="none";}
if(document.getElementById("Register")){document.getElementById("Register").style.display="none";}
if(document.getElementById("forgot-password")){document.getElementById("forgot-password").style.display="block";}
}

/*********************API*************************/
var inputLastID=0;var method = "";var baseurl ="";var url = new Array();var parameters = "";
var formdata = new FormData();
function getInputFields(data){
var count = data.value;
var selectText = data.options[data.selectedIndex];
var fieldstable=document.getElementById("fields");
var fieldsdata=document.getElementById("fieldsdata");
var Header=document.getElementById("Header");
var Response=document.getElementById("Response");
var query=document.getElementById("query");
query.value=""+selectText.text;
if(selectText.value==1){
document.getElementById("base-url").innerHTML=SERVER_URL;
}else if(selectText.value==2){
document.getElementById("base-url").innerHTML=SERVER_VIDEO_URL;
}
Header.innerHTML="";
Response.innerHTML="";
document.getElementById('GET').checked=false;
document.getElementById('POST').checked=false;
var addmore=document.getElementById("addmore");
var addimages=document.getElementById("addimages");
document.getElementById("GET").disabled = true;
document.getElementById("POST").disabled = true;
fieldstable.style.display = "none";
addmore.style.display = "none";
addimages.style.display = "none";
inputLastID=0;
while (fieldsdata.hasChildNodes()) {
fieldsdata.removeChild(fieldsdata.lastChild);
}
if(count>0){
document.getElementById("GET").disabled = false;
document.getElementById("getlabel").style.opacity = "1";
document.getElementById("POST").disabled = false;
document.getElementById("postlabel").style.opacity = "1";
	/* for(var i=1;i<=1;i++){
        var key = document.createElement("input");
        key.type = "text";key.name = "key" + i;key.id = "key" + i;
        var value = document.createElement("input");
        value.type = "text";value.name = "value" + i;value.id = "value" + i;
        var td = document.createElement("td");
        td.id = "td" + i;
        var tr = document.createElement("tr");
        tr.id = "tr" + i;
        fieldstable.style.display = "block";
        addmore.style.display = "block";
        addimages.style.display = "block";
        fieldsdata.appendChild(tr);
		document.getElementById("tr" + i).appendChild(td);
		document.getElementById("td" + i).appendChild(key);
		document.getElementById("td" + i).appendChild(value);
		inputLastID++;
	} */
        fieldstable.style.display = "block";
        addmore.style.display = "block";
        addimages.style.display = "block";
}
}
function addFields(){
		inputLastID++;
var fieldsdata=document.getElementById("fieldsdata");

        var key = document.createElement("input");
        key.type = "text";key.name = "key" + inputLastID;key.id = "key" + inputLastID;
        var value = document.createElement("input");
        value.type = "text";value.name = "value" + inputLastID;value.id = "value" + inputLastID;
        var td = document.createElement("td");
        td.id = "td" + inputLastID;
        var tr = document.createElement("tr");
        tr.id = "tr" + inputLastID;
        fieldsdata.appendChild(tr);
		document.getElementById("tr" + inputLastID).appendChild(td);
		document.getElementById("td" + inputLastID).appendChild(key);
		document.getElementById("td" + inputLastID).appendChild(value);
}
function addImageFields(){
		inputLastID++;
var fieldsdata=document.getElementById("fieldsdata");

        var key = document.createElement("input");
        key.type = "text";key.name = "key" + inputLastID;key.id = "key" + inputLastID;
        var value = document.createElement("input");
        value.type = "file";value.name = "value" + inputLastID;value.id = "image" + inputLastID;
        var td = document.createElement("td");
        td.id = "td" + inputLastID;
        var tr = document.createElement("tr");
        tr.id = "tr" + inputLastID;
        fieldsdata.appendChild(tr);
		document.getElementById("tr" + inputLastID).appendChild(td);
		document.getElementById("td" + inputLastID).appendChild(key);
		document.getElementById("td" + inputLastID).appendChild(value);
}
function makeQuery(){
var sort=document.getElementById("sort");
if(sort.value==''){
alert("Please Select URL Field");
}else if(sort.value!=''){
var selectText = sort.options[sort.selectedIndex].text;
if (document.getElementById('GET').checked) {
  method = document.getElementById('GET').value;
}
else if (document.getElementById('POST').checked) {
  method = document.getElementById('POST').value;
}
if(method==''){
  alert("Please select Check Method Type");
}
var fieldsdata=document.getElementById("fieldsdata");
var count = fieldsdata.getElementsByTagName('input').length;
var key="";var value="";var pair="";var params="";
for(var i=1;i<=count/2;i++){
if(i==1){
key = document.getElementById('key'+i).value;
if(document.getElementById('value'+i)){value = document.getElementById('value'+i).value;}
else if(document.getElementById('image'+i)){
value = document.getElementById('image'+i).files[0];
}
 formdata.append(key, value);
if(key!='')pair = key + "=" + value;
}
else if(i>1){
key = document.getElementById('key'+i).value;
if(document.getElementById('value'+i)){value = document.getElementById('value'+i).value;}
else if(document.getElementById('image'+i)){
value = document.getElementById('image'+i).files[0];
}
 formdata.append(key, value);
if(key!='')pair =  '&'+key + "=" + value;
}
params += pair;
}
baseurl=document.getElementById("base-url").innerHTML;
var url = selectText;
var token = document.getElementById('token').innerHTML;
if(params=='')
parameters = 'token='+token;
if(params!='')
parameters = 'token='+token+'&'+params;
getResponse(baseurl,url,method,parameters,token);
}
}
/* function getResponse(baseurl,url,parameters,method)
{
          if (window.XMLHttpRequest)
            {
                xmlhttp=new XMLHttpRequest();
            }
            else
            {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4) 
                {
					var status = xmlhttp.status+" "+HTTP_STATUS_CODES[xmlhttp.status];
					var responsemethod = xmlhttp.getResponseHeader ("Method");
					var host = xmlhttp.getResponseHeader ("HOST");
					var contentType = xmlhttp.getResponseHeader ("Content-Type");
					var contentLength = xmlhttp.getResponseHeader ("Content-Length");
					if(method=='GET'){ var link = baseurl+url+'?'+parameters; }
					else if(method=='POST'){ var link = baseurl+url; }
					var response = xmlhttp.responseText;
					
					testbodycontent(status,responsemethod,host,contentType,contentLength,link,response);
                }
            }
            if(method=='GET'){ 
            xmlhttp.open(method,baseurl+url+'?'+parameters,true);
            xmlhttp.send();
			}
			else if(method=='POST'){
            xmlhttp.open(method,baseurl+url,true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(parameters);
			}
}
 */
/**********************************Server Request & Response*******************************/


function _(elementID)
             {
             return document.getElementById(elementID);
             }
function getResponse(baseurl,url,method,parameters,token)
              {
			  // var formdata = new FormData();
				// formdata.append("token", token);
			  // var data = {};
			/*  var data = new Array();
			 data[0] = "201603291459260294815788164";
			  data[1] = "1780864628808031";
			  data[2] = "20160329145926204624371421"; */
              /*var file = _("image1").files[0];
              formdata.append("file", file);*/
			 /*  console.log(JSON.stringify(data));
              formdata.append("receiverid", JSON.stringify(data)); */
              var ajax = new XMLHttpRequest();
             ajax.upload.addEventListener("progress", myProgressHandler, false);
              ajax.addEventListener("load", myCompleteHandler, false);
              ajax.addEventListener("error", myErrorHandler, false);
              ajax.addEventListener("abort", myAbortHandler, false);
			if(method=='GET'){ 
				ajax.open(method,baseurl+url+'?'+parameters,true);
				ajax.send();
			}
			else if(method=='POST'){
				/* ajax.open(method,baseurl+url,true);
				ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				ajax.send(formdata); */				
              ajax.open(method, baseurl+url+"?token="+token); ajax.send(formdata);
			}
              // ajax.open(method, baseurl+url+"?token="+token); ajax.send(formdata);
              }
function myProgressHandler(event)
         {
            _("loaded_n_total").style.display = "block";
            _("progressBar").style.display = "block";
            _("loaded_n_total").innerHTML =
                     "Uploaded "+event.loaded+" bytes of "+event.total;
                      var percent = (event.loaded / event.total) * 100;
           _("progressBar").value = Math.round(percent);
           // _("status").innerHTML = Math.round(percent)+"% uploaded...please wait"; 
         }
function myCompleteHandler(event)
         {
            // _("status").innerHTML = event.target.responseText;
           _("progressBar").value = 0; 
            _("loaded_n_total").style.display = "none";
            _("progressBar").style.display = "none";
		   xmlhttp=event.target;
			var status = xmlhttp.status+" "+HTTP_STATUS_CODES[xmlhttp.status];
			var responsemethod = xmlhttp.getResponseHeader ("Method");
			var host = xmlhttp.getResponseHeader ("HOST");
			var contentType = xmlhttp.getResponseHeader ("Content-Type");
			var contentLength = xmlhttp.getResponseHeader ("Content-Length");
			if(method=='GET'){ var link = baseurl+url; }
			else if(method=='POST'){ var link = baseurl+url; }
			var response = xmlhttp.responseText;
			console.log(xmlhttp.responseText);
			testbodycontent(status,responsemethod,host,contentType,contentLength,link,response);
          }
function myErrorHandler(event)
          {
           /* _("status").innerHTML = "Upload Failed"; */
            _("loaded_n_total").style.display = "none";
            _("progressBar").style.display = "none";
          }
function myAbortHandler(event)
          {
          /* _("status").innerHTML = "Upload Aborted"; */
            _("loaded_n_total").style.display = "none";
            _("progressBar").style.display = "none";
          }