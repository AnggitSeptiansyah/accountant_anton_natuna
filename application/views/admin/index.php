
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <a href="<?= base_url('admin/tambah') ?>" class="btn btn-primary">Tambah Admin</a>
              <table class="table table-hover table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Admin</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Date Created</th>
                  </tr>
                </thead>
                <tbody>
                  <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($admin as $admin) : ?>
                    <tr>
                      <th><?= $i ?></th>
                      <td><?= $admin['nama'] ?></td>
                      <td><?= $admin['email'] ?></td>
                      <td><?= $admin['nama_jabatan'] ?></td>
                      <td><?= date('d F Y', $admin['date_created']) ?></td>
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