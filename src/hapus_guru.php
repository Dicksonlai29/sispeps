<?php
require 'sambung.php';
require 'keselamatan.php';

$del_guru=$_GET['idpengguna'];
$delete=mysqli_query($hubung,"SELECT * FROM pengguna AS u INNER JOIN topik AS t ON u.idpengguna=t.idpengguna INNER JOIN soalan AS q ON t.idtopik=q.idtopik INNER JOIN perekodan AS r ON t.idtopik=r.idtopik INNER JOIN pilihan AS c ON q.idsoalan=c.idsoalan WHERE u.idpengguna=$del_guru;");
while($infoDel=mysqli_fetch_array($delete)){
    $delete1=$del_guru; //idpengguna
    $delete2=$infoDel['idtopik']; //idtopik
    $delete3=$infoDel['idsoalan'];

    $hapuskan1=mysqli_query($hubung,"DELETE FROM pengguna WHERE idpengguna='$del_guru'");
    $hapuskan2=mysqli_query($hubung,"DELETE FROM topik WHERE idpengguna='$delete1'");
    $hapuskan3=mysqli_query($hubung,"DELETE FROM soalan WHERE idtopik='$delete2'");
    $hapuskan4=mysqli_query($hubung,"DELETE FROM pilihan WHERE idsoalan='$delete3'"); //macam mana??
    $hapuskan5=mysqli_query($hubung,"DELETE FROM perekodan WHERE idtopik='$delete2'");
}
$hapuskan1=mysqli_query($hubung,"DELETE FROM pengguna WHERE idpengguna='$del_guru'");
echo "<script>alert('Hapus Guru Berjaya');
window.location='guru_senarai.php';</script>";
?>