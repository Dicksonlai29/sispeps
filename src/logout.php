<?php
//Quit the Login interface
session_start();
session_destroy();
$_SESSION=array();
//redirect to main page
header("Location: index.php");
?>