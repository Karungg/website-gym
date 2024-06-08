<!-- Menu -->
<div class="menu">
    <div class="container flex">

        <div class="mobile-btn">
            <ion-icon name="grid"></ion-icon>
        </div>
        <div class="logo">
            <img src="<?= base_url('assets/') ?>img/logo.png" alt="" />
        </div>

        <ul class="nav">
            <li class="nav-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="nav-item"><a href="#why-us">Features</a></li>
            <li class="nav-item"><a href="#explore">Explore</a></li>
            <li class="nav-item"><a href="#discount">Register</a></li>
        </ul>

        <div>
            <?php if (!logged_in()) { ?>
                <a href="<?= base_url('register') ?>" class="btn">Register</a>
                <a href="<?= base_url('login') ?>" class="btn">Login</a>
            <?php } else { ?>
                <?php if (in_groups('admin')) { ?>
                    <a href="<?= base_url('admin') ?>" class="btn">Dashboard</a>
                <?php } else { ?>
                    <a href="<?= base_url('my-membership') ?>" class="btn">Membership Saya</a>
                    <a href="<?= base_url('logout') ?>" onclick="return confirm('Logout?')" class="btn">Logout</a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Menu -->