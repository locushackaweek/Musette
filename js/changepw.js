function checkform()
{
	var pwrd=document.getElementById('pwrd').value;
	var npwrd=document.getElementById('npwrd').value;
	var rpwrd=document.getElementById('rpwrd').value;

if (pwrd=="") 
{
	window.alert("Please Enter Your Current Password.");
	return false;
}
if (npwrd=="") 
{
	window.alert("Please Enter Your New Password.");
	return false;
}	
if (rpwrd=="") 
{
	window.alert("Please Re-Enter Your New Password.");
	return false;
}	
if (rpwrd!=npwrd) 
{
	window.alert("Passwords Mismatch.");
	return false;
}		

}