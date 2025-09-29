<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//get idpengguna
$idpengguna=$_SESSION['idpengguna'];
?>

<html>
    <head>
        <?php include 'menu.php';?>
    </head>
    <body>
        <h2 class="title" style="text-align: center;">KEPUTUSAN KUIZ</h2>
        <main>
            <table class="table">
                <tr>
                    <td width="2%"><b>Bil.</b></td>
                    <td width="45%"><b>Topik</b></td>
                    <td width="8%"><b>Jenis</b></td>
                    <td width="12%"><b>Tarikh/Masa</b></td>
                    <td width="4%"><b>Skor</b></td>
                    <td width="4%"><b>Markah</b></td>
                </tr>
                <?php
                $no=1;
                    $data1=mysqli_query($hubung,"SELECT * FROM perekodan WHERE idpengguna='$idpengguna' ORDER BY masa DESC limit 0,10");
                    while($info1=mysqli_fetch_array($data1)):   
                        //table topik
                        $dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$info1[idtopik]'");
                        $getTopik=mysqli_fetch_array($dataTopik);
                        //table soalan, need to get bilangan soalan
                        $dataSoalan=mysqli_query($hubung,"SELECT jenis, COUNT(*) as 'bil' FROM soalan WHERE idtopik='$info1[idtopik]' AND jenis='$info1[jenis]'");
                        $getSoalan=mysqli_fetch_array($dataSoalan);
                        //variable value
                        $jenisSoalan=$info1['jenis'];
                        $bilSoalan=$getSoalan['bil'];
                        $markah_Topik=$getTopik['markah'];
                    ?>
                <tr style="font-size: 14px;">
                        <td><?= $no; ?></td>
                        <td><?= $getTopik['topik']; ?></td>
                        <td><?php
                            if($jenisSoalan==1){
                                echo "MCQ/TF";
                            }else{
                                echo "FIB";
                            } 
                            ?>
                        </td>
                        <td><?= date('d-m-y g:i A', strtotime($info1['masa'])); ?></td>
                        <td><?= $info1['markah_didapat']; ?></td>
                        <td><?= number_format(($info1['markah_didapat']/$bilSoalan)*$markah_Topik); ?>/<?=$markah_Topik;?></td>
                           
                </tr> 
                    <?php $no++; 
                    endwhile; ?>  
                <tr>
                    <td colspan=6>
                        <p style="font-size:14px;">
                            Senarai telah tamat di sini. <br>
                            Jumlah Rekod:<?= $no-1; ?>
                        </p>
                    </td>
                </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>