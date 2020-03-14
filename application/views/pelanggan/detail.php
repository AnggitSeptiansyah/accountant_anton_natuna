        
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <div class="card-body">
              <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4">
                      Nama Pelanggan
                    </div>
                    <div class="col-md-8">
                      : <?= $detail_pelanggan['nama_pelanggan'] ?>
                    </div>

                    <div class="col-md-4">
                      Alamat
                    </div>
                    <div class="col-md-8">
                      : <?= $detail_pelanggan['alamat'] ?>
                    </div>

                    <div class="col-md-4">
                      Telp
                    </div>
                    <div class="col-md-8">
                      : <?= $detail_pelanggan['telp'] ?>
                    </div>
                  </div>
                </div>
              </div>

                <!-- Transaksi -->
                <h5 class="mb-1 mt-3 mb-2">Data Transaksi</h5>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Faktur</th>
                      <th>Uang Masuk</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    <?php $i = 1 ?>
                    <?php foreach($transaksi_pelanggan as $transaksi_pelanggan) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $transaksi_pelanggan['no_faktur'] ?></td>
                      <td><?= $transaksi_pelanggan['total'] ?></td>
                      <td><?= $transaksi_pelanggan['uang_masuk'] ?></td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach ; ?>
                  </tbody>
                </table>
              
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->