
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
                  <a href="<?= base_url('Supplier/index') ?>" class="btn btn-primary float-right">Tambah Jabatan</a>
                </div>
              </div>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>                    
                    <th>Alamat</th>
                    <th>Telp</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->