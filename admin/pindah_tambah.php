<?php
$page = "pindah";
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
                            <h1><i class="fas fa-user"></i> &nbsp;&nbsp;Tambah Penduduk Pindah</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="pindah">Data Penduduk Pindah</a></li>
                            <li class="breadcrumb-item active">Tambah Penduduk Pindah</li>
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
                                                    Data berhasil ditambahkan !
                                                </div>';
                                        } else if(isset($_GET["error"])){
                                            echo '<div class="alert alert-danger" role="alert">
                                                    Data gagal ditambahkan, harap periksa kembali isian data !
                                                </div>';
                                        }
                                    ?>
                                    <form action="module/pindah_insert" method="post">
                                    <h4>Data Keluarga</h4>    
                                    <hr>
                                        <div class="form-group">
                                            <label>Nomor Kartu Keluarga<span style="color:red">*</span></label>
                                            <input type="text" name="no_kk" class="form-control" required>
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
                                        <hr>
                                        <h4>Data Kepala Keluarga</h4> 
                                        <hr>
                                        <div class="form-group">
                                            <label>NIK<span style="color:red">*</span></label>
                                            <input type="text" name="nik" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap<span style="color:red">*</span></label>
                                            <input type="text" name="nama" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir<span style="color:red">*</span></label>
                                            <input type="text" name="tempat_lahir" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir<span style="color:red">*</span></label>
                                            <input type="date" name="tanggal_lahir" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin<span style="color:red">*</span></label>
                                            <select name="jk" class="form-control" required>
                                                <option value="">-- Pilih --</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon/ HP</label>
                                            <input type="text" name="no_telp" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                </div>
                                <div class="card-footer">
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