<?php 
    include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://www.example.com/library-background.jpg'); /* Ganti dengan URL gambar latar belakang perpustakaan */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 0px 15px 0px #000;
            margin-bottom: 20px;
        }
        .card-title {
            font-family: 'Georgia', serif;
            color: #2c3e50;
        }
        .card-text {
            font-family: 'Arial', sans-serif;
            color: #34495e;
        }
        .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
        .btn-primary:hover {
            background-color: #1a252f;
            border-color: #1a252f;
        }
        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
        }
        .btn-success:hover {
            background-color: #1e8449;
            border-color: #1e8449;
        }
        .btn-back {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-back:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .text-left {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Mau pinjam Buku apa?</h2>
        <div class="row">
            <?php 
            include "koneksi.php";
            $qry_buku=mysqli_query($conn,"select * from buku");
            while($dt_buku=mysqli_fetch_array($qry_buku)){
                ?>
                <div class="col-md-3">
                    <div class="card">
                      <img src="assets/<?= $dt_buku['foto']?>" class="card-img-top">
                      <div class="card-body">
                        <h5 class="card-title"><?=$dt_buku['nama_buku']?></h5>
                        <p class="card-text"><?=substr($dt_buku['deskripsi'], 0,20)?></p>
                        <a href="pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btn-primary">Pinjam</a>
                        <a href="hapus_buku.php?id_buku=<?=$dt_buku['id_buku']?>" onclick="return confirm('Apakah anda yakin menghapus buku ini?')" class="btn btn-danger">Hapus</a>
                      </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="text-left">
            <a href="tambah_buku.php" class="btn btn-success">Tambah Buku</a>
        </div>
        <div class="text-left mt-4">
            <a href="home.php" class="btn btn-back">Kembali ke Home</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    include "footer.php";
?>
