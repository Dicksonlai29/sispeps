<?php
session_start();

if(!isset($_SESSION['idpengguna'])){
    //if it's not log in, redirect to here
    header('Location: index.php');
    exit();
}
?>