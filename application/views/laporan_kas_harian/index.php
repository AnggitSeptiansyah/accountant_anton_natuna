
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">
              <a href="<?= base_url('jabatanAdmin/tambah') ?>" class="btn btn-primary">Tambah Jabatan</a>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>                 
                    <th>Kode Pelanggan</th>
                    <th>No Reff</th>
                    <th>Keterangan</th>
                    <th>No Acc</th>
                    <th>Jumlah</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Saldo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($laporan as $laporan) : ?>
                  <tr>
                    <td></td>
                    <td><?= date('d F Y', $laporan['tanggal']) ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->