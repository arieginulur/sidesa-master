<?php
$page = "lahir";
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
                            <h1><i class="fas fa-user"></i> &nbsp;&nbsp;Tambah Data</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="lahir">Data Lahir</a></li>
                            <li class="breadcrumb-item active">Tambah Penduduk Lahir</li>
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
                                    <h3 class="card-title">Data Lahir</h3>
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
                                    <form action="module/lahir_insert" method="post">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="nama" class="form-control">
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
                                            <label>Keluarga<span style="color:red">*</span></label>
                                            <select id="keluarga" name="id_keluarga" class="form-control select2" required>
                                                <option value="">-- Pilih --</option>
                                                <?php $a = mysqli_query($conn, "SELECT * FROM tbl_keluarga");
                                                while ($arow = mysqli_fetch_array($a)){ ?>
                                                    <option value="<?php echo $arow["id_keluarga"] ?>"><?php echo $arow["no_kk"] ?> - <?php echo $arow["nama_kk"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <a href="lahir" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            $("#keluarga").select2();
        })
    </script>

</body>
</html>