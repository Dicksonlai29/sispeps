<?php
require 'sambung.php';
//get the file from $_POST
if (isset($_POST['import'])){
    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"]>0){
        $file=fopen($filename,"r");
        while (($getData=fgetcsv($file,10000,","))!== FALSE){
            //add into database
            $import= "INSERT INTO pengguna (idpengguna,password,nama,jantina,aras) values ('{$getData[0]}','{$getData[1]}','{$getData[2]}','{$getData[3]}','PELAJAR')";
            $tambah=mysqli_query($hubung,$import);
            //Pop-up message if fail
            if (!isset($tambah)){
                echo "<script>alert('Proses memuat naik fail CSV gagal');
                window.location='import_daftar.php';</script>";
            }
            //Pop-up message if success
            else{
                echo "<script>alert('Proses memuat naik fail CSV berjaya');
                window.location='pelajar_senarai.php';</script>";
            }
        }
        fclose($file);
    }
}
?>