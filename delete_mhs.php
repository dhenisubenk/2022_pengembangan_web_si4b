<?php
require_once 'config/koneksi.php';

if (isset($_GET['nim'])) {

    $nim = $_GET['nim'];
    // DELETE FROM namatable WHERE kolom = nilai
    $delete = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim = '$nim'");

    if ($delete) {
        echo "<script>
                alert('Data Berhasil dihapus');
                window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan');
                window.location.href = 'index.php';
        </script>";
    }
}
