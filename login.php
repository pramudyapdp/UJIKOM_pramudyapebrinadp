<?php

require 'controllers/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sweet - login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton&display=swap">



    <style>
        body {
            background: url('assets/img/loginn.jpg') center center fixed;
            background-size: cover;
            margin: 0;
            height: 100%;
        }

        .card-header {
            text-align: center;
        }

        .card-header h3 {
            font-size: 2em;
            color: #7E99E6;
            letter-spacing: -0.02em;
            margin-bottom: 1em;
        }

        .card-body {}

        .form-floating {
            position: relative;
            padding: 10px;
            margin-bottom: 10px;
        }


        .form-floating input {
            background-color: #FFFCF4;
            border-color: #F5A9B5;
        }

        .form-floating input:focus {
            outline: 2px solid #F5A9B5;
            outline-offset: -2px;
        }

        .btn-log {
            background-color: #FFFCF4;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            color: #F5A9B5;
            font-weight: bold;
            transition: transform 0.3s;
            border-radius: 100px;
            font-family: 'Anton', sans-serif;
        }

        .btn-log:hover {
            transform: scale(1.15);
            background-color: #F5A9B5;
            color: #FFFCF4;
        }

        .text-login {
            color: #F5A9B5;
            font-weight: bold;
            font-size: 50px;
            letter-spacing: 3px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }

        .text-form {
            color: #F5A9B5;
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin-left: 10px;
            margin-top: 13px;
        }

        .card {
            padding: 20px;
            background-color: #FFFCF4;
            border-radius: 20px;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .container {
            margin-top: 100px;
            margin-right: 500px;
        }
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-5 d-flex align-items-center text-center">
                            <div class="card">
                                <h3><b class="text-login" style="font-family: 'Anton', sans-serif;">Log in</b></h3>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate action="routers/r_login.php"
                                        method="POST">
                                        <div class="form-floating">
                                            <input name="username" type="text" class="form-control" id="floatingInput"
                                                placeholder="Username" required>
                                            <label for="floatingInput" class="text-form">username</label>
                                            <div class="invalid-feedback">
                                                Enter a valid username.
                                            </div>
                                        </div>
                                       
                                        <div class="form-floating mt-3">
                                            <input name="password" type="password" class="form-control"
                                                id="floatingPassword" placeholder="Password" required>
                                            <label for="floatingPassword" class="text-form">password</label>
                                            <div class="invalid-feedback">
                                                Enter a password.
                                            </div>
                                        </div>
                                      
                                        <button class="btn btn-log w-100 mt-3" style="font-family: Arial, sans-serif;"
                                            type="submit" name="login" value="value">LOG IN</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
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
</body>

</html>