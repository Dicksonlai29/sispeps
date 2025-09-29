<?php
require 'sambung.php';
session_start();
$topik_pilihan=$_SESSION['pilih_topik'];
?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['score'])){
    $_SESSION['score']=0;
}
//post value (ans from student)
if ($_POST){
$idsoalan=$_POST['idsoalan'];
$number=$_POST['number'];
$next=$number+1;
$total=4;

$jenis_soalan=$_POST['jenis_soalan'];
$selected_choice=$_POST['choice'];
$jawapan_taip=trim(strtoupper($_POST['idJAWAPAN']));
//jumlah soalan
$query="SELECT * FROM soalan WHERE idtopik='$topik_pilihan' AND jenis='$jenis_soalan'";
$results=mysqli_query($hubung,$query);
$total=mysqli_num_rows($results);
//check answer for mcq/tf
if ($jenis_soalan==1){
    $_SESSION['jenis_soalan']=1;
    //get correct choice
    $jawapan=mysqli_query($hubung,"SELECT * FROM pilihan WHERE idsoalan='$idsoalan' AND bilangan='$number' AND pilihan=1");
    $row=mysqli_fetch_assoc($jawapan);
    $correct_choice=$row['idpilihan'];
    //compare
    if($correct_choice==$selected_choice){
        $semakan="TEPAT";
        $_SESSION['score']++;
    }
}
//check answer for fib
else{  
    //get suggested answer
    $q=mysqli_query($hubung,"SELECT * FROM pilihan WHERE idsoalan='$idsoalan' AND bilangan='$number' AND jawapan='$jawapan_taip' ");

    $row=mysqli_num_rows($q);
    //compare
    if ($row>0){
        $semakan="TEPAT";
        $_SESSION['score']++;
    }

}
if ($number==$total){
    header("Location: soalan_markah.php");
    exit();
}else{
    header("Location: soalan_papar.php?semakan=".$semakan."&idtopik=".$topik_pilihan."&n=".$next."&score=".$_SESSION['score']);
}
}