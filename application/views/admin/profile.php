
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <div class="card-body row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['img'] ?>" alt="" class="card-img">
                  </div>
                  <div class="col-md-8">
                    <h5 class="card-title"><?= $user['nama'] ?></h5>
                    <p><?= $user['email'] ?></p>
                    <a href="<?= base_url('admin/edit_profile') ?>" class="btn btn-primary">Edit Profile</a>
                    <a href="<?= base_url('admin/change_password') ?>" class="btn btn-success">Change Password</a>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->