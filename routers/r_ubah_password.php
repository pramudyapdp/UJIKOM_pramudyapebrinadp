<?php
session_start();
require '../controllers/koneksi.php';

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$iduser = $_POST['iduser'];
$passwordlama = md5($_POST['passwordlama']);
$passwordbaru = md5($_POST['passwordbaru']);
$repasswordbaru = md5($_POST['repasswordbaru']);



if (!empty($_POST['ubah_password_validate'])) {

    $query = mysqli_query($c, "SELECT * FROM user WHERE username = '$_SESSION[username_kasir]' && password = '$passwordlama'");

    $hasil = mysqli_fetch_array($query);


    if ($hasil) {
        if ($passwordbaru == $repasswordbaru) {



            $query = mysqli_query($c, "UPDATE user SET password='$passwordbaru' WHERE username = '$_SESSION[username_kasir]'");
            if ($query) {
                $message = '<script>alert("Password berhasil diubah");
                        window.history.back()</script>';

            } else {
                $message = '<script>alert("Password gagal diubah");
                window.history.back()</script>';

            }
        } else {
            $message = '<script>alert("Password baru tidak sama");
                        window.history.back()</script>';
        }

    } else {
        $message = '<script>alert("Password lama tidak sama");
                        window.history.back()</script>';

    }
} else {
    header('location:../views/produk.php');

}
echo $message;
?>