<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Tambah Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Tambah Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end card-header">
                    <a href="<?= base_url('admin/payments') ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <?php $errors = validation_errors()  ?>
                                    <?= form_open('admin/payments') ?>
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label>Membership</label>
                                        <select class="form-control select">
                                            <?php foreach ($memberships as $membership) : ?>
                                                <option value="<?= $membership['id_membership'] ?>"><?= $membership['id_membership'] ?> - <?= $membership['nama_lengkap'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea id="keterangan" class="form-control <?= (isset($errors['keterangan'])) ? 'is-invalid' : '' ?>" name="keterangan"><?= old('keterangan') ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('keterangan') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?= $membership['harga'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal Bayar</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?= date('d-m-y') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Metode Pembayaran</label>
                                        <div class="input-group">
                                            <input type="text" name="metode_pembayaran" class="form-control phone-number <?= (isset($errors['metode_pembayaran'])) ? 'is-invalid' : '' ?>" value="<?= old('metode_pembayaran') ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('metode_pembayaran') ?>
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