<?php

require '../controllers/koneksi.php';

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$iduser = $_POST['iduser'];

// $_POST pada PHP digunakan untuk mengakses data yang dikirim melalui metode POST
if(!empty($_POST['hapususer'])) {
    // //mysqli_query adalah fungsi dalam bahasa pemrograman PHP yang digunakan untuk menjalankan perintah SQL ke database MySQL
    $query = mysqli_query($c, "DELETE FROM user WHERE iduser='$iduser'");
    
    if(!$query){
        $message = '<script>alert("Data gagal dihapus")</script>';
    }else{
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../views/user.php"</script>
                    </script>';
    }

}echo $message;
?>