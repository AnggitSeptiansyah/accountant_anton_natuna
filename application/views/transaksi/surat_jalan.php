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
    }

    table th{
      border: 1px solid #000 !important;
      border-right: 1px solid #000 !important;
      border-left: 1px solid #000 !important;
      

    }

    table td{
      border-bottom: 1px solid #000 !important;
      border-right: 1px solid #000 !important;
      border-left: 1px solid #000 !important;

    }

    .surat{
      font-weight: 600;
    }
    
    .margin-top{
      margin-top: 110px;
    }

    .margin-card{
      margin-top: -50px;
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
              <div class="col-md-5 ml-2 mt-2">
                <div class="identity">
                    <img src="<?= base_url('assets/img/logo-an.png') ?>" alt="">
                  </div>
                <div class="mt-2 ml-3">
                  
                  <h5 class="mt-5 surat">Surat Jalan / Terima</h5>
                  <div class="row">
                    <div class="col-md-3">
                      <p>No. SJ</p>
                      <p>Tanggal</p>
                    </div>
                    <div class="col-md-4">
                      <p><?= $transaksi['no_faktur'] ?></p>
                      <p><?= date('d F Y', $transaksi['tanggal']) ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 margin-top">
                <p>Kepada, Yth</p><?= $transaksi['nama_pelanggan'] ?></p>
                <hr>
                <p>Di</p>
                <hr>
              </div>
            </div>
            
            <div class="card-body margin-card">
            <p>Dengan hormat</p>
            <p>Mohon diterima barang tersebut dibawah ini</p>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Banyak</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach($transaksi_produk as $transaksi_produk) : ?>
                  
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $transaksi_produk['barang'] ?></td>
                    <td><?= $transaksi_produk['qty'] ?></td>
                    <td></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-4 text-center">                
                  <p class="mb-5">Mengetahui</p>
                  <p>(<span class="tanda-tangan"></span>)</p>
                </div>
                <div class="col-md-4 text-center">
                  <p class="mb-5">Yang Menyerahkan</p>
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
