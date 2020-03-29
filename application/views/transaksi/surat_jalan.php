<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery-editable-select.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <style>
    *{
      color: #000 !important;
      font-family: "Narrow Arial", sans-serif;
      font-size: 13pt;
      font-weight: 
    }

    .identity {
      font-size: 18pt;
      font-weight: 400;
    }

    tbody{
      border-bottom: 1px solid #000 !important;
      border-right: none !important;
      border-left: none !important
    }


    table th{
      border: 1px solid #000 !important;
      border-right: 1px solid #000 !important;
      border-left: 1px solid #000 !important;
      font-weight: 400;
      text-transform: uppercase;
      text-align: center;
      font-size: 13pt;
    }

    tbody td{
      border: none !important;
      border-right: 1px solid #000 !important;
      border-left: 1px solid #000 !important;
      line-height: 10px;
      height: 10px;
      font-size: 13pt;
    }

    .surat{
      font-weight: 600;
    }
    
    .margin-top{
      margin-top: 110px;
    }

    .no_faktur {
      font-weight: 500;
    }

    .capitalize {
      text-transform: capitalize;
    }

    .table-one {
      width: 50px;
      text-align: right
    }

    .table-three {
      width: 100px;
      text-align: center;
    }

    .table-four {
      width: 100px;
      text-align: center;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          
            <div class="row">
              <div class="col-md-4">
                <div class="identity">
                    CV. ANTON NATUNA
                </div>
              </div>

              <div class="col-md-4 text-center mt-4">
                <h1 class="surat-jalan-title">Surat Jalan / Tanda Terima</h1> 
                <p>No. <span class="no_faktur"><?= $transaksi['no_faktur'] ?></span></p>
              </div>

              <div class="col-md-4 float-right tanggal">
                <p>Tanggal : <?= date("d-m-Y", strtotime($transaksi['tanggal'])) ?></p>
                <p>Kepada, Yth : <?= $transaksi['nama_pelanggan'] ?></p>                
              </div>

            </div>
            
            <p>Dengan hormat , </p>
            <p>Mohon diterima barang tersebut dibawah ini</p>
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Banyak</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach($transaksi_produk as $transaksi_produk) : ?>
                  <tr>
                    <td class="table-one"><?= $i ?></td>
                    <td><?= $transaksi_produk['barang'] ?></td>
                    <td class="table-three"><?= $transaksi_produk['qty'] ?></td>
                    <td class="table-four"><div class="capitalize"><?= $transaksi_produk['satuan'] ?></div></td>
                    <td></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-4 text-center">
                  <p class="mb-5">Yang Menyerahkan</p>
                  <p>(<span class="tanda-tangan"></span>)</p>
                </div>
                <div class="col-md-4 text-center">                
                  <p class="mb-5">Mengetahui</p>
                  <p>(<span class="tanda-tangan"></span>)</p>
                </div>
                
                <div class="col-md-4 text-center">
                  <p class="mb-5">Penerima</p>
                  <p>(<span class="tanda-tangan"></span>)</p>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      
      
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery-editable-select.js"></script>
  <script src="<?= base_url('assets/') ?>js/custom.js"></script>

<!-- <script type="text/javascript">
    window.print();
  </script> -->

</body>

</html>
