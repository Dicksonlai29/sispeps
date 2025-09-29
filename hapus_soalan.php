<?php
require 'sambung.php';
require 'keselamatan.php';

//get id soalan
$soalan_terpilih=$_GET['idsoalan'];
$idsoalan=$_GET['idsoalan'];
//chose the soalan of that id
$pilihSoalan=mysqli_query($hubung,"SELECT * FROM soalan WHERE idsoalan='$soalan_terpilih'");
$dataSoalan=mysqli_fetch_array($pilihSoalan);
$pilihPerekodan=mysqli_query($hubung,"SELECT * FROM perekodan WHERE idtopik='$dataSoalan[idtopik]");
$dataPerekodan=mysqli_fetch_array($pilihPerekodan);
//find the idsoalan to redirect later
$query="SELECT * FROM soalan WHERE idsoalan='$idsoalan'";
$data1=mysqli_query($hubung,$query);
$infoSoalan=mysqli_fetch_array($data1);
$idtopik=$infoSoalan['idtopik'];
$data2=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$idtopik'");
$infoTopik=mysqli_fetch_array($data2);
$idsubjek=$infoTopik['idsubjek'];
//hapus rekod soalan+pilihan

$hapuskan1=mysqli_query($hubung,"DELETE FROM soalan WHERE idsoalan='$soalan_terpilih'");
$hapuskan2=mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$soalan_terpilih'"); //macam mana
$hapuskan3=mysqli_query($hubung,"DELETE FROM perekodan WHERE idtopik='$dataPerekodan[idtopik]'"); 
echo "<script>alert('Hapus soalan berjaya');
window.location='papar_topik.php?idsubjek=$idsubjek'</script>";