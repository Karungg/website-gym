<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
User
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
User
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex card-header">
                    <div class="mr-auto">
                        <a href="<?= base_url('admin/users/export-pdf') ?>" class="btn btn-icon icon-left btn-danger mr-2"><i class="far fa-file"></i> Pdf</a>
                        <a href="<?= base_url('admin/users/export-excel') ?>" class="btn btn-icon icon-left btn-success"><i class="far fa-file"></i> Excel</a>
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
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($users as $user) :
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td><?= $user['email'] ?></td>
                                        <td>
                                            <?= $user['username'] ?>
                                        </td>
                                        <td>
                                            <?= $user['created_at'] ?>
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