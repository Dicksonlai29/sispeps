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
    $soalan=$dataSoalan['item'];
    $gambar=$dataSoalan['gambar'];
}
?>

<html>
<head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">KEMASKINI SOALAN</h2>
        <main >
            <table class="table">
            <tr>
                <td>
                    <p>
                        <label>Soalan ke-<?=$bil; ?></label>
                        <input type="text" name="idsoalan" value="<?= $soalan_terpilih; ?>" readonly hidden />
                    </p>
                    <fieldset>
                        <legend>Item</legend>
                        <p><?= $soalan; ?></p>
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
                        </p>
                        <div class="action">
                            <a href="edit_soalan1.php?idsoalan=<?= $soalan_terpilih; ?>"><button class="btn main">EDIT</button></a>
                            <input class="btn sub" type="button" value="BALIK" onclick="history.back()" />
                        </div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend>Jawapan</legend>
                        <?php
                                $terpilih=$_GET['idsoalan'];
                                $no=1;
                                $pilihan=mysqli_query($hubung,"SELECT * FROM pilihan AS a INNER JOIN soalan AS q ON q.idsoalan=a.idsoalan WHERE q.idsoalan=$terpilih");
                                while ($dataPilihan=mysqli_fetch_array($pilihan)):
                                    //identify the type of soalan
                                    if ($dataPilihan['jenis']==1){
                        ?>
                        <p>Pilihan <?= $no; ?> : <?= $dataPilihan['jawapan']; ?></p>

                        <?php
                                        if ($dataPilihan['pilihan']==1){ //for mcq
                                            echo "<p>*Jawapan</p>";
                                        }
                                        $no++;
                                    }else{ //for fib
                        ?>
                        <p>
                        Cadangan Jawapan <?= $no; ?>:
                        <?php 
                                            echo $dataPilihan['jawapan'];
                        ?>
                        </p>
                        <?php $no++; } endwhile;?>
                    </fieldset>
                </td>
            </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>
