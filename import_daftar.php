<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<html>
    <head><?php include 'menu.php'; ?></head>
    <body>
        <h2 class="title" style="text-align: center;">IMPORT NAMA PELAJAR DARI FAIL CSV</h2>
        <main>
            <table class="table">
                <tr>
                    <td>
                        <label>Kemudahan untuk daftar nama pelajar secara berkelompok</label>
                        <br>
                        <label>Pilih lokasi fail CSV/Excel:</label>
                        <!-- UPLOAD THE CSV FILE-->
                        <form action="import_csv.php" method="POST" name="upload_excel" enctype="multipart/form-data">
                            <input type="file" name="file" id="file" class="input-large" >
                            <br>
                            <button class="btn" type="submit" id="submit" name="import">Upload</button>
                        </form>
                    </td>
                </tr>  
                <tr>
                    <td>
                        *Cipta fail dalam Ms Excel dan save as csv mengikut aturan lajur seperti di bawah:
                        <br><br>
                        <table width="70%" border="1" align="center">
                            <tr>
                                <td>040305071454</td>
                                <td>1234</td>
                                <td>RAMELIA CHUA</td>
                                <td>PEREMPUAN</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>