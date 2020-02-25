
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <a href="<?= base_url('pelanggan/tambah') ?>" class="btn btn-primary">Tambah Pelanggan</a>
              <table class="table table-hover table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tbody>
                    <?php foreach($pelanggan as $pelanggan) : ?>
                    <tr>
                      <th></th>
                      <td><?= $pelanggan['kode_pelanggan'] ?></td>
                      <td><?= $pelanggan['nama_pelanggan'] ?></td>
                      <td><?= $pelanggan['alamat'] ?></td>
                      <td><?= $pelanggan['telp'] ?></td>
                      <td>
                        <a class="btn btn-sm btn-danger" href="">Delete</a>
                        <a class="btn btn-sm btn-warning" href="">Update</a>
                      </td>
                    </tr>
                    <?php endforeach ; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->