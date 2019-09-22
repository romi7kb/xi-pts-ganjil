<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;

}
if (isset($_POST['submit'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proses Pembelian</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="">Romi Ramdhani</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
            <form action="bon.php" method="post">
                <input type="hidden" name="nama" value="<?=$_POST['nama']?>">
                <input type="hidden" name="alamat" value="<?=$_POST['alamat']?>">
                <input type="hidden" name="jk" value="<?=$_POST['jk']?>">
                <input type="hidden" name="tanggal" value="<?=$_POST['tanggal']?>">
                <input type="hidden" name="jumlah" value="<?=$_POST['jumlah']?>">
                <div class="card " >
                    <div class="card-body ">
                        <h4 class="card-title">Masukan Barang yang dibeli</h4>
                        
    <?php
    for ($i=0; $i < $_POST['jumlah']; $i++) { 
    ?>
                <div class="card mt-2" >
                    <div class="card-body ">
                    <h5 class="card-title">Barang ke-<?=($i+1)?></h5>
                    <hr>
                            <div class="form-group row">
                                <label for="staticNamanama" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-6">
                                <input type="text" name="namab[]" class="form-control" id="staticnama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticNamakode" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-6">
                                <input type="text" name="kode[]" class="form-control" id="statickode" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">jenis Barang</label>
                                <div class="col-sm-3">
                                <select name="jenis[]" class="form-control" id="exampleFormControlSelect1">
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Sepatu">Pakaian</option>
                                    <option value="Obat">Obat</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticharga" class="col-sm-2 col-form-label">Harga Barang</label>
                                <div class="col-sm-3">
                                <input type="number" min="1" name="harga[]" class="form-control" id="staticharga" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticjumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
                                <div class="col-sm-3">
                                <input type="number" min="1" name="jumlahb[]" class="form-control" id="staticjumlah" required>
                                </div>
                            </div>
                    </div>
                </div>          
        <?php
        }
        ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-8">
                                <button type="submit" name="submit" class="btn btn-outline-primary">kirim</button>
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>


<?php    
}else {
    echo "  <script>
			alert('Masukan Data diri dan Jumlah Barang Terlebih dahulu!');
			document.location.href = 'pembelian.php';
			</script>
	    ";
}
?>