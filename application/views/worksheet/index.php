
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">

            <div class="row">
                <div class="col-md-10">
                <form class="form-inline my-2 my-lg-0"  method="post" action="<?= base_url('worksheet') ?>">
                  <input class="form-control col-md-8" type="search" placeholder="Search" aria-label="Search" name="keyword">
                  <div class="input-group-append">
                    <input name="submit" class="btn btn-outline-primary" type="submit" autocomplete='off' autofocus>
                  </div>
                </form>
                </div>
                <div class="col-md-2">
                  <a href="<?= base_url('worksheet/jenis_worksheet') ?>" class="btn btn-primary mb-2">Tambah Jenis Worksheet</a>
                </div>
              </div>

              
              <?= $this->session->flashdata('message'); ?>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Biaya</th>                 
                    <th>Keterangan</th>
                    <th>Biaya</th>
                    <th>Jenis Pembayaran</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php $total ?>
                  <?php foreach($worksheet as $worksheet) : ?>
                  <tr>                    
                    <td><?= $i ?></td>
                    <td><?= $worksheet['jenis_biaya'] ?></td>
                    <td><?= $worksheet['keterangan'] ?></td>
                    <td><?= $worksheet['jumlah'] ?></td>
                    <td><?= $worksheet['nama_jenis_pembayaran'] ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <td colspan=4>Total Biaya Hari ini</td>
                  <td><strong><?= $worksheet_each_day ?></strong></td>
                </tfoot>
              </table>
              <?= $this->pagination->create_links(); ?>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->