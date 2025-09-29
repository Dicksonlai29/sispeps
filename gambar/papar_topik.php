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
    <title><?php include 'menu.php'; ?></title>
    <body>
        <h2 style="text-align: center;">SENARAI TOPIK: SUBJEK<?=$paparsubjek; ?></h2>
        <main>
            <table width="70%" border="0" align="center" style="font-size: 16px;">
            <tr>
                <td>
                    <form method="POST" action="tambah_topik.php">
                        <tr>
                            <td width="2%">Bil.</td>
                            <td width="44%">Nama Topik</td>
                            <td width="5%">Tambah Soalan</td>
                            <td width="7%">Soalan</td>
                            <td width="7%">Topik</td>
                        </tr>
                        <?php
                        $no=1;
                        $data1=mysqli_query($hubung,"SELECT * FROM topik WHERE idsubjek='$subjek_pilihan' AND idpengguna='$guru'");
                        while($info1=mysqli_fetch_array($data1)):
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $info1['topik']; ?></td>
                            <td>
                                <a href="soalan_baru1.php?idtopik=<?=info1['idtopik'];?>"><button>MCQ</button></a>
                                <a href="soalan_baru2.php?idtopik=<?=info1['idtopik'];?>"><button>FIB</button></a>
                            </td>
                            <td><a href="papar_soalan.php?idtopik=<?=info1['idtopik'];?>"><button>PAPAR</button></a></td>
                            <td>
                                <a href="edit_topik.php?idtopik=<?=info1['idtopik'];?>"><button>EDIT</button></a>
                                <a href="hapus_topik.php?idtopik=<?=info1['idtopik'];?>"><button>HAPUS</button></a>
                            </td>
                        </tr>
            <?php $no++; 
            endwhile; ?> 
        </table>
        </main>
        <p style="font-size:14px;">Senarai telah tamat di sini. <br>
            Jumlah Rekod:<?= $no-1; ?>
        </p>
        <?php include 'footer.php'; ?>
    </body>
</html>