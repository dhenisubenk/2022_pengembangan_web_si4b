<?php
require_once 'config/koneksi.php';

if (empty($_GET['nim'])) {
    echo "<script>
                window.location.href = 'index.php';
        </script>";
} else {
    $nim = $_GET['nim'];
    //ambil db
    $sql = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    $data = mysqli_fetch_array($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        Edit Mahasiswa
                    </div>
                    <div class="card-body">
                        <form action="update_mhs.php" method="POST">
                            <div class="mb-2">
                                <label for="" class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" readonly>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jurusan</label>
                                <select name="jurusan" class="form-select" id="">
                                    <option <?= ($data['jurusan'] == "Sistem Informasi" ? "selected" : "") ?>>Sistem Informasi</option>
                                    <option <?= ($data['jurusan'] == "Teknik Informatika" ? "selected" : "") ?>>Teknik Informatika</option>
                                    <option <?= ($data['jurusan'] == "Manajemen Informatika" ? "selected" : "") ?>>Manajemen Informatika</option>
                                    <option <?= ($data['jurusan'] == "Komputerisasi Akuntansi" ? "selected" : "") ?>>Komputerisasi Akuntansi</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="cetak" class="btn btn-primary">Update</button>
                                <a href="index.php" name="cetak" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>