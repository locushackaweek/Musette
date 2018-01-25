<?php
$account=$_POST["account-type"];
if ($account=='User')
{
	header('location: ../terms.htm');
}
else
{
	header('location: ../signup-artist.htm');
}
?>