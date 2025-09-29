<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">SENARAI GURU BERDAFTAR</h2>
        <main>
            <table class="table">
                    <tr>
                        <td width="2%">Bil.</td>
                        <td width="30%">Nama Guru</td>
                        <td width="5%">Nom K/P</td>
                        <td width="14%">Bil. Topik</td>
                        <td width="14%">Bil. Soalan</td>
                        <td width="5%">Tindakan</td>
                    </tr>
                    <?php
                    $no=1;
                    
                    $data1=mysqli_query($hubung,"SELECT * FROM pengguna WHERE aras='GURU' ORDER BY nama ASC");
                    while($info1=mysqli_fetch_array($data1)):
						$topik=mysqli_query($hubung,"SELECT idtopik,COUNT(idtopik) as 'biltopik' FROM topik WHERE idpengguna='$info1[idpengguna]'"); //delete group by idpengguna
						$infotopik=mysqli_fetch_array($topik);
                        $topik1=mysqli_query($hubung,"SELECT idtopik FROM topik WHERE idpengguna='$info1[idpengguna]'");
                        $jumlahsoalan=0;
                        while($kiraBilSoalan=mysqli_fetch_array($topik1)){
						    $soalan=mysqli_query($hubung,"SELECT idsoalan,COUNT(idsoalan) as 'bilsoalan' FROM soalan WHERE idtopik='$kiraBilSoalan[idtopik]'"); //delete group by idsoalan
						    $infosoalan=mysqli_fetch_array($soalan);
                            $jumlahsoalan=$jumlahsoalan+$infosoalan['bilsoalan'];
                        }  
                        
                        
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $info1['nama']; ?></td>
                        <td><?= $info1['idpengguna']; ?></td>
                        <td><?= $infotopik['biltopik']; ?></td>
                        <td><?= $jumlahsoalan; ?></td>
                        <td class="action" align="center">
                            <a href="hapus_guru.php?idpengguna=<?=$info1['idpengguna']; ?>" onclick="return confirm('Awas! Guru tersebut akan dihapuskan. Anda Pasti?')">
                                <button class="btn sub">Hapus</button>
                            </a>
                        </td>   
                    </tr> 
                    <?php $no++; endwhile; ?>
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