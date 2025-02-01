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
            <p> <strong>Hai <?php echo isset($username) ? $username : 'mahasiswa'; ?></strong><br>
                Selamat datang di <?= isset($title) ? $title : 'Dashboard'; ?>
            </p>
        </div>
    </nav>
    <div class="container my-4">
        <h2 class="text-center mb-4">Nilai Mahasiswa</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Tugas</th>
                        <th>Responsi</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Angka</th>
                        <th>Nilai Huruf</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dashboard as $i => $nilai):
                        $nilai_angka = ($nilai['nilai_tugas'] + $nilai['nilai_responsi'] + $nilai['nilai_uts'] + $nilai['nilai_uas']) / 4;

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
                            <td class="text-center"><?= $nilai['nilai_tugas'] !== null ? $nilai['nilai_tugas'] : '-'; ?>
                            </td>
                            <td class="text-center">
                                <?= $nilai['nilai_responsi'] !== null ? $nilai['nilai_responsi'] : '-'; ?></td>
                            <td class="text-center"><?= $nilai['nilai_uts'] !== null ? $nilai['nilai_uts'] : '-'; ?></td>
                            <td class="text-center"><?= $nilai['nilai_uas'] !== null ? $nilai['nilai_uas'] : '-'; ?></td>
                            <td class="text-center"><?= number_format($nilai_angka, 2); ?></td>
                            <td class="text-center"><?= $nilai_huruf; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>