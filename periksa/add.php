<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_POST['submit'])) {
    $_tanggal = $_POST['tanggal'];
    $_berat = $_POST['berat'];
    $_tinggi = $_POST['tinggi'];
    $_tensi = $_POST['tensi'];
    $_keterangan = $_POST['keterangan'];
    $_pasien_id = $_POST['pasien_id'];
    $_dokter_id = $_POST['dokter_id'];

    $data = array($_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id);
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?,?,?,?,?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1>Tambah Data Periksa</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="add.php" method="POST">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan Tanggal">
                                </div>
                                <div class="mb-3">
                                    <label for="berat" class="form-label">Berat</label>
                                    <input type="number" name="berat" class="form-control" id="berat">
                                </div>
                                <div class="mb-3">
                                    <label for="tinggi" class="form-label">Tinggi</label>
                                    <input type="number" name="tinggi" class="form-control" id="tinggi">
                                </div>
                                <div class="mb-3">
                                    <label for="tensi" class="form-label">Tensi</label>
                                    <input type="text" name="tensi" class="form-control" id="tensi">
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan">
                                </div>
                                <div class="mb-3">
                                    <label for="pasien_id" class="form-label">Pasien Id</label>
                                    <input type="number" name="pasien_id" class="form-control" id="pasien_id">
                                </div>
                                <div class="mb-3">
                                    <label for="dokter_id" class="form-label">Dokter Id</label>
                                    <input type="number" name="dokter_id" class="form-control" id="dokter_id">
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>