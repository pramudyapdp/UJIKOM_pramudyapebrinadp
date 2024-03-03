<?php

session_start();
require '../controllers/koneksi.php';

$query = mysqli_query($c, "SELECT * FROM user WHERE username='$_SESSION[username_kasir]'");
$record = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sweet</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

        

    <!--Link Font oswald-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap">
    <!--Link Font dancing script-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-5/9JWui4Zlr4He0H6p9pxaLw4+yS3pK1vttWrvh6L0UHvU3u5JJFyk11eFu6v0qU8jQuDAHlIGgRS6a8g3l/2w=="
        crossorigin="anonymous" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/produk.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }
    </style>

    <!--Font pacifio -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
    </style>

</head>

<body class="sb-nav-fixed" style="background-color: #F5A9B5;">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" >
        <!-- Navbar Brand-->
        <a style="color: #333333; font-weight: bold; font-family: 'Pacifico'; font-size: 1.5em; letter-spacing: -1px; text-shadow: 2px 2px 5px #FFFCF4;"
            class="navbar-brand ps-3">Sweet</a>



        <!-- Navbar Profile-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown mt-3">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"
                            style="color: #5B3F41;"></i></a>
                    <ul style="background-color: #FFFCF4;" class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdown">
                        <li><a style="color: #5B3F41; font-weight: bold; font-family: 'Roboto', sans-serif; font-size: 14px;"
                                class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalUbahProfile"><i class="bi bi-person-circle"></i> Profile</a></li>
                        <li><a style="color: #5B3F41; font-weight: bold; font-family: 'Roboto', sans-serif; font-size: 14px;"
                                class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalUbahPassword"><i class="bi bi-key-fill"></i>
                                Ubah Password</a></li>
                        <li><a style="color: #5B3F41; font-weight: bold; font-family: 'Roboto', sans-serif; font-size: 14px;"
                                class="dropdown-item" href="../routers/r_logout.php"><i class="bi bi-door-open-fill"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </form>
        <!-- Navbar-->

    </nav>

    <!--BACKGROUND WEBSITE-->
    <div id="layoutSidenav_content" style="background-color: #F5A9B5;">




        <!-- Modal Ubah Password-->

        <!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

        <div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #5B3F41; font-weight: bold;">
                            Ubah Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="../routers/r_ubah_password.php" method="POST">


                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input disabled type="email" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="username" required
                                            value="<?php echo $_SESSION['username_kasir'] ?>">
                                        <label for="floatingInput"
                                            style="color: #5B3F41; font-weight: bold;">Username</label>
                                        <div class="invalid-feedback">
                                            Enter username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            name="passwordlama" required>
                                        <label for="floatingInput" style="color: #5B3F41; font-weight: bold;">
                                            Password lama</label>
                                        <div class="invalid-feedback">
                                            Masukkan password lama.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingInput"
                                            name="passwordbaru" required>
                                        <label for="floatingInput" style="color: #5B3F41; font-weight: bold;">
                                            Password baru</label>
                                        <div class="invalid-feedback">
                                            Masukkan password baru.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            name="repasswordbaru" required>
                                        <label for="floatingInput" style="color: #5B3F41; font-weight: bold;">Ulang password baru</label>
                                        <div class="invalid-feedback">
                                            Ulang password baru.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-dua" name="ubah_password_validate" value="123">Simpan</button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- end of modal Ubah Password-->





        <!-- Modal Ubah Profile-->

        <!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

        <div class="modal fade" id="ModalUbahProfile" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #5B3F41; font-weight: bold;">
                            Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="../routers/r_ubah_profile.php" method="POST">


                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input disabled type="username" class="form-control" id="floatingInput"
                                            placeholder="username" name="username" required
                                            value="<?php echo $_SESSION['username_kasir'] ?>">
                                        <label for="floatingInput"
                                            style="color: #5B3F41; font-weight: bold;">Username</label>
                                        <div class="invalid-feedback">
                                            Masukkan username.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingPassword" name="nama"
                                            required value="<?php echo $record['nama'] ?>">
                                        <label for="floatingInput" style="color: #5B3F41; font-weight: bold;">Nama</label>
                                        <div class="invalid-feedback">
                                            Masukkan nama.
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="modal-footer">
                                <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-dua" name="ubah_profile_validate" value="123">Simpan</button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- end of modal Ubah Profile-->

        <script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<!--END OF JavaScript-->