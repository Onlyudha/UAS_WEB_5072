<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <link rel="shortcut icon" href="https://amikom.ac.id/theme/material/img/amikom_icon_pack/favicon-16x16.png"
        type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
    <style>
        .logo {
            width: 100px;
        }

        .amikom {
            width: 300px;
        }

        .bg-purple {
            background-color: #a004eb !important;
        }

        .login-container {
            height: 100vh;
        }

        .btn-purple {
            color: #fff;
            background-color: #a004eb;
            border-color: #a004eb;
        }

        .icon {
            width: 60px;
        }
    </style>
</head>

<body class="bg-white d-flex justify-content-center align-items-center vh-100">
    <div class="row w-50">
        <div
            class="col-sm-6 bg-purple rounded-3 d-flex flex-column justify-content-center align-items-center text-white p-4">
            <img class="amikom" src="<?php echo base_url('assets/image/logo-amikom.png') ?>" alt="">
        </div>
        <div class="col-sm-6 bg-light rounded-3 justify-content-center align-items-center">
            <div class="card-body w-100 mt-3 p-4">
                <h3 class="text-center">Login Form</h3>
                <form action="<?php echo base_url("auth/login_process") ?>" method="POST">
                    <input type="text" name="username" class="form-control mt-4" placeholder="Masukan Username">
                    <input type="password" name="password" class="form-control mt-4" placeholder="Masukan Password">
                    <button class="btn-purple text-white rounded-3 mt-3 w-100 fs-5">Login</button>
                    <div class="check-box mt-2">
                        <label><input type="checkbox">Remember me</label>
                    </div>
                </form>
                <!-- <a href="<?php echo base_url("auth/register") ?>">register</a> -->
            </div>
            <div class="w3-panel w3-blue w3-display-container">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</body>

</html>