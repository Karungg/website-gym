<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Pembayaran
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
                        <a href="<?= base_url('admin/payments/export-pdf') ?>" class="btn btn-icon icon-left btn-danger mr-2"><i class="far fa-file"></i> Pdf</a>
                        <a href="<?= base_url('admin/payments/export-excel') ?>" class="btn btn-icon icon-left btn-success"><i class="far fa-file"></i> Excel</a>
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
                                    <th>Nama Paket</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Keterangan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($payments as $payment) :
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td><?= $payment['nama_lengkap'] ?></td>
                                        <td>
                                            <?= $payment['nama_paket'] ?>
                                        </td>
                                        <td>
                                            <?= $payment['tgl_bayar'] ?>
                                        </td>
                                        <td>
                                            <?= $payment['metode_pembayaran'] ?>
                                        </td>
                                        <td>
                                            <?= $payment['keterangan'] ?>
                                        </td>
                                        <td>
                                            <?= number_format($payment['total'])  ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>