<?php

require '../controllers/koneksi.php';



if (isset($_POST['tambahpelanggan'])) {
    $namapelanggan = $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    
    $insert = mysqli_query($c, "INSERT INTO pelanggan (namapelanggan, alamat, nohp) values ('$namapelanggan', '$alamat', '$nohp') ");

    if ($insert) {
        $message = '<script>alert("Data berhasil ditambahkan");
                    window.location="../views/pelanggan.php"</script>';
    } else {
        $message = '<script>alert("Data gagal ditambahkan")</script>;
        window.location="../views/pelanggan.php"</script>';
    }
}


echo $message;
?>