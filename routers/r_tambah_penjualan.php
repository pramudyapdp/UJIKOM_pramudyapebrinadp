<?php

require '../controllers/koneksi.php';



if (isset($_POST['tambahpenjualan'])) {
    $idpenjualan = $_POST['idpenjualan'];
    $idpelanggan = $_POST['idpelanggan'];
    $total = 0;
    
    $insert = mysqli_query($c, "INSERT INTO penjualan (idpenjualan, idpelanggan, total) values ('$idpenjualan', '$idpelanggan', '$total') ");

    if ($insert) {
        $message = '<script>alert("Data berhasil ditambahkan");
                    window.location="../views/penjualan.php"</script>';
    } else {
        $message = '<script>alert("Data sudah ada");
        window.location="../views/penjualan.php"</script>';
    }
}


echo $message;
?>