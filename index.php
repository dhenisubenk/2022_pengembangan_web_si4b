<?php require_once 'config/koneksi.php'; ?>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formMahasiswa">
                            Tambah Mahasiswa
                        </button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>#</th>
                                    <th>NAMA</th>
                                    <th>JURUSAN</th>
                                    <th>ALAMAT</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM mahasiswa");
                                while ($row = mysqli_fetch_array($sql)) {

                                    echo "<tr>
                                            <td>$row[nim]</td>
                                            <td><img src='img/$row[foto]' width='50'></td>
                                            <td>$row[nama]</td>
                                            <td>$row[jurusan]</td>
                                            <td>$row[alamat]</td>
                                            <td>
                                                <a href='edit_mhs.php?nim=$row[nim]' class='btn btn-sm btn-warning'>Edit</a>
                                                <a href='delete_mhs.php?nim=$row[nim]' class='btn btn-sm btn-danger' onclick=\"return confirm('hapus data?')\">Delete</a>
                                            </td>
                                        </tr>";
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="formMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="simpan_mahasiswa.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-2">
                                <label for="" class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jurusan</label>
                                <select name="jurusan" class="form-select" id="">
                                    <option>Sistem Informasi</option>
                                    <option>Teknik Informatika</option>
                                    <option>Manajemen Informatika</option>
                                    <option>Komputerisasi Akuntansi</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="cetak" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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