
        <div class="container-fluid">
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $pelanggan['id'] ?>">
                <div class="form-group">
                    <label for="">Kode Pelanggan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Kode Pelanggan" name="kode_pelanggan" value="<?= $pelanggan['kode_pelanggan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Pelanggan" name="nama" value="<?= $pelanggan['nama_pelanggan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" placeholder="Masukkan Alamat Pelanggan" name="alamat" value="<?= $pelanggan['alamat'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" class="form-control" placeholder="Masukkan nomor Telepon / HP / WA" name="telepon" value="<?= $pelanggan['telp'] ?>">
                  </div>
                  <button class="btn btn-primary" type='submit'>Ubah Pelanggan</button>
              </form>
            </div>
          </div>

        </div>
      </div>















