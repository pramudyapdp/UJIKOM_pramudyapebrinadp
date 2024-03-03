<?php

require '../controllers/koneksi.php';


if (isset($_POST['hapusproduk'])) {
    $idproduk = $_POST['idproduk'];

    // Hapus produk
    $delete_produk = mysqli_query($c, "DELETE FROM produk WHERE idproduk = '$idproduk'");

    if ($delete_produk) {
        echo '<script>alert("Donut berhasil dihapus!");</script>';
        echo '<script>window.location.href = "../views/produk.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus donut!");</script>';
        echo '<script>window.location.href = "../views/produk.php";</script>';
    }
} else {
    echo '<script>window.location.href = "../views/produk.php";</script>';
}
?>
