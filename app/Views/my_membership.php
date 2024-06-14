<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/') ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('stisla/') ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/img/logo.png') ?>" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <a href="<?= base_url('') ?>" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-arrow-left"></i>Kembali</a>
                        <div class="card card-primary">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                1
                                            </td>
                                            <td><?= $membership[0]['nama_lengkap'] ?></td>
                                            <td>
                                                <?= $membership[0]['email'] ?>
                                            </td>
                                            <td>
                                                <?= $membership[0]['no_telp'] ?>
                                            </td>
                                            <td>
                                                <?= $membership[0]['jenis_kelamin'] ?>
                                            </td>
                                            <td>
                                                <?= $membership[0]['tgl_lahir'] ?>
                                            </td>
                                            <td>
                                                <?= $membership[0]['nama_paket'] ?>
                                            </td>
                                            <td>
                                                <?= $membership[0]['status'] ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('stisla/') ?>assets/modules/jquery.min.js"></script>
    <script src="<?= base_url('stisla/') ?>assets/modules/popper.js"></script>
    <script src="<?= base_url('stisla/') ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url('stisla/') ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('stisla/') ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('stisla/') ?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url('stisla/') ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url('stisla/') ?>assets/js/scripts.js"></script>
    <script src="<?= base_url('stisla/') ?>assets/js/custom.js"></script>
</body>

</html>