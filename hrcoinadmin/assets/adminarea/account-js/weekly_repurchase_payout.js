var xmlHttp889;

//////////////////////////

function datewise_repurchasepayout(id){
	
	var newurlarray = id.split(' ');
	var id = newurlarray[0]+'_'+newurlarray[1];	

document.getElementById("datewiserepurchasepayout").innerHTML="<img src='http://www.adways.biz/assets/frontarea/images/loading.gif' width='20' height='20' > Loading.......";  

xmlHttp889=GetXmlHttpObject()

if (xmlHttp889==null)

  {

  alert ("Your browser does not support AJAX!");

  return;

  } 

var url="datewise_repurchasepayout_details";

//id="'"+id+"'";
if(id =="")
id="--";
//alert (id);

url=url+"/"+id;				

//url=url+"&sid="+Math.random();

//alert (url);

xmlHttp889.onreadystatechange=stateChangedE889;

xmlHttp889.open("GET",url,true);

xmlHttp889.send(null);

}

function stateChangedE889() 

{ 

if (xmlHttp889.readyState==4)

document.getElementById("datewiserepurchasepayout").innerHTML=xmlHttp889.responseText;

}

///////////////////

function GetXmlHttpObject()

{

var xmlHttp889=null;

try

  {

  // Firefox, Opera 8.0+, Safari

  xmlHttp889=new XMLHttpRequest();

  }

catch (e)

  {

  // Internet Explorer

  try

    {

    xmlHttp889=new ActiveXObject("Msxml2.XMLHTTP");

    }

  catch (e)

    {

    xmlHttp889=new ActiveXObject("Microsoft.XMLHTTP");

    }

  }

return xmlHttp889;

}