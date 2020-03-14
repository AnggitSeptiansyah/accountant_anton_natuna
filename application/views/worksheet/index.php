
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">
              <a href="<?= base_url('worksheet/jenis_worksheet') ?>" class="btn btn-primary mb-2">Tambah Jenis Worksheet</a>
              <?= $this->session->flashdata('message'); ?>
              <table class="table table-bordered table-hovered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Biaya</th>                 
                    <th>Keterangan</th>
                    <th>Biaya</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php $total ?>
                  <?php foreach($worksheet as $worksheet) : ?>
                  <tr>                    
                    <td><?= $i ?></td>
                    <td><?= $worksheet['kode'] ?></td>
                    <td><?= $worksheet['keterangan'] ?></td>
                    <td><?= $worksheet['jumlah'] ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <td colspan=3>Total Biaya Bulan : <?= date('F', time()) ?></td>
                  <td></td>
                </tfoot>
              </table>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->