<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<?php

if (isset($_POST['update'])){
    $idsubjek=$_POST['idsubjek'];
    $idtopik=$_POST['idtopik'];
    $topikBaru=$_POST['paparan_topik'];
    $markahBaru=$_POST['markah'];
    //update with new rekod
    $result=mysqli_query($hubung,"UPDATE topik SET topik='$topikBaru', markah='$markahBaru',idsubjek='$idsubjek' WHERE idtopik='$idtopik'");
    //feedback
    echo "<script>alert('Kemaskini rekod telah berjaya');
    window.location='pilih_subjek.php';
    </script>";
}

//take idtopik from the url (from papar_topik)
$topik_pilihan=$_GET['idtopik'];
//fetch info of that topik here
$pilihTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik=$topik_pilihan");
while ($dataTopik=mysqli_fetch_array($pilihTopik)){
    $pilihSubjek=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek=$dataTopik[idsubjek]");
    $dataSubjek=mysqli_fetch_array($pilihSubjek);
    //Paparkan nilai asal
    $idSubjekAsal=$dataTopik['idsubjek'];
    $topikasal=$topik_pilihan; //idtopik asal
    $editTopik=$dataTopik['topik']; //nama topik asal
    $editMarkah=$dataTopik['markah']; //markah asal
}
?>

<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">KEMASKINI TOPIK</h2>
        <main>
                <form method="POST" action="edit_topik.php">
                    <table class="quiz">
                        <tr>
                            <td><label>Subjek :</label></td>
                            <td><select id="idsubjek" name="idsubjek">
                                <option selected value="<?= $idSubjekAsal;?>"><?= $dataSubjek['subjek']; ?></option>
                                <?php $data2=mysqli_query($hubung,"SELECT * FROM subjek");
                                    while ($info2=mysqli_fetch_array($data2)){
                                        if ($info2[idsubjek]!=$idSubjekAsal){
                                            echo "<option value='$info2[idsubjek]'>$info2[subjek]</option>";
                                        }
                                    }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <td><label>Topik :</label></td>
                            <td><input id="nama" type="text" name="paparan_topik"size="60%" value="<?= $editTopik; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Markah :</label></td>
                            <td><input id="markah" type="text" name="markah" size="5%" value="<?=$editMarkah; ?>" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="action">
                                <input type="hidden" name="idtopik" value="<?= $topikasal; ?>" />
                                <input class="btn main" type="submit" name="update" value="KEMASKINI" />
                                <input class="btn sub" type="button" value="BATAL" onclick="history.back()" />
                             </td>

                        </tr>
                    </table>
                </form>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>