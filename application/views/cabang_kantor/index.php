
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <a href="<?= base_url('CabangKantor/tambahKantor') ?>" class="btn btn-primary">Tambah Admin</a>
              <table class="table table-hover table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>No WA</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach($cabang_kantor as $cabang_kantor) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $cabang_kantor->kode_cabang ?></td>
                    <td><?= $cabang_kantor->nama_cabang ?></td>
                    <td><?= $cabang_kantor->alamat ?></td>
                    <td><?= $cabang_kantor->no_hp ?></td>
                    <td><?= $cabang_kantor->no_wa ?></td>
                    <td><?= $cabang_kantor->email ?></td>
                  </tr>
                  <?php $i++ ?>
                  <?php endforeach ?>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->