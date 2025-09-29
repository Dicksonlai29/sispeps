<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">SENARAI SUBJEK</h2>
        <main>
            <table class="table" style="font-size: 16px;">
                <tr>
                    <td width="5%"><strong>Bil.</strong></td>
                    <td width="60%"><strong>Nama Subjek</strong></td>
                    <td width="5%"><strong>Tindakan</strong></td>
                </tr>
                <?php
                $no=1;
                $data1=mysqli_query($hubung,"SELECT * FROM subjek ORDER BY subjek ASC");
                while ($info1=mysqli_fetch_array($data1)):
                    $dataBil=mysqli_query($hubung,"SELECT COUNT(idsubjek) AS 'bil' FROM topik WHERE idsubjek='$info1[idsubjek]'");
                    $infoBil=mysqli_fetch_array($dataBil);
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $info1['subjek']; ?></td>
                    <td align="center" class="action">
                        <?php if($infoBil['bil']!==0):
                        ?>
                        <a href="kuiz_topik.php?idsubjek=<?=$info1['idsubjek'];?>"><button class="btn main">PILIH</button></a>
                        <?php endif; ?>
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