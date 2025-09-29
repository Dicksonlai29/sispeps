<?php
// must need these two file
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
$nokp=$_SESSION['idpengguna'];
?>
<html>
    <body>
        <header><?php include 'menu.php'; ?></header>
        <h2 class="title" style="text-align: center;"><?= $pengguna;?></h2>
        <main>
            <table width="100%" border="0" align="center">
                <tr>
                    <td class="body">
                        <h3><b>* SELAMAT DATANG *</b></h3>
                        <p >
                            <!--Show user full info-->
                            <?php $dataA=mysqli_query($hubung,"SELECT * FROM pengguna WHERE idpengguna='$nokp'");
                            $infoA=mysqli_fetch_array($dataA);
                            ?>
                            Nama Anda: <?= $infoA["nama"]; ?> <br>
                            Nombor KP: <?= $infoA["idpengguna"]; ?> <br>
                        </p>
                        <br>
                        <?php if ($pengguna=="DASHBOARD ADMIN"){ ?>
                            <a class="btn" href="laporan_statistik.php">Statistik</a>
                        <?php }elseif($pengguna=="DASHBOARD GURU"){ ?>
                            <a class="btn" href="pilih_subjek.php">+ Bina</a>
                        <?php }else{ ?>
                            <a class="btn" href="kuiz_subjek.php">Jawab</a>   
                        <?php }?> 
                    </td>
                </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>