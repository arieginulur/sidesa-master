<?php
$page = "kepala_keluarga";
include "auth.php";
include "../config/koneksi.php";
$id_keluarga = $_GET["id"];
// CEK AKUN
$cek = mysqli_query($conn, "SELECT is_active FROM tbl_keluarga WHERE id_keluarga = $id_keluarga");
while($e = mysqli_fetch_array($cek)){
    $isactive = $e["is_active"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Anggota Keluarga</title>
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
                            <h1><i class="fas fa-users"></i> &nbsp;&nbsp;Anggota Keluarga</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="kepala_keluarga">Data Kepala Keluarga</a></li>
                            <li class="breadcrumb-item active">Anggota Keluarga</li>
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
                                <div class="card-body">
                                    <a href="module/anggota_keluarga_reset?id=<?php echo $id_keluarga ?>" class="btn btn-warning"><i class="fas fa-key"></i> Reset Password</a>
                                    <?php if($isactive == 1){?>
                                        <a href="module/anggota_keluarga_deactivate?id=<?php echo $id_keluarga ?>" class="btn btn-danger"><i class="fas fa-power-off"></i> Non-Aktifkan Akun</a>
                                    <?php } else {?>
                                        <a href="module/anggota_keluarga_activate?id=<?php echo $id_keluarga ?>" class="btn btn-success"><i class="fas fa-power-off"></i> Aktifkan Akun</a>
                                    <?php } ?>
                                </div>
                                <table class="table ">
                                    <?php $a = mysqli_query($conn, "SELECT tbl_keluarga.is_active, tbl_penduduk.nik, tbl_penduduk.nama FROM tbl_keluarga 
                                        LEFT JOIN tbl_penduduk ON tbl_keluarga.id_penduduk = tbl_penduduk.id_penduduk
                                        WHERE tbl_keluarga.id_keluarga = $id_keluarga");
                                        while ($arow = mysqli_fetch_array($a)){ ?>
                                    <tr>
                                        <td>Pemegang Akun</td>
                                        <td><?php echo $arow["nik"]?> - <?php echo $arow["nama"]?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td><?php if($arow["is_active"] == 1){
                                            echo '<span class="badge badge-success">Aktif</span>'; } else {
                                                echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                            }
                                            ?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Tambah Anggota Keluarga</h3>
                                </div>
                                <form action="module/anggota_keluarga_insert" method="post">
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
                                        $query = mysqli_query($conn, "SELECT * FROm tbl_keluarga WHERE id_keluarga = '$id_keluarga'");
                                        while ($data = mysqli_fetch_array($query)){
                                    ?>
                                    <div class="form-group row">
                                        <label>Nomor KK | Kpl Keluarga</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" readonly value="<?php echo $data["no_kk"] ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" readonly value="<?php echo $data["nama_kk"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" value="<?php echo $data["alamat"]?>, RT <?php echo $data["rt"] ?> RW <?php echo $data["rw"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Anggota</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-control select2" name="id_penduduk" id="penduduk" required>
                                                    <option value="">-- Pilih Penduduk --</option>
                                                    <?php $sql = mysqli_query($conn, "SELECT * FROM tbl_penduduk WHERE is_infamily NOT LIKE 1");
                                                    while ($row = mysqli_fetch_array($sql)){?>
                                                        <option value="<?php echo $row["id_penduduk"] ?>"><?php echo $row["nik"] ?> - <?php echo $row["nama"] ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control select2" name="id_status_keluarga" required>
                                                    <option value="">-- Hub. Keluarga --</option>
                                                    <?php $sql = mysqli_query($conn, "SELECT * FROM ref_status_keluarga");
                                                    while ($row = mysqli_fetch_array($sql)){?>
                                                        <option value="<?php echo $row["id_status_keluarga"] ?>"><?php echo $row["status_keluarga"] ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" name="id_keluarga" value="<?php echo $id_keluarga ?>">
                                                <button type="submit" class="btn btn-success "><i class="fas fa-plus"></i> Tambah</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>JK</th>
                                                <th>Hub keluarga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $fam = mysqli_query($conn, "SELECT tbl_keluarga.*, tbl_penduduk.*, ref_status_keluarga.status_keluarga FROM tbl_keluarga 
                                                LEFT JOIN tbl_penduduk ON tbl_keluarga.id_keluarga = tbl_penduduk.id_keluarga 
                                                LEFT JOIN ref_status_keluarga ON tbl_penduduk.id_status_keluarga = ref_status_keluarga.id_status_keluarga
                                                WHERE tbl_penduduk.id_keluarga = '$id_keluarga'
                                                ORDER BY tbl_penduduk.id_status_keluarga ASC");
                                                while ($data = mysqli_fetch_array($fam)){
                                            ?>
                                            <tr>
                                                <td><?php echo $data["nik"] ?></td>
                                                <td><?php echo $data["nama"] ?></td>
                                                <td><?php echo $data["jk"] ?></td>
                                                <td><?php echo $data["status_keluarga"] ?></td>
                                                <td><a href="module/anggota_keluarga_hapus?id1=<?php echo $data["id_penduduk"]?>&id2=<?php echo $data["id_keluarga"]?>&id3=<?php echo $data["id_status_keluarga"]?>" 
                                                class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="kepala_keluarga" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            $("#penduduk").select2();
        })
    </script>

</body>
</html>