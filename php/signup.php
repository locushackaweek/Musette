<?php
$server_name="localhost";
$db_user="root";
$db_pass="";
$db_name="musette"; 
$con=new mysqli($server_name,$db_user,$db_pass,$db_name) or die("Unable to connect");//conection to database
$fname=$_POST["fname"];
$mname=$_POST["mname"];
$lname=$_POST["lname"];
$uname=$_POST["usrname1"];
$pword=$_POST["pwrd1"];
$address=$_POST["address"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$account=$_POST["account"];
$date=$_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
$contact=$_POST["cntct"];

if ($account==="User")
{
	$sql = "INSERT INTO `user`(`S.N`, `First Name`, `Middle Name`, `Last Name`, `Address`, `Contact`, `D.O.B`, `Gender`, `Username`, `Password`, `Email`, `Created Date`) VALUES (NULL, '$fname' ,'$mname','$lname','$address','$contact','$date','$gender','$uname','$pword','$email', CURRENT_TIMESTAMP)";
}
else
{
	$Scontact=$_POST["cntct2"];
	$from=$_POST["from"];
	$to=$_POST["to"];
	$rate=$_POST["rate"];

	$sql = "INSERT INTO `artist`(`S.N`, `First Name`, `Middle Name`, `Last Name`, `Address`, `Contact`, `D.O.B`, `Gender`, `Username`, `Password`, `Email`, `SContact`, `AvailableFrom`, `AvailableTo`, `Rate`, `Created Date`) VALUES (NULL, '$fname' ,'$mname','$lname','$address','$contact','$date','$gender','$uname','$pword','$email','$Scontact','$from','$to','$rate', CURRENT_TIMESTAMP)";
	mkdir("../upload/video/".$uname);

	if ($con->query($sql) === TRUE)
	{
	$sql="CREATE TABLE $uname( `ID` INT NOT NULL AUTO_INCREMENT , `Name` VARCHAR(500) NOT NULL , `URL` VARCHAR(500) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
	}
}
if ($con->query($sql) === TRUE)
{
    header('Location: ../index.php');
}
else
{
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>