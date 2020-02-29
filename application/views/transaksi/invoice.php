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

    table th{
      border: 1px solid #000 !important;
      border-right: none !important;
      border-left: none !important

    }

    tbody{
      border-bottom: 1px solid #000 !important;
      border-right: none !important;
      border-left: none !important
      border
    }

    tbody td{
      border: none !important;
      height: -10px !important;
    }

    
    .invoice{ 
      float: right;
      font-weight: bold;
      padding-right: 20px;
    }

    tfoot td{
      border: none !important;
    }

    .borbot {
      border-bottom: 1px solid #000 !important;
    }

    .margin-kurung{
      margin-right: 150px;
    }

    table th{
      border: 1px solid #000 !important;
    }

    .table-font{
      font-size: 16px;
    }
  </style>
</head>

<body id="page-top">

  <div class="mt-3">
    <div class="row">
      <div class="col-md-3 ml-3">
        <div class="identity">
          <img src="<?= base_url('assets/img/logo-an.png') ?>" alt="">
        </div>
      </div>
      <div class="col-md-5 mt-2 text-center">
        <h4><span class="title-invoice">Invoice</span></h4>
        <h4><span class="no_faktur">No. <?= $transaksi['no_faktur'] ?></span></h4>
      </div>
      <div class="col-md-3 mt-2 kepada-style">
        <p>Pekanbaru, <?= date('d F Y', $transaksi['tanggal']) ?></p>
        <p>Kepada Yth,&nbsp;&nbsp;&nbsp;<?= $transaksi['nama_pelanggan'] ?></p>
        <hr>
      </div>
    </div>

    <table class="table table-hovered mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Keterangan</th>
          <th>Banyak</th>
          <th>Harga</th>
        </tr> 
      </thead>
      <tbody class="table-font">
        <?php $i = 1 ?>
        <?php foreach($transaksi_produk as $transaksi_produk) : ?>
        <tr height="200">
          <td><?= $i ?></td>
          <td><?= $transaksi_produk['barang'] ?></td>
          <td><?= $transaksi_produk['qty'] ?></td>
          <td><?= $transaksi_produk['harga']; ?></td>
        
        </tr>
        <?php $i++ ?>
        <?php endforeach ?> 
      </tbody>
      <tfoot class="tfooter">
        <tr>
          <td colspan=3><span class="invoice">Total</td>
          <td><?= $transaksi['total'] ?></td>
        </tr>
        <tr>
          <td colspan=3><span class="invoice">Panjar</td>
          <td class="borbot"><?= $transaksi['uang_masuk'] ?></td>
        </tr>
        <tr>
          <td colspan=3><span class="invoice">Total Sisa</td>
          <td><?= $transaksi['total'] - $transaksi['uang_masuk'] ?></td>
        </tr>
      </tfoot>
    </table>
    <div class="row">
      <div class="col-md-4 text-center">
        <p class="mb-5">Diterima Oleh</p>
        <p>(<span class="margin-kurung"></span>)</p>
      </div>
      <div class="col-md-6 text-center">
        <p class="mb-5">Hormat Kami</p>
        <p>(<span class="margin-kurung"></span>)</p>
      </div>
    </div>
  </div>

  <!-- <script type="text/javascript">
    window.print();
  </script> -->
</body>
</html>

    
        
        
        <!-- /.container-fluid -->
      
      
      <!-- End of Main Content -->