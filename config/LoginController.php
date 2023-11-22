<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {

    // (1) Panggil variabel global $db dari file config
    global $conn;
    // 

    // (2) Ambil nilai input dari form login
        // a. Ambil nilai input email
        $email = $input['email'];
        // b. Ambil nilai input password
        $pass = $input['password'];
    // 

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama
    $check_email = "SELECT * from users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_email);
    // 

    // (4) Buatlah perkondisian ketika email ditemukan ( gunakan mysqli_num_rows == 1 )
    if(mysqli_num_rows($check_result)==1){
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $data = mysqli_fetch_assoc($check_result);
        // 
        // b. Lakukan verifikasi password menggunakan fungsi password_verify
        if(password_verify($pass, $data['password'])){
            // c. Set variabel session dengan key login untuk menyimpan status login
            $_SESSION['login'] = true;
            // d. Set variabel session dengan key id untuk menyimpan id user
            $_SESSION['id'] = $data["id"];}
            var_dump($data);
            //
            // e. Buat kondisi untuk mengecek apakah checkbox "remember me" terisi kemudian set cookie dan isi dengan id
            if(isset($_POST['remember'])){
                setcookie("id", $data["id"]);
            }
            // 
        // f. Buat kondisi else dan isi dengan variabel session dengan key message untuk meanmpilkan pesan error ketika password tidak sesuai
        }else{
            $_SESSION['message'] = 'password salah';
            $_SESSION['color'] = 'danger';
        }
        // 
    //
    // (5) Buat kondisi else, kemudian di dalamnya
    //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
    // 
}
// 
// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $db dari file config
    global $conn;
    // 
    // (7) Ambil nilai cookie yang ada
    $id = $cookie['id'];
    // 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    $check_id = "SELECT * FROM users WHERE id = 'id'";
    $result = mysqli_query($conn, $check_id);
    // 

    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
    if(mysqli_num_rows($result)==1){
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $data = mysqli_fetch_assoc($result);
        // b. Set variabel session dengan key login untuk menyimpan status login
        $_SESSION["login"] = true;
        // c. Set variabel session dengan key id untuk menyimpan id user
        $_SESSION["id"] = $data['id'];
    }  
    
    // 
}
// 
?>