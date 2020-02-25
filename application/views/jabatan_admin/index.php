
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                  <?= $this->session->flashdata('message') ?>
                </div>
                <div class="col-md-2">
                  <a href="<?= base_url('jabatanAdmin/tambah') ?>" class="btn btn-primary float-right">Tambah Jabatan</a>
                </div>
              </div>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Jabatan</th>                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                <?php foreach($jabatanAdmin as $jabatanAdmin) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $jabatanAdmin['nama_jabatan'] ?></td>
                    <td>
                      <a href="" class="btn btn-sm btn-danger">Delete</a>
                      <a href="" class="btn btn-sm btn-warning">Update</a>
                    </td>
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