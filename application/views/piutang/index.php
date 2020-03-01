
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">
              <a href="<?= base_url('') ?>" class="btn btn-primary">Tambah Data Piutang</a>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>                 
                    <th>Kode Pelanggan</th>
                    <th>No Reff</th>
                    <th>Keterangan</th>
                    <th>No Acc</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach($piutang as $piutang) : ?>
                  <tr>
                    <th><?= $i ?></th>
                    <td><?= date('d F Y', $piutang['tanggal']) ?></td>
                    <td><?= $piutang['nama_pelanggan'] ?></td>
                    <td><?= $piutang['no_reff'] ?></td>
                    <td><?= $piutang['keterangan'] ?></td>
                    <td><?= $piutang['no_acc'] ?></td>
                    <td><?= $piutang['debet'] ?></td>
                    <td><?= $piutang['kredit'] ?></td>
                    <td><?= $piutang['saldo'] ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->