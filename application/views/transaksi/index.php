
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary">Tambah Transaksi</a>
              <table class="table table-hover table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>DP</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($transaksi as $transaksi) : ?>
                    <tr>
                      <th><?= $i ?></th>
                      <td><?= $transaksi['kode_pelanggan'] ?> - <?= $transaksi['nama_pelanggan'] ?></td>
                      <td><?= $transaksi['total'] ?></td>
                      <td><?= $transaksi['dp'] ?></td>
                      <td>
                        <a class="btn btn-sm btn-danger" href="">Delete</a>
                        <a class="btn btn-sm btn-warning" href="">Update</a>
                        <a class="btn btn-sm btn-dark" href="">Detail</a>
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