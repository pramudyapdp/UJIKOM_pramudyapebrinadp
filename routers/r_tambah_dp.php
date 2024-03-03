<?php
require '../controllers/koneksi.php';

if (isset($_POST['tambahDP'])) {
    $idproduk = $_POST['idproduk'];
    $idp = $_POST['idp'];
    $jumlahproduk = $_POST['jumlahproduk'];
  

    // Hitung stok awal
    $hitung1 = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idproduk'");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stoksekarang = $hitung2['stok'];
    $subtotal = 0;

    if ($stoksekarang >= $jumlahproduk) {
        // Kurangi stok dengan jumlah stok yang dikeluarkan
        $selisih = $stoksekarang - $jumlahproduk;

        // Update detailpenjualan and produk table
        $insert = mysqli_query($c, "INSERT INTO detailpenjualan (idpenjualan, idproduk, jumlahproduk, subtotal) VALUES ('$idp', '$idproduk', '$jumlahproduk', '$subtotal')");
        $update = mysqli_query($c, "UPDATE produk SET stok='$selisih' WHERE idproduk='$idproduk'");

        if ($insert && $update) {
            $message = '<script>alert("Data berhasil ditambahkan");
                        window.location="../views/detailpenjualan.php?idp=' . $idp . '"</script>';
        } else {
            $message = '<script>alert("Data gagal ditambahkan");
                        window.location="../views/detailpenjualan.php?idp=' . $idp . '"</script>';
        }
    } else {
        // Stok tidak cukup
        $message = '<script>alert("Stok tidak cukup");
                    window.location="../views/detailpenjualan.php?idp=' . $idp . '"</script>';
    }
}

echo $message;
?>