<?php

require '../controllers/koneksi.php';

include_once "template/header.php";
include_once "template/sidebar.php";

//total stock
$getTotalStock = mysqli_query($c, "SELECT SUM(stok) AS total_stok FROM produk");
$totalStockData = mysqli_fetch_assoc($getTotalStock);
$totalStock = $totalStockData['total_stok'];
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
                            Total Stok
                        </h5>
                        <p style="font-family: 'Roboto', sans-serif; font-weight: bold;" class="card-text display-4">
                            <?= $totalStock; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container" style="margin-top: 60px;">
            <center><b style="color: #5B3F41; font-size: 22px;">Stock Product</b></center>
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
                                <div style="color: #5B3F41; text-align: center;">Varian Donat</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41; text-align: center;">Stok<div>
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
                            $stok = $p['stok'];
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
                                        <?= $stok; ?>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn mb-2 btn-sm btn-satu me-2" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $idproduk; ?>">Update
                                        Stok</button>
                                </td>
                            </tr>





                            <?php
                            // Fetch data produk untuk mendapatkan data terbaru sebelum diubah
                            $get_produk = mysqli_query($c, "SELECT * FROM produk WHERE idproduk = '$idproduk'");
                            $produk = mysqli_fetch_array($get_produk);

                            $stok_sekarang = $produk['stok'];
                            ?>


                            <!-- Modal Update Stock -->
                            <div class="modal fade" id="edit<?= $idproduk; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Update Stok
                                                -
                                                <b>
                                                    <?= $namaproduk; ?>
                                                </b>
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body" style="color : #5B3F41;">
                                            <form method="post" action="../routers/r_update_stock.php">
                                                <input required type="hidden" name="idproduk" value="<?= $idproduk; ?>">

                                                <!-- Tampilkan stok sekarang -->
                                                <p>Stok Sekarang:
                                                    <?= $stok_sekarang; ?>
                                                </p>

                                                <!-- Form untuk memasukkan stok baru -->
                                                <div class="mb-3">
                                                    <label for="newStock" class="form-label">Stok Baru:</label>
                                                    <input type="number" class="form-control" id="newStock" name="newStock"
                                                        required>
                                                </div>

                                                <!-- Tombol untuk menyimpan perubahan -->
                                                <button type="submit" class="btn btn-dua" name="updateStock">Update
                                                    Stock</button>
                                            </form>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
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








</html>