<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
include("navbar.php");
include("connect.php");
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
function dataUpdate($nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil){
    global $connect;
    global $id;
    $sql_update="UPDATE showroom_mobil SET nama_mobil='$nama_mobil', brand_mobil='$brand_mobil', warna_mobil='$warna_mobil', tipe_mobil='$warna_mobil' WHERE id = '$id'";
    if (mysqli_query($connect, $sql_update)) {
        echo "Data berhasil di update";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
}
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil

        // Eksekusi perintah SQL

        // Buatkan kondisi jika eksekusi query berhasil
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya

    // Panggil fungsi update dengan data yang sesuai
dataUpdate($_POST['nama_mobil'], $_POST['brand_mobil'], $_POST['warna_mobil'], $_POST['tipe_mobil']);
mysqli_close($connect);
// Tutup koneksi ke database setelah selesai menggunakan database

?>