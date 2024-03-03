<?php

require '../controllers/koneksi.php';

if (isset($_POST['edituser'])) {
    $iduser = $_POST['iduser'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    $query = mysqli_query($c, "UPDATE user SET nama='$nama', username='$username', role='$role' WHERE iduser='$iduser' ");

    if (!$query) {
        $message = '<script>alert("Gagal memperbarui data")</script>';
    } else {
        $message = '<script>alert("Data berhasil diperbarui");
        window.location="../views/user.php"</script>';
    }

    echo $message;
}
?>