<?php 
require 'sambung.php';
include 'header.php';
?>
<html>
    <head><?php include 'menu1.php'; ?></head>
    <body>
        <div class="page">
        <div class="negative-space2">

        </div>
        <div class="enterform">
            <h1 class="title">Log Masuk Pengguna</h1>
            <main>
            <table width="70%" border="0" align="center">
                <tr>
                    <td align="center">
                        <form action="proseslogin.php" method="POST">
                            <label for="idpengguna">Nombor K/P:</label>
                            <input onblur="checkLength(this)" type="text" id="idpengguna" name="idpengguna" placeholder="Tanpa tanda -" maxlength='12' size="25" onkeypress='return event.charCode>=48 && event.charCode <= 57' required autofocus />
                            <script>
                                function checkLength(el){
                                    if (el.value.length !=12){
                                        alert("Nombor K/P mesti hanya mempunyai 12 digit sahaja.");
                                    }
                                }
                            </script>
                            <br><br>
                            <label for="idpengguna">Katalaluan: </label>
                            <input type="password" id="password" name="password" placeholder="4 Digit" maxlength="4" size="10" onkeypress='return event.charCode>=48 && event.charCode <= 57' required/> 
                            <br><br>
                            <button class="btn" type="reset">Reset</button>
                            <button class="btn" type="submit">Daftar Masuk</button>
                            <br>
                            <h5>*Jika belum mendaftar, <a href="daftar_baru.php">Daftar di sini</a></h5>
                        </form>
                        
                    </td>
                </tr>
            </table>
            </main>
            <?php include 'footer.php'; ?>
        </div>
        </div>
        
    </body>
</html>
