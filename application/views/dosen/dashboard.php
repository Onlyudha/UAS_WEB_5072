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
            <p> <strong>Hai <?php echo isset($username) ? $username : 'Dosen'; ?></strong><br>
                Selamat datang di <?= isset($title) ? $title : 'Dashboard'; ?>
            </p>
        </div>
    </nav>
    <div id="wrapper" class="d-flex">
        <!-- Content -->
        <div id="content-admin" class="w-100">
            <div class="container my-3">
                <div class="container mt-3">
                    <div class="row g-4 mb-3">
                        <!-- Total Mahasiswa -->
                        <div class="col-md-4">
                            <div class="p-4 bg-purple text-white rounded shadow-sm text-center">
                                <h5 class="fw-bold">Total Mahasiswa</h5>
                                <p class="display-5 fw-bold"><?= isset($total_mahasiswa) ? $total_mahasiswa : 0; ?></p>
                                <p class="mb-0">Mahasiswa terdaftar dalam sistem Anda.</p>
                            </div>
                        </div>
                        <!-- Total Kelas -->
                        <div class="col-md-4">
                            <div class="p-4 bg-violet text-white rounded shadow-sm text-center">
                                <h5 class="fw-bold">Total Kelas</h5>
                                <p class="display-5 fw-bold"><?= isset($total_kelas) ? $total_kelas : 0; ?></p>
                                <p class="mb-0">Kelas aktif yang sedang berjalan.</p>
                            </div>
                        </div>
                        <!-- Rata-rata Nilai -->
                        <div class="col-md-4">
                            <div class="p-4 bg-primary text-white rounded shadow-sm text-center">
                                <h5 class="fw-bold">Rata-Rata Nilai</h5>
                                <p class="display-5 fw-bold"><?= isset($rata_rata_nilai) ? $rata_rata_nilai : 0; ?></p>
                                <p class="mb-0">Rata-rata nilai akademik saat ini.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <a href="<?= base_url('dosen/input_nilai'); ?>"><button class="btn-primary rounded-2 mb-3"><strong>Update Nilai</strong></button></a>
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Kelas</th>
                                <th>Tugas</th>
                                <th>Responsi</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Nilai Angka</th>
                                <th>Nilai Huruf</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($input_nilai as $i => $nilai):
                                // Perhitungan nilai angka sebagai rata-rata dari tugas, responsi, UTS, dan UAS
                                $nilai_angka = ($nilai['nilai_tugas'] + $nilai['nilai_responsi'] + $nilai['nilai_uts'] + $nilai['nilai_uas']) / 4;

                                // Penentuan nilai huruf berdasarkan nilai angka
                                if ($nilai_angka >= 85) {
                                    $nilai_huruf = 'A';
                                } elseif ($nilai_angka >= 75) {
                                    $nilai_huruf = 'B';
                                } elseif ($nilai_angka >= 60) {
                                    $nilai_huruf = 'C';
                                } elseif ($nilai_angka >= 50) {
                                    $nilai_huruf = 'D';
                                } else {
                                    $nilai_huruf = 'E';
                                }
                                ?>
                                <tr>
                                    <td><?= $i + 1; ?></td>
                                    <td><?= $nilai['nama_mahasiswa']; ?></td>
                                    <td><?= $nilai['NIM']; ?></td>
                                    <td><?= $nilai['kelas'] ?: '-'; ?></td>
                                    <td><?= $nilai['nilai_tugas'] !== null ? $nilai['nilai_tugas'] : '-'; ?></td>
                                    <td><?= $nilai['nilai_responsi'] !== null ? $nilai['nilai_responsi'] : '-'; ?></td>
                                    <td><?= $nilai['nilai_uts'] !== null ? $nilai['nilai_uts'] : '-'; ?></td>
                                    <td><?= $nilai['nilai_uas'] !== null ? $nilai['nilai_uas'] : '-'; ?></td>
                                    <td><?= number_format($nilai_angka, 2); ?></td>
                                    <td><?= $nilai_huruf; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <!-- Jadwal Mengajar -->
                <div class="card mt-5 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Jadwal Mengajar</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Hari</th>
                                    <th>Mata Kuliah</th>
                                    <th>Kelas</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>