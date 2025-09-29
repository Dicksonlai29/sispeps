<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//session_start();

 //get idtopik
 $topik_pilihan=$_SESSION['pilih_topik'];
 $jenis=$_SESSION['jenis_soalan'];
//table topik
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik=$topik_pilihan");
$getTopik=mysqli_fetch_array($dataTopik);
//total soalan
$results=mysqli_query($hubung,"SELECT * FROM soalan WHERE idtopik=$topik_pilihan AND jenis=$jenis");
$total=mysqli_num_rows($results);
//Set their bilangan
$number=(int)$_GET['n'];
//bring the question here
$result=mysqli_query($hubung,"SELECT * FROM soalan WHERE idtopik=$topik_pilihan AND bilangan=$number AND jenis=$jenis");
$soalan=mysqli_fetch_assoc($result);

//bring the pilihan here
$pilihan=mysqli_query($hubung,"SELECT * FROM pilihan WHERE bilangan=$number AND idsoalan=$soalan[idsoalan]");
?>
<html>
    <body>
        <head><?php include 'menu.php'; ?></head>
        <h2 class="title" style="text-align: center;">TOPIK: <?=$getTopik['topik'];?></h2>
        <main>
            <table class="table">
                <tr>
                    <td>
                        <?php
                        //Respon Jawapan betul atau Tidak selepas jawab (nilai semakan diberi daripada soalan_semak.php)
                        if ($number==1){
                            echo "Sila baca soalan dengan teliti";
                        }else{
                            $jawapan=$_GET['semakan'];
                            if ($jawapan=="TEPAT"){
                                echo "Tahniah, jawapan bagi soalan ".($number-1)." adalah <p style='color:blue size=20px'>TEPAT</p>.";
                            }else{
                                echo "Maaf, jawapan bagi soalan ".($number-1)." adalah <p style='color:red size=20px'>SALAH</p>.";
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Soalan <?=$number;?> dari <?= $total;?>
                        <br><br>
                        <?= $soalan['item']; ?>
                        <br>
                        <?php 
                        if (!$soalan['gambar']==NULL){
                            echo "<img src='gambar/".$soalan['gambar']."' width=30% height=30% /><br><br>";
                        }
                        ?>
                        <form method="POST" action="soalan_semak.php">
                            <?php
                            if($soalan['jenis']==1){
                            ?>
                            <ul>
                            <?php
                            while ($row=mysqli_fetch_assoc($pilihan)):
                            ?>
                            <li><input name="choice" type="radio" value="<?= $row['idpilihan'];?>" required><?=$row['jawapan'];?></li>
                            <?php endwhile;?>
                            </ul>
                            <?php
                            }else{
                            ?>
                            <div class="answer-section">
                                <input id='ruangjawapan' type="text" name="idJAWAPAN" placeholder="Taip Jawapan di sini." size="70%" required />
                                <?php } ?>
                            </div>
                            <br>
                            <input class="btn" type="submit" value="HANTAR" />
                            <input type="hidden" name="number" value="<?=$number; ?>" />
                            <input type="hidden" name="jenis_soalan" value="<?=$soalan['jenis']; ?>" />
                            <input type="hidden" name="idsoalan" value="<?=$soalan['idsoalan']; ?>" />
                        </form>
                    </td>
                      
                </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>