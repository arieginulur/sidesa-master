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
                            <h1><i class="fas fa-user"></i> &nbsp;&nbsp;Tambah Penduduk</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="penduduk">Data Penduduk</a></li>
                            <li class="breadcrumb-item active">Tambah Penduduk</li>
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
                                    <h3 class="card-title">Tambah Data Penduduk</h3>
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
                                    <form action="module/penduduk_insert" method="post"> 
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
                                            <label>Agama<span style="color:red">*</span></label>
                                            <select name="id_agama" class="form-control" required>
                                                <option value="">-- Pilih --</option>
                                                <?php $agama = mysqli_query($conn, "SELECT * FROM ref_agama");
                                                while($result_a = mysqli_fetch_array($agama)){ ?>
                                                <option value="<?php echo $result_a["id_agama"] ?>"><?php echo $result_a["nama_agama"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Perkawinan<span style="color:red">*</span></label>
                                            <select name="id_status_kawin" class="form-control" required>
                                                <option value="">-- Pilih --</option>
                                                <?php $status_kawin = mysqli_query($conn, "SELECT * FROM ref_status_kawin");
                                                while($data1 = mysqli_fetch_array($status_kawin)){ ?>
                                                <option value="<?php echo $data1["id_status_kawin"] ?>"><?php echo $data1["status_kawin"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan<span style="color:red">*</span></label>
                                            <select name="id_pekerjaan" class="form-control" required>
                                                <option value="">-- Pilih --</option>
                                                <?php $pekerjaan = mysqli_query($conn, "SELECT * FROM ref_pekerjaan");
                                                while($data2 = mysqli_fetch_array($pekerjaan)){ ?>
                                                <option value="<?php echo $data2["id_pekerjaan"] ?>"><?php echo $data2["pekerjaan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan<span style="color:red">*</span></label>
                                            <select name="id_pendidikan" class="form-control" required>
                                                <option value="">-- Pilih --</option>
                                                <?php $pendidikan = mysqli_query($conn, "SELECT * FROM ref_pendidikan");
                                                while($data3 = mysqli_fetch_array($pendidikan)){ ?>
                                                <option value="<?php echo $data3["id_pendidikan"] ?>"><?php echo $data3["pendidikan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kewarganegaraan<span style="color:red">*</span></label>
                                            <select name="kewarganegaraan" class="form-control" required>
                                                <option value="">-- Pilih --</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
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
                                    <a href="penduduk" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
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