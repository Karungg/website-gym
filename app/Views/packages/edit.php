<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Edit Paket
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Edit Data Paket
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end card-header">
                    <a href="<?= base_url('admin/packages') ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php $errors = validation_errors()  ?>
                                    <?= form_open('admin/packages/' . $package['id_paket'] . '/edit') ?>
                                    <?= csrf_field() ?>
                                    <?= form_hidden('_method', 'PUT') ?>
                                    <?= form_hidden('id_paket', $package['id_paket']) ?>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Paket</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="nama_paket" class="form-control <?= (isset($errors['nama_paket'])) ? 'is-invalid' : '' ?>" value="<?= $package['nama_paket'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('nama_paket') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durasi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" name="durasi" class="form-control <?= (isset($errors['durasi'])) ? 'is-invalid' : '' ?>" value="<?= $package['durasi'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('durasi') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" name="harga" class="form-control <?= (isset($errors['harga'])) ? 'is-invalid' : '' ?>" value="<?= $package['harga'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('harga') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="deskripsi" class="form-control summernote <?= (isset($errors['deskripsi'])) ? 'is-invalid' : '' ?>"><?= $package['deskripsi'] ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('deskripsi') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Ubah</button>
                                        </div>
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