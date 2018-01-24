<?php
session_start();
$server_name="localhost";
$db_user="root";
$db_pass="";
$db_name="musette"; 
$con=new mysqli($server_name,$db_user,$db_pass,$db_name) or die("Unable to connect");//conection to database
$uname=$_POST["usrname"];
$pword=$_POST["pwrd"];
$account=$_POST["account-type"];
$error="false";
if ($account==="User")
{
	$sql = 'SELECT Username, Password FROM user';
	$result = $con->query($sql);
	if ($result->num_rows > 0) 
	{
	    // output data of each row
	    while($row = $result->fetch_assoc())
	    {
	        if ($uname==$row["Username"] && $pword==$row["Password"])
	        {
	        	$error="true";
	        	$_SESSION["username"]=$uname;
	        	header('location: ../loged-user.htm');
	    	}
	    }
	}
}
else
{
	$sql = 'SELECT Username, Password FROM artist';
	$result = $con->query($sql);
	$error="false";
	if ($result->num_rows > 0) 
	{
	    // output data of each row
	    while($row = $result->fetch_assoc())
	    {
	        if ($uname==$row["Username"] && $pword==$row["Password"])
	        {
	        	$error="true";
	        	$directory="../upload/video/".$uname;
	        	$_SESSION["directory"]=$directory;
	        	$_SESSION["username"]=$uname;
	        	$_SESSION["pix"]=$uname.".jpg";
	        	header('location: ../artist.php');
	    	}
	    }
	}
}
if($error=="false")
	    {
	   		header('Location: ../login.htm');
	   	}
?>