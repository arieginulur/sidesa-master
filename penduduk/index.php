<?php
$page = "dasbor";
include "../config/koneksi.php";
include "auth.php";
$id_keluarga = $_SESSION["id_keluarga"];
$id_penduduk = $_SESSION["id_penduduk"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <?php include "dashboard/_head.php" ?>
</head>
<body class="hold-transition sidebar-mini text-sm">
    <div class="wrapper">
        <?php include "dashboard/_navbar.php" ?>
        <?php include "dashboard/_sidebar.php" ?>

        <div class="content-wrapper">
            <!-- Header -->
            <section class="content-header">
                <div class="container-fluid">

                </div>
            </section>
            <!-- Konten -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Kepala Keluarga</h3>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-success" role="alert">
                                        Selamat datang di aplikasi Sistem Informasi Desa Kamasan.
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <?php $a =mysqli_query($conn, "SELECT COUNT(id_keluarga) anggota FROM tbl_penduduk WHERE id_keluarga = '$id_keluarga'");
                                                    while($arow = mysqli_fetch_array($a)){
                                                        echo "<h3>".$arow["anggota"]."</h3>";
                                                    } ?>
                                                    <p>Jumlah Anggota Keluarga</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    <table class="table">
                                        <?php 
                                            $b = mysqli_query($conn, "SELECT * FROM tbl_keluarga LEFT JOIN tbl_penduduk ON tbl_keluarga.id_penduduk = tbl_penduduk.id_penduduk
                                            WHERE tbl_penduduk.id_penduduk = '$id_penduduk'");
                                            while($brow = mysqli_fetch_array($b)){
                                        ?>
                                        <tr>
                                            <th width="30%">Nomor KK</th>
                                            <td colspan="5"><?php echo $brow["no_kk"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>NIK</th>
                                            <td colspan="5"><?php echo $brow["nik"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Kepala Keluarga</th>
                                            <td colspan="5"><?php echo $brow["nama"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td><?php echo $brow["alamat"]; ?></td>
                                            <th>RT</th>
                                            <td><?php echo $brow["rt"]; ?></td>
                                            <th>RW</th>
                                            <td><?php echo $brow["rw"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sudah melakukan pendataan ?</th>
                                            <td colspan="5"><?php if($brow["is_pendataan"] == 1){
                                                echo '<span class="badge badge-success">Sudah</span>';
                                            }?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <?php include "dashboard/_footer.php" ?>
    </div> <!-- end of wrapper -->
    <?php include "dashboard/_script.php" ?>
    <script>
        $(document).ready(function(){
            $("#tabel").DataTable();
        })
    </script>

</body>
</html>