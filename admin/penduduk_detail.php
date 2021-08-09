<?php
$page = "penduduk";
include "auth.php";
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Penduduk</title>
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
                            <h1><i class="fas fa-user"></i> &nbsp;&nbsp;Detail Penduduk</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="penduduk">Data Penduduk</a></li>
                            <li class="breadcrumb-item active">Detail Penduduk</li>
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
                                <div class="card-header bg-success">
                                    <h3 class="card-title">Detail Data Penduduk</h3>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        $id = $_GET["id"];
                                        $query = $conn->query(
                                            "SELECT tbl_penduduk.*,ref_agama.nama_agama, ref_status_kawin.status_kawin,
                                            ref_pekerjaan.pekerjaan, ref_pendidikan.pendidikan FROM tbl_penduduk
                                            LEFT JOIN ref_agama ON tbl_penduduk.id_agama = ref_agama.id_agama
                                            LEFT JOIN ref_status_kawin ON tbl_penduduk.id_status_kawin = ref_status_kawin.id_status_kawin
                                            LEFT JOIN ref_pekerjaan ON tbl_penduduk.id_pekerjaan = ref_pekerjaan.id_pekerjaan
                                            LEFT JOIN ref_pendidikan ON tbl_penduduk.id_pendidikan = ref_pendidikan.id_pendidikan
                                            WHERE tbl_penduduk.id_penduduk = $id
                                            ");
                                        while($data = $query->fetch_array()){
                                    ?>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td width="220">NIK</td>
                                                <td><?php echo $data["nik"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td><?php echo $data["nama"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td><?php echo $data["tempat_lahir"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td><?php echo $data["tanggal_lahir"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td><?php echo $data["jk"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td><?php echo $data["nama_agama"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Perkawinan</td>
                                                <td><?php echo $data["status_kawin"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td><?php echo $data["pekerjaan"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pendidikan</td>
                                                <td><?php echo $data["pendidikan"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kewarganegaraan</td>
                                                <td><?php echo $data["kewarganegaraan"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Telepon/ HP</td>
                                                <td><?php echo $data["no_telp"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $data["email"] ?></td>
                                            </tr>
                                        </table>
                                    <?php } ?>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                                    <a href="penduduk" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
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