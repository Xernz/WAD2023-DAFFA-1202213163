<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost";
$username = "root";
$password = "";
$database = "jurnal modul 3";
// 

// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
$connect = new mysqli($host, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully<br>";
// 
?>