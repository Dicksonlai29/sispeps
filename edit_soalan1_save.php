<?php
require 'sambung.php';
require 'keselamatan.php';
if (isset($_POST['submit'])){
    $picAsal=$_POST['gambarAsal'];
    if ($_FILES['gambar']['name']===NULL){
        $newnamepic=$picAsal;
    }else{
        $gambar=$_FILES['gambar']['name'];
        //process of image
        $imageArr=explode(".",$gambar);
        $random=rand(10000,99999);
        $newnamepic=$imageArr[0].$random.'.'.$imageArr[1];
        $uploadPath="gambar/".$newnamepic;
        $isUploaded=move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadPath);
    }
    //POST VARIABLE
    $idsoalan=$_POST['idsoalan'];
    $soalan=$_POST['paparan_soalan'];
    //find the idsoalan to redirect later
    $query="SELECT * FROM soalan WHERE idsoalan='$idsoalan'";
    $data1=mysqli_query($hubung,$query);
    $infoSoalan=mysqli_fetch_array($data1);
    $idtopik=$infoSoalan['idtopik'];
    $data2=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$idtopik'");
    $infoTopik=mysqli_fetch_array($data2);
    $idsubjek=$infoTopik['idsubjek'];

    //UPDATE new record
    $result=mysqli_query($hubung,"UPDATE soalan SET bilangan=bilangan,item='$soalan',gambar='$newnamepic', idtopik=idtopik WHERE idsoalan='$idsoalan'");
    echo "<script>alert('Soalan telah dikemaskini.');
    window.location='papar_topik.php?idsubjek=$idsubjek'</script>";
}
?>