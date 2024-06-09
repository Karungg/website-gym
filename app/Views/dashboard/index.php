<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Dashboard
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
Dashboard
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total User</h4>
                </div>
                <div class="card-body">
                    <?= $total_users ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-tag"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Paket</h4>
                </div>
                <div class="card-body">
                    <?= $total_packages ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Membership</h4>
                </div>
                <div class="card-body">
                    <?= $total_memberships ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Statistics</h4>
                <div class="card-header-action">
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary">Week</a>
                        <a href="#" class="btn">Month</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="182"></canvas>
                <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                        <div class="detail-value">$243</div>
                        <div class="detail-name">Today's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                        <div class="detail-value">$2,902</div>
                        <div class="detail-name">This Week's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                        <div class="detail-value">$12,821</div>
                        <div class="detail-name">This Month's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                        <div class="detail-value">$92,142</div>
                        <div class="detail-name">This Year's Sales</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Membership Baru</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <?php

                    use CodeIgniter\I18n\Time;

                    foreach ($recent_memberships->getResult() as $membership) : ?>
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="<?= base_url('stisla/') ?>assets/img/avatar/avatar-1.png" alt="avatar">
                            <div class="media-body">
                                <?php $created_at = Time::parse($membership->created_at, 'Asia/Jakarta') ?>
                                <div class="float-right text-primary"><?= $created_at->humanize() ?></div>
                                <div class="media-title"><?= $membership->nama_lengkap ?></div>
                                <span class="text-small text-muted"><?= $membership->nama_paket ?></span>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
                <div class="text-center pt-1 pb-1">
                    <a href="<?= base_url('admin/memberships') ?>" class="btn btn-primary btn-lg btn-round">
                        Lihat Semua
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>