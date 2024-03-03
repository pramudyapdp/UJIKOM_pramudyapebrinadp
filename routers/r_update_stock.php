<?php

require '../controllers/koneksi.php';

if (isset($_POST['updateStock'])) {
    $idproduk = $_POST['idproduk'];
    $newStock = $_POST['newStock'];

    // Update stok pada produk
    $update_stock = mysqli_query($c, "UPDATE produk SET stok = '$newStock' WHERE idproduk = '$idproduk'");

    if ($update_stock) {
        echo '<script>alert("Stok berhasil diperbarui!");</script>';
        echo '<script>window.location.href = "../views/stock.php";</script>';
    } else {
        echo '<script>alert("Gagal memperbarui stok!");</script>';
        echo '<script>window.location.href = "../views/stock.php";</script>';
    }
} else {
    echo '<script>window.location.href = "../views/stock.php";</script>';
}
?>
