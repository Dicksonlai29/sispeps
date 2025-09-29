<?php
//connect to database, it's a requirement
require 'sambung.php';
//print header
include 'header.php';

//user info is stored in superglobal $_POST
if (isset($_POST['idpengguna'])){
    //variable to hold the data first
    $idpengguna=$_POST['idpengguna'];
    $password=$_POST['password'];
    $nama=$_POST['nama'];
    $jantina=$_POST['jantina'];
    $aras=$_POST['aras'];

    //Check
    if (strlen($idpengguna)==12){ 
		//Insert record
		$daftar="INSERT INTO pengguna (idpengguna,password,nama,jantina,aras)
			VALUES ('$idpengguna','$password','$nama','$jantina','$aras')";

		//Execute query
		$hasil= mysqli_query($hubung,$daftar);
		if (!$hasil){
			echo "<script>alert('Pendaftaran gagal');
			window.location='daftar_baru.php'</script>";
		}else{
			echo "<script>alert('Pendaftaran berjaya');
			window.location='login.php'</script>";
		}
    }else{
        echo "<script>alert('Pendaftaran gagal');
        window.location='daftar_baru.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head><?php include 'menu1.php'; ?></head>
    <body>
        <div class="page">
        <div class="negative-space2">

        </div>
        <div class="enterform">
            <h1 class="title">Pendaftaran Pengguna Baharu</h1>
            <main>
            <table width=70% border=0 align="center">
                <tr>
                    <td>
                        <!--Print the Registration Form-->
                        <form method="POST">
                            <label>No. K/P:</label>
                            <br>
                            <input onblur="checkLength(this)" type="text" name="idpengguna" placeholder="Tanpa tanda -" 
                             maxlength="12" size="25" onkeypress="return event.charCode>=48&&event.charCode<=57" required autofocus />
                            <br><br>
                            <label>Kata Laluan:</label>
							<br>
                            <input type="password" name="password" id="password" placeholder="4 digit sahaja" 
                            maxlength="4" size="10" onkeypress="return event.charCode>=48&&event.charCode<=57" required />
                            <br><br>
							<label>Nama Pelajar:</label>
							<br>
							<input type="text" name="nama" placeholder="Nama Penuh Anda" size="70" required>
							<br><br>
                            <label>Jantina:</label>
							<br>
                            <select name="jantina">
                                <option value="LELAKI">LELAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                            <br><br>
                            <label>Aras Pengguna:</label>
							<br>
                            <select name="aras">
                                <option value="PELAJAR">PELAJAR</option>
                                <option value="GURU">GURU</option>
                            </select>
                            <br><br>
                            <p style="color: red;">*Sila pastikan maklumat anda betul sebelum mendaftarkan akaun anda.</p><br>
                            <button class="btn" type="reset" value="Reset" >Reset</button>
                            <button class="btn" type="submit">Daftar</button>
                

                        </form>
                    </td>
                </tr>
            </table>
            </main>
            <?php include 'footer.php'; ?>
        </div>
        </div>
        <script>
            function checkLength(param){
                if (param.value.length !=12){
                    alert("Nombor KP hanya mempunyai 12 digit.");
                }
            }
        </script>
    </body>
</html>