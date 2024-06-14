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
                                    <?= form_open('admin/payments/create/') ?>
                                    <?= csrf_field() ?>
                                    <?= form_hidden('id_membership', $membership[0]['id_membership']) ?>
                                    <div class="form-group">
                                        <label>Membership</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?= $membership[0]['nama_lengkap'] ?>" readonly>
                                        </div>
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
                                            <input type="text" name="total" class="form-control" value="<?= number_format($membership[0]['harga']) ?>" readonly>
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
                                            <input type="text" name="tgl_bayar" class="form-control" value="<?= date('d-m-y') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Metode Pembayaran</label>
                                        <div class="input-group">
                                            <input type="text" name="metode_pembayaran" class="form-control <?= (isset($errors['metode_pembayaran'])) ? 'is-invalid' : '' ?>" value="<?= old('metode_pembayaran') ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('metode_pembayaran') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex form-group justify-content-end">
                                        <button type="submit" class="btn btn-primary">Submit</a>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->endSection(); ?>