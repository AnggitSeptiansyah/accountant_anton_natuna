
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post" id="form_tambah_barang" name="form_tambah_barang">
              
                <div class="form-group">
                  <label for="">No Account</label>
                  <input type="text" class="form-control" name="no_acc" placeholder="Masukkan no acc" value="<?= set_value('no_acc') ?>">
                  <small class="form-text text-danger"><?= form_error('no_acc') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Pelanggan</label>
                  <select name="pelanggan_id" class="form-control">
                  <?php foreach($pelanggan as $pelanggan) : ?>
                    <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['nama_pelanggan'] ?></option>
                  <?php endforeach ; ?>
                  </select>
                </div>
                <div id="container_input_barang">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Barang yang Dipesan</label>
                        <input type="text" class="form-control"  name="barang[]" id="barang-0">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label for="">Qty</label>
                        <input type="text" value="0" class="form-control quantity" name="qty[]" id="qty-0">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="">Satuan</label>
                        <input type="text" class="form-control" name="satuan[]" id="satuan-0">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control input_harga" value="0" name="harga[]" id="harga-0">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Total Harga Barang</label>
                        <input type="text" class="form-control total_harga_barang" value="0" name="total_harga_barang[]" value="0" id="total_harga_barang-0">
                      </div>
                    </div>
                  </div>  
                </div>

                <button class="badge btn_tambah_barang badge-secondary mb-2" type="button" id="button"><i class="fas fa-plus-circle"></i> Tambah Barang</button>

                <div class="form-group">
                  <label for="">Diskon</label>
                  <input type="text" class="form-control diskon" name="diskon" placeholder="Masukkan Diskon" value="<?= set_value('diskon') ?>">
                  <small class="form-text text-danger"><?= form_error('diskon') ?></small>
                </div>

                <div class="form-group">
                  <label for="">Total Harga</label>
                  <input type="text" class="form-control total_harga" id="grandPrice" name="total" placeholder="Masukkan Total Harga" value="<?= set_value('total') ?>">
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
