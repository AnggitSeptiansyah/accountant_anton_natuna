        
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <div class="row">
              <div class="col-md-6 ml-2 mt-2">
                <div class="indentity mt-2 ml-3">
                  <h5>Surat Jalan / Terima</h5>
                  <div class="row">
                    <div class="col-md-4">
                      <p>No. SJ</p>
                      <p>No Faktur</p>
                      <p>Tanggal</p>
                    </div>
                    <div class="col-md-8">
                      <p><?= $transaksi['no_faktur'] ?></p>
                      <p><?= $transaksi['no_faktur'] ?></p>
                      <p><?= date('d F Y', $transaksi['tanggal']) ?></p>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-5 mt-2">
                <p>Kepada, Yth</p><?= $transaksi['nama_pelanggan'] ?>
                <hr><hr>
                <p>Di</p>
                <hr>
              </div>
            </div>
            
            <div class="card-body mt-0">
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
              <button class="btn btn-danger float-right">Cetak Surat Jalan</button>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      
      <!-- End of Main Content -->