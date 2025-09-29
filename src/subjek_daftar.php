<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

if(isset($_POST['submit'])){
    $subjek_baru=$_POST['subjek'];
    $query="INSERT INTO subjek (subjek) values('$subjek_baru')";
    $insert_row=mysqli_query($hubung,$query);
    echo "<script>alert('Subjek baru telah ditambah'); window.location='subjek_senarai.php'</script>";
}
//Total subect
$query1="SELECT * FROM subjek";
$subjek=mysqli_query($hubung,$query1);
$total=mysqli_num_rows($subjek);
$next=$total+1;
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">DAFTAR SUBJEK</h2>
        <main>
            <form method="POST">
                <table class="quiz">
                    <tr>
                        <td align="right"><label for="bil">Bil: </label></td>
                        <td style="text-align: left;"><?= $next; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="nama">NAMA SUBJEK:</label></td>
                        <td><input id="nama" type="text" name="subjek" size="40%" required /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="action">
                            <input class="btn main" type="submit" name="submit" value="DAFTAR" />
                            <input class="btn sub" type="button" value="BALIK" onclick="history.back()" />
                        </td>
                    </tr>
                </form>   
            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>