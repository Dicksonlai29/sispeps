<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//get id soalan
$soalan_terpilih=$_GET['idsoalan'];
//chose the soalan of that id
$pilihsoalan=mysqli_query($hubung,"SELECT * FROM soalan WHERE idsoalan='$soalan_terpilih'");
while ($dataSoalan=mysqli_fetch_array($pilihsoalan)){
    //original value
    $bil=$dataSoalan['bilangan'];
    $item=$dataSoalan['item'];
    $gambar=$dataSoalan['gambar'];
}
?>

<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">KEMASKINI SOALAN</h2>
        <main>
            <table class="body" width="70%" border="0" align="center" style="font-size: 18px;">
            <tr>
                <td>
                    <form action="edit_soalan1_save.php" method="POST" enctype="multipart/form-data">
                        <p>
                            <label>Soalan ke-<?=$bil; ?></label>
                            <input type="text" name="idsoalan" value="<?= $soalan_terpilih; ?>" readonly hidden />
                        </p>
                        <p>
                            <label>Item</label>
                            <textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" autofocus ><?= $item; ?></textarea>
                        </p>
                        <p>
                                <label>Gambar</label>
                                <br>
                                <?php
                                    if($gambar==NULL){
                                        echo "-Tiada-";
                                    }else{
                                        echo "<img src='gambar/".$gambar."' width='30%' height='30%' />";
                                    }
                                ?>
                                <input type="text" name="gambarAsal" value="<?= $gambar; ?>" readonly hidden />
                                <br><br>
                                <small style="color:red">*Jika perlu</small>
                                <input type="file" name="gambar" />
                            </p>
                            <p class="action">
                                <input class="btn main" type="submit" name="submit" value="KEMASKINI" />
                                <input class="btn sub" type="button" value="BATAL" onclick="history.back()" />
                            </p>
                        </form>
                        
                    </td>
                </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>