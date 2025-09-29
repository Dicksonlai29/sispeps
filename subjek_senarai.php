<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">SENARAI SUBJEK BERDAFTAR</h2>
        <main>
            <table class="table" style="text-align: left" width=70% border=0 align="center">
                <tr>
                    <td colspan="3" valign="middle" align="right">
                        <!--table head-->
                        <strong><a href="subjek_daftar.php"><button class="btn main">Daftar Subjek</button></a></strong>
                    </td>
                </tr>
                <tr>
                    <td width="2%"><strong>Bil.</strong></td>
                    <td width="40%"><strong>Nama Subjek</strong></td>
                    <td width="22%"><strong>Tindakan</strong></td>
                </tr>
                <?php
                $no=1;
                $data1=mysqli_query($hubung,"SELECT * FROM subjek ORDER BY subjek ASC");
                while ($info1=mysqli_fetch_array($data1)):
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $info1['subjek']; ?></td>
                    <td class="action">
                        <a href="edit_subjek.php?idsubjek=<?=$info1['idsubjek']; ?>" onclick="return confirm('Anda Pasti?')">
                            <button class="btn main" style="float:center;">Edit</button>
                        </a>
                        <a href="hapus_subjek.php?idsubjek=<?=$info1['idsubjek']; ?>" onclick="return confirm('Awas! Topik, soalan, jawapan akan dihapuskan. Anda Pasti?')">
                            <button class="btn sub" style="float:center;">Hapus</button>
                        </a>
                    </td>   
                </tr>
                <?php $no++; 
                endwhile;
                ?>
            </table>
        </main>
        <p style="font-size:14px;">Senarai telah tamat di sini. <br>
        Jumlah Rekod:<?= $no-1; ?>
        </p>
        <?php include 'footer.php'; ?>
    </body>
</html>