<?php
require '../controllers/koneksi.php';

if (isset($_POST['hapuspenjualan'])) {
    $idpenjualan = $_POST['idpenjualan'];

    
    $delete_penjualan = mysqli_query($c, "DELETE FROM penjualan WHERE idpenjualan = '$idpenjualan'");


    if ($delete_penjualan) {
        echo '<script>alert("Data berhasil dihapus!");</script>';
        echo '<script>window.location.href = "../views/penjualan.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data!");</script>';
        echo '<script>window.location.href = "../views/penjualan.php";</script>';
    }
} else {
    echo '<script>window.location.href = "../views/penjualan.php";</script>';
}
?>