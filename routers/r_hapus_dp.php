<?php

require '../controllers/koneksi.php';

if (isset($_GET['idetail']) && isset($_GET['idp'])) {
    $idetail = $_GET['idetail'];
    $idp = $_GET['idp'];

    // Get the product details before deletion
    $get_product = mysqli_query($c, "SELECT idproduk, jumlahproduk FROM detailpenjualan WHERE iddetail='$idetail'");
    $product_details = mysqli_fetch_array($get_product);

    $idproduk = $product_details['idproduk'];
    $jumlahproduk = $product_details['jumlahproduk'];

    // Delete the purchase
    $delete_purchase = mysqli_query($c, "DELETE FROM detailpenjualan WHERE iddetail='$idetail'");

    // Restore the stock
    $update_stock = mysqli_query($c, "UPDATE produk SET stok = stok + '$jumlahproduk' WHERE idproduk='$idproduk'");

    if ($delete_purchase && $update_stock) {
        echo '<script>alert("Data berhasil dihapus!");</script>';
        echo '<script>window.location.href = "../views/detailpenjualan.php?idp=' . $idp . '";</script>';
    } else {
        echo '<script>alert("Data gagal dihapus!");</script>';
        echo '<script>window.location.href = "../views/detailpenjualan.php?idp=' . $idp . '";</script>';
    }
} else {
    echo '<script>window.location.href = "../views/detailpenjualan.php";</script>';
}

?>
