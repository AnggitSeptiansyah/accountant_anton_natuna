<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Invoice</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery-editable-select.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <style>
    *{
      color: #000;
    }

    table{
      border: 1px solid #000 !important;
    }
  </style>
</head>

<body id="page-top">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="identity">
          <img class="img-kop" src="<?= base_url('assets/img/kop-an.png') ?>" alt="">
        </div>
      </div>
      <div class="col-md-4 mt-2 text-center">
        <h1><span class="title-invoice">Invoice</span></h1>
        <h4><span class="no_faktur">No. <?= $transaksi['no_faktur'] ?></span></h4>
      </div>
      <div class="col-md-4 mt-2 kepada-style">
        <p>Pekanbaru, <?= date('d F Y', $transaksi['tanggal']) ?></p>
        <p>Kepada Yth,&nbsp;&nbsp;&nbsp;<?= $transaksi['nama_pelanggan'] ?></p>
        <hr>
      </div>
    </div>

    <table class="table table-bordered table-hovered mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Keterangan</th>
          <th>Banyak</th>
          <th>Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach($transaksi_produk as $transaksi_produk) : ?>
        
        <tr>
          <td><?= $i ?></td>
          <td><?= $transaksi_produk['barang'] ?></td>
          <td><?= $transaksi_produk['qty'] ?></td>
          <td><?= $transaksi_produk['harga']; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>

    
        
        
        <!-- /.container-fluid -->
      
      
      <!-- End of Main Content -->