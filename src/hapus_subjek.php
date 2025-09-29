<?php
require 'sambung.php';
require 'keselamatan.php';


$del_subjek=$_GET['idsubjek'];
$delete=mysqli_query($hubung,"SELECT * FROM subjek AS s 
                INNER JOIN topik AS t ON s.idsubjek=t.idsubjek
                INNER JOIN soalan AS q ON t.idtopik=q.idtopik
                INNER JOIN perekodan AS r ON t.idtopik=r.idtopik
                INNER JOIN pilihan AS c ON q.idsoalan=c.idsoalan
                WHERE s.idsubjek=$del_subjek;
                ");
while($infoDel=mysqli_fetch_array($delete)){
    $delete1=$del_subjek; //idsubjek
    $delete2=$infoDel['idtopik']; //idtopik
    $delete3=$infoDel['idsoalan']; //idsoalan



    $hapuskan1=mysqli_query($hubung,"DELETE FROM subjek WHERE idsubjek='$del_subjek'");
    $hapuskan2=mysqli_query($hubung,"DELETE FROM topik WHERE idsubjek='$delete1'");
    $hapuskan3=mysqli_query($hubung,"DELETE FROM soalan WHERE idtopik='$delete2'");
    $hapuskan4=mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$delete3'"); 
    $hapuskan5=mysqli_query($hubung,"DELETE FROM perekodan WHERE idtopik='$delete2'"); 
}
$hapuskan1=mysqli_query($hubung,"DELETE FROM subjek WHERE idsubjek='$del_subjek'");
    echo "<script>alert('Hapus Subjek Berjaya');
    window.location='subjek_senarai.php';</script>";

?>


