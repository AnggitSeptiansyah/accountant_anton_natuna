
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                <form class="form-inline my-2 my-lg-0"  method="post" action="<?= base_url('laporankasharian') ?>">
                  <input class="form-control col-md-8" type="search" placeholder="Search" aria-label="Search" name="keyword">
                  <div class="input-group-append">
                    <input name="submit" class="btn btn-outline-primary" type="submit" autocomplete='off' autofocus>
                  </div>
                </form>
                </div>
                <div class="col-md-2">
                <a href="<?= base_url('worksheet/tambah_biaya') ?>" class="btn btn-primary">Tambah Data Biaya</a>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach($laporan as $laporan) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $laporan['tanggal'] ?></td>
                    <td><?= $laporan['kode_pelanggan'] ?></td>
                    <td><?= $laporan['no_reff'] ?></td>
                    <td><?= $laporan['keterangan'] ?> <span class="laporan_pelanggan">[<?= $laporan['nama_pelanggan'] ?>]</span></td>
                    <td><?= $laporan['no_acc'] ?></td>
                    <td><?= number_format($laporan['masuk']) ?></td>
                    <td><?= number_format($laporan['keluar']) ?></td>
                    <td><?= number_format($laporan['saldo']) ?></td>
                    <td>
                      <a href="<?= base_url() ?>LaporanKasHarian/deleteLaporan/<?= $laporan['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                    </td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->