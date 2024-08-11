<?php
function isCurrentRoute($route, $urlSegments)
{
    $currentUrl = implode('/', $urlSegments);

    // Check if the current URL exactly matches the route
    if ($currentUrl === $route) {
        return true;
    }

    // Check if the current URL starts with the route and is followed by a slash
    if (strpos($currentUrl, $route . '/') === 0) {
        return true;
    }

    return false;
}

$current_url_segments = current_url(true)->getSegments();
?>

<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img" style="font-size: 25px;">
                <img src="<?= base_url('../assets/guru/images/logos/wcode.png') ?>" width="180" alt="">
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">HOME</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo isCurrentRoute('siswa/materi', $current_url_segments) || isCurrentRoute('siswa/nilai_kuis', $current_url_segments) || isCurrentRoute('siswa/waktu_belajar', $current_url_segments) || isCurrentRoute('siswa/lihat_hasil_kuis', $current_url_segments) || isCurrentRoute('siswa/petunjuk', $current_url_segments) || isCurrentRoute('siswa/pengembang', $current_url_segments) ? '' : (isCurrentRoute('siswa/beranda', $current_url_segments) || isCurrentRoute('siswa', $current_url_segments) || isCurrentRoute('', $current_url_segments) ? 'active' : ''); ?>" href="<?= base_url('siswa/beranda'); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Beranda</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MATERI</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo isCurrentRoute('siswa/materi', $current_url_segments) ? 'active' : ''; ?>" href="<?= base_url('siswa/materi'); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Materi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link a <?php echo isCurrentRoute('siswa/nilai_kuis', $current_url_segments) || isCurrentRoute('siswa/lihat_hasil_kuis', $current_url_segments) ? 'active' : ''; ?>" href="<?= base_url('siswa/nilai_kuis'); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Nilai Kuis</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link a" href="<?= base_url('siswa/waktu_belajar'); ?>" aria-expanded="false">
                        <span>
                            <i class="ti fa-clock"></i>
                        </span>
                        <span class="hide-menu">Waktu Belajar</span>
                    </a>
                </li>
                <?php if (in_groups('admin')) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('admin/'); ?>" aria-expanded="false">
                            <span>
                                <i class="fa-solid fa-people-arrows"></i>
                            </span>
                            <span class="hide-menu">Tampilan Admin</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">INFO</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('siswa/petunjuk'); ?>" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-receipt"></i>
                        </span>
                        <span class="hide-menu">Petunjuk Penggunaan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('siswa/pengembang'); ?>" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-info"></i>
                        </span>
                        <span class="hide-menu">Informasi Pengembang</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AKUN</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('logout') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-login"></i>
                        </span>
                        <span class="hide-menu">Keluar</span>
                    </a>
                </li>
            </ul>
            <div class="unlimited-access hide-menu bg-light-primary position-relative mb-1 mt-1 rounded">
                <div class="d-flex">
                    <img src="<?= base_url('../assets/guru/images/UM.png') ?>" alt="" class="img-fluid">
                </div>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->