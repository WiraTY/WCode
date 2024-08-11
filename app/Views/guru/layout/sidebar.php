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
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo isCurrentRoute('admin/materi', $current_url_segments) || isCurrentRoute('admin/daftar_siswa', $current_url_segments) || isCurrentRoute('admin/daftar_nilai_siswa', $current_url_segments) || isCurrentRoute('admin/waktu_belajar_siswa', $current_url_segments) || isCurrentRoute('admin/nilai_per_siswa', $current_url_segments) || isCurrentRoute('admin/nilai_topik', $current_url_segments) ? '' : (isCurrentRoute('admin/beranda', $current_url_segments) || isCurrentRoute('admin', $current_url_segments) ? 'active' : ''); ?>" href="<?= base_url('admin/beranda'); ?>" aria-expanded="false">
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
                    <a class="sidebar-link <?php echo isCurrentRoute('admin/materi', $current_url_segments) ? 'active' : ''; ?>" href="<?= base_url('admin/materi'); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Daftar Materi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo isCurrentRoute('admin/daftar_siswa', $current_url_segments) || isCurrentRoute('admin/nilai_per_siswa', $current_url_segments) || isCurrentRoute('admin/waktu_belajar_siswa', $current_url_segments) ? 'active' : ''; ?>" href="<?= base_url('admin/daftar_siswa'); ?>" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-people-roof"></i>
                        </span>
                        <span class="hide-menu">Daftar Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo isCurrentRoute('admin/daftar_nilai_siswa', $current_url_segments) || isCurrentRoute('admin/nilai_topik', $current_url_segments) ? 'active' : ''; ?>" href="<?= base_url('admin/daftar_nilai_siswa'); ?>" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-list-ol"></i>
                        </span>
                        <span class="hide-menu">Daftar Nilai Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('siswa/'); ?>" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-people-arrows"></i>
                        </span>
                        <span class="hide-menu">Tampilan Siswa</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">INFO</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('guru/petunjuk'); ?>" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-receipt"></i>
                        </span>
                        <span class="hide-menu">Petunjuk Penggunaan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('guru/pengembang'); ?>" aria-expanded="false">
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
            <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
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