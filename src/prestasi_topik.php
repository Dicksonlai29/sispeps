<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//get id guru 
$guru= $_SESSION['idpengguna'];
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">PRESTASI PELAJAR BERDASARKAN SUBJEK-TOPIK</h2>
        <main>
            <table class="table">
                <tr>
                    <td width="2%">Bil.</td>
                    <td width="24%">Subjek</td>
                    <td width="25%">Topik</td>
                    <td width="7%">Bil. jawab</td>
                    <td width="7%">Laporan Lengkap</td>
                </tr>
                <?php
                 $no=1;
                 $topik=mysqli_query($hubung,"SELECT * FROM topik WHERE idpengguna='$guru'");
                 while ($infoTopik=mysqli_fetch_array($topik)):
                    $subjek=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek='$infoTopik[idsubjek]'");
                    $infoSubjek=mysqli_fetch_array($subjek);
                    $rekod=mysqli_query($hubung,"SELECT idtopik,COUNT(idtopik) AS 'bil' FROM perekodan WHERE idtopik='$infoTopik[idtopik]'");
                    $infoJawab=mysqli_fetch_array($rekod);
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $infoSubjek['subjek']; ?></td>
                    <td><?= $infoTopik['topik']; ?></td>
                    <td><?= $infoJawab['bil']; ?></td>
                    <td><a href="laporan_guru.php?idtopik=<?=$infoTopik['idtopik'];?>"><button class="btn">Papar</button></a></td>
                </tr>
                <?php
                 $no++;
                 endwhile;
                 ?>
                 <tr>
                    <td colspan=5>
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