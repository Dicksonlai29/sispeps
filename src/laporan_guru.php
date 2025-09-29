<?php
require 'sambung.php';
require 'keselamatan.php';
$nokp=$_SESSION['idpengguna'];
$topik_pilihan=$_GET['idtopik'];
//Connect to topik table
$topik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$topik_pilihan'");
$infoTopik=mysqli_fetch_array($topik);
?>
<html>
    <title><?php echo $nama_sistem; ?></title>
    <body>
            <table width="800" border="0">
                <tr>
                    <td width="800">
                        <table width="800" border="0">
                            <tr>
                            <td width="80" valign="top">
                                <img src="lencana.png" width="85" height="102" hspace="7" align="left" />
                            </td>
                            <td>
                                <h5><?= $nama_sekolah; ?></h5>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="3" valign="top"><hr></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p><strong>LAPORAN PRESTASI PELAJAR BAGI TOPIK: <?= $infoTopik['topik']; ?></strong></p></td>
                </tr>
                <table width="800" border="0">
                    <tr>
                        <td width="10"><b>Bil.</b></td>
                        <td width="500"><b>Nama Pelajar</b></td>
                        <td width="120"><b>Skor Tertinggi</b></td>
                        <td width="80"><b>Bil. Ujian</b></td>
                    </tr>
                    <?php
                    $no=1;
                    //SQL CODE, student with 1 mark n above
                    $rekod=mysqli_query($hubung,"SELECT idpengguna,idtopik,MAX(markah_didapat),COUNT(idpengguna) as 'bil' FROM perekodan WHERE idtopik='$topik_pilihan' GROUP BY idpengguna HAVING MAX(markah_didapat)>=1");
                    while($infoRekod=mysqli_fetch_array($rekod)):
                        $pelajar=mysqli_query($hubung,"SELECT * FROM pengguna WHERE idpengguna='$infoRekod[idpengguna]'");
                        $infoPelajar=mysqli_fetch_array($pelajar);
                    ?>
                    <tr style="font-size: 16px;">
                        <td><?= $no; ?></td>
                        <td><?= $infoPelajar['nama']; ?></td>
                        <td><?= $infoRekod['MAX(markah_didapat)']; ?></td>
                        <td><?= $infoRekod['bil']; ?></td>
                    </tr>
                    <?php
                    $no++;
                    endwhile;
                    ?>
                    <tr>
                        <td colspan=4>
                        <h5 style="text-align: center;">Laporan tamat di sini. <br>
                            Jumlah Rekod:<?= $no-1; ?>
                        </h5><br>
                        </td>
                    </tr>
                </table>
                
            </table>
        </main>
        
        <a href="index2.php">Home</a>
        <a href="javascript:window.print()">Cetak Laporan</a>
        <a href="logout.php">Logout</a>
        <?php include 'footer.php'; ?>
    </body>
</html>