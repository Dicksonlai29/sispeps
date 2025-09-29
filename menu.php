<html>
<head>
    
</head>
<body>
<?php
if ($_SESSION['level']==="ADMIN"){
?>
<div class="menu">
<!--Admin interface-->
<h1 class="sign"> SISPEPS </h1>
<nav style="text-align: center;">
        <ul>
                <li><a href="index2.php">Home</a></li>
                <li><a href="subjek_senarai.php">Senarai Subjek</a></li>
                <li><a href="guru_senarai.php">Senarai Guru</a></li>
                <li><a href="pelajar_senarai.php">Senarai Pelajar</a></li>
                <li><a href="laporan_statistik.php">Statistik</a></li>
                <li><a href="logout.php">Log Keluar</a></li>
        </ul>
</nav>
<?php include 'utility.php';?>
<br>
</div>
<?php $pengguna="DASHBOARD ADMIN"; ?>
<?php 
}elseif ($_SESSION['level']==="GURU"){ 
?>
<!--Guru interface-->
<div class="menu">
<h1 class="sign"> SISPEPS </h1>
<nav style="text-align: center;">
        <ul>
                <li><a href="index2.php">Home</a></li>
                <li><a href="pilih_subjek.php">Kuiz</a></li>
                <li><a href="prestasi_topik.php">Prestasi</a></li>
                <li><a href="import_daftar.php">Import</a></li>
                <li><a href="logout.php">Log Keluar</a></li>
        </ul>
</nav>
<?php include 'utility.php';?>
<br>
</div>
<?php $pengguna="DASHBOARD GURU"; ?>
<?php
} else{
?>
<!--Pelajar interface-->
<div class="menu">
<h1 class="sign"> SISPEPS </h1>
<nav style="text-align: center;">
        <ul>
                <li><a href="index2.php">Home</a></li>
                <li><a href="kuiz_subjek.php">Mula Kuiz</a></li>
                <li><a href="skor_individu.php">Prestasi</a></li>
                <li><a href="logout.php">Log Keluar</a></li>
        </ul>
</nav>
<?php include 'utility.php';?>
<br>
</div>
<?php $pengguna="DASHBOARD PELAJAR"; ?>
<?php } ?>
</body>
</html>