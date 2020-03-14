
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="">Kode</label>
                  <select name="kode" id="" class="form-control">
                    <?php foreach($kode as $kode) : ?>
                      <option value="<?= $kode['kode'] ?>"><?= $kode['kode']; ?> - <?= $kode['nama_jenis'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan">
                </div>
                <div class="form-group">
                  <label for="">Jumlah</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jenis Biaya" name="jumlah">
                </div>
                <button class="btn btn-primary" type='submit'>Tambah Jenis Worksheet</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















