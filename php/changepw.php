<?php
	session_start();
	$username=$_SESSION["username"];
	$directory=$_SESSION["directory"];
	$old=$_POST["Password"];
	$new=$_POST["NewPassword"];
	$server_name="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="musette"; 
	$con=new mysqli($server_name,$db_user,$db_pass,$db_name) or die("Unable to connect");//conection to database
	if (!empty($directory))
	{
		$sql = "SELECT `Username`,`Password` FROM artist";
		$result = $con->query($sql);
		while($row = $result->fetch_assoc())//getting total username in artist
		{
			if ($row['Username']==$username && $row['Password']==$old)
			{
				$sql = "UPDATE artist SET `Password`='$new' WHERE `Password`='$old'";
				if ($con->query($sql) === TRUE)
				{
				header('location: ' . $_SERVER['HTTP_REFERER']);
				}
			}
			if ($row['Username']==$username && $row['Password']!=$old)
			{
				echo "Current Password Mismatched";
			}
		}
	}
	else
	{
		$sql = "SELECT `Username`,`Password` FROM user";
		$result = $con->query($sql);
		while($row = $result->fetch_assoc())//getting total username in artist
		{
			if ($row['Username']==$username && $row['Password']==$old)
			{
				$sql = "UPDATE user SET `Password`='$new' WHERE `Password`='$old'";
				if ($con->query($sql) === TRUE)
				{
				header('location: ' . $_SERVER['HTTP_REFERER']);
				}
			}
			if ($row['Username']==$username && $row['Password']!=$old)
			{
				echo "Current Password Mismatched";
			}
		}
	}
?>