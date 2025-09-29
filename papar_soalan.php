<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<?php //session_start();?>
<?php
//Get idtopik
$topik_pilihan=$_GET['idtopik'];

$jenis=$_GET['jenis_soalan'];
//Table topik
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik=$topik_pilihan");
$getTopik=mysqli_fetch_array($dataTopik);
//Total num of question
$results=mysqli_query($hubung,"SELECT * FROM soalan WHERE idtopik=$topik_pilihan AND jenis=$jenis");
$total=mysqli_num_rows($results);

//Set bilangan
$number = (int)$_GET['n'];

//Get & print Soalan
$results2=mysqli_query($hubung,"SELECT * FROM soalan WHERE bilangan=$number AND idtopik=$topik_pilihan AND jenis=$jenis");
$question=mysqli_fetch_assoc($results2);
//Get & print Pilihan
$pilihan=mysqli_query($hubung,"SELECT * FROM pilihan WHERE bilangan=$number AND idsoalan='$question[idsoalan]'");
?>

<html>
    <head> <?php include 'menu.php'; ?> </head>
    <body>
        <h2 class="title" style="text-align: center;">TOPIK: <?= $getTopik['topik']; ?></h2>
        <main>
            <table class="table" width="70%" border="0" align="center">
            <tr>
                <td>
                
                <?php
                    echo "Sila baca soalan dengan teliti";
                ?>
                </td>        
            </tr>
            <tr>
                <td>
                    
                    Soalan <?= $number; ?> dari <?= $total; ?>
                    <br><br>
                    <?= $question['item']; ?>
                    <br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    if ($question['gambar']==NULL){
                    }else{
                        echo "<img src='gambar/".$question['gambar']."' width='30%' height='30%'/> <br><br>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td >
                    <?php
                        if($question['jenis']==1){
                    ?>
                    <ul><?php
                        while($row=mysqli_fetch_assoc($pilihan)):
                    ?>
                        <li><input name="choice" type="radio" value="<?= $row['idpilihan']; ?>" required/>
                            <?= $row['jawapan'];?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php
                        } else{
                    ?>
                    <div class="answer-section">
                        <input id="ruangjawapan" type="text" name="idJAWAPAN" placeholder="Taip jawapan di sini." size="70%" />
                    </div>
                    <?php } ?>
                </td>
            </tr> 
            <tr>                       
                <td>
                    <fieldset class="action">
                        <input class="btn sub" type="button" value="BALIK" onclick="history.back()" />
                        <a href="papar_soalan.php?idtopik=<?=$topik_pilihan;?>&n=<?=$number+1;?>&jenis_soalan=<?=$jenis;?>"><button class="btn sub">NEXT</button></a>
                        <a href="edit_soalan.php?idsoalan=<?=$question['idsoalan'];?>"><button class="btn main">EDIT</button></a>
                        <a href="hapus_soalan.php?idsoalan=<?=$question['idsoalan'];?>"><button class="btn sub">HAPUS</button></a>
                        </fieldset>
                </td>
            </tr>
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>
