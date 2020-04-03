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
      font-family: sans-serif;
      font-size: 15pt;      
    }

    .identity{
      font-weight: 400;
      font-size: 18pt;
    }

    

    table th{
      border: 1px solid #000 !important;
      border-right: 1px solid #000 !important;
      border-left: 1px solid #000 !important;
      text-transform: uppercase;
      line-height: 25px;
      font-size: 16pt;
      font-weight: 400;
      text-align: center;
    }

    tbody{
      border-bottom: 1px solid #000 !important;
      border-right: none !important;
      border-left: none !important
    }

    tbody td{
      border: none !important;
      border-right: 1px solid #000 !important;
      border-left: 1px solid #000 !important;
      line-height: 10px;
      height: 10px;
      font-size: 15pt;
      text-transform: capitalize;
    }

    tfoot td{
      line-height: 5px;
      height: 5px;
      font-size: 15pt;
      
    }
    
    .invoice{ 
      float: right;
      font-weight: 500;
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


    .kalimat-peringatan{
      width: 600px;
      margin-left: 100px;
      color: #000;
      margin-bottom: 7rem;
      margin-top: -5rem;
    }

    .pinggir {
      text-align: right !important;
    }

    .nama {
      font-size: 15pt !important 
    }

    .middle { 
      margin-top: -30px !important;
    }

    .pinggir-kiri {

      text-align: left;
    }

    .tulisan-kanan{
      font-size: 15pt;
    }

    .capitalized {
      text-transform: capitalize;
    }
  </style>
</head>

<body id="page-top">

  <div class="mt-3">
    <div class="row">
      <div class="col-md-3 ml-3">
        <div class="identity">
          CV. ANTON NATUNA
        </div>
      </div>
      <div class="col-md-5 mt-2 text-center">
        <h4><span class="title-invoice">Invoice</span></h4>
        <h5 class="no_faktur">No. <?= $transaksi['no_faktur'] ?></h5>
      </div>
      <div class="col-md-3 mt-2 kepada-style">
        <p>Pekanbaru, <?= $transaksi['tanggal'] ?></p>
        <p>Kepada Yth,&nbsp;&nbsp;&nbsp;<span class="nama"><?= $transaksi['nama_pelanggan'] ?></span></p>
        <p>Telp / HP &nbsp;&nbsp;&nbsp;<?= $transaksi['telp'] ?></p>
        <p>_________________________________________________________</p>
      </div>
    </div>

    <table class="table table-hovered mt-5">
      <thead>
        <tr>
          <th class="middle">No</th>
          <th class="middle">Keterangan</th>
          <th class="middle">Jumlah</th>
          <th class="middle ">Satuan</th>
          <th>@ <span class="capitalized">Rp.</span></th>
          <th class="middle">Jumlah Harga (Rp.)</th>
        </tr> 
      </thead>
      <tbody class="table-font">
        <?php $i = 1 ?>
        <?php foreach($transaksi_produk as $transaksi_produk) : ?>
        <tr>
          <td class="pinggir"><?= $i ?></td>
          <td style="width: 500px"><?= $transaksi_produk['barang'] ?></td>
          <td class="pinggir" style="width: 50px;"><?= $transaksi_produk['qty'] ?></td>
          <td style="width: 50px;"><?= $transaksi_produk['satuan'] ?></td>
          <td class="pinggir" style="width: 135px"><?= number_format($transaksi_produk['harga']) ?></td>
          <td class="pinggir"><?= number_format($transaksi_produk['total_harga']) ?></td>
        </tr> 
        <?php $i++ ?>
        <?php endforeach ?> 
      </tbody>
      <tfoot class="tfooter">
        <tr>
          <td colspan=5><span class="invoice">Total</td>
          <td>Rp. <div class="tulisan-kanan" style="text-align: right; float-right"><?= number_format($transaksi['total']) ?></div></td>
        </tr>
        <tr>
          <td colspan=5><span class="invoice">Pembayaran</td>
          <td class="borbot">Rp. <div class="tulisan-kanan" style="text-align: right; float-right"><?= number_format($transaksi['uang_masuk']) ?></div></td>
        </tr>
        <tr>
          <td colspan=5><span class="invoice">Sisa</td>
          <td>Rp.<div class="tulisan-kanan" style="text-align: right; float-right"><?= number_format($transaksi['total_yang_dibayar'] - $transaksi['uang_masuk']) ?></div></td>
        </tr>
      </tfoot>
      
    </table>
    <div class="kalimat-peringatan">
        Keterangan: Barang yang sudah dipesan tidak dapat dibatalkan
    </div>
    <div class="row">
      <div class="col-md-4 text-center">
        <p class="mb-5">Pemesan</p>
        <p>________________</p>
      </div>
      <div class="col-md-6 text-center">
        <p class="mb-5">Hormat Kami</p>
        <p>________________</p>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>

    
        
        
        <!-- /.container-fluid -->
      
      
      <!-- End of Main Content -->