<?php

require '../controllers/koneksi.php';

if (isset($_POST['editpelanggan'])) {
    $idpelanggan = $_POST['idpelanggan'];
    $namapelanggan = $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];

    // Update produk
    $update_pelanggan = mysqli_query($c, "UPDATE pelanggan SET namapelanggan = '$namapelanggan', alamat = '$alamat', nohp = '$nohp' WHERE idpelanggan = '$idpelanggan'");

    if ($update_pelanggan) {
        echo '<script>alert("Pelanggan berhasil diperbarui!");</script>';
        echo '<script>window.location.href = "../views/pelanggan.php";</script>';
    } else {
        echo '<script>alert("Gagal memperbarui pelanggan!");</script>';
        echo '<script>window.location.href = "../views/pelanggan.php";</script>';
    }
} else {
    echo '<script>window.location.href = "../views/pelanggan.php";</script>';
}
?>
