<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Detail <?= $membership['nama_lengkap'] ?>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Detail Membership
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
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" value="<?= $membership['nama_lengkap'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input class="form-control phone-number" value="<?= $membership['no_telp'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" value="<?= $membership['tgl_lahir'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" value="<?= $membership['alamat'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Diri</label>
                                        <img src="<?= base_url('assets/img/foto/' . $membership['foto_diri']) ?>" alt="foto-diri" class="d-block img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="<?= $membership['email'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input class="form-control" value="<?= $membership['jenis_kelamin'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor KTP</label>
                                        <input class="form-control" value="<?= $membership['no_ktp'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Paket</label>
                                        <input class="form-control" value="<?= $membership['id_paket'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto KTP</label>
                                        <img src="<?= base_url('assets/img/foto/' . $membership['foto_ktp']) ?>" alt="foto-diri" class="d-block img-thumbnail">
                                    </div>
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