<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)
            $sql_select= mysqli_query($connect, "SELECT * FROM showroom_mobil");
            $datas = mysqli_fetch_assoc($sql_select);
     
            // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan dalam bentuk tabel 
            //       (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id
            // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel'

            //<!--  **********************  1  **************************     -->
            if($sql_select): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Mobil</th>
                                <th>Brand Mobil</th>
                                <th>Warna Mobil</th>
                                <th>Tipe Mobil</th>
                                <th>Harga Mobil</th>
                            </tr>
                        <tbody>
                            <?php foreach ($datas as $result):?>
                                <tr>
                                    <td><?php $result['nama_mobil']; ?></td>
                                    <td><?php $result['brand_mobil']; ?></td>
                                    <td><?php $result['warna_mobil']; ?></td>
                                    <td><?php $result['tipe_mobil']; ?></td>
                                    <td><?php $result['harga_mobil']; endforeach; ?></td>
                                    <td><a href="/WAD/JURNAL MODUL 3/form_detail_mobil" type="button" class="btn btn-outline-primary">Details</a></td>
                                </tr>
                        </tbody>
                    </table>
            <?else : echo "Tidak ada data dalam tabel";?>
            <?php endif; ?>
            
            







            //<!--  **********************  1  **************************     -->

            //<!--  **********************  2  **************************     -->

            
            

            
            
            //<!--  **********************  2  **************************     -->
            ?>
        </div>
    </center>
</body>
</html>
