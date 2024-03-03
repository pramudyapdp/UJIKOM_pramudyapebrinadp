<?php

require '../controllers/koneksi.php';
include_once "template/header.php";
include_once "template/sidebar.php";

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username_kasir'])) {
    header('Location: login.php'); // Ganti dengan halaman login Anda
    exit();
}

// Periksa peran pengguna
$query = mysqli_query($c, "SELECT * FROM user WHERE username = '$_SESSION[username_kasir]'");
$hasil = mysqli_fetch_array($query);

// Cek apakah peran pengguna adalah admin
if ($hasil['role'] !== 'admin') {
    echo '<script>alert("You can`t access this!"); window.location.href = "produk.php";</script>';
    exit();
}

$query = mysqli_query($c, "SELECT * FROM user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

// Query untuk menghitung jumlah user
$countQuery = mysqli_query($c, "SELECT COUNT(*) as total FROM user");
$countResult = mysqli_fetch_assoc($countQuery);
$totalUser = $countResult['total'];

?>

<style>
    #layoutSidenav_content {
        padding-top: 100px;
        /* Sesuaikan jarak yang diinginkan */
    }

    .table-container table {
        border-collapse: collapse;
        /* Menggabungkan garis tabel */
        width: 100%;
    }

    .table-container td {
        border: none;
        padding: 8px;
        text-align: center;
    }

    .table-container th {
        color: #5B3F41;
        font-size: 15px;
        text-align: center;
    }
</style>




<main>
    <div class="container-fluid " style="background-color: #FFFCF4;  max-width: 1060px;
            border-radius: 20px;">



       

        <div class="row">
            <!-- Box Jumlah User -->
            <div class="col-md-12">
                <div
                    style="background-color: #FFFCF4; margin-bottom: 50px; margin-top: 70px; color: #5B3F41; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); border-radius: 60px;">
                    <div class="card-body text-center">
                        <h5 class="card-title"
                            style="font-family: 'Roboto', sans-serif; color: #5B3F41; font-weight: bold;">Total
                            User</h5>
                        <p style="font-family: 'Roboto', sans-serif; font-weight: bold;" class="card-text display-4">
                            <?php echo $totalUser; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- agar button dikanan menggunakan d-flex justify-content-end-->
            <div class="col d-flex justify-content-center  mb-4 mt-4">
                <button class="btn mb-2 btn-add" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah
                    User</button>
            </div>
        </div>


        <!-- Modal Add User-->
        <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #5B3F41; font-weight: bold;">
                         Tambah User Baru</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- biar hasil inputan muncul, gunakan routers/...-->

                        <!---Sedangkan method POST digunakan untuk "mengirim" atau "mensubmit" data. Jadi dianggap sebagai method yang digunakan untuk "memberikan"-->

                        <form class="needs-validation" novalidate action="../routers/r_tambah_user.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="Nama" name="nama" required>
                                        <!--require digunakan untuk menandakan bahwa form perlu diisi-->
                                        <label style="color: #5B3F41;" for="floatingInput">Nama</label>
                                        <div class="invalid-feedback">
                                            Masukkan nama.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="username" class="form-control" id="floatingInput"
                                            placeholder="username" name="username" required>
                                        <label style="color: #5B3F41;" for="floatingInput">Username</label>
                                        <div class="invalid-feedback">
                                            Masukkan username.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="role"
                                            required style="background-color: #FFFCF4; border-radius: 60px;">
                                            <option selected hidden value="">Pilih Role User</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                        </select>
                                        <label style="color: #5B3F41; " for="floatingInput">Role
                                            User</label>
                                        <div class="invalid-feedback">
                                            Pilih role user.
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingInput"
                                            placeholder="Password" readonly value="123" name="password">
                                        <label style="color: #5B3F41;" for="floatingPassword">Password</label>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-dua" name="tambahuser" value="123">Tambah
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- end of modal Add User -->

        <?php

        foreach ($result as $row) {
            ?>





            <!-- Modal Edit User-->
            <div class="modal fade" id="ModalEditUser<?php echo $row['iduser'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #5B3F41; font-weight: bold;">
                                Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Form untuk mengedit user -->
                            <form class="needs-validation" novalidate action="../routers/r_edit_user.php" method="POST">
                                <input type="hidden" value="<?php echo $row['iduser'] ?>" name="iduser">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Nama" name="nama" value="<?php echo $row['nama'] ?>"
                                                required>
                                            <label style="color: #5B3F41;" for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukkan nama.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="username" class="form-control" id="floatingInput"
                                                placeholder="username" name="username"
                                                value="<?php echo $row['username'] ?>" required>
                                            <label style="color: #5B3F41;" for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Masukkan username.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="role"
                                                required style="background-color: #FFFCF4; border-radius: 60px;">
                                                <option selected hidden value="">Pilih Role User</option>
                                                <option value="admin" <?php echo ($row['role'] == 'admin') ? 'selected' : ''; ?>>
                                                    Admin</option>
                                                <option value="kasir" <?php echo ($row['role'] == 'kasir') ? 'selected' : ''; ?>>
                                                    Kasir</option>
                                            </select>
                                            <label style="color: #5B3F41;" for="floatingInput">User Role
                                                </label>
                                            <div class="invalid-feedback">
                                                Pilih role user.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-dua" name="edituser" value="123">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Modal Edit User -->






            <!-- Modal Delete-->

            <!-- menggunakan < ? php echo $row['iduser'] ? > agar semua data tampil, tidak hanya row 1 saja -->

            <div class="modal fade" id="ModalDelete<?php echo $row['iduser'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #5B3F41; font-weight: bold;">
                                Delete data user</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="../routers/r_hapus_user.php" method="POST">
                                <input type="hidden" value="<?php echo $row['iduser'] ?>" name="iduser">
                                <div class="col-lg-12" style="border-radius: 60px;"
                                    style="color: #5B3F41; font-weight: bold;">
                                    <!-- dibuat seperti ini agar kita tidak bisa menghapus akun yang sedang dijalankan -->
                                    <div style="color: #5B3F41;">
                                        <?php
                                        if ($row['username'] == $_SESSION['username_kasir']) {
                                            echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun anda sendiri!</div>";
                                        } else {
                                            echo "Are you sure you want to delete this <b>$row[nama]</b> user?";
                                        }
                                        ?>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-dua" name="hapususer" value="123"
                                            <?php echo ($row['username'] == $_SESSION['username_kasir']) ? 'disabled' : ''; ?>>Hapus</button>
                                        <!-- Dalam tag PHP, tombol delete tidak berfungsi untuk menghapus akun yang sedang dijalankan -->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- end of modal Delete-->




        <?php } ?>









        <div class="table-container" style="margin-top: 60px;">
            <center><b style="color: #5B3F41; font-size: 22px;">Data User</b></center>
            <div class="body">
                <table id="datatablesSimple">
                    <thead>

                        <tr class="text-nowrap">
                            <th scope="col">
                                <center>
                                    <div style="color: #5B3F41; text-align: center;">
                                        No
                                    </div>
                                </center>
                            </th>
                            <th scope="col">
                                <div style="color: #5B3F41; text-align: center;">
                                    Nama
                                </div>
                            </th>
                            <th scope="col">
                                <div style="color: #5B3F41; text-align: center;">
                                    Username
                                </div>
                            </th>
                            <th scope="col">
                                <div style="color: #5B3F41; text-align: center;">
                                    Role
                                </div>
                            </th>
                            <th scope="col">
                                <div style="color: #5B3F41; text-align: center;">
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
            </div>

            <tbody>

                <?php
                if (!empty($result)) {
                    $no = 1;
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <th scope="row">
                                <div style="color: #5B3F41;">
                                    <center>
                                        <?php echo $no++ ?>
                                    </center>
                                </div>
                            </th>
                            <td>
                                <div style="color: #5B3F41;">
                                    <?php echo $row['nama'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="color: #5B3F41;">
                                    <?php echo $row['username'] ?>
                                </div>
                            </td>
                            <td>
                                <div style="color: #5B3F41;">

                                    <!-- bagian role seperti ini agar pada table user bukan angka yang tampil -->
                                    <?php
                                    if ($row['role'] == 'admin') {
                                        echo "Admin";
                                    } elseif ($row['role'] == 'kasir') {
                                        echo "Kasir";
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="d-flex">
                                <!-- menggunakan < ? php echo $row['iduser'] ? > agar emua data tampil, tidak hanya row 1 saja -->
                                <button class="btn btn-satu btn-sm me-2" <?php if ($row['username'] == $_SESSION['username_kasir']) { ?> onclick="pesanEdit(); return false;"
                                    <?php } else { ?> data-bs-toggle="modal"
                                        data-bs-target="#ModalEditUser<?php echo $row['iduser']; ?>" <?php } ?>>
                                    Edit
                                </button>
                                <script>
                                    function pesanEdit() {
                                        alert("Anda tidak bisa mengubah data anda sendiri pada bagian tabel! ubahlah pada menu profile");
                                    }
                                </script>


                                <button class="btn btn-dua btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#ModalDelete<?php echo $row['iduser'] ?>">Hapus</button>
                            </td>

                        </tr>

                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>Data user tidak ada</td></tr>";
                }
                ?>



            </tbody>


            </table>
        </div>
    </div>
    </div>
</main>
</div>
</div>
</body>

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


</html>

<?php

include_once "template/footer.php";

?>

