
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">
              <div class="row">
                <div class="col-md-7">
                <form class="form-inline my-2 my-lg-0"  method="post" action="<?= base_url('laporankasharian') ?>">
                  <input class="form-control col-md-8" type="search" placeholder="Masukkan pencarian.." aria-label="Search" name="keyword">
                  <div class="input-group-append">
                    <input name="submit" class="btn btn-outline-primary" type="submit" autocomplete='off' autofocus>
                  </div>
                </form>
                </div>
                <div class="col-md-4">
                  <a href="<?= base_url('worksheet/tambah_biaya') ?>" class="btn btn-primary">Tambah Data Biaya</a>
                  <a href="<?= base_url('LaporanKasHarian/setorKeBank') ?>" class="btn btn-success">Setor ke Bank</a>
                  <a href="<?= base_url('Transaksi/bayarPiutang') ?>" class="btn btn-danger">Bayar Piutang</a>
                </div>
              </div>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>                 
                    <th>Kode Pelanggan</th>
                    <th>No Reff</th>
                    <th>Keterangan</th>
                    <th>No Acc</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Saldo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php $saldo = 0 ?>
                  <?php foreach($laporan as $laporan) : ?>
                  <tr>
                    <td><?= ++$start ?></td>
                    <td><?= $laporan['tanggal'] ?></td>
                    <td><?= $laporan['kode_pelanggan'] ?></td>
                    <td><?= $laporan['no_reff'] ?></td>
                    <td><?= $laporan['keterangan'] ?> <span class="laporan_pelanggan">[<?= $laporan['nama_pelanggan'] ?>]</span></td>
                    <td><?= $laporan['no_acc'] ?></td>
                    <td><?= number_format($laporan['masuk']) ?></td>
                    <td><?= number_format($laporan['keluar']) ?></td>
                    <td><?= $saldo = $saldo + $laporan['masuk'] - $laporan['keluar'] ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach ?>
                </tbody>
              </table>
              <?= $this->pagination->create_links(); ?>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->