<?php
$page = "pendatang";
include "auth.php";
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Penduduk</title>
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
                            <h1><i class="fas fa-user"></i> &nbsp;&nbsp;Tambah Penduduk</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="pendatang">Data Penduduk</a></li>
                            <li class="breadcrumb-item active">Edit Penduduk</li>
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
                                <div class="card-header bg-danger">
                                    <h3 class="card-title">Hapus Penduduk</h3>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(isset($_GET["success"])){
                                            echo '<div class="alert alert-success" role="alert">
                                                    Data berhasil diperbarui !
                                                </div>';
                                        } else if(isset($_GET["error"])){
                                            echo '<div class="alert alert-danger" role="alert">
                                                    Data gagal diperbarui, harap periksa kembali isian data !
                                                </div>';
                                        }
                                    ?>
                                        <?php 
                                        $id = $_GET["id1"];
                                        $query = mysqli_query($conn, "SELECT * FROM tbl_penduduk 
                                        LEFT JOIN tbl_keluarga ON tbl_penduduk.id_penduduk = tbl_keluarga.id_penduduk
                                        WHERE tbl_penduduk.id_penduduk = '$id'");
                                        while ($data = mysqli_fetch_array($query)){
                                    ?>
                                        
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="250">Nomor KK</th>
                                                <td colspan="6"><?php echo $data["no_kk"] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="250">NIK</th>
                                                <td colspan="6"><?php echo $data["nik"] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="250">Nama Kepala Keluarga</th>
                                                <td colspan="6"><?php echo $data["nama"] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="250">Alamat</th>
                                                <td colspan="2"><?php echo $data["alamat"] ?></td>
                                                <th>RT</th>
                                                <td><?php echo $data["rt"] ?></td>
                                                <th>RT</th>
                                                <td><?php echo $data["rw"] ?></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <div class="form-group">
                                            <label>Apakah Anda ingin menghapus Data Penduduk di atas ?</label>
                                        </div>
                                            
                                    <?php 
                                        } 
                                    ?>    
                                    </div>
                                    <div class="card-footer">
                                        <form action="module/pendatang_delete" method="post">
                                            <?php 
                                                $idpenduduk = $_GET["id1"];
                                                $idkeluarga = $_GET["id2"];
                                            ?>
                                            <input type="hidden" name="id1" value="<?php echo $idpenduduk ?>">
                                            <input type="hidden" name="id2" value="<?php echo $idkeluarga ?>">
                                            <a href="pendatang" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
                                            <button type="submit" class="btn btn-danger float-right"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
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