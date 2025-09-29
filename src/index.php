<?php
//Main webpage of the website
//connect to database
require 'sambung.php';
//header 
include 'header.php';

?>

<html>
    <body class="index">
        <header><?php include 'menu1.php';?>
            
            <!-- size in font tag 1=8px, every consecutive size add 4px to the previous size-->
            <!--<center><p><font face="HelveticaNeue" color="orange" size=2>testing b</font></p></center>-->
        </header>
        <div class="page">
            <div class="negative-space">
            
            </div>
            <div class="index-content">
                <h1 class="tajuk"><?= $motto?></h1>
                <br>
                <marquee behavior="alternate" direction="left">SOALAN TERKINI</marquee>
                <br>
                <?php include 'soalan_terkini.php'; ?>
                <br>
                <a class="btn" href="login.php">Masuk</a>
            </div>
        </div>  
        <?php include "footer.php";?>
    </body>
</html>
