<?php
$page = "lahir";
include "auth.php";
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Lahir</title>
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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fas fa-print"></i> &nbsp;&nbsp;Data Lahir</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Lahir</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Konten -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Data Kelahiran</h3>
                                </div>
                                <div class="card-body">
                                    <a href="lahir_tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                                    <hr>
                                    <table id="tabel" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tgl Lahir</th>
                                                <th>Jk</th>
                                                <th>Keluarga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $sql = mysqli_query($conn, "SELECT tbl_lahir.*, tbl_keluarga.no_kk,tbl_keluarga.nama_kk FROM tbl_lahir
                                                LEFT JOIN tbl_keluarga ON tbl_lahir.id_keluarga = tbl_keluarga.id_keluarga");
                                                while ($data = mysqli_fetch_array($sql)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; $no++ ?></td>
                                                    <td><?php echo $data["nama"] ?></td>
                                                    <td><?php echo $data["tanggal_lahir"] ?></td>
                                                    <td><?php echo $data["jk"] ?></td>
                                                    <td><?php echo $data["no_kk"] ?> - <?php echo $data["nama_kk"] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
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