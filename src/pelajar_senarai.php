<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">SENARAI PELAJAR BERDAFTAR</h2>
        <main>
            <table class="table">
                    <tr>
                        <td width="2%">Bil.</td>
                        <td width="24%">ID Pelajar</td>
                        <td width="5%">Password</td>
                        <td width="27%">Nama Pelajar</td>
                        <td width="7%">Jantina</td>
                        <td width="5%">Tindakan</td>
                    </tr>
                    <?php
                    $no=1;
                    $data1=mysqli_query($hubung,"SELECT * FROM pengguna WHERE aras='PELAJAR' ORDER BY nama ASC");
                    while($info1=mysqli_fetch_array($data1)):
                    
                    ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $info1['idpengguna']; ?></td>
                        <td><?= $info1['password']; ?></td>
                        <td><?= $info1['nama']; ?></td>
                        <td><?= $info1['jantina']; ?></td>
                        <td align="center" class="action">
                            <a  href="hapus_pelajar.php?idpengguna=<?=$info1['idpengguna']; ?>" onclick="return confirm('Awas! Semua maklumat pelajar tersebut akan dihapuskan. Anda Pasti?')">
                                <button class="btn sub">Hapus</button>
                            </a>
                        </td>   
                    </tr> 
                    <?php $no++; 
                    endwhile; ?> 
					<tr >
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