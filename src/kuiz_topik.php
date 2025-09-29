<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//Get idsubjek
$subjek_pilihan=$_GET['idsubjek'];
//connect to subjek table
$result=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek='$subjek_pilihan'");
while($res=mysqli_fetch_array($result)){
    //show the original value
    $paparSubjek=$res['subjek']; //name of subjek
}
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">SENARAI TOPIK UNTUK SUBJEK <?=$paparSubjek; ?></h2>
        <main>
            <table class="table" style="font-size: 16px;">
                <tr>
                    <td width="4%"><strong>Bil.</strong></td>
                    <td width="50%"><strong>Nama Topik</strong></td>
                    <td width="11%"><strong>Format</strong></td>
                    <td width="5%"><strong>Tindakan</strong></td>
                </tr>
                <?php
                $no=1;
                $data1=mysqli_query($hubung,"SELECT * FROM subjek AS s INNER JOIN topik AS t ON s.idsubjek=t.idsubjek INNER JOIN soalan AS q ON t.idtopik=q.idtopik WHERE s.idsubjek='$subjek_pilihan' GROUP BY q.idtopik,q.jenis");
                while ($info1=mysqli_fetch_array($data1)):
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $info1['topik']; ?></td>
                    <td align="center">
                        <?php if($info1['jenis']==1){ //if mcq
                            echo "MCQ/TF";
                        }else{
                            echo "FIB";
                        } 
                        ?>
                    </td>
                    <td class="action">
                        <a href="soalan_mula.php?idtopik=<?=$info1['idtopik'];?>&jenis=<?=$info1['jenis'];?>"><button class="btn main">Jawab</button></a>
                    </td>   
                </tr>
                <?php $no++; 
                endwhile;
                ?>
                <tr>
                    <td colspan=6>
                        <p style="font-size:14px;">Senarai telah tamat di sini. <br>
                            Jumlah Rekod:<?= $no-1; ?>
                        </p>
                    </td>
                </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>