<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dosen</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
</head>

<body>
    <div class="container mt-3">

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Dosen</button>

        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosen as $i => $dsn): ?>
                    <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $dsn['nip']; ?></td>
                        <td><?= $dsn['nama']; ?></td>
                        <td><?= $dsn['alamat']; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/hapus_dosen/' . $dsn['id_dosen']); ?>"
                                class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalEdit<?= $dsn['id_dosen']; ?>">Edit</button>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit<?= $dsn['id_dosen']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="<?= base_url('admin/edit_dosen/' . $dsn['id_dosen']); ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Edit Dosen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="nip" value="<?= $dsn['nip']; ?>" class="form-control mb-2" required>
                                        <input type="text" name="nama" value="<?= $dsn['nama']; ?>" class="form-control mb-2" required>
                                        <input type="text" name="alamat" value="<?= $dsn['alamat']; ?>" class="form-control mb-2" required>
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
            <form action="<?= base_url('admin/tambah_dosen'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="nip" placeholder="NIP" class="form-control mb-2" required>
                        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control mb-2" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
