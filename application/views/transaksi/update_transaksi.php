
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $transaksi['id'] ?>">

                <div class="form-group">
                  <label for="">Tanggal</label>
                  <input type="date" class="form-control col-md-3" name="tanggal" placeholder="Masukkan no acc" value="<?= $transaksi['tanggal'] ?>" readonly>
                  <small class="form-text text-danger"><?= form_error('tanggal') ?></small>
                </div>

                <div class="form-group">
                  <label for="">No Account</label>
                  <input type="text" class="form-control" name="no_acc" placeholder="Masukkan no acc" value="<?= $transaksi['no_acc'] ?>" readonly>
                  <small class="form-text text-danger"><?= form_error('no_acc') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Pelanggan</label>
                  <select name="pelanggan_id" id="" class="form-control" readonly>
                    <?php foreach($pelanggan as $pelanggan) : ?>
                      <?php if($pelanggan['id'] == $transaksi['costumer_id']) : ?>
                        <option value="<?= $pelanggan['id'] ?>" selected><?= $pelanggan['kode_pelanggan'] ?> - <?= $pelanggan['nama_pelanggan']?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('pelanggan_id') ?></small>
                </div>

                <div class="form-group">
                  <label>No Faktur</label>
                  <input type="text" name="no_faktur" placeholder="Masukkan No Faktur" class="form-control" value="<?= $transaksi['no_faktur'] ?>" readonly>
                  <small class="form-text text-danger"><?= form_error('no_faktur') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Total Pembayaran</label>
                  <input type="text" class="form-control" name="total" placeholder="Masukkan Total Harga" value="<?= $transaksi['total_yang_dibayar'] ?>" readonly>
                  <small class="form-text text-danger"><?= form_error('total') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Transaksi" value="<?= set_value('keterangan') ?>" >
                  <small class="form-text text-danger"><?= form_error('keterangan') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Uang Masuk</label>
                  <input type="text" class="form-control" name="masukan" placeholder="Masukkan Uang Masuk yang Dibayar pelanggan" value="<?= $transaksi['uang_masuk'] ?>">
                  <small class="form-text text-danger"><?= form_error('masukan') ?></small>
                </div>

                <button id="tambahBarang" class="btn btn-primary" type='submit'>Tambah Transaksi</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
