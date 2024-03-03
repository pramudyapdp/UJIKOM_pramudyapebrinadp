<?php

require '../controllers/koneksi.php';

include_once "template/header.php";
include_once "template/sidebar.php";

//menghitung jumlah produk
$pes = mysqli_query($c, "SELECT * FROM produk");
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

    .image-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .small-image {
        transition: transform 0.5s ease;
        /* Efek transisi */
    }

    .small-image:hover {
        transform: scale(1.2);
        /* Perbesar gambar saat kursor diarahkan */
    }
</style>

<main>
    <div class="container-fluid " style="background-color: #FFFCF4;  max-width: 1060px;
            border-radius: 20px;">


        <div class="row">
            <div class="image-container">
                <img src="../assets/img/p.png" alt="Image 1" class="small-image" style="width: 160px; height:160px;">
                <img src="../assets/img/a.png" alt="Image 2" class="small-image" style="width: 160px; height:160px;">
                <img src="../assets/img/ppp.png" alt="Image 3" class="small-image" style="width: 160px; height:160px;">
                <img src="../assets/img/9.png" alt="Image 4" class="small-image" style="width: 160px; height:160px;">
                <img src="../assets/img/r.png" alt="Image 5" class="small-image" style="width: 160px; height:160px;">
                <img src="../assets/img/j.png" alt="Image 6" class="small-image" style="width: 160px; height:160px;">
            </div>
        </div>

        <div class="row">
            <!-- Box Jumlah User -->
            <div class="col-md-12">
                <div
                    style="background-color: #FFFCF4; margin-bottom: 50px; margin-top: 70px; color: #5B3F41; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); border-radius: 60px;">
                    <div class="card-body text-center">
                        <h5 class="card-title"
                            style="font-family: 'Roboto', sans-serif; color: #5B3F41; font-weight: bold;">
                            Total Produk
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
                <button class="btn mb-2 btn-add" data-bs-toggle="modal" data-bs-target="#ModalTambahProduk">Tambah
                    Donat</button>
            </div>
        </div>





        <div class="table-container" style="margin-top: 60px;">
            <center><b style="color: #5B3F41; font-size: 22px;">Produk Donat</b></center>
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
                                <div style="color: #5B3F41; text-align: center;">
                                    Varian Donat
                                </div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">
                                    Harga
                                </div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Stok</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Keterangan</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $get = mysqli_query($c, "SELECT * FROM produk");
                        $no = 1;

                        while ($p = mysqli_fetch_array($get)) {
                            $idproduk = $p['idproduk'];
                            $namaproduk = $p['namaproduk'];
                            $harga = $p['harga'];
                            $stok = $p['stok'];
                            $deskripsi = $p['deskripsi'];
                            ?>

                            <tr>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $no++; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $namaproduk; ?> - donat
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        Rp.
                                        <?= (number_format($harga)); ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $stok; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $deskripsi; ?>
                                    </div>
                                </td>
                                <td> <button class="btn mb-2 btn-sm me-2 btn-satu" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $idproduk; ?>">Edit
                                    </button>
                                    <button class="btn mb-2 btn-sm btn-dua" data-bs-toggle="modal"
                                        data-bs-target="#delete<?= $idproduk; ?>">
                                       Hapus
                                    </button>
                                </td>
                            </tr>





                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit<?= $idproduk; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Edit Donut -
                                                <?= $namaproduk; ?>
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body" style="color : #5B3F41;">
                                            <!-- Form untuk mengedit donut -->
                                            <form method="post" action="../routers/r_edit_produk.php">
                                                <input type="hidden" name="idproduk" value="<?= $idproduk; ?>">

                                                <label for="editNama">Nama Donat:</label>
                                                <input type="text" id="editNama" name="namaproduk" class="form-control mb-2"
                                                    value="<?= $namaproduk; ?>" required>

                                                <label for="editDeskripsi">Keterangan:</label>
                                                <input type="text" id="editDeskripsi" name="deskripsi"
                                                    class="form-control mb-2" value="<?= $deskripsi; ?>" required>

                                                <label for="editHarga">Harga:</label>
                                                <input type="number" id="editHarga" name="harga" class="form-control mb-2"
                                                    value="<?= $harga; ?>" required>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-dua" name="editProduk">
                                                Simpan</button>
                                            </form>
                                            <button type="button" class="btn btn-satu"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <!-- Modal Delete -->
                            <div class="modal fade" id="delete<?= $idproduk; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Hapus Donat
                                                -
                                                <?= $namaproduk; ?>
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body" style="color : #5B3F41;">
                                            <p>Apakah kamu yakin akan menghapus produk
                                                <b>
                                                    <?= $namaproduk; ?>
                                                </b>?
                                            </p>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <form method="post" action="../routers/r_hapus_produk.php">
                                                <input type="hidden" name="idproduk" value="<?= $idproduk; ?>">
                                                <button type="submit" class="btn btn-dua"
                                                    name="hapusproduk">Hapus</button>
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




<!-- The Modal ADD-->
<div class="modal fade" id="ModalTambahProduk">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Tambah Donat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post" action="../routers/r_tambah_produk.php">
                <!-- Modal body -->
                <div class="modal-body" style="color : #5B3F41;">
                Nama Donat
                    <input type="text" name="namaproduk" class="form-control mb-2" required>
                    Keterangan
                    <input type="text" name="deskripsi" class="form-control mb-2" required>
                    Harga Donat
                    <input type="num" name="harga" class="form-control" required>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dua" name="tambahproduk">Tambah</button>
                    <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                </div>

        </div>
    </div>
</div>




</html>