
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post" id="form_tambah_barang">

                <div class="form-group">
                  <label for="">No Account</label>
                  <input type="text" class="form-control" name="no_acc" placeholder="Masukkan no acc" value="<?= set_value('no_acc') ?>">
                  <small class="form-text text-danger"><?= form_error('no_acc') ?></small>
                </div>

                <div class="form-group">
                  <label>No Faktur</label>
                  <input type="text" name="no_faktur" placeholder="Masukkan No Faktur" class="form-control" value="<?= set_value('no_faktur') ?>">
                  <small class="form-text text-danger"><?= form_error('no_faktur') ?></small>
                </div>
                <div class="form-group">
                  <label for="">Pelanggan</label>
                  <select name="pelanggan_id" class="form-control">
                  <?php foreach($pelanggan as $pelanggan) : ?>
                    <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['kode_pelanggan'] ?> - <?= $pelanggan['nama_pelanggan'] ?></option>
                  <?php endforeach ; ?>
                  </select>
                </div>
                <div id="container_input_barang">
                  <div class="row">
                    <div class="col-md-5" id="barang">
                      <div class="form-group">
                        <label for="">Barang yang Dipesan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Jenis Barang" name="barang[]">
                      </div>
                    </div>
                    <div class="col-md-3" id="qty">
                      <div class="form-group">
                        <label for="">Qty</label>
                        <input type="text" class="form-control" placeholder="Jumlah Brg" name="qty[]">
                      </div>
                    </div>
                    <div class="col-md-4" id="harga">
                      <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga Barang" name="harga[]">
                      </div>
                    </div>
                  </div>  
                </div>
                <button class="badge btn_tambah_barang badge-secondary mb-2" type="button"><i class="fas fa-plus-circle"></i> Tambah Barang</button>
                <div class="form-group">
                  <label for="">Total Harga</label>
                  <input type="text" class="form-control" name="total" placeholder="Masukkan Total Harga" value="<?= set_value('total') ?>">
                  <small class="form-text text-danger"><?= form_error('total') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Transaksi" value="<?= set_value('keterangan') ?>">
                  <small class="form-text text-danger"><?= form_error('keterangan') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Uang Masuk</label>
                  <input type="text" class="form-control" name="masukan" placeholder="Masukkan Uang Masuk yang Dibayar pelanggan" value="<?= set_value('masukan') ?>">
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
