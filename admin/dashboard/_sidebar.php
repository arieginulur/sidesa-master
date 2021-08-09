<!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index" class="brand-link">
                <img src="../img/logo.png"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SIDesaKamasan</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index" class="nav-link <?php if($page == "dasbor"){ echo "active";} ?>">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?php if($page == "kepala_keluarga" || $page == "penduduk"){ echo "menu-open";} ?>">
                            <a href="#" class="nav-link <?php if($page == "kepala_keluarga" || $page == "penduduk"){ echo "active";} ?>">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p>Kependudukan<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="kepala_keluarga" class="nav-link <?php if($page == "kepala_keluarga"){ echo "active";} ?>">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Data Kepala Keluarga</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="penduduk" class="nav-link <?php if($page == "penduduk"){ echo "active";} ?>">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Data Penduduk</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview 
                        <?php if($page == "sirkulasi" || $page == "lahir" || $page == "meninggal" || $page == "pendatang" || $page == "pindah")
                        { echo "menu-open";} ?>">
                            <a href="#" class="nav-link 
                            <?php if($page == "sirkulasi" || $page == "lahir" || $page == "meninggal" || $page == "pendatang" || $page == "pindah"){ echo "active";} 
                            ?>">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Sirkulasi Penduduk<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lahir" class="nav-link <?php if($page == "lahir"){ echo "active";} ?>">
                                        <i class="fas fa-baby nav-icon"></i>
                                        <p>Data Lahir</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="meninggal" class="nav-link <?php if($page == "meninggal"){ echo "active";} ?>">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Data Meninggal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pendatang" class="nav-link <?php if($page == "pendatang"){ echo "active";} ?>">
                                        <i class="fas fa-truck-loading nav-icon"></i>
                                        <p>Data Pendatang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pindah" class="nav-link <?php if($page == "pindah"){ echo "active";} ?>">
                                        <i class="fas fa-truck nav-icon"></i>
                                        <p>Data Pindah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?php if($page == "lap_ktp" || $page == "lap_kk"){ echo "menu-open ";} ?>">
                            <a href="#" class="nav-link <?php if($page == "lap_ktp" || $page == "lap_kk"){ echo "active";} ?>">
                                <i class="nav-icon fas fa-archive"></i>
                                <p>Laporan<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lap_ktp" class="nav-link <?php if($page == "lap_ktp"){ echo "active";} ?>">
                                        <i class="fas fa-id-card nav-icon"></i>
                                        <p>Cetak Pengajuan KTP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lap_kk" class="nav-link <?php if($page == "lap_kk"){ echo "active";} ?>">
                                        <i class="fas fa-print nav-icon"></i>
                                        <p>Cetak Pengajuan KK</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="index" class="nav-link <?php if($page == "user"){ echo "active";} ?>">
                                <i class="fas fa-id-badge nav-icon"></i>
                                <p>Manajemen Pengguna</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color:red">
                            <a href="../logout" class="nav-link" style="color:white">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>