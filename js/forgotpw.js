function checkform()
{
	var uname=document.getElementById('uname').value;
	var email=document.getElementById('email').value;
	var pwrd=document.getElementById('pwrd').value;
	var rpwrd=document.getElementById('rpwrd').value;
	
if (uname=="")
	{
		window.alert("Please! Enter Your Username.");
		return false;
	}
if (email=="")
	{
		window.alert("Please! Enter Your E-mail.");
		return false;
	}

if (pwrd=="")
	{
		window.alert("Please! Enter Password.");
		return false;
	}
if (rpwrd=="")
	{
		window.alert("Please! Re-Enter Password.");
		return false;
	}	
if (rpwrd!=pwrd)
	{
		window.alert("Password Mismatch!!");
		return false;
	}	

}
