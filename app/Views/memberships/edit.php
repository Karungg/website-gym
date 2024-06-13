<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Edit <?= $membership['nama_lengkap'] ?>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Edit Membership
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end card-header">
                    <a href="<?= base_url('admin/memberships') ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <?php $errors = validation_errors()  ?>
                                    <?= form_open_multipart('admin/memberships/' . $membership['id_membership'] . '/edit') ?>
                                    <?= csrf_field() ?>
                                    <?= form_hidden('_method', 'PUT') ?>
                                    <?= form_hidden('id_membership', $membership['id_membership']) ?>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control <?= (isset($errors['nama_lengkap'])) ? 'is-invalid' : '' ?>" value="<?= $membership['nama_lengkap'] ?>">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('nama_lengkap') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="no_telp" class="form-control phone-number <?= (isset($errors['no_telp'])) ? 'is-invalid' : '' ?>" value="<?= $membership['no_telp'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('no_telp') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control <?= (isset($errors['tgl_lahir'])) ? 'is-invalid' : '' ?>" value="<?= $membership['tgl_lahir'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('tgl_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea id="alamat" class="form-control <?= (isset($errors['alamat'])) ? 'is-invalid' : '' ?>" name="alamat"><?= $membership['alamat'] ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('alamat') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Diri</label>
                                        <input id="foto_diri" type="file" class="form-control <?= (isset($errors['foto_diri'])) ? 'is-invalid' : '' ?>" name="foto_diri" value="<?= old('foto_diri') ?>">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('foto_diri') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control <?= (isset($errors['email'])) ? 'is-invalid' : '' ?>" value="<?= $membership['email'] ?>">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="pria" name="jenis_kelamin" id="pria" checked value="<?= $membership['jenis_kelamin'] ?>" />
                                            <label class="form-check-label" for="pria">
                                                Pria
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="wanita" name="jenis_kelamin" id="wanita" value="<?= $membership['jenis_kelamin'] ?>" />
                                            <label class="form-check-label" for="wanita">
                                                Wanita
                                            </label>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('jenis_kelamin') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor KTP</label>
                                        <input type="number" name="no_ktp" class="form-control <?= (isset($errors['nama_lengkap'])) ? 'is-invalid' : '' ?>" value="<?= $membership['no_ktp'] ?>">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('no_ktp') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Paket</label>
                                        <input class="form-control" value="<?= $membership['id_paket'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto KTP</label>
                                        <input id="foto_ktp" type="file" class="form-control <?= (isset($errors['foto_ktp'])) ? 'is-invalid' : '' ?>" name="foto_ktp" value="<?= old('foto_ktp') ?>">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('foto_ktp') ?>
                                        </div>
                                    </div>
                                    <div class="d-flex form-group justify-content-end">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>