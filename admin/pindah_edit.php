<?php
$page = "pindah";
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
                            <li class="breadcrumb-item"><a href="pindah">Data Penduduk</a></li>
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
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Data Penduduk</h3>
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
                                        <form action="module/pindah_update" method="post">
                                        <h4>Data Penduduk</h4>    
                                        <hr>
                                        <?php 
                                        $id = $_GET["id1"];
                                        $query = mysqli_query($conn, "SELECT * FROM tbl_penduduk 
                                        LEFT JOIN tbl_keluarga ON tbl_penduduk.id_penduduk = tbl_keluarga.id_penduduk
                                        WHERE tbl_penduduk.id_penduduk = '$id'");
                                        while ($data = mysqli_fetch_array($query)){
                                    ?>
                                            <div class="form-group">
                                                <label>Nomor Kartu Keluarga<span style="color:red">*</span></label>
                                                <input type="text" name="no_kk" class="form-control" value="<?php echo $data["no_kk"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat<span style="color:red">*</span></label>
                                                <input type="text" name="alamat" class="form-control" required value="<?php echo $data["alamat"] ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label>RT<span style="color:red">*</span></label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="rt" class="form-control" required value="<?php echo $data["rt"] ?>">
                                                </div>
                                                <label>RW<span style="color:red">*</span></label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="rw" class="form-control" required value="<?php echo $data["rw"] ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>Data Penduduk</h4> 
                                            <hr>
                                            <div class="form-group">
                                                <label>NIK<span style="color:red">*</span></label>
                                                <input type="text" name="nik" class="form-control" required value="<?php echo $data["nik"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Lengkap<span style="color:red">*</span></label>
                                                <input type="text" name="nama" class="form-control" required value="<?php echo $data["nama"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir<span style="color:red">*</span></label>
                                                <input type="text" name="tempat_lahir" class="form-control" required value="<?php echo $data["tempat_lahir"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir<span style="color:red">*</span></label>
                                                <input type="date" name="tanggal_lahir" class="form-control" required value="<?php echo $data["tanggal_lahir"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin<span style="color:red">*</span></label>
                                                <select name="jk" class="form-control" required>
                                                    <option value="">-- Pilih --</option>
                                                    <?php if($data["jk"] == "L"){
                                                        echo "<option value='L' selected>Laki-laki</option>
                                                            <option value='P'>Perempuan</option>"; 
                                                        } else{
                                                                echo "<option value='L'>Laki-laki</option>
                                                            <option value='P' selected>Perempuan</option>";
                                                            }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Telepon/ HP</label>
                                                <input type="text" name="no_telp" class="form-control" value="<?php echo $data["no_telp"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" value="<?php echo $data["email"] ?>">
                                            </div>
                                            <?php } ?>    
                                    </div>
                                    <div class="card-footer">
                                        <?php 
                                            $idpenduduk = $_GET["id1"];
                                            $idkeluarga = $_GET["id2"];
                                        ?>
                                        <input type="hidden" name="id1" value="<?php echo $idpenduduk ?>">
                                        <input type="hidden" name="id2" value="<?php echo $idkeluarga ?>">
                                        <a href="pindah" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
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