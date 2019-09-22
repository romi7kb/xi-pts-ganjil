<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Romi Ramdhani</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="pembelian.php">Produk</a>
            </li>
            </ul>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
            <a href="logout.php" class="btn btn-outline-light btn-sm " role="button" aria-pressed="true">logout</a>
            <?php
            }else {
            ?>
            <a href="login.php" class="btn btn-outline-light btn-sm " role="button" aria-pressed="true">login</a>
            <?php
            }
            ?>
            
        </div>
    </nav>
<!-- isi -->
        <div class="container mt-5 mb-5" style="Margin-top: 50px;">
            <div class="jumbotron">
                <h2>Selamat Datang!</h2>
                <p>ini adalah program Pembelian Barang </p>
                <p>Dimana Anda Memasukan Data diri dan Jumlah Barang <br>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                <a href="pembelian.php" class="btn btn-success btn-md " role="button" aria-pressed="true">Beli</a>
                <?php
                }else {
                ?>
                <a href="pembelian.php" class="btn btn-danger btn-md " role="button" aria-pressed="true">Beli</a>
                <?php
                }
                ?>
                </p>
                <p>Sebelumnya anda Harus Login Terlebih Dahulu <br><a href="login.php" class="btn btn-primary btn-md " role="button" aria-pressed="true">Login</a></p>
                <p>Username : romi</p>
                <p>Password : 123</p>
                <h2>Terimakasih!</h2>
            </div>
        </div>
<!-- js -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>