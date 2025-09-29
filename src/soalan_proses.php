<?php
require 'sambung.php';
require 'keselamatan.php';

if(isset($_POST['submit'])){
    if($_FILES['gambar']['name']==NULL){
        $newnamepic="";
    }else{
        $gambar=$_FILES['gambar']['name'];
        //process of image
        $imageArr=explode(".",$gambar);
        $random=rand(10000,99999);
        $newnamepic=$imageArr[0].$random.'.'.$imageArr[1];
        $uploadPath="gambar/".$newnamepic;
        $isUploaded=move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadPath);
    }
    //value in superglobal $_POST
    $bilangan=$_POST['bilangan'];
    $idtopik=$_POST['idtopik'];
    $soalan=$_POST['paparan_soalan'];

    //query soalan
    $query="INSERT INTO soalan(bilangan,item,gambar,jenis,idtopik) values ('$bilangan','$soalan','$newnamepic','2','$idtopik')";
    $insert_row=mysqli_query($hubung,$query);
    $last_id=mysqli_insert_id($hubung);

    echo "<script>alert('Soalan baru telah berjaya ditambah');
    window.location='soalan_baru2.php?idtopik=$idtopik'</script>";

    //value post
    $jawapan=$_POST['idJAWAPAN1'];
    $topikal=$_POST['idTOPIK'];
    for ($i=0;$i<count($jawapan);$i++){
        if ($jawapan[$i]!="" && $topikal[$i]!=""){
            $jawapan2=$jawapan[$i];
            $idtopikal=$topikal[$i];
            //insert answer into pilihan
            $query1="INSERT INTO pilihan(bilangan,pilihan,jawapan,idsoalan) values ('$bilangan','','$jawapan2','$last_id')";
            $insert_row=mysqli_query($hubung,$query1);
        }
    }
}
?>
