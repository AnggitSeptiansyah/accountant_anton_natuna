
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->

          
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <table class="table table-hover table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Acc</th>
                    <th>No Faktur</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>Uang Masuk</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($transaksi as $transaksi) : ?>
                    <tr>
                      <th><?= $i ?></th>
                      <td><?= $transaksi['no_acc'] ?></td>
                      <td><?= $transaksi['no_faktur'] ?></td>
                      <td><?= $transaksi['kode_pelanggan'] ?> - <?= $transaksi['nama_pelanggan'] ?></td>
                      <td><?= $transaksi['total'] ?></td>
                      <td><?= $transaksi['uang_masuk'] ?></td>
                      <td><?= date('d F Y', $transaksi['tanggal']) ?></td>
                      <td>
                        <a class="badge badge-danger" href="">Delete</a>
                        <a class="badge badge-warning" href="">Update</a>
                        <a class="badge badge-dark" href="<?= base_url('') ?>transaksi/detail/<?= $transaksi['id'] ?>">invoice</a>
                        <a class="badge badge-success" href="<?= base_url('') ?>transaksi/surat_jalan/<?= $transaksi['id'] ?>">Surat Jalan</a>
                      </td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <div class="row">
                <!-- <div class="col-md-9">
                  #<?= $this->pagination->create_links(); ?>#
                </div> -->
                <div class="col-md-2">
                  <a href="<?= base_url('transaksi/tambahTransaksi') ?>" class="btn btn-primary btn-sm">Tambah Transaksi</a>
                </div>
                
              </div>
              
            </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->