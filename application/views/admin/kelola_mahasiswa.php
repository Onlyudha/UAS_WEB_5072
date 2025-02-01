<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah
            Mahasiswa</button>
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $i => $mhs): ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $mhs['nim']; ?></td>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['nama_kelas']; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/hapus_mahasiswa/' . $mhs['id_mahasiswa']); ?>"
                                class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalEdit<?= $mhs['id_mahasiswa']; ?>">Edit</button>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit<?= $mhs['id_mahasiswa']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="<?= base_url('admin/edit_mahasiswa/' . $mhs['id_mahasiswa']); ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Edit Mahasiswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="nim" value="<?= $mhs['nim']; ?>" class="form-control mb-2"
                                            required>
                                        <input type="text" name="nama" value="<?= $mhs['nama']; ?>"
                                            class="form-control mb-2" required>
                                        <select name="id_kelas" class="form-control" required>
                                            <?php foreach ($kelas as $kls): ?>
                                                <option value="<?= $kls['id_kelas']; ?>" <?= $kls['id_kelas'] == $mhs['id_kelas'] ? 'selected' : ''; ?>>
                                                    <?= $kls['nama_kelas']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/tambah_mahasiswa'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="nim" placeholder="NIM" class="form-control mb-2" required>
                        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
                        <select name="id_kelas" class="form-control" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                            <?php foreach ($kelas as $kls): ?>
                                <option value="<?= $kls['id_kelas']; ?>"><?= $kls['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>