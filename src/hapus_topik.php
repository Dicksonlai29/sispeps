<?php
require 'sambung.php';
require 'keselamatan.php';

$topik=$_GET['idtopik'];
$infoSubjek=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$topik'");
$dataSubjek=mysqli_fetch_array($infoSubjek);
$del=mysqli_query($hubung,"SELECT * fROM topik AS t INNER JOIN soalan AS q
                    ON q.idtopik=t.idtopik INNER JOIN pilihan AS c
                    ON q.idsoalan = c.idsoalan WHERE t.idtopik=$topik");
while($dataDel=mysqli_fetch_array($del)){
    $delete1=$dataDel['idsoalan'];
    $hapuskan1=mysqli_query($hubung,"DELETE FROM topik WHERE idtopik='$topik'");
    $hapuskan2=mysqli_query($hubung,"DELETE FROM soalan WHERE idtopik='$topik'");
    $hapuskan3=mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$delete1'");
    $hapuskan4=mysqli_query($hubung,"DELETE FROM perekodan WHERE idtopik='$topik'"); 
}

$hapuskan1=mysqli_query($hubung,"DELETE FROM topik WHERE idtopik='$topik'");
//feedback
echo "<script>alert('Hapus topik berjaya');
window.location='papar_topik.php?idsubjek=$dataSubjek[idsubjek]'</script>";