<?php

require '../controllers/koneksi.php';

include_once "template/header.php";
include_once "template/sidebar.php";


//menghitung jumlah produk
$pes = mysqli_query($c, "SELECT * FROM pelanggan");
$jml = mysqli_num_rows($pes); //jumlah pesanan
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
                            style="font-family: 'Roboto', sans-serif; color: #5B3F41; font-weight: bold;">
                            Jumlah Pelanggan
                        </h5>
                        <p style="font-family: 'Roboto', sans-serif; font-weight: bold;" class="card-text display-4">
                            <?= $jml; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <!-- agar button dikanan menggunakan d-flex justify-content-end-->
            <div class="col d-flex justify-content-center  mb-4 mt-4">
                <button class="btn mb-2 btn-add" data-bs-toggle="modal" data-bs-target="#ModalTambahPelanggan">Tambah
                    Pelanggan</button>
            </div>
        </div>

        <div class="table-container" style="margin-top: 60px;">
            <center><b style="color: #5B3F41; font-size: 22px;">Data Pelanggan</b></center>
            <div class="body">
                <table id="datatablesSimple">
                    <thead>

                        <tr class="text-nowrap">
                            <th scope="col">
                                <center>
                                    <div style="color: #5B3F41;">
                                        No
                                    </div>
                                </center>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Nama Pelanggan</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">No Telepon</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Alamat</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $get = mysqli_query($c, "SELECT * FROM pelanggan");
                        $no = 1;

                        while ($p = mysqli_fetch_array($get)) {
                            $namapelanggan = $p['namapelanggan'];
                            $nohp = $p['nohp'];
                            $alamat = $p['alamat'];
                            $idpelanggan = $p['idpelanggan'];
                            ?>

                            <tr>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $no++; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $namapelanggan; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $nohp; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $alamat; ?>
                                </td>
                                <td>
                                    <button class="btn mb-2 btn-sm me-2 btn-satu" data-bs-toggle="modal"
                                        data-bs-target="#EditPelanggan<?= $idpelanggan; ?>">edit</button>
                                    <button class="btn mb-2 btn-sm btn-dua" data-bs-toggle="modal"
                                        data-bs-target="#HapusPelanggan<?= $idpelanggan; ?>">hapus</button>
                                </td>
                            </tr>



                            <!-- The Modal EDIT -->
                            <div class="modal fade" id="EditPelanggan<?= $idpelanggan; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Edit
                                                Pelanggan</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <form method="post" action="../routers/r_edit_pelanggan.php">
                                            <input type="hidden" name="idpelanggan" value="<?= $idpelanggan; ?>">

                                            <!-- Modal body -->
                                            <div class="modal-body" style="color : #5B3F41;">
                                                Nama Pelanggan
                                                <input type="text" name="namapelanggan" class="form-control mb-2"
                                                    value="<?= $namapelanggan; ?>" required>
                                                No Telepon
                                                <input type="text" name="nohp" class="form-control mb-2"
                                                    value="<?= $nohp; ?>" required>
                                                Alamat
                                                <input type="text" name="alamat" class="form-control mb-2"
                                                    value="<?= $alamat; ?>" required>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-dua" name="editpelanggan">Simpan
                                                </button>
                                                <button type="button" class="btn btn-satu"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <!-- Modal Delete -->
                            <div class="modal fade" id="HapusPelanggan<?= $idpelanggan; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Hapus
                                                Pelanggan
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body" style="color : #5B3F41;">
                                            <p>Apakah kamu yakin akan menghapus data pelanggan dengan nama
                                                <b>
                                                    <?= $namapelanggan; ?>
                                                </b>?
                                            </p>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <form method="post" action="../routers/r_hapus_pelanggan.php">
                                                <input type="hidden" name="idpelanggan" value="<?= $idpelanggan; ?>">
                                                <button type="submit" class="btn btn-dua"
                                                    name="hapuspelanggan">Hapus</button>
                                            </form>
                                            <button type="button" class="btn btn-satu"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>

                                    </div>
                                </div>
                            </div>




                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
include_once "template/footer.php";
?>
</div>
</div>
</body>




<!-- The Modal ADD -->
<div class="modal fade" id="ModalTambahPelanggan">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Tambah Pelanggan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post" action="../routers/r_tambah_pelanggan.php">
                <!-- Modal body -->
                <div class="modal-body" style="color : #5B3F41;">
                    Nama Pelanggan
                    <input required type="text" name="namapelanggan" class="form-control mb-2">
                    No Telepon
                    <input required type="text" name="nohp" class="form-control mb-2">
                    Alamat
                    <input required type="num" name="alamat" class="form-control mb-2">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dua" name="tambahpelanggan">Tambah</button>
                    <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                </div>

        </div>
    </div>
</div>




</html>