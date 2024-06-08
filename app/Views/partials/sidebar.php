<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>">Bulls Gym</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url() ?>">Bulls</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item <?= uri_string() == 'admin' ? 'active' : '' ?>">
                <a href="<?= base_url('admin') ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="nav-item <?= str_contains(uri_string(), 'admin/packages') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/packages') ?>" class="nav-link"><i class="fas fa-tag"></i><span>Paket</span></a>
            </li>
            <li class="nav-item <?= str_contains(uri_string(), 'admin/memberships') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/memberships') ?>" class="nav-link"><i class="fas fa-users"></i><span>Membership</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('logout') ?>" onclick="return confirm('Logout?')" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
        </ul>
    </aside>
</div>