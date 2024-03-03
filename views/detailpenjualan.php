<?php

require '../controllers/koneksi.php';

include_once "template/header.php";

if (isset($_GET['idp'])) {
    $idp = $_GET['idp'];

    $getnamapl = mysqli_query($c, "SELECT * FROM penjualan p, pelanggan pl WHERE p.idpelanggan=pl.idpelanggan and p.idpenjualan='$idp'");
    $namapl = mysqli_fetch_array($getnamapl);
    $np = $namapl['namapelanggan'];

} else {
    echo '<script>window.location.href = "penjualan.php";</script>';
}

date_default_timezone_set('Asia/Jakarta');
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


    /* ... (gaya sebelumnya) */

    @media print {
        body * {
            visibility: hidden;
            margin-left: 13mm;
        }

        #printTable,
        #printTable * {
            visibility: visible;
        }

        #printTable {
            position: absolute;
            left: 0;
            top: 0;
            margin-left: auto;
            margin-right: auto;
        }


        #actionSection {
            display: none;
            /* Menyembunyikan bagian action saat mencetak */
        }
    }


    .btn-p {
        padding: 10px;
        cursor: pointer;
        font-size: 25px;
        transition: transform 0.3s ease, font-size 0.3s ease;
    }

    .btn-one {
        color: #DBB1E1;
    }

    .btn-two {
        color: #93D5D8;
    }

    .btn-three {
        color: #F6A9BD;
    }

    .btn-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .btn-p:hover {
        transform: scale(1.1);
        font-size: 30px;
        color: #5B3F41;
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

    .header-text {
        position: absolute;
        top: 150px;
        left: 50%;
        transform: translate(-50%, -50%);
        font-weight: bold;
        font-size: 3.7em;
        color: #5B3F41;
        text-align: center;
        letter-spacing: 3px;
    }

    /* Gaya untuk kelas btn-efek */
    .btn-efek {
        color: #5B3F41;
        font-size: 27px;
        position: relative;
        transition: transform 0.3s ease-in-out;
    }

    /* Efek Hover */
    .btn-efek:hover {
        color: #5B3F41;
        transform: scale(1.4);
    }
</style>

<main>
    <div class="container-fluid " style="background-color: #FFFCF4;  max-width: 1060px;
            border-radius: 20px;">


        <div class="row">
            <h1 class="header-text" style="font-family: Pacifico , cursive;">
                Pembayaran</h1>
            <div>
                <a href="penjualan.php" class="btn btn-efek mb-4 mt-4">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>

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
            <div class="col-md-6">
                <div
                    style="background-color: #FFFCF4; margin-bottom: 50px; margin-top: 70px; color: #5B3F41; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); border-radius: 60px;">
                    <div class="card-body text-center">
                        <p style="font-family: 'Roboto', sans-serif; font-weight: bold;" class="card-text display-4">
                            <?= $idp; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    style="background-color: #FFFCF4; margin-bottom: 50px; margin-top: 70px; color: #5B3F41; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); border-radius: 60px;">
                    <div class="card-body text-center">
                        <p style="font-family: 'Roboto', sans-serif; font-weight: bold;" class="card-text display-4">
                            <?= $np; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <!-- Buttons labeled as "One," "Two," and "Three" -->
            <div class="col d-flex justify-content-end">
                <div class="btn-container">
                    <button class="btn btn-p mb-2 me-2 btn-efek" data-bs-toggle="modal" data-bs-target="#TambahDP">
                        <i class="fas fa-shopping-cart"></i><br>
                        <p style="font-size: 11px;">produk</p>
                    </button>
                </div>
            </div>
        </div>






        <div class="table-container" style="margin-top: 60px;" id="printTable">
            <center><b style="color: #5B3F41; font-size: 22px;">Data Pembelian</b></center>
            <div class="body">
                <table class="table">
                    <thead>

                        <tr class="text-nowrap">
                            <th scope="col">
                                <div style="color: #5B3F41;">
                                    No
                                </div>
                            </th>
                            <th>
                                <div style="color: #5B3F41;">Produk</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41;">Harga</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41;">Jumlah</div>
                            </th>
                            <th>
                                <div style="color: #5B3F41;">Total Harga</div>
                            </th>
                            <th id="actionSection">
                                <div style="color: #5B3F41;">Aksi</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $get = mysqli_query($c, "SELECT * FROM detailpenjualan p, produk pr WHERE p.idproduk=pr.idproduk AND idpenjualan='$idp'");
                        $no = 1;
                        $totalharga = 0;
                        while ($p = mysqli_fetch_array($get)) {
                            $idetail = $p['iddetail'];
                            $harga = $p['harga'];
                            $namaproduk = $p['namaproduk'];
                            $stok = $p['stok'];
                            $jumlahproduk = $p['jumlahproduk'];
                            $subtotal = $jumlahproduk * $harga;


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
                                        <?= (number_format($jumlahproduk)); ?> qty
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #5B3F41;">
                                        Rp.
                                        <?= (number_format($subtotal)); ?>
                                    </div>
                                </td>
                                <td id="actionSection">
                                    <button class="btn btn-satu btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#EditDP<?= $idetail; ?>">Edit</button>
                                    <button class="btn btn-dua btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#HapusDP<?= $idetail; ?>">Hapus</button>
                                </td>
                            </tr>



                            <!-- Modal Edit -->
                            <div class="modal fade" id="EditDP<?= $idetail; ?>" tabindex="-1"
                                aria-labelledby="ModalEditLabel<?= $idetail; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalEditLabel<?= $idetail; ?>"
                                                style="color : #5B3F41; font-weight:bold; ">Edit pembelian
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body" style="color : #5B3F41;">
                                            <!-- Your edit form goes here -->
                                            <form action="../routers/r_edit_dp.php" method="post">
                                                <input type="hidden" name="idetail" value="<?= $idetail; ?>">
                                                <b><?= $namaproduk; ?> (stok:
                                                <?= $stok; ?>)</b>
                                                <br>
                                                <label for="editJumlah" class="form-label">Jumlah baru:</label>
                                                <input type="number" class="form-control" id="editJumlah" name="editJumlah"
                                                    value="<?= $jumlahproduk; ?>" required>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-dua" name="editDP">Simpan
                                            </button>
                                            <button type="button" class="btn btn-satu"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>






                            <!-- Modal for deleting a purchase -->
                            <div class="modal fade" id="HapusDP<?= $idetail; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Hapus
                                                Pembelian</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style="color : #5B3F41;">
                                            Apakah kamu yakin akan menghaput pembelian donat <b>
                                                <?= $namaproduk; ?>
                                            </b>?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <a href="../routers/r_hapus_dp.php?idetail=<?= $idetail; ?>&idp=<?= $idp; ?>"
                                                class="btn btn-dua">Hapus</a>
                                            <button type="button" class="btn btn-satu"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>

                                    </div>
                                </div>
                            </div>




                            <?php
                            $totalharga += $subtotal;

                        } ?>

                        <tr>
                            <td>
                                <div style="color: #5B3F41; font-weight: bold;">Total Keseluruhan Harga</div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div style="color: #5B3F41; font-weight: bold;">
                                    <!-- 0 sebagai jumlah pecahan diakhir nomor nanti, 0 jadi 0, contoh 0 nya diubah jadi 2 total harga 1500 jadi 1.500.00 kalo 2 diubah jadi 0 makan hasilnya 1.500 '.' titik sebagai pemisah ribuan-->
                                    Rp.
                                    <?= (number_format($totalharga)); ?>
                                </div>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr></tr>

            </div>
        </div>
    </div>

    </tbody>
    </table>

    <!--BAGIAN PEMBAYARAN-->


    <div class="mb-3">
        <label for="jumlahPembayaran" class="form-label">Total
            Keseluruhan Harga:</label>
        <input type="text" class="form-control" id="totalAmount" value="<?= $totalharga; ?>" readonly>
    </div>

    <div class="mb-3">
        <label for="jumlahPembayaran" class="form-label">Jumlah Pembayaran:</label>
        <input type="text" class="form-control" id="jumlahPembayaran" placeholder="Enter amount" required>
    </div>

    <div class="mb-3">
        <label for="kembalian" class="form-label">Kembalian:</label>
        <input type="text" class="form-control" id="kembalian" readonly>
    </div>
    <div id="actionSection">
        <button type="button" class="btn btn-dua mb-4" onclick="hitungKembalian()">Kalkulasi Kembalian</button>

        <button id="actionSection" class="btn btn-satu mb-4" onclick="printStructure()">
            cetak struk
        </button>
    </div>




    <!-- JavaScript untuk menghitung kembalian -->
    <script>
        function hitungKembalian() {
            var totalAmount = parseFloat(document.getElementById("totalAmount").value.replace(',', ''));
            var jumlahPembayaran = parseFloat(document.getElementById("jumlahPembayaran").value);

            if (!isNaN(totalAmount) && !isNaN(jumlahPembayaran)) {
                var kembalian = jumlahPembayaran - totalAmount;
                document.getElementById("kembalian").value = formatCurrency(kembalian);
            } else {
                alert("Invalid input. Please enter valid numbers.");
            }
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }

        //Script untuk mencetak struk
        function printStructure() {
            window.print();
        }

    </script>










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
<div class="modal fade" id="TambahDP">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color : #5B3F41; font-weight:bold; ">Pilih Produk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="post" action="../routers/r_tambah_dp.php">

                <!-- Modal body -->
                <div class="modal-body" style="color : #5B3F41;">
                    Pilih Donat
                    <select name="idproduk" class="form-control">
                        <?php
                        $getproduk = mysqli_query($c, "SELECT * FROM produk WHERE idproduk NOT IN  (SELECT idproduk FROM detailpenjualan WHERE idpenjualan='$idp') ");

                        while ($pl = mysqli_fetch_array($getproduk)) {
                            $idproduk = $pl['idproduk'];
                            $namaproduk = $pl['namaproduk'];
                            $stok = $pl['stok'];

                            ?>

                            <option value="<?= $idproduk; ?>">
                                <?= $namaproduk; ?> (stok:
                                <?= $stok; ?>)
                            </option>

                        <?php } ?>
                    </select>

                    <input type="number" name="jumlahproduk" class="form-control mt-2" placeholder="Quantity" min="1"
                        required>
                    <input type="hidden" name="idp" value="<?= $idp; ?>">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dua" name="tambahDP">Tambah Pembelian</button>
                    <button type="button" class="btn btn-satu" data-bs-dismiss="modal">Tutup</button>
                </div>

        </div>
    </div>
</div>






</html>