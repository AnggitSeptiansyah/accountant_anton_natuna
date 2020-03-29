
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
              <div class="form-group">
                  <label for="">Kode Pelanggan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Kode Pelanggan" name="kode_pelanggan">
                  <small class="form-text text-danger"><?= form_error('kode_pelanggan') ?></small>
                </div>
                <div class="form-group">
                  <label for="">Nama Pelanggan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Pelanggan" name="nama">
                  <small class="form-text text-danger"><?= form_error('nama') ?></small>
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" class="form-control" placeholder="Masukkan Alamat Pelanggan" name="alamat">
                  <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                </div>
                <div class="form-group">
                  <label for="">Telepon</label>
                  <input type="text" class="form-control" placeholder="Masukkan nomor Telepon / HP / WA" name="telepon">
                  <small class="form-text text-danger"><?= form_error('telepon') ?></small>
                </div>
                <button class="btn btn-primary" type='submit'>Tambah Pelanggan</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















