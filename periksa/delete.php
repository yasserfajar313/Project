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

// Memeriksa apakah parameter ID telah diterima
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Menghapus data dari tabel berdasarkan ID
    $sql = "DELETE FROM periksa WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);

    // Memeriksa apakah penghapusan berhasil
    if($result){
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah berhasil menghapus
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
