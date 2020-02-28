
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $jabatan['id'] ?>">
                <div class="form-group">
                  <label for="">Nama Jabatan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jenis Jabatan" name="nama_jabatan" value="<?= $jabatan['nama_jabatan'] ?>">
                </div>
                <button class="btn btn-primary" type='submit'>Tambah Jabatan</button>
                
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















