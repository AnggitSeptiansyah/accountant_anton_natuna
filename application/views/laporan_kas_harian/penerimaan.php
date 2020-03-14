
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="">No Acc</label>
                  <input type="text" class="form-control" placeholder="Masukkan no account" name="no_acc">
                </div>
                <div class="form-group">
                  <label for="">Pelanggan</label>
                  <select name="pelanggan_id" id="">
                    <?php foreach($transaksi as $transaksi) : ?>
                      <option value="<?= $transaksi['id'] ?>"><?= $transaksi['no_faktur'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" placeholder="Masukkan Keterangan">
                </div>
                <button class="btn btn-primary" type='submit'>Tambah Data Pelunasan</button>

              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















