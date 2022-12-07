 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('Pegawai') ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3"><sup>Sistem</sup>Informasi <sup>Sekolah</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?= site_url('Pegawai') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu Aplikasi
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Refrensi</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Refrensi:</h6>
             <a class="collapse-item" href="<?= site_url('bagian') ?>">Bagian</a>
             <a class="collapse-item" href="<?= site_url('Pegawai') ?>">Pegawai</a>
             <a class="collapse-item" href="<?= site_url('tahun') ?>">Tahun Ajar</a>
             <a class="collapse-item" href="<?= site_url('pendidikanguru') ?>">Pendidikan Guru</a>
             <a class="collapse-item" href="<?= site_url('kelas') ?>">Kelas</a>
             <a class="collapse-item" href="<?= site_url('mapel') ?>">Mapel</a>
             <a class="collapse-item" href="<?= site_url('jadwal') ?>">Jadwal</a>
             <a class="collapse-item" href="<?= site_url('kehadiranguru') ?>">kehadiran Guru</a>
             <a class="collapse-item" href="<?= site_url('siswa') ?>">Siswa</a>
             <a class="collapse-item" href="<?= site_url('kelassiswa') ?>">Kelas Siswa</a>
             <a class="collapse-item" href="<?= site_url('kehadiransiswa') ?>">Kehadiran Siswa</a>
             <a class="collapse-item" href="<?= site_url('penilaian') ?>">Penilaian</a>
             <a class="collapse-item" href="<?= site_url('rincianpenilaian') ?>">Rincian Penilaian</a>










           
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Sistem Informasi Sekolah
</div>

<!-- Nav Item - Pages Collapse Menu -->

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bagian"
        aria-expanded="true" aria-controls="bagian">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Bagian</span>
    </a>
    <div id="bagian" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bagian:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('bagian') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pegawai"
        aria-expanded="true" aria-controls="pegawai">
        <i class="fas fa-fw fa-user-md"></i>
        <span>Pegawai</span>
    </a>
    <div id="pegawai" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pegawai:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('Pegawai') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tahun"
        aria-expanded="true" aria-controls="tahun">
        <i class="fas fa-fw fa-calendar"></i>
        <span>Tahun Ajar</span>
    </a>
    <div id="tahun" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tahun Ajar:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('tahun') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pendidikanguru"
        aria-expanded="true" aria-controls="pendidikanguru">
        <i class="fas fa-fw fa-book"></i>
        <span>Pendidikan Guru</span>
    </a>
    <div id="pendidikanguru" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pendidikan Guru:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('pendidikanguru') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kelas"
        aria-expanded="true" aria-controls="kelas">
        <i class="fas fa-fw fa-building"></i>
        <span>Kelas</span>
    </a>
    <div id="kelas" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelas:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('kelas') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mapel"
        aria-expanded="true" aria-controls="mapel">
        <i class="fas fa-fw fa-book"></i>
        <span>Mapel</span>
    </a>
    <div id="mapel" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mapel:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('mapel') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jadwal"
        aria-expanded="true" aria-controls="jadwal">
        <i class="fas fa-fw fa-calendar-plus"></i>
        <span>Jadwal</span>
    </a>
    <div id="jadwal" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jadwal:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('jadwal') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kehadiranguru"
        aria-expanded="true" aria-controls="kehadiranguru">
        <i class="fas fa-fw fa-check-circle"></i>
        <span>Kehadiran Guru</span>
    </a>
    <div id="kehadiranguru" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kehadiran Guru:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('kehadiranguru') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#siswa"
        aria-expanded="true" aria-controls="siswa">
        <i class="fas fa-fw fa-users"></i>
        <span>Siswa</span>
    </a>
    <div id="siswa" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Siswa:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('siswa') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kelassiswa"
        aria-expanded="true" aria-controls="kelassiswa">
        <i class="fas fa-fw fa-building"></i>
        <span>Kelas Siswa</span>
    </a>
    <div id="kelassiswa" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelas Siswa:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('kelassiswa') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kehadiransiswa"
        aria-expanded="true" aria-controls="kehadiransiswa">
        <i class="fas fa-fw fa-check"></i>
        <span>Kehadiran Siswa</span>
    </a>
    <div id="kehadiransiswa" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kehadiran Siswa:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('kehadiransiswa') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penilaian"
        aria-expanded="true" aria-controls="penilaian">
        <i class="fas fa-fw fa-comment"></i>
        <span>Penilaian</span>
    </a>
    <div id="penilaian" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Penilaian:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('penilaian') ?>"> Table</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rincianpenilaian"
        aria-expanded="true" aria-controls="rincianpenilaian">
        <i class="fas fa-fw fa-filter"></i>
        <span>Rincian Penilaian</span>
    </a>
    <div id="rincianpenilaian" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Rincian Penilaian:</h6>
            <a class="collapse-item fas fa-fw fa-table" href="<?= site_url('rincianpenilaian') ?>"> Table</a>
        </div>
    </div>
</li>
<!-- Nav Item - Tables -->


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->