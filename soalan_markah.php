<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//Query soalan
$query="INSERT INTO perekodan (idperekodan,idpengguna,idtopik,jenis,markah_didapat,masa) values(NULL, '$_SESSION[idpengguna]','$_SESSION[pilih_topik]','$_SESSION[jenis_soalan]','$_SESSION[score]',NULL) ";
$insert_row=mysqli_query($hubung,$query);
?>
<html>
    <body>
        <h2 class="title" style="text-align: center;">SOALAN TAMAT</h2>
        <main>
            <table class="body" width=70% border=0 align="center" style="font-size: 16px;">
                <tr>
                    <td>
                        <p>Tahniah! Anda telah selesai menjawab semua soalan.</p>
                        <p>Bilangan Betul: <?=$_SESSION['score']; ?></p>
                    </td>
                      
                </tr>
                <tr>
                    <td class="action">
                        <button class="btn sub" onclick="window.location.href='soalan_papar.php?n=1'">Cuba lagi</button>
                        <button class="btn main" onclick="window.location.href='skor_individu.php'">Prestasi</button>
                        <?php $_SESSION['score']=0; ?>
                    </td>
                </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>
