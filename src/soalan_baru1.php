<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

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
    $jawapan_betul=$_POST['jawapan_betul'];
    $pilihan=array(NULL,$_POST['pilih1'],$_POST['pilih2'],$_POST['pilih3'],$_POST['pilih4']);

    //query soalan
    $query="INSERT INTO soalan(bilangan,item,gambar,jenis,idtopik) values ('$bilangan','$soalan','$newnamepic','1','$idtopik')";
    $insert_row=mysqli_query($hubung,$query);
    $last_id=mysqli_insert_id($hubung);

    echo "<script>alert('Soalan baru telah berjaya ditambah');
    window.location='soalan_baru1.php?idtopik=$idtopik'</script>";

    //key in answer
    if($insert_row){
        foreach($pilihan as  $pilihan_jawapan=>$jawapan){
            if($jawapan != ''){
                if ($jawapan_betul==$pilihan_jawapan){
                    $markah=1;
                }else{
                    $markah=0;
                }
                $query1="INSERT INTO pilihan(bilangan,pilihan,jawapan,idsoalan) values ('$bilangan','$markah','$jawapan','$last_id')";
                $insert_row1=mysqli_query($hubung,$query1);
            }
        }
    }
}
$topik_pilihan=$_GET['idtopik'];
$_SESSION['topik_semasa']=$topik_pilihan;

//added part so it could link to papar_topik.php later
$topik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$topik_pilihan'");
$infoTopik=mysqli_fetch_array($topik);
$idsubjek=$infoTopik['idsubjek'];
//Total soalan
$query2="SELECT * FROM soalan WHERE idtopik='$topik_pilihan' AND jenis='1'";
$soalan=mysqli_query($hubung,$query2);
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>

<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">TAMBAH SOALAN BARU</h2>
        <main>
            <form method="POST" enctype="multipart/form-data">
                <table class="quiz">
                        <tr>
                            <td><label>Topik:</label></td>
                            <td><input id="nama" type="text" value="<?= $infoTopik['topik']; ?>" name="topik" readonly /></td>
                        <tr>
                        <tr>
                            <td><label for="bil">Bilangan Soalan:</label></td>
                            <td><input id="bil" type="text" value="<?= $next; ?>" name="bilangan" size="5" readonly />
                            <input type="text" value="<?= $topik_pilihan; ?>" name="idtopik" hidden /></td>
                        </tr>
                        
                            <td><label for="paparan_soalan">Soalan:</label></td>
                            <td><textarea id="paparan_soalan" name="paparan_soalan" rows=7 cols=105 required></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="gambar">Gambar:<br>
                                <small style="color: red;">*Jika perlu</small>
                            </label></td>
                            <td><input id="gambar" type="file" name="gambar" /></td>
                        </tr>
                        <tr>
                            <td><label>A: </label></td>
                            <td><input id="mcqjawapan" type="text" name="pilih1" size="50" /></td>
                        </tr>
                        <tr>
                            <td><label>B: </label></td>
                            <td><input id="mcqjawapan" type="text" name="pilih2" size="50" /></td>
                        </tr>
                        <tr>
                            <td><label>C: </label></td>
                            <td><input id="mcqjawapan" type="text" name="pilih3" size="50" /></td>
                        </tr>
                        <tr>
                            <td><label>D: </label></td>
                            <td><input id="mcqjawapan" type="text" name="pilih4" size="50" /></td>
                        </tr>
                        <tr>
                            <td><label>Pilihan Jawapan[1-4]:</label></td>
                            <td><input id="mcqjawapan" type="number" name="jawapan_betul" size="5" min="1" max="4" required/></td>
                        </tr>
                        <tr><td colspan=2>
                            <fieldset class="action"><legend>MENU</legend>
                                <input class="btn main" type="submit" name="submit" value="Save" />
                                <button class="btn sub" onclick="window.location.href='papar_topik.php?idsubjek=<?=$idsubjek;?>'">Tamat</button>
                            
                            </fieldset>
                        </td></tr>
                </table>
            </form>
            
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>