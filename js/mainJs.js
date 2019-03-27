  $(document).ready(function() {

  $('#selectTinhTP').change(function() {

    city_id = this.value;

     

 $('#selectDistrict').load('ajax_getdistrict.php?cityId=' + city_id);
 wto = setTimeout(function() {
  
   $('#selectDistrict').material_select('destroy');   
$('#selectDistrict').load('ajax_getdistrict.php?cityId=' + city_id);
$('#selectDistrict').material_select();
$('#selectDistrict').load('ajax_getdistrict.php?cityId=' + city_id);
    
}, 500);
   

  });

 });

$(document).ready(function() {
  $('#selectDistrict').change(function() {  		
		
     getLatLng();
  });
 });
 // find agent

 $(document).ready(function() {

  $('#sbFindAgent').click(function() {

    city_id = document.getElementById("selectTinhTP").value;

	district_id = document.getElementById("selectDistrict").value;

   $('#listAgent').load('findAgentResult.php?cityId=' + city_id + '&districtId='+district_id);

  });

 });

 //search dicstric for city

$(document).ready(function() {

  $('#searchdistric').change(function() {

    var dic_id = this.value;

	var ci_id = document.getElementById('hddcity').value;var uid=document.getElementById('newtxtsession').value;

	var lang=document.getElementById('txtlang').value;

   $('#displayHouse').load('ajax_findcitydistric.php?cityId=' + ci_id+'&diid='+dic_id+"&userid="+uid+"&lang="+lang);

  });

 });

 

 $(document).ready(function() {

  $('#searchdistric').change(function() {	  

    var dic_id = this.value;

	var ci_id = document.getElementById('hddcity').value;

	document.getElementById('hdddis').value=this.value;

   $('#phantrang').load('ajax_phantrang.php?cityId=' + ci_id+'&diid='+dic_id);

  });

 });

 



 



function checkUserEmail(type,value,divmess){	

	var txtexists=document.getElementById('txtalreadyexists').value;	

	$('#'+divmess).load('ajax_checkUserEmail.php?type='+type+'&value='+value+'&lang='+txtexists);

}

 function checkCurrentPass(input){

		$('#messageChangePass').load('checkPass.php?p=' + input); 

	 }

function checkMatchPass(){

		var p1 = document.getElementById("txtNewPassword").value;

		var p2 = document.getElementById("txtRetypeNewPass").value;

		if(p1 == p2)return true;

		else 

			{

				document.getElementById('messageChangePass').innerHTML = 'New password invalid';

				document.getElementById("txtRetypeNewPass").focus();

				

				return false;

			}

		return true;

	}

	

	function enableEditProfile(){

		document.getElementById("txtFullnameEdit").disabled = false;

		document.getElementById("txtEmailEdit").disabled = false;

		document.getElementById("txtPhoneEdit").disabled = false;

		document.getElementById("txtAddressEdit").style.display = "none";

		document.getElementById("selectTinhTP").style.display = "block";

		document.getElementById("selectDistrict").style.display = "block";

		document.getElementById("txtAddress").style.display= "block";

		document.getElementById("btnCancel").style.display= "block";

		document.getElementById("btnSaveProfile").style.display= "block";

		document.getElementById("btnEditProfile").style.display= "none";

		}

	function cancelProcess(){

		document.getElementById("txtFullnameEdit").disabled = true;

		document.getElementById("txtEmailEdit").disabled = true;

		document.getElementById("txtPhoneEdit").disabled = true;

		document.getElementById("txtAddressEdit").style.display = "block";

		document.getElementById("selectTinhTP").style.display = "none";

		document.getElementById("selectDistrict").style.display = "none";

		document.getElementById("txtAddress").style.display= "none";

		document.getElementById("btnCancel").style.display= "none";

		document.getElementById("btnSaveProfile").style.display= "none";

		document.getElementById("btnEditProfile").style.display= "block";

		}

	function checkSubmitChangePass(){

		if(document.getElementById("txtCurrentPassword").value==''){

			document.getElementById('messageChangePass').innerHTML = "<font color='#FF0000'>Please enter current password</font>";

			document.getElementById("txtCurrentPassword").focus();

			return false;

			}

		if(document.getElementById("txtNewPassword").value==''){

			document.getElementById('messageChangePass').innerHTML = "<font color='#FF0000'>Please enter new password</font>";

			document.getElementById("txtNewPassword").focus();

			return false;

			}

		else if(document.getElementById("txtNewPassword").value!=document.getElementById("txtRetypeNewPass").value){

			var temp  = document.getElementById("checkPass").value;

			document.getElementById('messageChangePass').innerHTML = "<font color='#FF0000'>New password no match</font><input type='hidden' id='checkPass' name='checkPass' value='"+temp+"'";

			document.getElementById("txtRetypeNewPass").focus();

			return false;

			}

		alert(document.getElementById("checkPass").value);

		return;

		if(document.getElementById('checkPass').value==1){

			return false

			}

		return true;

		}

		

function ajax_general(){

	var xmlHttp;

		try{

			xmlHttp = new XMLHttpRequest();

			}

	catch(e){

	try{

	xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");

		  }

	catch(e){

	try{

	xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

			  }

	catch(e){

	return false;

	} 

		  } 

	   } 

	return xmlHttp; 

	}

	

function ajax_(url){

	var check = ajax_general();

	if(check){

		check.open("GET", url, true);

		check.onreadystatechange = function() {

		if(check.readyState == 4 && check.status == 200){

			var xmlDocumentc = check.responseXML;

			var fun = xmlDocumentc.getElementsByTagName('method')[0].firstChild.data;

			var respons = xmlDocumentc.getElementsByTagName('result')[0].firstChild.data;

			eval(fun+'(respons,\'\')');

			}

		};

	check.send(null);

	}

else{

	alert("There was a problem retrieving the XML data:\n" + check.statusText);

	}

	}

function setMainImg(response,url){

	if(response != ""){

		if(response == 0){

			alert("page send data error");

			}

		else if(response == 1){

			document.getElementById('txt_err_email').style.color = "#17a81f";

			displayElement('err_email','');

			setValInnerHTML('txt_err_email',getValue('user_allow'));

			}

		else if(response == 2){ 

			displayElement('err_email','');

			setValInnerHTML('txt_err_email',getValue('user_isuse'));

			}

		}

	else{

		ajax_(url);

		}

	}





function calculatorPrice(value)

{	

		

		var el = document.getElementById('selectTime');

		var text = el.options[el.selectedIndex].text;

		var need=document.getElementById('selectNeed').value;

		

	   xmlhttp1=GetXmlHttpObject();   

	   if (xmlhttp1 == null)

	   {

		  alert ("Browser does not support HTTP Request");

		  return;

	   }

	   // g?i file ajaxtinh.php

	   var url = "./include/calculatorPrice.php?price="+value+"&over="+text+"&need="+need;  

	   xmlhttp1.onreadystatechange = showPrice;

	   xmlhttp1.open("GET", url, true);

	   xmlhttp1.send(null);

	

}

function showPrice()

{

   if (xmlhttp1.readyState == 4)

   {

	   

	  var array=xmlhttp1.responseText.split("$");       

	  document.getElementById('divshowprice').innerHTML =array[0];	  

   }

}



function setNewMainImg(str)

{	

	var lang=document.getElementById('txtlang').value;

   xmlhttp1=GetXmlHttpObject();   

   if (xmlhttp1 == null)

   {

      alert ("Browser does not support HTTP Request");

      return;

   }

   // g?i file ajaxtinh.php

   var url = "./include/updateMainImage.php";

   // l?y và + vào ð?a ch? idtinh

   url = url + "?imgid="+str+"&lang="+lang;   

   xmlhttp1.onreadystatechange = showmessage;

   xmlhttp1.open("GET", url, true);

   xmlhttp1.send(null);

}





function showmessage()

{

   if (xmlhttp1.readyState == 4)

   {

	   

	  var array=xmlhttp1.responseText.split("$");       

	  alert(array[0]);

	  

   }

}



function changeImage(imgname)

	 {		

	 document.getElementById('showImage').src="uploads/"+imgname;	 

	 }

function showShortDescription(str)

	 {		

	 document.getElementById('shortDescription').innerHTML=str;	 

	 }

function setBoderSelectedImage(thm)

	 {			 

	 var x=document.getElementById('countid').value;	

	 for(var i=1;i<x;i++){		 

	 	document.getElementById('thm'+i).border='0';

	 }

	 document.getElementById(thm).border='5';	 

	 }

function checkSave()

	{	

		if(document.formSavedHouses.txtsession.value=="none")

		{			

			var cf=confirm('Please login to website');

			if(cf){

				window.location.href="?page=login";return false;

			}

			else return false;			

		}	

		else if(document.formSavedHouses.checksave.value=="1")

		{

		               toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
   Command: toastr["error"]("HOUSE IS ALREADY ON FAVOURITES");	
  

			return false;

		}
    
                   toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
   Command: toastr["success"]("ADDED TO FAVOURITES");	
  

		return true;

	}

function checkSavePer(i)

	{	

	var txtsession=document.getElementById('txtsession'+i).value;

	var txthouseid=document.getElementById('txthouseid'+i).value;

	var savecheck=document.getElementById('savecheck'+i).value;

	var sbSaveHouse=document.getElementById('sbSaveHouse'+i);

	//alert(txtsession+txthouseid+savecheck);

	if(txtsession=="none")

		{				

			var cf=confirm('Please login to website');

			if(cf){

				window.location.href="?page=login";

			}

			

		}	

		else if(savecheck=="1")

		{

			alert("The house is already in use !!!");			

		}

		else {

			sbSaveHouse.disabled=true;

			saveHouse(txtsession,txthouseid);

		}	

		

	}

function saveSearch()

{	

	

	var txtsession=document.getElementById('txtsession1').value;	

	

	var txtcurrentpage=document.getElementById('txtcurrentpage').value;	

	if(txtsession=="none")

		{				

			var cf=confirm('Please login to website');

			if(cf){

				window.location.href="?page=login";

			}			

		}	

		

	else {

		var retVal = prompt(document.getElementById('messsavesearch').value,document.getElementById('messyourdescription').value);

		if(retVal!=null && retVal!='your description here' && retVal!='your description here' && retVal!='' ){		

			

   			saveSearchLink(txtsession,retVal,txtcurrentpage);

		}			

	}

}

function saveSearchLink(userid,description,txtlink){

	xmlhttp1=GetXmlHttpObject();   

   if (xmlhttp1 == null)

   {

      alert ("Browser does not support HTTP Request");

      return;

   }

   

   var url = "./include/saveSearchLinkAjax.php";

   txtlink=txtlink.replace(/&/g, '-');   

   url = url + "?userid="+userid+"&description="+description+"&link="+txtlink; 

  

   xmlhttp1.onreadystatechange = function show(){

		if (xmlhttp1.readyState == 4)

		 {

			 

			var array=xmlhttp1.responseText.split("$");       

			alert(array[0]);

			

		 }

	};

   xmlhttp1.open("GET", url, true);

   xmlhttp1.send(null);

}



function saveHouse(uid,hid)

{	

   xmlhttp1=GetXmlHttpObject();   

   if (xmlhttp1 == null)

   {

      alert ("Browser does not support HTTP Request");

      return;

   }

  

   var url = "./include/saveHouseAjax.php";

   url = url + "?uid="+uid+"&hid="+hid; 

   //xmlhttp1.onreadystatechange = showmessage;

   xmlhttp1.open("GET", url, true);

   xmlhttp1.send(null);

}



function actionGeneralForm(c,value,page)

{

	

	var x=0;

		for (i = 1; i <= c; i++){

			var checkname='checkname'+i;			

			if(document.getElementById(checkname).checked == true) x++ ;

		}

	var txtsession=document.getElementById('txtsession1').value;

	if(txtsession=="none")

		{			

			var cf=confirm(document.getElementById('messstilnologin').value); 

			if(cf) {

				window.location.href="?page=login";

			}	

		}

	else 	

	if(x==0) {alert(document.getElementById('messchoosenot').value); return false;}

	else {

		if(value=='save'){ 

			var cf=confirm(document.getElementById('messsaveall').value);

			if(cf) {

				var cityid="";

				if(page=="listDistrict") cityid="&id="+document.getElementById('hddcity').value;

				document.formSbSearch.action ="?page="+page+"&sbSearch=sbSearch&save=true"+cityid;

				document.forms["formSbSearch"].submit();				

			}

		}			

		if(value=='share'){ 

			var cf=confirm(document.getElementById('messshareall').value);

			if(cf) {				

				document.formSbSearch.action ="?page=shareHouse&share=true";

				document.forms["formSbSearch"].submit();				

			}

		}

	}

}

function actionGeneralFormRent(c,value,page)

{

	

	var x=0;

		for (i = 1; i <= c; i++){

			var checkname='checkname'+i;			

			if(document.getElementById(checkname).checked == true) x++ ;

		}

	var txtsession=document.getElementById('txtsession1').value;

	if(txtsession=="none")

		{			

			var cf=confirm(document.getElementById('messstilnologin').value); 

			if(cf) {

				window.location.href="?page=login";

			}	

		}

	else 	

	if(x==0) {alert(document.getElementById('messchoosenot').value); return false;}

	else {

		if(value=='save'){ 

			var cf=confirm(document.getElementById('messsaveall').value);

			if(cf) {

				document.formSbSearch.action =document.getElementById('txtcurrentpagesave').value

				document.forms["formSbSearch"].submit();				

			}

		}			

		

	}

}

function get_posLeft(element){ 

	xPos = document.getElementById(element).offsetLeft;

	tempEl = document.getElementById(element).offsetParent;

	while (tempEl != null){

		xPos += tempEl.offsetLeft;

		tempEl = tempEl.offsetParent;

		}

	return xPos;

}



function get_posTop(element)

{ 

	yPos = document.getElementById(element).offsetTop;

	tempEl = document.getElementById(element).offsetParent;

	while (tempEl != null)

		{

			yPos += tempEl.offsetTop;

			tempEl = tempEl.offsetParent;

		}

	return yPos;

}



 function thongbaoxy(id,tid,imgid){

var w = document.getElementById(imgid).width;

var x = get_posLeft(id);

var y = get_posTop(id);

var tt = parseInt(parseInt(x,10)+parseInt(w,10),10);

document.getElementById(tid).style.top = y - 60 +'px';

document.getElementById(tid).style.left = tt + 10 +'px';

document.getElementById(tid).style.display = "block";

document.getElementById(tid).style.zIndex = "15";

}

function hiddentooltip(tid){

	document.getElementById(tid).style.display = "none";

	}	



function checkRegister()

	{	

		 var rs=true;

		if(document.formRegister.txtUsername.value=="")

		{			


			document.getElementById('mess_user').style.display="block";

			 rs=false;

		}

		else {document.getElementById('mess_user').style.display="none";}

		

		if(document.formRegister.txtPassword.value=="")

		{			

			document.getElementById('mess_pass').style.display="block";

			rs=false;

		}			

		else document.getElementById('mess_pass').style.display="none";

		if(document.formRegister.txtRetypePassword.value=="")

		{			

			document.getElementById('mess_repass1').style.display="block";

			rs=false;

		}		

		else if(document.formRegister.txtRetypePassword.value!=document.formRegister.txtPassword.value)

		{

			document.getElementById('mess_repass1').style.display="none";

			document.getElementById('mess_repass2').style.display="block";

			rs=false;

		}

		else {document.getElementById('mess_repass2').style.display="none";}

		if(document.formRegister.txtFullname.value=="")

		{			

			document.getElementById('mess_name').style.display="block";

			rs=false;

		}	

		else document.getElementById('mess_name').style.display="none";

		

		var email=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;		

		if(document.formRegister.txtEmail.value=="")

		{			

			

			document.getElementById('mess_email1').style.display="block";

			rs=false;

		}

		else if(!document.formRegister.txtEmail.value.match(email))

		{

			document.getElementById('mess_email1').style.display="none";

			document.getElementById('mess_email2').style.display="block";	

			rs=false;

		}	

		else {document.getElementById('mess_email2').style.display="none";	}

		var resdt=/^[0][0-9]{9,11}$/ ; //phone number valid

		if(document.formRegister.txtPhoneNumber.value=="")

		{			

			document.getElementById('mess_phone1').style.display="block";	

			rs=false;

		}			

		else if(!document.formRegister.txtPhoneNumber.value.match(resdt))

			{

				document.getElementById('mess_phone1').style.display="none";

				document.getElementById('mess_phone2').style.display="block";		

				rs=false;

			}else {document.getElementById('mess_phone2').style.display="none";		}

			

		if(document.formRegister.selectTinhTP.value==0)

		{			

			

			document.getElementById('mess_city').style.display="block";

			rs=false;

		}

		else if(document.formRegister.selectDistrict.value==0)

		{			

			document.getElementById('mess_city').style.display="none";

			document.getElementById('mess_district').style.display="block";

			rs=false;

		}else {document.getElementById('mess_district').style.display="none";}

		if(document.formRegister.address.value=="")

		{			

			

			document.getElementById('mess_address').style.display="block";

			rs=false;

		}

		else document.getElementById('mess_address').style.display="none";

		if(document.formRegister.captcha.value=="")

		{			

			

			document.getElementById('mess_captcha').style.display="block";

			rs=false;

		}				

		else document.getElementById('mess_captcha').style.display="none";

		

		return rs;

	}


function showGoogleMap(latitude,longitude,address,mapcanvas){

		var lat= document.getElementById(latitude).value;

		var lng= document.getElementById(longitude).value;

		var fulladdress=document.getElementById(address).value;

		var myLatLng = new google.maps.LatLng(lat,lng);  

		var marker;

		var map;

		var image = 'img/redmarker40.png';

		var mapOptions = {

		  zoom:15,

		  mapTypeId: google.maps.MapTypeId.ROADMAP,

		  center:myLatLng

		};

		map = new google.maps.Map(document.getElementById(mapcanvas),mapOptions);

		

		marker = new google.maps.Marker({

			  map:map,			  

			  animation: google.maps.Animation.DROP,

			  position: myLatLng,

			  icon: image

		});   

		var infowindow = new google.maps.InfoWindow({

				content: fulladdress,

				position: myLatLng

			});

		infowindow.open(map);

	}



function isNumberKey(evt)

      {

         var charCode = (evt.which) ? evt.which : event.keyCode

         if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;

         return true;

      }

function maxLenght(id,total)

      {

		  var n=document.getElementById(id).value.length;      

		   

         if (n>total){

            return false;}

         return true;

      }

	  

	  

function trycaptcha()

{	

	xmlhttp1=GetXmlHttpObject(); 

   if (xmlhttp1 == null)

   {

      alert ("Browser does not support HTTP Request");

      return;

   }

   // g?i file ajaxtinh.php

   var url = "./ajax_captcha.php";

   // l?y và + vào ð?a ch? idtinh

   

   xmlhttp1.onreadystatechange =function showmessage999(){

	   if (xmlhttp1.readyState == 4)

		 {

			 

			var array=xmlhttp1.responseText.split("$");       

			document.getElementById('currentcaptcha').value=array[0];

			

		 }

   };

	   

   xmlhttp1.open("GET", url, true);

   xmlhttp1.send(null);

}

function GetXmlHttpObject()

{

   if (window.XMLHttpRequest)

   {

      // code for IE7+, Firefox, Chrome, Opera, Safari

      return new XMLHttpRequest();

   }

   if (window.ActiveXObject)

   {

      // code for IE6, IE5

      return new ActiveXObject("Microsoft.XMLHTTP");

   }

   return null;

}

function checkEmail(str){

	

	var email=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	return str.match(email);

}



function checkPhoneNumber(str){

	var resdt=/^[0][0-9]{9,11}$/ ;

	return str.match(resdt);

}

$(function(){$.fn.scrollToTop=function(){$(this).hide().removeAttr("href");if($(window).scrollTop()!="0"){$(this).fadeIn("slow")}var scrollDiv=$(this);$(window).scroll(function(){if($(window).scrollTop()=="0"){$(scrollDiv).fadeOut("slow")}else{$(scrollDiv).fadeIn("slow")}});$(this).click(function(){$("html, body").animate({scrollTop:0},"slow")})}});
$(function() {
$("#gotop").scrollToTop();
});