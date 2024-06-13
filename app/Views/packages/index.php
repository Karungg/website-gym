<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Paket
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Paket
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif ?>
            <div class="card">
                <div class="d-flex card-header">
                    <div class="mr-auto">
                        <a href="<?= base_url('admin/packages/export-pdf') ?>" class="btn btn-icon icon-left btn-danger mr-2"><i class="far fa-file"></i> Pdf</a>
                        <button class="btn btn-icon icon-left btn-success"><i class="far fa-file"></i> Excel</btn>
                    </div>
                    <a href="<?= base_url('admin/packages/create') ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data Paket</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Nama Paket</th>
                                    <th>Deskripsi</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($packages as $package) :
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no ?>
                                        </td>
                                        <td><?= $package['nama_paket'] ?></td>
                                        <td>
                                            <?= $package['deskripsi'] ?>
                                        </td>
                                        <td>
                                            <?= $package['durasi'] ?> Bulan
                                        </td>
                                        <td>Rp. <?= $package['harga'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/packages/' . $package['id_paket']) ?>/edit" class="btn btn-success">Ubah</a>
                                            <form action="<?= base_url('admin/packages/delete/' . $package['id_paket']) ?>" method="post" onsubmit="return confirm('Hapus' + ' <?= $package['nama_paket'] ?>?');" style="display: inline;">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">Hapus</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>