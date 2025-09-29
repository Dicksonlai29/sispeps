<?php
// Set up the database
// No need to change this
$host="localhost";
$user="root";
// leave blank
$password="";

// Database
$database="sppdb_dickson";

$hubung=mysqli_connect($host,$user,$password,$database);
if (mysqli_connect_errno()){
    echo "Proses sambung ke pangkalan data gagal. Sila cuba lagi.";
    exit();
}

$nama_sekolah="SMJK JIT SIN <br>
                Jalan Binjai, Taman Sri Rambai,<br>
                14000 Bukit Mertajam, <br>
                Pulau Pinang.";
$nama_sistem="Sistem Pengurusan dan Penilaian Subjek (SISPEPS)";
$motto="Solusi Canggih untuk Sistem Pendidikan";
$footer="Belajar Dalam Rentak Sendiri";
$logo="logo.png";
$lencana="lencana.png";
?>

