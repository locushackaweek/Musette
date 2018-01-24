<?php
session_start();
$pix=$_SESSION["pix"];
$vname=$_SESSION["username"];

if (isset($_FILES['profile'])) {
	$name = $_FILES['profile']['name'];
	$size = $_FILES['profile']['size'];
	$max_size = 2097152;
	$type = $_FILES['profile']['type'];
	$extension = strtolower(substr($name, strpos($name, '.') + 1));
	$tmp_name = $_FILES['profile']['tmp_name'];
	if (isset($name))
	{
		if (!empty($name))
		{
			if(($extension == 'jpg') && $type =='image/jpeg')
			{
				if($size<$max_size)
				{
					$location = '../upload/profile/';
					if(move_uploaded_file($tmp_name, $location.$pix))
					{
						echo 'successfully uploaded profile!';
					}
				}
				else
				{
					echo 'File size be must be less than 2MB.';
				}
			}	
			else
				{
						echo 'Image must be jpg.';
				}
			}
		else
		{
			echo 'please! choose a profile picture';
		}
	}
}

if (isset($_FILES['cover'])) {
	$name = $_FILES['cover']['name'];
	$size = $_FILES['cover']['size'];
	$max_size = 2097152;
	$type = $_FILES['cover']['type'];
	$extension = strtolower(substr($name, strpos($name, '.') + 1));
	$tmp_name = $_FILES['cover']['tmp_name'];
	if (isset($name))
	{
		if (!empty($name))
		{
			if(($extension == 'jpg') && $type =='image/jpeg')
			{
				if($size<$max_size)
				{
					$location = '../upload/cover/';
					if(move_uploaded_file($tmp_name, $location.$pix))
					{
						echo 'successfully uploaded cover!';
					}
			}
				else
				{
					echo 'File size be must be less than 2MB.';
				}
			}	
			else
				{
						echo 'Image must be jpg.';
				}
			}
		else
		{
			echo 'please! choose a cover picture';
		}
	}
}

if (isset($_FILES['video'])) {
	$name = $_FILES['video']['name'];
	$size = $_FILES['video']['size'];
	$max_size = 209715200;
	$type = $_FILES['video']['type'];
	$extension = strtolower(substr($name, strpos($name, '.') + 1));
	$tmp_name = $_FILES['video']['tmp_name'];
	if (isset($name))
	{
		if (!empty($name))
		{
			if(($extension == 'mp4') && $type =='video/mp4')
			{
				if($size<$max_size)
				{
					$location = '../upload/video/'.$vname.'/';
					$video=$location.$name;
					if(move_uploaded_file($tmp_name, $video))
					{
						$server_name="localhost";
						$db_user="root";
						$db_pass="";
						$db_name="musette"; 
						$con=new mysqli($server_name,$db_user,$db_pass,$db_name) or die("Unable to connect");//conection to database
						$sql = "INSERT INTO $vname (`Name`, `URL`) VALUES ('$name', '$video')";
						if ($con->query($sql) === TRUE)
						{
							echo 'successfully uploaded video!';
						}
					}
				}
				else
				{
					echo 'File size be must be less than 20MB.';
				}
			}	
			else
				{
					echo 'Video must be mp4';
				}
			}
		else
		{
			echo 'please! choose a Video';
		}
	}
}
?>