<?php require_once 'includes/header.php'; ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Laporan</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-archive"></i> Data Laporan
      </div>
      <div class="card-body">

        <!--div tabel -->
        <div class="table-responsive">
          <br>
          <table class="table table-bordered nowrap" id="laporan" width="100%" cellspacing="0">
            <thead>
              <tr>
                <td>Tanggal</td>
                <td>nama</td>
                <td class="w-30">Isi Laporan</td>
                <td>Foto</td>
                <td>Status</td>
                <td>Beri Tanggapan</td>
              </tr>
            </thead>
            <tbody>
              <?php

              $result = mysqli_query(
                $connect,
                "SELECT p.id_pengaduan, date(p.tgl_pengaduan),m.nama, p.isi_laporan,p.foto,p.status 
                   FROM `pengaduan` as p INNER JOIN masyarakat as m ON p.nik = m.nik ORDER BY `tgl_pengaduan` DESC"
              );

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
              ?>
                  <tr>
                    <td><?= $row[1] ?></td> <!--tgl_pengaduan-->
                    <td><?= $row[2] ?></td> <!--pelapor-->
                    <td><span class="d-inline-block text-truncate" style="max-width: 300px;"><?= $row[3] ?></span></td> <!--isi_laporan-->
                    <td><?= $row[4] ?></td> <!--foto-->
                    <td><!--status-->
                      <?php
                      if ($row[5] == 1) {
                        echo "<span class='badge badge-info'>Sedang Diproses</span>";
                      } else if ($row[5] == 2) {
                        echo "<span class='badge badge-success'>Selesai Diproses</span>";
                      } else {
                        echo "<span class='badge badge-warning'>Belum Diproses</span>";
                      }
                      ?></td>
                    <td class="text-center">
                      <?php
                      if ($row[5] == 1) {
                        echo '<a href="tanggapan.php?id=' . $row['0'] . '" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                           '; ?>
                        <a href="php_action/do_selesaiPengaduan.php?id=<?php echo $row[0] ?>" type="button" class="btn btn-success" onclick="return confirm('Apakah yakin pengaduan sudah diselesaikan?');"><i class="fa fa-check"></i></a>
                      <?php
                      } else if ($row[5] == 2) {
                        echo '<a href="tanggapan.php?id=' . $row['0'] . '" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                           '; ?>
                        <a href="php_action/do_batalPengaduan.php?id=<?php echo $row[0] ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah yakin pengaduan batal diselesaikan?');"><i class="fa fa-ban"></i></a>
                      <?php
                      } else {
                        echo '<a href="tanggapan.php?id=' . $row['0'] . '" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                         ';
                      }
                      ?>
                    </td>
                  </tr>
                <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan="11" class="text-center">
                    <h3>Tidak ada data pengaduan</h3>
                  </td>
                </tr>
              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

  </div>

</div>

<!--modal tambah--><!--
<div class="modal fade" id="tambahTanggapan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="tanggapan.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Tanggapan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="date" class="form-control" name="tgl_tanggapan" placeholder="Tanggal" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="isi_tanggapan" rows="8" cols="40" placeholder="Isikan tanggapan Anda" required></textarea>
          </div>
          <div class="form-group">
            <select class="custom-select" name="id_petugas" required>
              <option value="" selected disabled>ID Petugas</option>
              <?php
              $queryIdPetugas = mysqli_query($connect, "SELECT * FROM petugas");
              while ($rowIdPetugas = mysqli_fetch_array($queryIdPetugas)) {
              ?>
                <option value="<?= $rowIdPetugas[0] ?>" data-id="<?= $rowIdPetugas[0] ?>"><?= $rowIdPetugas[0] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-dark" name="tambahTanggapan" autocomplete="off">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
            -->
<?php require_once 'includes/footer.php'; ?>