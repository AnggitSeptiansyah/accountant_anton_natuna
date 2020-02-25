
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="">Pelanggan</label>
                  <select name="pelanggan_id" id="" class="form-control">
                  <?php foreach($pelanggan as $pelanggan) : ?>
                    <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['kode_pelanggan'] ?> - <?= $pelanggan['nama_pelanggan'] ?></option>
                  <?php endforeach ; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Barang yang Dipesan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jenis Barang" name="barang">
                </div>
                <button class="btn btn_tambah_barang btn-sm btn-secondary mb-2" type="button">Tambah Barang</button>
                <div class="form-group">
                  <label for="">Total Harga</label>
                  <input type="text" class="form-control" name="total" placeholder="Masukkan Total Harga">
                </div>

                <div class="form-group">
                  <label for="">DP</label>
                  <input type="text" class="form-control" name="dp" placeholder="Masukkan DP yang Dibayar">
                </div>


                <button class="btn btn-primary" type='submit'>Tambah Transaksi</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
