<?php

require 'connect.php';

// (1) Mulai session
session_start();
//

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    $email = $_POST['email'];
    // b. Ambil nilai input name
    $name = $_POST['name'];
    // c. Ambil nilai input username
    $username = $_POST['username'];
    // d. Ambil nilai input password
    $pass = $_POST['password'];
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    //password_hash($pass, );
//

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
$check_email = "SELECT * from users WHERE email = '$email'";
$check_result = mysqli_query($conn, $check_email);
//

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
if(mysqli_num_rows($check_result)==0){
    // a. Buatlah query untuk melakukan insert data ke dalam database
    $regist_query= "INSERT INTO users (email, name, username, password) VALUES ('$email', '$name', '$username', '$pass')";
    $insert_regist= mysqli_query($conn, $regist_query);
    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    if($insert_regist){
        $_SESSION['message']='Registrasi sukses, silahkan login dengan user yang terdaftar';
        header('location:../views/register.php');
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
// 
    } else{
        $_SESSION['message']='Registrasi gagal';
        header('location:../views/register.php');
    }
// (5) Buat juga kondisi else
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
//
}else{
    $_SESSION['message']='Registrasi gagal, Email telah terdaftarkan';
    header('location:../views/register.php');
}
?>