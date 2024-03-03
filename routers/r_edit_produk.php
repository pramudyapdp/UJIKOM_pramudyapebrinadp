<?php

require '../controllers/koneksi.php';

if (isset($_POST['editProduk'])) {
    $idproduk = $_POST['idproduk'];
    $namaproduk = $_POST['namaproduk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Update produk
    $update_produk = mysqli_query($c, "UPDATE produk SET namaproduk = '$namaproduk', deskripsi = '$deskripsi', harga = '$harga' WHERE idproduk = '$idproduk'");

    if ($update_produk) {
        echo '<script>alert("Donut berhasil diperbarui!");</script>';
        echo '<script>window.location.href = "../views/produk.php";</script>';
    } else {
        echo '<script>alert("Gagal memperbarui donut!");</script>';
        echo '<script>window.location.href = "../views/produk.php";</script>';
    }
} else {
    echo '<script>window.location.href = "../views/produk.php";</script>';
}
?>
