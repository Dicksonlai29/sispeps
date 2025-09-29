<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
$guru=$_SESSION["idpengguna"];
$subjek_pilihan=$_GET["idsubjek"];
if(isset($_POST['submit'])){
    $bilangan=$_POST["bilangan"];
    $topik=$_POST["topik"];
    $jenis=$_POST["jenis"];
    $idsubjek=$_POST["idsubjek1"];
    $markah=$_POST["markah"];
    //QUERY topik
    $query="INSERT INTO topik(idtopik,topik,markah,idsubjek,idpengguna) values (null,'topik','markah','idsubjek1','guru')";
    $insert_row=mysqli_query($hubung,$query);
    $last_id= mysqli_insert_id($hubung);
    if($jenis==="mcq"){
        echo"<script>alert('Topik baru telah ditambah')
        windoq.location='soalan_baru1.php?idtopik=$last_id'</script>";
    } else{
        echo"<script>alert('Topik baru telah ditambah')
        windoq.location='soalan_baru2.php?idtopik=$last_id'</script>";
    }
}
//TOTAL TOPIK
$query1="SELECT * FROM topik WHERE idsubjek='$subjek_pilihan'";
$topik1=mysqli_query($hubung,$query1);
$total=mysqli_num_rows($topik1);
$next=$total+1;
?>

<html>
    <title><?php include 'menu.php'; ?></title>
    <body>
        <h2 style="text-align: center;">TAMBAH TOPIK</h2>
        <main>
            <table width="70%" border="0" align="center" style="font-size: 16px;">
            <tr>
                <td>
                    <form method="POST" action="tambah_topik.php">
                        <tr>
                            <td align="right">SUBJEK</td>
                            <td>
                                <?php 
                                $result=mysqli_query($hubung,'SELECT * FROM subjek WHERE idsubjek="$subjek_pilihan'");
                                while ($res=mysqli_fetch_array($result)):
                                    // print nama subjek
                                    echo $res['subjek'];
                                ?>
                            </td>
                            <input type="text" value="<?= $subjek_pilihan" name="idsubjek1" hidden />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Bil. :</td>
                            <td><?= $next;?>
                            <input type="text" value="<?= $next ?>" name="bilangan" hidden /></td>
                        </tr>
                        <tr>
                            <td align="right">Topik :</td>
                            <td><input type="text" name="topik" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Jenis Soalan :</td>
                            <td>
                                <select name="jenis" required>
                                    <option hidden selected>PILIH</option>
                                    <option value="mcq">Multiple Choice/True or False</option>
                                    <option value="fib">Fill in Blank</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Markah :</td>
                            <td><input type="number" name="markah" size="10" required/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="SAVE" /></td>
                        </tr>
                    </form>
                </td>
            </tr>
            <?php $no++; ?> 
        </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>