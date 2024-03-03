<?php

require '../controllers/koneksi.php';



if (!empty($_POST['tambahuser'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5('123');
    $role = $_POST['role'];

    $select = mysqli_query($c, "SELECT * FROM user WHERE username='$username'");
      // mysqli_num_rows = Fungsi ini berguna untuk mengetahui apakah query menghasilkan data atau tidak, atau untuk menampilkan jumlah data yang ditemukan
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Username sudah ada");
        window.location="../views/user.php"</script>
        </script>';
    } else {
        $query = mysqli_query($c, "INSERT INTO user (nama, username, role, password) values ('$nama', '$username', '$role', '$password') ");

        if (!$query) {
            $message = '<script>alert("Data gagal ditambahkan")</script>';
        } else {
            $message = '<script>alert("Data berhasil ditambahkan");
                    window.location="../views/user.php"</script>';
        }
    }

}
echo $message;
?>