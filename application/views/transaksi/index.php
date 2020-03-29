
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="card">
          <!-- Page Heading -->

          <div class="card-body">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
              <div class="row">
                <div class="col-md-10">
                <form class="form-inline my-2 my-lg-0"  method="post" action="<?= base_url('transaksi') ?>">
                  <input class="form-control col-md-8" type="search" placeholder="Search" aria-label="Search" name="keyword">
                  <div class="input-group-append">
                    <input name="submit" class="btn btn-outline-primary" type="submit" autocomplete='off' autofocus>
                  </div>
                </form>
                </div>
                <div class="col-md-2">
                <a href="<?= base_url('transaksi/tambahTransaksi') ?>" class="btn btn-primary">Tambah Transaksi</a>
                </div>
              </div>
              <?= $this->session->flashdata('message'); ?>
              <table class="table table-hover table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Acc</th>
                    <th>No Faktur</th>
                    <th>Pelanggan</th>
                    <th>Total Pembayaran</th>
                    <th>Uang Masuk</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($transaksi as $transaksi) : ?>
                      <?php 
                      if($transaksi['total'] - $transaksi['uang_masuk'] == 0 ) {
                        $status = "Lunas";
                      } else {
                        $status = "Belum Lunas";
                      }
                    ?>
                    <tr>
                      <th><?= $i ?></th>
                      <td><?= $transaksi['tanggal'] ?></td>
                      <td><?= $transaksi['no_acc'] ?></td>
                      <td><?= $transaksi['no_faktur'] ?></td>
                      <td><?= $transaksi['kode_pelanggan'] ?> - <?= $transaksi['nama_pelanggan'] ?></td>
                      <td>Rp. <?= number_format($transaksi['total_yang_dibayar']) ?></td>
                      <td>Rp. <?= number_format($transaksi['uang_masuk']) ?></td>
                      <td><?= $status ?></td>
                      <td>
                        <a class="badge badge-danger" href="<?= base_url('') ?>transaksi/update/<?= $transaksi['id'] ?>">Pembayaran</a>
                        <a class="badge badge-dark" href="<?= base_url('') ?>transaksi/invoice/<?= $transaksi['id'] ?>">invoice</a>
                        <a class="badge badge-success" href="<?= base_url('') ?>transaksi/surat_jalan/<?= $transaksi['id'] ?>">Surat Jalan</a>
                      </td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          
          </div>
        <!-- /.container-fluid -->
        </div>
      </div>
      <!-- End of Main Content -->