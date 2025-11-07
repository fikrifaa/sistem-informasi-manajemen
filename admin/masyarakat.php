<?php require_once 'includes/header.php';
include_once 'php_action/do_tambahMasyarakat.php';
include_once 'php_action/do_editMasyarakat.php'; ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Masyarakat</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Data Masyarakat
      </div>

      <div class="card-body">
        <div class="float-right" style="padding-bottom:20px;">
          <button class="btn btn-outline-dark" data-toggle="modal" data-target="#tambahMasyarakat"> <i class="fa fa-plus fa-fw"></i>Tambah Masyarakat</button>
        </div> 

      <div class="card-body">
        <div class="table-responsive">
          <table id="masyarakat" class="table table-striped table-bordered ">
            <thead>
              <tr>
                <td>NIK</td>
                <td>Nama</td>
                <td>Username</td>
                <td>Telpon</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php

              $result = mysqli_query(
                $connect,
                "SELECT * FROM masyarakat ORDER BY nik DESC"
              );

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
              ?>
                  <tr>
                    <td><?= $row[0] ?></td>
                    <td><?= $row[1] ?></td>
                    <td><?= $row[2] ?></td>
                    <td><?= $row[4] ?></td>
                    <td class="text-center">
                    <button data-toggle="modal" data-target="#editMasyarakat"
                      data-nik="<?= $row[0] ?>"
                      data-nama="<?= $row[1] ?>"
                      data-username="<?= $row[2] ?>"
                      data-password="<?= $row[3] ?>"
                      data-telp="<?= $row[4] ?>"

                      onclick="formEdit(this);" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i></button>

                    </td>
                  </tr>
                <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan="11" class="text-center">
                    <h3>Tidak ada data masyarakat</h3>
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

  <!--modal tambah-->
  <div class="modal fade" id="tambahMasyarakat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="masyarakat.php" method="post">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Masyarakat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" name="nik" placeholder="NIK" autocomplete="off" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nama" placeholder="Nama" autocomplete="off" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
              </div>
              <div class="col-sm-6">
                <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
              </div>
            </div>
            <br>
            <div class="form-group">
              <input type="text" class="form-control" name="telp" placeholder="Telepon" autocomplete="off" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-dark" name="tambahMasyarakat" autocomplete="off">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <!--modal edit-->
    <div class="modal fade" id="editMasyarakat" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" action="masyarakat.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-pencil-square-o"></i>Edit Masyarakat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" name="nik" id="nik" readonly autocomplete="off" autofocus>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama" id="nama" required autocomplete="off" autofocus>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" id="username" autocomplete="off" required autofocus>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <input name="password" type="password" class="form-control" id="password" placeholder="Password" required autofocus>
                </div>
                <div class="col-sm-6">
                  <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                </div>
              </div>
              <br>
              <div class="form-group">
                <input type="text" class="form-control" name="telp" id="telp" placeholder="Telepon" autocomplete="off" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark" name="editMasyarakat" autocomplete="off">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!--script mengisi form-->
  <script type="text/javascript">
    function formEdit(item) {
      var nik = $(item).data('nik');
      var nama = $(item).data('nama');
      var username = $(item).data('username');
      var telp = $(item).data('telp');
      var password = $(item).data('password');

      // mengisi ke form
      $('#editMasyarakat .form-group #nik').val(nik);
      $('#editMasyarakat .form-group #nama').val(nama);
      $('#editMasyarakat .form-group #username').val(username);
      $('#editMasyarakat .form-group #telp').val(telp);
      $('#editMasyarakat .form-group #password').val(password);
    }

  </script>


  <?php require_once 'includes/footer.php'; ?>