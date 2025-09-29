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
        $newnamepic=$imageArr[0].$random.'.'.'$imageArr[1]';
        $uploadPath="gambar/".$newnamepic;
        $isUploaded=move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadPath);
    }
    //value in superglobal $_POST
    $bilangan=$_POST['bilangan'];
    $idtopik=$_POST['idtopik'];
    $soalan=$_POST['paparan_soalan'];
    $jawapan_betul=$_POST['jawapan_betul'];
    $pilihan=[NULL,$_POST['pilih1'],$_POST['pilih2'],$_POST['pilih3'],$_POST['pilih4']];

    //query soalan
    $query="INSERT INTO soalan(bilangan,item,gambar,jenis,idtopik) values ('$bilangan','$soalan','$newnamepic','1','$idtopik')";
    $insert_row=mysqli_query($hubung,$query);
    $last_id=mysqli_insert_id($hubung);

    echo "<script>alert('Soalan baru telah berjaya ditambah');
    window.location='soalan_baru1.php?idtopik=$idtopik'</script>";

    //key in answer
    if($insert_row){
        foreach($pilihan as  $pilihan_jawapan=>$jawapan){
            if($pilih != ''){
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

//Total soalan
$query2="SELECT * FROM soalan WHERE idtopik='$topik_pilihan' AND jenis='1'";
$soalan=mysqli_query($hubung,$query2);
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>

<html>
    <title><?php include 'menu.php'; ?></title>
    <body>
        <h2 style="text-align: center;">TAMBAH SOALAN BARU</h2>
        <main>
            <table width="70%" border="0" align="center" style="font-size: 16px;">
            <tr>
                <td>
                    <form method="POST" enctype="multipart/form-data">
                        <p>
                            <label>Bilangan Soalan</label>
                            <input type="text" value="<?= $next; ?>" name="bilangan" size="5" readonly />
                            <input type="text" value="<?= $topik_pilihan; ?>" name="idtopik" hidden />
                        </p>
                        <p>
                            <label>Soalan</label>
                            <textarea id="paparan_soalan" name="paparan_soalan" rows=7 cols=105 required></textarea>
                        </p>
                        <p>
                            <label>Gambar <br>
                                <small style="color: red;">*Jika perlu</small>
                            </label>
                            <input type="file" name="gambar" />
                        </p>
                        <p>
                            <label>A </label>
                            <input type="text" name="pilih1" size="50" />
                        </p>
                        <p>
                            <label>B </label>
                            <input type="text" name="pilih2" size="50" />
                        </p>
                        <p>
                            <label>C </label>
                            <input type="text" name="pilih3" size="50" />
                        </p>
                        <p>
                            <label>D </label>
                            <input type="text" name="pilih4" size="50" />
                        </p>
                        <p>
                            <label>Pilihan Jawapan[1-4]: </label>
                            <input type="text" name="jawapan_betul" size="5" required/>
                        </p>
                        <fieldset><legend>MENU</legend>
                            <input type="submit" name="submit" value="Save" />
                            <button onclick="window.location.href='papar_topik.php'">End</button>
                        </fieldset>
                        <p></p>
                    </form>
                </td>        
            </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>