<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
include("navbar.php");
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include("connect.php");
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];
    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
$sql_delete = "DELETE FROM showroom_mobil WHERE id = '$id'";
    // (4) Buatkan perkondisi jika eksekusi query berhasil
if (mysqli_query($connect, $sql_delete)) {
    echo "Data berhasil di hapus";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
?>