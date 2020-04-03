
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="<?= base_url('Supplier/tambahSupplier') ?>" method="post">
                <div class="form-group">
                  <label for="">Kode Supplier</label>
                  <input type="text" class="form-control" placeholder="Masukkan Kode Supplier" name="kode_supplier" value="<?= set_value('kode_supplier') ?>">
                  <small class="form-text text-danger"><?= form_error('kode_supplier') ?></small>
                </div>
                <div class="form-group">
                  <label for="">Nama Supplier</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Supplier" name="nama_supplier">
                  <small class="form-text text-danger"><?= form_error('nama_supplier') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
                  <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                </div>

                <div class="form-group">
                  <label for="">No HP</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nomor HP" name="no_hp">
                  <small class="form-text text-danger"><?= form_error('no_hp') ?></small>
                </div>

                <div class="form-group">
                  <label for="">No WA</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nomor WA" name="no_wa">
                  <small class="form-text text-danger"><?= form_error('no_wa') ?></small>
                </div>
                <button class="btn btn-primary" type='submit'>Tambah Supplier</button>
                
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















