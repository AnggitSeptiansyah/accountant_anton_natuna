
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="">Nama User</label>
                  <input type="text" class="form-control" placeholder="Nama User" name="nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jabatan</label>
                  <select name="jabatan_id" id="" class="form-control">
                    <?php foreach($jabatanAdmin as $jabatanAdmin) : ?>
                      <option value="<?= $jabatanAdmin['id'] ?>"><?= $jabatanAdmin['nama_jabatan']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Email address</label>
                  <input type="email" class="form-control" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Repeat Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password2">
                </div>

                <button class="btn btn-primary" type='submit'>Tambah User</button>
                
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















