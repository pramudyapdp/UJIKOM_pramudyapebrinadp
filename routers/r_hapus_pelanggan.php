<?php

require '../controllers/koneksi.php';


if (isset($_POST['hapuspelanggan'])) {
    $idpelanggan = $_POST['idpelanggan'];

    // Hapus produk
    $delete_produk = mysqli_query($c, "DELETE FROM pelanggan WHERE idpelanggan = '$idpelanggan'");

    if ($delete_produk) {
        echo '<script>alert("Pelanggan berhasil dihapus!");</script>';
        echo '<script>window.location.href = "../views/pelanggan.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus pelanggan!");</script>';
        echo '<script>window.location.href = "../views/pelanggan.php";</script>';
    }
} else {
    echo '<script>window.location.href = "../views/pelanggan.php";</script>';
}
?>
