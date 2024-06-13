<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Membership
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Membership
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
                        <a href="<?= base_url('admin/memberships/export-pdf') ?>" class="btn btn-icon icon-left btn-danger mr-2"><i class="far fa-file"></i> Pdf</a>
                        <a href="<?= base_url('admin/memberships/export-excel') ?>" class="btn btn-icon icon-left btn-success"><i class="far fa-file"></i> Excel</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Paket</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($memberships as $membership) :
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no ?>
                                        </td>
                                        <td><?= $membership['nama_lengkap'] ?></td>
                                        <td>
                                            <?= $membership['email'] ?>
                                        </td>
                                        <td>
                                            <?= $membership['no_telp'] ?>
                                        </td>
                                        <td>
                                            <?= $membership['jenis_kelamin'] ?>
                                        </td>
                                        <td>
                                            <?= $membership['tgl_lahir'] ?>
                                        </td>
                                        <td>
                                            <?= $membership['nama_paket'] ?>
                                        </td>
                                        <td>
                                            <?= $membership['status'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/memberships/' . $membership['id_membership']) ?>" class="btn btn-primary">Detail</a>
                                            <a href="<?= base_url('admin/memberships/' . $membership['id_membership']) ?>/edit" class="btn btn-success">Ubah</a>
                                            <form action="<?= base_url('admin/memberships/delete/' . $membership['id_membership']) ?>" method="post" onsubmit="return confirm('Hapus' + ' <?= $membership['nama_lengkap'] ?>?');" style="display: inline;">
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