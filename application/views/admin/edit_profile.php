
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <div class="card-body">
              <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
                <?= form_open_multipart('admin/edit_profile'); ?>
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" id="nama" name="email" value="<?= $user['email'] ?>">
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">Picture</div>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/profile/') . $user['img'] ?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image" name="img">
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
				</div>

              <button type="submit" class="btn btn-primary">Ubah Profile</button>
                
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->