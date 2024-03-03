<?php
require '../controllers/koneksi.php';
$query = mysqli_query($c, "SELECT * FROM user WHERE username = '$_SESSION[username_kasir]'");
$hasil = mysqli_fetch_array($query);

// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: #333333; /* Default link color when not active */
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            color: #fffcf4; 
            border-radius: 10px;
            width: 60px
        }

        .sidebar a:hover:not(.active) {
            color: #fffcf4; 
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar ps-3">
        <a class="<?php echo ($current_page == 'produk.php') ? 'active' : ''; ?>" href="produk.php">
            <i style="font-size: 30px;" class="bi bi-box2-heart-fill"></i><br>
            <div style="font-size: 12px;">produk</div>
        </a>
        <a class="<?php echo ($current_page == 'penjualan.php') ? 'active' : ''; ?>" href="penjualan.php">
            <i style="font-size: 30px;" class="bi bi-cart4"></i><br>
            <div style="font-size: 12px;">penjualan</div>
        </a>
        <a class="<?php echo ($current_page == 'stock.php') ? 'active' : ''; ?>" href="stock.php">
            <i style="font-size: 30px;" class="bi bi-bag-plus-fill"></i><br>
            <div style="font-size: 12px;">stok</div>
        </a>
        <a class="<?php echo ($current_page == 'pelanggan.php') ? 'active' : ''; ?>" href="pelanggan.php">
            <i style="font-size: 30px;" class="bi bi-people-fill"></i><br>
            <div style="font-size: 12px;">pelanggan</div>
        </a>

        <?php
        if ($hasil['role'] == 'admin') {
            ?>
            <a class="<?php echo ($current_page == 'user.php') ? 'active' : ''; ?>" href="user.php">
                <i style="font-size: 30px;" class="bi bi-person-vcard"></i><br>
                <div style="font-size: 12px;">user</div>
            </a>
        <?php } ?>
    </div>
</body>

</html>
