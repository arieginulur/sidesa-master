<?php
$page = "penduduk";
include "auth.php";
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hapus Penduduk</title>
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
                            <h1><i class="fas fa-user"></i> &nbsp;&nbsp;Hapus Penduduk</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="penduduk">Data Penduduk</a></li>
                            <li class="breadcrumb-item active">Hapus Penduduk</li>
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
                                        $id = $_GET["id"];
                                        $query = mysqli_query($conn, "SELECT * FROM tbl_penduduk 
                                        WHERE tbl_penduduk.id_penduduk = '$id'");
                                        while ($data = mysqli_fetch_array($query)){
                                    ?>
                                        
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="250">NIK</th>
                                                <td colspan="6"><?php echo $data["nik"] ?></td>
                                            </tr>
                                            <tr>
                                                <th width="250">Nama</th>
                                                <td colspan="6"><?php echo $data["nama"] ?></td>
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
                                        <form action="module/penduduk_delete" method="post">
                                            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                                            <a href="penduduk" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
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