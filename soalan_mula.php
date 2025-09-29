<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//Get idtopik & jenis from url
$topik_pilihan=$_GET['idtopik'];
$jenis=$_GET['jenis'];

$_SESSION['pilih_topik']=$topik_pilihan;
$_SESSION['jenis_soalan']=$jenis;
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$topik_pilihan'");
$getTopik=mysqli_fetch_array($dataTopik);
//Table soalan
$dataSoalan=mysqli_query($hubung,"SELECT * FROM soalan WHERE idtopik='$topik_pilihan' AND jenis='$jenis'");
$getSoalan=mysqli_fetch_array($dataSoalan);
$total=mysqli_num_rows($dataSoalan);
//Table Subjek
$dataSubjek=mysqli_query($hubung,"SELECT * FROM subjek  WHERE idsubjek='$getTopik[idsubjek]'");
$getSubjek=mysqli_fetch_array($dataSubjek);
?>

<html>
    <body>
        <h2 class="title" style="text-align: center;"><?=$getSubjek['subjek'];?></h2>
        <h3 style="text-align: center;"><?=$getTopik['topik'];?></h3>
        <main>
            <table class="body" width=70% border=0 align="center" style="font-size: 16px;">
                <tr>
                    <td><h3>Arahan kepda pelajar:</h3></td>
                </tr>
                <tr>
                    <td>Jawab semua soalan. Pilih jawapan yang tersesuai.</td>
                      
                </tr>
                <tr>
                    <td >
                        <ul>
                            <li>Jumlah soalan: <strong><?= $total; ?></strong></li>
                            <li>Jenis Soalan: <strong><?php if ($jenis==1){
                                echo "Berbilang Jawapan dan Benar/Palsu";
                                }else{
                                    echo "Isi Tempat Kosong";
                                }?></strong></li>
                            <li>Peruntukan Masa: <strong><?= $total*0.5; ?> minit</strong></li>
                        </ul>
                        <br>
                        <div class="action">
                            <a href="soalan_papar.php?n=1>"><button class="btn">MULA</button></a>
                            <button class="btn sub" onclick="history.back()">Balik</button>
                        </div>
                    </td>
                </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>