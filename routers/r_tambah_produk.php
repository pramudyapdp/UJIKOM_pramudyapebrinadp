<?php

require '../controllers/koneksi.php';



if (isset($_POST['tambahproduk'])) {
    $namaproduk = $_POST['namaproduk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = 0;

    $insert = mysqli_query($c, "INSERT INTO produk (namaproduk, deskripsi, harga, stok) values ('$namaproduk', '$deskripsi', '$harga', '$stok') ");

    if ($insert) {
        $message = '<script>alert("Data berhasil ditambahkan");
                    window.location="../views/produk.php"</script>';
    } else {
        $message = '<script>alert("Data gagal ditambahkan")</script>;
        window.location="../views/produk.php"</script>';
    }
}


echo $message;
?>