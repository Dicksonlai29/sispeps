<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

if(isset($_POST['update'])){
    $idsubjek=$_POST['idsubjek'];
    $subjek=$_POST['subjek'];
    //update new changes
    $result=mysqli_query($hubung,"UPDATE subjek SET subjek='$subjek' WHERE idsubjek='$idsubjek'");


//print the mesej if success
echo "<script>alert('Kemaskini subjek telah berjaya');
        window.location='subjek_senarai.php';</script>";

}

//get idsoalan from search query
$subjekEdit=$_GET['idsubjek'];

//select data from the id
$pilihSubjek=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek=$subjekEdit");
$dataSubjek=$info1=mysqli_fetch_array($pilihSubjek);
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">KEMASKINI SUBJEK</h2>
        <main>
            <table class="body" width=70% border=0 align="center" style="font-size: 18px;">
                <form method="POST">
                    <tr>
                        <td align="right">NAMA SUBJEK:</td>
                        <td><input id='nama' type="text" name="subjek" size="40%" value="<?= $dataSubjek['subjek']; ?>" /></td>
                    </tr>
                    <tr class="action">
                        <td></td>
                        <td><input type="hidden" name="idsubjek" value="<?= $dataSubjek['idsubjek']; ?>" /></td>
                        <td><input class="btn main" type="submit" name="update" value="KEMASKINI" /></td>
                        <td><input class="btn sub" type="button" value="BATAL" onclick="history.back()"/></td>
                    </tr>
                </form>   
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>