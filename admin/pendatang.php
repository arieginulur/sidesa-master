<?php
$page = "pendatang";
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
                                    <h3 class="card-title">Pendatang</h3>
                                </div>
                                <div class="card-body">
                                    <a href="pendatang_tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                                    <hr>
                                    <table id="tabel" class="table table-bordered">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>Nomor KK</th>
                                                <th>Nama Kepala Keluarga</th>
                                                <th>Alamat</th>
                                                <th>RT</th>
                                                <th>RW</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            $query = mysqli_query($conn, "SELECT * FROM tbl_keluarga 
                                            LEFT JOIN tbl_penduduk ON tbl_keluarga.id_penduduk = tbl_penduduk.id_penduduk");
                                            while($data = mysqli_fetch_array($query)){ ?>
                                                <tr>
                                                    <td><?php echo $no; $no++; ?></td>
                                                    <td><?php echo $data["no_kk"] ?></td>
                                                    <td><?php echo $data["nama"] ?></td>
                                                    <td><?php echo $data["alamat"] ?></td>
                                                    <td><?php echo $data["rt"] ?></td>
                                                    <td><?php echo $data["rw"] ?></td>
                                                    <td>
                                                        <a href="pendatang_edit?id1=<?php echo $data["id_penduduk"] ?>&id2=<?php echo $data["id_keluarga"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                        <a href="pendatang_hapus?id1=<?php echo $data["id_penduduk"] ?>&id2=<?php echo $data["id_keluarga"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

</body>
</html>