<?php
require 'sambung.php';
require 'keselamatan.php';
?>

<html>
    <title><?= $nama_sistem; ?></title>
    <body>
        <table width="800" border="0">
            <tr>
                <td width="800">
                    <table width="800">
                        <tr>
                            <td width="80" valign="top">
                                <img src="<?= $logo; ?>" width="100" height="102" hspace="7" align="left" />
                            </td>
                            <td><h5><?= $nama_sekolah; ?></h5></td>
                        </tr>
                        <tr>
                            <td colspan="3" valign="top"><hr /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong>LAPORAN: BILANGAN SOALAN MENGIKUT TOPIK BAGI SEMUA SUBJEK</strong></p>
                    <table width="800" border="0" align="center">
                </td> <!--this two line is really suspicious please check later-->
            </tr>
                        <tr>
                            <td width="30"><strong>Bil.</strong></td>
                            <td width="250"><strong>Subjek</strong></td>
                            <td width="400"><strong>Topik</strong></td>
                            <td width="70"><strong>Format</strong></td>
                            <td width="50"><strong>Soalan</strong></td>
                        </tr>
                        <?php
                        $no=1;
                        $rekod=mysqli_query($hubung,"SELECT * FROM topik");
                        while ($inforekod=mysqli_fetch_array($rekod)):
                            //connect to table of soalan
                            $soalan=mysqli_query($hubung,"SELECT idtopik,jenis,COUNT(idtopik) as 'bil' FROM soalan WHERE idtopik='$inforekod[idtopik]'");
                            $infosoalan=mysqli_fetch_array($soalan);

                            //connect to table of subjek
                            $subjek=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek='$inforekod[idsubjek]'");
                            $infosubjek=mysqli_fetch_array($subjek);
                        
                        ?>
                        <tr style="font-size: 16px;">
                            <td><?= $no; ?></td>
                            <td><?= $infosubjek['subjek']; ?></td>
                            <td><?= $inforekod['topik']; ?></td>
                            <td align="center"><?php if($infosoalan['jenis']===1){
                                echo "MCQ/TF";
                            }else{
                                echo "FIB";
                            } ?>
                            </td>
                            <td><?= $infosoalan['bil']; ?></td>
                        </tr>
                        <?php $no++; endwhile; ?>
                    </table>
			<h5 style="text-align: center;">Laporan tamat di sini. <br>
            Jumlah Rekod:<?= $no-1; ?>
			</h5>
        </table>
        <a href="index2.php">Home</a>
        <a href="javascript:window.print()">Cetak Laporan</a>
        <a href="logout.php">Logout</a>
        <?php include 'footer.php'; ?>
    </body>
</html>