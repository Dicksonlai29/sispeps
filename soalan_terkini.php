<?php require 'sambung.php'; ?>
<hr>
        <table class="soalan_terkini" width="100%" border=0 align="center" >
            <tr style="font-size: 20px;  color: white;">
                <td width= 5%><b>Bil.</b></td>
                <td width= 20%><b>Subjek</b></td>
                <td width= 50%><b>Topik</b></td>
                <td width= 15%><b>Format</b></td>
                <!--num of question-->
                <td width= 10%><b>Soalan</b></td>
            </tr>
            <?php
            $no=1;
            $topik=mysqli_query($hubung,"SELECT * FROM subjek AS s 
										INNER JOIN topik AS t ON s.idsubjek = t.idsubjek 
										INNER JOIN soalan AS q ON t.idtopik= q.idtopik 
										GROUP BY t.topik ORDER BY t.idtopik desc limit 0,10 ");
            while ($infoTopik=mysqli_fetch_array($topik)){
                $soalan=mysqli_query($hubung,"SELECT COUNT(idtopik) AS 'bil' FROM soalan WHERE idtopik='$infoTopik[idtopik]' AND jenis='$infoTopik[jenis]'");
                $infoSoalan=mysqli_fetch_array($soalan);
            ?>
            <tr style="font-size: 16px;">
            <td><?= $no;?></td>
            <td><?= $infoTopik["subjek"];?></td>
            <td><?= $infoTopik["topik"];?></td>
            <td><?php
                if($infoTopik["jenis"]==1){
                    echo "MCQ/TF";
                }else{
                    echo "FIB";
                } ?>
            </td>
            <td><?= $infoSoalan["bil"];?></td>
            </tr>
            <?php $no++; }?>
        </table>
        <br>
        <p style="text-align: center; font-size: 14px;">
        * Rekod yang dipaparkan ialah 10 soalan yang terkini.
        <br>
        Jumlah Rekod:<?=$no-1;?>
        </p>