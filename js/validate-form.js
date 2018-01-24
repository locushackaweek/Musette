function checklogin()
{
	var usrname=document.getElementById('usrname').value;
	var pwrd=document.getElementById('pwrd').value;
	if(usrname=="")
	{
		window.alert("Please! Enter your Username");
		return false;
	}
	if(pwrd=="")
	{
		window.alert("Please! Enter your Password");
		return false;
	}
}
function checksignupuser()
{
	var fname=document.getElementById('fname').value;
	var mname=document.getElementById('mname').value;
	var lname=document.getElementById('lname').value;
	var usrname1=document.getElementById('usrname1').value;
	var pwrd1=document.getElementById('pwrd1').value;
	var rpwrd=document.getElementById('rpwrd').value;
	var address=document.getElementById('address').value;
	var email=document.getElementById('email').value;
	var cntct=document.getElementById('cntct').value;

	if (fname=="")
	{
		window.alert("Please! Enter your First name");
		return false;
	}

	if (lname=="")
	{
		window.alert("Please! Enter your Last name");
		return false;
	}

	if (usrname1=="")
	{
		window.alert("Please! Enter your Username");
		return false;
	}

	if (pwrd1=="")
	{
		window.alert("Please! Enter your Password");
		return false;
	}

	if (rpwrd=="")
	{
		window.alert("Please! Re-Enter your Password");
		return false;
	}
	else if (rpwrd!=pwrd1)
	{
		window.alert("Password mismatched");
		return false;
	}

	if (address=="")
	{
		window.alert("Please! Enter your Address");
		return false;
	}

	if (email=="")
	{
		window.alert("Please! Enter your Email");
		return false;
	}

	if (cntct=="")
	{
		window.alert("Please! Enter your Contact");
		return false;
	}

}

function checksignupartist()
{
	var fname=document.getElementById('fname').value;
	var mname=document.getElementById('mname').value;
	var lname=document.getElementById('lname').value;
	var usrname1=document.getElementById('usrname1').value;
	var pwrd1=document.getElementById('pwrd1').value;
	var rpwrd=document.getElementById('rpwrd').value;
	var address=document.getElementById('address').value;
	var email=document.getElementById('email').value;
	var cntct=document.getElementById('cntct').value;

	var cntct2=document.getElementById('cntct2').value;
	var from=document.getElementById('from').value;
	var to=document.getElementById('to').value;
	var rate=document.getElementById('rate').value;
	var sun=document.getElementById('sun').checked;
	var mon=document.getElementById('mon').checked;
	var tue=document.getElementById('tue').checked;	
	var wed=document.getElementById('wed').checked;
	var thu=document.getElementById('thu').checked;
	var fri=document.getElementById('fri').checked;
	var sat=document.getElementById('sat').checked;
	if (fname=="")
	{
		window.alert("Please! Enter your First name");
		return false;
	}

	if (lname=="")
	{
		window.alert("Please! Enter your Last name");
		return false;
	}

	if (usrname1=="")
	{
		window.alert("Please! Enter your Username");
		return false;
	}

	if (pwrd1=="")
	{
		window.alert("Please! Enter your Password");
		return false;
	}

	if (rpwrd=="")
	{
		window.alert("Please! Re-Enter your Password");
		return false;
	}
	else if (rpwrd!=pwrd1)
	{
		window.alert("Password mismatched");
		return false;
	}

	if (address=="")
	{
		window.alert("Please! Enter your Address");
		return false;
	}

	if (email=="")
	{
		window.alert("Please! Enter your Email");
		return false;
	}

	if (cntct=="")
	{
		window.alert("Please! Enter your Contact");
		return false;
	}
	if (cntct2=="")
	{
		window.alert("Please! Enter Your Seconday Contact");
		return false;
	}
	if (from=="From")
	{
		window.alert("Please! Select Time(From)");
		return false;
	}

	if (to=="To")
	{
		window.alert("Please! Select Time(To)");
		return false;
	}
	if (sun==false && mon==false && tue==false && wed==false && thu==false && fri==false && sat==false)
	{
		window.alert("Please! Enter Your Available Days.");
		return false;
	}	
	if (rate=="")
	{
		window.alert("Please! Enter Your Rate Per Hour");
		return false;
	}	
}
