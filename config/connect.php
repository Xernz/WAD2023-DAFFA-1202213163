<!-- File ini berisi koneksi dengan database MySQL -->
<?php 
$host = "localhost";
$user = "root";
$password= "";
$db="modul4";
// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$conn = new mysqli($host, $user, $password, $db);
// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully<br>";
// 
?>