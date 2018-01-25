<?php
  session_start();
  $acc=$_SESSION["username"];
  if (!empty($acc))
  {
    $dir=$_SESSION["directory"];
    if (!empty($dir))
    {
      header('location: artist.php');
      die();
    }
    else
    {
      header('location: loged-user.htm');
      die();
    }
  }
  else
  {
    header('location: main.php');
    die();
  }
?>