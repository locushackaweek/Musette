<?php
$server_name="localhost";
$db_user="root";
$db_pass="";
$db_name="musette"; 
$c=0;//counter
$con=new mysqli($server_name,$db_user,$db_pass,$db_name) or die("Unable to connect");//conection to database

$sql = "SELECT `Username` FROM artist";
$result = $con->query($sql);
while($row = $result->fetch_assoc())//getting total username in artist
{
    $username[$c]= $row["Username"];
    $c=$c+1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Video</title>
	<link rel="icon" href="../icon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/video.css">
</head>
<body style="background: #eee;">
	<?php
		for ($i=0; $i < $c; $i++)
		{ 
			$tname=$username[$i];
			$sql = "SELECT `Name`,`URL`,`Embed` FROM $tname";
			$result = $con->query($sql);
			while($row = $result->fetch_assoc())
			{
				if (!empty($row["URL"]))
				{
					echo '<div class="embed-responsive embed-responsive-16by9 vid" style="margin-top:15px;">
				<video controls>
			  		<source src="'.$row["URL"].'" type="video/mp4">
			  	</video></div>';
			  		echo '<blockquote><p align="center" class="text-success">'.$row["Name"].'</p><footer><strong>Uploaded by '.$tname.'</strong></footer></blockquote>';
				}
				else
				{
					echo '<iframe width="560" height="315" src="'.$row["Embed"].'" frameborder="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
					echo '<blockquote><footer><strong>Uploaded by '.$tname.'</strong></footer></blockquote>';
				}

			}
		}
	?>
</body>
</html>