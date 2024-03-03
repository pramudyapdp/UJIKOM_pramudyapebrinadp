<?php

session_start();

require '../controllers/koneksi.php';

if (isset($_POST['login'])) {
    //initiate variable
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek = mysqli_query($c, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $hasil = mysqli_fetch_array($cek);

    if ($hasil) {
        $_SESSION['username_kasir'] = $username;
        $_SESSION['role_kasir'] = $hasil['role'];
        header('location:../views/produk.php');
    } else { ?>

        <script>
            alert('Username atau password salah');
            window.location = '../login.php'
        </script>


        <?php

    }
}

?>