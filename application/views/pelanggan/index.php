
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <?= $this->session->flashdata('message') ?>
              <div class="row">
              <div class="col-md-10">
                <form class="form-inline my-2 my-lg-0"  method="post" action="<?= base_url('pelanggan') ?>">
                  <input class="form-control col-md-8" type="search" placeholder="Search" aria-label="Search" name="keyword">
                  <div class="input-group-append">
                    <input name="submit" class="btn btn-outline-primary" type="submit" autocomplete='off' autofocus>
                  </div>
                </form>
                </div>
                <div class="col-md-2">
                <a href="<?= base_url('pelanggan/tambah') ?>" class="btn btn-primary">Tambah Pelanggan</a>
                </div>
              </div>              
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
                    <?php $i = 1 ?>
                    <?php foreach($pelanggan as $pelanggan) : ?>
                    <tr>
                      <th><?= $i ?></th>
                      <td><?= $pelanggan['kode_pelanggan'] ?></td>
                      <td><?= $pelanggan['nama_pelanggan'] ?></td>
                      <td><?= $pelanggan['alamat'] ?></td>
                      <td><?= $pelanggan['telp'] ?></td>
                      <td>
                        <a class="btn btn-sm btn-danger" href="<?= base_url('pelanggan/delete/') ?><?= $pelanggan['id'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">Delete</a>
                        <a class="btn btn-sm btn-warning" href="<?= base_url('pelanggan/update/') ?><?= $pelanggan['id'] ?>">Update</a>
                        <a class="btn btn-sm btn-dark" href="<?= base_url('pelanggan/detail/') ?><?= $pelanggan['id'] ?>">Detail</a>
                      </td>
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