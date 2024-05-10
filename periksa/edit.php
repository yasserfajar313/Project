<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dbpuskesmas";

// Membuat koneksi menggunakan mysqli_connect()
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Tidak bisa terkoneksi di database: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "SELECT * FROM periksa WHERE id = $id";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $tanggal = $row['tanggal'];
    $berat = $row['berat'];
    $tinggi = $row['tinggi'];
    $tensi = $row['tensi'];
    $keterangan = $row['keterangan'];
    $pasien_id = $row['pasien_id'];
    $dokter_id = $row['dokter_id'];
} else {
    echo "Data tidak ditemukan.";
    exit;
}

$sukses = "";
$error = "";

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];
    $pasien_id = $_POST['pasien_id'];
    $dokter_id = $_POST['dokter_id'];



    $sql = "UPDATE periksa SET tanggal='$tanggal', berat='$berat', tinggi='$tinggi', tensi='$tensi', keterangan='$keterangan', pasien_id=$pasien_id, dokter_id=$dokter_id WHERE id=$id";


    if (mysqli_query($koneksi, $sql)) {
        $sukses = "Data berhasil diupdate";
        // Mengarahkan pengguna kembali ke halaman utama setelah 2 detik
        header("refresh:2; url=index.php");
    } else {
        $error = "Error updating record: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Edit Data Dokter</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $tanggal ?>">
            </div>

            <div class="mb-3">
                <label for="berat" class="form-label">berat</label>
                <input type="number" name="berat" class="form-control" id="berat" value="<?php echo $berat ?>">
            </div>
            <div class="mb-3">
                <label for="tinggi" class="form-label">Tinggi</label>
                <input type="number" name="tinggi" class="form-control" id="tinggi" value="<?php echo $tinggi ?>">
            </div>
            <div class="mb-3">
                <label for="tensi" class="form-label">Tensi</label>
                <input type="text" name="tensi" class="form-control" id="tensi" value="<?php echo $tensi ?>">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $keterangan ?>">
            </div>

            <div class="mb-3">
                <label for="pasien_id" class="form-label">Pasien Id</label>
                <input type="number" name="pasien_id" class="form-control" id="pasien_id" value="<?php echo $pasien_id ?>">
            </div>

            <div class="mb-3">
                <label for="dokter_id" class="form-label">Dokter Id</label>
                <input type="number" name="dokter_id" class="form-control" id="dokter_id" value="<?php echo $dokter_id ?>">
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>

</html>