<?php
session_start();
$vname=$_SESSION["username"];
$embed=$_POST['embed'];

if (!empty($embed))
{
	$server_name="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="musette"; 
	$con=new mysqli($server_name,$db_user,$db_pass,$db_name) or die("Unable to connect");//conection to database
	$sql = "INSERT INTO $vname (`Embed`) VALUES ('$embed')";
	if ($con->query($sql) === TRUE)
	{
		header('location: ../artist.php');
	}
}
?>