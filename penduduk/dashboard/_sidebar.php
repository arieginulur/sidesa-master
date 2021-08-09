<!-- Sidebar -->
        <aside class="main-sidebar sidebar-light-success elevation-4">
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
                        <a href="#" class="d-block">Warga</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if($_SESSION["is_pendataan"] == 0){?>
                            <li class="nav-item">
                                <a href="pendataan" class="nav-link <?php if($page == "pendataan"){ echo "active";} ?>">
                                    <i class="fas fa-file nav-icon"></i>
                                    <p>Pendataan Penduduk</p>
                                </a>
                            </li>
                        <?php } else {?>
                        <li class="nav-item">
                            <a href="index" class="nav-link <?php if($page == "dasbor"){ echo "active";} ?>">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pendataan" class="nav-link <?php if($page == "pendataan"){ echo "active";} ?>">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Pendataan Penduduk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index" class="nav-link <?php if($page == "kk"){ echo "active";} ?>">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Anggota Keluarga</p>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="nav-item" style="background-color:red">
                            <a href="../logout" class="nav-link" style="color:white">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>