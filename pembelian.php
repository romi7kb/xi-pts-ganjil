<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "  <script>
			alert('LogIn Terlebih dahulu!');
			document.location.href = 'index.php';
			</script>
	    ";
}
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
        <a class="navbar-brand" href="">Romi Ramdhani</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="pembelian.php">Produk <span class="sr-only">(current)</span></a>
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
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card " >
                    <center><h3 class="mt-4 bg-dark text-white">Masukan Data Diri dan Jumlah Barang</h3></center>
                    <div class="card-body center">
                        <h5 class="card-title">Pembelian Barang</h5>
                        <form action="proses.php" method="post">
                            <div class="form-group row">
                                <label for="staticNama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control" id="staticNama" placeholder="Nama......" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat </label>
                                <div class="col-sm-8">
                                    <textarea  name="alamat" id="alamat" class="form-control" cols="10" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inlineradio1" class="col-sm-4 col-form-label">Jenis Kelamin </label>
                                <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" checked id="inlineRadio1" value="Laki-Laki">
                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="statictanggal" class="col-sm-4 col-form-label">Tanggal Pembelian</label>
                                <div class="col-sm-3">
                                <input type="date" name="tanggal" class="form-control" id="statictanggal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticjumlah" class="col-sm-4 col-form-label">Jumlah Barang</label>
                                <div class="col-sm-3">
                                <input type="number" min="1" name="jumlah" class="form-control" id="staticjumlah" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                <button type="submit" name="submit" class="btn btn-outline-primary">Proses</button>
                                <button type="reset" class="btn btn-outline-danger">Hapus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- js -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>