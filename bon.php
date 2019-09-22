<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
if (isset($_POST['submit'])) {
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    $nama=$_POST['nama'];
    $jk=$_POST['jk'];
    $alamat=$_POST['alamat'];
    $tanggal=$_POST['tanggal'];
    $jumlahb=$_POST['jumlahb'];
    $namab=$_POST['namab'];
    $kode=$_POST['kode'];
    $jenis=$_POST['jenis'];
    $total=0;
    foreach ($namab as $key => $value) {
        $total+=($harga[$key]*$jumlahb[$key]);
        $totalhb[$key]=($harga[$key]*$jumlahb[$key]);
    }
    if ($total>500000) {
        $dis=0.2;
        $persen="20%";
    }elseif ($total>250000) {
        $dis=1/10;  
        $persen="10%";      
    } elseif ($total>150000) {
        $dis=5/100;  
        $persen="5%";      
    }else {
        $dis = 0;
        $persen="0%";
    }
    $diskon=($total*$dis);
    $totalbayar = $total - $diskon;
    $_SESSION['harga'] = $totalbayar;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bon</title>
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
<?php
    if (isset($_POST['bayar'])) {
        $kembalian = $_POST['nilaibayar']-$_SESSION['harga'];
    ?>
    <div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4 alert alert-dark  bg-light text-dark shadow  mr-5 w-50 h-50 rounded " tabindex="-1" role="alert">
        <h4 class="alert-heading text-center align-middle">Terimakasih!</h4>
        <p class="text-center align-middle">Teruslah berbelanja di toko kami :v</p>
        <?php
        if ($kembalian>0) {
        ?>
        <p class="mb-0 text-center align-middle">kembalian anda Rp.<?=$kembalian?></p>
        <?php
        }
        ?>
        <hr class="align-middle">
        <a href="pembelian.php" class="btn btn-success btn-md " role="button" aria-pressed="true">Beli lagi</a>
        <a href="logout.php" class="btn btn-danger btn-md  float-right" role="button" aria-pressed="true">Keluar</a>
    </div>
    <div class="col-md-4"></div>
    </div>
    <?php
    }
    if (isset($_POST['submit'])) {
    ?>
        <div class="container bg-light  mt-5 mb-5">
        <center><h1 class="mb-3 pt-3 ">Bon Pembelian</h1></center>
        <hr>
        <dl class="row">
            <dt class="col-sm-2">Nama</dt>
            <dd class="col-sm-9"><?=$nama?></dd>
            <dt class="col-sm-2">Alamat</dt>
            <dd class="col-sm-9"><?=$alamat?></dd>
            <dt class="col-sm-2">Jenis Kelamin</dt>
            <dd class="col-sm-9"><?=$jk?></dd>
            <dt class="col-sm-2">Tanggal Pembelian</dt>
            <dd class="col-sm-9"><?=$tanggal?></dd>
            <dt class="col-sm-2">Jumlah Barang</dt>
            <dd class="col-sm-9"><?=$jumlah?></dd>

        </dl>
        <div class="table-responsive">
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga Satuan(Rp)</th>
                        <th scope="col">Total Harga(Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($namab as $key => $value) { 
                        ?>
                        <tr>
                        <th scope="row"><?=($key+1)?></th>
                        <td><?=$namab[$key]?></td>
                        <td><?=$kode[$key]?></td>
                        <td><?=$jenis[$key]?></td>
                        <td><?=$jumlahb[$key]?></td>
                        <th><?=$harga[$key]?></th>
                        <th><?=$totalhb[$key]?></th>
                        </tr>
                        <?php  
                        }
                        ?>
                        <tr class="table-success">
                        <th colspan="6">Sub Total</th>
                        <th>Rp.<?=$total?></th>
                        </tr>
                        <tr class="table-info">
                        <th colspan="6">Diskon(<?=$persen?>)</th>
                        <th>Rp.<?=$diskon?></th>
                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col" colspan="6">Total Pembayaran</th>
                        <th scope="col">Rp.<?=$totalbayar?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post">
                        <tr>
                        <th colspan="5">
                            <div class="form-group row">
                                <label for="staticharga" class="col-sm-4 col-form-label">Masukan Jumlah Uang</label>
                                <div class="col-sm-8">
                                <input type="number" min="<?=$totalbayar?>" name="nilaibayar" class="form-control" id="staticharga" required>
                                </div>
                            </div>
                        </th>
                        <td>
                        <button type="submit"  name="bayar" class="btn btn-success">Bayar</button>
                        </td>
                        </tr>
                        </form>
                    </tbody>
                    </table>
    </div>
                    <?php
                    }
                    ?>

    <!-- js -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>

