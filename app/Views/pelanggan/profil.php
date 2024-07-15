<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="<?= base_url('path/to/bootstrap.css') ?>">
    <script src="<?= base_url('path/to/bootstrap.js') ?>"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h3 class="page-title text-dark" align="center">PROFIL</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?= view('alert'); ?>

            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#datadiri" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block">Data Diri</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#ubahpassword" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Ubah Password</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="datadiri">
                            <?php foreach ($row->getResult() as $data) : ?>
                                <form action="<?= base_url('customer/edit_profil') ?>" method="post" class="needs-validation" novalidate>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_customer" value="<?= $data->id_customer; ?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama_customer">Nama Customer</label>
                                            <input type="text" class="form-control" name="nama_customer" value="<?= $data->nama_customer; ?>" placeholder="Nama Customer" id="nama_customer" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-select" id="jenis_kelamin" required>
                                                <option value="Laki-laki" <?= $data->jenis_kelamin == 'Laki-laki' ? "selected" : ''; ?>>Laki-laki</option>
                                                <option value="Perempuan" <?= $data->jenis_kelamin == 'Perempuan' ? "selected" : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" rows="5" maxlength="250" name="alamat" placeholder="Alamat" required><?= $data->alamat; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="no_telepon">No WhatsApp</label>
                                            <input type="number" class="form-control" min="0" maxlength="16" value="<?= $data->no_telepon; ?>" name="no_telepon" placeholder="No Telepon" id="no_telepon" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="no_ktp">NIK</label>
                                            <input type="number" class="form-control" readonly name="no_ktp" value="<?= $data->no_ktp; ?>" placeholder="No KTP" id="no_ktp" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>

                        <div class="tab-pane" id="ubahpassword">
                            <?php foreach ($row->getResult() as $data) : ?>
                                <form action="<?= base_url('customer/ubah_password') ?>" method="post" class="needs-validation" novalidate>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_customer" value="<?= $data->id_customer; ?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="username_customer">Username</label>
                                            <input type="text" class="form-control" name="username_customer" value="<?= $data->username_customer; ?>" placeholder="Username" id="username_customer" readonly required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_customer" class="form-label">Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" minlength="8" name="password_customer" class="form-control" placeholder="Password" id="password_customer" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>

</body>
</html>
