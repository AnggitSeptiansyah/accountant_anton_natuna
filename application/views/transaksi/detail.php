        
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <div class="row">
              <div class="col-md-6 ml-2 mt-2">
                <div class="indentity mt-2 ml-3">
                  <p>Jl. Teratai Atas no. 131 Sukajadi - Pekanbaru</p>
                  <p>Hp. 0823-2123-3921</p>
                  <p>Cab. Jl. Surabaya, Harapan Raya - Pekanbaru</p>
                  <p>Hp 0852 - 3463 - 3453</p>
                </div>
              </div>
              <div class="col-md-5 mt-2">
                <p>Pekanbaru, <?= date('d F Y', $transaksi['tanggal']) ?></p>
                <p>Kepada Yth,&nbsp;&nbsp;&nbsp;<?= $transaksi['nama_pelanggan'] ?></p>
                <hr>
              </div>
            </div>
            
            <div class="card-body mt-0">
            <p>No Faktur : <strong><?= $transaksi['no_faktur'] ?></strong></p>
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
              <a href="<?= base_url('transaksi/invoice/') ?><?= $transaksi['id'] ?>" class="btn btn-danger float-right">Cetak Invoice</a>
            </div>
            
          
            
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      
      <!-- End of Main Content -->