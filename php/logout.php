<?php
session_start();
unset($_SESSION["username"]); 
unset($_SESSION["directory"]);
header('location: ../index.php');
?>