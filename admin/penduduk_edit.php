<?php
$page = "penduduk";
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
                            <li class="breadcrumb-item"><a href="penduduk">Data Penduduk</a></li>
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
                                    <h3 class="card-title">Edit Data Penduduk</h3>
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
                                    <form action="module/penduduk_update" method="post"> 
                                        <div class="form-group">
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
                                                <option value="<?php echo $data["jk"] ?>"><?php if($data["jk"] == "L"){echo "Laki-laki";}else{echo "Perempuan";} ?></option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Agama<span style="color:red">*</span></label>
                                            <select name="id_agama" class="form-control" required>
                                            <option value="<?php echo $data["id_agama"] ?>"><?php echo $data["nama_agama"] ?></option>
                                                <?php $agama = mysqli_query($conn, "SELECT * FROM ref_agama");
                                                while($result_a = mysqli_fetch_array($agama)){ ?>
                                                <option value="<?php echo $result_a["id_agama"] ?>"><?php echo $result_a["nama_agama"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status Perkawinan<span style="color:red">*</span></label>
                                            <select name="id_status_kawin" class="form-control" required>
                                            <option value="<?php echo $data["id_status_kawin"] ?>"><?php echo $data["status_kawin"] ?></option>
                                                <?php $status_kawin = mysqli_query($conn, "SELECT * FROM ref_status_kawin");
                                                while($data1 = mysqli_fetch_array($status_kawin)){ ?>
                                                <option value="<?php echo $data1["id_status_kawin"] ?>"><?php echo $data1["status_kawin"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan<span style="color:red">*</span></label>
                                            <select name="id_pekerjaan" class="form-control" required>
                                            <option value="<?php echo $data["id_pekerjaan"] ?>"><?php echo $data["pekerjaan"] ?></option>
                                                <?php $pekerjaan = mysqli_query($conn, "SELECT * FROM ref_pekerjaan");
                                                while($data2 = mysqli_fetch_array($pekerjaan)){ ?>
                                                <option value="<?php echo $data2["id_pekerjaan"] ?>"><?php echo $data2["pekerjaan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan<span style="color:red">*</span></label>
                                            <select name="id_pendidikan" class="form-control" required>
                                            <option value="<?php echo $data["id_pendidikan"] ?>"><?php echo $data["pendidikan"] ?></option>
                                                <?php $pendidikan = mysqli_query($conn, "SELECT * FROM ref_pendidikan");
                                                while($data3 = mysqli_fetch_array($pendidikan)){ ?>
                                                <option value="<?php echo $data3["id_pendidikan"] ?>"><?php echo $data3["pendidikan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kewarganegaraan<span style="color:red">*</span></label>
                                            <select name="kewarganegaraan" class="form-control" required>
                                            <option value="<?php echo $data["kewarganegaraan"] ?>"><?php if($data["kewarganegaraan"] == "WNI"){echo "WNI";}else{echo "WNA";} ?></option>
                                                <option value="">--Pilih--</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
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
                                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
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