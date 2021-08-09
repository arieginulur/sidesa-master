<?php

$page = "penduduk";
include "auth.php";
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Penduduk</title>
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
                            <h1><i class="fas fa-users"></i> &nbsp;&nbsp;Data Penduduk</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Penduduk</li>
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
                                <div class="card-header">
                                    <h3 class="card-title">Data Penduduk</h3>
                                </div>
                                <div class="card-body">
                                    <a href="penduduk_tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                                    <hr>
                                    <table id="tabel" class="table table-bordered">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>No KK</th>
                                                <th width="185">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            $query = mysqli_query($conn, "SELECT tbl_penduduk.*,tbl_keluarga.no_kk,tbl_keluarga.nama_kk FROM tbl_penduduk
                                            LEFT JOIN tbl_keluarga ON tbl_penduduk.id_keluarga = tbl_keluarga.id_keluarga");
                                            while($data = mysqli_fetch_array($query)){ ?>
                                                <tr>
                                                    <td><?php echo $no; $no++; ?></td>
                                                    <td><?php echo $data["nik"] ?></td>
                                                    <td><?php echo $data["nama"] ?></td>
                                                    <td><?php echo $data["no_kk"] ?> - <?php echo $data["nama_kk"] ?></td>
                                                    <td align="center">
                                                        <a href="penduduk_detail?id=<?php echo $data["id_penduduk"] ?>" class="btn btn-info"><i class="fas fa-user"></i></a>
                                                        <a href="penduduk_edit?id=<?php echo $data["id_penduduk"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                        <a href="penduduk_hapus?id=<?php echo $data["id_penduduk"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
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