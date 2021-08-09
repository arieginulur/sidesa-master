<?php
$page = "kepala_keluarga";
include "auth.php";
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Kepala Keluarga</title>
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
                            <h1><i class="fas fa-user"></i> &nbsp;&nbsp;Tambah Kepala Keluarga</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="kepala_keluarga">Data Kepala Keluarga</a></li>
                            <li class="breadcrumb-item active">Tambah Kepala Keluarga</li>
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
                                    <h3 class="card-title">Data Kepala Keluarga</h3>
                                </div>
                                    <form action="module/kepala_keluarga_insert" method="post">
                                        <div class="card-body">
                                            <?php 
                                                if(isset($_GET["success"])){
                                                    echo '<div class="alert alert-success" role="alert">
                                                            Data berhasil ditambahkan !
                                                        </div>';
                                                } else if(isset($_GET["error"])){
                                                    echo '<div class="alert alert-danger" role="alert">
                                                            Data gagal ditambahkan, harap periksa kembali isian data !
                                                        </div>';
                                                }
                                            ?>
                                                <div class="form-group">
                                                    <label>Nomor Kartu Keluarga<span style="color:red">*</span></label>
                                                    <input type="text" name="no_kk" class="form-control" text-uppercase required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kpl Keluarga<span style="color:red">*</span></label>
                                                    <input type="text" name="nama_kk" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat<span style="color:red">*</span></label>
                                                    <input type="text" name="alamat" class="form-control" required>
                                                </div>
                                                <div class="form-group row">
                                                    <label>RT<span style="color:red">*</span></label>
                                                    <div class="col-sm-2">
                                                        <input type="number" name="rt" class="form-control" required>
                                                    </div>
                                                    <label>RW<span style="color:red">*</span></label>
                                                    <div class="col-sm-2">
                                                        <input type="number" name="rw" class="form-control" required>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Desa/Kel<span style="color:red">*</span></label>
                                                        <select name="desa" class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Kamasan">Kamasan</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kecamatan<span style="color:red">*</span></label>
                                                        <select name="kecamatan" class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Banjaran">Banjaran</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kab/Kota<span style="color:red">*</span></label>
                                                        <select name="kabupaten" class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Bandung">Kabupaten Bandung</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Provinsi<span style="color:red">*</span></label>
                                                        <select name="provinsi" class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Jawa Barat">Jawa Barat</option>
                                                        </select>
                                                </div>
                                        <div class="card-footer">
                                            <a href="kepala_keluarga" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                    </form>
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