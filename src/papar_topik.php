<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//Get idsubjek
$subjek_pilihan=$_GET['idsubjek'];
$guru=$_SESSION['idpengguna'];
//connect to table
$result=mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek='$subjek_pilihan'");
while ($res=mysqli_fetch_array($result)){
    $paparsubjek=$res['subjek'];
}
?>

<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">SENARAI TOPIK: SUBJEK <?=$paparsubjek; ?></h2>
        <main class="body">
            <table  width="100%" border="0" align="center" style="font-size: 16px;">    
                <tr>
                    <td width="2%">Bil.</td>
                    <td width="40%">Nama Topik</td>
                    <td width="15%">Tambah Soalan</td>
                    <td width="25%">Soalan</td>
                    <td width="18%">Topik</td>
                </tr>
                <?php
                $no=1;
                $data1=mysqli_query($hubung,"SELECT * FROM topik WHERE idsubjek='$subjek_pilihan' AND idpengguna='$guru'");
                while($info1=mysqli_fetch_array($data1)):
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $info1['topik']; ?></td>
                    <td class="action">
                        <a href="soalan_baru1.php?idtopik=<?=$info1['idtopik'];?>"><button class="btn main">MCQ</button></a>
                        <a href="soalan_baru2.php?idtopik=<?=$info1['idtopik'];?>"><button class="btn main">FIB</button></a>
                    </td>
                    <td class="action">
                        <a href="papar_soalan.php?idtopik=<?=$info1['idtopik'];?>&n=1&jenis_soalan=1"><button class="btn sub">PAPAR MCQ</button></a>
                        <a href="papar_soalan.php?idtopik=<?=$info1['idtopik'];?>&n=1&jenis_soalan=2"><button class="btn sub">PAPAR FIB</button></a>
                    </td>
                    <td class="action">
                        <a href="edit_topik.php?idtopik=<?=$info1['idtopik'];?>"><button class="btn sub">EDIT</button></a>
                        <a href="hapus_topik.php?idtopik=<?=$info1['idtopik'];?>" onclick="return confirm('Awas! Soalan, jawapan akan dihapuskan. Anda Pasti?')"><button class="btn sub">HAPUS</button></a>
                    </td>
                </tr>
            <?php $no++; 
            endwhile; ?> 
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