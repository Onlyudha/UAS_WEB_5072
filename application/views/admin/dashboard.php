<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

        .btn-violet {
            color: #fff;
            background-color: #E940FD;
            border-color: #E940FD;
        }

        .icon {
            width: 60px;
        }

        .logo-amikom {
            max-height: 50px;
            height: auto;
            width: auto;
        }

        .bg-violet {
            background-color: #E940FD !important;
        }
    </style>
</head>

<body>
    <nav class="bg-purple nav p-2 mt-3 mx-3 mb-3 align-items-center">
        <div>
            <img class="icon" src="<?php echo base_url('assets/image/deafult.png') ?>" alt="">
        </div>
        <div class="ms-2 mt-1 text-white fs-5">
            <p> <strong>Hai <?php echo isset($username) ? $username : 'Admin'; ?></strong><br>
                Selamat datang di <?= isset($title) ? $title : 'Dashboard'; ?>
            </p>
        </div>
    </nav>
    <div class="justify-content-center row g-4 mx-2">
        <div class="col-md-4">
            <div class="card shadow-sm text-white bg-purple h-100 justify">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">Manajemen Dosen</h5>
                    <a href="<?= base_url('admin/kelola_dosen'); ?>" class="btn btn-light mt-auto">
                        <i class="bi bi-people-fill"></i> Daftar Dosen
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm text-white bg-violet h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">Manajemen Mahasiswa</h5>
                    <a href="<?= base_url('admin/kelola_mahasiswa'); ?>" class="btn btn-light mt-auto">
                        <i class="bi bi-people-fill"></i> Daftar Mahasiswa
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm text-white bg-primary h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">Kelola Mata Kuliah</h5>
                    <a href="<?= base_url('admin/kelola_jadwal'); ?>" class="btn btn-light mt-auto">
                        <i class="bi bi-calendar-check"></i> Daftar Mata Kuliah
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>