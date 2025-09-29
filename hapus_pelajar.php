<?php
require 'sambung.php';
require 'keselamatan.php';

$del_pelajar=$_GET['idpengguna'];


$hapuskan1=mysqli_query($hubung,"DELETE FROM pengguna WHERE idpengguna='$del_pelajar'");

$hapuskan2=mysqli_query($hubung,"DELETE FROM perekodan WHERE idpengguna='$del_pelajar'");
echo "<script>alert('Hapus Pelajar Berjaya');
window.location='pelajar_senarai.php';</script>";
?>