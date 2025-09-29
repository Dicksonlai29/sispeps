<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
$guru=$_SESSION["idpengguna"];

if(isset($_POST['submit'])){
    $bilangan=$_POST["bilangan"];
    $topik=$_POST["topik"];
    $jenis=$_POST["jenis"];
    $idsubjek=$_POST["idsubjek1"];
    $markah=$_POST["markah"];
    //QUERY topik
    $query="INSERT INTO topik(idtopik,topik,markah,idsubjek,idpengguna) values (null,'$topik','$markah','$idsubjek','$guru')";
    $insert_row=mysqli_query($hubung,$query);
    $last_id= mysqli_insert_id($hubung);
    if($jenis==="mcq"){
        echo"<script>alert('Topik baru telah ditambah')
        window.location='soalan_baru1.php?idtopik=$last_id'</script>";
    } else{
        echo"<script>alert('Topik baru telah ditambah')
        window.location='soalan_baru2.php?idtopik=$last_id'</script>";
    }
}
$subjek_pilihan=$_GET["idsubjek"];
//TOTAL TOPIK
$query1="SELECT * FROM topik WHERE idsubjek='$subjek_pilihan'";
$topik1=mysqli_query($hubung,$query1);
$total=mysqli_num_rows($topik1);
$next=$total+1;
?>

<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">TAMBAH TOPIK</h2>
        <main>
            <form method="POST" action="tambah_topik.php">
                <table class="quiz">
                        <tr>
                            <td><label>SUBJEK:</label</td>
                            <td>
                                <?php 
                                global $paparSubjek;
                                $result=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek='$subjek_pilihan'");
                                while ($res=mysqli_fetch_array($result)){
                                    // print nama subjek
                                    global $paparSubjek;
                                    $paparSubjek= $res['subjek'];
                                    
									} 
                                ?>
                                <input id="namaSubjek" type="text" value="<?= $paparSubjek ?>" name="namaSubjek" hidden />
                                
                            </td>
                            <input type="text" value="<?= $subjek_pilihan ?>" name="idsubjek1" hidden />
                        </tr>
                        <tr>
                            <td><label>Bil. :</label></td>
                            <td><input id="bil" type="text" value="<?= $next; ?>" name="bilangan" size="5" readonly /></td>
                        </tr>
                        <tr>
                            <td><label>Topik :</label></td>
                            <td><input id="topik" type="text" name="topik" required/></td>
                        </tr>
                        <tr>
                            <td><label>Jenis Soalan :</label></td>
                            <td>
                                <select id="jenis" name="jenis" required>
                                    <option hidden selected>PILIH</option>
                                    <option value="mcq">Multiple Choice/True or False</option>
                                    <option value="fib">Fill in Blank</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Markah :</label></td>
                            <td><input id="markah" type="number" name="markah" size="10" required/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="btn" type="submit" name="submit" value="SAVE" /></td>
                        </tr>
                    </form>
                </td>
            </tr> 
        </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>