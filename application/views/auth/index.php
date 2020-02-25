

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-8 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                  </div>

                  <?= $this->session->flashdata('message') ?>

                  <form class="user" method="post" action="<?= base_url('auth') ?>">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user"placeholder="Enter Email Address..." name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user"placeholder="Password" name="password">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>


