<?php

require '../controllers/koneksi.php';

// Pastikan ada data yang dikirim melalui metode POST dan ada kunci 'editPurchase'
if (isset($_POST['editDP'])) {
    // Ambil data dari formulir edit
    $idetail = $_POST['idetail'];
    $editJumlah = $_POST['editJumlah'];

    // Pastikan data yang diperlukan tidak kosong
    if ($idetail && $editJumlah) {
        // Dapatkan detail produk sebelum diubah
        $get_product = mysqli_query($c, "SELECT idproduk, jumlahproduk FROM detailpenjualan WHERE iddetail='$idetail'");
        $product_details = mysqli_fetch_array($get_product);

        $idproduk = $product_details['idproduk'];
        $oldJumlah = $product_details['jumlahproduk'];

        // Hitung selisih jumlah produk baru dan lama
        $selisihJumlah = $editJumlah - $oldJumlah;

        // Lakukan proses edit pada detailpenjualan
        $query_edit = "UPDATE detailpenjualan SET jumlahproduk = '$editJumlah' WHERE iddetail = '$idetail'";

        if (mysqli_query($c, $query_edit)) {
            // Perbarui stok produk
            $query_update_stock = "UPDATE produk SET stok = stok - '$selisihJumlah' WHERE idproduk='$idproduk'";
            mysqli_query($c, $query_update_stock);

            // Jika edit berhasil, kembalikan ke halaman sebelumnya dengan pesan sukses
            echo '<script>alert("Edit pembelian berhasil"); window.history.back();</script>';
            exit();
        } else {
            // Jika edit gagal, kembalikan ke halaman sebelumnya dengan pesan error
            echo '<script>alert("Edit pembelian gagal"); window.history.back();</script>';
            exit();
        }
    }
}

// Jika akses langsung ke file ini tanpa POST request, kembalikan ke halaman order.php
echo '<script>window.history.back();</script>';
exit();
?>