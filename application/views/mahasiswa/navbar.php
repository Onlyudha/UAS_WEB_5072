<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://amikom.ac.id/theme/material/img/amikom_icon_pack/favicon-16x16.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>">
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <title>Dashboard</title>
    <style>
        .bg-purple {
            background-color: #a004eb !important;
        }

        .bg-violet {
            background-color: #E940FD !important;
        }

        .bg-orange {
            background-color: #ffe100 !important;
        }

        .btn-green {
            color: #fff;
            background-color: #0fd10f;
            border-color: #0fd10f;
        }

        .btn-blue {
            color: #fff;
            background-color: #0000ff;
            border-color: #0000ff;
        }
        .btn-violet {
            color: #fff;
            background-color: #E940FD;
            border-color: #E940FD;
        }
    </style>
</head>

<body>
    <!-- Navbar Atas -->
    <nav class="navbar justify-content-between bg-purple px-2">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <img class="me-3" src="<?php echo base_url('assets/image/amikom.png')?>" alt="" width="30" height="30">
                <h6 class="text-white mb-0">UNIVERSITAS AMIKOM YOGYAKARTA</h6>
            </div>
            <div>
                <a href="<?= base_url('index.php/auth/login'); ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>
    <nav class="nav bg-violet">
        <div class="offcanvas offcanvas-start" id="offcanvas">
            <div class="offcanvas-body">
                <ul class="list-unstyled">
                    <li class="mb-2 ms-2"><a href="<?= base_url('index.php/admin'); ?>" class="w3-bar-item w3-button">Dashboard</a></li>
                </ul>
            </div>
        </div>
        <button class="btn btn-violet text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</body>
</html>