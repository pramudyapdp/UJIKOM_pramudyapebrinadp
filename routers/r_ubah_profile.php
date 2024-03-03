<?php
session_start();
require '../controllers/koneksi.php';

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$nama = $_POST['nama'];


if (!empty($_POST['ubah_profile_validate'])){


            $query = mysqli_query($c, "UPDATE user SET nama='$nama' WHERE username = '$_SESSION[username_kasir]'");
            if ($query) {
                $message = '<script>alert("Profile berhasil diubah");
                        window.history.back()</script>';
            }else{
                $message = '<script>alert("Profile gagal diubah");
                        window.history.back()</script>';

            }
            }else{
                $message = '<script>alert("Error occurs");
                        window.history.back()</script>';
            }
        
echo $message;
?>