<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

// Membuat koneksi menggunakan mysqli_connect()
$koneksi = mysqli_connect($host, $user, $pass, $dbname);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Tidak bisa terkoneksi di database: " . mysqli_connect_error());
}
$tanggal = "";
$berat = "";
$tinggi = "";
$tensi = "";
$keterangan = "";


if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];



    if ($tanggal && $berat && $tinggi && $tensi && $keterangan) {
        $sql1 = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan) VALUES ('$tanggal', '$berat', '$tinggi', '$tensi', '$keterangan')";
        $q1 = mysqli_query($koneksi, $sql1); // Perbaikan variabel menjadi $q1

        if ($q1) { // Mengubah variabel dari $sq1 menjadi $q1
            $sukses = "Berhasil memasukkan data baru";
        } else {
            $error = "Gagal memasukkan data";
        }
    }
}
?>

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Periksa </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Periksa</title>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

                        <style>
                            .mx-auto {
                                width: 800px;
                            }

                            .card {
                                margin-top: 10px;
                            }
                        </style>
                    </head>

                    <body>




                        <!-- untuk menampilkan data -->
                        <div class="card">
                            <div class="card-header text-white bg-secondary">
                                Periksa
                            </div>
                            <div class="card-body">
                                <a href="add.php" class="btn btn-success">Tambah Data</a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Berat</th>
                                            <th scope="col">Tinggi</th>
                                            <th scope="col">Tensi</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Pasien Id</th>
                                            <th scope="col">Dokter Id</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $urut = 1;
                                        $query = $dbh->query("SELECT * FROM periksa");
                                        foreach ($query as $row) {
                                            $id = $row['id'];
                                            $tanggal = $row['tanggal'];
                                            $berat = $row['berat'];
                                            $tinggi = $row['tinggi'];
                                            $tensi = $row['tensi'];
                                            $keterangan = $row['keterangan'];
                                            $pasien_id = $row['pasien_id'];
                                            $dokter_id = $row['dokter_id'];

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $urut++ ?></th>
                                                <td><?php echo $tanggal ?></td>
                                                <td><?php echo $berat ?></td>
                                                <td><?php echo $tinggi ?></td>
                                                <td><?php echo $tensi ?></td>
                                                <td><?php echo $keterangan ?></td>
                                                <td><?php echo $pasien_id ?></td>
                                                <td><?php echo $dokter_id ?></td>
                                                <td>

                                                    <a href='edit.php?id=<?php echo $id ?>' class="btn btn-warning btn-sm"></i> Edit</a>
                                                    <a href='delete.php?id=<?php echo $id ?>' class="btn btn-danger btn-sm"></i> Delete</a>

                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                </div>


                </body>

                </html>

                <!-- /.card -->
            </div>
        </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>