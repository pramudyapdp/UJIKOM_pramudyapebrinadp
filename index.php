<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet - Donut</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;

        }

        .fullscreen-container {
            position: relative;
            width: 100%;
            height: 100%;
            background: url('assets/img/donut.jpg') center/cover;
            display: flex;
            align-items: center;
            color: #ffffff;
            text-align: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .content {
            z-index: 1;
            /*z-index adalah properti CSS yang menentukan urutan tumpukan atau kedalaman elemen dalam suatu tata letak (layout)*/
            padding: 10px;
            /* Mengurangi padding agar lebih kecil */
            border-radius: 10px;
            max-width: 400px;
            /* Mengurangi lebar container */
            margin-right: 250px;
            /* Penambahan margin kanan untuk menjauhkan dari tepi */
            position: absolute;
            right: 0;
            bottom: 20%;
            /* Menggeser vertikal 10% dari bawah container */
            transform: translate(0, 50%);
            /* Menggeser vertikal 50% dari tinggi container */
        }






        .btn {
            display: inline-block;
            background-color: #8B4513;
            color: #FFFCF4;
            text-decoration: none;
            font-weight: bold;
            border-radius: 100px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            padding: 10px 30px;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s, transform 0.3s;
            text-align: left;
            width: auto;
            margin-top: 60px;
        }

        .btn:hover {
            background-color: #FFFCF4;
            color: #8B4513;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <div class="fullscreen-container">
        <div class="overlay"></div>
        <div class="content">
            <a href="login.php" class="btn"><b>Log in!</b></a>
        </div>
    </div>

</body>

</html>