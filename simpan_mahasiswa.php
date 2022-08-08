<?php
require_once 'config/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

//$_FILES
$file_name = $_FILES['foto']['name'];       //gambar.PNG
$file_tmp = $_FILES['foto']['tmp_name'];
$file_type = $_FILES['foto']['type'];
$file_size = $_FILES['foto']['size'];

//ambil tipe file
$step1 = strtolower($file_name); //gambar.png
$step2 = explode(".", $step1); // ['gambar', 'png'];
$tipe = end($step2);

// INSERT INTO nama table VALUES (....)
// INSERT INTO nama table (kolom, kolom....) VALUES (....)

if ($tipe != "png" && $tipe != "jpg" && $tipe = "jpeg") {
    echo "<script>
            alert('File tidak support');
            window.location.href = 'index.php';
    </script>";
} elseif ($file_size > 2000000) {
    echo "<script>
        alert('File tidak boleh lebih > 2MB');
        window.location.href = 'index.php';
    </script>";
} else {
    $simpan = mysqli_query($con, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jurusan', '$alamat', '$file_name')");

    if ($simpan) {
        move_uploaded_file($file_tmp, "img/" . $file_name);
        echo "<script>
                alert('Data Berhasil disimpan');
                window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan');
                window.location.href = 'index.php';
        </script>";
    }
}
