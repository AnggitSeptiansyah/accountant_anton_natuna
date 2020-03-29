
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="<?= base_url('CabangKantor/tambahKantor') ?>" method="post">
                <div class="form-group">
                  <label for="">Kode Cabang</label>
                  <input type="text" class="form-control" placeholder="Kode Cabang" name="kode_cabang">
                </div>

                <div class="form-group">
                  <label for="">Kode Pelanggan</label>
                  <input type="text" class="form-control" placeholder="Kode Pelanggan" name="kode_pelanggan">
                </div>
                
                <div class="form-group">
                  <label for="">Nama cabang</label>
                  <input type="text" class="form-control" placeholder="Nama Kantor Cabang" name="nama_cabang">
                </div>

                <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" class="form-control" placeholder="Alamat Kantor" name="alamat">
                </div>

                <div class="form-group">
                  <label for="">No Hp</label>
                  <input type="text" class="form-control" placeholder="No HP" name="no_hp">
                </div>

                <div class="form-group">
                  <label for="">No WA</label>
                  <input type="text" class="form-control" placeholder="No WA" name="no_wa">
                </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" placeholder="Email" name="email">
                </div>

                <button class="btn btn-primary" type='submit'>Tambah User</button>
                
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















