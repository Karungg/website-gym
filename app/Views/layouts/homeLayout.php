<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> | Bulls Gym</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>css.css" />
</head>

<body>

    <?= $this->include('partials/home-menu'); ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('partials/home-footer'); ?>

    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <script src="<?= base_url('assets/js/') ?>js.js"></script>
</body>

</html>