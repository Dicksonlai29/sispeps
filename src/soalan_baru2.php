<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//value from superglobal $_GET in url
$idtopik=$_GET['idtopik'];
//total number of question
$soalan=mysqli_query($hubung,"SELECT * FROM soalan WHERE idtopik='$idtopik' AND jenis='2'");
$total=mysqli_num_rows($soalan);
$next=$total+1;

//added part so it could link to papar_topik.php later
$topik=mysqli_query($hubung,"SELECT * FROM topik WHERE idtopik='$idtopik'");
$infoTopik=mysqli_fetch_array($topik);
$idsubjek=$infoTopik['idsubjek'];
?>

<html>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    function add_row(){
        $rowno=$("#jawapan tr").length;
        $rowno=$rowno+1;
        $("#jawapan tr:last").after("<tr id='row"+$rowno+"'><td><input id='ruangjawapan' type='text' name='idJAWAPAN1[]' placeholder='Taip Cadangan Jawapan' size='70%'></td> <td><input type='text' name='idTOPIK[]' value='<?= $idtopik;?>' size='60%' hidden></td> <td><input class='button btn' type='button' value='BUANG' onclick=delete_row('row"+$rowno+"')></td></tr>");
        /*
        <tr id='row"+$rowno+"'>
        <td><input type='text' name='idJAWAPAN1[]' placeholder='Taip Cadangan Jawapan' size='70%'></td> 
        <td><input type='text' name='idTOPIK[]' value='<?= $idtopik;?>' size='60%' hidden></td> 
        <td><input class='button 'type='button' value='BUANG' onclick='delete_row('row"+$rowno+"')'></td>
        </tr>");*/
    }
    function delete_row(rowno){
            $('#'+rowno).remove();
        }
    </script>
    <head>
        <?php include 'menu.php'; ?>
    </head>
    <body>
        <h2 class="title" style="text-align: center;">TAMBAH SOALAN BARU</h2>
        <main>
            <form method="POST" enctype="multipart/form-data" action="soalan_proses.php">
                <table class="quiz">
                    <tr>
                        <td><label>Topik:</label></td>
                        <td><input id="nama" type="text" value="<?= $infoTopik['topik']; ?>" name="topik" readonly /></td>
                    <tr>
                    <tr>
                        <td><label for="bil">Bilangan Soalan:</label><br><br></td>
                        <td><input id="bil" type="text" value="<?= $next; ?>" name="bilangan" size="2%" readonly />
                            <input type="text" value="<?= $idtopik; ?>" name="idtopik" hidden /></td>
                    </tr>
                    <tr>
                        <td><label for="paparan_soalan">Soalan:</label><br><br></td>
                        <td><textarea id="paparan_soalan" name="paparan_soalan" rows=7 cols=105 required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="gambar">Gambar:<br>
                                <small style="color: red;">*Jika perlu</small>
                            </label></td>
                        <td><input id="gambar" type="file" name="gambar" /></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Cadangan Jawapan:<br>
                                <small>*Boleh tambah jawapan yang mungkin</small>
                            </label>
                        </td>
                        <td colspan=2>
                            <table id="jawapan" border=0> 
                            <tr id='row1'>
                                
                                    <td><input id="ruangjawapan" type="text" name="idJAWAPAN1[]" placeholder="Taip Cadangan Jawapan" size="70%"></td>
                                    <td><input type='text' name='idTOPIK[]' value='<?= $idtopik;?>' size='60%' hidden></td> 
                            </tr>
                            </table>
                        </td>
                    </tr>
                        
                    <tr>
                        <td colspan=2>
                                   <fieldset class="action"><legend>MENU</legend>
                                    <input class='button btn sub' type='button' value='Tambah Jawapan' onclick='add_row()'>
                                    <input class='button btn main' type='submit' name='submit' value='Simpan'>
                                    <button class="btn sub" onclick="window.location.href='papar_topik.php?idsubjek=<?=$idsubjek;?>'">Tamat</button>
                                    </fieldset> 
                        </td>
                    </tr>
                </table>
            </form>
    
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>