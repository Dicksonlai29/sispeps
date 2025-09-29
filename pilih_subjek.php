<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">SENARAI SUBJEK</h2>
        <main class="body">
            <table width="100%" >
            <tr>
                <td width="2%">Bil</td>
                <td width="50%">Subjek</td>
                <td width="48%">Pengurusan</td>
            </tr>
            <?php
            $no=1;
            $data1=mysqli_query($hubung,"SELECT * FROM subjek");
            while($info1=mysqli_fetch_array($data1)):
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $info1['subjek']; ?></td>
                <td class="action" align="center">
                    <a href="papar_topik.php?idsubjek=<?=$info1['idsubjek']; ?>">
                        <button class="btn main">Papar</button>
                    </a>
                    <a href="tambah_topik.php?idsubjek=<?=$info1['idsubjek']; ?>">
                        <button class="btn sub">Tambah</button>
                    </a>
                </td> 
            </tr>
            <?php $no++; 
            endwhile; ?> 
        </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>