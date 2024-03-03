<?php

require '../controllers/koneksi.php';

include_once "template/header.php";
include_once "template/sidebar.php";



date_default_timezone_set('Asia/Jakarta');

//menghitung jumlah pesanan
$pes = mysqli_query($c, "SELECT * FROM penjualan");
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
            <!-- Services-->
            <section class="page-section" id="services">
                <div class="container" style="margin-top: 70px;">

                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i style="color: #DBB1E1;" class="fas fa-circle fa-stack-2x"></i>
                                <i style="color: #FFFCF4;" class="fas fa-user fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 style="color: #5B3F41; font-family: 'Roboto', sans-serif; font-weight: bold;"
                                class="my-3">
                                Pilih Pelanggan</h4>
                        </div>

                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i style="color: #93D5D8;" class="fas fa-circle fa-stack-2x"></i>
                                <i style="color: #FFFCF4;" class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 style="color: #5B3F41; font-family: 'Roboto', sans-serif; font-weight: bold;"
                                class="my-3">
                                Proses Pembayaran</h4>
                        </div>

                        <div class="col-md-4 mb-4">
                            <span class="fa-stack fa-4x">
                                <i style="color: #F6A9BD;" class="fas fa-circle fa-stack-2x"></i>
                                <i style="color: #FFFCF4;" class="fas fa-check fa-stack-1x fa-inverse"></i>
                            </span>

                            <h4 style="color: #5B3F41; font-family: 'Roboto', sans-serif; font-weight: bold;"
                                class="my-3">
                                Cetak Struk</h4>
                        </div>

                    </div>
                </div>
            </section>
        </div>



        <div class="row">
            <!-- Box Jumlah User -->
            <div class="col-md-12">
                <div
                    style="background-color: #FFFCF4; margin-bottom: 50px; margin-top: 70px; color: #5B3F41; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); border-radius: 60px;">
                    <div class="card-body text-center">
                        <h5 class="card-title"
                            style="font-family: 'Roboto', sans-serif; color: #5B3F41; font-weight: bold;">Total
                            Penjualan
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
                <button class="btn mb-2 btn-add" data-bs-toggle="modal" data-bs-target="#TambahPenjualan">Tambah
                    Penjualan</button>
            </div>
        </div>

        <div class="table-container" style="margin-top: 60px;">
            <center><b style="color: #5B3F41; font-size: 22px; ">Data Penjualan</b></center>
            <div class="body">
                <table id="datatablesSimple">
                    <thead>

                        <tr>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">ID Penjualan</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Waktu</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Data Pelanggan</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Total Produk</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $get = mysqli_query($c, "SELECT * FROM penjualan p, pelanggan pl WHERE p.idpelanggan = pl.idpelanggan ORDER BY p.tglpenjualan DESC");

                        while ($p = mysqli_fetch_array($get)) {
                            $idpenjualan = $p['idpenjualan'];
                            $tglpenjualan = $p['tglpenjualan'];
                            $namapelanggan = $p['namapelanggan'];
                            $alamat = $p['alamat'];

                            //hitung jumlaj
                            $jumlahproduk = mysqli_query($c, "SELECT * FROM detailpenjualan WHERE idpenjualan='$idpenjualan'");
                            $jumlah = mysqli_num_rows($jumlahproduk);
                            ?>

                            <tr>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $idpenjualan; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $tglpenjualan; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $namapelanggan; ?> -
                                        <?= $alamat; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        <?= $jumlah; ?> qty
                                    </div>
                                </td>
                                <td><a href="detailpenjualan.php?idp=<?= $idpenjualan; ?>"
                                        class="btn btn-satu btn-sm me-2">Pembelian</a>
                                    <?php if ($jumlah > 0) { ?>
                                        <!-- Display a disabled button and a message in the modal body -->
                                        <button class="btn" style="border: none;" data-bs-toggle="modal"
                                            data-bs-target="#ModalHapus<?= $idpenjualan; ?>" readonly><br>
                                            Tidak Bisa Hapus<br>
                                            <p style="font-size: 9px; color: #5b3f41;">Sudah ada data pembelian</p>
                                        </button>

                                    <?php } else { ?>
                                        <!-- Display the delete button as usual -->
                                        <button class="btn btn-dua btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ModalHapus<?= $idpenjualan; ?>">
                                            Hapus
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="ModalHapus<?= $idpenjualan; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" style="color: #5B3F41; font-weight: bold;">
                                                            Hapus Data</h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <!-- Modal Body -->
                                                    <div class="modal-body" style="color: #5B3F41;">
                                                        Apakah kamu yakin akan menghapus data penjualan dari
                                                        <b>
                                                            <?= $namapelanggan; ?> -
                                                            <?= $alamat; ?>
                                                        </b>?
                                                    </div>
                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <form method="post" action="../routers/r_hapus_penjualan.php">
                                                            <input type="hidden" value="<?= $idpenjualan; ?>"
                                                                name="idpenjualan">
                                                            <button type="submit" class="btn btn-dua"
                                                                name="hapuspenjualan">Hapus</button>
                                                            <button type="button" class="btn btn-satu"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>

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




<!-- The Modal -->
<div class="modal fade" id="TambahPenjualan">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Pilih Pelanggan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post" action="../routers/r_tambah_penjualan.php">

                <!-- Modal body -->
                <div class="modal-body" style="color : #5B3F41;">
                    ID Penjualan
                    <input readonly type="text" name="idpenjualan" class="form-control mb-2" placeholder="Order Id"
                        value="<?php echo rand(10000, 99999) ?>">
                    Pilih Pelanggan
                    <select name="idpelanggan" class="form-control">
                        <?php
                        $getpelanggan = mysqli_query($c, "SELECT * FROM pelanggan WHERE idpelanggan NOT IN  (SELECT idpelanggan FROM penjualan)");

                        while ($pl = mysqli_fetch_array($getpelanggan)) {
                            $idpelanggan = $pl['idpelanggan'];
                            $namapelanggan = $pl['namapelanggan'];
                            $alamat = $pl['alamat'];

                            ?>

                            <option value="<?= $idpelanggan; ?>">
                                <?= $namapelanggan; ?> -
                                <?= $alamat; ?>
                            </option>

                        <?php } ?>
                    </select>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dua" name="tambahpenjualan">Tambah</button>
                    <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                </div>

        </div>
    </div>
</div>




</html>