
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
              
                <div class="form-group">
                  <label for="">No Account</label>
                  <input type="text" class="form-control" name="no_acc" placeholder="Masukkan no acc">
                  <small class="form-text text-danger"><?= form_error('no_acc') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Pelanggan</label>
                  <select name="pelanggan_id" id="" class="form-control">
                    <?php foreach($pelanggan as $pelanggan) : ?>
                      <?php if($pelanggan['id'] == $transaksi['costumer_id']) : ?>
                        <option value="<?= $pelanggan['id'] ?>" selected><?= $pelanggan['kode_pelanggan'] ?> - <?= $pelanggan['nama_pelanggan']?></option>
                      <?php else : ?>
                        <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['kode_pelanggan'] ?> - <?= $pelanggan['nama_pelanggan'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('pelanggan_id') ?></small>
                </div>

                <div class="form-group">
                  <label>No Faktur</label>
                  <input type="text" name="no_faktur" placeholder="Masukkan No Faktur" class="form-control">
                  <small class="form-text text-danger"><?= form_error('no_faktur') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Total Pembayaran</label>
                  <input type="text" class="form-control" name="total" placeholder="Masukkan Total Harga">
                  <small class="form-text text-danger"><?= form_error('total') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Transaksi">
                  <small class="form-text text-danger"><?= form_error('keterangan') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Uang Masuk</label>
                  <input type="text" class="form-control" name="masukan" placeholder="Masukkan Uang Masuk yang Dibayar pelanggan">
                  <small class="form-text text-danger"><?= form_error('masukan') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Jenis Pembayaran</label>
                  <select name="id_jenis_pembayaran" id="" class="form-control">
                    <?php foreach ($jenis_pembayaran as $jenis_pembayaran) : ?>
                      <option value="<?= $jenis_pembayaran['id'] ?>"><?= $jenis_pembayaran['nama_jenis_pembayaran'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <button id="" class="btn btn-primary" type='submit'>Tambah Pembayaran</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
